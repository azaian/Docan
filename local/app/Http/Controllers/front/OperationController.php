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
use App\Shops_favorite;
use App\Shops_follower;
use App\Shops_translation;
use App\Order;
use App\Orderproduct;
use App\Ordershipping;
use App\Orderstatus;
use App\Product_favorite;
use App\Delivery;
use Illuminate\Support\Facades\Input;
class OperationController extends Controller {

    public function addfav($id) {

        if (auth()->check()) {
            $matchThese = ['user_id' => auth()->user()->id, 'product_id' => $id];
            $fav = Product_favorite::where($matchThese)->first();
            if (!$fav) {
                $fav = new Product_favorite;
                $fav->user_id = auth()->user()->id;
                $fav->product_id = $id;
                $fav->save();
                return null;
            } else {
                $fav->delete();
                return null;
            }
        } else {
            return redirect('login');
        }
    }

    public function getaddfav($id) {

        if (auth()->check()) {
            $matchThese = ['user_id' => auth()->user()->id, 'product_id' => $id];
            $fav = Product_favorite::where($matchThese)->first();
            if (!$fav) {
                $fav = new Product_favorite;
                $fav->user_id = auth()->user()->id;
                $fav->product_id = $id;
                $fav->save();
                return redirect()->back();
            } else {
                $fav->delete();
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function addfollow($id) {
        if (auth()->check()) {
            $matchThese = ['user_id' => auth()->user()->id, 'shop_id' => $id];
            $follow = shops_follower::where($matchThese)->first();
            if (!$follow) {
                $fol = new Shops_follower;
                $fol->user_id = auth()->user()->id;
                $fol->shop_id = $id;
                $fol->save();
                return null;
            } else {
                $follow->delete();
                return null;
            }
        } else {
            return redirect('login');
        }
    }

    public function getaddfollow($id) {
        if (auth()->check()) {
            $matchThese = ['user_id' => auth()->user()->id, 'shop_id' => $id];
            $follow = shops_follower::where($matchThese)->first();
            if (!$follow) {
                $fol = new Shops_follower;
                $fol->user_id = auth()->user()->id;
                $fol->shop_id = $id;
                $fol->save();
                return redirect()->back();
            } else {
                $follow->delete();
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function process() {
        $cart = Cart::content();
      
        if (count($cart)) {
//             $deliver=  Delivery::first();
//            if(empty(Cart::search(array('id' => $deliver->id)))){
//             Cart::add(array('id' => $deliver->id, 'options[0]'=>$deliver->name, 'name' => 'shipping', 'qty' => 1, 'price' => $deliver->charge));
//            }else{
//                
//            }
//            $car=Cart::search(array('name' => 'shipping'));
//            $ite = Cart::get($car[0]);
     
            return view('front.payment.process')->withcart($cart);
        } else {
            return redirect()->back();
        }
    }

    public function payment() {
        $cart = Cart::content();
        
        if (count($cart)) {
           
            return view('front.payment.payment')->withcart($cart);
        } else {
            return redirect()->back();
        }
    }

    public function adpayment(Request $request) {

        $cart = Cart::content();
        if (auth()->check()) {
            if (count($cart)) {
                DB::transaction(function() use($request) {
                            $cart = Cart::content();
                            $name = $request->input('firstname') . '' . $request->input('secondname');
                            $country = $request->input('country');
                            $govern = $request->input('govern');
                            $posta = $request->input('posta');
                            $state = $request->input('state');
                            $address = $request->input('address');
                            $mark = $request->input('mark');
                            $phone = $request->input('phone');

                            $user_id = auth()->user()->id;


                            $order = Order::create([
                            'total' => Cart::total(),
                            'user_id' => $user_id
                            ]);
                            foreach ($cart as $item) {
                                $porder = Orderproduct::create([
                                'product_id' => $item->id,
                                'quantity' => $item->qty,
                                'price' => $item->price,
                                'order_id' => $order->id
                                ]);
                            }
                            $sorder = Ordershipping::create([
                            'order_id' => $order->id,
                            'payment' => 'نقدى',
                            'city' => $state,
                            'governate' => $govern,
                            'address' => $address,
                            'post_num' => $posta,
                            'country' => $country,
                            'mark' => $mark
                            ]);
                            $storder = Orderstatus::create([
                            'order_id' => $order->id,
                            'status' => 'قيد التنفيذ'
                            ]);
                        });
                Cart::destroy();
                $cart = Cart::content();
                return view('front.payment.success')->withcart($cart);
            } else {

                return redirect('/');
            }
        }
    }

    public function subcat($id) {
        $maincat = Category::find($id);

        if (!$maincat->subcat->isEmpty()) {

            echo '
                            <label class="col-md-3">التصنيف الفرعى :</label>
                            <div class="col-md-3">';
            echo '<select class="form-control" id="subcats" name="subcats">';
            echo '<option value="" ></option>';
            foreach ($maincat->subcat as $sub) {


                echo '<option value=' . $sub->id . '>'
                . $sub->cat_trans('ar')->name .
                '</option>';
            }
            echo' </select>';

            echo '';
            echo'</div>';
        }
    }
    public function subcatedit($id,$name) {
        $maincat = Category::find($id);

        if (!$maincat->subcat->isEmpty()) {

            echo '
                            <label class="col-md-3">التصنيف الفرعى :</label>
                            <div class="col-md-3">';
            echo '<select class="form-control" id="subcats" name="subcats" disabled>';
            echo '<option value="" ></option>';
            foreach ($maincat->subcat as $sub) {
                if ($name==$sub->cat_trans('ar')->name)
                {
                    $selected="selected";
                }
                else
                {
                    $selected="";
                }
                echo '<option value=' . $sub->id ." ". $selected." ".'>'
                . $sub->cat_trans('ar')->name .
                '</option>';
            }
            echo' </select>';

            echo '';
            echo'</div>';
        }
    }
    
    public function subcat_souq($id) {
        $maincat = Category::find($id);


        if (!$maincat->subcat->isEmpty()) {

            echo '
                            <label class="col-sm-4">التصنيف الفرعى :</label>
                            <div class="col-sm-8">';
            echo '<select class="form-control" id="subcats" name="subcats">';
            echo '<option value="" ></option>';
            foreach ($maincat->subcat as $sub) {


                echo '<option value=' . $sub->id . '>'
                . $sub->cat_trans('ar')->name .
                '</option>';

   
            }
            echo' </select>';

            echo '';
            echo'</div>';
        }
    }
    


         public function getStoreLogo() {
        $file = Storage::disk('local')->get('store-logo.png');
        return Response($file, 200);
      }
//      public function shipping(){
//          $shipp=  Input::get('shipping');
//          $ship=  Delivery::find($shipp);
//          $rowId = Cart::search(array('name' => 'shipping'));
//          $item = Cart::get($rowId[0]);
//       dd($item);
//           Cart::update($rowId[0], $item->price = $ship->charge,$item->options[0]=$ship->name);
//        $cart = Cart::content();
//         session()->push('m', 'تم تحديث الشحن بنجاح');
//        return redirect()->back();
//      }
}
