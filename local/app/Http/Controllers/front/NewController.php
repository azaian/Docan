<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Products_attributes;
use App\Category_shop;
use App\Product;
use App\User;
use App\Souq;
use App\Product_image;
use App\Http\Requests;
use App\Category;
use App\Category_translation;
use App\Shop;
use Cart;
use App\Shops_translation;
use App\Products_translation;

class NewController extends Controller {

    public function newdocan() {

        return view('front/create/newdocan');
    }

    public function newad() {

        return view('front/create/newad');
    }

    public function storedocan(Request $request) {
//         $this->validate($request,['email'=>'unique:shops,email']);
        /*
          if (empty($request->file('image'))) {
          session()->push('m', 'يجب ادخال صوره');
          return redirect('new_docan');
          }
         */

// save shop with sub category

        DB::transaction(function()use($request) {
                    $catt = $request->get('subcats');
                    $file = $request->file('image');
                    $destinationPath = 'uploads';
                    $email = $request->input('email');

                    $filename = $file->getClientOriginalName();

                    $file->move($destinationPath, $filename);
                    $name = $request->input('name');
                    $lang = 'ar';


                    $cat = Category::find($catt);
                    $cat_name = $cat->cat_trans('ar')->name;
                    $phone = $request->input('phone');
                    $mobile = $request->input('mobile');
                    $address = $request->input('address');
                    $desc = $request->get('desc');
                    $user_id = $request->input('user_id');

                    $newshop = Shop::create([
                    'logo' => $filename,
                    'phone' => $phone,
                    'mobile' => $mobile,
                    'email' => $email,
                    'user_id' => $user_id
                    ]);

                    $newshoptrans = Shops_translation::create([
                    'name' => $name,
                    'description' => $desc,
                    'keyword' => $cat_name,
                    'address' => $address,
                    'shop_id' => $newshop->id,
                    'lang' => $lang
                    ]);

                    $newcatshop = Category_shop::create([
                    'category_id' => $catt,
                    'shop_id' => $newshop->id
                    ]);
                });
                

        session()->push('m', 'تم انشاء الدكان بنجاح   ');
        return redirect('profile');
    }

    public function storead(Request $request) {
        $asa = $request->file('image');

        if (empty($asa)) {
            session()->push('m', 'يجب ادخال صوره');
            return redirect('new_ad');
        }


        DB::transaction(function()use($request) {

        $file = $request->file('image');
        $destinationPath = 'uploads';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);

        $name   = $request->input('name');
        $desc   = $request->get('desc');
        $cat_id = $request->get('subcats');

        ///////////////////////////////////////////////////////////
        //$num = $request->input('num');
        //$price = $request->input('price');
        //$model = $request->input('model');
        ///////////////////////////////////////////////////////////


        $user_id = $request->input('user_id');
        $lang = 'ar';

        $newproduct = Product::create([
        'image' => $filename
        ]);

        $cat = Category::find($cat_id);

        if (!$cat->attribute->isEmpty()) {


        foreach ($cat->attribute as $attribute) {
        if ($attribute->type == 'text') {
        $nam = 'na' . $attribute->id . '';
        $valu = $request->input($nam);

        $produattr = Products_attributes::create([
        'lang' => $lang,
        'product_id' => $newproduct->id,
        'value' => $valu,
        'attribute_id' => $attribute->id
        ]);

        } elseif ($attribute->type == 'dropdown') {
        $nam = 'sub' . $attribute->id . '';
        $valu = $request->get($nam);
        $produattr = Products_attributes::create([
        'lang' => $lang,
        'product_id' => $newproduct->id,
        'value' => $valu,
        'attribute_id' => $attribute->id
        ]);


        }
        }}

        $files = $request->file('images');
        foreach ($files as $file1) {
            
        $destinationPath = 'uploads';
        $filename1 = $file1->getClientOriginalName();
        $upload_success = $file1->move($destinationPath, $filename1);

        $image = Product_image::create([
           'image' => $filename1,
           'product_id' => $newproduct->id
        ]);
//        $uploadcount ++;
        }


        $newtrans = Products_translation::create([
        'name' => $name,
        'details' => $desc,
        'lang' => $lang,
        'product_id' => $newproduct->id
        ]);

        $souq = Souq::create([
        'cat_id'     => $cat_id,
        'user_id'    => $user_id,
        'product_id' => $newproduct->id
        ]);

        });
        session()->push('m', 'تم اضافه  الاعلان بنجاح ');
        return redirect('new_ad');
    }

}