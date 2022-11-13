<?php

namespace App\Http\Controllers;

use App\Models\JurusanPendidikan;
use Illuminate\Http\Request;

class JurusanPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.jurusan.jurusan',[
            'jurusans' => JurusanPendidikan::latest()->paginate(113),
            'datas' => JurusanPendidikan::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.jurusan.create',[
            'jurusans' => JurusanPendidikan::all()
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
            'name' =>'required|unique:jurusan_pendidikans,name,except,id'
        ]);
        JurusanPendidikan::create($validatedData);
        return redirect('dashboard/jurusan-pendidikan')->with('message','Adding Data Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JurusanPendidikan  $jurusanPendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(JurusanPendidikan $jurusanPendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JurusanPendidikan  $jurusanPendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(JurusanPendidikan $jurusanPendidikan)
    {
        return view('admins.jurusan.edit',[
            'jurusans' => JurusanPendidikan::find($jurusanPendidikan->id)
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JurusanPendidikan  $jurusanPendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JurusanPendidikan $jurusanPendidikan)
    {
        $validatedData = $request->validate([
            'name' =>'required|unique:jurusan_pendidikans,name,except,id'
        ]);
        JurusanPendidikan::where('id',$jurusanPendidikan->id)->update($validatedData);
        return redirect('dashboard/jurusan-pendidikan')->with('message','Success Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JurusanPendidikan  $jurusanPendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JurusanPendidikan $jurusanPendidikan)
    {
        JurusanPendidikan::destroy($jurusanPendidikan->id);
        return redirect('/dashboard/jurusan-pendidikan')->with('message','Success Delete Data');

    }
}
