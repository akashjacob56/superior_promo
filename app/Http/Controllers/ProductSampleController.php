<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductSample;
use Input;
use Config;
class ProductSampleController extends Controller
{



    public function getProductSample(Request $request){

        if(!$this->checkPermission(Config::get('permissions.PRODUCT_SAMPLE'))){
            return view('user.unauthorized');
        }
    	$product_sample = ProductSample::first();
    	return view('product-sample.product-sample')->with('product_sample',$product_sample);
    }



    public function postProductSample(Request $request){
    	$product_sample_id = $request->product_sample_id;
    	$product_sample_title = $request->product_sample_title;
    	$order_sample_title = $request->order_sample_title;
    	$policy_sample_title = $request->policy_sample_title;

    	$product_sample_description = $request->product_sample_description;
    	$order_sample_description = $request->order_sample_description;
    	$policy_sample_description = $request->policy_sample_description;

    	$product_sample = ProductSample::find($product_sample_id);
    	$product_sample->product_sample_title = $product_sample_title;
    	$product_sample->product_sample_description = $product_sample_description;
    	$product_sample->order_sample_title = $order_sample_title;
    	$product_sample->order_sample_description = $order_sample_description;
    	$product_sample->policy_sample_title = $policy_sample_title;
    	$product_sample->policy_sample_description = $policy_sample_description;

    	if($request->hasFile('product_sample_image')){
                $Image = $request->product_sample_image;
                $path = $Image->store('product_sample_image');
                $product_sample->product_sample_image=$path;
        }
        if($request->hasFile('order_sample_image')){
                $Image = $request->order_sample_image;
                $path = $Image->store('order_sample_image');
                $product_sample->order_sample_image=$path;
        }
        if($request->hasFile('policy_sample_image')){
                $Image = $request->policy_sample_image;
                $path = $Image->store('policy_sample_image');
                $product_sample->policy_sample_image=$path;
        }
        $product_sample->save();

        return redirect()->back();
    }
}
