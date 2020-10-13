<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategoryRequest;
use App\Models\Category;
use App\Models\Type;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use DB;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    public function index()
    {
        
        $categories=Type::paginate(10);

        return view('admin.type.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.type.create');
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
            
        $model=Type::create($request->all());  
                
                
                return  redirect(route('admin.type'));
      }
     catch (\Exception $ex) {
        return $ex;
        return redirect()->route('admin.type')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
    }

    

    }


    public function edit($mainCat_id)
    {
        try{
                    
            $mainCategory=Type::findorfail($mainCat_id);
            return view('admin.type.edit',compact('mainCategory'));

            if (!$mainCategory)
                return redirect()->route('admin.type')->with(['error' => 'هذا القسم غير موجود ']);

            return view('admin.type.edit', compact('mainCategory'));

        }

     catch (\Exception $ex) {
        return $ex;
        return redirect()->route('admin.type')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
    }
    }


    public function update(Request $request,$id)
    {
      
    try{
        $model=Type::findorfail($id);
        $model->update($request->all());
        $model->save();
        return  redirect(route('admin.type'))->with(['success' => 'تم تعديل  بنجاح']);
      }

   catch (\Exception $ex) {
       
    return $ex;
    return redirect()->route('admin.type')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
}

    }


    public function destroy($id)
    {

        try {
            $maincategory = Type::find($id);
            if (!$maincategory)
                return redirect()->route('admin.type')->with(['error' => 'هذا القسم غير موجود ']);
     
          $maincategory->delete();
         
            return redirect()->route('admin.type')->with(['success' => 'تم حذف القسم بنجاح']);

        } catch (\Exception $ex) {
            return $ex;
            return redirect()->route('admin.type')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

   
}
