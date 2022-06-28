<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Policy;
use DataTables;
use Config;
use App\PolicyTranslation;
use App\Language;

class PolicyController extends Controller{

	public function getPolicy(){
		if(!$this->checkPermission(Config::get('permissions.POLICY_DETAILS'))){
			return view('user.unauthorized');
		}
	
		$policy=Policy::with('default_policy_translation')->first();
		$stored_translations=PolicyTranslation::pluck('language_id');
		
		return view('policy.details')->with('policy',$policy)->with('stored_translations',$stored_translations);
	}

	public function postPolicy(Request $request){

		
		if(!$this->checkPermission(Config::get('permissions.POLICY_UPDATE'))){
			return view('user.unauthorized');
		}
		
		$policy=Policy::first();
		if($policy!=""){
			if(isset($request['save'])){
				$this->validate($request,Policy::$edit);
				$policy_translation_id=$policy->policy_translation_id;



				$policy_translation=PolicyTranslation::find($policy_translation_id);



				$policy_translation->policy_description=$request->policy_description;
$policy_translation->return_policy_description=$request->return_policy_description;
				
				
				$policy_translation->save();

				flash('Policy updated successfully');  

			}else if(isset($request['active'])){
				
				$policy->save();
				flash('Policy activated successfully');
			}else if(isset($request['inactive'])){
				
				$policy->save();
				flash('Policy activated successfully');
			}
			return redirect('admin/policy');
		}else{
			return redirect('admin/policy');
		}
	}

	//translation
	public function getPolicyTranslation($language_code){
		
		
		$language=Language::where('language_code',$language_code)->with('default_language_translation')->first();
		$policy=Policy::with('default_policy_translation')->first();
		if($language!="" && $policy!=""){
			$policy_translation=PolicyTranslation::where('language_id',$language->language_id)->first();

			$stored_translations=PolicyTranslation::pluck('language_id');

			return view('policy.language')->with('policy_translation',$policy_translation)->with('language',$language)->with('policy',$policy)->with('stored_translations',$stored_translations);
		}
		return redirect('admin/policy');
	}

	public function postPolicyTranslation(Request $request){ 
		
		$this->validate($request,Policy::$rules);
		$post=$request->all();
		$language_id=$post['language_id'];
		$policy_description=$post['policy_description'];
		
		$language=Language::find($language_id);

		$policy=Policy::first();
		$policy_translation=PolicyTranslation::where('language_id',$language_id)->first();

		if($policy_translation!=""){
			$this->validate($request,Policy::$edit);
			$policy_translation->policy_description=$policy_description;
			$policy_translation->return_policy_description=$request->return_policy_description;

			$policy_translation->save();
			flash('Policy updated successfully');
		}
		else{
			$this->validate($request,Policy::$rules);
			$policy_translation=new PolicyTranslation();
			$policy_translation->language_id=$language_id;
			$policy_translation->policy_description=$policy_description;
                       $policy_translation->return_policy_description=$request->return_policy_description;

			$policy_translation->policy_id=$policy->policy_id;
			
			$policy_translation->save();
			flash('Policy added for new language');
		}
		return redirect('admin/policy/'.$language->language_code);
	}
}
