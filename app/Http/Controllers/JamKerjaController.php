<?php

namespace App\Http\Controllers;

use App\Models\JamKerja;
use Illuminate\Http\Request;

class JamKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.jamkerja.jamkerja',[
            'jamkerjas' => JamKerja::latest()->paginate(10),
            'datas' => JamKerja::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.jamkerja.create',[
            'jamkerjas' => JamKerja::all()
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
        JamKerja::create($validatedData);
        return redirect('dashboard/jam-kerja')->with('message','Adding Data Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JamKerja  $jamKerja
     * @return \Illuminate\Http\Response
     */
    public function show(JamKerja $jamKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JamKerja  $jamKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(JamKerja $jamKerja)
    {
        return view('admins.jamkerja.edit',[
            'jamkerjas' => JamKerja::find($jamKerja->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JamKerja  $jamKerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JamKerja $jamKerja)
    {
        $validatedData = $request->validate([
            'name' =>'required|unique:jam_kerjas,name,except,id'
        ]);
        JamKerja::where('id',$jamKerja->id)->update($validatedData);
        return redirect('dashboard/jam-kerja')->with('message','Success Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JamKerja  $jamKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(JamKerja $jamKerja)
    {
        JamKerja::destroy($jamKerja->id);
        return redirect('/dashboard/jam-kerja')->with('message','Success Delete Data');
    }
}
