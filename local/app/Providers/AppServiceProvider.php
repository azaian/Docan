<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Ad;
use App\Category;
use Cart;
use App\Setting;
use App\Partner;
use DB;
use App\Delivery;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $delivery=  Delivery::all();
        $ads = Ad::paginate(3);
           $ar_name = DB::table('general_settings')->where('name', 'ar_name')->value('value');
                      $logo = DB::table('general_settings')->where('name', 'logo')->value('value');

      $en_name = DB::table('general_settings')->where('name', 'en_name')->value('value');
      $ar_address = DB::table('general_settings')->where('name', 'ar_address')->value('value');
      $en_address = DB::table('general_settings')->where('name', 'en_address')->value('value');
      $phone = DB::table('general_settings')->where('name', 'phone')->value('value');
      $email = DB::table('general_settings')->where('name', 'email')->value('value');
      $charge = DB::table('general_settings')->where('name', 'charge')->value('value');
      $meta_keyword = DB::table('general_settings')->where('name', 'meta_keyword')->value('value');
      $meta_title = DB::table('general_settings')->where('name', 'meta_title')->value('value');
      $meta_description = DB::table('general_settings')->where('name', 'meta_description')->value('value');
      $facebook = DB::table('general_settings')->where('name', 'facebook')->value('value');
      $twitter = DB::table('general_settings')->where('name', 'twitter')->value('value');
      $googleplus = DB::table('general_settings')->where('name', 'googleplus')->value('value');
      $youtube = DB::table('general_settings')->where('name', 'youtube')->value('value');
      $instagram = DB::table('general_settings')->where('name', 'instagram')->value('value');
      $snapchat = DB::table('general_settings')->where('name', 'snapchat')->value('value');
      $whatsapp = DB::table('general_settings')->where('name', 'whatsapp')->value('value');
      $linkedin = DB::table('general_settings')->where('name', 'linkedin')->value('value');

      $data = [
          'ar_name' => $ar_name,
          'logo'=>$logo,
          'en_name' => $en_name,
          'ar_address' => $ar_address,
          'en_address' => $en_address,
          'phone' => $phone,
          'email' => $email,
          'charge' => $charge,
          'meta_keyword' => $meta_keyword,
          'meta_title' => $meta_title,
          'meta_description' => $meta_description,
          'facebook' => $facebook,
          'twitter' => $twitter,
          'googleplus' => $googleplus,
          'youtube' => $youtube,
          'snapchat' => $snapchat,
          'whatsapp' => $whatsapp,
          'linkedin' => $linkedin,
          'instagram' => $instagram
      ];
        $maincategories=Category::maincategories();
        $partners=  Partner::all();
         $cart = Cart::content();
         
         view()->share(['ads'=>$ads ]);
          view()->share(['data'=>$data ]);
          view()->share(['main'=>$maincategories]);
          view()->share(['partners'=>$partners]);
          view()->share(['cart'=>$cart]);
                    view()->share(['delivery'=>$delivery]);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
