<?php

namespace App\Http\Controllers\front;

use App\Attribute;
use App\Attribute_translation;
use App\Categories_attributes;
use App\Category;
use App\Category_shop;
use App\Category_translation;
use App\Dropdown;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Order;
use App\Orderproduct;
use App\Ordershipping;
use App\Product;
use App\Product_favorite;
use App\Product_image;
use App\Product_review;
use App\Products_attributes;
use App\Products_translation;
use App\Shop;
use App\Shops_favorite;
use App\Shops_follower;
use App\Shops_products;
use App\Souq;
use App\User;
use Cart;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class ProfileController extends Controller
{

//    variable to need to update profiles
    private $imagename;
    private $data;


    public function getIndex()
    {

        $shop = new Shop;
        $souq = new Souq;
        $product = new Product;

        return view('front/auth/profile')->withshop($shop)->withsouq($souq)->withproduc($product);
    }

    public function getSetting()
    {

        $shop = new Shop;
        $souq = new Souq;
        $product = new Product;
        $cart = Cart::content();
        return view('front/profile/profile_setting')->withshop($shop)->withsouq($souq)->withproduc($product)->withcart($cart);
    }

    public function getDocan()
    {
        $shop = new Shop;
        $souq = new Souq;
        $product = new Product;


        return view('front/profile/profile_docan')->withshop($shop)->withsouq($souq)->withproduc($product);
    }

    public function getMydocan($id)
    {
        $shop = new Shop;
        $souq = new Souq;
        $product = new Product;


        return view('front/profile/profile_mydocan')->withshop($shop)->withsouq($souq)->withproduc($product)->withshop_id($id);
    }

    public function getMyAdv()
    {


        $id = auth()->user()->id;

        $myadv = Souq::where('user_id', $id)->get();


        return view('front/profile/profile_adv')->withmyadv($myadv);
    }

    public function getAdvDelete($id)
    {
        $dest = 'uploads/';                                                 //set uploads directory
        Product_favorite::where('product_id', $id)->delete();               //delete adv form fav table in database
        Product_review::where('product_id', $id)->delete();                 //delete adv from reviews in database
        Products_attributes::where('product_id', $id)->delete();            //delete each attributes in database
        Products_translation::where('product_id', $id)->delete();           //delete all its trans in database
        // get images name of the product
        $images = Product_image::where('product_id', $id)->get(['image']);
        //check if there is images or not
        if (!$images->isEmpty()) {

            $images = array_flatten($images->toarray());                       // get name in flatten array
            // loop to delete images form uploads directory
            foreach ($images as $image) {
                $this->deleteimage($image, $dest);
            }
        }

        Product_image::where('product_id', $id)->delete();                        // delete images form database

        Souq::where('product_id', $id)->delete();                                 //delete product form souq
        $image = Product::find($id)->get(['image']);                              // get product image
        // check if there is an image or not
        if (!$image->isEmpty()) {
            $image = array_flatten($image->toarray());                              //get image name in flatten array
            $this->deleteimage($image, $dest);                                      //delete images form uploads directory
        }
        $this->deleteimage($image, $dest);
        Product::find($id)->delete();                                               // delete product from  database
        return redirect('profile/my-adv');

    }

    // not commented yet
    public function getAdvEdit($id)
    {
        $lang = 'ar';
        $product = Product::findorfail($id);
        $product_trans = $product->product_trans($lang)->where('product_id', $id)->first();
        $product_imgs = $product->images();
        if (notNullValue($product_imgs)) {
            echo 'notnull';
            $product_imgs = $product_imgs->toarray();
        } else {
            $product_imgs = array();
        }
        $sub_cat_id = $product->category()->first()->id;
        $main_cat_id = Category::where('id', $sub_cat_id)->first()->perant_id;
        $sub_cat_name = Category_translation::where(['lang' => $lang, 'category_id' => $sub_cat_id])->first()->name;
        $main_cat_name = Category_translation::where(['lang' => $lang, 'category_id' => $main_cat_id])->first()->name;
        $attributes_id = array_flatten(Categories_attributes::where('category_id', $sub_cat_id)->get(['attribute_id'])->toarray());
        $attributes_value = array_flatten(Products_attributes::where('product_id', $id)->whereIn('attribute_id', $attributes_id)->get(['value'])->toarray());

        //get type and id of that attributes in array
        $attribute_data = Attribute::whereIn('id', $attributes_id)->get(['type', 'id'])->toarray();
        $attribute_names = array_flatten(Attribute_translation::where('lang', $lang)->whereIn('attribute_id', $attributes_id)->get(['name'])->toarray());
        //create array to save values of dropdown on
        $dropdown_values = array();
        //set dropdown values in two dimensional array have the values of all dropdown attributes
        foreach ($attribute_data as $data) {
            if ($data['type'] == 'dropdown') {
                $dropdown_values[] = array_flatten(Dropdown::where('attribute_id', $data['id'])->get(['value'])->toarray());
            }
        }


        $data = ['data' => $attribute_data, 'names' => $attribute_names];

        return view('front/profile/editad')->withmaincat($main_cat_name)
            ->withsubcat($sub_cat_name)->withattrvalues($attributes_value)->withdata($data)->withimgs($product_imgs)
            ->withproducttrans($product_trans)->withproduct($product)->withdropdown($dropdown_values);


    }

    public function postEditAdd(Request $request, $id)
    {
        $oldpruduct = Product::findorfail($id);
        $lang = "ar";                                                            //get language to use
        $dest = "uploads/";                                         //set destination directory to upload in
        $product_name = $request->input('name');                    //get product name
        $product_details = $request->input('details');              //get product details
        $Dattribute = array();                                      //create arraay to save attributes values and names
        $product_image = $oldpruduct->image;                        //set image name to the old name
        $product_images = array();
        //loop to get old images

        foreach ($oldpruduct->images()->toarray() as $obj) {
            $product_old_images[] = $obj['image'];
        }

        //loop to set data in Data attributes array if it numberic because dynamic attribute have no name so we used id as a name for is
        $i = 0;                                                     // var to loop in Dattributes, if the condition is true
        foreach ($request->input() as $key => $value) {
            if (is_numeric($key)) {
                $Dattribute[$i]['id'] = $key;
                $Dattribute[$i]['value'] = $value;
                $i++;
            }
        }
        // check if the request has main image to upload and upload it and save name in var
        if ($request->hasFile('image')) {
            $this->deleteimage($product_image, $dest);       //delete the old image
            $this->uploadimage($request, $dest);            //function to upload an image take request and destination
            $product_image = $this->data['image'];
        }

        // funtion to upload the rest images of the product and save name in array
        if ($request->hasFile('images')) {
            foreach ($product_old_images as $image) {
                $this->deleteimage($image, $dest);
            }
            Product_image::whereIn('image', $product_old_images)->delete();
            $this->uploadimages($request, $dest);
            $product_images = $this->data['images'];

        }
        $product = Product::findorfail($id);    //create product object to save data
        $product->image = $product_image;               //set data in the product object
        $product->save();                               //save the object with the new data in database
        //create product_translation object
        $product_trans = Products_translation::where('product_id', $id)->where('lang', $lang)->first();
        $product_trans->product_id = $product->id;      //set data in the product_translation object
        $product_trans->lang = $lang;                   //set data in the product_translation object
        $product_trans->details = $product_details;     //set data in the product_translation object
        $product_trans->name = $product_name;           //set data in the product_translation object
        $product_trans->save();                         //save the object with the new data in database
        //for each load to save dynamic attributes that save in Dattribute array
        foreach ($Dattribute as $dattr) {
            //create product_attribute object
            $product_attributes = Products_attributes::where('product_id', $id)->where('attribute_id', $dattr['id'])->where('lang', $lang)->first();
            $product_attributes->lang = $lang;                  //set data in the product_attribute object
            $product_attributes->attribute_id = $dattr['id'];   //set data in the product_attribute object
            $product_attributes->value = $dattr['value'];       //set data in the product_attribute object
            $product_attributes->product_id = $product->id;     //set data in the product_attribute object
            $product_attributes->save();                        //save the object with the new data in database
        }
        //loop to save images names of the product in the database product_images table
        if ($request->hasFile('images')) {
            foreach ($product_images as $image) {
                $product_attributes = Product_image::create();      //create product_image object
                $product_attributes->image = $image;                //set data in the product_image object
                $product_attributes->product_id = $id;     //set data in the product_image object
                $product_attributes->save();                        //save the object with the new data in database
            }
        }
        Session::push('m', 'adv updated ');                // set message that product created well
        return redirect('profile/my-adv/');                             // go to profile route
    }

    public function getFavorite()
    {

        $shop = new Shop;
        $souq = new Souq;
        $product = new Product;
        $id = auth()->user()->id;

        $favo = Product_favorite::where('user_id', $id)->get();

        return view('front/profile/profile_favorite')->withfavo($favo);
    }

    public function getFollow()
    {

        $id = auth()->user()->id;

        $follow = Shops_follower::where('user_id', $id)->get();

        return view('front/profile/profile_follow')->withfollow($follow);
    }

    public function getMyOrder()
    {
        $id = auth()->user()->id;

        $order = Order::where('user_id', $id)->get();

        return view('front/profile/profile_myorder')->withorders($order);
    }

    public function getOrderDetails($id)
    {
        $owner=Order::find($id);
     if (Auth::user()->id==$owner->user_id )   {
            $lang = 'ar';
            $order = Order::findorfail($id);
            $products_id = Orderproduct::where('order_id', $id)->get(['product_id']);
            if (!empty($products)) {
                $products_id = array_flatten($products->toarray());
            }
            $products_order = Orderproduct::where('order_id', $id)->get();
            $products = Product::whereIn('id', $products_id)->get();
            $order_shipping=Ordershipping::where('order_id',$id)
                ->first(['payment','city','address','governate','post_num','country','mark'])->toarray();
            return view('front/profile/profile_order_details')->withorders($order)->withproducts($products)
                ->withlang($lang)->withorderprod($products_order)->withordership($order_shipping);
        }else{
         return redirect('profile/my-order');
     }
    }

    public function getAddProduct($id)
    {   //get the lang to use
        $lang = 'ar';
        // get category id of the shop in array
        $shop_cat_id = Category_shop::where('shop_id', $id)->first(['category_id'])->toarray()['category_id'];
        //get attributes id of that category in array
        $attribute_ids = array_flatten(Categories_attributes::where('category_id', $shop_cat_id)->get(['attribute_id'])->toarray());
        //get type and id of that attributes in array
        $attribute_data = Attribute::whereIn('id', $attribute_ids)->get(['type', 'id'])->toarray();
        // get attributes names in array
        $attribute_names = array_flatten(Attribute_translation::where('lang', $lang)->whereIn('attribute_id', $attribute_ids)->get(['name'])->toarray());
        //create array to save values of dropdown on
        $dropdown_values = array();
        //set dropdown values in two dimensional array have the values of all dropdown attributes
        foreach ($attribute_data as $data) {
            if ($data['type'] == 'dropdown') {
                $dropdown_values[] = array_flatten(Dropdown::where('attribute_id', $data['id'])->get(['value'])->toarray());
            }
        }
        // set data array to have the type, id and the name of the attributes
        $dataa = ['data' => $attribute_data, 'names' => $attribute_names];
        //open form da add new product with dynamic attributes
        return view('front/profile/mydocan/addproduct')->withshop_id($id)->withdataa($dataa)->withdropdown($dropdown_values);

    }

    public function postAddProduct(Request $request, $id)
    {
        $lang = "ar";                                                            //get language to use
        $dest = "uploads/";                                         //set destination directory to upload in
        $product_name = $request->input('name');                    //get product name
        $shop_id = $id;                                             //get shop id
        $product_num = $request->input('num');                      //get product quantity to save
        $product_details = $request->input('details');              //get product details
        $product_price = $request->input('price');                  //get product price
        $product_model = $request->input('model');                  //get product model
        $Dattribute = array();                                      //create arraay to save attributes values and names
        $i = 0;                                                     // var to loop in Dattributes, if the condition is true
        $product_image = null;                                      //var to get main image of the product
        $product_images = array();                                  //array to save rest images
        //loop to set data in Data attributes array if it numberic because dynamic attribute have no name so we used id as a name for is
        foreach ($request->input() as $key => $value) {
            if (is_numeric($key)) {
                $Dattribute[$i]['id'] = $key;
                $Dattribute[$i]['value'] = $value;
                $i++;
            }
        }

        // check if the request has main image to upload and upload it and save name in var
        if ($request->hasFile('image')) {
            $this->uploadimage($request, $dest);            //function to upload an image take request and destination
            $product_image = $this->data['image'];
        }
        // funtion to upload the rest images of the product and save name in array
        if ($request->hasFile('images')) {

            $this->uploadimages($request, $dest);
            $product_images = $this->data['images'];

        }
        $product = Product::create();                   //create product object to save data
        $product->num = $product_num;                   //set data in the product object
        $product->price = $product_price;               //set data in the product object
        $product->image = $product_image;               //set data in the product object
        $product->model = $product_model;               //set data in the product object
        $product->save();                               //save the object with the new data in database
        $product_trans = Products_translation::create();//create product_translation object
        $product_trans->product_id = $product->id;      //set data in the product_translation object
        $product_trans->lang = $lang;                   //set data in the product_translation object
        $product_trans->details = $product_details;     //set data in the product_translation object
        $product_trans->name = $product_name;           //set data in the product_translation object
        $product_trans->save();                         //save the object with the new data in database
        $product_shop = Shops_products::create();       //create shop_product object
        $product_shop->product_id = $product->id;       //set data in the shop_product object
        $product_shop->shop_id = $shop_id;              //set data in the shop_product object
        $product_shop->save();                          //save the object with the new data in database
        //for each load to save dynamic attributes that save in Dattribute array
        foreach ($Dattribute as $dattr) {
            $product_attributes = Products_attributes::create();//create product_attribute object
            $product_attributes->lang = $lang;                  //set data in the product_attribute object
            $product_attributes->attribute_id = $dattr['id'];   //set data in the product_attribute object
            $product_attributes->value = $dattr['value'];       //set data in the product_attribute object
            $product_attributes->product_id = $product->id;     //set data in the product_attribute object
            $product_attributes->save();                        //save the object with the new data in database
        }
        //loop to save images names of the product in the database product_images table
        foreach ($product_images as $image) {
            $product_attributes = Product_image::create();      //create product_image object
            $product_attributes->image = $image;                //set data in the product_image object
            $product_attributes->product_id = $product->id;     //set data in the product_image object
            $product_attributes->save();                        //save the object with the new data in database
        }
        Session::push('m', 'product inserted ');                // set message that product created well
        return redirect('profile');                             // go to profile route

    }

    public function getMyProducts($id)
    {
        $lang = "ar";
        $products_id = array_flatten(Shops_products::where('shop_id', $id)->get(['product_id'])->toarray());
        $products = Product::whereIn('id', $products_id)->get();
        return view('front/profile/profile_products')->withproducts($products)->withlang($lang)->withshop_id($id);
    }

    public function postUpdateProfile(Request $request)
    {
        $dest = "uploads/profiles/";                            //set destination of uploading directory
        $oldProfile = User::findorfail($request->input('id'));  //get old data
        $this->data = $request->input();                          //set new data to data variable
        if ($request->hasFile('image')) {                         //if image updated
            $this->uploadimage($request, $dest);                      //upload the new image
            $this->deleteimage($oldProfile['image'], $dest);    //delete the old image
        }
        /*setting the new data to array*/
        foreach ($this->data as $key => $data) {
            if ($key == "remmeber" || $key == "_token")
                continue;
            $oldProfile[$key] = $this->data[$key];

        }
        $oldProfile->save();                       //save profile with the new data
        Session::push('doneM', 'profile data updated');// set a flash message
        return redirect('profile');
    }

    public function getProductEdit($product_id, $id)
    {
        // var id is the shop id
        //get the lang to use
        $lang = 'ar';
        // get category id of the shop in array
        $shop_cat_id = Category_shop::where('shop_id', $id)->first(['category_id'])->toarray()['category_id'];
        //get attributes id of that category in array
        $attribute_ids = array_flatten(Categories_attributes::where('category_id', $shop_cat_id)->get(['attribute_id'])->toarray());
        //get type and id of that attributes in array
        $attribute_data = Attribute::whereIn('id', $attribute_ids)->get(['type', 'id'])->toarray();
        // get attributes names in array
        $attribute_names = array_flatten(Attribute_translation::where('lang', $lang)->whereIn('attribute_id', $attribute_ids)->get(['name'])->toarray());
        //create array to save values of dropdown on
        $dropdown_values = array();
        //set dropdown values in two dimensional array have the values of all dropdown attributes
        foreach ($attribute_data as $data) {
            if ($data['type'] == 'dropdown') {
                $dropdown_values[] = array_flatten(Dropdown::where('attribute_id', $data['id'])->get(['value'])->toarray());
            }
        }
        // set data array to have the type, id and the name of the attributes
        $data = ['data' => $attribute_data, 'names' => $attribute_names];
        //get data of the product it self
        $product_values = Product::findorfail($product_id);
        //open form da edit a product with dynamic attributes
        return view('front/profile/mydocan/editproduct')->withshop_id($id)->withdata($data)->withdropdown($dropdown_values)->withlang($lang)->withvalues($product_values);

    }

    public function postEditProduct(Request $request, $product_id, $shop_id) //comments need to change
    {
        $oldpruduct = Product::findorfail($product_id);
        $lang = "ar";                                                            //get language to use
        $dest = "uploads/";                                         //set destination directory to upload in
        $product_name = $request->input('name');                    //get product name
        $product_num = $request->input('num');                      //get product quantity to save
        $product_details = $request->input('details');              //get product details
        $product_price = $request->input('price');                  //get product price
        $product_model = $request->input('model');                  //get product model
        $Dattribute = array();                                      //create arraay to save attributes values and names
        $i = 0;                                                     // var to loop in Dattributes, if the condition is true
        $product_image = $oldpruduct->image;                        //set image name to the old name
        $product_images = array();
        //loop to get old images
        foreach ($oldpruduct->images()->toarray() as $obj) {
            $product_old_images[] = $obj['image'];
        }
        //loop to set data in Data attributes array if it numberic because dynamic attribute have no name so we used id as a name for is
        foreach ($request->input() as $key => $value) {
            if (is_numeric($key)) {
                $Dattribute[$i]['id'] = $key;
                $Dattribute[$i]['value'] = $value;
                $i++;
            }
        }

        // check if the request has main image to upload and upload it and save name in var
        if ($request->hasFile('image')) {
            $this->deleteimage($product_image, $dest);       //delete the old image
            $this->uploadimage($request, $dest);            //function to upload an image take request and destination
            $product_image = $this->data['image'];
        }
        // funtion to upload the rest images of the product and save name in array
        if ($request->hasFile('images')) {
            foreach ($product_old_images as $image) {
                $this->deleteimage($image, $dest);
            }
            Product_image::whereIn('image', $product_old_images)->delete();
            $this->uploadimages($request, $dest);
            $product_images = $this->data['images'];

        }
        $product = Product::findorfail($product_id);    //create product object to save data
        $product->num = $product_num;                   //set data in the product object
        $product->price = $product_price;               //set data in the product object
        $product->image = $product_image;               //set data in the product object
        $product->model = $product_model;               //set data in the product object
        $product->save();                               //save the object with the new data in database
        //create product_translation object
        $product_trans = Products_translation::where('product_id', $product_id)->where('lang', $lang)->first();
        $product_trans->product_id = $product->id;      //set data in the product_translation object
        $product_trans->lang = $lang;                   //set data in the product_translation object
        $product_trans->details = $product_details;     //set data in the product_translation object
        $product_trans->name = $product_name;           //set data in the product_translation object
        $product_trans->save();                         //save the object with the new data in database
        //for each load to save dynamic attributes that save in Dattribute array
        foreach ($Dattribute as $dattr) {
            //create product_attribute object
            $product_attributes = Products_attributes::where('product_id', $product_id)->where('attribute_id', $dattr['id'])
                ->where('lang', $lang)->first();
            $product_attributes->lang = $lang;                  //set data in the product_attribute object
            $product_attributes->attribute_id = $dattr['id'];   //set data in the product_attribute object
            $product_attributes->value = $dattr['value'];       //set data in the product_attribute object
            $product_attributes->product_id = $product->id;     //set data in the product_attribute object
            $product_attributes->save();                        //save the object with the new data in database
        }
        //loop to save images names of the product in the database product_images table
        if ($request->hasFile('images')) {
            foreach ($product_images as $image) {
                $product_attributes = Product_image::create();      //create product_image object
                $product_attributes->image = $image;                //set data in the product_image object
                $product_attributes->product_id = $product_id;     //set data in the product_image object
                $product_attributes->save();                        //save the object with the new data in database
            }
        }
        Session::push('m', 'product updated ');                // set message that product created well
        return redirect('profile/my-products/' . $shop_id);                             // go to profile route
    }

    // not commented yet
    public function getProductDelete($product_id, $shop_id)
    {
        $dest = 'uploads/';
        Product_favorite::where('product_id', $product_id)->delete();
        Product_review::where('product_id', $product_id)->delete();
        Products_attributes::where('product_id', $product_id)->delete();
        Products_translation::where('product_id', $product_id)->delete();

        $images = array_flatten(Product_image::where('product_id', $product_id)->get(['image'])->toarray());
        foreach ($images as $image) {
            $this->deleteimage($image, $dest);
        }

        Product_image::where('product_id', $product_id)->delete();
        Shops_products::where('product_id', $product_id)->delete();
        $image = array_flatten(Product::find($product_id)->get(['image']));
        $this->deleteimage($image, $dest);
        Product::find($product_id)->delete();
        return redirect('profile/my-products/' . $shop_id);
    }


    /*private functions to upload and delete images */
    private function uploadimage(Request $request, $dest)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $this->imagename = time() . $file->getClientOriginalName();
            $file->move($dest, $this->imagename);
            $this->data['image'] = $this->imagename;
        }
        return true;
    }

    private function uploadimages(Request $request, $dest)
    {

        if ($request->hasFile('images')) {

            $files = $request->file('images');
            foreach ($files as $file) {
                $this->imagename = time() . $file->getClientOriginalName();
                $file->move($dest, $this->imagename);
                $this->data['images'][] = $this->imagename;
            }
            return true;

        }
    }

    private
    function deleteimage($image, $dir)
    {
        $imagesfile = scandir($dir);
        foreach ($imagesfile as $img) {
            if ($image == "." || $image == "..")
                continue;

            if ($img == $image) {
                unlink($dir . $image);
            }
        }

    }
}

