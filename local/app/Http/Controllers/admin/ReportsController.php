<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Report;
use App\Http\Requests;
use App\Category;
use App\Order;
use App\Http\Controllers\Controller;


class ReportsController extends Controller
{
        public function getVallsales(){
        return view('admin.pages.reports.allsalesreport');
    }
    public function getSearch(Request $request){
        // $from="2016-02-16";
        // $to="2016-02-18";
        $from=$request->get('datepickerfrom');
        $to=$request->get('datepickerto');
        $value=$request->get('inputstatus');
        $orders=Order::whereBetween('created_at',array($from,$to))->where('status',$value)->get();
        $x=0;
        $totals=0;
        foreach($orders as $order){
            $x+=$order->total;
        }
        $totals=$orders->count();
   // echo $value;
    return view('admin.pages.reports.search_tableallsales',compact('totals','x'));

    }

    public function getVsales(){
        return view('admin.pages.reports.salesreport');
    }
    public function getSearchvsales(Request $request){
        $from=$request->get('datepickerfrom');
        $to=$request->get('datepickerto');
        $value=$request->get('inputstatus');
        $orders=Order::whereBetween('created_at',array($from,$to))->where('status',$value)->get();
        $x=0;
        $totals=0;
        foreach($orders as $order){
            $x+=$order->total;
        }
        $totals=$orders->count();
        return view('admin.pages.reports.search_tablesalesreport',compact('orders','totals','x'));
    }
    public function getVallproduct(){

        return view('admin.pages.reports.purchasedproduct');
    }
    public function getVproduct(){
        $categorys=Category::get();
       
        return view('admin.pages.reports.viewedproduct',compact('categorys'));

    }
    public function getVtakenproduct(){
        return view('admin.pages.reports.takenproduct');
    }
    //////////////////////////agentreport
    public function getVallagents(){
         
        return view('admin.pages.reports.allagentsreport');
    }
    public function getSearchagent(Request $request){
        $from=$request->get('datepickerfrom');
        $to=$request->get('datepickerto');
        $value=$request->get('agentname');
        if($value==""){
          $customers=User::get();
           return view('admin.pages.reports.allagenttable',compact('customers'));
}
else{
        $customers=User::whereBetween('created_at',array($from,$to))->where('name',$value)->get();
        return view('admin.pages.reports.allagenttable',compact('customers'));
   
   
  }
  }
    ////////////////////////////////////////////////////////
    public function getVagent(){
        return view('admin.pages.reports.agentreport');
    }
    public function getVagentsearch(Request $request){
        $from=$request->get('datepickerfrom');
        $to=$request->get('datepickerto');
        $value=$request->get('agentname');
        if($value==""){
          $orders=Order::get();
           return view('admin.pages.reports.specficagenttable',compact('orders'));
        }
        else{
        $customers=User::whereBetween('created_at',array($from,$to))->where('name',$value)->get();
        return view('admin.pages.reports.specficagenttable',compact('customers'));
   
   
        }

        }
    ///////////////////////////////////////////
    public function getVdiscount(){
        return view('admin.pages.reports.discount');
    }
}
