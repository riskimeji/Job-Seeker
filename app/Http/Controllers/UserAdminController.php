<?php

namespace App\Http\Controllers;

use App\Models\UserAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('signup.admin');
    }
    public function login(){
        return view('signin.admin');
    }
    public function authenticate(Request $request){
        $cridentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (Auth::attempt($cridentials)){
            $request->session()->generate();
            return redirect()->intended('dashboard/admin');
        }
        return back()->with('errorLogin','Email or Password wrong');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('signup.admin', [
            'useradmins'=>UserAdmin::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' =>'required',
            'email' =>'required|unique:user_admins,email,except,id',
            'phone_number'=>'required|max:13|min:12|unique:user_admins,phone_number,except,id',
            'password'=>'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'=>'min:6'
        ]);
        $validatedData['password'] =  Hash::make($request->password);
        $validatedData['password_confirmation'] = Hash::make($request->password);
        $validatedData['status'] = 'N';
        UserAdmin::create($validatedData);
        return redirect('admin/login')->with('message','Sukses mendaftar, silahkan log in');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserAdmin  $userAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(UserAdmin $userAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserAdmin  $userAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(UserAdmin $userAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserAdmin  $userAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserAdmin $userAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserAdmin  $userAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAdmin $userAdmin)
    {
        //
    }
}
