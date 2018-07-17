<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\souq;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

 class SouqController extends Controller
{
     public function getIndex(){
     		$sections = souq::orderBy('id', 'DESC')->get();
     		 $cate=Category::get();
                 
    	return view('admin.pages.souq.souq',compact('sections','cate'));
    }

    
    public function index(){
     		$sections = souq::all();
     		 $cate=Category::get();
    	return view('admin.pages.souq.souq',compact('sections','cate'));
	}

    public function getDelete($id){
        $pro=souq::find($id);
       
        $product=$pro->prod ;
         $del=$product->product_trans('ar')->delete();      
         $pro->delete();

            $product->delete();
        
         session()->push('n','تم مسح المنتج بنجاح   '); 
            return redirect('adminsouq/index');
    }
    public function postChange($id){
     $pro=souq::find($id);
     $product=$pro->prod ;
     $product->active=Input::get('active');
     $product->save();
      session()->push('n','تم تعديل حاله المنتج بنجاح   '); 
            return redirect('adminsouq/index');

    }
}
