<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Setting;
use Validator;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function getGeneralSettings() {
      $ar_name = DB::table('general_settings')->where('name', 'ar_name')->value('value');
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
      return view('admin.pages.settings.generalsettings')->withdata($data);
    }

    public function editGeneralSettings(Request $request)
    {
        /*$rules = [
                  'ar_name'=>'required',
                  'ar_address' => 'required',
                  'phone' => 'required',
                  'email' => 'required|email',
                  'charge' => 'required',
                  'logo' => 'required|mimes: png'
                 ];
        $val = Validator::make($request->all() , $rules);
        if ($val->fails()) {
             return redirect()->back()->withInput()->withErrors($val);
        }*/
        /*$file = $request->file('logo');
        $file_name = 'store-logo.png';
        if($file) {
            Storage::disk('../uploads')->put('store/' . $file_name, File::get($file), 'public');
        }*/

        $file = $request->file('logo');
        if($file) {
          $destinationPath='uploads/store';
          $file_name= 'store-logo.png';
          $file->move($destinationPath,$file_name);
          DB::table('general_settings')->where('name', 'logo')->update(['value' => $file_name]);
        }
        DB::table('general_settings')->where('name', 'ar_name')->update(['value' => $request['ar_name']]);
        DB::table('general_settings')->where('name', 'en_name')->update(['value' => $request['en_name']]);
        DB::table('general_settings')->where('name', 'ar_address')->update(['value' => $request['ar_address']]);
        DB::table('general_settings')->where('name', 'en_address')->update(['value' => $request['en_address']]);
        DB::table('general_settings')->where('name', 'phone')->update(['value' => $request['phone']]);
        DB::table('general_settings')->where('name', 'email')->update(['value' => $request['email']]);
        DB::table('general_settings')->where('name', 'charge')->update(['value' => $request['charge']]);
        DB::table('general_settings')->where('name', 'meta_keyword')->update(['value' => $request['meta_keyword']]);
        DB::table('general_settings')->where('name', 'meta_title')->update(['value' => $request['meta_title']]);
        DB::table('general_settings')->where('name', 'meta_description')->update(['value' => $request['meta_description']]);
        DB::table('general_settings')->where('name', 'facebook')->update(['value' => $request['facebook']]);
        DB::table('general_settings')->where('name', 'twitter')->update(['value' => $request['twitter']]);
        DB::table('general_settings')->where('name', 'googleplus')->update(['value' => $request['googleplus']]);
        DB::table('general_settings')->where('name', 'youtube')->update(['value' => $request['youtube']]);
        DB::table('general_settings')->where('name', 'instagram')->update(['value' => $request['instagram']]);
        DB::table('general_settings')->where('name', 'snapchat')->update(['value' => $request['snapchat']]);
        DB::table('general_settings')->where('name', 'whatsapp')->update(['value' => $request['whatsapp']]);
        DB::table('general_settings')->where('name', 'linkedin')->update(['value' => $request['linkedin']]);
        return redirect()->back();
    }

    public function postAddstore(Request $request){
    	 $rules = [
                   'ar_name'=>'required',
                   //'en_name'=>'required',
                   'ar_address'=>'required',

                ];
        $val = Validator::make($request->all() , $rules);

        if($val->fails()){

            return redirect()->back()->withInput()->withErrors($val);
            //session()->flash('danger','من فضلك ادخل اسم المتجر ');
        }
        else{
      $add = new Setting;
    	$add->ar_name=$request->input('ar_name');
    	$add->en_name=$request->input('en_name');
    	$add->phone=$request->input('phone');
    	$add->email=$request->input('email');
    	$add->address=$request->input('ar_address');
    	$add->fb=$request->input('fb');
        $add->charge=$request->input('charge');
    	$add->tw=$request->input('tw');
    	$add->gplus=$request->input('gplus');
    	$add->meta_title =$request->input('meta_title');
    	$add->meta_keyword=$request->input('meta_keyword');
    	$add->meta_desc=$request->input('meta_desc');
    	$add->$currency=$request->get('currency');
    	$add->save();
        }
    	session()->flash('success','تم اضافه متجر جديد بنجاح ');
    	return view('admin.pages.settings.generalsettings');
    }

}
