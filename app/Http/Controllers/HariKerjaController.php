<?php

namespace App\Http\Controllers;

use App\Models\HariKerja;
use Illuminate\Http\Request;

class HariKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.harikerja.harikerja',[
            'harikerjas' => HariKerja::latest()->paginate(10),
            'datas' => HariKerja::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.harikerja.create',[
            'harikerjas' => HariKerja::all()
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
            'name' =>'required'
        ]);
        HariKerja::create($validatedData);
        return redirect('dashboard/hari-kerja')->with('message','Adding Data Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HariKerja  $hariKerja
     * @return \Illuminate\Http\Response
     */
    public function show(HariKerja $hariKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HariKerja  $hariKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(HariKerja $hariKerja)
    {
        return view('admins.harikerja.edit',[
            'harikerjas' => HariKerja::find($hariKerja->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HariKerja  $hariKerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HariKerja $hariKerja)
    {
        $validatedData = $request->validate([
            'name' =>'required|unique:hari_kerjas,name,except,id'
        ]);
        HariKerja::where('id',$hariKerja->id)->update($validatedData);
        return redirect('dashboard/hari-kerja')->with('message','Success Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HariKerja  $hariKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(HariKerja $hariKerja)
    {
        HariKerja::destroy($hariKerja->id);
        return redirect('/dashboard/hari-kerja')->with('message','Success Delete Data');

    }
}
