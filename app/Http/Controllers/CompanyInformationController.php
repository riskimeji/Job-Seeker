<?php

namespace App\Http\Controllers;

use App\Models\BioCompany;
use App\Models\User;
use App\Models\Category;
use App\Models\Industry;
use App\Models\HariKerja;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use Illuminate\Support\Facades\DB;

class CompanyInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::pluck('name', 'id');
        $datas = BioCompany::where('user_id', auth()->user()->id);
        $filter = json_decode($datas->get('user_id'));
        if($filter == null){
            return view('company.personalinformation',[
                'categorys' =>  Category::all(),
                'industrys' => Industry::all(),
                'harikerjas' => HariKerja::all(),
                'users' => User::all(),
                'provinces' => $provinces
            ]);
        }
        return redirect ('dashboard/company')->with('message','Anda sudah mengisi data');
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
            'province_id' =>'required',
            'city_id'=>'required',
            'alamat'=>'required|max:100',
            'phone_perusahaan' =>'required',
            'email_perusahaan'=>'required',
            'google_maps'=>'required',
            'tentang'=>'required',
            'hari_kerja_id'=>'required',
            'jam_kerja_mulai'=>'required',
            'jam_kerja_berakhir'=>'required',
            'website'=>'required',
            'industry_id'=>'required',
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $test = BioCompany::create($validatedData);
        // dd($test);
        return redirect('dashboard/company')->with('message','Sukses mengisi data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BioCompany  $bioCompany
     * @return \Illuminate\Http\Response
     */
    public function show(BioCompany $bioCompany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BioCompany  $bioCompany
     * @return \Illuminate\Http\Response
     */
    public function edit(BioCompany $bioCompany)
    {
        $provinces = Province::pluck('name', 'id');
        // $datas = BioCompany::where('user_id', auth()->user()->id);
        // $filter = json_decode($datas->get('user_id'));
            return view('company.editpofile',[
                'biocompanees' => BioCompany::all(),
                'categorys' =>  Category::all(),
                'industrys' => Industry::all(),
                'harikerjas' => HariKerja::all(),
                'users' => User::all(),
                'provinces' => $provinces
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BioCompany  $bioCompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BioCompany $bioCompany, $id)
    {
        $validatedData = $request->validate([
            'province_id' =>'required',
            'city_id'=>'required',
            'alamat'=>'required|max:100',
            'phone_perusahaan' =>'required',
            'email_perusahaan'=>'required',
            'google_maps'=>'required',
            'tentang'=>'required',
            'hari_kerja_id'=>'required',
            'jam_kerja_mulai'=>'required',
            'jam_kerja_berakhir'=>'required',
            'website'=>'required',
            'industry_id'=>'required',
        ]);
        $test = BioCompany::where('id',$id)->update($validatedData);
        // dd($test);
        $username = Auth::user()->username;
        return redirect("dashboard/company/profile/$username/edit")->with('message','Sukses Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BioCompany  $bioCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy(BioCompany $bioCompany)
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
