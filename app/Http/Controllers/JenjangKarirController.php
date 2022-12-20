<?php

namespace App\Http\Controllers;

use App\Models\JenjangKarir;
use Illuminate\Http\Request;

class JenjangKarirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.jenjangkarir.index',[
            'jenjangkarirs' => JenjangKarir::latest()->paginate(10),
            'datas' => JenjangKarir::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.jenjangkarir.create',[
            'jenjangkarirs' => JenjangKarir::all()
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
            'name' =>'required|unique:jenjang_karirs,name,except,id'
        ]);
        JenjangKarir::create($validatedData);
        return redirect('dashboard/jenjang-karir')->with('message','Adding Data Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenjangKarir  $jenjangKarir
     * @return \Illuminate\Http\Response
     */
    public function show(JenjangKarir $jenjangKarir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenjangKarir  $jenjangKarir
     * @return \Illuminate\Http\Response
     */
    public function edit(JenjangKarir $jenjangKarir)
    {
        return view('admins.jenjangkarir.edit',[
            'jenjangkarirs' => JenjangKarir::find($jenjangKarir->id)
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenjangKarir  $jenjangKarir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenjangKarir $jenjangKarir)
    {
        $validatedData = $request->validate([
            'name' =>'required|unique:jenjang_karirs,name,except,id'
        ]);
        JenjangKarir::where('id',$jenjangKarir->id)->update($validatedData);
        return redirect('dashboard/jenjang-karir')->with('message','Success Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenjangKarir  $jenjangKarir
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenjangKarir $jenjangKarir)
    {
        JenjangKarir::destroy($jenjangKarir->id);
        return redirect('/dashboard/jenjang-karir')->with('message','Success Delete Data');
    }
}
