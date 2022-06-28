<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderProcess;
use DataTables;
use Config;
class OrderProcessController extends Controller
{
	//All Concept ------------------------------------------
    public function getAllOrderProcess(Request $request){
        if(!$this->checkPermission(Config::get('permissions.ORDER_PROCESS'))){
            return view('user.unauthorized');
        }
    	return view('order-process/all');
    }

    public function postAllOrderProcessData(Request $request){
    	$order_processes = OrderProcess::get();
    	return DataTables::of($order_processes)->make(true);
    }

    //Add Concept----------------------------------------------
    public function getAddOrderProcess(Request $request){
    	if(!$this->checkPermission(Config::get('permissions.ORDER_PROCESS'))){
            return view('user.unauthorized');
        }
    	return view('order-process/add');
    }

    public function postAddOrderProcess(Request $request){
    	$order_process = new OrderProcess;
    	$order_process->order_process_description=$request->order_process_description;
    	if($request->hasFile('order_process_image')){
                $Image = $request->order_process_image;
                $path = $Image->store('order_process_image');
                $order_process->order_process_image=$path;
        }
    	$order_process->save();

    	return redirect('admin/order-process/all');
    }

    //Update ----------------------------------------------
    public function getUpdateOrderProcess(Request $request){
        if(!$this->checkPermission(Config::get('permissions.ORDER_PROCESS'))){
            return view('user.unauthorized');
        }
    	$order_process_id = $request->id;
    	$order_process = OrderProcess::where('order_process_id',$order_process_id)->first();
    	return view('order-process/detail')->with('order_process',$order_process);
    }

    public function postUpdateOrderProcess(Request $request){
    	$order_process_id = $request->id;
    	$order_process = OrderProcess::find($order_process_id);
    	$order_process->order_process_description=$request->order_process_description;
    	if($request->hasFile('order_process_image')){
                $Image = $request->order_process_image;
                $path = $Image->store('order_process_image');
                $order_process->order_process_image=$path;
        }
    	$order_process->save();
    	return redirect('admin/order-process/all');
    }
















 //    Route::get('all', ['middleware' => 'auth','uses' => 'OrderProcessController@getAllOrderProcess']);
	// Route::get('all', ['middleware' => 'auth','uses' => 'OrderProcessController@postAllOrderProcessData']);

	// Route::get('add', ['middleware' => 'auth','uses' => 'OrderProcessController@getAddOrderProcess']);
	// Route::post('add', ['middleware' => 'auth','uses' => 'OrderProcessController@postAddOrderProcess']);

	// Route::get('{id}', ['middleware' => 'auth','uses' => 'OrderProcessController@getUpdateOrderProcess']);
	// Route::post('{id}', ['middleware' => 'auth','uses' => 'OrderProcessController@postUpdateOrderProcess']);
}
