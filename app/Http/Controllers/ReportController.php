<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Order;
use App\OrderProduct;
use Auth;
use App\User;
use App\Source;
use Carbon\Carbon;
use App\Product;
use App\Cart;
use App\Wishlist;
use DB;
use App\Transaction;
use Config;
use App\Brand;
use App\Vendor;
use DataTables;
use App\City;
use App\Country;
use App\State;
use App\Pincode;
use App\Sku;
use App\Transaction_type;
use App\DeliveryStatus;
use Excel;
use App\WalletTransaction;
use App\Toast;
use Mail;

class ReportController extends Controller
{
	public function getReports(Request $request){

		$blogs=[]; 	
		// $connected = @fsockopen("www.swaas.com", 80); 


		/*if ($connected) {
			$client = new \GuzzleHttp\Client();
			$blogs= $client->post('https://swaas.com/blogs')->getBody();
			$blogs = json_decode($blogs);
		}*/
		if($this->checkPermission(Config::get('permissions.DASHBOARD'))){
			$current_date=date('Y-m-d');

			
			$todays_order_count=Order::whereDate('created_at','>=',$current_date)->count();

			$todays_cart_count=Cart::whereDate('created_at','>=',$current_date)->sum('id');

            //Total wishlist count
			$todays_wishlist_count=Wishlist::whereDate('created_at','>=',$current_date)->count();

			$todays_sales_count=1000;

			$product_count=Product::count();
		}else if($this->checkPermission(Config::get('permissions.SELLER_DASHBOARD'))){
            //seller
			$login_user_seller_id=Auth::user()->seller_id;
			$current_date=date('Y-m-d');
			$todays_order_count=Order::whereDate('created_at','>=',$current_date)->where('seller_id',$login_user_seller_id)->count();

			$todays_cart_count=Cart::whereDate('created_at','>=',$current_date)->sum('id');

           //Todays wishlist count
			$todays_wishlist_count=Wishlist::with('sku')->whereDate('created_at','>=',$current_date)->whereHas('sku',function($product) use ($login_user_seller_id){
				$product->whereHas('product',function($query) use ($login_user_seller_id){
					$query->where('seller_id',$login_user_seller_id);
				});	
			})->count();

            //todays_cart
			$todays_cart_count=Cart::with('sku')->whereDate('created_at','>=',$current_date)->whereHas('sku',function($product) use ($login_user_seller_id){
				$product->whereHas('product',function($query) use ($login_user_seller_id){
					$query->where('seller_id',$login_user_seller_id);
				});	
			})->sum('id');

             //todays_sales
			$todays_sales_count=1000;

			$product_count=Product::count();
		}else{
			return redirect('/');
		}

		return view('admin.home')->with('blogs',$blogs)->with('product_count',$product_count)->with('todays_order_count',$todays_order_count)->with('todays_cart_count',$todays_cart_count)->with('todays_wishlist_count',$todays_wishlist_count)->with('todays_sales_count',$todays_sales_count);
	}

	public function getYearFilter(Request $request){
		$current_date=date('Y-m-d');
		$d = date_parse_from_format("Y-m-d", $current_date);
		$current_month=$d["month"];	
		$current_day=$d['day'];
		$year=$request->year;  



		$months=[];
		for($i=12;$i>=1;$i--){
			$current_month=date('Y-m-d', strtotime('-'.$i.' month'));
			$next_month= date('Y-m-d', strtotime($current_month . ' +1 month'));

			$month_orders=Order::whereDate('created_at','>=',$current_month)->where('created_at','<',$next_month)->where('created_at','==',$year);

			$month_orders=$month_orders->count();
             // $day = date('F',strtotime($current_date));   //retrives a month name 
			$itm = array('y'=>$current_month,
				'a'=>$month_orders+rand(10,100));
			array_push($months,$itm);
		}
		return $months;
	}

	public function getDashboard(Request $request){
		
		if($this->checkPermission(Config::get('permissions.DASHBOARD'))){
			$seller_id=$request->seller_id;

			if ($seller_id!="") {

                //Today's order count
				$current_date=date('Y-m-d');
				$current_date_time=$current_date." 00:00:00";
				$todays_order_count=Order::where('seller_id',$seller_id)->whereDate('created_at','>=',$current_date_time)->count();

                //All order count
				$all_order_count=Order::where('seller_id',$seller_id)->count();

                  //Total product count
				$total_product_count=Product::where('status_id','!=',2)->where('seller_id',$seller_id)->count();

                //Total customers
				$total_customer_count=User::where('role_id',6)->count();

                //Today's cart count
				$todays_cart_count=Cart::with('sku')->whereDate('created_at','>=',$current_date_time)->whereHas('sku',function($product) use ($seller_id){
					$product->whereHas('product',function($query) use ($seller_id){
						$query->where('seller_id',$seller_id);
					});	
				})->sum('id');

                // $todays_cart_count=Cart::whereDate('created_at','>=',$current_date_time)->count();



                //Total cart count
				$total_cart_count=Cart::with('sku')->whereHas('sku',function($product) use ($seller_id){
					$product->whereHas('product',function($query) use ($seller_id){
						$query->where('seller_id',$seller_id);
					});	
				})->sum('id');
                  // $total_cart_count=Cart::count();

                  //Today's wishlist count

				$todays_wishlist_count=Wishlist::with('sku')->whereDate('created_at','>=',$current_date_time)->whereHas('sku',function($product) use ($seller_id){
					$product->whereHas('product',function($query) use ($seller_id){
						$query->where('seller_id',$seller_id);
					});	
				})->count();
                 //Total wishlist count

				$total_wishlist_count=Wishlist::with('sku')->whereHas('sku',function($product) use ($seller_id){
					$product->whereHas('product',function($query) use ($seller_id){
						$query->where('seller_id',$seller_id);
					});	
				})->count();

                   //total_sales

				$total_sales_count=1000;

				$current_date=date('Y-m-d');
				$d = date_parse_from_format("Y-m-d", $current_date);
				$current_month=$d["month"];	
				$current_day=$d['day'];


                // last seven day revenue
				$last_seven_day_revenue=array();

				for($i=6;$i>=0;$i--){

					$seven_date=date('Y-m-d', strtotime('-'.$i.' days'));

					$time=strtotime($seven_date);
					$month=date("M",$time);
					$day=date("d",$time);

					$transaction_amount_sum=1000;

					$ends = array('th','st','nd','rd','th','th','th','th','th','th');
					if (($day %100) >= 11 && ($day%100) <= 13)
						$abbreviation = $day. 'th';
					else
						$abbreviation = $day. $ends[$day % 10];

					$data=[
						"label"=>$abbreviation.' '.$month,
						"value"=>$transaction_amount_sum
					];
					array_push($last_seven_day_revenue, $data);
				}
              

               // last seven day order count
				$last_seven_day_order_count=array();

				for($i=6;$i>=0;$i--){

					$seven_date=date('Y-m-d', strtotime('-'.$i.' days'));

					$time=strtotime($seven_date);
					$month=date("M",$time);
					$day=date("d",$time);

					$order_count = Order::where('seller_id',$seller_id)->whereDate('created_at', '=', $seven_date)->count();

					$ends = array('th','st','nd','rd','th','th','th','th','th','th');
					if (($day %100) >= 11 && ($day%100) <= 13)
						$abbreviation = $day. 'th';
					else
						$abbreviation = $day. $ends[$day % 10];

					$data=[
						"label"=>$abbreviation.' '.$month,
						"value"=>$order_count
					];
					array_push($last_seven_day_order_count, $data);
				}


				/*12 month revenue*/
				$month_wise_revenue=array();
				$labels=["January","February","March","April","May","June","July","August","September","October","November","December"];
				$colors=["#FF9F55","#FEC811",'#4C5667','#01C0C8','#FF0084','#007BB6','#FF9F55','#FEC811','#4C5667','#01C0C8','#FF0084','#007BB6'];
				$year=date("Y");
				for($i=1;$i<=12;$i++){
					$order_count =10;
					$data=[
						"label"=>$labels[$i-1],
						"value"=>$order_count,
						"color"=>$colors[$i-1]
					];

					array_push($month_wise_revenue, $data);

					
				}
                 


				$months=[];
				for($i=12;$i>=1;$i--){
					$current_month=date('Y-m-d', strtotime('-'.$i.' months'));
					$next_month= date('Y-m-d', strtotime($current_month . ' +1 month'));

					$month_orders=Order::where('seller_id',$seller_id)->whereDate('created_at','>=',$current_month)->where('created_at','<',$next_month);

					$month_orders=$month_orders->count();
                  // $day = date('F',strtotime($current_date));   //retrives a month name 
					$itm = array('y'=>$current_month,
						'a'=>$month_orders+rand(10,100));
					array_push($months,$itm);



				}

				$customer=[];
				for($i=6;$i>=0;$i--){
					$current_date=date('Y-m-d', strtotime('-'.$i.' days'));
					$next_date= date('Y-m-d', strtotime($current_date . ' +1 day'));

					$seven_days_orders=User::whereDate('created_at','>=',$current_date)->where('created_at','<',$next_date);

					$seven_days_order_count=$seven_days_orders->count();
					$day = date('D',strtotime($current_date));
					$item = array($day,
						$seven_days_order_count+rand(10,100));
					array_push($customer,$item);
				}
			}else{
				

            //Today's order count
				$current_date=date('Y-m-d');
				$current_date_time=$current_date." 00:00:00";
				$todays_order_count=Order::whereDate('created_at','>=',$current_date_time)->count();

            //All order count
				$all_order_count=Order::count();

              //Total product count
				$total_product_count=Product::where('status_id','!=',2)->count();

                //Total customers
				$total_customer_count=User::where('role_id',6)->count();

                //Today's cart count
				$todays_cart_count=Cart::whereDate('created_at','>=',$current_date_time)->sum('id');

                   //Total cart count
				$total_cart_count=Cart::sum('id');

                  //Today's wishlist count
				$todays_wishlist_count=Wishlist::whereDate('created_at','>=',$current_date_time)->count();

                   //Total wishlist count
				$total_wishlist_count=Wishlist::count();

                 //total_sales
				$total_sales_count=1000;

				$current_date=date('Y-m-d');
				$d = date_parse_from_format("Y-m-d", $current_date);
				$current_month=$d["month"];	
				$current_day=$d['day'];

                // last seven day revenue
				$last_seven_day_revenue=array();

				for($i=6;$i>=0;$i--){

					$seven_date=date('Y-m-d', strtotime('-'.$i.' days'));

					$time=strtotime($seven_date);
					$month=date("M",$time);
					$day=date("d",$time);

					$transaction_amount_sum=1000;

                   // $transaction_amount_sum = Transaction::whereDate('created_at', '=', $seven_date)->sum('transaction_amount');

					$ends = array('th','st','nd','rd','th','th','th','th','th','th');
					if (($day %100) >= 11 && ($day%100) <= 13)
						$abbreviation = $day. 'th';
					else
						$abbreviation = $day. $ends[$day % 10];

					$data=[
						"label"=>$abbreviation.' '.$month,
						"value"=>$transaction_amount_sum
					];
					array_push($last_seven_day_revenue, $data);
				}

                // last seven day order count
				$last_seven_day_order_count=array();

				for($i=6;$i>=0;$i--){

					$seven_date=date('Y-m-d', strtotime('-'.$i.' days'));

					$time=strtotime($seven_date);
					$month=date("M",$time);
					$day=date("d",$time);

					$order_count = Order::whereDate('created_at', '=', $seven_date)->count();

					$ends = array('th','st','nd','rd','th','th','th','th','th','th');
					if (($day %100) >= 11 && ($day%100) <= 13)
						$abbreviation = $day. 'th';
					else
						$abbreviation = $day. $ends[$day % 10];

					$data=[
						"label"=>$abbreviation.' '.$month,
						"value"=>$order_count
					];
					array_push($last_seven_day_order_count, $data);
				}

				/*12 month revenue*/
				$month_wise_revenue=array();
				$labels=["January","February","March","April","May","June","July","August","September","October","November","December"];
				$colors=["#FF9F55","#FEC811",'#4C5667','#01C0C8','#FF0084','#007BB6','#FF9F55','#FEC811','#4C5667','#01C0C8','#FF0084','#007BB6'];
				$year=date("Y");
				for($i=1;$i<=12;$i++){

					$order_count =1000;

	                /*$order_count = Transaction::whereYear('created_at', '=', $year)
	                ->whereMonth('created_at', '=', $i)
	                ->sum('transaction_amount');*/

	                $data=[
	                	"label"=>$labels[$i-1],
	                	"value"=>$order_count,
	                	"color"=>$colors[$i-1]
	                ];



	                array_push($month_wise_revenue, $data);
	            }


	            $months=[];
	            for($i=12;$i>=1;$i--){
	            	$current_month=date('Y-m-d', strtotime('-'.$i.' months'));
	            	$next_month= date('Y-m-d', strtotime($current_month . ' +1 month'));

	            	$month_orders=Order::whereDate('created_at','>=',$current_month)->where('created_at','<',$next_month);

	            	$month_orders=$month_orders->count();
            		// $day = date('F',strtotime($current_date));   //retrives a month name 
	            	$itm = array('y'=>$current_month,
	            		'a'=>$month_orders+rand(10,100));
	            	array_push($months,$itm);
	            }


	            $customer=[];
	            for($i=6;$i>=0;$i--){
	            	$current_date=date('Y-m-d', strtotime('-'.$i.' days'));
	            	$next_date= date('Y-m-d', strtotime($current_date . ' +1 day'));

	            	$seven_days_orders=User::whereDate('created_at','>=',$current_date)->where('created_at','<',$next_date);

	            	$seven_days_order_count=$seven_days_orders->count();
	            	$day = date('D',strtotime($current_date));
	            	$item = array($day,
	            		$seven_days_order_count+rand(10,100));
	            	array_push($customer,$item);
	            }
	        }
	    }else if($this->checkPermission(Config::get('permissions.SELLER_DASHBOARD'))){
	    	
	    	$seller_id=null;
       		//seller
	    	$login_user_seller_id=Auth::user()->seller_id;

            //Today's order count
	    	$current_date=date('Y-m-d');
	    	$current_date_time=$current_date." 00:00:00";
	    	$todays_order_count=Order::where('seller_id',$login_user_seller_id)->whereDate('created_at','>=',$current_date_time)->count();

            //All order count
	    	$all_order_count=Order::where('seller_id',$login_user_seller_id)->count();

            //Total product count
	    	$total_product_count=Product::where('seller_id',$login_user_seller_id)->count();

            //Total customers
	    	$total_customer_count=User::where('role_id',6)->count();

            //Today's cart count
	    	$todays_cart_count=Cart::with('sku')->whereDate('created_at','>=',$current_date_time)->whereHas('sku',function($product) use ($login_user_seller_id){
	    		$product->whereHas('product',function($query) use ($login_user_seller_id){
	    			$query->where('seller_id',$login_user_seller_id);
	    		});	
	    	})->sum('id');

            // $todays_cart_count=Cart::whereDate('created_at','>=',$current_date_time)->count();

         	//Total cart count
	    	$total_cart_count=Cart::with('sku')->whereHas('sku',function($product) use ($login_user_seller_id){
	    		$product->whereHas('product',function($query) use ($login_user_seller_id){
	    			$query->where('seller_id',$login_user_seller_id);
	    		});	
	    	})->sum('id');
          	// $total_cart_count=Cart::count();

         	//Today's wishlist count

	    	$todays_wishlist_count=Wishlist::with('sku')->whereDate('created_at','>=',$current_date_time)->whereHas('sku',function($product) use ($login_user_seller_id){
	    		$product->whereHas('product',function($query) use ($login_user_seller_id){
	    			$query->where('seller_id',$login_user_seller_id);
	    		});	
	    	})->count();
          	//Total wishlist count

	    	$total_wishlist_count=Wishlist::with('sku')->whereHas('sku',function($product) use ($login_user_seller_id){
	    		$product->whereHas('product',function($query) use ($login_user_seller_id){
	    			$query->where('seller_id',$login_user_seller_id);
	    		});	
	    	})->count();

         	//total_sales
	    	$total_sales_count=1000;

	    	$current_date=date('Y-m-d');
	    	$d = date_parse_from_format("Y-m-d", $current_date);
	    	$current_month=$d["month"];	
	    	$current_day=$d['day'];

         // last seven day revenue
	    	$last_seven_day_revenue=array();

	    	for($i=6;$i>=0;$i--){
	    		$seven_date=date('Y-m-d', strtotime('-'.$i.' days'));

	    		$time=strtotime($seven_date);
	    		$month=date("M",$time);
	    		$day=date("d",$time);

	    		$transaction_amount_sum=1000;

	    		$ends = array('th','st','nd','rd','th','th','th','th','th','th');
	    		if (($day %100) >= 11 && ($day%100) <= 13)
	    			$abbreviation = $day. 'th';
	    		else
	    			$abbreviation = $day. $ends[$day % 10];

	    		$data=[
	    			"label"=>$abbreviation.' '.$month,
	    			"value"=>$transaction_amount_sum
	    		];
	    		array_push($last_seven_day_revenue, $data);
	    	}

	        // last seven day order count
	    	$last_seven_day_order_count=array();

	    	for($i=6;$i>=0;$i--){
	    		$seven_date=date('Y-m-d', strtotime('-'.$i.' days'));

	    		$time=strtotime($seven_date);
	    		$month=date("M",$time);
	    		$day=date("d",$time);

	    		$order_count = Order::where('seller_id',$login_user_seller_id)->whereDate('created_at', '=', $seven_date)->count();

	    		$ends = array('th','st','nd','rd','th','th','th','th','th','th');
	    		if (($day %100) >= 11 && ($day%100) <= 13)
	    			$abbreviation = $day. 'th';
	    		else
	    			$abbreviation = $day. $ends[$day % 10];

	    		$data=[
	    			"label"=>$abbreviation.' '.$month,
	    			"value"=>$order_count
	    		];
	    		array_push($last_seven_day_order_count, $data);
	    	}

	    	/*12 month revenue*/
	    	$month_wise_revenue=array();
	    	$labels=["January","February","March","April","May","June","July","August","September","October","November","December"];
	    	$colors=["#FF9F55","#FEC811",'#4C5667','#01C0C8','#FF0084','#007BB6','#FF9F55','#FEC811','#4C5667','#01C0C8','#FF0084','#007BB6'];
	    	$year=date("Y");
	    	for($i=1;$i<=12;$i++){
	    		$order_count =1000;
	    		$data=[
	    			"label"=>$labels[$i-1],
	    			"value"=>$order_count,
	    			"color"=>$colors[$i-1]
	    		];

	    		array_push($month_wise_revenue, $data);
	    	}

	    	$months=[];
	    	for($i=12;$i>=1;$i--){
	    		$current_month=date('Y-m-d', strtotime('-'.$i.' months'));
	    		$next_month= date('Y-m-d', strtotime($current_month . ' +1 month'));

	    		$month_orders=Order::where('seller_id',$login_user_seller_id)->whereDate('created_at','>=',$current_month)->where('created_at','<',$next_month);

	    		$month_orders=$month_orders->count();
        		// $day = date('F',strtotime($current_date));   //retrives a month name 
	    		$itm = array('y'=>$current_month,
	    			'a'=>$month_orders+rand(10,100));
	    		array_push($months,$itm);

	    	}
	    	$customer=[];
	    	for($i=6;$i>=0;$i--){
	    		$current_date=date('Y-m-d', strtotime('-'.$i.' days'));
	    		$next_date= date('Y-m-d', strtotime($current_date . ' +1 day'));

	    		$seven_days_orders=User::whereDate('created_at','>=',$current_date)->where('created_at','<',$next_date);

	    		$seven_days_order_count=$seven_days_orders->count();
	    		$day = date('D',strtotime($current_date));
	    		$item = array($day,
	    			$seven_days_order_count+rand(10,100));
	    		array_push($customer,$item);
	    	}

	    }else{

	    	return redirect('/');
	    }
	    return view('user.dashboard')->with('todays_order_count',$todays_order_count)->with('all_order_count',$all_order_count)->with('total_product_count',$total_product_count)->with('total_customer_count',$total_customer_count)->with('todays_cart_count',$todays_cart_count)->with('total_cart_count',$total_cart_count)->with('todays_wishlist_count',$todays_wishlist_count)->with('total_wishlist_count',$total_wishlist_count)->with('last_seven_day_revenue',$last_seven_day_revenue)->with('last_seven_day_order_count',$last_seven_day_order_count)->with('month_wise_revenue',$month_wise_revenue)->with('seller_id',$seller_id)->with('total_sales_count',$total_sales_count);
	}

	public function getSellerDashboard(){
		return view('user.sellerDashboard');
	}

	public function getSellerDashboardData(Request $request){
		

		$seller_sale=User::where('seller_id','!=',1)->with('seller_sale')->with('seller_product_count')->select('seller_id','contact_number','business_name')->groupBy('seller_id');

		$seller_sale=$seller_sale->with(['sale_by_seller'=>function($order_product) {
			$order_product->whereHas('order',function($order) {
				$order;
			});
		}]);

		return DataTables::of($seller_sale)->make(true);

	}

	public function getProductSaleReport(){
		
		$brands=Brand::whereNotIn('brand_id',[1])->with('default_brand_translation')->get();
		$transaction_types=Transaction_type::all();
		$sources=Source::all();
		$sellers=User::where('seller_id','!=','')->groupBy('seller_id')->get();

		if($this->checkPermission(Config::get('permissions.ALL_PRODUCT_REPORT'))){
			$sellers=$sellers->whereNotIn('seller_id',[1]);
		}else if($this->checkPermission(Config::get('permissions.SELLER_PRODUCT_REPORT'))){
			$login_user_seller_id=Auth::user()->seller_id;
			$sellers=$sellers->where('seller_id',$login_user_seller_id);
		}else{
			return redirect('/');
		}

		return view('reports.sale.product')->with('brands',$brands)->with('sellers',$sellers)->with('sources',$sources)->with('transaction_types',$transaction_types);
	}

	public function getProductSaleReportData(Request $request){
		$date_from=$request["date_from"];
		$date_to=$request["date_to"];
		

		/*$date_to=date('Y-m-d', strtotime("+1 day", strtotime($date_picker_to)));*/
		$brand=$request["brand"];
		$seller_name=$request["seller_name"];
		$payment_mode=$request["payment_mode"];
		$source=$request["source"];
		$product=Product::with('user')->with('seller')->with('order_product')->whereHas('order_product_sale',function($query) {
				$query->orderBy('created_at','desc');
			})->with('default_product_translation')->with('brand')->with('order_product_sale');

		if($this->checkPermission(Config::get('permissions.ALL_PRODUCT_REPORT'))){

		}else if($this->checkPermission(Config::get('permissions.SELLER_PRODUCT_REPORT'))){
			$login_user_seller_id=Auth::user()->seller_id;
			$product=$product->where('seller_id',$login_user_seller_id);
		}else{
			return view('user.unauthorized');
		}


		$product=$product->with(['order_product_sale'=>function($order_product) use ($source,$payment_mode,$date_from,$date_to){

			$order_product->whereHas('order',function($order) {
				$order->orderBy('created_at','desc');
			});

			if($source!=""){
				$order_product=$order_product->where("source_id","=",$source);
			}

			if($payment_mode!=""){
				$order_product=$order_product->where("transaction_type_id","=",$payment_mode);
			}
			if($date_from!=""){
				$order_product=$order_product->whereDate("created_at",">=",$date_from);
			}
			if($date_to!=""){
				$order_product=$order_product->whereDate("created_at","<=",$date_to);
			}

		}]);


		if($brand!=""){
			$product=$product->where("brand_id","=",$brand);
		}
		if($seller_name!=""){
			$product=$product->where("seller_id","=",$seller_name);
		}
		return DataTables::of($product)->make(true);
	}

	public function exportSellerProduct(Request $request){
		Excel::create('Products-export', function($excel) use ($request) {
			
            // Set the title
			$excel->setTitle('swaas-products');

            // Chain the setters
			$excel->setCreator('swaas')->setCompany('swaas');

			$excel->setDescription('A demonstration to change the file properties');

			$date_from=$request["date_from"];
			$date_to=$request["date_to"];
			/*$date_to=date('Y-m-d', strtotime("+1 day", strtotime($date_picker_to)));*/
			$brand=$request["brand"];
			$seller_name=$request["seller_name"];
			$payment_mode=$request["payment_mode"];
			$source=$request["source"];
			$product=Product::with('user')->with('seller')->with('order_product')->with('default_product_translation')->with('brand')->with('order_product_sale');

			if($this->checkPermission(Config::get('permissions.ALL_PRODUCT_REPORT'))){

			}else if($this->checkPermission(Config::get('permissions.SELLER_PRODUCT_REPORT'))){
				$login_user_seller_id=Auth::user()->seller_id;
				$product=$product->where('seller_id',$login_user_seller_id);
			}else{
				return view('user.unauthorized');
			}

			$product=$product->with(['order_product_sale'=>function($order_product) use ($source,$payment_mode,$date_from,$date_to){

				$order_product->whereHas('order',function($order) {
					$order;
				});

				if($source!=""){
					$order_product=$order_product->where("source_id","=",$source);
				}

				if($payment_mode!=""){
					$order_product=$order_product->where("transaction_type_id","=",$payment_mode);
				}
				if($date_from!=""){
					$order_product=$order_product->whereDate("created_at",">=",$date_from);
				}
				if($date_to!=""){
					$order_product=$order_product->whereDate("created_at","<=",$date_to);
				}

			}]);
			if($brand!=""){
				$product=$product->where("brand_id","=",$brand);
			}
			if($seller_name!=""){
				$product=$product->where("seller_id","=",$seller_name);
			}

			$products=$product->get();
			$i=1;
			$arr=[];

			foreach ($products as $key => $product) {
				$sale_quantiry=0;
				$total_sales=0;
				if($product->order_product_sale!=""){
					$sale_quantiry=$product->order_product_sale->total_quantity;
					$total_sales=$product->order_product_sale->sum_total_amount;
				}
				$newdata =  array (
					'product_idc' => $product->product_id,
					'product_name' => $product->default_product_translation->product_name,
					'brand' => $product->brand->default_brand_translation->brand_name,
					'seller' => $product->seller->business_name,
					'sale' => $total_sales,
					'sale_quantiry' => $sale_quantiry,
					'views'=>$product->view_count
				);
				array_push($arr,$newdata);
			}
			$products=json_decode(json_encode($arr), true);

			$excel->sheet('Sheet 1', function ($sheet) use ($products) {
				$sheet->setOrientation('landscape');
				$sheet->fromArray($products, NULL, 'A3');
			});
		})->download('xlsx');
	}

	public function getCustomerSaleReport(){
		if(!$this->checkPermission(Config::get('permissions.ALL_CUSTOMER_REPORT'))){
			return redirect('/');
		}
		
		$countries=Country::whereNotIn('country_id',[1])->where('status_id',1)->with('default_country_translation')->get();
		$cities=City::whereNotIn('city_id',[1])->where('status_id',1)->with('default_city_translation')->get();
		$states=State::whereNotIn('state_id',[1])->where('status_id',1)->with('default_state_translation')->get();
		$pincodes=Pincode::where('pincode','!=',"")->where('status_id',1)->where('pincode','!=','')->get();
		return view('reports.sale.customer')->with('countries',$countries)->with('cities',$cities)->with('states',$states)->with('pincodes',$pincodes);
	}

	public function getCustomerSaleReportData(Request $request){
		$date_from=$request["date_from"];
		$date_to=$request["date_to"];
		$country=$request["country"];
		$city=$request["city"];
		$state=$request["state"];
		$pincode=$request["pincode"];
		
		$customer_sale=User::where('id','!=',1)->with('customer_order_sale')->with('sale_by_customer')->with('order')->with('address');

		$customer_sale=$customer_sale->with(['sale_by_customer'=>function($order_product) use ($date_from,$date_to){

			$order_product->whereHas('order',function($order) {
				$order;
			});

			if($date_from!=""){
				$order_product=$order_product->whereDate("created_at",">=",$date_from);
			}

			if($date_to!=""){
				$order_product=$order_product->whereDate("created_at","<=",$date_to);
			}
		}]);
		if($country!=""){
			$customer_sale=$customer_sale->whereHas('order',function($query) use ($country){
				$query->where("country_id","=",$country);
			});
		}

		if($city!=""){
			$customer_sale=$customer_sale->whereHas('order',function($query) use ($city){
				$query->where("city_id","=",$city);
				});
		}

		if($state!=""){
			$customer_sale=$customer_sale->whereHas('order',function($query) use ($state){
				$query->where("state_id","=",$state);
			});
		}
		return DataTables::of($customer_sale)->make(true);
	}

	public function exportCustomerReport(Request $request){
		

		Excel::create('Products-export', function($excel) use ($request) {

            // Set the title
			$excel->setTitle('swaas-products');
			

            // Chain the setters
			$excel->setCreator('swaas')->setCompany('swaas');

			$excel->setDescription('A demonstration to change the file properties');

			$date_from=$request["date_from"];
			$date_to=$request["date_to"];
			$country=$request["country"];
			$city=$request["city"];
			$state=$request["state"];
			$pincode=$request["pincode"];
			$customer_sale=User::where('id','!=',1)->with('customer_order_sale')->with('sale_by_customer')->with('order')->with('address');

			$customer_sale=$customer_sale->with(['sale_by_customer'=>function($order_product) use ($date_from,$date_to){

				$order_product->whereHas('order',function($order) {
					$order;
				});

				if($date_from!=""){
					$order_product=$order_product->whereDate("created_at",">=",$date_from);
				}

				if($date_to!=""){
					$order_product=$order_product->whereDate("created_at","<=",$date_to);
				}
			}]);
			if($country!=""){
				$customer_sale=$customer_sale->whereHas('order',function($query) use ($country){
					$query->where("country_id","=",$country);
				});
			}

			if($city!=""){
				$customer_sale=$customer_sale->whereHas('order',function($query) use ($city){
					$query->where("city_id","=",$city);
				});
			}

			if($state!=""){
				$customer_sale=$customer_sale->whereHas('order',function($query) use ($state){
					$query->where("state_id","=",$state);
				});
			}

			$customer_sale=$customer_sale->get();
			$i=1;
			$arr=[];

			foreach ($customer_sale as $key => $customer) {
				$order_count=0;
				$total_sales=0;
				if($customer->sale_by_customer!=""){
					$order_count=$customer->sale_by_customer->order_count;
					$total_sales=$customer->sale_by_customer->sum_total_amount;
				}
				$newdata =  array (
					'id' => $customer->id,
					'name' => $customer->name,
					'contact_number' => $customer->contact_number,
					
					'country' => $customer->address->country->default_country_translation->country_name,
					'state' => $customer->address->state->default_state_translation->state_name,
					'city' => $customer->address->city->default_city_translation->city_name,
					'order_count'=>$order_count,
					'sale'=>$total_sales
				);

				array_push($arr,$newdata);
			}

			$customer_sale=json_decode(json_encode($arr), true);

			$excel->sheet('Sheet 1', function ($sheet) use ($customer_sale) {
				$sheet->setOrientation('landscape');
				$sheet->fromArray($customer_sale, NULL, 'A3');
			});

		})->download('xlsx');
	}

	public function getSkuSaleReport(){
		

		$brands=Brand::whereNotIn('brand_id',[1])->with('default_brand_translation')->get();
		$sellers=User::where('seller_id','!=','')->groupBy('seller_id')->get();


		if($this->checkPermission(Config::get('permissions.ALL_SKU_REPORT'))){
			$sellers=$sellers->whereNotIn('seller_id',[1]);
		}
		else if($this->checkPermission(Config::get('permissions.SELLER_SKU_REPORT'))){
			$login_user_seller_id=Auth::user()->seller_id;
			$sellers=$sellers->where('seller_id',$login_user_seller_id);	
		}else{
			return redirect('/');
		}
		return view('reports.sale.sku')->with('brands',$brands)->with('sellers',$sellers);

	}

	public function getSkuSaleReportData(Request $request){
		$date_from=$request["date_from"];
		$datepicker_to=$request["date_to"];
		$date_to=date('Y-m-d', strtotime("+1 day", strtotime($datepicker_to)));
		$brand=$request["brand"];
		$seller_name=$request["seller_name"];
		$payment_mode=$request["payment_mode"];
		$source=$request["source"];
		

		$sku=Sku::with('product')->with('sale_total_sku')->with('order_sku_sale')->with('parent_variant')->with('child_variant')->select('sku_id','product_id','parent_variant_id','child_variant_id')->groupBy('sku_id');

		if($this->checkPermission(Config::get('permissions.ALL_SKU_REPORT'))){

		}else if($this->checkPermission(Config::get('permissions.SELLER_SKU_REPORT'))){
			$login_user_seller_id=Auth::user()->seller_id;
			$sku=$sku->whereHas('product',function($query) use ($login_user_seller_id){
				$query->where('seller_id',$login_user_seller_id);
			});
		}else{
			return view('user.unauthorized');
		}

		$sku=$sku->with(['sale_total_sku'=>function($order_product) use ($date_from,$date_to){

			$order_product->whereHas('order',function($order) {
				$order;
			});

			if($date_from!=""){
				$order_product->where("created_at",">=",$date_from);
			}

			if($date_to!=""){
				$order_product->where("created_at","<",$date_to);
			}
		}]);


		if($brand!=""){
			$sku=$sku->whereHas('product',function($product) use ($brand){
				$product->where('brand_id','=',$brand);
			});
		}
		if($seller_name!=""){
			$sku=$sku->whereHas('product',function($product) use ($seller_name){
				$product->where('seller_id','=',$seller_name);
			});
		}

		return DataTables::of($sku)->make(true);
	}

	public function exportSellerSkuProduct(Request $request){
		Excel::create('Products-export', function($excel) use ($request) {
            // Set the title
			$excel->setTitle('swaas-products');
            // Chain the setters
			$excel->setCreator('swaas')->setCompany('swaas');
			$excel->setDescription('A demonstration to change the file properties');
			$date_from=$request["date_from"];
			$datepicker_to=$request["date_to"];
			$date_to=date('Y-m-d', strtotime("+1 day", strtotime($datepicker_to)));
			$brand=$request["brand"];
			$seller_name=$request["seller_name"];
			$payment_mode=$request["payment_mode"];
			$source=$request["source"];
			

			$sku=Sku::with('product')->with('sale_total_sku')->with('order_sku_sale')->with('parent_variant')->with('child_variant')->select('sku_id','product_id','parent_variant_id','child_variant_id')->groupBy('sku_id');

			if($this->checkPermission(Config::get('permissions.ALL_SKU_REPORT'))){

			}else if($this->checkPermission(Config::get('permissions.SELLER_SKU_REPORT'))){
				$login_user_seller_id=Auth::user()->seller_id;
				$sku=$sku->whereHas('product',function($query) use ($login_user_seller_id){
					$query->where('seller_id',$login_user_seller_id);
				});
			}else{
				return view('user.unauthorized');
			}

			$sku=$sku->with(['sale_total_sku'=>function($order_product) use ($date_from,$date_to){

				$order_product->whereHas('order',function($order) {
					$order;
				});

				if($date_from!=""){
					$order_product->where("created_at",">=",$date_from);
				}

				if($date_to!=""){
					$order_product->where("created_at","<",$date_to);
				}
			}]);

			if($brand!=""){
				$sku=$sku->whereHas('product',function($product) use ($brand){
					$product->where('brand_id','=',$brand);
				});
			}
			if($seller_name!=""){
				$sku=$sku->whereHas('product',function($product) use ($seller_name){
					$product->where('seller_id','=',$seller_name);
				});
			}
			$skus=$sku->get();
			$i=1;
			$arr=[];
			foreach ($skus as $key => $sku) {
				$sale_quantiry=0;
				$total_sales=0;
				if($sku->sale_total_sku!=""){
					$total_sales=$sku->sale_total_sku->sum_total_amount;
					$sale_quantiry=$sku->sale_total_sku->total_quantity;
				}
				$newdata =  array (
					'sku_id' => $sku->sku_id,
					'product_id' => $sku->product->product_id,
					'product_name' => $sku->product->default_product_translation->product_name,
					'parent_variant' => $sku->parent_variant->default_variant_option_translation->variant_option_name,
					'child_variant' => $sku->child_variant->default_variant_option_translation->variant_option_name,
					'brand' => $sku->product->brand->default_brand_translation->brand_name,
					'seller_name'=>$sku->product->seller->business_name,

					'sale_quantiry'=>$sale_quantiry,
					'sale'=>$total_sales,
				);
				array_push($arr,$newdata);
			}

			$skus=json_decode(json_encode($arr), true);
			$excel->sheet('Sheet 1', function ($sheet) use ($skus) {
				$sheet->setOrientation('landscape');
				$sheet->fromArray($skus, NULL, 'A3');
			});
		})->download('xlsx');
	}

	public function getSellerSaleReport(){
		if(!$this->checkPermission(Config::get('permissions.ALL_SELLER_REPORT'))){
			return redirect('/');
		}
		return view('reports.sale.seller');
	}
	public function getSellerSaleReportData(Request $request){ 

		$date_from=$request["date_from"];
		$datepicker_to=$request["date_to"];
		$date_to=date('Y-m-d', strtotime("+1 day", strtotime($datepicker_to)));
		

		$seller_sale=User::where('seller_id','!=',1)->with('seller_sale')->with('seller_product_count')->with('sale_by_seller')->select('seller_id','contact_number','business_name')->groupBy('seller_id');

		$seller_sale=$seller_sale->with(['sale_by_seller'=>function($order_product) use ($date_from,$date_to){
			$order_product->whereHas('order',function($order){
				$order;
			});
			if($date_from!=""){
				$order_product->where("created_at",">=",$date_from);
			}
			if($date_to!=""){
				$order_product->where("created_at","<",$date_to);
			}
		}]);
		return DataTables::of($seller_sale)->make(true);
	}

	public function exportSellerSale(Request $request){

		Excel::create('Products-export', function($excel) use ($request) {
            // Set the title
			$excel->setTitle('swaas-products');
            // Chain the setters
			$excel->setCreator('swaas')->setCompany('swaas');
			$excel->setDescription('A demonstration to change the file properties');
			$date_from=$request["date_from"];
			$datepicker_to=$request["date_to"];
			$date_to=date('Y-m-d', strtotime("+1 day", strtotime($datepicker_to)));
			

			$seller_sale=User::where('seller_id','!=',1)->with('seller_sale')->with('seller_product_count')->with('sale_by_seller')->select('seller_id','contact_number','business_name')->groupBy('seller_id');
			$seller_sale=$seller_sale->with(['sale_by_seller'=>function($order_product) use ($date_from,$date_to){
				$order_product->whereHas('order',function($order) {
					$order;
				});

				if($date_from!=""){
					$order_product->where("created_at",">=",$date_from);
				}
				if($date_to!=""){
					$order_product->where("created_at","<",$date_to);
				}
			}]);
			$seller_sales=$seller_sale->get();
			$i=1;

			$arr=[];

			foreach ($seller_sales as $key => $seller_sale) {
				$sale_by_seller=0;
				$sale_by_quantiry=0;
				$product_count=0;
				if($seller_sale->sale_by_seller!=""){
					$sale_by_seller =$seller_sale->sale_by_seller->sum_total_amount;
					$sale_by_quantiry=$seller_sale->sale_by_seller->total_quantity;
				}else{
					$sale_by_seller=0;
					$sale_by_quantiry=0;
				}
				if($seller_sale->seller_product_count!=""){
					$product_count=$seller_sale->seller_product_count->product_count;
				}


				$newdata =  array (
					'business_name' => $seller_sale->business_name,
					'contact_number' => $seller_sale->contact_number,
					'seller_product_count'=>$product_count,
					'sale_by_seller' =>$sale_by_seller,
					'sale_by_quantiry'=>$sale_by_quantiry
				);
				array_push($arr,$newdata);
			}
			$seller_sales=json_decode(json_encode($arr), true);

			$excel->sheet('Sheet 1', function ($sheet) use ($seller_sales) {
				$sheet->setOrientation('landscape');
				$sheet->fromArray($seller_sales, NULL, 'A3');
			});
		})->download('xlsx');
	}

	public function getVisitorsReport(){
		if($this->appearance->is_website!=1){
			return redirect('/admin');
		}
		return view('reports.visitors');
	}
	public function getVisitorsReportData(Request $request){
		if($this->appearance->is_website!=1){
			return redirect('/admin');
		}
		
		$date_from=$request["date_from"];
		$date_to=$request["date_to"];
		$datepicker_to_new=date('Y-m-d', strtotime("+1 day", strtotime($date_to)));
		$seller_sale=OrderProduct::with('user')->with('order')->select('seller_id','order_id')->groupBy('seller_id');
		if($date_from!=""){
			$seller_sale=$seller_sale->where("created_at",">=",$date_from);
		}
		if($date_to!=""){
			$seller_sale=$seller_sale->where("created_at","<",$datepicker_to_new);
		}
		$seller_sale=$seller_sale->get();
		return DataTables::of($seller_sale)->make(true);
	}

	public function getCartReport(){
		
		if($this->checkPermission(Config::get('permissions.ALL_CART_REPORT'))){
			$total_quantity_sum=Cart::groupBy('user')->selectRaw('sum(id) as sum_quantity')
			->pluck('sum_quantity');

			return view('reports.customer.cart')->with('total_quantity_sum',$total_quantity_sum);
		}else if($this->checkPermission(Config::get('permissions.SELLER_CART_REPORT'))){
			$total_quantity_sum=Cart::groupBy('user')->selectRaw('sum(quantity) as sum_quantity')
			->pluck('sum_quantity');

			return view('reports.customer.cart')->with('total_quantity_sum',$total_quantity_sum);
		}else{

			return redirect('/');
		}


	}
	public function getCartReportData(Request $request){

		$date_from=$request["date_from"];
		$date_to=$request["date_to"];
		$datepicker_to_new=date('Y-m-d', strtotime("+1 day", strtotime($date_to)));
		$user=$request["user"];
		
		$cart_user=Cart::pluck('user');
		if($this->checkPermission(Config::get('permissions.ALL_CART_REPORT'))){
			$cart_report=Cart::with('user_guest')->selectRaw('user,created_at, sum(quantity) as sum_quantity')
			->groupBy('user');
		}else if($this->checkPermission(Config::get('permissions.SELLER_CART_REPORT'))){
			$login_user_seller_id=Auth::user()->seller_id;
			$cart_report=Cart::with('user_guest')->with('sku')->selectRaw('user,created_at, sum(quantity) as sum_quantity')
			->groupBy('user')->whereHas('sku',function($product) use ($login_user_seller_id){
				$product->whereHas('product',function($query) use ($login_user_seller_id){
					$query->where('seller_id',$login_user_seller_id);
				});	
			});
		}else{
			return view('user.unauthorized');
		}

		if($date_from!=""){
			$cart_report=$cart_report->where("created_at",">=",$date_from);
		}

		if($date_to!=""){
			$cart_report=$cart_report->where("created_at","<",$datepicker_to_new);
		}

		if ($user==1) {
			$cart_report=$cart_report->whereHas('user_guest',function($query) use ($cart_user){
				$query->whereIn('id',$cart_user);
			});
		}
		if ($user==2) {
			$cart_report=$cart_report->whereDoesntHave('user_guest',function($query) use ($cart_user){
				$query->whereIn('id',$cart_user);
			});
		}

		return DataTables::of($cart_report)->make(true);
	}

	public function getCartDetailReport(Request $request){
		
		$id=$request->id;
		
	  return view('reports.customer.cart-detail')->with('id',$id);

	}
	public function getCartDetailReportData(Request $request){

		$id=$request["id"];
		
		

				if($this->checkPermission(Config::get('permissions.ALL_CART_REPORT'))){
			$cart_detail=Cart::where('user',$id)->with('sku')->get();
		}else if($this->checkPermission(Config::get('permissions.SELLER_CART_REPORT'))){
			$login_user_seller_id=Auth::user()->seller_id;

			$cart_detail=Cart::where('user',$id)->with('sku')->whereHas('sku',function($product) use ($login_user_seller_id){
				$product->whereHas('product',function($query) use ($login_user_seller_id){
					$query->where('seller_id',$login_user_seller_id);
				});	
			})->get();
			
		}else{
			return view('user.unauthorized');
		}

		
		

		return DataTables::of($cart_detail)->make(true);
	}




	public function cartExport(Request $request){
		Excel::create('Products-export', function($excel) use ($request) {
            // Set the title
			$excel->setTitle('swaas-products');
            // Chain the setters
			$excel->setCreator('swaas')->setCompany('swaas');
			$excel->setDescription('A demonstration to change the file properties');
			$date_from=$request["date_from"];
			$date_to=$request["date_to"];
			$datepicker_to_new=date('Y-m-d', strtotime("+1 day", strtotime($date_to)));
			$user=$request["user"];
			
			$cart_user=Cart::pluck('user');
			if($this->checkPermission(Config::get('permissions.ALL_CART_REPORT'))){
				$cart_report=Cart::with('user_guest')->selectRaw('user, sum(quantity) as sum_quantity')
				->groupBy('user');
			}else if($this->checkPermission(Config::get('permissions.SELLER_CART_REPORT'))){
				$login_user_seller_id=Auth::user()->seller_id;
				$cart_report=Cart::with('user_guest')->with('sku')->selectRaw('user, sum(quantity) as sum_quantity')
				->groupBy('user')->whereHas('sku',function($product) use ($login_user_seller_id){
					$product->whereHas('product',function($query) use ($login_user_seller_id){
						$query->where('seller_id',$login_user_seller_id);
					});	
				});
			}else{
				return view('user.unauthorized');
			}

			if($date_from!=""){
				$cart_report=$cart_report->where("created_at",">=",$date_from);
			}

			if($date_to!=""){
				$cart_report=$cart_report->where("created_at","<",$datepicker_to_new);
			}

			if ($user==1) {
				$cart_report=$cart_report->whereHas('user_guest',function($query) use ($cart_user){
					$query->whereIn('id',$cart_user);
				});
			}
			if ($user==2) {
				$cart_report=$cart_report->whereDoesntHave('user_guest',function($query) use ($cart_user){
					$query->whereIn('id',$cart_user);
				});
			}

			$cart_report=$cart_report->get();
			$i=1;

			$arr=[];

			foreach ($cart_report as $key => $cart) {
				$newdata =  array (
					'id' => $cart->user,
					'name' => $cart->user_guest->name,
					'contact_number' => $cart->user_guest->contact_number,
					'cart_count' =>$cart->sum_quantity
				);
				array_push($arr,$newdata);
			}

			$cart_report=json_decode(json_encode($arr), true);
			$excel->sheet('Sheet 1', function ($sheet) use ($cart_report) {
				$sheet->setOrientation('landscape');
				$sheet->fromArray($cart_report, NULL, 'A3');
			});

		})->download('xlsx');
	}
	public function getWishlistReport(){

		if($this->checkPermission(Config::get('permissions.ALL_WISHLIST_REPORT'))){
			$total_product_sum=Wishlist::selectRaw('count(sku_id) as total_product')->groupBy('user')->get();
			return view('reports.customer.wishlist')->with('total_product_sum',$total_product_sum);
		}else if($this->checkPermission(Config::get('permissions.SELLER_WISHLIST_REPORT'))){
			$total_product_sum=Wishlist::selectRaw('count(sku_id) as total_product')->groupBy('user')->get();
			return view('reports.customer.wishlist')->with('total_product_sum',$total_product_sum);
		}else{

			return redirect('/');
		}
	}

	public function getWishlistReportData(Request $request){
		$date_from=$request["date_from"];
		$date_to=$request["date_to"];
		$datepicker_to_new=date('Y-m-d', strtotime("+1 day", strtotime($date_to)));
		$user=$request["user"];
	

		$wishlist_user=Wishlist::pluck('user');
		if($this->checkPermission(Config::get('permissions.ALL_WISHLIST_REPORT'))){
			$wishlist_report=Wishlist::with('user_guest')->selectRaw('user,created_at, count(sku_id) as count_sku')
			->groupBy('user');
		}else if($this->checkPermission(Config::get('permissions.SELLER_WISHLIST_REPORT'))){
			$login_user_seller_id=Auth::user()->seller_id;
			$wishlist_report=Wishlist::with('user_guest')->with('sku')->selectRaw('user,created, count(sku_id) as count_sku')
			->groupBy('user')->whereHas('sku',function($product) use ($login_user_seller_id){
				$product->whereHas('product',function($query) use ($login_user_seller_id){
					$query->where('seller_id',$login_user_seller_id);
				});	
			});
		}else{
			return view('user.unauthorized');
		}

		if($user==1){
			$wishlist_report=$wishlist_report->whereHas('user_guest',function($query) use ($wishlist_user){
				$query->whereIn('id',$wishlist_user);
			});
		}
		if($user==2){
			$wishlist_report=$wishlist_report->whereDoesntHave('user_guest',function($query) use ($wishlist_user){
				$query->whereIn('id',$wishlist_user);
			});
		}

		if($date_from!=""){
			$wishlist_report=$wishlist_report->where("created_at",">=",$date_from);
		}

		if($date_to!=""){
			$wishlist_report=$wishlist_report->where("created_at","<",$datepicker_to_new);
		}

		return DataTables::of($wishlist_report)->make(true);
	}

	public function wishlistExport(Request $request){
		Excel::create('Products-export', function($excel) use ($request) {
            // Set the title
			$excel->setTitle('swaas-products');
            // Chain the setters

			$excel->setCreator('swaas')->setCompany('swaas');
			$excel->setDescription('A demonstration to change the file properties');
			$date_from=$request["date_from"];
			$date_to=$request["date_to"];
			$datepicker_to_new=date('Y-m-d', strtotime("+1 day", strtotime($date_to)));
			$user=$request["user"];
			$wishlist_user=Wishlist::pluck('user');
			if($this->checkPermission(Config::get('permissions.ALL_WISHLIST_REPORT'))){
				$wishlist_report=Wishlist::with('user_guest')->selectRaw('user, count(sku_id) as count_sku')
				->groupBy('user');
			}else if($this->checkPermission(Config::get('permissions.SELLER_WISHLIST_REPORT'))){
				$login_user_seller_id=Auth::user()->seller_id;
				$wishlist_report=Wishlist::with('user_guest')->selectRaw('user, count(sku_id) as count_sku')
				->groupBy('user')->whereHas('sku',function($product) use ($login_user_seller_id){
					$product->whereHas('product',function($query) use ($login_user_seller_id){
						$query->where('seller_id',$login_user_seller_id);
					});	
				});
			}else{
				return view('user.unauthorized');
			}

			if($user==1){
				$wishlist_report=$wishlist_report->whereHas('user_guest',function($query) use ($wishlist_user){
					$query->whereIn('id',$wishlist_user);
				});
			}
			if($user==2){
				$wishlist_report=$wishlist_report->whereDoesntHave('user_guest',function($query) use ($wishlist_user){
					$query->whereIn('id',$wishlist_user);
				});
			}

			if($date_from!=""){
				$wishlist_report=$wishlist_report->where("created_at",">=",$date_from);
			}

			if($date_to!=""){
				$wishlist_report=$wishlist_report->where("created_at","<",$datepicker_to_new);
			}

			$wishlist_report=$wishlist_report->get();
			$i=1;

			$arr=[];

			foreach ($wishlist_report as $key => $wishlists) {
				$newdata =  array (
					'id' => $wishlists->user,
					'name' => $wishlists->user_guest->name,
					'contact_number' => $wishlists->user_guest->contact_number,
					'wishlist_count' =>$wishlists->count_sku
				);
				array_push($arr,$newdata);	
			}

			$wishlist_report=json_decode(json_encode($arr), true);

			$excel->sheet('Sheet 1', function ($sheet) use ($wishlist_report) {
				$sheet->setOrientation('landscape');
				$sheet->fromArray($wishlist_report, NULL, 'A3');
			});

		})->download('xlsx');
	}

	public function getOrderReport(){

		$transaction_types=Transaction_type::all();
		$sources=Source::all();

		$sellers=User::where('seller_id','!=','')->groupBy('seller_id')->get();
		$statuses=DeliveryStatus::all();

		if($this->checkPermission(Config::get('permissions.ALL_ORDER_REPORT'))){
			$sellers=$sellers->whereNotIn('seller_id',[1]);
		}else if($this->checkPermission(Config::get('permissions.SELLER_ORDER_REPORT'))){
			$login_user_seller_id=Auth::user()->seller_id;
			$sellers=$sellers->where('seller_id',$login_user_seller_id);
		}else{
			return redirect('/');
		}
		return view('reports.order')->with('statuses',$statuses)->with('sellers',$sellers)->with('sources',$sources)->with('transaction_types',$transaction_types);
	}

	public function getOrderReportExport(Request $request){
		Excel::create('Products-export', function($excel) use ($request) {
            // Set the title
			$excel->setTitle('swaas-products');
            // Chain the setters
			$excel->setCreator('swaas')->setCompany('swaas');
			$excel->setDescription('A demonstration to change the file properties');
			$date_from=$request["date_from"];
			$date_to=$request["date_to"];
			$status=$request["status"];
			$seller_name=$request["seller_name"];
			$payment_mode=$request["payment_mode"];
			$source=$request["source"];

			$orders=Order::with('user')->with('order_amount')->with('delivery_status')->with('payment_status')->orderBy('order_id','desc');
			$orders=DB::table('orders')
			->select('orders.order_id','orders.created_at','orders.name','orders.delivery_contact_number','delivery_status_translations.delivery_status_name','payment_statuses.payment_status_name',DB::raw("SUM(order_products.gst_amount) as total_gst, SUM(order_products.subtotal_amount) as subtotal_amount, SUM(order_products.total_amount) as total_amount"))
			->join('users', 'orders.user_id', '=', 'users.id')

			
			->join('payment_statuses', 'orders.payment_status_id', '=', 'payment_statuses.payment_status_id')
			->where('language_id',1)
			->join('order_products', 'orders.order_id', '=', 'order_products.order_id')
			->groupBy('orders.order_id');

			if($this->checkPermission(Config::get('permissions.ALL_ORDER_REPORT'))){

			}else if($this->checkPermission(Config::get('permissions.SELLER_ORDER_REPORT'))){
				$login_user_seller_id=Auth::user()->seller_id;
				$orders=$orders->where('seller_id',$login_user_seller_id);
			}else{
				return view('user.unauthorized');
			}

			if($source!=""){
				$orders=$orders->where("source_id","=",$source);
			}
			$date_from=date('Y-m-d H:i:s', strtotime("$date_from"));
			if($date_from!=""){
				$orders=$orders->whereDate("orders.created_at",">=",$date_from);
			}
			$date_to=date('Y-m-d H:i:s', strtotime("$date_to"));
			if($date_to!=""){
				$orders=$orders->whereDate("orders.created_at","<=",$date_to);
			}

			// if($status!=""){
			// 	$orders=$orders->where("delivery_status_id","=",$status);
			// }
			if($payment_mode!=""){
				$orders=$orders->where("order_type","=",$payment_mode);
			}
			if($seller_name!=""){
				$orders=$orders->where("seller_id","=",$seller_name);
			}

			$orders=$orders->get();
			$orders=json_decode(json_encode($orders), true);
			$excel->sheet('Sheet 1', function ($sheet) use ($orders) {
				$sheet->setOrientation('landscape');
				$sheet->fromArray($orders, NULL, 'A3');
			});
		})->download('xlsx');
	}

	public function getOrderReportData(Request $request){
		$date_from=$request["date_from"];
		$date_to=$request["date_to"];
		$status=$request["status"];
		$seller_name=$request["seller_name"];
		$payment_mode=$request["payment_mode"];
		$source=$request["source"];

		$orders=Order::with('user')->with('order_amount')->with('delivery_status')->with('payment_status')->orderBy('order_id','desc');

		if($this->checkPermission(Config::get('permissions.ALL_ORDER_REPORT'))){

		}else if($this->checkPermission(Config::get('permissions.SELLER_ORDER_REPORT'))){
			$login_user_seller_id=Auth::user()->seller_id;
			$orders=$orders->where('seller_id',$login_user_seller_id);
		}else{
			return view('user.unauthorized');

		}

		if($source!=""){
			$orders=$orders->where("source_id","=",$source);
		}
		if($date_from!=""){
			$orders=$orders->whereDate("created_at",">=",$date_from);
		}
		if($date_to!=""){
			$orders=$orders->whereDate("created_at","<=",$date_to);
		}

		// if($status!=""){
		// 	$orders=$orders->where("delivery_status_id","=",$status);
		// }
		if($payment_mode!=""){
			$orders=$orders->where("order_type","=",$payment_mode);
		}
		if($seller_name!=""){
			$orders=$orders->where("seller_id","=",$seller_name);
		}
		return DataTables::of($orders)->make(true);
	}

	public function getRefferalReport(Request $request){


		return view('reports.refferal');
	}

	public function getRefferalReportData(Request $request){
		$date_from=$request["date_from"];
		$date_to=$request["date_to"];
		$wallet_transaction=[];

		if($this->checkPermission(Config::get('permissions.ALL_ORDER_REPORT'))){

		}else{
			return view('user.unauthorized');

		}
		$language_id=$this->getLanguageId();


		$user=User::where('reffered_by',"!=","")->pluck('reffered_by');
		$welcome_amount=Toast::where('language_id',$language_id)->first()->welcome_amount;

		if ($user!="") {

			$wallet_transaction=WalletTransaction::whereIn('user_id',$user)->with('user')->where('transaction_title','!=',$welcome_amount)->orderBy('wallet_transactions_id','desc');

			if($date_from!=""){
				$wallet_transaction=$wallet_transaction->whereDate("created_at",">=",$date_from);
			}
			if($date_to!=""){
				$wallet_transaction=$wallet_transaction->whereDate("created_at","<=",$date_to);
			}

		}
		$wallet_transaction=$wallet_transaction->get();
		return DataTables::of($wallet_transaction)->make(true);
	}

	public function getTransactionReport(Request $request){

		return view('reports.transactions');
	}

	public function getTransactionReportData(Request $request){
		$date_from=$request["date_from"];
		$date_to=$request["date_to"];
		$transaction_type=$request["transaction_type"];

		if($this->checkPermission(Config::get('permissions.ALL_ORDER_REPORT'))){

		}else{
			return view('user.unauthorized');

		}
		$language_id=$this->getLanguageId();

		$transaction=Transaction::with('user')->orderBy('transaction_id','desc');

		if($transaction_type!=""){
			$transaction=$transaction->where("transaction_type_id","=",$transaction_type);

		}


		
		if($date_from!=""){
			$transaction=$transaction->whereDate("created_at",">=",$date_from);
		}
		if($date_to!=""){
			$transaction=$transaction->whereDate("created_at","<=",$date_to);
		}
		

		return DataTables::of($transaction)->make(true);
	}
public function postSendmail(Request $request){
           
		$emails=$request->searchIDs;
                
			
    		
                return 1;

	}
}
