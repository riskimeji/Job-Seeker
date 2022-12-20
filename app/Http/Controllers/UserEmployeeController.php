<?php

namespace App\Http\Controllers;

use App\Models\UserEmployee;
use App\Models\User;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('signup.employee');
    }
    public function login(){
        return view('signin.employee');
    }
    public function dashboardmember(){
        return view('members.index',[
            'lamarans' => Lamaran::latest()->where('user_id',Auth::user()->id)->paginate(10)
        ]);
    }
    public function authenticate(Request $request){
        $cridentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (Auth::attempt($cridentials)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard/member');
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
        return view('signup.employee',[
            'users'=> User::all()
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email,except,id',
            'phone_number' => 'required|min:12|max:13|unique:users,phone_number,except,id',
            'gender' => 'required|in:P,L',
            'date_birth' => 'required',
            'password'=>'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'=>'min:6',
            'username'=>'required|unique:users,username,expect,id|max:10'
        ]);
        $validatedData['password'] =  Hash::make($request->password);
        $validatedData['password_confirmation'] = Hash::make($request->password);
        $validatedData['role'] = 'EMPLOYEE';
        // dd($validatedData);
        User::create($validatedData);
        $cridentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);
        if (Auth::attempt($cridentials)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard/personal-information/');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserEmployee  $userEmployee
     * @return \Illuminate\Http\Response
     */
    public function show(UserEmployee $userEmployee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserEmployee  $userEmployee
     * @return \Illuminate\Http\Response
     */
    public function edit(UserEmployee $userEmployee)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserEmployee  $userEmployee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserEmployee $userEmployee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserEmployee  $userEmployee
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserEmployee $userEmployee)
    {
        //
    }
}
