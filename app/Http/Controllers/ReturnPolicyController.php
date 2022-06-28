<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReturnPolicy;
use App\ReturnPolicyTranslation;
use App\Language;
use Flash;
use DataTables;
class ReturnPolicyController extends Controller
{   
    public function getReturnPolicy(){
        
        $return_policy=ReturnPolicy::with('default_return_policy_translation')->first();
        $stored_translations=ReturnPolicyTranslation::pluck('language_id');

        return view('returnpolicy.return-policy')->with('return_policy',$return_policy)->with('stored_translations',$stored_translations);
    }

    public function getAllReturnPolicies(){

        return view('returnpolicy.all');
    }

    public function getAllReturnPoliciesData(){
        
        $return_policy=ReturnPolicy::with('default_return_policy_translation');

        return DataTables::of($return_policy)->make(true);
    }

    public function postaddReturnPolicy(Request $request){

       $this->validate($request,ReturnPolicy::$rules);
       
       $is_available_for_return=$request->is_available_for_return;
       $is_available_for_return_replace=$request->is_available_for_return_replace;
       $return_days=$request->return_days;


       if($request->is_available_for_return==""){
        $is_available_for_return=0;
    }
    if($request->is_available_for_return_replace==""){
        $is_available_for_return_replace=0;
    }
    $return_policy=new ReturnPolicy();
    
    $return_policy->return_days=$return_days;
    $return_policy->is_available_for_return=$is_available_for_return;
    $return_policy->is_available_for_return_replace=$is_available_for_return_replace;
    $return_policy->save();

    $return_policy_translation=new ReturnPolicyTranslation();
    $return_policy_translation->return_policy_id=$return_policy->return_policy_id;
    $return_policy_translation->language_id=$request->language_id;
    $return_policy_translation->return_policy_title=$request->return_policy_title;
    $return_policy_translation->return_policy_description=$request->return_policy_description;
    
    $return_policy_translation->save();

    $return_policy->return_policy_translation_id=$return_policy_translation->return_policy_translation_id;

    $return_policy->save();

    flash('Return policy added successfully');   
    return redirect('admin/returnpolicy/all');
}

public function getReturnPolicyDetails($id){
    
    $return_policy=ReturnPolicy::with('default_return_policy_translation')->find($id);
    $stored_translations=ReturnPolicyTranslation::pluck('language_id');

    if($return_policy!=""){

        return view('returnpolicy.detail')->with('return_policy',$return_policy)->with('stored_translations',$stored_translations);
    }
    return redirect('admin/returnpolicy/all');
}

public function postReturnPolicyDetails(Request $request){

    $return_policy_id=$request->id;
    
    $return_policy=ReturnPolicy::find($return_policy_id);




    
    if($return_policy!=""){

      $is_available_for_return=$request->is_available_for_return;
      $is_available_for_return_replace=$request->is_available_for_return_replace;
      if($request->is_available_for_return==""){
        $is_available_for_return=0;
    }
    if($request->is_available_for_return_replace==""){
        $is_available_for_return_replace=0;
    }
    $return_policy->return_days=$request->return_days;
    $return_policy->is_available_for_return=$is_available_for_return;
    $return_policy->is_available_for_return_replace=$is_available_for_return_replace;
    $return_policy->save();


    $return_policy_translation_id=$return_policy->return_policy_translation_id;
    $return_policy_translation=ReturnPolicyTranslation::find($return_policy_translation_id);

    $return_policy_translation->return_policy_title=$request->return_policy_title;
    
    $return_policy_translation->return_policy_description=$request->return_policy_description;
    $return_policy_translation->save();
    flash('Return Policy updated successfully');
    return redirect('admin/returnpolicy/all');

}else{
    return redirect('admin/returnpolicy/all');
}
}


}
