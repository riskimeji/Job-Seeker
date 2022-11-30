<?php

namespace App\Http\Controllers;

use App\Models\BioCompany;
use App\Models\Industry;
use App\Models\HariKerja;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use Illuminate\Support\Facades\DB;

class BioCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::pluck('name', 'id');
        // $datass = auth()->user()->id;
        $datas = BioCompany::where('user_id', auth()->user()->id);
        // $filter = $datas->get('user_id');
        $filter = json_decode($datas->get('user_id'));
        // $datas = DB::select("SELECT user_id from bio_employees where user_id = ");
        if($filter == null){
            return view('company.personalinformation',[
                'biocompanees' => BioCompany::all(),
                'users' => User::all(),
                'industrys' => Industry::all(),
                'harikerjas' => HariKerja::all(),
                'provinces' => $provinces,
            ]);
        }
        // dd($filter);
        $username = Auth::user()->username;
        return redirect("dashboard/company/profile/$username/edit")->with('message','Sukses Update Data');
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
        $datas = BioCompany::where('user_id', auth()->user()->id);
        $filter = json_decode($datas->get('user_id'));
        if($filter != null) {
        $biodatas = BioCompany::with('industry')->where('user_id',  auth()->user()->id)->get();
        return view('company.profile',[
                'biocompanees' => BioCompany::all(),
                'users' => User::all(),
                'industrys' => Industry::all(),
                'harikerjas' => HariKerja::all(),
                'biodatas' => $biodatas
       ]);
    }
    return redirect('dashboard/company-compleate')->with('message','Kamu Harus Mengisi Data Dulu');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BioCompany  $bioCompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BioCompany $bioCompany)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'username' => 'required|unique:users,username,except,id',
            'sampul' => 'image|mimes:jpeg,png,jpg,png,svg|max:2048',
            'profile' => 'image|mimes:jpeg,png,jpg,png,svg|max:2048'
        ]);

        if($request->file('sampul') != null){
            $sampulName = time().$request->file('sampul')->getClientOriginalName();
            $pathSampul = $request->file('sampul')->storeAs('sampul', $sampulName, 'public');
            $validatedData['sampul'] =  '/storage/'.$pathSampul;
        }else{
            $validatedData['sampul'] = Auth::user()->sampul;
        }
        if($request->file('profile') != null ){
            $profileName = time().$request->file('profile')->getClientOriginalName();
            $path = $request->file('profile')->storeAs('profile', $profileName, 'public');
            $validatedData['profile'] = '/storage/'.$path;
        }else{
            $validatedData['profile'] = Auth::user()->profile;
        }
        User::where('id',auth()->user()->id)->update($validatedData);
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
}
