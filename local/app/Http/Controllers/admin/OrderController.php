<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
//use App\ProductReturn;
use App\User;
use Session;
use App\Ordershipping;
use App\Orderstatus;
use App\Orderproduct;


class OrderController extends Controller
{
   public function getIndex(){
      $all  = Order::all();
      return view('admin.pages.orders.allorders',compact('all'));
    }

    // get order detail by order number 
    
    public function getViewDetails($id){
     
      Session::put('order_id', $id);
      $record = Order::whereid($id)->first();

      $ship = Ordershipping::where('order_id',$id)->first();
      $product = Orderproduct::where('order_id',$id)->get();
      $status = Orderstatus::where('order_id',$id)->get();
      
       return view('admin.pages.orders.alldetails',compact('record' , 'ship' , 'status' , 'product' , 'proname'));
    }  
    
    public function getEdit($id){
      Session::put('order_id', $id);
      $record = Order::whereid($id)->first();
      $ship = Ordershipping::where('order_id',$id)->first();
      $product = Orderproduct::where('order_id',$id)->get();
      $status = Orderstatus::where('order_id',$id)->get();
         return view('admin.pages.orders.editorder',compact('record' , 'ship' , 'status' , 'product' , 'proname'));
    }  

    public function postEdit(Request $request, $id){
      $shipping = Ordershipping::find($id);
      $shipping->payment->$request->input('payment');
      $shipping->city->$request->input('city');
      $shipping->governate->$request->input('governate');
      $shipping->village->$request->input('village');
      $shipping->addresse->$request->input('addresse'); 
      $shipping->save();
 
    } 

    public function postStatus($id,Request $request){
     
        $add = new Orderstatus;
       
        $add->status = $request->input('status');
        $add->notes = $request->input('notes');
        $add->order_id= $id;
        $add->save();
        session()->flash('success','تم اضافه حالة جديدة ');
        return redirect("orders/view-details/" . $id);
      }
    public function getSearch(Request $request){
        
        $cname=$request->cname;
        $order_no=$request->order_no;
        $date=$request->date;
        $state=$request->state;
        
        $cname=User::where('name',$cname)->get()->pluck('id')->first();
       
        
        $all=Order::get();
        
        if(isset($cname) && !empty($cname))
            $all=Order::where('user_id',$cname)->get();
        
        if(!empty($order_no))
            $all=Order::where('id',$order_no)->get();
       
        if(!empty($state))
            $all=Order::where('status',$state)->get();
               
      return view('admin.pages.orders.allorders',compact('all'));
      
    }  
    public function postDelete($id){
      $delet = Order::findOrFail($id);
             if($delet->returns()->count() == 0){
          $delet->delete();
      }
    else{
        echo "error";
        }
     
    }
   /* public function postDeletereturn($id){
      $delete = ProductReturn::findOrFail($id);
      $delete->delete();
    }
     public function getReturnsearch(Request $request){
        $cname=$request->cname;  
        $order_no=$request->order_no;
        $date=$request->date;
        //$status
        $cname=Customer::where('name',$cname)->value('id');
        $all=ProductReturn::get();
        if($cname != "")
            $all=ProductReturn::where('customer_id',$cname)->get();
        if($order_no != "")
            $all=ProductReturn::where('order_id',$order_no)->get();
        if($date != "")
            $all=ProductReturn::where('created_at',$date)->get();
        //if($date != "")
           // $all=ProductReturn::where('status',$date)->get();
       return view('orders.returnsearch',compact('all')); 
    } 

    public function getReturn(){
      $all  = ProductReturn::all();
     return view('admin.orders.returns',compact('all'));
    }   
    

}*/

}
