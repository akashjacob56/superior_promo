<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Color;
use App\User;
use DataTables;
use Hash;
use DB;
use Config;
use App\Toast;
class ColorController extends Controller
{
    
    /*all color data*/
    public function getAllColor(Request $request){

        if(!$this->checkPermission(Config::get('permissions.COLOR_ALL'))){
            return view('user.unauthorized');
        }
        return view('color.all');
    }


    public function getAllColorData(Request $request){
        
        $color= Color::with('status')->get();
        return DataTables::of($color)->make(true); 
        
    }


   /*add color*/
   public function postAddColor(Request $request){


      if(!$this->checkPermission(Config::get('permissions.COLOR_ADD'))){
            return view('user.unauthorized');
        }

        $request->validate([
        'name' =>'required|unique:colors|max:13',
        'color_hex'=>'required|unique:colors',
        ]);


        $post=$request->all();

        $color=new Color();
        $color->name=$request->name;
        $color->color_hex=$request->color_hex; 
        $color->save();

        flash('Color added successfully');
        return redirect('admin/color/all-color');

    }


  public function getAddColor(){

        if(!$this->checkPermission(Config::get('permissions.COLOR_ADD'))){
            return view('user.unauthorized');
        }

       return view('color.add');

}


/*edit color*/

  public function getColor(Request $request){

        if(!$this->checkPermission(Config::get('permissions.COLOR_UPDATE'))){
            return view('user.unauthorized');
        }
       
        $color_id=$request->id;
        $color=Color::find($color_id);
        return view('color.details')->with('color',$color);

    }


public function postColor(Request $request){
     

      if(!$this->checkPermission(Config::get('permissions.COLOR_UPDATE'))){
            return view('user.unauthorized');
        }
        
        $request->validate([
        'name' =>'required',
        'color_hex'=>'required',
        ]);

        
       $Color=Color::find($request->id);
       if(isset($request['save'])){
        $post=$request->all();
        $Color=Color::find($request->id);
        $Color->name=$request->name;
        $Color->color_hex=$request->color_hex;
      } 


        else if(isset($request['active'])){
            flash('Color activated successfully');
            $Color->status_id=1;
        }else if(isset($request['inactive'])){
            flash('Color inactivated successfully');
            $Color->status_id=2;   
        }

        $Color->save();

        flash('Color Edited successfully');
        return redirect('admin/color/all-color');
    }


}
