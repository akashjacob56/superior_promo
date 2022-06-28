<?php

namespace App\Http\Controllers;
use Config;
use Illuminate\Http\Request;
use App\DiscountType;
use App\AppliesTo;
use App\MinimumRequirement;
use App\CustomerEligibility;
use App\Discount;
use App\Product;
use App\Category;
use DataTables;
use App\DiscountApply;
use App\User;
use App\DiscountCustomerApply;

class DiscountController extends Controller
{
	public function getAllDiscountCode(){
		
		return view('discount.all');
	}
	public function getAllDiscountData(){
		
		$discounts=Discount::with('discount_types');
		return DataTables::of($discounts)->make(true);
	}
	public function getAddDiscountCode(){
		if(!$this->checkPermission(Config::get('permissions.PROMOCODE_ADD'))){
			return view('user.unauthorized');
		}
		$discount_types=DiscountType::where('status_id',1)->get();
		$applies_tos=AppliesTo::where('status_id',1)->get();
		$minimum_requirements=MinimumRequirement::where('status_id',1)->get();
		$customer_eligibilities=CustomerEligibility::where('status_id',1)->get();

		return view('discount.add')->with('discount_types',$discount_types)->with('applies_tos',$applies_tos)->with('minimum_requirements',$minimum_requirements)->with('customer_eligibilities',$customer_eligibilities);
	}


	public function postAddDiscountCode(Request $request){
		
		
		$post=$request->all();

		$this->validate($request,Discount::$rules);

		$number_of_time_use_number=0;

		
		if($request->number_of_time_use_number){
			$number_of_time_use_number=$request->number_of_time_use_number;
		}


		$one_use_per_customer=0;
		if($request->one_use_per_customer){
			$one_use_per_customer=$request->one_use_per_customer;
		}

		$is_number_of_time_use=0;
		if($request->is_number_of_time_use){
			$is_number_of_time_use=1;
		}
		
		if($request->applies_to_id==2){
			if($request->minimum_purchase_amount < $request->discount_value){
				flash('Minimum purchase amount must be greater than discount value');
				return redirect('admin/discount/add');
			}
		}


		$discount_applies_to_ids=$request->ids;
		$arrr=explode(",",$discount_applies_to_ids);
		$customers=$request->customer_ids;
		$customers=explode(",",$customers);

		$is_hide=$request->is_hide;

		if ($is_hide=="") {
			$is_hide=0;
		}


		$discount =new Discount();
		
		$discount->discount_type_id=$request->discount_type_id;		
		$discount->applies_to_id=$request->applies_to_id;
		$discount->minimum_purchase_amount=$request->minimum_purchase_amount;
		$discount->discount_code=$request->discount_code;	
		$discount->discount_value=$request->discount_value;
		$discount->customer_eligibility_id=$request->customer_eligibility_id;
		// $discount->is_limit_number_of_times=$is_number_of_time_use;
		$discount->is_limit_number_of_times=10000;
		$discount->limit_number_of_times=$number_of_time_use_number;
		$discount->only_one_use_per_customer=$one_use_per_customer;
		$discount->start_date=$request->start_date;
		$discount->start_time=$request->start_time;
		$discount->end_date=$request->end_date;
		$discount->is_hide=0;
		if(isset($request->image)){
			$source=$request->image;
			$image_name=$this->addCompressImage($source,"discount");
			$discount->image=$image_name;
		}
		$discount->title=$request->title;
		$discount->description=$request->description;

		$discount->save();

		if(count($arrr)!='' && $discount->applies_to_id >1 ){
			foreach ($arrr as  $id) {
				$discount_applies_to= new DiscountApply();
				$discount_applies_to->discount_id=$discount->discount_id;
				$discount_applies_to->applies_on_id=$id;
				$discount_applies_to->save();
			}
		}
		if(count($customers)!='' && $discount->customer_eligibility_id==2){
			foreach ($customers as  $customer) {
				$discount_customer_existing=DiscountCustomerApply::where('customer_id',$customer)->where('discount_id',$discount->discount_id)->first();
				if($discount_customer_existing==""){
					$discount_customer_apply=new DiscountCustomerApply();
					$discount_customer_apply->discount_id=$discount->discount_id;
					$discount_customer_apply->customer_id=$customer;
					$discount_customer_apply->save();
				}
			}
		}

		flash('Discount code created successfully');
		return redirect('admin/discount/all');
	}

	public function getDiscountCode(Request $request){
		if(!$this->checkPermission(Config::get('permissions.PROMOCODE_UPDATE'))){
			return view('user.unauthorized');
		}
		
		$discount_id=$request->id;
		$discount_types=DiscountType::where('status_id',1)->get();
		$applies_tos=AppliesTo::where('status_id',1)->get();
		$minimum_requirements=MinimumRequirement::where('status_id',1)->get();
		$customer_eligibilities=CustomerEligibility::where('status_id',1)->get();

		$discount=Discount::where('discount_id',$discount_id)->with('discount_types')->first();

		

		
		$discount_customer_apply=DiscountCustomerApply::with('customer')->where('discount_id',$discount_id)->get();
		$customer_ids=$discount_customer_apply->pluck('customer_id');

		

		
		return view('discount.details')->with('discount_types',$discount_types)->with('applies_tos',$applies_tos)->with('minimum_requirements',$minimum_requirements)->with('customer_eligibilities',$customer_eligibilities)->with('discount',$discount)->with('discount_customer_apply',$discount_customer_apply)->with('customer_ids',$customer_ids);
	}

	public function postDiscountCode(Request $request){
		if(!$this->checkPermission(Config::get('permissions.PROMOCODE_UPDATE'))){
			return view('user.unauthorized');
		}

		$discount_id=$request->id;
		

		$number_of_time_use_number=0;
		if($request->is_number_of_time_use==1){
			if($request->number_of_time_use_number){
				$number_of_time_use_number=$request->number_of_time_use_number;
			}
		}
		
		$one_use_per_customer=0;
		if($request->one_use_per_customer){
			$one_use_per_customer=$request->one_use_per_customer;
		}

		$customers=$request->customer_ids;
		$customers=explode(",",$customers);


		$this->validate($request,Discount::$edit);

		$discount=Discount::find($discount_id);
		
		if($discount!=""){
			$is_hide=$request->is_hide;

		if ($is_hide=="") {
			$is_hide=0;
		}
			

			$this->validate($request,['category_url'=>'unique:discounts,discount_code,'.$discount_id.',discount_id']);

			$discount->discount_type_id=$request->discount_type_id;		
			$discount->applies_to_id=$request->applies_to_id;
			
			$discount->discount_code=$request->discount_code;
			$discount->discount_value=$request->discount_value;
			$discount->minimum_purchase_amount=$request->minimum_purchase_amount;
			$discount->is_limit_number_of_times=$request->is_number_of_time_use;
			$discount->limit_number_of_times=$number_of_time_use_number;
			$discount->only_one_use_per_customer=$one_use_per_customer;
			$discount->customer_eligibility_id=$request->customer_eligibility_id;
			$discount->start_date=$request->start_date;
			$discount->start_time=$request->start_time;
			$discount->end_date=$request->end_date;
			$discount->end_time=$request->end_time;
			$discount->is_hide=0;
			if(isset($request->image)){
			$source=$request->image;
			$image_name=$this->addCompressImage($source,"discount");
			$discount->image=$image_name;
		}
		$discount->title=$request->title;
		$discount->description=$request->description;

			$discount->save();

			if(count($customers)!=0 && $discount->customer_eligibility_id==2){
				foreach ($customers as  $customer) {

					$discount_customer_existing=DiscountCustomerApply::where('customer_id',$customer)->where('discount_id',$discount->discount_id)->first();
					if($discount_customer_existing==""){
						$discount_customer_apply=new DiscountCustomerApply();
						$discount_customer_apply->discount_id=$discount->discount_id;
						$discount_customer_apply->customer_id=$customer;
						$discount_customer_apply->save();
					}
				}
			}
			flash('Discount code updated successfully');
			return redirect('admin/discount/all');
		}
	}

	public function showAllSpecificCategory(Request $request){

		$keyword=$request->category_search_keyword;
		
		$products=Category::where('status_id',1)->whereHas('category_translation',function($query) use($keyword){
			if($keyword!=""){
				$query->where('category_name','like','%'.$keyword.'%');
			}
		})->with('default_category_translation')->get();

		$this->data['data']=$products;
		$this->response['data']=$this->data;
		$this->response['status']='true';
		return $this->response;
	}

	public function showAllSpecificProduct(Request $request){
		
		$keyword=$request->category_search_keyword;
		$products=Product::where('status_id',1)->whereHas('product_translation',function($query) use($keyword){
			if($keyword!=""){
				$query->where('product_name','like','%'.$keyword.'%');
			}
		})->with('default_product_translation')->get();

		$this->data['data']=$products;
		$this->response['data']=$this->data;
		$this->response['status']='true';
		return $this->response;
	}

	public function showAllSpecificCustomer(Request $request){
		
		$keyword=$request->customer_search_keyword;
		$customer=User::where(function($query) use($keyword){
			if($keyword!=""){
				$query->where('name','like','%'.$keyword.'%');
			}
		})->get();

		$this->data['data']=$customer;
		$this->response['data']=$this->data;
		$this->response['status']='true';
		return $this->response;
	}

	public function deleteSpecificDiscountFor(Request $request){

		$discount_apply_id=$request->discount_apply_id;

		/*$discount_customer_apply=DiscountCustomerApply::where('customer_id',$customer_id)->where('discount_id',$discount_id)->get();*/
		$discount_apply=DiscountCustomerApply::find($discount_apply_id);

		if($discount_apply!=""){
			$discount_apply->delete();
			$this->response['msg']=" deleted successfully";
			$this->response['status']="true";

			return $this->response;
			return "deleted successfully";
		}
		return "something wrong";
	}
}
