<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
   public function login(){

    return view('Web.login');

   }

   public function register(){

    return view('Web.register');
   }

   public function processRegister(Request $request){
    $validator =Validator::make($request->all(),[
        'name' => ['required','min:3'],
        'email' => ['required','email','unique:users'],
        'password' => ['required'],
       // 'userable_id' => ['nullable'],
       // 'userable_type' => ['nullable'],
    ]);

    if($validator->passes()){
        $user = new User;
        $user->name=$request->name;
        $user->email=$request->email;
      //  $user->userable_id=$request->userable_id;
      //  $user->userable_type=$request->userable_type;
        $user->password=Hash::make($request->password);
        $user->save();
        session()->flash('success','you have been registered');
    }
    return view('Web.Pages.index');

   }

   public function authenticate(Request $request){
    $validator =Validator::make($request->all(),[
        'password' => ['required'],
        'email' => ['required','email'],
    ]);
    if($validator->passes()){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password],$request->get('remember'))){
            return redirect()->route('profile');
        }
else {

    return redirect()->route('auth.login')
    ->withInput($request->only('email'))
    ->with('error','Either email and password is incorrect');
}

    }
    else{
        return redirect()->route('auth.login')
        ->withErrors($validator)
        ->withInput($request->only('email'));
    }
   }

   public function profile(){
    echo"";

   }

   public function logout(){
   Auth::logout();
   return redirect()->route('auth.login')
   ->with('success','you logged out');;

   }
}
