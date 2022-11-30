<?php

namespace App\Http\Controllers;

use App\Models\BioCompany;
use App\Models\User;
use App\Models\Category;
use App\Models\Industry;
use App\Models\HariKerja;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use Illuminate\Support\Facades\DB;

class EditCompanyInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BioCompany  $bioCompany
     * @return \Illuminate\Http\Response
     */
    public function show(BioCompany $bioCompany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BioCompany  $bioCompany
     * @return \Illuminate\Http\Response
     */
    public function edit(BioCompany $bioCompany)
    {
        if(!Auth::check()){
            return redirect('404');
        }

    if(Auth::user()->role == 'COMPANY'){
        return view('company.editpassword',[
            'users' => User::all()
        ]);
    }elseif(Auth::user()->role == 'ADMIN'){
        return view('admins.editpassword',[
            'users' => User::all()
        ]);
    }elseif(Auth::user()->role == 'EMPLOYEE'){
        return view('members.editpassword',[
            'users' => User::all()
        ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BioCompany  $bioCompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BioCompany $bioCompany)
    {
        $validatedData = $request->validate([
            'password'=>'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'=>'min:6',
        ]);
        $validatedData['password'] =  Hash::make($request->password);
        $validatedData['password_confirmation'] = Hash::make($request->password);
        User::where('id',auth()->user()->id)->update($validatedData);
        // dd($test);
        $username = Auth::user()->username;
        return redirect("dashboard/company/profile/$username/edit")->with('message','Sukses Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BioCompany  $bioCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy(BioCompany $bioCompany)
    {
        //
    }
}
