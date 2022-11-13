<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BioEmployee;
use App\Models\JenjangPendidikan;
use App\Models\JurusanPendidikan;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
    //    dd($test);
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('members.update.account',[
            'users' => User::find($user->id),
            'user' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:user_employees,email,except,id',
            'phone_number' => 'required|min:12|max:13|unique:user_employees,phone_number,except,id',
            'gender' => 'required|in:P,L',
            'date_birth' => 'required',
            // 'password'=>'min:6|required_with:password_confirmation|same:password_confirmation',
            // 'password_confirmation'=>'min:6'
        ]);
        // $validatedData['password'] =  Hash::make($request->password);
        // $validatedData['password_confirmation'] = Hash::make($request->password);
        // $validatedData['role'] = 'EMPLOYEE';
        User::where('id',auth()->user()->id)->update($validatedData);
        // dd($test);
        return redirect('dashboard/profile')->with('message','Sukses Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
