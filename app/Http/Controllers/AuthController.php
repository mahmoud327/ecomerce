<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\Client;
use App\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    /// edit email
    

    
    


    // return login veiw
    public function login()
    {
      return view('authpages.login');

    }
    
    
    // checking if user is a client or an admin
    public function loginCheck(Request $request)
    {

      // dd($request->all());
      $rules = [
        'email'             =>'required',
        'password'             =>'required',
      ];

      $messages = [
        'email.required'    => 'يرجى إدخال  البريد الالكترونى',
        'password.required' => 'يرجى إدخال كلمة المرور'
      ];

      $this->validate($request, $rules, $messages);

      $credentials = [
        'email' => $request['email'],
        'password' => $request['password'],
    ];

    // Dump data
    //dd($credentials);
   
  

    $client = Client::where('email',$request->email)->first();
    // $clients = Client::get();

    
    if($client)
    {
     
        
        if (auth()->guard('client')->attempt($credentials))
        {
          return 'welcome mahmoud';
        }
        else {
    
          return back()->with(['error' => 'هناك خطا بالبيانات']);
        }

      
 
    }

    else {
      
      return back() ->with(['error' => ' البيانات غير صحيحه ']);
    }
 }

 

  // return register veiw
   public function register()
      {
        return view('authpages.register');
      }

      // register a client
      public function registerSave(Request $request)
      {
        $rules = [
          'username'                =>'required|unique:clients',
          'email'                   =>'nullable|email',
          'password'                =>'required|confirmed'

        ];

        $messages = [
          'username.required' => 'يجب ادخال اسم المستخدم',
          'username.unique'   =>'اسم المستخدم موجود بالفعل',

          'email.email' =>' يجب ادخال الايميل بشكل صحيح',

      

          'password.required' =>'يجب ادخال كلمة المرور',
          'password.confirmed' =>'يجب تأكيد كلمة المرور',
        ];

        $this->validate($request, $rules, $messages);

        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create($request->all());

      

        
        $client->save();
        return redirect(route('login'));


      }


    

         // client logout

         public function logout()
        {
          auth()->guard('client')->logout();
          return redirect(route('login-user'));

        }


      // admin change password for client

     










}
