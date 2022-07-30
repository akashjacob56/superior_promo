<?php

namespace App\Http\Controllers;
use App\Order;
use DataTables;
use App\Cart;
use App\OrderProduct;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Config;
use App\DeliveryStatus;
use App\Appearance;
use App\TermCondition;
use App\PaymentStatus;
use App\Address;
use App\Product;
use App\Sku;
use App\ParentVariant;
use App\ChildVariant;
use App\Gst;
use App\GlobalOrder;
use App\DiscountApplied;
use App\DeliveryVendor;
use App\Trasaction_type;
use App\ReturnPolicy;
use App\OrderLog;
use App\DeliveryStatusTranslation;
use App\SellerDetail;
use App\OrderItem;
use App\Stage;
use App\ArtProof;
use App\State;
use App\OrderItemStage;
use App\OrderNote;
use App\TrackingInformation;
use App\CartItemColors;
use App\ProductColor;
use App\Color;
class OrderController extends Controller{


    public function postOrderItemInvoiceUpload(Request $request){
                   

            $order_item_id = $request->order_item_id;
             
            $order_item = OrderItem::find($order_item_id);


            if($request->files!=""){
               if($request->hasFile("files")){
                   $i=0;
                   foreach($request['files'] as $imgs)
                       { 
                       if($i==0){
                           $source=$imgs;
                           $image_name=$this->addCompressImage($source,"invoice_file");
                           $order_item->invoice_file=$image_name;
                           
                       }
                       $i++;
                   }
               } 
            }

            $order_item->save();
            return $order_item;


        
    }

    public function postOrderItemTrackingAdd(Request $request){
        $order_item_id = $request->order_item_id;

        $tracking_information = new TrackingInformation;
        $tracking_information->order_item_id = $request->order_item_id;
        $tracking_information->tracking_shipping_date = $request->tracking_shipping_date;
        $tracking_information->tracking_number = $request->tracking_number;
        $tracking_information->tracking_shipping_company = $request->tracking_shipping_company;
        $tracking_information->tracking_note = $request->tracking_note;
        $tracking_information->tracking_notify_customer = $request->tracking_notify_customer;
        $tracking_information->tracking_request_rating = $request->tracking_request_rating;
        $tracking_information->save();

        $created_at = date("m-d-Y H:i:s", strtotime($tracking_information->created_at));
        $tracking_shipping_date = date("m-d-Y H:i:s", strtotime($tracking_information->tracking_shipping_date));

        $data = array('created_at'=>$created_at, 'tracking_shipping_date'=>$tracking_shipping_date,'tracking_information'=>$tracking_information);
        
        return $data;

    }

    public function postOrderItemVendorEdit(Request $request){

        $order_item_id = $request->order_item_id;
        $vendor_id = $request->vendor_id;
        $order_item = OrderItem::find($order_item_id);
        $order_item->vendor_id = $vendor_id;
        $order_item->save();

        
        $order_item = OrderItem::where('id',$order_item->id)->with('vendor')->first();
        return $order_item;
    }


    public function postOrderItemShippingAddressEdit(Request $request){
        // dd($request->all());


                        $order_item_id = $request->order_item_id;
                        $order_item = OrderItem::find($order_item_id);

                           $order_item->shipping_title=$request->shipping_title;
                           $order_item->shipping_first_name=$request->shipping_first_name;
                           $order_item->shipping_middle_name=$request->shipping_middle_name;
                           $order_item->shipping_last_name=$request->shipping_last_name;
                           $order_item->shipping_suffix=$request->shipping_suffix;
                           $order_item->shipping_company_name=$request->shipping_company_name;
                           $order_item->shipping_address_line_1=$request->shipping_address_line_1;
                           $order_item->shipping_address_line_2=$request->shipping_address_line_2;
                           $order_item->shipping_city=$request->shipping_city;
                           $order_item->shipping_state=$request->shipping_state;
                           $order_item->shipping_zip=$request->shipping_zip;
                           $order_item->shipping_country=$request->shipping_country;
                           $order_item->shipping_province=$request->shipping_province;
                           $order_item->shipping_day_telephone=$request->shipping_day_telephone;
                           $order_item->save();
                           return $order_item;
                           
    }

    public function postOrderItemBillingAddressEdit(Request $request){
        // dd($request->all());
                            $order_item_id = $request->order_item_id;
                            $order_item = OrderItem::find($order_item_id);

                           $order_item->billing_title=$request->billing_title;
                           $order_item->billing_first_name=$request->billing_first_name;
                           $order_item->billing_middle_name=$request->billing_middle_name;
                           $order_item->billing_last_name=$request->billing_last_name;
                           $order_item->billing_suffix=$request->billing_suffix;
                           $order_item->billing_company_name=$request->billing_company_name;
                           $order_item->billing_address_line_1=$request->billing_address_line_1;
                           $order_item->billing_address_line_2=$request->billing_address_line_2;
                           $order_item->billing_city=$request->billing_city;
                           $order_item->billing_state=$request->billing_state;
                           $order_item->billing_zip=$request->billing_zip;
                           $order_item->billing_country=$request->billing_country;
                           $order_item->billing_province=$request->billing_province;
                           $order_item->billing_day_telephone=$request->billing_day_telephone;
                           $order_item->save();
                           return $order_item;
    }

    public function getAllOrderItemArtProofData(Request $request){
        $order_item_id = $request->order_item_id;
        $art_proofs = ArtProof::where('order_item_id',$order_item_id)->with('user')->get();
        return DataTables::of($art_proofs)->make(true);
    }

    public function getAllOrderItemNotesData(Request $request){
        $order_item_id = $request->order_item_id;
        
        $order_notes = OrderNote::where('order_item_id',$order_item_id)->with('user')->get();

        return DataTables::of($order_notes)->make(true);
    }

    public function getOrderItemDetail(Request $request){
        $order_item_id = $request->id;
        $order_item = OrderItem::where('id',$order_item_id)->with('order')->with('product')->with('order_notes')->with('stage')->with('vendor')->with('cart_item')->first();
        $production_stages = Stage::with('order_count')->get();

        //item color start

            $cart_item_id = $order_item->cart_item_id;
                                    $cart_item_colors = CartItemColors::where('cart_item_id',$cart_item_id)->first();
                                   
                                    if($cart_item_colors!=""){
                                        $product_color = ProductColor::where('product_color_group_id',$cart_item_colors->product_color_group_id)->where('id',$cart_item_colors->product_color_id)->where('color_id',$cart_item_colors->color_id)->first();
                                        if($product_color!=""){
                                          $main_selected_color_id = $product_color->color_id;
                                          $main_selected_color = Color::where('id',$main_selected_color_id)->first();

                                        }                       
                                    }else{
                                        $main_selected_color = "";
                                  }



        //item color end



        $all_vendors = User::where('role_id',4)->get();
        $all_trackings = TrackingInformation::where('order_item_id',$order_item_id)->get();

        return view('order/order-item-detail')->with('order_item',$order_item)->with('production_stages',$production_stages)->with('all_vendors',$all_vendors)->with('all_trackings',$all_trackings)->with('main_selected_color',$main_selected_color);
    }   


    public function getOrderDetail(Request $request){
        $order_id = $request->id;
        $order = Order::where("id",$order_id)->with('user')->first();
        return view('order/details')->with('order',$order);
    }


    public function getOrderItemsAllData(Request $request){
        $order_id = $request->order_id;
        
        $order_items = OrderItem::where('order_id',$order_id)->with('product')->get();

        return DataTables::of($order_items)->make(true);
    }
    
    //all re-orders
    public function getAllReorder(Request $request){
        $request_order_id = $request->order_id;
        $sub_order_id = $request->sub_order_id;
        $customer_name = $request->customer_name;
        $customer_id = $request->customer_id;
        $purchase_order_id = $request->purchase_order_id;
        $vendor_id = $request->vendor_id;
        $product_id = $request->product_id;
        $creation_from_date = $request->creation_from_date;
        $creation_to_date = $request->creation_to_date;
        $check_notes = $request->check_notes;
        $frequency = $request->frequency;
        $state = $request->state;
        $payment_method = $request->payment_method;
        $stage = $request->stage;
        $order_sample = $request->order_sample;
        $stage_id = $request->stage_id;

        $user = Auth::user();
        if($user!=""){

            if($user->role_id!=1||$user->role_id!=2){
                $request_stage_id = $request->stage_id;
                $production_stages = Stage::with('order_count')->get();
                $states = State::with('state_translation')->whereHas('state_translation',function($query){
                    $query->where('state_name','!=',"");
                })->get();

               $orders = Order::where('is_reorder',1)->with('orderitems')->with('user');

               // production Stage Id
               if($stage_id!=""&&$stage_id!="undefined"&&$stage_id!="null"&&$stage_id!=null&&$stage_id!="[]"){
                 $orders = $orders->whereHas('orderitems',function($q) use($stage_id){
                    $q->where('stage_id',$stage_id);
                 });
                }

               // Filter Start --------------------------------------------------------------
                if($request_order_id!=""&&$request_order_id!="undefined"&&$request_order_id!="null"&&$request_order_id!=null&&$request_order_id!="[]"){
                   
                    $orders = $orders->where('id',$request_order_id);
                }
                if($sub_order_id!=""&&$sub_order_id!="undefined"&&$sub_order_id!="null"&&$sub_order_id!=null&&$sub_order_id!="[]"){
                   
                }


                if($customer_name!=""&&$customer_name!="undefined"&&$customer_name!="null"&&$customer_name!=null&&$customer_name!="[]"){
                    
                    $order_ids = $orders->pluck('id');

                    $order_searchs=Order::whereIn('id',$order_ids)->whereHas('user',function($q) use($customer_name){
                        $q->where('name', 'like', '%' .$customer_name. '%');
                    })->get();
                    $new_order_ids = $order_searchs->pluck('id');
                    $orders = $orders->whereIn('id',$new_order_ids);
                }

                if($customer_id!=""&&$customer_id!="undefined"&&$customer_id!="null"&&$customer_id!=null&&$customer_id!="[]"){
                    
                    $orders = $orders->where('user_id',$customer_id);
                }

                if($vendor_id!=""&&$vendor_id!="undefined"&&$vendor_id!="null"&&$vendor_id!=null&&$vendor_id!="[]"){
                    
                    $orders = $orders->whereHas('orderitems',function($q) use($vendor_id){
                        $q->where('vendor_id',$vendor_id);
                    });
                }

                if($product_id!=""&&$product_id!="undefined"&&$product_id!="null"&&$product_id!=null&&$product_id!="[]"){
                    
                    $orders = $orders->whereHas('orderitems',function($q) use($product_id){
                        $q->where('product_id',$product_id);
                    });
                }

                if($creation_from_date!=""&&$creation_from_date!="undefined"&&$creation_from_date!="[]"&&$creation_from_date!="null"&&$creation_from_date!=null&&$creation_to_date!=""&&$creation_to_date!="undefined"&&$creation_to_date!="[]"&&$creation_to_date!="null"&&$creation_to_date!=null){
                    
                    $orders=$orders->whereBetween('created_at', [$creation_from_date, $creation_to_date]);
                }

                if($check_notes!=""&&$check_notes!="undefined"&&$check_notes!="null"&&$check_notes!=null&&$check_notes!="[]"){
                    
                        if($check_notes==1){
                            $orders = $orders->whereHas('orderitems',function($q) use($check_notes){
                                $q->whereHas('user_note',function($q) use($check_notes){
                                    $q->where('note',"!=","");
                                });
                            });
                        }elseif($check_notes==0){
                            $orders = $orders->whereHas('orderitems',function($q) use($check_notes){
                                $q->whereHas('user_note',function($q) use($check_notes){
                                    $q->whereNull('note');
                                });
                            });
                        }
                }

                if($frequency!=""&&$frequency!="undefined"&&$frequency!="null"&&$frequency!=null&&$frequency!="[]"){
                    
                    $orders=$orders->where('created_at', '>', now()->subDays($frequency)->endOfDay());
                }

                if($state!=""&&$state!="undefined"&&$state!="null"&&$state!=null&&$state!="[]"){
                    
                   $orders=$orders->whereHas('orderitems',function($q) use($state){
                        $q->where('shipping_state',$state);
                   });
                }

                if($payment_method!=""&&$payment_method!="undefined"&&$payment_method!="null"&&$payment_method!=null&&$payment_method!="[]"){
                    
                    if($payment_method=="not_paid"){
                        $payment_type=0;
                    }elseif($payment_method=="paid"){   
                        $payment_type=1;
                    }

                    $orders=$orders->whereHas('orderitems',function($q) use($payment_type){
                        $q->where('not_paid',$payment_type);
                    });
                }


                if($stage!=""&&$stage!="undefined"&&$stage!="null"&&$stage!=null&&$stage!="[]"){
                    
                    $stage_id = (int) $stage;
                    $orders=$orders->whereHas('orderitems',function($q) use($stage_id){
                        $q->where('stage_id',$stage_id);
                    });
                }


                if($order_sample!=""&&$order_sample!="undefined"&&$order_sample!="null"&&$order_sample!=null&&$order_sample!="[]"){
                    
                }

               //Filter End -----------------------------------------------------------------
            	
                $orders = $orders->orderBy('id','desc')->paginate(10);
	
                $all_vendors = User::where('role_id',4)->get();


                $request_data = array("order_id"=>$request->order_id,"sub_order_id"=>$request->sub_order_id,"customer_name"=>$request->customer_name,"customer_id"=>$request->customer_id,"purchase_order_id"=>$request->purchase_order_id,"vendor_id"=>$request->vendor_id,"product_id"=>$request->product_id,"creation_from_date"=>$request->creation_from_date,"creation_to_date"=>$request->creation_to_date,"check_notes"=>$request->check_notes,"frequency"=>$request->frequency,"state"=>$request->state,"payment_method"=>$request->payment_method,"stage"=>$request->stage,"order_sample"=>$request->order_sample,"stage"=>$request->stage);

                return view('order.all-reorder')->with('production_stages',$production_stages)->with('stage_id',$request_stage_id)->with('states',$states)->with('orders',$orders)->with('data',$request_data)->with('all_vendors',$all_vendors);
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/');
        }
    }



    public function postSelectVendor(Request $request){
        $vendor_id = $request->vendor_id;
        $order_item_id = $request->order_item_id;

        $order_item_check = OrderItem::where('id',$order_item_id)->first();
        if($order_item_check!=''){
            $order_item = OrderItem::find($order_item_id);
            $order_item->vendor_id = $vendor_id;
            $order_item->save();

            $order_item_first = OrderItem::where('id',$order_item->id)->with('vendor')->first();
            return $order_item_first;
        }else{
            $order_item_first = OrderItem::where('id',$order_item->id)->with('vendor')->first();
           return $order_item_first;
        }
    }

    public function postOrderItemImportant(Request $request){
        $order_item_id = $request->order_item_id;

        $orderitem = OrderItem::where('id',$order_item_id)->first();
        if($orderitem->is_important==1){
            $order_item = OrderItem::find($order_item_id);
            $order_item->is_important = 0;
            $order_item->save();
        }else{
            $order_item = OrderItem::find($order_item_id);
            $order_item->is_important = 1;
            $order_item->save();
        }

        return $order_item;

    }

    public function postArtProofManagementNote(Request $request){
        

        $user_id = $request->user_id;
        $user_id = (int) $user_id;
        // $request_approval = $request->request_approval;
        $admin_note = $request->admin_note;
        $order_item_id = $request->order_item_id;
        // $files = $request->files;



        $art_proof = new ArtProof;
        $art_proof->user_id = $user_id;
        // if($request_approval==1){
        //     $art_proof->approved = $request_approval;
        // }
        $art_proof->note = $admin_note;
        $art_proof->order_item_id = $order_item_id;
        $filenames=$request->filenames;
        if($request->files!=""){
            if($request->hasFile('files')){
                $i=0;
                   foreach($request['files'] as $imgs){ 
                       if($i==0){
                            $image = $imgs;

                       $filename=$filenames[$i];

                       $get_file_path="artwork-images/".$filename;

                        $art_proof_filepath =ArtProof::where('order_item_id',$order_item_id)->where('path',$get_file_path)->first();

                        $art_proof_filepathcount =ArtProof::where('order_item_id',$order_item_id)->count();

                        if($art_proof_filepath==""){
                         $path=$filename;
                        }else{

                         $fullfile = strtok($filename,  '.');
                         
                         $fullfile = $fullfile."_".$art_proof_filepathcount;
                         $fullfile_ext=strstr($filename, '.');
                         $path=$fullfile."".$fullfile_ext;
                        
                        }

                     

					file_put_contents("storage/app/artwork-images/".$path,$image);

					$art_proof->path="artwork-images/".$path;
                            
             //$path = $image->store('artwork-images');
                            //$art_proof->path=$path;
                       }
                       $i++;
                   }
            }
        }
        // echo $art_proof;die;
        $art_proof->save();

        $art_proof = ArtProof::where('id',$art_proof->id)->with('user')->with('orderitem')->first();
        $created_at = date("m-d-Y H:i:s", strtotime($art_proof->created_at));
        $updated_at = date("m-d-Y H:i:s", strtotime($art_proof->updated_at));
        $data = array('art_proof' => $art_proof,'created_at'=>$created_at, 'updated_at'=>$updated_at);
        return $data;
    }


    public function postOrderNotes(Request $request){
        $user_id = $request->user_id;
        // $check_note = $request->check_note;
        $note = $request->note;
        
        $order_item_id = $request->order_item_id;

        $order_note = new OrderNote;
        $order_note->user_id = $user_id;
        // $order_note->check_notes = $check_note;
        $order_note->note = $note;
        if($request->files!=""){
            if($request->hasFile('files')){
                $i=0;
                   foreach($request['files'] as $imgs){ 
                       if($i==0){
                            $image = $imgs;
                            $path = $image->store('order_note');
                            $order_note->virtual_file_cabinet=$path;
                       }
                       $i++;
                   }
            }
        }
        $order_note->order_item_id = $order_item_id;
        $order_note->save();



        $order_note = OrderNote::where('order_note_id',$order_note->order_note_id)->with('user')->first();
        $created_at = date("m-d-Y H:i A", strtotime($order_note->created_at));
        $data = array('order_note'=>$order_note,'created_at'=>$created_at);

        return $data;
    }

    public function postCheckOrderNotes(Request $request){

        $order_item_id = $request->order_item_id;
        $check_notes = $request->check_notes;

        $order_item =  OrderItem::find($order_item_id);
        $order_item->check_notes=$check_notes;
        $order_item->save();
        return $order_item;

    }


    public function postCheckOrderItemNotPaid(Request $request){
        $order_item_id = $request->order_item_id;
        $not_paid = $request->not_paid;

        $order_item =  OrderItem::find($order_item_id);
        $order_item->not_paid=$not_paid;
        $order_item->save();
        return $order_item;
    }

    //all orders
     public function getAll(Request $request){
	
        $request_order_id = $request->order_id;
        $sub_order_id = $request->sub_order_id;
        $customer_name = $request->customer_name;
        $customer_id = $request->customer_id;
        $purchase_order_id = $request->purchase_order_id;
        $vendor_id = $request->vendor_id;
        $product_id = $request->product_id;
        $creation_from_date = $request->creation_from_date;
        $creation_to_date = $request->creation_to_date;
        $check_notes = $request->check_notes;
        $frequency = $request->frequency;
        $state = $request->state;
        $payment_method = $request->payment_method;
        $stage = $request->stage;
        $order_sample = $request->order_sample;
        $stage_id = $request->stage_id;

        $user = Auth::user();
        if($user!=""){

            if($user->role_id!=1 || $user->role_id!=2){
                $request_stage_id = $request->stage_id;
                $production_stages = Stage::with('order_count')->get();
                $states = State::with('state_translation')->whereHas('state_translation',function($query){
                    $query->where('state_name','!=',"");
                })->get();

               $orders = Order::where('is_reorder',0)->with('orderitems')->with('user');

               // production Stage Id
               if($stage_id!=""&&$stage_id!="undefined"&&$stage_id!="null"&&$stage_id!=null&&$stage_id!="[]"){
                 $orders = $orders->whereHas('orderitems',function($q) use($stage_id){
                    $q->where('stage_id',$stage_id);
                 });
                }

               // Filter Start --------------------------------------------------------------
                if($request_order_id!=""&&$request_order_id!="undefined"&&$request_order_id!="null"&&$request_order_id!=null&&$request_order_id!="[]"){
                   
                    $orders = $orders->where('id',$request_order_id);
                }
                if($sub_order_id!=""&&$sub_order_id!="undefined"&&$sub_order_id!="null"&&$sub_order_id!=null&&$sub_order_id!="[]"){
                   
                }


                if($customer_name!=""&&$customer_name!="undefined"&&$customer_name!="null"&&$customer_name!=null&&$customer_name!="[]"){
                    
                    $order_ids = $orders->pluck('id');

                    $order_searchs=Order::whereIn('id',$order_ids)->whereHas('user',function($q) use($customer_name){
                        $q->where('name', 'like', '%' .$customer_name. '%');
                    })->get();
                    $new_order_ids = $order_searchs->pluck('id');
                    $orders = $orders->whereIn('id',$new_order_ids);
                }

                if($customer_id!=""&&$customer_id!="undefined"&&$customer_id!="null"&&$customer_id!=null&&$customer_id!="[]"){
                    
                    $orders = $orders->where('user_id',$customer_id);
                }

                if($vendor_id!=""&&$vendor_id!="undefined"&&$vendor_id!="null"&&$vendor_id!=null&&$vendor_id!="[]"){
                    
                    $orders = $orders->whereHas('orderitems',function($q) use($vendor_id){
                        $q->where('vendor_id',$vendor_id);
                    });
                }

                if($product_id!=""&&$product_id!="undefined"&&$product_id!="null"&&$product_id!=null&&$product_id!="[]"){
                    
                    $orders = $orders->whereHas('orderitems',function($q) use($product_id){
                        $q->where('product_id',$product_id);
                    });
                }

                if($creation_from_date!=""&&$creation_from_date!="undefined"&&$creation_from_date!="[]"&&$creation_from_date!="null"&&$creation_from_date!=null&&$creation_to_date!=""&&$creation_to_date!="undefined"&&$creation_to_date!="[]"&&$creation_to_date!="null"&&$creation_to_date!=null){
                    
                    $orders=$orders->whereBetween('created_at', [$creation_from_date, $creation_to_date]);
                }

                if($check_notes!=""&&$check_notes!="undefined"&&$check_notes!="null"&&$check_notes!=null&&$check_notes!="[]"){
                    
                        if($check_notes==1){
                            $orders = $orders->whereHas('orderitems',function($q) use($check_notes){
                                $q->whereHas('user_note',function($q) use($check_notes){
                                    $q->where('note',"!=","");
                                });
                            });
                        }elseif($check_notes==0){
                            $orders = $orders->whereHas('orderitems',function($q) use($check_notes){
                                $q->whereHas('user_note',function($q) use($check_notes){
                                    $q->whereNull('note');
                                });
                            });
                        }
                }

                if($frequency!=""&&$frequency!="undefined"&&$frequency!="null"&&$frequency!=null&&$frequency!="[]"){
                    
                    $orders=$orders->where('created_at', '>', now()->subDays($frequency)->endOfDay());
                }

                if($state!=""&&$state!="undefined"&&$state!="null"&&$state!=null&&$state!="[]"){
                    
                   $orders=$orders->whereHas('orderitems',function($q) use($state){
                        $q->where('shipping_state',$state);
                   });
                }

                if($payment_method!=""&&$payment_method!="undefined"&&$payment_method!="null"&&$payment_method!=null&&$payment_method!="[]"){
                    
                    if($payment_method=="not_paid"){
                        $payment_type=0;
                    }elseif($payment_method=="paid"){   
                        $payment_type=1;
                    }

                    $orders=$orders->whereHas('orderitems',function($q) use($payment_type){
                        $q->where('not_paid',$payment_type);
                    });
                }


                if($stage!=""&&$stage!="undefined"&&$stage!="null"&&$stage!=null&&$stage!="[]"){
                    
                    $stage_id = (int) $stage;
                    $orders=$orders->whereHas('orderitems',function($q) use($stage_id){
                        $q->where('stage_id',$stage_id);
                    });
                }


                if($order_sample!=""&&$order_sample!="undefined"&&$order_sample!="null"&&$order_sample!=null&&$order_sample!="[]"){
                    
                }

               //Filter End -----------------------------------------------------------------
            	
                $orders = $orders->orderBy('id','desc')->paginate(10);
                $all_vendors = User::where('role_id',4)->get();


                $request_data = array("order_id"=>$request->order_id,"sub_order_id"=>$request->sub_order_id,"customer_name"=>$request->customer_name,"customer_id"=>$request->customer_id,"purchase_order_id"=>$request->purchase_order_id,"vendor_id"=>$request->vendor_id,"product_id"=>$request->product_id,"creation_from_date"=>$request->creation_from_date,"creation_to_date"=>$request->creation_to_date,"check_notes"=>$request->check_notes,"frequency"=>$request->frequency,"state"=>$request->state,"payment_method"=>$request->payment_method,"stage"=>$request->stage,"order_sample"=>$request->order_sample,"stage"=>$request->stage);

                return view('order.all')->with('production_stages',$production_stages)->with('stage_id',$request_stage_id)->with('states',$states)->with('orders',$orders)->with('data',$request_data)->with('all_vendors',$all_vendors);
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/');
        }
    }

        public function getAllData(Request $request){
        $request_order_id = $request->order_id;
        $sub_order_id = $request->sub_order_id;
        $customer_name = $request->customer_name;
        $customer_id = $request->customer_id;
        $purchase_order_id = $request->purchase_order_id;
        $vendor_id = $request->vendor_id;
        $product_id = $request->product_id;
        $creation_from_date = $request->creation_from_date;
        $creation_to_date = $request->creation_to_date;
        $check_notes = $request->check_notes;
        $frequency = $request->frequency;
        $state = $request->state;
        $payment_method = $request->payment_method;
        $stage = $request->stage;
        $order_sample = $request->order_sample;
        $stage_id = $request->stage_id;
        if($this->checkPermission(Config::get('permissions.ORDER_ALL'))){


            $orders = Order::with('orderitems')->with('user')->get();

            $order_items = OrderItem::with('order')->with('product')->with('artproof')->orderBy('id','desc')->with('cart_item')->with('vendor')->with('stage')->with('order_item_stage');

            // echo $order_items->get();die;
            
            // foreach ($order_items->get() as $order_item) {
            //     echo $order_item->cart_item->cartitemimprint;die;
            // }

            if($stage_id!=""&&$stage_id!="undefined"&&$stage_id!="null"&&$stage_id!=null&&$stage_id!="[]"){
                 $order_items = $order_items->where('stage_id',$stage_id);//Order_item_data
            }
            if($request_order_id!=""&&$request_order_id!="undefined"&&$request_order_id!="null"&&$request_order_id!=null&&$request_order_id!="[]"){
                $order_items = $order_items->where('order_id',$request_order_id);
            }

            if($sub_order_id!=""&&$sub_order_id!="undefined"&&$sub_order_id!="null"&&$sub_order_id!=null&&$sub_order_id!="[]"){

            }

            if($customer_name!=""&&$customer_name!="undefined"&&$customer_name!="null"&&$customer_name!=null&&$customer_name!="[]"){

                $order_ids=$order_items->pluck('order_id');
                $orders=Order::whereIn('id',$order_ids)->whereHas('user',function($q) use($customer_name){
                    $q->where('name', 'like', '%' .$customer_name. '%');
                })->get();
                $new_order_ids = $orders->pluck('id');
                $order_items = $order_items->whereIn('order_id',$new_order_ids);
               
            }

            if($customer_id!=""&&$customer_id!="undefined"&&$customer_id!="null"&&$customer_id!=null&&$customer_id!="[]"){
                $order_items = $order_items->where('user_id',$customer_id);
            }

            if($vendor_id!=""&&$vendor_id!="undefined"&&$vendor_id!="null"&&$vendor_id!=null&&$vendor_id!="[]"){
                $order_items = $order_items->where('vendor_id',$vendor_id);
            }

            if($product_id!=""&&$product_id!="undefined"&&$product_id!="null"&&$product_id!=null&&$product_id!="[]"){
                $order_items = $order_items->where('product_id',$product_id);
            }


            if($creation_from_date!=""&&$creation_from_date!="undefined"&&$creation_from_date!="[]"&&$creation_from_date!="null"&&$creation_from_date!=null&&$creation_to_date!=""&&$creation_to_date!="undefined"&&$creation_to_date!="[]"&&$creation_to_date!="null"&&$creation_to_date!=null){
                $order_items=$order_items->whereBetween('created_at', [$creation_from_date, $creation_to_date]);
            }


            if($check_notes!=""&&$check_notes!="undefined"&&$check_notes!="null"&&$check_notes!=null&&$check_notes!="[]"){
                if($check_notes==1){
                    $order_items=$order_items->whereHas('user_note',function($q) use($check_notes){
                        $q->where('note',"!=","");
                    });
                }elseif($check_notes==0){
                    $order_items=$order_items->whereHas('user_note',function($q) use($check_notes){
                        $q->where('note','==',"");
                    });
                }
            }


            if($frequency!=""&&$frequency!="undefined"&&$frequency!="null"&&$frequency!=null&&$frequency!="[]"){
                $order_items=$order_items->where('created_at', '>', now()->subDays($frequency)->endOfDay());
            }

            if($state!=""&&$state!="undefined"&&$state!="null"&&$state!=null&&$state!="[]"){
               $order_items=$order_items->where('shipping_state',$state);
            }

            if($payment_method!=""&&$payment_method!="undefined"&&$payment_method!="null"&&$payment_method!=null&&$payment_method!="[]"){
                if($payment_method=="not_paid"){
                    $payment_type=0;
                }elseif($payment_method=="paid"){   
                    $payment_type=1;
                }
                $order_items=$order_items->where('not_paid',$payment_type);
            }

            if($stage!=""&&$stage!="undefined"&&$stage!="null"&&$stage!=null&&$stage!="[]"){
                $stage_id = (int) $stage;
                $order_items=$order_items->where('stage_id',$stage_id);
            }


            if($order_sample!=""&&$order_sample!="undefined"&&$order_sample!="null"&&$order_sample!=null&&$order_sample!="[]"){
                
            }

            $order_items = $order_items->get();


        }else{
            return view('user.unauthorized');
        }
        return DataTables::of($orders)->make(true);
    }


    public function getAllDataArt(Request $request){
        $stage_id = $request->stage_id;
        $order_items = OrderItem::where('stage_id',$stage_id)->get();
        $order_item_ids = $order_items->pluck('id');
        $artproofs = ArtProof::whereIn('order_item_id',$order_item_ids)->with('orderitem')->get();
        // echo $artproofs;die;
        return DataTables::of($artproofs)->make(true);
    }

    public function postProductionStageUpdate(Request $request){

            $order_item_id = $request->order_item_id;
            $stage_id = $request->stage_id;
		
            $order_item_find = OrderItem::find($order_item_id);
            $order_item_find->stage_id = $request->stage_id;
            $order_item_find->save();

            $order_id=$order_item_find->order_id;
            $order = Order::where('id',$order_id)->first();
            $user_id = $order->user_id;
            $user = User::where('id',$user_id)->first();
            $user_name = $user->name;
	
		
           
            $order_item_stage = new OrderItemStage;
            $order_item_stage->order_item_id = $order_item_id;
            $order_item_stage->stage_id = $stage_id;
            $order_item_stage->user_id = $user_id;
            $order_item_stage->save();
	

            $stage = Stage::where('id',$stage_id)->first();
            $created_at = date("m-d-Y H:i:s", strtotime($order_item_stage->created_at));
            $data = array('order_item_id'=>$order_item_id,'stage'=>$stage,'user_name'=>$user_name,'created_at'=>$created_at);
            return $data;
    }


    //order items
    public function getAllOrderItems(Request $request){
        $order_id = $request->order_id;
        return view('order.all-order-items')->with('order_id',$order_id);
    }

    public function getAllOrderItemsData(Request $request){
        $order_id = $request->id;
        $order_items = OrderItem::where('order_id',$order_id)->get();
        return DataTables::of($order_items)->make(true);
    }


    //todays orders
    public function getTodays(){
        if(!$this->checkPermission(Config::get('permissions.ORDER_TODAYS'))){
            return view('user.unauthorized');
        }
        return view('order.todays'); 
    }

    public function getTodaysData(Request $request){
        $current_date=date("Y-m-d");
        $orders=[];
        
        if($this->checkPermission(Config::get('permissions.ORDER_TODAYS'))){ 
            if($this->checkPermission(Config::get('permissions.ADMIN_ORDER'))){
                $orders=Order::with('user')->with('order_amount')->with('delivery_status')->with('payment_status')->whereDate('created_at','>=',$current_date)->where('delivery_status_id','!=',2)->orderBy('order_id','desc')->get();
            }
            return DataTables::of($orders)->make(true);

        }else{
            return view('user.unauthorized');
        }
    }

    public function postSetEstimationTime(Request $request){
        $order_id=$request->order_id;
        $user_id=$this->getLoginUserSellerId();
        $expected_date_time="";
        
        if($request->expected_date!="" && $request->expected_time!=""){
            $expected_date_time=date('Y-m-d H:i:s',strtotime("$request->expected_date $request->expected_time"));
        }

        $order=Order::where('user_id',$user_id)->find($order_id);

        if($order!=""){
            $order->expected_date_time=$expected_date_time;
            $order->save();
        }

        flash("Estimation time has been changed");
        return redirect("/admin/order/".$order_id);
    }
    //pending orders`
    public function getPending(){
        if(!$this->checkPermission(Config::get('permissions.ORDER_PENDING'))){
            return view('user.unauthorized');
        }
        return view('order.pending'); 
    }
    
    public function getPendingData(){
        $orders=[];
        
        if($this->checkPermission(Config::get('permissions.ORDER_PENDING'))){

            if($this->checkPermission(Config::get('permissions.ADMIN_ORDER'))){
                $orders=Order::with('user')->with('order_amount')->with('delivery_status')->with('payment_status')->whereNotIn('delivery_status_id',[2,3,5,6])->orderBy('order_id','desc')->get();

            }
            return DataTables::of($orders)->make(true);

        }else{

            return view('user.unauthorized');
        }

    }


    //Delivered
    public function getDelivered(){
        if(!$this->checkPermission(Config::get('permissions.ORDER_DELIVERED'))){
            return view('user.unauthorized');
        }
        return view('order.delivered'); 
    }

    public function getDeliveredData(){
        $orders=[];
        
        if($this->checkPermission(Config::get('permissions.ORDER_DELIVERED'))){
            if($this->checkPermission(Config::get('permissions.ADMIN_ORDER'))){
                $orders=Order::with('user')->with('order_amount')->with('delivery_status')->with('payment_status')->where('delivery_status_id',3)->orderBy('order_id','desc')->get();

            }
            return DataTables::of($orders)->make(true);
        }else{
            return view('user.unauthorized');
        }

    }

    //Cancelled
    public function getCancelled(){
        if(!$this->checkPermission(Config::get('permissions.ORDER_CANCELLED'))){
            return view('user.unauthorized');
        }
        return view('order.cancelled'); 
    }

    public function getCancelledData(){
        $orders=[];
        
        if($this->checkPermission(Config::get('permissions.ORDER_CANCELLED'))){
            if($this->checkPermission(Config::get('permissions.ADMIN_ORDER'))){
                $orders=Order::with('user')->with('order_amount')->with('delivery_status')->with('payment_status')->where('delivery_status_id',2)->orderBy('order_id','desc')->get();
            }
            return DataTables::of($orders)->make(true);
        }else{
            return view('user.unauthorized');
        }

    }


    //return
    public function getReturned(){
        if(!$this->checkPermission(Config::get('permissions.ORDER_DELIVERED'))){
            return view('user.unauthorized');
        }
        return view('order.return'); 
    }

    public function getReturnedData(){
        $orders=[];

             $delivery_status=[5,7,8];
        
        if($this->checkPermission(Config::get('permissions.ORDER_DELIVERED'))){
            if($this->checkPermission(Config::get('permissions.ADMIN_ORDER'))){
                $orders=Order::with('user')->with('order_amount')->with('delivery_status')->with('payment_status')->whereIn('delivery_status_id',$delivery_status)->orderBy('order_id','desc')->get();

            }
            return DataTables::of($orders)->make(true);
        }else{
            return view('user.unauthorized');
        }

    }


        //replacement
    public function getReplacement(){
        if(!$this->checkPermission(Config::get('permissions.ORDER_DELIVERED'))){
            return view('user.unauthorized');
        }
        return view('order.replacement'); 
    }

    public function getReplacementData(){
        $orders=[];
        
        if($this->checkPermission(Config::get('permissions.ORDER_DELIVERED'))){
           
                $orders=Order::with('user')->with('order_amount')->with('delivery_status')->with('payment_status')->where('delivery_status_id',6)->orderBy('order_id','desc')->get();

            
            return DataTables::of($orders)->make(true);
        }else{
            return view('user.unauthorized');
        }

    }




    //invoice
       public function getinvoice($id){
        
        $order_id=$id;
        $login_user_seller_id=$this->getLoginUserSellerId();
        $order=Order::find($id);
        $discount_applied=DiscountApplied::where('global_order_id',$order->global_order_id)->first();
        $global_orders=Order::where('global_order_id',$order->global_order_id)->with('order_amount')->get();

        if(!$this->checkPermission("ORDER_ALL")){
            return redirect('admin/order/all');
        }else{
            if($order==""){
                return redirect('admin/order/all');
            }
        }   

        $admin=User::where('role_id',1)->first();

        $customer_id=$order->user_id;

        $customer=User::find($customer_id);

        $delivery_statuses=DeliveryStatus::whereNotIn('delivery_status_id',[2,3,5,6])->where('status_id',1)->with('default_delivery_status_translation')->get();

        $order_products=OrderProduct::where('order_id',$order_id)->with('product')->with('category')->with('brand')->with('user')->with('parent_variant')->with('child_variant')->get();

        $get_order_product_ids=$order_products->pluck('order_product_id');

        

        $global_order=GlobalOrder::find($order->global_order_id);

        $terms=TermCondition::with('default_term_condition_translation')->get();

        $delivery_vendors=DeliveryVendor::where('delivery_vendor_id','!=',1)->get();

        $seller=User::find(1);

        $get_sku=Sku::all();

        return view('order.invoice')->with('order_products',$order_products)->with('customer',$customer)->with('order',$order)->with('admin',$admin)->with('delivery_statuses',$delivery_statuses)->with('seller',$seller)->with('terms',$terms)->with('global_orders',$global_orders)->with('discount_applied',$discount_applied)->with('delivery_vendors',$delivery_vendors)->with('global_order',$global_order)->with('get_sku',$get_sku);

    }
    public function getinvoiceData(Request $request){
        $user_id=$request->id;
        $order_id=$request->order_id;
        

        $order_logs=OrderLog::with('user')->orderBy('created_at','desc')->where('order_id',$order_id);

        return DataTables::of($order_logs)->make(true);
    }

    public function updateDeliveryVendor($order_id,$delivery_vendor_id){
     if(!$this->checkPermission(Config::get('permissions.ORDER_UPDATE'))){
        return view('user.unauthorized');
    }
   
    
    $order=Order::find($order_id);
    if($order!=""){
        $order->delivery_vendor_id=$delivery_vendor_id;
        flash("Delivery vendor assigned successfully to your order ");
        $order->save();
    }
    
    return redirect('admin/order/'.$order_id); 


}

    // mark order paid
public function getMarkPaid($id){
    if(!$this->checkPermission(Config::get('permissions.ORDER_UPDATE'))){
        return view('user.unauthorized');
    }

    $login_user_id=Auth::user()->id;

    $payment_status_id=3;
    

    $order=Order::find($id);
    $order_status_id=$order->delivery_status_id;
    $order_status=DeliveryStatus::find($order_status_id);
    $order_status_translation=DeliveryStatusTranslation::find($order_status->delivery_status_translation_id);
    $order_status_name=$order_status_translation->delivery_status_name;

    $order->payment_status_id=$payment_status_id;
    $email=$order->delivery_email;
    $order->save();

    $user_id=$order->user_id;
    $user=User::find($user_id);
    $name=$user->name;

    $contact_number=$user->contact_number;

    $order_id=$order->order_id;

    $global_order_id=$order->global_order_id;

    $payment_status_name=PaymentStatus::find($payment_status_id)->payment_status_name;

    $global_order=GlobalOrder::find($global_order_id);

    $shipping_amount=$global_order->shipping_amount;

   // code of appearance
    $carts=Cart::where('user',$id)->get(); 
    
    // code of appearance
    $delivery_address=$order->delivery_address;
    $order_date=$order->created_at;

   

    $global_order_id=$order->global_order_id;
    $global_order=GlobalOrder::find($global_order_id);
    $shipping_amount=$global_order->shipping_amount;


    $order_products=OrderProduct::with('product')->where('order_id',$order_id)->get();

    $check = $this->checkEmail($email);
    if ($check){
        $object=array('name'=>$name,'email'=>$email,'contact_number'=>$contact_number,'seller_email'=>$seller_email,'app_name'=>$app_name,'subject1'=>$app_name." - Payment Status ".  $payment_status_name,'app_logo'=>$app_logo,'app_back_color'=>$app_back_color,'tag_line'=>$tag_line,'order_id'=>$order_id,'subject2'=>$app_name.' - Payment Status '.$payment_status_name,'payment_status_name'=>$payment_status_name,'app_text_color'=>$app_text_color,'order_products'=>$order_products,'delivery_address'=>$delivery_address,'order_id'=>$order_id,'order_date'=>$order_date,'shipping_amount'=>$shipping_amount,'global_order_id'=>$global_order_id);
        $this->paymentStatusPaid($object);
    }



            // $client = new \GuzzleHttp\Client();
            // $msg_sender_id=$this->appearance->msg_sender_id;
            // $msg_api_key=$this->appearance->msg_api_key;
            // $contact_number=User::find($order->user_id)->contact_number;
            // $client->get('http://sms.vshop.co.in/api/mt/SendSMS?apikey='.$msg_api_key.'&senderid='.$msg_sender_id.'&channel=Trans&DCS=0&flashsms=0&number='.$contact_number.'&text='.$app_name.'('.$tag_line.') Your order Marked as a Paid &route=6')->getBody();
    
 
    $order_status_new_id=$order->delivery_status_id;
    $order_status_new=DeliveryStatus::find($order_status_new_id);
    $order_status_translation_new=DeliveryStatusTranslation::find($order_status_new->delivery_status_translation_id);
    $order_status_name_new=$order_status_translation_new->delivery_status_name;

    $order_log=new OrderLog();
    $order_log->order_id=$order->order_id;
    $order_log->global_order_id=$order->global_order_id;
    
    $order_log->order_log="Order status changed to " .$order_status_name_new. " & Paid from ".$order_status_name;
    $order_log->status_changed_by=$login_user_id;

    $order_log->save();
    flash("Marked order as paid successfully");
    return redirect('admin/order/'.$id); 
}

    // mark paid and delivered
public function getMarkPaidDelivered($id){

    if(!$this->checkPermission(Config::get('permissions.ORDER_UPDATE'))){
        return view('user.unauthorized');
    }
    $login_user_id=Auth::user()->id;
    
    $order=Order::find($id);

    $order_status_id=$order->delivery_status_id;
    $order_status=DeliveryStatus::find($order_status_id);
    $order_status_translation=DeliveryStatusTranslation::find($order_status->delivery_status_translation_id);
    $order_status_name=$order_status_translation->delivery_status_name;

    $order->delivery_status_id=3;
    $order->payment_status_id=3;
    $email=$order->delivery_email;
    $order->save();
    $user_id=$order->user_id;
    $user=User::find($user_id);
    $name=$user->name;

    $contact_number=$user->contact_number;
    $order_id=$order->order_id;
     // code of appearance


   
     // code of appearance
    $delivery_address=$order->delivery_address;
    $order_date=$order->created_at;

   

    $order_products=OrderProduct::with('product')->where('order_id',$order_id)->get();



    $global_order_id=$order->global_order_id;
    $global_order=GlobalOrder::find($global_order_id);
    $shipping_amount=$global_order->shipping_amount;


        // sms
   
            // $client = new \GuzzleHttp\Client();
            // $msg_sender_id=$this->appearance->msg_sender_id;
            // $msg_api_key=$this->appearance->msg_api_key;
            // $contact_number=User::find($order->user_id)->contact_number;
            // $client->get('http://sms.vshop.co.in/api/mt/SendSMS?apikey='.$msg_api_key.'&senderid='.$msg_sender_id.'&channel=Trans&DCS=0&flashsms=0&number='.$contact_number.'&text='.$app_name.'('.$tag_line.') Your order Marked as a Paid and Delivered&route=6')->getBody();
     

    // $check = $this->checkEmail($email);
    // if ($check){
    //     $object=array('name'=>$name,'email'=>$email,'contact_number'=>$contact_number,'seller_email'=>$seller_email,'app_name'=>$app_name,'subject1'=>$app_name." - Your Order Has Been Deliverd and Paid ",'app_logo'=>$app_logo,'app_back_color'=>$app_back_color,'tag_line'=>$tag_line,'order_id'=>$order_id,'subject2'=>$app_name.' - Order Has Been Deliverd And Paid','app_text_color'=>$app_text_color,'admin_address'=>$admin_address,'admin_contact_number'=>$admin_contact_number,'appearance_email'=>$appearance_email,'order_products'=>$order_products,'delivery_address'=>$delivery_address,'order_id'=>$order_id,'order_date'=>$order_date,'shipping_amount'=>$shipping_amount,'$global_order_id'=>$global_order_id);
    //     $this->paidDeliverMail($object);
    // }


    $order_status_new_id=$order->delivery_status_id;
    $order_status_new=DeliveryStatus::find($order_status_new_id);
    $order_status_translation_new=DeliveryStatusTranslation::find($order_status_new->delivery_status_translation_id);
    $order_status_name_new=$order_status_translation_new->delivery_status_name;

    $order_log=new OrderLog();
    $order_log->order_id=$order->order_id;
    $order_log->global_order_id=$order->global_order_id;
    
    $order_log->order_log="Order status changed to " .$order_status_name_new. " & Paid from ".$order_status_name;
    $order_log->status_changed_by=$login_user_id;

    $order_log->save();

    flash('Marked Order Paid & Delivered Successfully');
    return redirect('admin/order/delivered');  
}    

public function getMarkOther($order_id,$delivery_status_id, Request $request){
    if(!$this->checkPermission(Config::get('permissions.ORDER_UPDATE'))){
        return view('user.unauthorized');
    }
    $login_user_id=Auth::user()->id;

    
    $order=Order::find($order_id);

    $order_status_id=$order->delivery_status_id;
    $order_status=DeliveryStatus::find($order_status_id);
    $order_status_translation=DeliveryStatusTranslation::find($order_status->delivery_status_translation_id);
    $order_status_name=$order_status_translation->delivery_status_name;

    $order_id=$order->order_id;
    if($delivery_status_id==2){
        $order_product=OrderProduct::where('order_id',$order_id)->first();
        $sku=Sku::where('product_id',$order_product->product_id)->first();
        $quantity=$order_product->quantity + $sku->quantity;
        $sku->quantity=$quantity;
        $order->order_cancellation_reason=$request->cancel_reason;
        $sku->save();
    } 

    $order->delivery_status_id=$delivery_status_id;
    $email=$order->delivery_email;
    $order->save();

    $status=DeliveryStatus::with('default_delivery_status_translation')->find($delivery_status_id);
    $delivery_status= $status->default_delivery_status_translation->delivery_status_name;


    $user_id=$order->user_id;

    $global_order_id=$order->global_order_id;
    $global_order=GlobalOrder::find($global_order_id);
    $shipping_amount=$global_order->shipping_amount;
    $user=User::find($user_id);
    $name=$user->name;

    $contact_number=$user->contact_number;
    $order_id=$order->order_id;    
    // code of appearance

   
     // code of appearance

    $delivery_address=$order->delivery_address;
    $order_date=$order->created_at;

    $global_order_id=$order->global_order_id;
    $global_order=GlobalOrder::find($global_order_id);
    $shipping_amount=$global_order->shipping_amount;

    $order_products=OrderProduct::with('product')->where('order_id',$order_id)->get();

    
        $client = new \GuzzleHttp\Client();

    $app_name="SWAAS ENTERPRISES PRIVATE LIMITED";
            $app_logo="";
            $appearance_email="care@swaaslife.com";
            $app_back_color="f9e7dc";
            $tag_line="Swaas Enterprises pvt ltd";
            $app_text_color="#000000";
            $admin_contact_number="+919597155255";
            $admin_address="2/316 Kungumapalayam Pirivu, Naranapuram Post, Palladam 641664 Tamilnadu, INDIA";
            $seller_email="it@bkstextiles.in";

             try{
                if ($delivery_status_id==1) {
               $client->get('https://2factor.in/API/R1/?module=TRANS_SMS&apikey=b4a112ac-c78c-11eb-8089-0200cd936042&to='.$contact_number.'&from=iSWAAS&msg=Hi '.$name.'. Your order with no. '.$order_id.' is still pending at our end and will be dispatched soon. Thank you for your patience.')->getBody();
               
            }elseif ($delivery_status_id==4) {
               
               $client->get('https://2factor.in/API/R1/?module=TRANS_SMS&apikey=b4a112ac-c78c-11eb-8089-0200cd936042&to='.$contact_number.'&from=iSWAAS&msg=Hi '.$name.'. Your Swaas Package with Order no. '.$order_id.' will be in your hands soon as its out for delivery.')->getBody();
            }elseif ($delivery_status_id==3) {
              
               $client->get('https://2factor.in/API/R1/?module=TRANS_SMS&apikey=b4a112ac-c78c-11eb-8089-0200cd936042&to='.$contact_number.'&from=iSWAAS&msg=Hi '.$name.'. The Swaas package with Order no. '.$order_id.' is delivered. Follow us on social media to stay in touch and leave us a review for a chance to win more sustainable goodies!')->getBody();
            }else{
                $client->get('https://2factor.in/API/R1/?module=TRANS_SMS&apikey=b4a112ac-c78c-11eb-8089-0200cd936042&to='.$contact_number.'&from=iSWAAS&msg=Hi '.$name.'. Your Order with Order Id -'.$order_id.' is '.$delivery_status.' . Thank You')->getBody();
            }
            }catch (\Exception $e) {
            
            }
            
  
   
        $object=array('name'=>$name,'email'=>$email,'contact_number'=>$contact_number,'seller_email'=>$seller_email,'app_name'=>$app_name,'subject1'=>$app_name.' - Your Order Status '.$delivery_status,'app_logo'=>$app_logo,'app_back_color'=>$app_back_color,'tag_line'=>$tag_line,'order_id'=>$order_id,'subject2'=>$app_name.' - Order Status '.$delivery_status,'delivery_status'=>$delivery_status,'app_text_color'=>$app_text_color,'admin_address'=>$admin_address,'admin_contact_number'=>$admin_contact_number,'appearance_email'=>$appearance_email,'order_products'=>$order_products,'delivery_address'=>$delivery_address,'order_id'=>$order_id,'order_date'=>$order_date,'shipping_amount'=>$shipping_amount,'global_order_id'=>$global_order_id);

        $this->otherOrderStatus($object);
    

    

    $order_status_new_id=$order->delivery_status_id;
    $order_status_new=DeliveryStatus::find($order_status_new_id);
    $order_status_translation_new=DeliveryStatusTranslation::find($order_status_new->delivery_status_translation_id);
    $order_status_name_new=$order_status_translation_new->delivery_status_name;

    $order_log=new OrderLog();
    $order_log->order_id=$order->order_id;
    $order_log->global_order_id=$order->global_order_id;
    
    $order_log->order_log="Order status changed to " .$order_status_name_new.  " from ".$order_status_name;
    $order_log->status_changed_by=$login_user_id;

    $order_log->save();

    flash('Marked Order '.$delivery_status.' Successfully', 'success');
    return redirect('admin/order/'.$order_id);
}

    // cancell order
public function postCancelOrder($order_id,$delivery_status_id, Request $request){
    if(!$this->checkPermission(Config::get('permissions.ORDER_UPDATE'))){
        return view('user.unauthorized');
    }
    $login_user_id=Auth::user()->id;
    
    $order=Order::find($order_id);
    $order_id=$order->order_id;

    $order_status_id=$order->delivery_status_id;
    $order_status=DeliveryStatus::find($order_status_id);
    $order_status_translation=DeliveryStatusTranslation::find($order_status->delivery_status_translation_id);
    $order_status_name=$order_status_translation->delivery_status_name;

    if($order->delivery_status_id!=2){
        if($delivery_status_id==2){
            $order_products=OrderProduct::where('order_id',$order_id)->get();
            foreach ($order_products as $order_product) {
                $sku=Sku::where('sku_id',$order_product->sku_id)->first();
                $quantity=$order_product->quantity + $sku->quantity;
                $sku->quantity=$quantity;
                $sku->save();
                $order->order_cancellation_reason=$request->cancel_reason;
            }

        }
    }

    $order->delivery_status_id=$delivery_status_id;
    $email=$order->delivery_email;
    $order->save();

    $status=DeliveryStatus::with('default_delivery_status_translation')->find($delivery_status_id);
    $delivery_status= $status->default_delivery_status_translation->delivery_status_name;


    $user_id=$order->user_id;
    $user=User::find($user_id);
    $name=$user->name;

    $contact_number=$user->contact_number;
    $order_id=$order->order_id;    
    // code of appearance

   
    // code of appearance

    $delivery_address=$order->delivery_address;
    $order_date=$order->created_at;

    $order_products=OrderProduct::with('product')->where('order_id',$order_id)->get();

    $global_order_id=$order->global_order_id;
    $global_order=GlobalOrder::find($global_order_id);
    $shipping_amount=$global_order->shipping_amount;

     $app_name="SWAAS ENTERPRISES PRIVATE LIMITED";
            $app_logo="";
            $appearance_email="care@swaaslife.com";
            $app_back_color="f9e7dc";
            $tag_line="Swaas Enterprises pvt ltd";
            $app_text_color="#000000";
            $admin_contact_number="+919597155255";
            $admin_address="2/316 Kungumapalayam Pirivu, Naranapuram Post, Palladam 641664 Tamilnadu, INDIA";
            $seller_email="it@bkstextiles.in";

           

   
        $object=array('name'=>$name,'email'=>$email,'contact_number'=>$contact_number,'seller_email'=>$seller_email,'app_name'=>$app_name,'subject1'=>$app_name.' - Your Order Status '.$delivery_status,'app_logo'=>$app_logo,'app_back_color'=>$app_back_color,'tag_line'=>$tag_line,'order_id'=>$order_id,'subject2'=>$app_name.' - Order Status '.$delivery_status,'delivery_status'=>$delivery_status,'app_text_color'=>$app_text_color,'admin_address'=>$admin_address,'admin_contact_number'=>$admin_contact_number,'appearance_email'=>$appearance_email,'order_products'=>$order_products,'delivery_address'=>$delivery_address,'order_id'=>$order_id,'order_date'=>$order_date,'shipping_amount'=>$shipping_amount,'global_order_id'=>$global_order_id);
        $this->otherOrderStatus($object);
    
    $order_status_new_id=$order->delivery_status_id;
    $order_status_new=DeliveryStatus::find($order_status_new_id);
    $order_status_translation_new=DeliveryStatusTranslation::find($order_status_new->delivery_status_translation_id);
    $order_status_name_new=$order_status_translation_new->delivery_status_name;
     $client = new \GuzzleHttp\Client();

 $client->get('https://api.textlocal.in/send/?apikey=Q1IOFKXv6Xc-Jyncy09Q9fnUgTQzPI3UbfE8UE35of&numbers='.$contact_number.'&sender=iSWAAS&message=Hi '.$name.'.  Your Order with Order Id -'.$order_id.' is '.$delivery_status.' . Thank You')->getBody();
   
    

    $order_log=new OrderLog();
    $order_log->order_id=$order->order_id;
    $order_log->global_order_id=$order->global_order_id;
    
    $order_log->order_log="Order status changed to " .$order_status_name_new.  " from ".$order_status_name;
    $order_log->status_changed_by=$login_user_id;

    $order_log->save();
    flash('Marked Order '.$delivery_status.' Successfully', 'success');
    return redirect('admin/order/'.$order_id);
}



public function getProductVariants(Request $request){
    if($this->checkPermission(Config::get('permissions.CREATE_ORDER'))){
        $product_id=$request->product_id;
        
        $skus=Sku::where('product_id',$product_id)
        ->with(['parent_variant' => function($query){
            $query->with('default_variant_option_translation');
        }])
        ->with(['child_variant' => function($query){
            $query->with('default_variant_option_translation');
        }])
        ->with(['product'=> function($query) use ($language_id){
            $query->with('default_product_translation');
        }])
        ->get();
        return $skus;
    }
    else{
        return view('user.unauthorized');
    }
}

public function addToCart(Request $request){
    if($this->checkPermission(Config::get('permissions.CREATE_ORDER'))){
        $sku_id=$request->sku_id;
        $customer_id=$request->customer_id;
        $quantity=$request->quantity;
        
        if($quantity==""){
            $data=array('msg' => "Please add Quantity first","data"=>"");
            return $data;   
        }
        $available_in_cart=Cart::where('user',$customer_id)->where('sku_id',$sku_id)->first();
        if($available_in_cart!=""){
            $data=array('msg'=>"Already available in cart","data"=>"");
            return $data;
        }

        $new_cart=new Cart();
        
        $new_cart->user=$customer_id;
        $new_cart->sku_id=$sku_id;
        $new_cart->quantity=$quantity;
        $new_cart->source_id=4;
        $new_cart->save();

        $updated_cart_items=Cart::where('user',$customer_id)->with(['sku'=>function($query){
            $query->with(["product"=>function($query){
                $query->with("default_product_translation");
            }])->with(["parent_variant"=>function($query){
                $query->with("default_variant_option_translation");
            }])->with(["child_variant"=>function($query){
                $query->with("default_variant_option_translation");
            }]);
        }])->get();

        $this->response['data']=$updated_cart_items;
        $this->response['msg']='Product added to cart';
        $this->response['status']='true';

        return $this->response;
    }
    else{
        return view('user.unauthorized');
    }
}

public function deleteCartItem(Request $request){
  /*  if($this->checkPermission(Config::get('permissions.CREATE_ORDER'))){*/

    $data=array('msg' =>"Something went wrong", "data"=>"");
    

    $cart_id=$request->cart_id;
    $cart_item=Cart::find($cart_id);
    $customer_id=$cart_item->user;
    $deleted=Cart::find($cart_id)->delete();
    if($deleted==1){
        $already_carts=Cart::where('user',$customer_id)->with(['sku'=>function($query){
            $query->with(["product"=>function($query){
                $query->with("default_product_translation");
            }])->with(["parent_variant"=>function($query){
                $query->with("default_variant_option_translation");
            }])->with(["child_variant"=>function($query){
                $query->with("default_variant_option_translation");
            }]);
        }])->get();

        $cart_count=$already_carts->count();

        $this->response['data']=$already_carts;
        $this->response['cart_count']=$cart_count;
        $this->response['msg']='Deleted cart item successfully';
        $this->response['status']='true';

    }else{
        $this->response['msg']='Not available in cart list';
    }
    return $this->response;
        /* }
       else{
            return view('user.unauthorized');
        }*/
    }

    public function changeQuantity(Request $request){
        if($this->checkPermission(Config::get('permissions.CREATE_ORDER'))){

            $quantity=$request->quantity;
            $cart_id=$request->cart_id;
            $customer_id=$request->customer_id;
            

            $cart=Cart::find($cart_id);

            if($cart!=""){
                $cart->quantity=$quantity;
                $cart->save();
                $already_carts=Cart::where('user',$customer_id)->with(['sku'=>function($query){
                    $query->with(["product"=>function($query){
                        $query->with("default_product_translation");
                    }])->with(["parent_variant"=>function($query){
                        $query->with("default_variant_option_translation");
                    }])->with(["child_variant"=>function($query){
                        $query->with("default_variant_option_translation");
                    }]);
                }])->get();

                $this->response['data']=$already_carts;
                $this->response['msg']='Quantity updated successfully';
                $this->response['status']='true';
            }
            return $this->response;
        }
        else{
            return view('user.unauthorized');
        }
    }

   


    public function postOrderTrackingNumber(Request $request){
       if(!$this->checkPermission(Config::get('permissions.ORDER_UPDATE'))){
        return view('user.unauthorized');
    }
    
    $order_id=$request->order_id;
    $tracking_number=$request->tracking_number;
    
    $order=Order::find($order_id);
    if($order!=""){
        $order->tracking_number=$tracking_number;
        $order->save();
        flash("Tracking Number Added Successfully");
    }
    
    return $order; 
}

public function getOrderLog(){

   if(!$this->checkPermission(Config::get('permissions.ORDER_DELIVERED'))){
    return view('user.unauthorized');
}
return view('order.orderLog'); 

}


public function reorders_confirm(Request $request)
{
  $id = $request->id;
  $result =  Order::where('id','52139')->update(
    array('is_reorder'=>3,
   ));

  return $id;
}

public function getOrderLogData(Request $request){

    

    if($this->checkPermission(Config::get('permissions.ORDER_ALL'))){
        $date_from=$request["date_from"];
        $date_to=$request["date_to"];
        $order_logs=[];

        $order_logs=OrderLog::with('user')->orderBy('created_at','desc');

    }else{
        return view('user.unauthorized');
    }

    if($date_from!=""){
        $order_logs=$order_logs->whereDate("created_at",">=",$date_from);
    }
    if($date_to!=""){
        $order_logs=$order_logs->whereDate("created_at","<=",$date_to);
    }

    return DataTables::of($order_logs)->make(true);

}


}
