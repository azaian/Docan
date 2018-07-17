<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Emailing;
use App\User;
use App\Shop;
use App\Order;
use App\Orderstatus;
use App\Contact;
use App\souq;
use App\Partner;
use App\Delivery;
class DashboardController extends Controller
{
   
    
    public function index(){
        $users=User::all()->count();
        $shops=Shop::all()->count();
        $vips=Shop::where('vip',1)->count();
        $orders=  Order::all()->count();
        $deliver=  Orderstatus::where('status','تم التسليم')->count();
        $back=Orderstatus::where('status','مرتجع')->count();
        $cancel=Orderstatus::where('status','ملغى')->count();
        $onprocess=$orders - ($back + $cancel + $deliver);
        $dem=  Contact::where('department',0)->count();
                $adv=  Contact::where('department',1)->count();
                $souq=souq::all();
                $num=0;
                foreach($souq as $pro){
               $num= $num + $pro->prod->num;
                
                }
            $shopp=  Shop::all();
            $number=0;
            foreach($shopp as $sho){
                foreach($sho->product as $produ ){
                    $number=$number+$produ->num;
                }
            }
            $emails=  Emailing::all()->count();
            $summ=  Order::sum('total');
            $partner=  Partner::all()->count();
            $delivery=  Delivery::all()->count();
        return view('admin.index', compact('users' ,'shops','vips','orders','deliver','back','cancel','onprocess','dem','adv','num','number','emails','summ','delivery','partner'));
    }
   
}
