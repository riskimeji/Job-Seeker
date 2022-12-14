<?php

namespace App\Http\Controllers;

use App\Models\BioCompany;
use App\Models\User;
use App\Models\Lowongan;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CompanyProfile extends Controller
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
    public function show(BioCompany $bioCompany, User $user)
    {
        return view('company.userprofile', [
            'users' => $user,
            'lowongans' => Lowongan::latest()->where('user_id',Auth::user()->id)->get()
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BioCompany  $bioCompany
     * @return \Illuminate\Http\Response
     */
    public function edit(BioCompany $bioCompany)
    {
        //
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
        //
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
