<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use App\About;
use App\AboutUsTranslation;
use App\HomeAbout;
use App\HomeAboutTranslation;
use App\Language;
use App\Faq;
use App\FaqTranslation;

class AboutusController extends Controller
{
  public function getAboutus(){
    
    $about=About::with('default_aboutus_translation')->first();
    $stored_translations=AboutUsTranslation::pluck('language_id');
    $about_translation=AboutUsTranslation::first();
    return view('about.about-us')->with('about',$about)->with('stored_translations',$stored_translations)->with('about_translation',$about_translation);
  }

  public function postAboutus(Request $request){
    $about=About::first();

    if($about!=""){
      if(isset($request['save'])){
        $about_us_translation_id=$about->about_us_translation_id;
        $aboutus_translation=AboutUsTranslation::find($about_us_translation_id);

        $aboutus_translation->about_us_description=$request->about_us_description;

        if(isset($request->about_image)){
          $source=$request->about_image;
          $image_name=$this->addCompressImage($source,"about");
          $aboutus_translation->about_image=$image_name;
        }

        if(isset($request->about_video)){
          $file = $request->file('about_video');
          $filename = $file->store('about');
          $aboutus_translation->about_video=$filename;
        }

        $aboutus_translation->save();

        flash('About us updated successfully');  

      }else if(isset($request['active'])){
        $about->save();
        flash('About us activated successfully');
      }else if(isset($request['inactive'])){
        $about->save();
        flash('About us inactivated successfully');
      }
      return redirect('admin/aboutus');
    }else{
      return redirect('admin/aboutus');
    }

  }

  
  public function getHomeAboutus(){
    
    $about=HomeAbout::with('default_aboutus_translation')->first();

    
   $stored_translations=HomeAboutTranslation::pluck('language_id');
  
   $about_translation=HomeAboutTranslation::first();
  
   return view('home-about.about')->with('about',$about)->with('stored_translations',$stored_translations)->with('about_translation',$about_translation);

 }

 public function postHomeAboutus(Request $request){
  
  $about=HomeAbout::first();

  if($about!=""){
    if(isset($request['save'])){
      $about_us_translation_id=$about->home_about_us_translation_id;

      $aboutus_translation=HomeAboutTranslation::find($about_us_translation_id);


      if(isset($request->first_image)){
        $first_source=$request->first_image;
        $first_image_name=$this->addCompressImage($first_source,"about");
        $aboutus_translation->first_image=$first_image_name;
      }
      if(isset($request->second_image)){
        $source=$request->second_image;
        $image_name=$this->addCompressImage($source,"about");
        $aboutus_translation->second_image=$image_name;
      }

      if(isset($request->third_image)){
        $source=$request->third_image;
        $image_name=$this->addCompressImage($source,"about");
        $aboutus_translation->third_image=$image_name;
      }

      if(isset($request->fourth_image)){
        $source=$request->fourth_image;
        $image_name=$this->addCompressImage($source,"about");
        $aboutus_translation->fourth_image=$image_name;
      }

      if(isset($request->subscription_image)){
        $source=$request->subscription_image;
        $image_name=$this->addCompressImage($source,"about");
        $aboutus_translation->subscription_image=$image_name;
      }

      $aboutus_translation->save();

      flash('About Images updated successfully');  

    }
    return redirect('admin/homeimages');
  }else{
    $about_us= new HomeAbout();

    $about_us->home_about_us_translation_id=1;
    
    $about_us->save();

    $aboutus_translation=new HomeAboutTranslation();

    
      
      $aboutus_translation->language_id=1;
      $aboutus_translation->home_about_us_id=$about_us->home_about_us_id;



      if(isset($request->first_image)){
        $first_source=$request->first_image;
        $first_image_name=$this->addCompressImage($first_source,"about");
        $aboutus_translation->first_image=$first_image_name;
      }
      if(isset($request->second_image)){
        $source=$request->second_image;
        $image_name=$this->addCompressImage($source,"about");
        $aboutus_translation->second_image=$image_name;
      }

      $aboutus_translation->save();

      $about_us->home_about_us_translation_id=$aboutus_translation->home_about_us_translation_id;

       $about_us->save();

      flash('Home Images us updated successfully');  
    return redirect('admin/homeimages');
}
  }


public function getFaq(){
  
  $faq=Faq::with('default_faq_translation')->first();
  $stored_translations=FaqTranslation::pluck('language_id');
  $faq_translation=FaqTranslation::first();
  return view('faq.faq')->with('faq',$faq)->with('stored_translations',$stored_translations)->with('faq_translation',$faq_translation);
}

public function postFaq(Request $request){
  
  $faq=Faq::first();

  if($faq!=""){
    if(isset($request['save'])){
      $faq_translation_id=$faq->faq_translation_id;
      $faq_translation=FaqTranslation::find($faq_translation_id);

      $faq_translation->faq_description=$request->faq_description;

      $faq_translation->save();

      flash('Faq updated successfully');  

    }else if(isset($request['active'])){
      $faq->save();
      flash('Faq activated successfully');
    }else if(isset($request['inactive'])){
      $faq->save();
      flash('Faq inactivated successfully');
    }
    return redirect('admin/faq');
  }else{
    return redirect('admin/faq');
  } 

}

}
