<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Auth;
use DataTables;
use Hash;
use DB;
use Config;
use Storage;
use App\OurGuarantee;
use App\User;
use App\Toast;
class OurGuaranteeController extends Controller
{
    
    public function getAllGuarantee(Request $request){

        if(!$this->checkPermission(Config::get('permissions.GUARANTEE_ALL'))){
            return view('user.unauthorized');
        }

        return view('guarantee.all');
    }


    public function getAllGuaranteeData(Request $request){
        
        $OurGuarantee= OurGuarantee::with('status')->get();
        return DataTables::of($OurGuarantee)->make(true); 
        
    }


   public function postAddGuarantee(Request $request){


      if(!$this->checkPermission(Config::get('permissions.GUARANTEE_ADD'))){
            return view('user.unauthorized');
        }

        $request->validate([
        'title' =>'required|unique:our_guarantee',
        'image'=>'required',
        'descriprtion'=>'required',

        ]);


        $OurGuarantee=new OurGuarantee();
        $OurGuarantee->title=$request->title;
        $OurGuarantee->descriprtion=$request->descriprtion;

        if($request->image!=""){
        if(isset($request->image)){
            $source=$request->image;
            $image_name=$this->addCompressImage($source,"OurGuarantee-images");
            $OurGuarantee->image=$image_name;
        }
        }
         

        $OurGuarantee->save();

        flash('OurGuarantee added successfully');
        return redirect('admin/guarantee/all-guarantee');

    }


  public function getAddGuarantee(){

        if(!$this->checkPermission(Config::get('permissions.GUARANTEE_ADD'))){
            return view('user.unauthorized');
        }

       return view('guarantee.add');

}


  public function getguarantee(Request $request){

        if(!$this->checkPermission(Config::get('permissions.GUARANTEE_UPDATE'))){
            return view('user.unauthorized');
        }
       
        $id=$request->id;
        $OurGuarantee=OurGuarantee::find($id);
        return view('guarantee.details')->with('OurGuarantee',$OurGuarantee);

    }


   public function postguarantee(Request $request){
         

      if(!$this->checkPermission(Config::get('permissions.GUARANTEE_UPDATE'))){
            return view('user.unauthorized');
        }
        
        $request->validate([
        'title' =>'required',
        'descriprtion'=>'required',

        ]);
        
       $OurGuarantee=OurGuarantee::find($request->id);
       if(isset($request['save'])){
        $OurGuarantee=OurGuarantee::find($request->id);
        $OurGuarantee->title=$request->title;
        $OurGuarantee->descriprtion=$request->descriprtion;

        if($request->image!=""){

        $old_image_src = $OurGuarantee->image;
        Storage::delete($old_image_src);

        if(isset($request->image)){
            $source=$request->image;
            $image_name=$this->addCompressImage($source,"OurGuarantee-images");
            $OurGuarantee->image=$image_name;
        }
        }

       } 

        else if(isset($request['active'])){
            flash('Color activated successfully');
            $OurGuarantee->status_id=1;
        }else if(isset($request['inactive'])){
            flash('Color inactivated successfully');
            $OurGuarantee->status_id=2;   
        }

        $OurGuarantee->save();

        flash('OurGuarantee Edited successfully');
        return redirect('admin/guarantee/all-guarantee');
    }

}
