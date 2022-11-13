<?php

namespace App\Http\Controllers;

use App\Models\BioEmployee;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\JenjangPendidikan;
use App\Models\JurusanPendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use Illuminate\Support\Facades\DB;

class PersonalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::pluck('name', 'id');
        $datas = BioEmployee::where('user_id', auth()->user()->id);
        $filter = json_decode($datas->get('user_id'));
        if($filter == null){
            return view('members.personalinformation',[
                'categorys' =>  Category::all(),
                'jenjangs' => JenjangPendidikan::all(),
                'jurusans' => JurusanPendidikan::all(),
                'users' => User::all(),
                'provinces' => $provinces
            ]);
        }
        return redirect ('dashboard/member')->with('message','Anda sudah mengisi data');

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
        $validatedData = $request->validate([
            'status_pernikahan' =>'required',
            'province_id' =>'required',
            'city_id'=>'required',
            'district_id'=>'required',
            'village_id'=>'required',
            'alamt'=>'required|max:100',
            'company_name'=>'required|max:20',
            'star_magang'=>'required',
            'position'=>'required',
            'end_magang'=>'required',
            'category_id'=>'required',
            'institut_name'=>'required',
            'star_institut'=>'required',
            'end_institut'=>'required',
            'jenjang_pendidikan_id'=>'required',
            'jurusan_pendidikan_id'=>'required',
            'ipk'=>'required'
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        // dd($test);
        BioEmployee::create($validatedData);
        return redirect('dashboard/member')->with('message','Sukses mengisi data');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BioEmployee  $bioEmployee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BioEmployee $bioEmployee)
    {
        //
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
