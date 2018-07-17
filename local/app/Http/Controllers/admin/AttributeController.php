<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Attribute;
use App\Partner;
use App\Delivery;
use App\Attribute_translation;
use App\Dropdown;
use DB;
use Session;

class AttributeController extends Controller {

    

    
    //////////////////////////////////////////////////////////////////////////
    ////////////////////////// Attribute /////////////////////////////////////
   public function getIndex() {
        $attributes = Attribute::get();
        $all = Attribute::all();

        return view('admin.pages.settings.attributes.attributes', compact('all' , 'attributes'));
    }
    
    public function postCreate(Request $request) {
        DB::transaction(function() use($request) {

                    $attrib = new Attribute();
                    $attrib->type = $request->input('type');
                    $attrib->save();

                    $add = new Attribute_translation();
                    $add->name = $request->input("name_ar");
                    $add->lang = "ar";
                    $add->attribute_id = $attrib->id;
                    $add->save();

                    if (!empty($request->input("name_en"))) {
                        $add1 = new Attribute_translation();
                        $add1->name = $request->input("name_en");
                        $add1->lang = "en";
                        $add1->attribute_id = $attrib->id;
                        $add1->save();
                    }
                });
        Session::put('ok', 'تمت الاضافة بنجاح ..');
        //$attributes = Attribute::get();
        return redirect('attributes/index');
    }

    public function getEdit($id) {
        $all = Attribute::find($id);
        return view('admin.pages.settings.attributes._modal', compact('all'));
    }

    public function postEdit(Request $request, $id) {

        DB::transaction(function() use($request) {
                    $all = new Attribute();
                    $all->type = $request->input('type');
                    $all->save();

                    $add = Attribute_translation::find($id);
                    $add->name = $request->input("name_ar");
                    $add->lang = "ar";
                    $add->attribute_id = $attr->id;
                    $add->save();

                    $add1 = Attribute_translation::find($id);
                    $add1->name = $request->input("name_en");
                    $add1->lang = "en";
                    $add1->attribute_id = $attr->id;
                    $add1->save();
        });
    }


    public function getValues() {
        $attributes = Attribute::get();
        $all = Dropdown::all();
        return view('admin.pages.settings.attributes.values', compact('all', 'attributes'));
    }

    public function postAddValue(Request $request) {

        DB::transaction(function() use($request) {
                    $attr = Attribute::create([
                    // 'type'=>$request->input('type')
                    ]);
                    $cat = $request->input('attr_name');
                    $add = new Dropdown();
                    $add->value = $request->input("value_ar");
                    $add->lang = "ar";
                    //$add->attribute_id =$attr->id;
                    $add->attribute_id = $cat;
                    $add->save();

                    $add1 = new Dropdown();
                    $add1->value = $request->input("value_en");
                    $add1->lang = "en";
                    //$add1->attribute_id =$attr->id;
                    $add1->attribute_id = $cat;
                    $add1->save();
                });
        Session::put('ok', 'تمت الاضافة بنجاح ..');
        return redirect('attributes/values');
    }

    public function postDelete($id) {
        $delet = Attribute::find($id);
        $delet->delete();
        return redirect()->back();
    }

}
