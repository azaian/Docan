<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CustomerController extends Controller {

    public function getIndex() {
        $sections = User::all();
        return view('admin.pages.customers.allcustomer', compact('sections'));
    }

    public function getViewCustomer($id) {
        $sections = Customer::find($id);
        return view('admin.pages.customers.viewcustomer', compact('sections'));
    }

    public function getCustomer() {
        return view('admin.pages.customers.addcustomer');
    }

    public function postCreate(Request $request) {

        $add = new User;
        $add->name = $request->input('ar_name');
        $add->dokan = $request->input('name');
        $add->phone = $request->input('phone');
        $add->email = $request->input('email');
        $add->address = $request->input('address1');
        $add->country = $request->input('country');
        $add->password = $request->input('password1');
        $file = $request->file('image');
        $destination = 'upload';
        $filename = $file->getClientOriginalName();
        $file->move($destination . $filename);
        $add->image = $filename;

        $add->save();
        return redirect('customers/index');
    }

    public function getEdit($id) {
        $sections = User::all();
        $old = User::find($id);
        return view('admin.pages.customers.update', compact('sections', 'old'));
    }

    public function getDelete($id) {
        $del = User::find($id)->delete();
        //$del->delete();
        return redirect()->back();
    }

    public function postUpdate(Request $request, $id) {
        //$id=$request->input('id');
        $add = User::find($id);
        $add->name = $request->input('ar_name');
        $add->dokan = $request->input('name');
        $add->phone = $request->input('phone');
        $add->country = $request->input('country');
        $add->email = $request->input('email');
        $add->address = $request->input('adress');
        $add->password = $request->input('password');
        if ($request->file('image')) {

            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $destination = 'upload';
            $file->move($destination . $filename);
            $add->image = $filename;
        }
        $add->save();
        return redirect('customers/index');
    }

    public function getSearch(Request $request) {
        $name       =  $request->name;
        $country    =  $request->country;
        $email      =  $request->email;
        $created_at =  $request->add_date;

        $sections = User::get();
        if ($name != "")
            $sections = User::where('name', 'like', '%' . $name . '%')->get();

        if ($email != "")
            $sections = User::where('email', $email)->get();

        return view('admin.pages.customers.allcustomer', compact('sections'));
    }

}
