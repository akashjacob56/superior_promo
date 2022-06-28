<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OfferBlock;
use DataTables;
use Config;
use App\NotificationClass;
use App\Product;
use App\Category;
use App\OfferBlockTranslation;
use App\Language;
use App\SellerDetail;

class OfferBlockController extends Controller
{
  public function getAddOfferBlock(){

    if(!$this->checkPermission(Config::get('permissions.OFFER_BLOCK_ADD'))){
      return view('user.unauthorized');
    }

    


    
    $seller="";
    $sellers=[];
   
     $notificationclasses=NotificationClass::where('notification_class_id','!=',3)->get();
   
   $products=Product::where('status_id',1)->with('default_product_translation')->get();
   $categories=Category::with('default_category_translation')->where('is_parent_category',0)->where('status_id',1)->where('category_id','!=',1)->get();
   return view('offerblock.add')->with('notificationclasses',$notificationclasses)->with('products',$products)->with('categories',$categories)->with('sellers',$sellers);
 }

 public function postAddOfferBlock(Request $request){
  if(!$this->checkPermission(Config::get('permissions.OFFER_BLOCK_ADD'))){
    return view('user.unauthorized');
  }
  

  $this->validate($request, OfferBlock::$rules);
  $sourceFile="offer_block_image";
  $offer_block=new OfferBlock();
  
  $offer_block->notification_class_id=$request->notification_class_id;
  $offer_block->section_id=$request->section_id;
  $offer_block->save();

  $offer_block_translation=new OfferBlockTranslation();
  
  $offer_block_translation->offer_block_id=$offer_block->offer_block_id;
  $offer_block_translation->language_id=$request->language_id;

   

    if(isset($request->offer_block_image)){
      $source=$request->offer_block_image;
      $image_name=$this->addCompressImage($source,"offerblock");
      $offer_block_translation->offer_block_image=$image_name;
    }
    
    $offer_block_translation->save();

    $offer_block->offer_block_translation_id=$offer_block_translation->offer_block_translation_id;    
    $offer_block->save();
    flash('Offer block added successfully');
    return redirect('admin/offerblock/all');
  }

  public function getAllOfferBlock(){
    if(!$this->checkPermission(Config::get('permissions.OFFER_BLOCK_ALL'))){
      return view('user.unauthorized');
    }
   
    return view('offerblock.all');
  }

  public function getAllOfferBlockData(){
    if(!$this->checkPermission(Config::get('permissions.OFFER_BLOCK_ALL'))){
      return view('user.unauthorized');
    }
    
    $offer_block=OfferBlock::with('default_offer_block_translation')->with('status')->with('notification');
    return DataTables::of($offer_block)->make('true');
  }

  public function getOfferBlock($id){
    if(!$this->checkPermission(Config::get('permissions.OFFER_BLOCK_DETAILS'))){
      return view('user.unauthorized');
    }
    
    $offer_block=OfferBlock::with('default_offer_block_translation')->find($id);

    $stored_translations=OfferBlockTranslation::where('offer_block_id',$id)->pluck('language_id');
    
   
    $sellers="";

    $notificationclasses=NotificationClass::where('notification_class_id','!=',3)->get();
  
  $products=Product::where('status_id',1)->with('default_product_translation')->get();
  $categories=Category::with('default_category_translation')->where('is_parent_category',0)->where('status_id',1)->where('category_id','!=',1)->get();
  if($offer_block!=""){
    return view('offerblock.details')->with('offer_block',$offer_block)->with('stored_translations',$stored_translations)->with('notificationclasses',$notificationclasses)->with('products',$products)->with('categories',$categories)->with('sellers',$sellers);
  }

  return redirect('admin/offerblock/all');
}

public function postOfferBlock(Request $request){
  if(!$this->checkPermission(Config::get('permissions.OFFER_BLOCK_UPDATE'))){
    return view('user.unauthorized');
  }

  
  $id=$request->id;
  $sourceFile="offer_block_image";
  $offer_block=OfferBlock::with('default_offer_block_translation')->find($id);
  if(isset($request['save'])){
    if($offer_block!=""){
      $this->validate($request,OfferBlock::$edit);   

      $offer_block_translation_id=$offer_block->offer_block_translation_id;
      $offer_block->notification_class_id=$request->notification_class_id;
      $offer_block->section_id=$request->section_id;
      $offer_block_translation=OfferBlockTranslation::find($offer_block_translation_id);

      $offer_block_image=$offer_block_translation->offer_block_image;

      if(isset($request->offer_block_image)){

        if ($offer_block_image!="") {
          $offer_block_image_name=substr($offer_block_image, strrpos($offer_block_image, '/') + 1);
         if(file_exists(storage_path("app/offerblock/".$offer_block_image_name))){
            unlink(storage_path("app/offerblock/".$offer_block_image_name));
          }
        }
        
        $source=$request->offer_block_image;
        $image_name=$this->addCompressImage($source,"offerblock");
        $offer_block_translation->offer_block_image=$image_name;
      }


      $offer_block->save();
      $offer_block_translation->save();

      flash('Offer block updated successfully');

    }
    else{
      return redirect('admin/offerblock/all');
    }
  }else if(isset($request['active'])){
    flash('Offer block activated successfully');
    $offer_block->status_id=1;
    $offer_block->save();
  }else if(isset($request['inactive'])){
    flash('Offer block inactivated successfully');
    $offer_block->status_id=2;
    $offer_block->save();
  }
    // else
    // {
    //   $offer_block->delete();
    //   flash('Offer block deleted successfully');
    // }
  return redirect('admin/offerblock/all');
}

public function getOfferBlockTranslation($offer_block_id, $language_code){
  if(!$this->checkPermission(Config::get('permissions.OFFER_BLOCK_DETAILS'))){
    return view('user.unauthorized');
  }   

  

  $language=Language::where('language_code',$language_code)->with('default_language_translation')->first();


  $offer_block=OfferBlock::with('default_offer_block_translation')->find($offer_block_id);

  if($language!="" && $offer_block!=""){
    $offer_block_translation=OfferBlockTranslation::where('language_id',$language->language_id)->where('offer_block_id',$offer_block_id)->first();
    $stored_translations=OfferBlockTranslation::where('offer_block_id',$offer_block_id)->pluck('language_id');



    return view('offerblock.language')->with('offer_block_translation',$offer_block_translation)->with('language',$language)->with('offer_block',$offer_block)->with('stored_translations',$stored_translations);
  }
  return redirect('offer_block_translation/all');
}

public function postOfferBlockTranslation(Request $request){
  if(!$this->checkPermission(Config::get('permissions.OFFER_BLOCK_DETAILS'))){
    return view('user.unauthorized');
  } 

  $post=$request->all();  
  $language_id=$post['language_id'];    
  


  $offer_block_id=$post['offer_block_id'];
  $language=Language::find($language_id);
  $offer_block_translation=OfferBlockTranslation::where('language_id',$language_id)->where('offer_block_id',$offer_block_id)->first();
  if($offer_block_translation!=""){



   if(isset($request->offer_block_image)){
    $source=$request->offer_block_image;
    $image_name=$this->addCompressImage($source,"offerblock");
    $offer_block_translation->offer_block_image=$image_name;
  }

  $offer_block_translation->save();     
  flash('Offer block updated successfully');
}
else{     
 $this->validate($request,OfferBlock::$translation);
 $offer_block_translation=new OfferBlockTranslation();
 
 $offer_block_translation->language_id=$language_id;   
 
 if(isset($request->offer_block_image)){
  $source=$request->offer_block_image;
  $image_name=$this->addCompressImage($source,"offerblock");
  $offer_block_translation->offer_block_image=$image_name;
}

$offer_block_translation->offer_block_id=$offer_block_id;
$offer_block_translation->save();


flash('Offer block details added for new language');
}
return redirect('admin/offerblock/'.$offer_block_id.'/'.$language->language_code);

}
}
