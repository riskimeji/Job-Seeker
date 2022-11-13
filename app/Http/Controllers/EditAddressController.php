<?php

namespace App\Http\Controllers;

use App\Models\BioEmployee;
use Illuminate\Http\Request;

use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class EditAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::pluck('name', 'id');
        $biodatas = BioEmployee::with('category')->where('user_id',  auth()->user()->id)->get();
        return view('members.update.education',[
            'employees'=> BioEmployee::all(),
            'biodatas' => $biodatas,
            'provinces' => $provinces
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
        $provinces = Province::pluck('name', 'id');
        $biodatas = BioEmployee::with('category')->where('user_id',  auth()->user()->id)->get();
        return view('members.update.address',[
            'employees' => BioEmployee::find($bioEmployee->id),
            'biodatas' => $biodatas,
            'provinces' => $provinces,
            'citys' => City::all(),
            'districts' => District::all(),

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
    {
        $validatedData = $request->validate([
            'province_id' =>'required',
            'city_id'=>'required',
            'district_id'=>'required',
            'village_id'=>'required',
            'alamt'=>'required|max:100'
        ]);
        $validatedData['user_id'] = auth()->user()->id;
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
    public function provinces()
    {
        return \Indonesia::allProvinces();
    }

    public function cities(Request $request)
    {
        return \Indonesia::findProvince($request->id, ['cities'])->cities->pluck('name', 'id');
    }

    public function districts(Request $request)
    {
        return \Indonesia::findCity($request->id, ['districts'])->districts->pluck('name', 'id');
    }

    public function villages(Request $request)
    {
        return \Indonesia::findDistrict($request->id, ['villages'])->villages->pluck('name', 'id');
    }
    public function send(Request $request)
    {
        $cities = City::where('province_id', $request->get('id'))
            ->pluck('name', 'id');

        return response()->json($cities);
    }
}
