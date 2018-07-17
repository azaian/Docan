<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Attribute;
use App\Partner;
use App\Delivery;
use App\Attribute_translation;
use App\Attribute_value;
use DB;
use Session;

class DeliveryController extends Controller {

    
  
    ///////////////////////////////////////////////////////////////////////////////
    /////////////////////// Delivery  ////////////////////////////////////////////////

    public function getDeletedelivery($id) {
        Delivery::find($id)->delete();
        return redirect('delivery/delivery');
    }

   
    public function getAdddelivery() {
        return view('admin.pages.settings.delivery.adddelivery');
    }

    public function getDelivery() {
        $deliveries = Delivery::all();
        return view('admin.pages.settings.delivery.delivery', compact('deliveries'));
    }
    
    public function getEditdelivery($id) {
        $old_delivery = Delivery::find($id);
        return view('admin.pages.settings.delivery.editdelivery', compact('old_delivery'));
    }

    public function postEditdelivery(Request $request, $id) {
        $delivery = Delivery::find($id);
        $delivery->name = $request['name'];
        $delivery->charge = $request['charge'];
        $file = $request->file('logo');
        if($file) {
          $destinationPath='uploads/delivery';
          $file_name= $request['name'] . '-logo.png';
          $file->move($destinationPath,$file_name);
          $delivery->logo = $file_name;
        }
        $delivery->update();
        return redirect('delivery/delivery');
    }

    

    public function postCreatedelivery (Request $request) {
        $delivery = new Delivery();
        $file = $request->file('logo');
        if($file) {
          $destinationPath='uploads/delivery';
          $file_name= $request['name'] . '-logo.png';
          $file->move($destinationPath,$file_name);
          $delivery->logo = $file_name;
        }
        $delivery->name = $request['name'];
        $delivery->charge = $request['charge'];
        $delivery->save();
        return redirect('delivery/delivery');
    }
    
   
}
