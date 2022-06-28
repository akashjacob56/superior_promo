<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use App\User;
use App\RolePermission;
use App\Role;
use App\Permission;
use App\UserPermission;

use App\Http\Traits\SendMail;
use App\RegistrationSetting;

use ImageOptimizer;

use App;
use Config;
use App\Language;
use App\EmailConfiguration;
class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public $response;
	public $host;
	public $base_url;


	function checkEmail($email) {
		$find1 = strpos($email, '@');
		$find2 = strpos($email, '.');
		return ($find1 !== false && $find2 !== false && $find2 > $find1 ? true : false);
	}

	

	public function getLanguageId(){
		$language_id=Session::get("language_id");
		return $language_id;
	}


	public function getLanguageCode(){
		$language_id=Session::get("language_id");
		$language=Language::find($language_id);
		$language_code=$language->language_code;

		return $language_code;
	}

	
	
	public function checkPermission($permission){
		if (Auth::user()) {
			$user_id=Auth::user()->id;
			$role_id=Auth::user()->role_id;

			$role_permission_ids=RolePermission::where('role_id',$role_id)->pluck('permission_id');

			$user_permission_ids=UserPermission::where('user_id',$user_id)->pluck('permission_id');

			$permissions=Permission::orWhereIn('permission_id',$role_permission_ids)->orWhereIn('permission_id',$user_permission_ids)->pluck('permission_name');

			if($permissions->contains($permission)){
				return true;
			}else{
				return false;
			}
		}
	}

	public function getLoginUserId(){
		if (Auth::user()) {
			$id_token=Auth::user()->id;
		}else{
			$id_token = Session::token();
		}
		return $id_token;
	}

	public function getLoginUserSellerId(){
		if (Auth::user()) {
			$id_token=Auth::user()->id;
		}else{
			$id_token = Session::token();
		}
		return $id_token;
	}




	
	public function addCompressImage($source,$image_type){ 
		

		$image_name=$source->store("/".$image_type);
		// ImageOptimizer::optimize("storage/app/".$image_name);
		return $image_name;
	}

	public function getThemePath(){
		
		$theme_path="theme1";
		return $theme_path;
	}



}
