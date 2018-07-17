<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ad;
use App\Contact;
class ContactController extends Controller
{
   
    public function getDemand(){
    $messages =Contact::orderBy('id', 'DESC')->where('department','0')->get();
    return view('admin.pages.messages.demands')->withmessages($messages);
    }
    public function getAdvice(){
        $messages=Contact::orderBy('id', 'DESC')->where('department','1')->get();
        return view('admin.pages.messages.advices')->withmessages($messages);
    }
    public function getDelete($id){
    $message = Contact::find($id);
    $message->delete();
     session()->push('n', 'تم المسح بنجاح');
          
    return redirect()->back();
    }
}
