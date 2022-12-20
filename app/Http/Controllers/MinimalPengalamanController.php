<?php

namespace App\Http\Controllers;

use App\Models\MinimalPengalaman;
use Illuminate\Http\Request;

class MinimalPengalamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.minpengalaman.index',[
            'minimalpengalamans' => MinimalPengalaman::latest()->paginate(10),
            'datas' => MinimalPengalaman::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.minpengalaman.create',[
            'minimalpengalamans' => MinimalPengalaman::all()
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
            'name' =>'required|unique:minimal_pengalamen,name,except,id'
        ]);
        MinimalPengalaman::create($validatedData);
        return redirect('dashboard/minimal-pengalaman')->with('message','Adding Data Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MinimalPengalaman  $minimalPengalaman
     * @return \Illuminate\Http\Response
     */
    public function show(MinimalPengalaman $minimalPengalaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MinimalPengalaman  $minimalPengalaman
     * @return \Illuminate\Http\Response
     */
    public function edit(MinimalPengalaman $minimalPengalaman)
    {
        return view('admins.minpengalaman.edit',[
            'minimalpengalamans' => MinimalPengalaman::find($minimalPengalaman->id)
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MinimalPengalaman  $minimalPengalaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MinimalPengalaman $minimalPengalaman)
    {
        $validatedData = $request->validate([
            'name' =>'required|unique:minimal_pengalamans,name,except,id'
        ]);
        MinimalPengalaman::where('id',$minimalPengalaman->id)->update($validatedData);
        return redirect('dashboard/minimal-pengalaman')->with('message','Success Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MinimalPengalaman  $minimalPengalaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(MinimalPengalaman $minimalPengalaman)
    {
        MinimalPengalaman::destroy($minimalPengalaman->id);
        return redirect('/dashboard/minimal-pengalaman')->with('message','Success Delete Data');
    }
}
