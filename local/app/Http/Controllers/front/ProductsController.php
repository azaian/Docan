<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Product;
use App\User;
use App\Http\Requests;
use App\Category;
use App\Category_translation;
use App\Shop;
use Cart;
use App\Shops_translation;

class ProductsController extends Controller {

    public function show($id) {

        $product = Product::find($id);
        $shop = $product->shop;

        foreach ($shop as $shops) {
            $shop_id = $shops->id;
        }


        return view('front/products/product')->withproduct($product)->withshop($shop);
    }

    public function cart($id) {
        if (auth()->check()) {

            $product = Product::find($id);
                   
            if (!empty($product->product_trans('ar'))) {
                $name = $product->product_trans('ar')->name;
            }
            Cart::add(array('id' => $id, 'image' => $product->image, 'name' => $name, 'qty' => 1, 'price' => $product->price));

            $cart = Cart::content();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }

    public function delcart($id) {
        $rowId = Cart::search(array('id' => $id));
        Cart::remove($rowId[0]);
        return redirect()->back();
    }

    public function updatecart(Request $request) {
        $id = $request->input('product_id');
        $quant = $request->input('quan');
        $rowId = Cart::search(array('id' => $id));
        $item = Cart::get($rowId[0]);

        Cart::update($rowId[0], $item->qty = $quant);
        $cart = Cart::content();
        return redirect()->back();
    }

}
