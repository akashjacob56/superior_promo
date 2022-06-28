<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Slider;
use DataTables;
use Config;
use App\NotificationClass;
use App\Product;
use App\Category;
use App\SliderTranslation;
use App\Language;
use App\SellerDetail;
use Storage;

use Illuminate\Support\Facades\Input;
class SliderController extends Controller{

  public function getAddSlider(Request $request){

    if(!$this->checkPermission(Config::get('permissions.SLIDER_ADD'))){
      return view('user.unauthorized');
    }

    
    $products=Product::where('status_id',1)->with('default_product_translation')->get();
    $categories=Category::with('default_category_translation')->where('is_parent_category',0)->where('status_id',1)->where('category_id','!=',1)->get();

    $sellers="";

    $notificationclasses=NotificationClass::where('notification_class_id','!=',3)->get();



  return view('slider.add')->with('notificationclasses',$notificationclasses)->with('products',$products)->with('categories',$categories)->with('sellers',$sellers);
}

public function postAddSlider(Request $request){
  if(!$this->checkPermission(Config::get('permissions.SLIDER_ADD'))){
    return view('user.unauthorized');
  }

 

  $this->validate($request, Slider::$rules);
  $sourceFile="slider_image";
  $slider=new Slider();
  
  $slider->notification_class_id=$request->notification_class_id;
  $slider->section_id=$request->section_id;
  $slider->save();

  $slider_translation=new SliderTranslation();
  
  $slider_translation->slider_id=$slider->slider_id;
  $slider_translation->language_id=$request->language_id;



  if(isset($request->slider_image)){
    $source=$request->slider_image;
    $image_name=$this->addCompressImage($source,"slider");
    $slider_translation->slider_image=$image_name;
  }


  $slider_translation->title=$request->title;
  $slider_translation->save();
  $slider->slider_translation_id=$slider_translation->slider_translation_id;        
    // $notification->notification_class_id=$request->notification_class_id;
    // $notification->section_id=$request->section_id;
  $slider->save();
  flash('Slider added successfully');
  return redirect('admin/slider/all');
}

public function getAllSliders(){
  if(!$this->checkPermission(Config::get('permissions.SLIDER_ALL'))){
    return view('user.unauthorized');
  }
  return view('slider.all');
}

public function getAllSlidersData(){
  if(!$this->checkPermission(Config::get('permissions.SLIDER_ALL'))){
    return view('user.unauthorized');
  }
 
  $slider=Slider::with('default_slider_translation')->with('notification')->with('status');
  return DataTables::of($slider)->make('true');
}

public function getSlider($id){
  if(!$this->checkPermission(Config::get('permissions.SLIDER_DETAILS'))){
    return view('user.unauthorized');
  }
 

  $slider=Slider::with('default_slider_translation')->with('notification')->with('product')->with('category')->with('status')->find($id);

  
  $sellers="";

  $notificationclasses=NotificationClass::where('notification_class_id','!=',3)->get();
$products=Product::where('status_id',1)->with('default_product_translation')->get();
$categories=Category::with('default_category_translation')->where('is_parent_category',0)->where('status_id',1)->where('category_id','!=',1)->get();

$stored_translations=SliderTranslation::where('slider_id',$id)->pluck('language_id');
if($slider!=""){
  return view('slider.details')->with('slider',$slider)->with('stored_translations',$stored_translations)->with('notificationclasses',$notificationclasses)->with('products',$products)->with('categories',$categories)->with('sellers',$sellers);
}

return redirect('admin/slider/all');
}

public function postSlider(Request $request){
  if(!$this->checkPermission(Config::get('permissions.SLIDER_UPDATE'))){
    return view('user.unauthorized');
  }

  $id=$request->id;
 
  $sourceFile="slider_image";
  $slider=slider::with('default_slider_translation')->find($id);
  $section_id=$slider->section_id;
  $notification_class_id=$slider->notification_class_id;
  if(isset($request['save'])){
    if($slider!=""){
      $this->validate($request,Slider::$edit);
      

      $this->validate($request,['title'=>'unique:slider_translations,title,'.$slider->slider_translation_id.',slider_translation_id']);


      $slider_translation_id=$slider->slider_translation_id;
      $slider->notification_class_id=$request->notification_class_id;
      $slider->section_id=$request->section_id;

      $slider_translation=SliderTranslation::find($slider_translation_id);

      $slider_image=$slider_translation->slider_image;
     


      
      if(isset($request->slider_image)){

        if ($slider_image!="") {
       
         $slider_image_name=substr($slider_image, strrpos($slider_image, '/') + 1);
         if(file_exists(storage_path("app/slider/".$slider_image_name))){
         unlink(storage_path("app/slider/".$slider_image_name));
         }
        
       }

       $source=$request->slider_image;
       $image_name=$this->addCompressImage($source,"slider");
       $slider_translation->slider_image=$image_name;
     }

    
     $slider_translation->title=$request->title;
     $slider_translation->save();
     $slider->save();
     flash('Slider updated successfully');

   }
   else{
    return redirect('admin/slider/all');
  }
}else if(isset($request['active'])){
  if($notification_class_id==1){
    $product=Product::find($section_id);
    if($product->status_id==1){
      flash('Slider activated successfully');
      $slider->status_id=1;
    }else{
      flash("That product is not active now");
    }
  }else if($notification_class_id==2){
    $category=Category::find($section_id);
    if($category->status_id==1){
      flash('Slider activated successfully');
      $slider->status_id=1;
    }else{
      flash("That category is not active now");
    }
  }else{
    $seller=SellerDetail::with('user')->find($section_id);
    if($seller->user->status_id==1){
      flash('Slider activated successfully');
      $slider->status_id=1;
    }else{
      flash("That Seller is not active now");
    }

  }
    /*  flash('Slider activated successfully');
    $slider->status_id=1;*/
    $slider->save();

  }else if(isset($request['inactive'])){
    flash('Slider inactivated successfully');
    $slider->status_id=2;
    $slider->save();
  }
    // else{
    //   $slider_translation=SliderTranslation::where('slider_id',$id)->delete();
    //   $slider->delete();
    //   flash('Slider deleted successfully');
    // }
  return redirect('admin/slider/all');
}

public function getSliderTranslation($slider_id, $language_code){
  if(!$this->checkPermission(Config::get('permissions.SLIDER_DETAILS'))){
    return view('user.unauthorized');
  }   
 

  $language=Language::where('language_code',$language_code)->with('default_language_translation')->first();


  $slider=Slider::with('default_slider_translation')->find($slider_id);

  if($language!="" && $slider!=""){
    $slider_translation=SliderTranslation::where('language_id',$language->language_id)->where('slider_id',$slider_id)->first();
    $stored_translations=SliderTranslation::where('slider_id',$slider_id)->pluck('language_id');

    return view('slider.language')->with('slider_translation',$slider_translation)->with('language',$language)->with('slider',$slider)->with('stored_translations',$stored_translations);
  }
  return redirect('slider_translation/all');
}

public function postSliderTranslation(Request $request){
  if(!$this->checkPermission(Config::get('permissions.SLIDER_DETAILS'))){
    return view('user.unauthorized');
  } 
 
  $post=$request->all();  
  $language_id=$post['language_id'];    
  $title=$post['title'];

  $slider_id=$post['slider_id'];
  $language=Language::find($language_id);
  $slider_translation=SliderTranslation::where('language_id',$language_id)->where('slider_id',$slider_id)->first();
  if($slider_translation!=""){

    $this->validate($request,['title'=>'required|unique:slider_translations,title,'.$slider_translation->slider_translation_id.',slider_translation_id']);

    $slider_translation->title=$title;
    if(isset($request->slider_image)){
      $source=$request->slider_image;
      $image_name=$this->addCompressImage($source,"slider");
      $slider_translation->slider_image=$image_name;
    }else{
     $slider_translation->slider_image=$slider_translation->slider_image;
   }
   $slider_translation->save();     
   flash('Slider updated successfully');
 }
 else{     
  $this->validate($request,Slider::$translation);
  $slider_translation=new SliderTranslation();
  
  $slider_translation->language_id=$language_id;   
  $slider_translation->title=$title;
  if(isset($request->slider_image)){
    $source=$request->slider_image;
    $image_name=$this->addCompressImage($source,"slider");
    $slider_translation->slider_image=$image_name;
  }
  $slider_translation->slider_id=$slider_id;
  $slider_translation->save();
  flash('Slider details added for new language');
}
return redirect('admin/slider/'.$slider_id.'/'.$language->language_code);
}
}

