<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Auth;
use App\ContactUs;
use App\User;
use DataTables;
use Hash;
use DB;
use Config;
use App\Toast;

class ContactUsController extends Controller
{
    

  public function getContactUs(Request $request){

      if(!$this->checkPermission(Config::get('permissions.CONTACT_US_UPDATE'))){
            return view('user.unauthorized');
        }
       
        $ContactUs=ContactUs::first();
        return view('contactus.details')->with('ContactUs',$ContactUs);

    }


public function postContactUs(Request $request){
     

      if(!$this->checkPermission(Config::get('permissions.CONTACT_US_UPDATE'))){
            return view('user.unauthorized');
        }
        
       $request->validate([
        'office_hours' =>'required',
        'toll_free'=>'required',
        'local_no' =>'required',
        'fax' =>'required',

        'general_information'=>'required|max:40|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',
        'salesandquotes' =>'required|max:40|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',
        'art_department'=>'required|max:40|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',
        'billing_question' =>'required|max:40|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',
        'samples_requests'=>'required|max:40|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',

        'address_superiorpromos_inc' =>'required',
        'mailing_address'=>'required',
        ]);

        
        $Contactus=ContactUs::find($request->id);

        $Contactus->office_hours=$request->office_hours;
        $Contactus->toll_free=$request->toll_free;
        $Contactus->local_no=$request->local_no;
        $Contactus->fax=$request->fax;

        $Contactus->general_information=$request->general_information;
        $Contactus->salesandquotes=$request->salesandquotes;

        $Contactus->art_department=$request->art_department;
        $Contactus->billing_question=$request->billing_question;

        $Contactus->samples_requests=$request->samples_requests;
        $Contactus->address_superiorpromos_inc=$request->address_superiorpromos_inc;
        $Contactus->mailing_address=$request->mailing_address;
     
        $Contactus->save();

        flash('ContactUs Pgae Details Updated Successfully');
        $ContactUs=ContactUs::first();
        return redirect('admin/contactus/contactus-master')->with('ContactUs',$ContactUs);

    }

}
