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

class PartnerController extends Controller {

    
    
    ///////////////////////////////////////////////////////////////////////////////
    /////////////////////// partner ////////////////////////////////////////////////

    public function getPartners() {
        $partners = Partner::all();
        return view('admin.pages.settings.partner.partners', compact('partners'));
    }

    public function getPartner() {
        return view('admin.pages.settings.partner.addpartner');
    }

     public function getEditpartner($id) {
        $old_partner = Partner::find($id);
        return view('admin.pages.settings.partner.editpartner', compact('old_partner'));
    }

    public function getDeletepartner($id) {
        Partner::find($id)->delete();
        return redirect('partner/partners');
    }
    public function postEditpartner(Request $request, $id) {
        $partner = Partner::find($id);
        $partner->name = $request['name'];
        $partner->phone = $request['phone'];
        $partner->email = $request['email'];
        $partner->website = $request['website'];
        $partner->facebook = $request['facebook'];
        $partner->details = $request['details'];
        $file = $request->file('logo');
        if($file) {
          $destinationPath='uploads/partners';
          $file_name= $request['name'] . '-logo.png';
          $file->move($destinationPath,$file_name);
          $partner->logo = $file_name;
        }

        $partner->update();
        return redirect('partner/partners/');
    }
    
     public function postCreatepartner (Request $request) {
        $partner = new Partner();

        $file = $request->file('logo');
        if($file) {
          $destinationPath='uploads/partners';
          $file_name= $request['name'] . '-logo.png';
          $file->move($destinationPath,$file_name);
          $partner->logo = $file_name;
        }

        $partner->name = $request['name'];
        $partner->phone = $request['phone'];
        $partner->email = $request['email'];
        $partner->website = $request['website'];
        $partner->facebook = $request['facebook'];
        $partner->details = $request['details'];
        $partner->save();
        return redirect('partner/partners');
    }


}
