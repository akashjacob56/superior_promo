<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TermCondition;
use App\TermConditionTranslation;
use DataTables;
use App\Language;
use Config;

class TermConditionController extends Controller
{ 
	
	public function getTermCondition(){
		if(!$this->checkPermission(Config::get('permissions.TERM_CONDITION_DETAILS'))){
			return view('user.unauthorized');
		}
		
		$term_condition=TermCondition::with('default_term_condition_translation')->first();
		$stored_translations=TermConditionTranslation::pluck('language_id');
		if($term_condition!=""){
			
			return view('termconditions.details')->with('term_condition',$term_condition)->with('stored_translations',$stored_translations);	
		}
		return redirect('/');
	}

	public function postTermCondition(Request $request){
		if(!$this->checkPermission(Config::get('permissions.TERM_CONDITION_UPDATE'))){
			return view('user.unauthorized');
		}
		
		$this->validate($request,TermCondition::$edit);
		$term_condition=TermCondition::first();
		$term_condition_id=$term_condition->term_condition_id;

		$term_condition=TermCondition::find($term_condition_id);

		if($term_condition!=""){
			if(isset($request['save'])){
				$this->validate($request,TermCondition::$edit);
				$term_condition_translation_id=$term_condition->term_condition_translation_id;
				$term_condition_translation=TermConditionTranslation::find($term_condition_translation_id);

				$term_condition_translation->term_condition_description=$request->term_condition_description;

				
				$term_condition_translation->save();

				flash('Term condition updated successfully');  

			}else if(isset($request['active'])){
				$term_condition->status_id=1;
				
				$term_condition->save();
				flash('Term condition activated successfully');
			}else if(isset($request['inactive'])){
				$term_condition->status_id=2;
				
				$term_condition->save();
				flash('Term condition activated successfully');
			}
			return redirect('admin/termconditions');
		}else{
			return redirect('admin/termconditions');
		}
	}

	

}

