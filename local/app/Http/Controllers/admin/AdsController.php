<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ad;
class AdsController extends Controller
{
    public function getIndex(){
        $ads=Ad::all();
        return view('admin/pages/ads/ads')->withads($ads);

    }
       public function create()
    {

    }

    public function postStore(Request $request)
    {
       $ad=new Ad;
       $ad->link=$request->input('link');
      //  if(empty($request->file('image'))){
    //session()->push('n','يجب ادخال صوره');
   // return redirect('ads');

 //}else{
      $file = $request->file('image');
        $destinationPath='uploads';
        $filename=$file->getClientOriginalName();
        $file->move($destinationPath,$filename);
        $ad->image=$filename;
        $ad->save();
        session()->push('m','تم ادخال الاعلان');
          return redirect('ads');
 //}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function getEdit($id){
        $old =Ad::find($id);
        return view('admin/pages/ads/update')->withold($old);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request, $id)
    {
        $ad=Ad::find($id);
        $ad->link=$request->input('link');
        if(empty($request->file('image'))){
          session()->push('n','يجب ادخال صوره');
          return redirect()->back();
        }
        else{
          $file = $request->file('image');
          $destinationPath='uploads';
          $filename=$file->getClientOriginalName();
          $file->move($destinationPath,$filename);
          $ad->image=$filename;
          $ad->save();
          session()->push('m','تم ادخال الاعلان');
          return redirect('ads');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDelete($id)
    {
     $del=Ad::find($id)->delete();
     return redirect()->back();
    }
}
