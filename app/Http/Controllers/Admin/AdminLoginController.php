<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Mime\Email;

class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.login');
    }
public function authenticate(Request $request){

    $validator =Validator::make($request->all(),[
        'email' => ['required','email'],
        'password' => ['required'],
    ]);
    if($validator->passes()){
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],$request->get('remember'))){


            $admin=Auth::guard('admin')->user();
            if($admin->role ==1){

            return redirect()->route('admin.dashboard');
            }


            else{
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('error','You are not authorized');
            }
        }
            else{
    return redirect()->route('admin.login')->with('error','Either Email/Password is incorrect');
}
    }
    else{
        return redirect()->route('admin.login')
        ->withErrors($validator)->withInput($request->only('email'));
    }
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
