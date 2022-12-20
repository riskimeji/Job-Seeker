<?php

namespace App\Http\Controllers;

use App\Models\UserAdmin;
use App\Models\User;
use App\Models\Lowongan;
use App\Models\Industry;
use App\Models\Lamaran;
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
    public function masuk(){
        return view('admins.login');
    }
    public function dashboardadmin(){
        return view('admins.index',[
            'users'=>User::first()->paginate(7),
            'datas'=>User::count(),
            'countindustry'=>Industry::count(),
            'countlowongans' => Lowongan::count(),
            'lowongans' => Lowongan::all(),
            'countlamarans' => Lamaran::count(),
            'lamarans' => Lamaran::all(),
        ]);
    }
    public function authenticate(Request $request){
        $cridentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);
        if (Auth::attempt($cridentials)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard/admin');
        }
        return back()->with('errorLogin','Email or Password incorrect');
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
            'users'=>User::all()
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
            'first_name' =>'required',
            'email' =>'required|unique:users,email,except,id',
            'phone_number'=>'required|max:13|min:12|unique:user_admins,phone_number,except,id',
            'password'=>'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'=>'min:6',
            'username'=>'required|unique:users,username,expect,id|max:10'
        ]);
        $validatedData['password'] =  Hash::make($request->password);
        $validatedData['password_confirmation'] = Hash::make($request->password);
        $validatedData['role'] = 'ADMIN';
        User::create($validatedData);
        return redirect('admin/masuk')->with('message','Sukses mendaftar, silahkan log in');
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
     * @param  \App\Models\User  $user
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit( Request $request, User $user)
    {
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
