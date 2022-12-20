<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Http\Request;

class LamaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function index(Lowongan $lowongan)
    {
        return view('admins.lamaran.lamaran',[
            'lamarans' => Lamaran::latest()->paginate(10),
            'datas' => Lamaran::count()
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
     * @param  \App\Models\Lamaran  $lamaran
     * @return \Illuminate\Http\Response
     */
    public function show(Lamaran $lamaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lamaran  $lamaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Lamaran $lamaran)
    {
        return view('admins.lamaran.edit',[
            'lamarans' => Lamaran::find($lamaran->id)
          ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lamaran  $lamaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lamaran $lamaran)
    {
        $validatedData = $request->validate([
            'status' =>'required'
        ]);
        Lamaran::where('id',$lamaran->id)->update($validatedData);
        return redirect('dashboard/lamaran')->with('message','Success Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lamaran  $lamaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lamaran $lamaran)
    {
        Lamaran::destroy($lamaran->id);
        return redirect('/dashboard/lamaran')->with('message','Success Delete Data');
    }
}
