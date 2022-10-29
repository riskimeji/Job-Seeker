@extends('layouts.main')
@section('container')
    <div style="margin-top:120px;"></div>
    <div class="mt-5">
        <div style="  height:480px;">
            <div class="text-center" name="title" style="color: #3d42a4; padding-top: 50px;">
                <h1 style="font-weight: bold;">Contact Us</h1>
            </div>
            <div class="row mt-5 ms-5 me-5">
                <div class="col">
                    <div class="text-center" style="color:#3d42a4; letter-spacing: 1px;">
                        <i class="fas fa-inbox fa-4x"></i>
                        <h3 style="font-weight: bold;" class="mt-2">Email</h3>
                        <label class="mt-2">jobsekker@job.com</label><br>

                    </div>
                </div>
                <div class="col">
                    <div class="text-center" style="color:#3d42a4; letter-spacing: 1px;">
                        <i class="fas fa-globe-africa fa-4x"></i>
                        <h3 style="font-weight: bold;" class="mt-2">Address</h3>
                        <label class="mt-2">Jl. Durian Tarung no 52</label><br>
                        <label> Padang</label><br>
                        <label> Kuranji</label><br>
                        <label> 25152</label><br>
                        <label> Sumatera Barat</label>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center" style="color:#3d42a4; letter-spacing: 1px;">
                        <i class="fas fa-phone-square-alt fa-4x"></i>
                        <h3 style="font-weight: bold;" class="mt-2">Phone</h3>
                        <label class="mt-2">+62 85363779773</label><br>
                        {{-- <label>Kota Padang</label><br>
                    <label>Kecamatan Kuranji</label><br>
                    <label>Kode Post 25152</label><br>
                    <label>Provinsi Sumatera Barat</label> --}}
                    </div>
                </div>

            </div>

        </div>
        {{-- <div class="" style="background: blue; width:350px; height:200px; border-radius: 30px;">
        <div class="cardind" style="border-radius: 30px;">
            <img src="{{ asset('img/key.png') }}" class="img-fluid" weight="100%" style="border-radius: 30px;">
        </div>
        <h6 style="color: white; font-weight: bold;" class="">TEKNOLOGI INFORMASI</h6>
    </div> --}}
        {{-- <div class="row flex">
        <div class="border test" style="width:400px; height:50px;">
            <div class="">
                <label for="" class="ms-3"
                    style="font-weight: bold; margin-top:13px; color:rgb(85, 79, 79);"><i
                        class="fas fa-calculator me-2"></i>Perdagangan Umum</label><label for=""
                    style="color: rgb(189, 180, 180)" class="ms-2">(25 Lowongan)</label>
            </div>
        </div>
        <div class="border test" style="width:400px; height:50px;">
            <div>
                <label for="" class="ms-3"
                    style="font-weight: bold; margin-top:13px; color:rgb(85, 79, 79);"><i
                        class="fas fa-calculator me-2"></i>Perdagangan Umum</label><label for=""
                    style="color: rgb(189, 180, 180)" class="ms-2">(25 Lowongan)</label>
            </div>
        </div>
        <div class="border test" style="width:400px; height:50px;">
            <div>
                <label for="" class="ms-3"
                    style="font-weight: bold; margin-top:13px; color:rgb(85, 79, 79);"><i
                        class="fas fa-calculator me-2"></i>Perdagangan Umum</label><label for=""
                    style="color: rgb(189, 180, 180)" class="ms-2">(25 Lowongan)</label>
            </div>
        </div>
        <div class="col flex">
            <div class="border test" style="width:400px; height:50px;">
                <div>
                    <label for="" class="ms-3"
                        style="font-weight: bold; margin-top:13px; color:rgb(85, 79, 79);"><i
                            class="fas fa-calculator me-2"></i>Perdagangan Umum</label><label for=""
                        style="color: rgb(189, 180, 180)" class="ms-2">(25 Lowongan)</label>
                </div>
            </div>
            <div class="border test" style="width:400px; height:50px;">
                <div>
                    <label for="" class="ms-3"
                        style="font-weight: bold; margin-top:13px; color:rgb(85, 79, 79);"><i
                            class="fas fa-calculator me-2"></i>Perdagangan Umum</label><label for=""
                        style="color: rgb(189, 180, 180)" class="ms-2">(25 Lowongan)</label>
                </div>
            </div>
            <div class="border test" style="width:400px; height:50px;">
                <div>
                    <label for="" class="ms-3"
                        style="font-weight: bold; margin-top:13px; color:rgb(85, 79, 79);"><i
                            class="fas fa-calculator me-2"></i>Perdagangan Umum</label><label for=""
                        style="color: rgb(189, 180, 180)" class="ms-2">(25 Lowongan)</label>
                </div>
            </div>

        </div>
    </div> --}}
    </div>
@endsection
