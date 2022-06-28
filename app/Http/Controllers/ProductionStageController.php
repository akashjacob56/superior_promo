<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stage;
use DataTables;
class ProductionStageController extends Controller
{

	//production All
    public function getProductionAll(Request $request){
    	return view('production-stage/all');
    }

    public function getProductAllDatatable(Request $request){
    	$stages = Stage::get();
        
    	return DataTables::of($stages)->make(true);
    }

    //product Add
    public function getProductionAdd(Request $request){
    	return view('production-stage/add');
    }

    public function postProductionAdd(Request $request){
    	$production_stage_name = $request->production_stage_name;
    	$stage = new Stage;
    	$stage->name = $production_stage_name;
    	$stage->save();
    	return redirect('admin/production/all');
    }

    //Product Edit 
    Public function getProductionEdit(Request $request){
    	$stage_id = $request->id;
    	$stage = Stage::find($stage_id);
    	return view('production-stage/details')->with('stage',$stage);
    }

    public function postProductionEdit(Request $request){
    	$stage_id = $request->id;
    	$production_stage_name = $request->production_stage_name;
    	$stage = Stage::find($stage_id);
    	$stage->name = $production_stage_name;
    	$stage->save();
    	return redirect('admin/production/all');
    }

    

}
