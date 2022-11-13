<?php

namespace App\Http\Controllers;

use App\Models\BioEmployee;
use App\Models\Category;
use Illuminate\Http\Request;

class EditJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biodatas = BioEmployee::with('category')->where('user_id',  auth()->user()->id)->get();
        return view('members.update.jobexperience',[
            'employees'=> BioEmployee::all(),
            'biodatas' => $biodatas,
            'categorys' => Category::all()
                ]);
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
     * @param  \App\Models\BioEmployee  $bioEmployee
     * @return \Illuminate\Http\Response
     */
    public function show(BioEmployee $bioEmployee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BioEmployee  $bioEmployee
     * @return \Illuminate\Http\Response
     */
    public function edit(BioEmployee $bioEmployee)
    {
        $biodatas = BioEmployee::with('category')->where('user_id',  auth()->user()->id)->get();
        return view('members.update.jobexperience',[
           'employees' => BioEmployee::find($bioEmployee->id),
           'categorys'=> Category::all(),
           'biodatas' => $biodatas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BioEmployee  $bioEmployee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BioEmployee $bioEmployee, $id)
    {
        $validatedData = $request->validate([
            'company_name'=>'required|max:20',
            'star_magang'=>'required',
            'position'=>'required',
            'end_magang'=>'required',
            'category_id'=>'required',
        ]);
        BioEmployee::where('id',$id)->update($validatedData);
        return redirect('dashboard/profile')->with('message','Sukses Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BioEmployee  $bioEmployee
     * @return \Illuminate\Http\Response
     */
    public function destroy(BioEmployee $bioEmployee)
    {
        //
    }
}
