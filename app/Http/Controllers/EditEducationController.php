<?php

namespace App\Http\Controllers;

use App\Models\BioEmployee;
use Illuminate\Support\Facades\Auth;

use App\Models\JurusanPendidikan;
use Illuminate\Http\Request;

class EditEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    // $bio = BioEmployee::where('id',auth()->user()->id)->first();
    // dd($bio);
    // where("user_id" , Auth::user()->id())
        // dd(Auth::user());
        $biodatas = BioEmployee::with('category')->where('user_id',  auth()->user()->id)->get();
        return view('members.update.education',[
            'employees'=> BioEmployee::all(),
            'biodatas' => $biodatas,
            'jurusans'=> JurusanPendidikan::all()
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
        $biodatas = BioEmployee::with('category')->where('user_id',auth()->user()->id)->get();
        return view('members.update.education',[
           'employees' => BioEmployee::find($bioEmployee->id),
           'jurusans' => JurusanPendidikan::all(),
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
    public function update(Request $request, BioEmployee $bioEmployee,$id)
    { $validatedData = $request->validate([
        'institut_name'=>'required',
        'star_institut'=>'required',
        'end_institut'=>'required',
        'jurusan_pendidikan_id'=>'required',
        'ipk'=>'required',
    ]);
    // BioEmployee::where('id',auth()->user()->id)->update($validatedData);
    // dd($test);
    // where("user_id" , Auth::user()->id())
    // $bio = BioEmployee::where('id',auth()->user()->id)->first();

    // $bio->update($validatedData);
    // return redirect('dashboard/profile')->with('message','Sukses Update Data');

    // return redirect('dashboard/profile')->with('message','Sukses Update Data');
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
