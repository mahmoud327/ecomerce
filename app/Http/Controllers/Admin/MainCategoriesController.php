<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use DB;
use Illuminate\Support\Str;

class MainCategoriesController extends Controller
{
    public function index()
    {
        
        $categories=Category::paginate(10);

        return view('admin.maincategories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.maincategories.create');
    }


    public function store(Request $request)
    {
    try{

        $rules=[
       
           
            'name'=>'required',
          

  
        ];
        $message=[
            'name.required'=>'الاسم يكون مطلوب',
         

        ];
        $this->validate($request,$rules,$message);
     
   $model=Category::create($request->all());  
        
        
        return  redirect(route('admin.maincategories'));
  
    }
   
      catch (\Exception $ex) {
    return $ex;
    return redirect()->route('admin.maincategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
    }
    }


    public function edit($mainCat_id)
    {
        try{
        //get specific categories and its translations
        $mainCategory=Category::findorfail($mainCat_id);
        return view('admin.maincategories.edit',compact('mainCategory'));

        if (!$mainCategory)
            return redirect()->route('admin.maincategories')->with(['error' => 'هذا القسم غير موجود ']);

        return view('admin.maincategories.edit', compact('mainCategory'));
        }
     catch (\Exception $ex) {
        return $ex;
        return redirect()->route('admin.maincategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
    }
        
    }


    public function update(Request $request,$id)
    {
      
    try{
        $model=Category::findorfail($id);
        $model->update($request->all());
        $model->save();
        return  redirect(route('admin.maincategories'))->with(['success' => 'تم تعديل  بنجاح']);
     }

   catch (\Exception $ex) {
    return $ex;
    return redirect()->route('admin.maincategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
   }
    }


    public function destroy($id)
    {

        try {
            $maincategory = Category::find($id);
            if (!$maincategory)
                return redirect()->route('admin.maincategories')->with(['error' => 'هذا القسم غير موجود ']);
     
          $maincategory->delete();
         
            return redirect()->route('admin.maincategories')->with(['success' => 'تم حذف القسم بنجاح']);

        } catch (\Exception $ex) {
            return $ex;
            return redirect()->route('admin.maincategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

   
}
