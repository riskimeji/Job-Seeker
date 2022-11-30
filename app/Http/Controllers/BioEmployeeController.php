<?php

namespace App\Http\Controllers;

use App\Models\BioEmployee;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\JenjangPendidikan;
use App\Models\JurusanPendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use Illuminate\Support\Facades\DB;


class BioEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BioEmployee  $bioEmployee
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, BioEmployee $bioEmployee)
    {
        $provinces = Province::pluck('name', 'id');
        // $datass = auth()->user()->id;
        $datas = BioEmployee::where('user_id', auth()->user()->id);
        // $filter = $datas->get('user_id');
        $filter = json_decode($datas->get('user_id'));
        // $datas = DB::select("SELECT user_id from bio_employees where user_id = ");
        if($filter == null){
            return view('members.personalinformation',[
                'bioemployees' => BioEmployee::all(),
                'users' => User::all(),
                'jenjangs' => JenjangPendidikan::all(),
                'jurusans' => JurusanPendidikan::all(),
                'categorys' => Category::all(),
                'provinces' => $provinces,
                'datas' => BioEmployee::count()
            ]);
        }
        // dd($filter);
        $username = Auth::user()->username;
        return redirect("dashboard/profile/$username/edit")->with('message','Sukses Update Data');
    }
    public function profile(){
        $datas = BioEmployee::where('user_id', auth()->user()->id);
        // $filter = $datas->get('user_id');
        $filter = json_decode($datas->get('user_id'));
        if($filter != null) {


        // $datas = BioEmployee::where('user_id', auth()->user()->id);
        // $filter = json_decode($datas->get('user_id'));
        // $biodatas = DB::table('bio_employees')->where('user_id',  auth()->user()->id)->get();
        $biodatas = BioEmployee::with('category')->where('user_id',  auth()->user()->id)->get();
        // $test = $biodatas;
        // $test = $biodatas->category->name;
        // $dataku = DB::select("SELECT * from bio_employees where user_id =  ");
       return view('members.profile',[
                'bioemployees' => BioEmployee::all(),
                'users' => User::all(),
                'jenjangs' => JenjangPendidikan::all(),
                'jurusans' => JurusanPendidikan::all(),
                'categorys' => Category::all(),
                'biodatas' => $biodatas
       ]);
    }
    return redirect('dashboard/personal-information')->with('message','Kamu Harus Mengisi Data Dulu');
    //    dd($test);
    }

    public function editAccount()
    {
        return view('members.update.account',[
            'users' => User::all()
        ]);
    }


    public function updateAccount(Request $request){
        $validatedData = $request->validate([
            'first_name' =>'required',
            'last_name' =>'required',
            'email' =>'required|unique:users,email,except,id',
            'phone_number'=>'required|max:13|min:12|unique:users,phone_number,except,id'
            // 'password'=>'min:6|required_with:password_confirmation|same:password_confirmation',
            // 'password_confirmation'=>'min:6'
        ]);
        // $validatedData['password'] =  Hash::make($request->password);
        // $validatedData['password_confirmation'] = Hash::make($request->password);
        // $validatedData['role'] = 'EMPLOYEE';
        User::where('id',$user->id)->update($validatedData);
        return redirect('dashboard/member/profile')->with('message','Sukses Update Data');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // // $provinces = Province::pluck('name', 'id');
        // // return view('members.personalinformation',[
        // //     'bioemployees' => BioEmployee::all(),
        // //     'users' => User::all(),
        // //     'jenjangs' => JenjangPendidikan::all(),
        // //     'jurusans' => JurusanPendidikan::all(),
        // //     'categorys' => Category::all(),
        // ]);
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
        $datas = BioEmployee::where('user_id', auth()->user()->id);
        $filter = json_decode($datas->get('user_id'));
        if($filter != null) {
        $biodatas = BioEmployee::with('category')->where('user_id',  auth()->user()->id)->get();

       return view('members.profile',[
                'bioemployees' => BioEmployee::all(),
                'users' => User::all(),
                'jenjangs' => JenjangPendidikan::all(),
                'jurusans' => JurusanPendidikan::all(),
                'categorys' => Category::all(),
                'biodatas' => $biodatas
       ]);
    }
    return redirect('dashboard/personal-information')->with('message','Kamu Harus Mengisi Data Dulu');
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
        $validatedData = $request->validate([
            'bio' => 'required|max:30',
            'sampul' => 'image|mimes:jpeg,png,jpg,png,svg|max:2048',
            'profile' => 'image|mimes:jpeg,png,jpg,png,svg|max:2048'
        ]);

        // $validatedData['profile'] =  Str::replace('assets/images/profile/','',$request->profile->store('profile'));
        // if($request->hasFile('image')){
        //     $request->profile->move(public_path('assets/images/profile/'),time().'.'. $request->profile->getClientOriginalExtension());
        // }else{
        //     $path='';
        // }
        // $validatedData['sampul'] =  Str::replace('assets/images/sampul/','',$request->sampul->store('sampul'));
        // if($request->hasFile('image')){
        //     $request->sampul->move(public_path('assets/images/sampul/'),time().'.'. $request->sampul->getClientOriginalExtension());
        // }else{
        //     $path='';
        // }


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
        return redirect("dashboard/profile/$username/edit")->with('message','Sukses Update Data');
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
