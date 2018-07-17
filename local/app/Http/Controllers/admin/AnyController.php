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
use App\Emailing;
use Session;

class AnyController extends Controller {
    

 function emails(){
      $emails=  Emailing::all();
      return view('admin.pages.settings.emailing')->withemails($emails);
    }
    function deleteemail($id){
        $email=  Emailing::find($id);
        $email->delete();
        session()->push('n', 'تم المسح بنجاح');
        return redirect()->back();
    }
}