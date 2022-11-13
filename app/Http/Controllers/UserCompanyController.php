<?php

namespace App\Http\Controllers;

use App\Models\UserCompany;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('signup.company');
    }
    public function login(){
        return view('signin.company');
    }
    public function dashboardcompany(){
        return view('company.index');
    }
    public function authenticate(Request $request){
        $cridentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (Auth::attempt($cridentials)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard/company');
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
        return view('signup.company',[
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:user_employees,email,except,id',
            'phone_number' => 'required|min:12|max:13|unique:user_employees,phone_number,except,id',
            'gender' => 'required|in:P,L',
            'date_birth' => 'required',
            'password'=>'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'=>'min:6'
        ]);
        $validatedData['password'] =  Hash::make($request->password);
        $validatedData['password_confirmation'] = Hash::make($request->password);
        $validatedData['role'] = 'EMPLOYEE';
        User::create($validatedData);
        return redirect('signin/company')->with('message','Sukses mendaftar, silahkan log in');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserCompany  $userCompany
     * @return \Illuminate\Http\Response
     */
    public function show(UserCompany $userCompany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserCompany  $userCompany
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCompany $userCompany)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserCompany  $userCompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserCompany $userCompany)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserCompany  $userCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCompany $userCompany)
    {
        //
    }
}
