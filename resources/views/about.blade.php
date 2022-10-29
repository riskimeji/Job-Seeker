@extends('layouts.main')
@section('container')
    {{-- <div class="" style="margin-top:140px;">
        <div class="imgBox" style="margin-left: 150px;">
            <img src="{{ asset('img/job.jpg') }}" alt="">
        </div>
        <div class="textBox">
            <h3>JOB SEKKER - ABOUT</h3><br>
            <label for="">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat quos earum qui quaerat delectus reiciendis,
                quibusdam numquam unde veniam, dolorem omnis commodi recusandae voluptate esse deleniti aliquid temporibus
                eos error fuga dolorum? Pariatur ab sapiente ea officia inventore nesciunt tempora ullam vitae porro debitis
                optio non asperiores blanditiis deleniti aliquam, quaerat praesentium nobis quibusdam saepe possimus magni
                atque impedit error quidem! Mollitia dolorem suscipit quaerat provident nam amet molestiae similique
                consequuntur repudiandae! Magni assumenda inventore quis reiciendis, cupiditate corporis, quasi veritatis
                praesentium, illo fugit atque voluptas hi.
        </div>
    </div> --}}
    {{-- Test --}}
    <div style="margin-top: 140px;" class="">
        <div class="card mb-3" style="max-width: 100%; background: #f5f5f5; border-color: #f5f5f5;">
            <div class="row g-0">
                <div class="col-md-4 ms-2">
                    <img src="{{ asset('img/job.jpg') }}" class="img-fluid rounded-start" style="width:900px" alt="...">
                </div>
                <div class="col-md-8 col-lg-7   ">
                    <div class="card-body">
                        <h3 class="card-title text-center">About Us</h3>
                        <label class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem
                            eos
                            odio unde id labore molestias, eligendi ipsam sequi qui. Minus sed eos, velit in fugit
                            distinctio voluptatum dolorem eum officiis!
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugiat ut, corporis praesentium ipsam
                            consectetur tenetur doloribus quae, alias tempore dicta sit maxime consequatur illo sequi atque
                            vero aliquam recusandae eius?</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
