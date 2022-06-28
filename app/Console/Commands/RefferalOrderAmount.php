<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\WalletTransaction;
use App\User;
use App\Business;
use App\Order;
use App\OrderProduct;
use Session;
use App\Appearance;

class RefferalOrderAmount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refferalorder:wallet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

      $request = app(\Illuminate\Http\Request::class);
      $host = $request->getHttpHost();
      $this->host=$host;


      $this->business_id=Session::get("business_id");

      if($this->business_id==""){
        $business=Business::where('sub_domain','like','%'.$host.'%')->orWhere('domain','like','%'.$host.'%')->first();
        if($business!=""){
          $this->business_id=$business->business_id;
        }else{
          $this->business_id=1;
        }
        Session::put("business_id",$this->business_id);         
      }


      $this->appearance=Appearance::where('business_id',$this->business_id)->with('default_appearance_translation')->first(); 

     
      \Log::info('outside');

      if($count!=0){

        \Log::info('inside if');

    }
  }
}
