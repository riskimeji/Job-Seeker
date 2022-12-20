<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Models\Lowongan;
use App\Models\Category;
use App\Models\Lamaran;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function login(){
        return view('signin.index');
    }
    public function lowongan(){
        return view('index',[
            'lowongans'=>Lowongan::latest()->limit(8)->get(),
            'categorys' => Category::all()
        ]);
    }
    public function search(Request $request){
        if($request->search){
            $searchLowongans = Lowongan::where('title','LIKE','%'.$request->search.'%')->latest()->paginate(15);
            return view('carilowngan', compact('searchLowongans'));
        }elseif ($request->search == null) {
            return redirect('cari');
        }
    }
    public function pagelowongan(){
        return view('lowongan',[
            'lowongans' => Lowongan::latest()->paginate(3)
        ]);
    }
    public function ajukan(Lowongan $lowongan){
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['status'] = "PENDING";
        $validatedData['lowongan_id'] = $lowongan->id;
        // @dump($lowongan);
        Lamaran::create($validatedData);
        return redirect('/dashboard/admin')->with('message','Sukses mengisi data');
    }
    public function detail(Lowongan $lowongan){
        return view('admins.lowongan.show', compact('lowongan'));
    }
}
