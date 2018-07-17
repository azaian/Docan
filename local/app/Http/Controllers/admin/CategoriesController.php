<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Category_translation;
use App\Attribute_translation;
use App\Attribute;
use App\Categories_attributes;
use DB;
use Session;
use Illuminate\Support\Facades\Input;
class CategoriesController extends Controller {

    public function getAllCategories() {
        $categories = Category::get();
        return view('admin.pages.categories.allcategories', compact('categories'));
    }

    public function getAdd() {
        $category_id = "";
        $categories = Category::get();
        $attr = Attribute_translation::get();
        return view('admin.pages.categories.addcategory', compact('categories', 'attr'));
    }

    public function postCreate(Request $request) {

        DB::transaction(function() use($request) {

                    $category = Category::create([
                    'perant_id' => $request->input('parent'),
                    'type' => $request->input('type')
                    ]);

                    //// insert arabic value of department
                    $add = new Category_translation();
                    $add->name = $request->input("name_ar");
                    $add->metatitle = $request->input('metatitle_ar');
                    $add->meta_keywords = $request->input('metakeywords_ar');
                    $add->meta_desc = $request->input('metadesc_ar');
                    $add->lang = "ar";
                    $add->icon_class = $request->input('icon');                  
                    $add->category_id = $category->id;
                    $add->save();

                    //// insert english value of department
                    $add1 = new Category_translation();
                    $add1->name = $request->input("name_en");
                    $add1->metatitle = $request->input('metatitle_en');
                    $add1->meta_keywords = $request->input('metakeywords_en');
                    $add1->meta_desc = $request->input('metadesc_en');
                    $add1->lang = "en";
                    $add1->icon_class = $request->input('icon');
                    $add1->category_id = $category->id;
                    $add1->save();

                    $cat = $add->category_id;
                    $all_item = array();
                  
				  if(!empty($request->input('attributes'))){
                    foreach ($request->input('attributes') as $attr_id) {
                        $item = array(
                            'category_id' => $cat,
                            'attribute_id' => $attr_id
                        );
                        $all_item[] = $item;
                    }
				  }
				  
                    Categories_attributes::insert($all_item);
                });


        Session::put('ok', 'تمت الاضافة بنجاح ..');
        return redirect('categories/add');
    }

    public function getSearch(Request $request) {
        $id = $request->id;
        $name = $request->name;
        $created_at = $request->created_at;
        $name = Category::where('name', $name);
        $all = Category::get();
        if ($name != "")
            $cats = $cats->where('category_trans.name', 'like', '%' . $name . '%');
        if ($id != "")
            $cats = $cats->where('id', $id);
        if ($created_at != "")
            $cats = $cats->where('created_at', $created_at);

        return view('admin.pages.categories.search', compact('all', 'cats'));
    }

    public function getUpdate($id) {
        $category=Category::find($id);
       
          $categories = Category::get();
           $attr = Attribute_translation::get();
        return view('admin.pages.categories.updatecategory')->withcategory($category)->withcategories($categories)->withattr($attr);
    }
    public function posTUpdate($id){
        $category=Category::find($id);
        $cat_ar=  Category_translation::where('cat_id',$id)->where('lang','ar')->get();
        $category->parent_id=  Input::get('parent');
        $category->save();
        $cat_ar->name=  Input::get('name_ar');
        $cat_ar->metatitle=  Input::get('metatitle_ar');
        $cat_ar->meta_keywords=  Input::get('metakeywords_ar');
        $cat_ar->meta_desc=  Input::get('metadesc_ar');
        $cat_ar->save();
         foreach ($request->input('attributes') as $attr_id) {
                        $item = array(
                            'category_id' => $cat,
                            'attribute_id' => $attr_id
                        );
                        $all_item[] = $item;
                    }

                    Categories_attributes::insert($all_item);
                     Session::put('ok', 'تمت الاضافة بنجاح ..');
        return redirect('categories/add');
                    
    }
            

    public function getDelete($id)
    {
        $category= Category::find($id);
        if($category->subcat->isEmpty()){
        $category->delete();
        session()->push('n','تم مسح القسم بنجاح   '); 
            return redirect('admin/category');
        }else{
            session()->push('n','هذا العنصر يحتوى على عناصر مرتبطه به احذف هذه العناصر اولا'); 
            return redirect('admin/category');
        }
    }
}
