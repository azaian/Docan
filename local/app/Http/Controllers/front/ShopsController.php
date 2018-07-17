<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Cart;
use Illuminate\Http\Request;
use DB;
use App\Product;
use App\User;
use App\Http\Requests;
use App\Category;
use App\Category_translation;
use App\Shop;
use App\Shops_translation;

class ShopsController extends Controller {

    public function show($id) {


        $shop = Shop::find($id);

        if (!empty($shop)) {

            $cat = $shop->category;
            $cart = Cart::content();

            $products = $shop->product()->paginate(24);

            return view('front/docans/docan')->withshop($shop)->withcat($cat)
                            ->withproducts($products)->withcart($cart);
        } else {
            return view('errors/404')->withcart($cart);
        }
    }

    

}

