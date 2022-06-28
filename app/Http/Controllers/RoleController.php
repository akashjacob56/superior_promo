<?php

namespace App\Http\Controllers;
use App\Role;
use App\Permission;
use App\RolePermission;
use Illuminate\Http\Request;
use DataTables;
use Config;

class RoleController extends Controller
{
	public function getAddRole(){
		if(!$this->checkPermission(Config::get('permissions.ROLE_ADD'))){
			return view('user.unauthorized');
		}
		return view('role.add');
	}

	public function postAddRole(Request $request){
		if(!$this->checkPermission(Config::get('permissions.ROLE_ADD'))){
			return view('user.unauthorized');
		}
		$this->validate($request,Role::$rules);
		$role = new Role();		
		$role->role=$request->role;		
		$role->save();
		return redirect('admin/role/all');          
	}

	public function getAllRole(Request $request){
		if(!$this->checkPermission(Config::get('permissions.ROLE_ALL'))){
			return view('user.unauthorized');
		}
		return view('role.all');
	}

	public function getAllRoleData(Request $request){
		if(!$this->checkPermission(Config::get('permissions.ROLE_ALL'))){
			return view('user.unauthorized');
		}
		$role=Role::all();
		return DataTables::of($role)->make(true);
	}

	public function getRole($id){
		if(!$this->checkPermission(Config::get('permissions.ROLE_DETAILS'))){
			return view('user.unauthorized');
		}		
		$role=Role::find($id);
		if($role!=""){
			$permissions=Permission::with('role_permission')->get();
			$permission_ids=RolePermission::where('role_id',$role->role_id)->pluck('permission_id');
			$assigned_permissions=Permission::whereIn('permission_id',$permission_ids)->get();
			return view("role.details")->with('role',$role)->with('permission_ids',$permission_ids)->with('permissions',$permissions);
		}else{
			return redirect('admin/role/all');
		}
	}

	public function postRole(Request $request){
		if(!$this->checkPermission(Config::get('permissions.ROLE_DETAILS'))){
			return view('user.unauthorized');
		}		
		$role_id=$request->id;
		$role=Role::find($role_id);
		if(isset($request['save'])){
			if($role!=""){

				$role->role=$request->role;						
				flash('Role updated successfully');
			}else{
				return redirect('admin/role/all');
			}
			$role->save();
			return redirect("admin/role/all");
		}

	}

	public function postRemoveRole(Request $request){
		if(!$this->checkPermission(Config::get('permissions.ROLE_UPDATE'))){
			return view('user.unauthorized');
		}
		$post=$request->all();
		$role_permission_id=$post['role_permission_id'];
		$permission_id=0;
		$role_permission=RolePermission::find($role_permission_id);
		$permission_id=$role_permission->permission_id;
		if($role_permission!=""){
			
			$role_permission->delete();
		}
		$role_permissions=RolePermission::where('permission_id',$permission_id)->with('role')->get();
		return array("permission_id"=>$permission_id,"role_permissions"=>$role_permissions);
	}


	public function postChangePermissionRole(Request $request){
		if(!$this->checkPermission(Config::get('permissions.ROLE_UPDATE'))){
			return view('user.unauthorized');
		}
		$post=$request->all();
		$role_id=$post['role_id'];
		$permission_id=$post['permission_id'];
		$permission=$post["permission"];

		$role_permission=RolePermission::where('role_id',$role_id)->where('permission_id',$permission_id)->first();
		
		if($role_permission!=""){
			if($permission==0){
				$role_permission->delete();
			}
		}else{
			if($permission==1){
				$role_permission=new RolePermission();
				$role_permission->role_id=$role_id;
				$role_permission->permission_id=$permission_id;
				$role_permission->save();
			}
		}
		$role_permissions=RolePermission::where('permission_id',$permission_id)->with('role')->get();
		return array("permission_id"=>$permission_id,"role_permissions"=>$role_permissions);
	}
}
