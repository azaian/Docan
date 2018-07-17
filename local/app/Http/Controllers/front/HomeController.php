<?php

namespace App\Http\Controllers\front;

use App\Category_shop;
use App\Http\Controllers\Controller;
use Cart;
use App\Shop;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Category;
use App\Souq;
use App\Category_translation;
use Illuminate\Support\Facades\Input;
use App\Contact;
use App\Product;
use App\User;
use App\Partner;
use App\Emailing;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    /*
      public function index()
      {

      $cat1=  Category::find('1');
      $cat2=Category::find('2');
      $cat3=Category::find('3');
      $cat4=Category::find('12');
      $shop=new Shop;
      $cart = Cart::content();

      return view('front.index')->withcat1($cat1)->withcat2($cat2)->withcat3($cat3)->withcat4($cat4)->withshop($shop)->withcart($cart);
      }
     */

    public function getIndex()
    {

        $shops = Shop::paginate(15);            // get shops  in pages each has 15 shop
        // if check if there is shops or not
        if (!empty($shops)) {

            return view('front/docans/docans')->withshops($shops);
        } else {
            return view('front/docans/emptydocan');
        }
    }

    public function postSearch(Request $request)
    {

        $data = $request->input();                          // get data from request
        $cat_id = $request->input(['cat']);                 // get parent category id
        $sub_cat_id = $request->input(['subcats']);         // get category id
        //check if parent category is selected   or not
        if (!$cat_id == "") {
            // check if category is selected or not
            if (!$sub_cat_id == "") {
                // if category selected get shops ids that belong to it in object form
                $shop_ids = Category_shop::Where('category_id', $sub_cat_id)->get(['shop_id']);
                // if not empty change it to array and flatten array
                if (!empty($shop_ids)) {
                    $shop_ids = array_flatten($shop_ids->toarray());
                }
            } else { // if category not selected
                $sub_cat_id = Category::where('perant_id', $cat_id)->get(['id']);  // get all categories id that under perant category
                // if not empty change it to array and flatten array
                if (!empty($sub_cat_id)) {
                    $sub_cat_id = array_flatten($sub_cat_id->toarray());
                    // get shops id that under all that categories
                    $shop_ids = array_flatten(Category_shop::WhereIn('category_id', $sub_cat_id)->get(['shop_id'])->toarray());
                }
            }
        }// if parent category not selected return to index that will give all categories
        else {
            return redirect('alldocans');
        }

        $cart = Cart::content();
        // get shops that we got it's ids in pages each has 15 shop
        $shops = Shop::whereIn('id', $shop_ids)->paginate(15);

        return view('front/docans/docans')->withshops($shops)->withcart($cart);      // return docans view
    }

    // function make main links work in the index page
    public function getSearch($cat_id)
    {


        $sub_cat_id = Category::where('perant_id', $cat_id)->get(['id']);
        if (!empty($sub_cat_id)) {

            $sub_cat_id = array_flatten($sub_cat_id->toarray());
            // get shops id that under all that categories
            $shop_ids = array_flatten(Category_shop::WhereIn('category_id', $sub_cat_id)->get(['shop_id'])->toarray());
        }
        if (empty($shop_ids)) {
            $shop_ids = array();
            session::push('m', 'لا توجد نتائج ');
        }


        $cart = Cart::content();
        // get shops that we got it's ids in pages each has 15 shop
        $shops = Shop::whereIn('id', $shop_ids)->paginate(15);

        return view('front/docans/docans')->withshops($shops)->withcart($cart);      // return docans view
    }

    function contact()
    {
        return view('front/contact');
    }


    function showpart($id)
    {
        $part = Partner::find($id);

        return view('front/contact3')->withpart($part);
    }

    function share($email)
    {

        $am = Emailing::where('email', $email)->get();

        if (!$am->isEmpty()) {
            echo 'already excist';
        } else {
            $ema = new Emailing;
            $ema->email = $email;
            $ema->save();
            echo 'تم اضافه الايميل بنجاح ';
        }
    }

    function contactus()
    {
        $name = Input::get('name');
        $email = Input::get('email');
        $type = Input::get('type');
        $message = Input::get('desc');
        $mess = new Contact;
        $mess->name = $name;
        $mess->email = $email;
        $mess->message = $message;
        $mess->department = $type;

        $mess->save();
        session()->push('m', 'تم الادخال بنجاح   ');
        return redirect()->back();
    }


    ////////////////////////////////////////////////////////////////////////////
    //////// method to display data in home page ///////////////////////////////

    public function index()
    {
        $lang = 'ar';
        $cart = Cart::content();
        $shop = new Shop;
        $allcat = Category::get()->where('perant_id', 0);
        $latshop = Shop::orderBy('id', 'desc')->take(10)->get();
        $latad = Souq::orderBy('id', 'desc')->take(10)->get();
        $produ = new Product;

        // code to get the main categories form the data base
        $main_cats_id = array_flatten(Category::Where('perant_id', 0)->get(['id'])->toarray());
        $cats_icon = Category_translation::whereIn('category_id', $main_cats_id)->where('lang', $lang)->get(['icon_class', 'name', 'category_id']);
        return view('front.index')->withallcat($allcat)->withcart($cart)->withshop($shop)->withlatshop($latshop)->withlatad($latad)->withproduc($produ)->withcatsicon($cats_icon);
    }


    //functions for rest password

    public function restpassword()
    {
        return view('front.auth.reset_password');
    }


    public function newpassword($id, $password)
    {
        $user = User::find($id);
        $oldpassword=str_replace(['/'],'x',$user->password);
        if ($oldpassword == $password) {
            return view('front.auth.resetpassword')->withid($id);
        } else {
            return redirect('/');
        }
    }

    public function pnewpassword(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);
        $new_password = $request->input('password');
        $user->password = bcrypt($new_password);
        $user->update();
        $msg = 'password for user ' . $user->email . ' changed successfully';
        session()->push('msg', $msg);
        return redirect('/login');
    }

    public function prestpassword(Request $request)
    {
        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if (!empty($user)) {
            $password = str_replace( ['/'], 'x',$user->password);
            $this->sendverifymail($user);
            $msg = "please check your email : " . $user->email;
        } else {
            $msg = $email . ' in not register';
            session()->push('msg', $msg);
            return view('front.auth.reset_password');
        }
        session()->push('msg', $msg);
        return view('front.auth.message');
    }


    private function sendverifymail($user)
    {
        $password = str_replace( ['/'], 'x',$user->password);
        $to = $user->email; // Send email to our user
        $subject = 'docan change password'; // Give the email a subject
        $message = '
Dear ' . $user->name . '
 
To set a new password for your account Please click this link:

' . url('newpassword/' . $user->id . '/' . $password) . '
 
'; // Our message above including the link

        $headers = 'From:noreply@docan.com' . "\r\n"; // Set from headers
        mail($to, $subject, $message, $headers); // Send our email
    }

}
