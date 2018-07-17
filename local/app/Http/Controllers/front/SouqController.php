<?php
namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Products_attributes;
use Illuminate\Http\Request;
use DB;
use App\Product;
use App\User;
use App\Souq;
use App\Http\Requests;
use App\Category;
use App\Category_translation;
use App\Shop;
use Cart;
use App\Shops_translation;

class SouqController extends Controller
{
public function index()
    {
        $cart = Cart::content();
        $products = Product::paginate(15);           // get shops  in pages each has 15 shop
        return view('front/souq/souq')->withproducts($products);
    }

    public function getIndex()
    {
        $cart = Cart::content();
        $products = Product::paginate(15);           // get shops  in pages each has 15 shop
        return view('front/souq/souq')->withproducts($products);
    }

    public function getProduct($id)
    {

        $product = Product::find($id);
        $product->views = $product->views + 1;
        $product->update();
        return view('front/souq/souq_product')->withproduct($product);
    }

    public function postSearch(Request $request)
    {
        $data = $request->input();          //get data form the request
        $cat_id = $request->input(['cat']);  // get parent category id
        $sub_cat_id = $request->input(['subcats']); // get category id 
        $attrs = array();                           // var to save attributes values and id to search with
        $i = 0;
        // loop to get data of attributes id and values in attrs array 
        foreach ($data as $key => $value) {
            if (is_numeric($key)) {
                $attrs[$i]['key'] = $key;
                $attrs[$i]['value'] = $value;
                $i++;
            }
        }
        // check if parent category selected or not
        if (!$cat_id == "") {
            // check if category selected or not 
            if (!$sub_cat_id == "") {
                // get all product that belongs to that category 
                $prod_id = Souq::where('cat_id', $sub_cat_id)->get(['product_id']);
                // check if there is product in that category or not 
                if (!empty($prod_id)) {
                    $prod_id = array_flatten($prod_id->toarray());// set proudts id in var to get them
                }
                $product_ids = array(); // array to save final ids after check the attributes filters
                // check if there is attribute want to filter search with or not 
                if (!empty($attrs)) {
                    // loop to get id of product that have these attributes 
                    foreach ($attrs as $attr) {
                        // get product id if it was in prod_id that selected by category and have attribute id with attr[key] and its value is the value of attr [value ]
                        $product_ids[] = Products_attributes::where('attribute_id', $attr['key'])->where('value', $attr['value'])
                            ->whereIn('product_id', $prod_id)->get(['product_id'])->toarray();
                    }
                    //flatten array to make it in one row  
                    $product_ids = array_flatten($product_ids);
                } // if there is no attributes to filter by it, then
                else {
                    $product_ids = $prod_id; // products id will be the same as the selected by category 
                }
            } // if the category is not selected then get all cat that in the parent one 
            else {
                // get id of category under the parent one that selected 
                $sub_cat_id = Category::where('perant_id', $cat_id)->get(['id']);
                // check if there is category under parent or not 
                if (!empty($sub_cat_id)) {
                    // get categoreis id in flatten array 
                    $sub_cat_id = array_flatten($sub_cat_id->toarray());
                    // get products id that belongs to these categories 
                    $product_ids = array_flatten(Souq::WhereIn('cat_id', $sub_cat_id)->get()->toarray());
                }
            }
        } // if there is not parent category selected go to index to show all categories 
        else {
            return redirect('souq');
        }
        $cart = Cart::content();
        $products = Product::whereIn('id', $product_ids)->paginate(15);
        return view('front/souq/souq')->withproducts($products)->withcard($cart);
    }
}