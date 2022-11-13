<?php

namespace App\Http\Controllers;

use App\Models\JenjangPendidikan;
use Illuminate\Http\Request;

class JenjangPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.jenjang.jenjang',[
            'jenjangs' => JenjangPendidikan::latest()->paginate(10),
            'datas' => JenjangPendidikan::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.jenjang.create',[
            'jenjangs' => JenjangPendidikan::all()
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
            'name' =>'required|unique:jenjang_pendidikans,name,except,id'
        ]);
        JenjangPendidikan::create($validatedData);
        return redirect('dashboard/jenjang-pendidikan')->with('message','Adding Data Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenjangPendidikan  $jenjangPendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(JenjangPendidikan $jenjangPendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenjangPendidikan  $jenjangPendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(JenjangPendidikan $jenjangPendidikan)
    {
        return view('admins.jenjang.edit',[
            'jenjangs' => JenjangPendidikan::find($jenjangPendidikan->id)
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenjangPendidikan  $jenjangPendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenjangPendidikan $jenjangPendidikan)
    {
        $validatedData = $request->validate([
            'name' =>'required|unique:jenjang_pendidikans,name,except,id'
        ]);
        JenjangPendidikan::where('id',$jenjangPendidikan->id)->update($validatedData);
        return redirect('dashboard/jenjang-pendidikan')->with('message','Success Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenjangPendidikan  $jenjangPendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenjangPendidikan $jenjangPendidikan)
    {
        JenjangPendidikan::destroy($jenjangPendidikan->id);
        return redirect('/dashboard/jenjang-pendidikan')->with('message','Success Delete Data');
    }
}
