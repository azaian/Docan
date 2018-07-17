<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use DB;
use App\User;
use Illuminate\Http\Request;
use App\Category;
use App\Shop;
use App\Attribute;
use App\Category_translation;
use App\Http\Requests;
use App\Souq;
use Auth;
use Cart;
use App\Product;

class UserController extends Controller {

    public function test($id) {


        $cat = Category::find($id);
        foreach ($cat->attribute as $attribute) {


            if ($attribute->type == 'text') {
                $name = 'na' . $attribute->id;
                echo'<div class="form-group">';

                echo '<label class="col-md-3" >' . $attribute->attribute_translation("ar")->name . ':</label>';
                echo '<div class="col-md-9">';
                echo '  <input class="form-control" type="text" name=' . $name . '
         placeholder=' . $attribute->attribute_translation("ar")->name . ' required >';
                echo'</div>';
                echo '<div class="clearfix"></div>';
                echo'</div>';
            } elseif ($attribute->type == 'dropdown') {
                $name = 'sub' . $attribute->id;
                echo'<div class="form-group">';

                echo '<label class="col-md-3">' . $attribute->attribute_translation("ar")->name . ':</label>';
                echo '<div class="col-md-9">';

                echo '<select class="form-control" name=' . $name . '>
              ';
                foreach ($attribute->dropdown() as $attr) {
                    echo '<option value=' . $attr->value . '">'
                    . $attr->value .
                    '</option>';
                }
                echo' </select> </div>';

                echo '<div class="clearfix"></div>';
                echo'</div>';
            }
        }
    }
    
      public function test_souq($id) {


        $cat = Category::find($id);

        foreach ($cat->attribute as $attribute) {

            if ($attribute->type == 'text') {
                
            } elseif ($attribute->type == 'dropdown') {
                $name =  $attribute->id;
                echo'<div class="col-sm-4 col-xs-12 souq_search">
                    <div class="form-group">';

                echo '<label class="col-md-3">' . $attribute->attribute_translation("ar")->name . ':</label>';
                echo '<div class="col-md-9">';

                echo '<select class="form-control" name=' . $name . '>
              ';
                foreach ($attribute->dropdown() as $attr) {
                    echo '<option value=' . $attr->value . '">'
                    . $attr->value .
                    '</option>';
                }
                echo' </select> </div>';

                echo '<div class="clearfix"></div>';
                echo'</div></div>';
            }
        }
    }
    

    public function getLogin() {
        if (auth()->check()) {
            return redirect('profile');
        } else {
            $cart = Cart::content();
            return view('front/auth/login')->withcart($cart);
        }
    }

    public function postLogin(Request $r) {

        if(Auth::attempt(['email' => $r->input('email'), 'password' => $r->input('password')])) {
            return redirect()->intended('/');
        } else {
            session()->push('m', 'اسم مستخدم او رقم سري غير صحيح ');
            return redirect('login');
        }
    }

    public function getRegister() {
        if (auth()->check()) {
            return redirect('profile');
        } else {
            $cart = Cart::content();
            return view('front/auth/register')->withcart($cart);
        }
    }

    public function postRegister(Request $request) {


        $this->validate($request, ['email' => 'unique:users,email']);

        $s = $request->file('image');
        if (!empty($s)) {
            $file = $request->file('image');
            /*separated folder for profile images */
            $destinationPath = 'uploads/profiles/';
            $filename = $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
        } else {
            $filename = null;
        }

        $email = $request->input('email');
        $user = new User;
        $password = $request->input('password');
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->country = $request->input('country');
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->image = $filename;
        $user->save();

        /////////////
        if(Auth::attempt(['email' => $request->input('email'),
        'password' => $request->input('password')])) {
            return redirect('profile');
        } else {
            return redirect('login');
        }
    }

    public function profile() {

        $shop = new Shop;
        $souq = new Souq;
        $product = new Product;
        $cart = Cart::content();
        return view('front/auth/profile')->withshop($shop)->withsouq($souq)->withproduc($product)->withcart($cart);
    }

    public function Logout() {
        auth()->logout();
        return redirect('/');
    }

}
