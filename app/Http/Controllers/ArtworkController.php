<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use DataTables;
use Hash;
use Config;
use Auth;
use App\CartItemArtProofs;
use App\CartItems;
use App\ArtProof;
use App\ArtWork;
class ArtworkController extends Controller
{
   

   //All artwork data
public function getAllArtWork(Request $request){ 
		$order_item_id = $request->order_item_id;
		if($order_item_id!=""){
			$order_item_id = $order_item_id;
		}else{
			$order_item_id = "";
		}
        return view('art-work.all')->with('order_item_id',$order_item_id);
}

public function AllArtWorkData(Request $request){

	if($request->order_item_id!=""){
		$artwork = ArtProof::where('order_item_id',$request->order_item_id)->with('orderitem')->get();
	}else{
		// $artwork=CartItemArtProofs::with('cartitem')->get();
		$artwork = ArtProof::with('orderitem')->get();
	}
    // echo $artwork;die;
    return DataTables::of($artwork)->make(true); 
}

//Update Artwork Data

public function getArtworkDetail(Request $request){
	$artproof_id = $request->id;
	$artproof = ArtProof::where('id',$artproof_id)->with('user')->with('orderitem')->first();

	return view('art-work.detail')->with('artproof',$artproof);
}





//Front End Art Work Start================================================
public function getArtWork(Request $request){
	if(!$this->checkPermission(Config::get('permissions.ART_WORK'))){
            return view('user.unauthorized');
        }
	$art_work = ArtWork::first();
	return view('art-work/artwork-front')->with('art_work',$art_work);
}

public function postArtWork(Request $request){
	$art_work = ArtWork::find($request->art_work_id);
	$art_work->art_digital_revision_proofs_tittle = $request->art_digital_revision_proofs_tittle;
	$art_work->art_digital_revision_proofs_description = $request->art_digital_revision_proofs_description;
	if($request->hasFile('art_digital_revision_proofs_image')){
		$image = $request->art_digital_revision_proofs_image;
		$path = $image->store('art-proof-front-images');
		$art_work->art_digital_revision_proofs_image = $path;
	}

	$art_work->preffered_file_types_title = $request->preffered_file_types_title;
	$art_work->preffered_file_types_description = $request->preffered_file_types_description;
	if($request->hasFile('preffered_file_types_image')){
		$image = $request->preffered_file_types_image;
		$path = $image->store('art-proof-front-images');
		$art_work->preffered_file_types_image=$path;
	}

	$art_work->redraws_modification_file_types_title = $request->redraws_modification_file_types_title;
	$art_work->redraws_modification_file_types_description = $request->redraws_modification_file_types_description;
	if($request->hasFile('redraws_modification_file_types_image')){
		$image = $request->redraws_modification_file_types_image;
		$path  = $image->store('art-proof-front-images');
		$art_work->redraws_modification_file_types_image = $path;
	}

	$art_work->font_title = $request->font_title;
	$art_work->font_description = $request->font_description;
	if($request->hasFile('font_image')){
		$image = $request->font_image;
		$path = $image->store('art-proof-front-images');
		$art_work->font_image = $path;
	}

	$art_work->save();
	return redirect()->back();
}

//Front End Art Work End ================================================



}
