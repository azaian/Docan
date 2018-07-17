<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Shop;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DakakenController extends Controller
{
      public function getIndex(){
     		$sections = Shop::all();
     		 $cate=Category::get();
    	return view('admin.pages.dakaken.dokan.alldokan',compact('sections','cate'));
    }
        public function getEdit($id){
       $sections  = Shop::all(); 
       $old = Shop::find($id);
       return view('admin.pages.dakaken.dokan.alldokan',compact('sections' , 'old'));
    }
    public function getDelete($id){
    	$del=Shop::find($id)->delete();
    
    	return redirect()->back();


    }
   
}
