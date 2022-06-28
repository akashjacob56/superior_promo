<?php
namespace App\Http\Traits;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;
trait SendMail{

	public $to;
	public $subject;
	public $message;
	public $name;
	public $file;
	public $email;
	public $appearance_email;
	public $seller_email;
	public $order_products;

	public $order_id;
	public $business_id1;
	
	public function __construct(){
		$this->subject1="";
		$this->subject2="";
		$this->to="";
		$this->email="";
		$this->name="";
		$this->file="";
		$this->message="";
		$this->name="";
		$this->app_name="";
		$this->business_email="";
		$this->app_logo="";
		$this->order_id="";
		$this->appearance_email="";
		$this->seller_email="";
		$this->order_product=[];
		$this->delivery_address="";
		$this->order_products=[];
		$this->$order_date="";
		$this->$order_id="";
		$this->business_id1=""; 
		
	}

	// Registration
	public function registrationMail($data){
		
		$this->to=$data['email'];
		$this->name=$data['name'];
		$this->app_name=$data['app_name'];
		$this->subject1=$data['subject1'];
		$this->subject2=$data['subject2'];
		$this->app_logo=$data['app_logo'];
		$this->appearance_email="care@swaaslife.com";
		$this->business_email="it@bkstextiles.in";
		$this->email=[$this->to];
		try{
			Mail::send("mail/registerMail",$data,function($message) {
				$message->to($this->email, $this->name)->subject
				($this->subject1);
				$message->from($this->appearance_email,"Swaas Care");
			});


			Mail::send("mail/adminRegisterMail",$data,function($message) {
				$message->to($this->business_email,$this->app_name)->subject
				($this->subject2);
				$message->from($this->appearance_email,"Swaas Care");
			});

			return "true";
		}
		catch (\Exception $e) {
                      
			return $e->getMessage(); 
		}
	}  

	 // Contact-us mail

	public function contactUsMail($data){



		$this->to=$data['email'];
		$this->name=$data['name'];
		$this->app_name=$data['app_name'];
		$this->subject1=$data['subject1'];
		$this->subject2=$data['subject2'];
		$this->app_logo=$data['app_logo'];
		$this->appearance_email=$data['appearance_email'];
		$this->business_email=['care@swaaslife.com', 'it@bkstextiles.in', 'product@swaaslife.com', 'cwh@swaaslife.com'];
				$this->email=[$this->to];
                $this->appearance_email="care@swaaslife.com";
 


		try{

			Mail::send("mail/contactUsMail",$data,function($message) {
				$message->to($this->email, $this->name)->subject
				($this->subject1);
				$message->from($this->appearance_email,"Swaas Care");
			});


			Mail::send("mail/adminContactUsMail",$data,function($message) {
				$message->to($this->business_email,$this->app_name)->subject
				($this->subject2);
				$message->from($this->appearance_email,"Swaas Care");
			});
			return "true";
		}
		catch (\Exception $e) {
			return $e->getMessage(); 
		}
	}


//payment status in order controller
	public function paymentStatusPaid($data){
		$this->to=$data['email'];
		$this->name=$data['name'];
		$this->app_name=$data['app_name'];
		$this->email=$data['email'];
		$this->subject1=$data['subject1'];
		$this->subject2=$data['subject2'];
		$this->app_logo=$data['app_logo'];
		$this->seller_email=$data['seller_email'];
		$this->order_products=$data['order_products'];
		$this->delivery_address=$data['delivery_address'];
		$this->order_date=$data['order_date'];
		$this->order_id=$data['order_id'];
                $this->appearance_email="care@swaaslife.com";
                $this->business_email=['care@swaaslife.com', 'it@bkstextiles.in', 'product@swaaslife.com', 'cwh@swaaslife.com'];


		try{

			Mail::send("mail/paymentStatusMail",$data,function($message) {
				$message->to($this->email,$this->name)->subject
				($this->subject1);
				$message->from($this->seller_email,"Swaas Care");
			});

			Mail::send("mail/adminPaymentStatusMail",$data,function($message) {
				$message->to($this->business_email,$this->app_name)->subject
				($this->subject2);
				$message->from($this->appearance_email,"Swaas Care");
			});

			return "true";
		}
		catch (\Exception $e) {

			return $e->getMessage(); 
		}

	}

//order placed seller successfully
	public function orderPlaceMail($data){

	
		$this->to=$data['email'];
		$this->name=$data['name'];
		$this->app_name=$data['app_name'];
		$this->email=$data['email'];
		$this->subject1=$data['subject1'];
		$this->subject2=$data['subject2'];
		$this->app_logo=$data['app_logo'];
		$this->seller_email="it@bkstextiles.in";
		$this->order_products=$data['order_products'];
		$this->delivery_address=$data['delivery_address'];
		$this->order_date=$data['order_date'];
		$this->order_id=$data['order_id'];
		$this->amount=$data['amount'];
		$this->discount_amount=$data['discount_amount'];
		$this->business_email=['care@swaaslife.com', 'it@bkstextiles.in', 'product@swaaslife.com', 'cwh@swaaslife.com'];
                $this->appearance_email="care@swaaslife.com";
	

		try{
			Mail::send("mail/orderPlacedMail",$data,function($message) {
				$message->to($this->email,$this->name)->subject
				($this->subject1);
				$message->from($this->appearance_email,"Swaas Care");
			});

			Mail::send("mail/adminOrderPlacedMail",$data,function($message) {
				$message->to($this->business_email,"Swaas Care Admin")->subject
				($this->subject2);
				$message->from($this->appearance_email,"Swaas Care");
			});
			
		  
			return "true";
		}
		catch (\Exception $e) {

			return $e->getMessage(); 
		}

	}

//delivered and paid in Order Controller
	public function paidDeliverMail($data){
		$this->to=$data['email'];
		$this->name=$data['name'];
		$this->app_name=$data['app_name'];
		$this->email=$data['email'];
		$this->subject1=$data['subject1'];
		$this->subject2=$data['subject2'];
		$this->app_logo=$data['app_logo'];
		$this->seller_email=$data['seller_email'];
		$this->order_products=$data['order_products'];
		$this->delivery_address=$data['delivery_address'];
		$this->order_date=$data['order_date'];
		$this->order_id=$data['order_id'];
                $this->business_email=['care@swaaslife.com', 'it@bkstextiles.in', 'product@swaaslife.com', 'cwh@swaaslife.com'];




		try{
			Mail::send("mail/orderDeliveryPaidStatus",$data,function($message) {
				$message->to($this->email,$this->name)->subject
				($this->subject1);
				$message->from($this->seller_email,"Swaas Care");
			});

			Mail::send("mail/adminOrderDeliveryPaidStatus",$data,function($message) {
				$message->to($this->business_email,$this->app_name)->subject
				($this->subject2);
				$message->from($this->appearance_email,"Swaas Care");
			});

			return "true";
		}
		catch (\Exception $e) {

			return $e->getMessage(); 
		}
	}

	//payment status in order controller
	public function otherOrderStatus($data){
		$this->to=$data['email'];
		$this->name=$data['name'];
		$this->app_name=$data['app_name'];
		$this->email=$data['email'];
		$this->subject1=$data['subject1'];
		$this->subject2=$data['subject2'];
		$this->app_logo=$data['app_logo'];
		$this->seller_email=$data['seller_email'];
		$this->order_products=$data['order_products'];
		$this->delivery_address=$data['delivery_address'];
		$this->order_date=$data['order_date'];
		$this->order_id=$data['order_id'];
		$this->business_email=['care@swaaslife.com', 'it@bkstextiles.in', 'product@swaaslife.com', 'cwh@swaaslife.com'];
                $this->appearance_email="care@swaaslife.com";

		
               

				    
			try{
                    
		    
			Mail::send("mail/orderStatusChangeMail",$data,function($message) {
				$message->to($this->email,$this->name)->subject
				($this->subject1);
				$message->from($this->appearance_email,"Swaas Care");
			});

			Mail::send("mail/adminOrderStatusChangeMail",$data,function($message) {
				$message->to($this->business_email)->subject
				($this->subject2);
				$message->from($this->appearance_email,"Swaas Care");
			});
				return "true"; 
		}
            
		catch (\Exception $e) {
                 echo "false";die; 
                      			return $e->getMessage(); 
		}
		
		 
	}

//forgot password OTP
	public function forgotPasswordMail($data){
		$this->to=$data['email'];
		$this->name=$data['name'];
		$this->app_name=$data['app_name'];
		$this->email=$data['email'];
		$this->subject1=$data['subject1'];
		$this->app_logo=$data['app_logo'];
		$this->business_email=$data['business_email'];
		$this->business_id1=$data['business_id'];

		try{
			Mail::send("mail/forgotPassword",$data,function($message) {
				$message->to($this->email,$this->name)->subject
				($this->subject1);
				$message->from($this->appearance_email,"Swaas Care");
			});
			return "true";
		}
		catch (\Exception $e) {

			return $e->getMessage(); 
		}
	}

	public function sendHtmlMail($data){
		$this->to=$data['email'];
		$this->name=$data['name'];
		$this->email=$data['email'];
		$this->subject1=$data['subject'];
		$this->mobile=$data['mobile'];
		$this->text1=$data['text1'];		
		$this->filename=$data['filename'];
		$filename=$data['filename'];
		$this->email=[$this->to];
		$this->app_logo=$data['app_logo'];
		if($filename=="contact"){
			/*Mail::send("mail/mail",$data,function($message) {
				$message->to($this->email, $this->name)->subject
				("Contact Mail");
				$message->from('sales@apexmarketreports.com',"APEX Market Report");
			});
			Mail::send("mail/adminContactMail",$data,function($message) {
				$message->to("sales@apexmarketreports.com","Apex Reports Market")->subject
				("Contact Mail");
				$message->from($this->appearance_email,$this->app_name);
			});*/
		}
	}

	/*	public function sendHtmlMail2($data){
		$this->to=$data['email'];
		$this->name=$data['name'];
		$this->email=$data['email'];
		$this->mobile=$data['mobile'];
		$this->text1=$data['text1'];	
		$this->country=$data['country'];	
		$this->enquiry_title=$data['enquiry_title'];
		$this->enquiry_company=$data['enquiry_company'];
		$this->report_title=$data['report_title'];		
		$this->filename=$data['filename'];
		$filename=$data['filename'];
		$this->email=[$this->to];
		if($filename=="enquiry"){
			Mail::send("mail/enquiryMail",$data,function($message) {
				$message->to($this->email, $this->name)->subject
				("Enquiry Before Buying : ".$this->report_title);
				$message->from('sales@apexmarketreports.com',"APEX Market Report");
			});
			Mail::send("mail/adminEnquiryMail",$data,function($message) {
				$message->to("sales@apexmarketreports.com", "Apex Market Reports")->subject
				("Enquiry Before Buying : ".$this->report_title);
				$message->from($this->appearance_email,$this->app_name);
			});
		}
		elseif($filename=="sample_request"){
			Mail::send("mail/requestSampleMail",$data,function($message) {
				$message->to($this->email, $this->name)->subject
				("Sample Request : ".$this->report_title);
				$message->from('sales@apexmarketreports.com',"APEX Market Report");
			});
			Mail::send("mail/adminEnquiryMail",$data,function($message) {
				$message->to("sales@apexmarketreports.com","Apex Market Reports")->subject
				("Sample Request : ".$this->report_title);
				$message->from($this->appearance_email,$this->app_name);
			});
		}else{
			$this->report_id=$data['report_id'];
			$this->designation=$data['designation'];
			$this->address=$data['address'];
			$this->pre=$data['pre'];
			$this->city=$data['city'];
			$this->state=$data['state'];
			$this->amount=$data['amount'];
			$this->lastname=$data['lastname'];
			Mail::send("mail/adminPaymentMail",$data,function($message) {
				$message->to("sales@apexmarketreports.com","Apex Market Reports")->subject
				("Payment Form Mail : ".$this->report_title);
				$message->from($this->appearance_email,$this->app_name);
			});
		}
	}*/

	public function sellerRegistrationMail($data){
		$this->to=$data['email'];
		$this->name=$data['name'];
		$this->app_name=$data['app_name'];
		$this->email=$data['email'];
		$this->subject1=$data['subject1'];
		$this->subject2=$data['subject2'];
		$this->app_logo=$data['app_logo'];
		$this->business_id1=$data['business_id'];

		$this->appearance_email=$data['appearance_email'];
		$this->email=[$this->to];
		try{
			Mail::send("mail/SellerRegistrationMail",$data,function($message) {
				$message->to($this->email, $this->name)->subject
				($this->subject1);
				$message->from($this->appearance_email,$this->app_name);
			});

			Mail::send("mail/adminSellerRegistrationMail",$data,function($message) {
				$message->to($this->appearance_email,$this->app_name)->subject
				($this->subject2);
				$message->from($this->appearance_email,$this->app_name);
			});

			return "true";
		}
		catch (\Exception $e) {

			return $e->getMessage(); 
		}

	}

	public function RedeemAmountMail($data){



		$this->to=$data['email'];
		$this->name=$data['name'];
		$this->app_name=$data['app_name'];
		$this->subject1=$data['subject1'];
		$this->subject2=$data['subject2'];
		$this->app_logo=$data['app_logo'];
		$this->appearance_email=$data['appearance_email'];
		$this->email=[$this->to];



		try{

			Mail::send("mail/RedeemRequestMail",$data,function($message) {
				$message->to($this->email, $this->name)->subject
				($this->subject1);
				$message->from($this->appearance_email,$this->app_name);
			});


			Mail::send("mail/adminRedeemRequestMail",$data,function($message) {
				$message->to($this->appearance_email,$this->app_name)->subject
				($this->subject2);
				$message->from($this->appearance_email,$this->app_name);
			});
			return "true";
		}
		catch (\Exception $e) {
			return $e->getMessage(); 
		}
	}


	public function productEnquiryMail($data){

		$this->to=$data['email'];
		$this->name=$data['name'];
		$this->app_name=$data['app_name'];
		$this->email=$data['email'];
		$this->subject1=$data['subject1'];
		$this->subject2=$data['subject2'];
		$this->app_logo=$data['app_logo'];
		$this->business_id1=$data['business_id'];
        $this->appearance_email=$data['appearance_email'];
		$this->seller_email=$data['seller_email'];
		$this->email=[$this->to];

	
			Mail::send("mail/productEnquiryMail",$data,function($message) {
				$message->to("ram@vshop.com", $this->name)->subject
				($this->subject1);
				$message->from($this->appearance_email,$this->app_name);
			});

			Mail::send("mail/adminproductEnquiryMail",$data,function($message) {
				$message->to($this->seller_email,$this->app_name)->subject
				($this->subject2);
				$message->from($this->appearance_email,$this->name);
			});

			
	}

}
