<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Http\Requests;
use App\Shop;
use App\Http\Controllers\Controller;

class ProductController extends Controller {

    public function getIndex() {
     $shops = Shop::all();
        $cate = Category::get();
        // $cart = Cart::content(); 
        return view('admin.pages.dakaken.products.allproducts', compact('shops', 'cate'));
    }

    /* public function getView($id){
      $sections=Product::find($id);
      return view('admin.pages.dakaken.products.allproducts',compact('sections'));
      }
     */

    public function getEdit($id) {
        $sections = Product::all();
        $old = Product::find($id);
        return view('admin.pages.dakaken.products.allproducts', compact('sections', 'old'));
    }

    public function getDelete($id) {
        $del = Product::find($id)->delete();
        return redirect()->back();
    }

    /* public function postSearch(Request $request)
      {

      $query = $request->input('search');

      $all_section=products::all();
      $all_project=C::find($query)->projects;
      return view('project.allprojects',compact('all_section','all_project'));

      } */
}
