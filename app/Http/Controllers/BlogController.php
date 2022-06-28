<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use DataTables;
use App\Blog;
use App\BlogType;
use Auth;
use App\User;
use Hash;
use DB;
use Config;
use App\Toast;

class BlogController extends Controller
{
	    public function getAddBlog(){

	    if(!$this->checkPermission(Config::get('permissions.BLOG_ADD'))){
            return view('user.unauthorized');
        }

		$blog_types = BlogType::all();
		return view('blog.add')->with('blog_types',$blog_types);

	}

	public function postAddBlog (Request $request)
	{	
		
        if(!$this->checkPermission(Config::get('permissions.BLOG_ADD'))){
            return view('user.unauthorized');
        }
           
		$this->validate($request,Blog::$addRule);

        $user_id=$this->getLoginUserId();
		/*$business_id=$this->getBusinessId()*/;
		$blog_type_id=$request->blog_type_id;
//    	$title=$request->blog_title;
		$title=preg_replace('/\s+/', '-', $request->blog_title);

		$blog =new Blog();

		$blog->blog_title=$request->blog_title;
		$blog->url=$request->url;
		$blog->blog_description=$request->blog_description;
		$blog->added_by=$user_id;

		if(isset($request->image)){
			$source=$request->image;
			$image_name=$this->addCompressImage($source,"blog");
			$blog->image=$image_name;
		}
    
		$blog->seo_title=$request->seo_title;
		$blog->seo_keywords=$request->seo_keywords;
		$blog->seo_description=$request->seo_description;
		$blog->blog_type_id=$blog_type_id;
		$blog->save();
		
		flash('Blog Added Successfully...','success');
		return redirect('admin/blog/all');
	}


	public function getAllBlog(){
        
        if(!$this->checkPermission(Config::get('permissions.BLOG_ALL'))){
            return view('user.unauthorized');
        }
		return view('blog.all');
	}


	public function getAllBlogData(Request $request){

		$blog =Blog::with('blog_type')->get();
		return Datatables::of($blog)->make(true);
	}

	public function getEditBlog(Request $request){

		if(!$this->checkPermission(Config::get('permissions.BLOG_UPDATE'))){
            return view('user.unauthorized');
        }

		$blog_id=$request->id;
/*		$business_id=$this->getBusinessId();
		$blog=Blog::where('business_id',$business_id)->find($blog_id);*/
        $blog=Blog::find($blog_id);
		$blog_types = BlogType::all();
		return view('blog.edit')->with('blog_types',$blog_types)->with('blog',$blog);

	}


	public function postEditBlog(Request $request,$id){

		if(!$this->checkPermission(Config::get('permissions.BLOG_UPDATE'))){
            return view('user.unauthorized');
        }		

		$this->validate($request,Blog::$editRule);
		$user_id=$this->getLoginUserId();
		$blog_id=$id;
		/*$business_id=$this->getBusinessId();*/
		$blog_type_id=$request->blog_type_id;
		$blog=Blog::find($blog_id);
		$blog->blog_title=$request->blog_title;
		$blog->added_by=$user_id;
		$blog->blog_description=$request->blog_description;
		$blog->url=$request->url;
		if(isset($request->image)){
			$source=$request->image;
			$image_name=$this->addCompressImage($source,"blog");
			$blog->image=$image_name;
		}
		$blog->seo_title=$request->seo_title;
		$blog->seo_keywords=$request->seo_keywords;
		$blog->seo_description=$request->seo_description;
		$blog->blog_type_id=$blog_type_id;
		$blog->save();

		flash('Blog Update Successfully...','success');
		return redirect('admin/blog/all');
	}


	public function getDeleteBlog(Request $request){
		/*$business_id=$this->getBusinessId();*/
		$blog_id=$request->id;
		$blog=Blog::find($blog_id);
		if($blog!=""){
			$blog->is_deleted=1;
		}
		$blog->save();
		return redirect('admin/blog/all');
	}

	public function getActiveBlog(Request $request){
		/*$business_id=$this->getBusinessId();*/
		$blog_id=$request->id;
		$blog=Blog::find($blog_id);
		if($blog!=""){
			$blog->is_deleted=0;
		}
		$blog->save();
		return redirect('admin/blog/all');
	}
}
