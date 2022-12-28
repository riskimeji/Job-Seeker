<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\User;
use App\Models\JenjangPendidikan;
use App\Models\JurusanPendidikan;
use App\Models\JenjangKarir;
use App\Models\Lamaran;
use App\Models\MinimalPengalaman;
use App\Models\Category;
use App\Models\BioCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use Illuminate\Support\Facades\DB;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.lowongan.lowongan',[
            'lowongans' =>  Lowongan::latest()->paginate(2),
            'datas' =>Lowongan::count(),
        ]);
    }
    public function search(Request $request){
        if($request->search){
            $searchLowongans = Lowongan::where('title','LIKE','%'.$request->search.'%')->latest()->paginate(15);
            return view('admins.lowongan.search', compact('searchLowongans'));
        }elseif ($request->search == null) {
            return redirect('dashboard/lowongan');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $provinces = Province::pluck('name', 'id');
        return view('admins.lowongan.create',[
            'users' => User::all(),
            'provinces' => Province::all(),
            'jenjangpendidikans' => JenjangPendidikan::all(),
            'jurusanpendidikans' => JurusanPendidikan::all(),
            'categorys' => Category::all(),
            'jenjangkarirs' => JenjangKarir::all(),
            'minimalpengalamans' => MinimalPengalaman::all(),
            'provinces' => $provinces,
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
            'category_id'=>'required',
            'jenjang_pendidikan_id'=>'required',
            'jurusan_pendidikan_id'=>'required',
            'jenjang_karir_id'=>'required',
            'minimal_pengalaman_id'=>'required',
            'title'=>'required|max:30',
            'est_gaji'=>'required',
            'fungsi_kerja'=>'max:50',
            'persyaratan'=>'required',
            'tanggung_jawab'=>'required',
            'google_map'=>'required',
            'alamat'=>'required',
            'status'=>'required',
            'media' =>'required|image|mimes:jpeg,png,jpg,png,svg|max:2048'
        ]);
        $title = $validatedData['title'];
        $validatedData['slug'] = Str::slug($title,'-');
        $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['image'] =  Str::replace('uploads/','',$request->file('image')->store('uploads'));
        //         if($request->hasFile('image')){
        //             $request->file('image')->move(public_path('uploads/'), $request->file('image')->getClientOriginalName());
        //         }else{
        //             $path='';
        //         }

                if($request->file('media')){
                    $mediaName = time().$request->file('media')->getClientOriginalName();
                    $pathMedia = $request->file('media')->storeAs('media', $mediaName, 'public');
                    $validatedData['media'] =  '/storage/'.$pathMedia;
                }else{
                    $path='';
                }
        Lowongan::create($validatedData);
        return redirect('dashboard/lowongan')->with('message','Sukses mengisi data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function show(Lowongan $lowongan)
    {

        $test = Lamaran::where('user_id',$lowongan->id);
        $filters = json_decode($test->get('user_id'));;
        if(Auth::guest()){
            return view('detaillowongan', [
                'lowongan' => $lowongan
            ]);
        }else{
            // $datas = Lamaran::where('user_id', auth()->user()->id);
            // $filter = json_decode($datas->get('user_id'));
            $datas = Lamaran::where([['user_id','=',Auth::user()->id],['lowongan_id','!=',$lowongan->id]])->get();
            return view('detaillowongan', [
                'lowongan' => $lowongan,
                'lamaran' => $datas
                ]);
        }
        // return view('detaillowongan', compact('lowongan'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function edit(Lowongan $lowongan)
    {
        return view('admins.lowongan.edit',[
            'lowongans' => Lowongan::find($lowongan->id),
            'users' => User::all(),
            'provinces' => Province::all(),
            'jenjangpendidikans' => JenjangPendidikan::all(),
            'jurusanpendidikans' => JurusanPendidikan::all(),
            'categorys' => Category::all(),
            'jenjangkarirs' => JenjangKarir::all(),
            'minimalpengalamans' => MinimalPengalaman::all(),
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lowongan $lowongan)
    {
        $validatedData = $request->validate([
            'category_id'=>'required',
            'jenjang_pendidikan_id'=>'required',
            'jurusan_pendidikan_id'=>'required',
            'jenjang_karir_id'=>'required',
            'minimal_pengalaman_id'=>'required',
            'title'=>'required|max:30',
            'est_gaji'=>'required',
            'fungsi_kerja'=>'max:50',
            'persyaratan'=>'required',
            'tanggung_jawab'=>'required',
            'google_map'=>'required',
            'alamat'=>'required',
            'status'=>'required',
            'media' =>'image|mimes:jpeg,png,jpg,png,svg|max:2048'
        ]);
        $title = $validatedData['title'];
        $validatedData['slug'] = Str::slug($title,'-');
        $validatedData['user_id'] = auth()->user()->id;

                if($request->file('media')){
                    $mediaName = time().$request->file('media')->getClientOriginalName();
                    $pathMedia = $request->file('media')->storeAs('media', $mediaName, 'public');
                    $validatedData['media'] =  '/storage/'.$pathMedia;
                }else{
                    $validatedData['media'] = $lowongan->media;
                }
        Lowongan::where('id',$lowongan->id)->update($validatedData);
        return redirect('dashboard/lowongan')->with('message','Success Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lowongan $lowongan)
    {
        Lowongan::destroy($lowongan->id);
        return redirect('/dashboard/lowongan')->with('message','Success Delete Data');
    }
    public function createLamaran(Request $request, $id){
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['status'] = "PENDING";
        $validatedData['lowongan_id'] = Lowongan::find($id);
        Lamaran::create($validatedData);
        return redirect('/dashboard/admin')->with('message','Sukses mengisi data');
    }
}
