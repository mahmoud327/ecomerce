<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendorRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\VendorCreated;
use DB;

class productsController extends Controller
{


    public function index()
    {
        $vendors = Product::with('categories')->paginate(10);
    
        return view('admin.vendors.index', compact('vendors'));
    }

    public function create()
    {
        $categories = Category::get();
        $categoriess = Type::get();
        
        return view('admin.vendors.create', compact('categories','categoriess'));
    }

    public function store(Request $request)
    {
        

           try{
          $this->validate($request,[
            "name"    => "required",
       
    
            ]);

        $post = Product::create([
            "name"    => $request->name,
          
         // my new post => my-new-post
            
        ]);
        if ($request->hasFile('image')) {
            $path = public_path();
            $destinationPath = $path . '/uploads/posts/'; // upload path
            $logo = $request->file('image');
            $extension = $logo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
            $logo->move($destinationPath, $name); // uploading file to given path
            $post->image = 'uploads/posts/' . $name;
            $post->save();
        }

        $post->categories()->attach($request->category_id);
        $post->types()->attach($request->type_id);

    
     return redirect()->route('admin.vendors');
    
    } 
 catch (\Exception $exception) {
    return $exception;
    DB::rollback();
    return redirect()->route('admin.vendors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
}

    
}

    public function edit($id)
    {
        try {

            $vendor = Product::find($id);
            $categories=Category::get();
            $categoriess=Type::get();
            if (!$vendor)
                return redirect()->route('admin.vendors')->with(['error' => 'هذا المتجر غير موجود او ربما يكون محذوفا ']);


            return view('admin.vendors.edit', compact('vendor', 'categories','categoriess'));

            } 
            
          catch (\Exception $exception) {
            return redirect()->route('admin.vendors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function update($id, Request $request)
    {

        try {

            $vendor = Product::find($id);
        
            if (!$vendor)
                return redirect()->route('admin.vendors')->with(['error' => 'هذا المتجر غير موجود او ربما يكون محذوفا ']);

             

                $vendor->update($request->except('image'));
        
                if ($request->hasFile('image')) {
                     $path = public_path();
                     $destinationPath = $path . '/uploads/posts/'; // upload path
                     $logo = $request->file('image');
                     $extension = $logo->getClientOriginalExtension(); // getting image extension
                     $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
                     $logo->move($destinationPath, $name); // uploading file to given path
                     $vendor->image = 'uploads/posts/' . $name;
                     $vendor->save();
                 }
          
                
                $vendor->categories()->sync($request->category_id);
                $vendor->categories()->sync($request->type_id);
                $vendor->save();

            return redirect()->route('admin.vendors')->with(['success' => 'تم التحديث بنجاح']);
           } 
        
        catch (\Exception $exception) {
            return $exception;
            DB::rollback();
            return redirect()->route('admin.vendors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }

    

}
