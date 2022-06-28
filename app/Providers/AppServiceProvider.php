<?php
namespace App\Providers;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Auth;
use App\UserPermission;
use App\RolePermission;
use App\Permission;
use App\User;
use App\Appearance;
use View;
use App\Language;
use App\Category;
use App\Cart;
use Artisan;
use DB;
use App\AddressSetting;
use App\RegistrationSetting;
use App\Notification;
use App\NotificationRead;
use Carbon\Carbon;
use App\About;
use App\TermCondition;
use App\GlobalOrder;
use App\ShippingCharge;
use Storage;
use File;
use App\Theme;
use App\DeliveryOption;
use App;
use App\Country;
use Illuminate\Support\Facades\Route;
use App\BusinessLanguage;
use App\LanguageTranslation;
use App\Section;
use App\CountryTranslation;
use App\StateTranslation;
use App\CityTranslation;
use App\Pincode;
use App\Complaint;
use App\CartItems;
use PDO;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {   
      Schema::defaultStringLength(191);

      
      Blade::withoutDoubleEncoding();

      Paginator::useBootstrapThree();
      view()->composer('*', function($view){
        $cart_count=0;
        $id=0;
        if (Auth::user()) {
          $id=Auth::user()->id;
        }else{
          $id= Session::token();
        }

        $request = app(\Illuminate\Http\Request::class);
        $host = $request->getHttpHost();

/*    $dbhost="127.0.0.1";
    $dbname="luvswjkt_superior";
    $dbuser="luvswjkt_superior";
    $dbpass="Superior@123";

    $db = new PDO("mysql:host=".$dbhost.";dbname=".$dbname, $dbuser, $dbpass, array(PDO::ATTR_PERSISTENT => 'unbuff', PDO::MYSQL_ATTR_USE_BUFFERED_QUERY =>true));
*/

        $language_id=Session::get("language_id");
        if($language_id==""){
          $language_id=1;
          Session::put("language_id",$language_id);
        }

        $selected_language=Language::where('status_id',1)->with('default_language_translation')->with(['language_translation'=>function($query) use ($language_id){
          $query->where('language',$language_id);
        }])->find($language_id);

        if($selected_language==""){
          $language_id=1;
          $selected_language=Language::where('status_id',1)->with('language_translation')->find($language_id);
        }
        $language_code=$selected_language->language_code;
        if($request->language!=""){
          $language_code=$request->language;
        }
                     
        App::setLocale($language_code);

       
        $get_business_language=Language::find(1);

        $business_language_name="English";

        
        $permissions=Permission::where('permission_id',0)->pluck('permission_name');
        $role_id=[];
        

      
        
        $menu_categories=Category::where('status_id','1')->where('is_parent_category',1)->with('default_category_translation')->with(['category_translation'=>function($query) use ($language_id){
          $query->where('language_id',$language_id);
        }])->with(["child_categories"=>function($query) use ($language_id){
          $query->orderBy('updated_at','desc')->with(['category'=>function($query) use($language_id){
            $query->with('default_category_translation')->with(['category_translation'=>function($query) use($language_id){
              $query->where('language_id',$language_id)->orderBy('updated_at','desc');
            }]);
          }])->with(["sub_child_categories"=>function($query) use ($language_id){
            $query->orderBy('updated_at','desc')->with(['category'=>function($query) use($language_id){
              $query->with('default_category_translation')->with(['category_translation'=>function($query) use($language_id){
                $query->where('language_id',$language_id)->orderBy('updated_at','desc');
              }]);
            }]);
          }]);
        }])->where('status_id','1')->get();

     
         

        if (Auth::user()) {
          $user_id=Auth::user()->id;
          $role_id=Auth::user()->role_id;
          $role_permission_ids=RolePermission::where('role_id',$role_id)->pluck('permission_id');
          $user_permission_ids=UserPermission::where('user_id',$user_id)->pluck('permission_id');
          $permissions=Permission::orWhereIn('permission_id',$role_permission_ids)->orWhereIn('permission_id',$user_permission_ids)->pluck('permission_name');
        }

        if(Auth::user()) {

          $user=Auth::user();
          
          $user_id=Auth::user()->id;
          
          if($user->role_id==1 ){
            $user=User::find($user_id);
          }else{
            $user=User::find($user_id);
          }

          

          $notifications=Notification::with('default_notification_translation')->with(['notification_read'=>function($query) use ($user_id){
            $query->where('user_id',$user_id);
          }])->with('notificationclass')->with(['product_section'=>function($query){
            $query->with('default_product_translation');
          }])->with(['category_section'=>function($query){
            $query->with('default_category_translation');
          }])->orderBy('updated_at','desc')->where('status_id',1)->where("created_at",'>=',$user->created_at)->take(3)->get();

          $notification=Notification::with('default_notification_translation')->whereDoesntHave('notification_read',function($query) use ($user_id){
            $query->where('user_id',$user_id);
          })->where('status_id',1)->get();

          $notification_count=$notification->count();

        }

        $complaint_count=Complaint::where('is_read',0)->count();


       /* $active_languages=Language::where('status_id',1)->with('default_language_translation')->with(['language_translation'=>function($query) use ($language_id){
          $query->where('language',$language_id);
        }])->get();*/

        $active_languages=Language::where('status_id',1)->with('default_language_translation')->with(['language_translation'=>function($query) use ($language_id){
          $query->where('language',$language_id);
        }])->get();



         /*$cart_count=Cart::where('user_id',$id)->count();*/
           $cart_count=Cart::where('user_id',$id)->first();
            
           

            if ($cart_count!=[]){
                $cart_id=$cart_count->id;
                $cart_count=CartItems::where('cart_id',$cart_id)->count();
            }else{
              $cart_count=0;
            }  
               

          $category_count=Category::where('status_id',1)->where('is_main_category',1)->count();

        
          $global_orders_count=1;

        $total_notification_count=Notification::where('status_id',1)->count();  


        $about=About::with('default_aboutus_translation')->with(['aboutus_translation'=>function($query) use ($language_id){
          $query->where('language_id',$language_id);
        }])->first();
        $term_condition=TermCondition::with('default_term_condition_translation')->with(['term_condition_translation'=>function($query) use ($language_id){
          $query->where('language_id',$language_id);
        }])->first();
		

             
          View::share('base_url',"http://143.198.138.16");       
        // View::share('base_url',"http://localhost/superiorpromos.com");  

       
        $delivery_options=DeliveryOption::first();

        $carts=[];

        $countries=Country::where('country_id','!=',1)->where('status_id','=',1)->with('default_country_translation')->get();

        $country_names=CountryTranslation::where('country_id','!=',1)->pluck('country_name');
    $state_names="";
    $city_names="";
    $pincodes="";


    

        $new_sections=Section::where('section_id','!=',1)->with('section_products')->where('status_id',1)->orderBy('section_id','desc')->take(2)->get();
       $theme_path="theme1";
        $shipping_charge=ShippingCharge::first();




          $total_categories = Category::with('category_translation')->get();

          if (Auth::user()) {
            $login_user_id=Auth::user()->id;
            }else{
              $login_user_id = Session::token();
            }
            
          
    

        $total_carts = Cart::with('cart_item')->where('user_id',$login_user_id)->first();
        
       
 //where('user_id',$login_user_id)->with('user')->//
        if ($total_carts!=""){
        $cart_id=$total_carts->id;
       
       

        $total_carts=CartItems::with('product')->with('cartitemcolor')->with('cartitemimprint')->where('cart_id',$cart_id)->orderBy('created_at','desc')->get();

        $total_cart_price_sum = 0;
        foreach ($total_carts as $cart) {
            $cart_id = $cart->id;
            $cart_item = CartItems::where('id',$cart_id)->first();
            $total_cart_price_sum=$total_cart_price_sum+$cart_item->price;
        }
        
        }else{
           $total_carts=[];
           $total_cart_price_sum = 0;
        }

        /*for discount in checkout*/
         $main_total_app=0;
         if($total_carts!=[]){
         foreach($total_carts as $product){
         $main_total_app=$main_total_app+$product->quantity*$product->price;
              if($product->cartitemimprint!="[]"){
                 foreach($product->cartitemimprint as $imprint){
                  $main_total_app=$main_total_app+$imprint->setup_price;
              }
             }             
           }
         }else{
           
           $main_total_app=0;
         }

           $shipping_cost_app=0;
           $discount_app=0;


           



        View::share('main_total_app',$main_total_app);
        View::share('shipping_cost_app',$shipping_cost_app);
        View::share('discount_app',$discount_app);
      

        View::share('total_cart_price_sum',$total_cart_price_sum);
        View::share('total_carts',$total_carts);
        
        

        View::share('total_categories',$total_categories);

        View::share('get_business_language',$get_business_language);
        View::share('business_language_name',$business_language_name);
       
        View::share('language_code',$language_code);
       
        View::share('about',$about);
        View::share('global_orders_count',$global_orders_count);
        View::share('term_condition',$term_condition);
        View::share('role_id',$role_id);
        View::share('cart_count', $cart_count);
        View::share('my_permissions', $permissions);
         View::share('shipping_charge',$shipping_charge);
        View::share('country_names',$country_names);
        View::share('state_names',$state_names);
        View::share('city_names', $city_names);
        View::share('pincodes', $pincodes);
      
      
        View::share('active_languages',$active_languages);
        View::share('selected_language',$selected_language);
        View::share('menu_categories',$menu_categories);
        View::share('countries',$countries);
        View::share('category_count',$category_count);
        View::share('theme_path',$theme_path);
        View::share('delivery_options',$delivery_options);
        View::share('carts',$carts);
        View::share('new_sections',$new_sections);
        View::share('complaint_count',$complaint_count);
        

        if(Auth::user()){
         View::share('notification_count',$notification_count);
         View::share('total_notification_count',$total_notification_count);
         View::share('notifications',$notifications);
         $status_id=Auth::user()->status_id;
         if ($status_id==2) {
           Auth::logout();
         }
       }

       $current_date=date('Y-m-d');
    });
}

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(){
      

    }


  }