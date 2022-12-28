@extends('layouts_two.main')
@section('title')
    @lang('Profile')
@endsection
@section('container')
    <div class="" style="margin-top: 65px;">
        <div class="">
            <div class="album">
                <img src="https://blogpictures.99.co/film-anime-terbaik.png" alt="album" width="100%" height="400px"
                    style="position: absolute; padding: 40px;">
            </div>
            <div class="mb-2" style="padding-top: 250px; padding-left: 43%;">
                <img src="https://blogpictures.99.co/film-anime-terbaik.png" alt="profile" class="rounded-circle"
                    width="200px" height="200px"
                    style="border-width: 3px; border-color: gray; border-style: solid; position: relative;">

            </div>
            <div class="text-center">
                <h3 class="ms-2">PT. Gojek Indonesia</h3>
                <p><i class="fas fa-map-marker-alt"></i>&nbsp;Sumatera Barat&nbsp;&nbsp;<i
                        class="fas fa-building"></i>&nbsp;Kontruksu&nbsp;&nbsp;<i
                        class="fas fa-calendar-alt"></i>&nbsp;Senin -
                    Jumat&nbsp;&nbsp;<i class="fas fa-clock"></i>&nbsp;&nbsp;16 PM - 20 PM&nbsp;
                </p>
                <p>Tinggal di Jl Durian Tarung no 26, Kota Padang, Kec Kuranji, Provinsi Sumatera Barat </p>
            </div>
        </div>
    </div>
    <div class="container">
        <h4>Tentang Perusahaan</h4>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit laborum nisi, tempora delectus
            porro, quidem illo
            officia eos blanditiis accusantium, vero dignissimos sed harum molestias sapiente minima iste? At natus officia
            doloribus assumenda ipsam minima deserunt accusantium eum architecto repellendus vero eaque ab, consectetur
            commodi laborum, doloremque voluptatum, quo temporibus possimus odio mollitia eveniet. Obcaecati, nobis alias
            aut aliquam, facere eos, quis necessitatibus explicabo reiciendis ad repellendus cupiditate? A iste qui tenetur
            voluptatum consequatur quae, culpa voluptas numquam amet est labore ea impedit obcaecati consequuntur excepturi
            ratione illum ex autem commodi repudiandae, quo reiciendis alias perferendis! Ex, minus officiis reiciendis
            tempore earum quas? Iure laborum nulla, deserunt saepe laudantium possimus voluptates nihil laboriosam nostrum
            est totam temporibus beatae facere illo veniam. Quidem pariatur atque quos, nulla maiores accusamus
            necessitatibus quibusdam! Earum necessitatibus debitis illo aliquid maiores qui numquam cupiditate atque, harum
            quo velit ipsa eos soluta odio nam dolores dolor enim, totam cumque nostrum nesciunt ipsum doloribus dolore!
            Odit nostrum quidem neque reprehenderit aspernatur beatae nihil iusto facilis. Pariatur, officiis numquam velit
            ad debitis quaerat ratione omnis assumenda. Ducimus facere officiis nesciunt praesentium rerum dignissimos
            officia, assumenda saepe, nobis odio qui suscipit. Maxime dolor, libero vero nisi consequuntur laborum debitis
            nulla facere. Quod omnis reprehenderit nesciunt, sed saepe iste quisquam, possimus unde dolorum nisi accusantium
            quibusdam amet totam beatae mollitia veniam et eos ex distinctio illo aut ea doloremque veritatis. Non, a.
            Inventore quibusdam modi illo eos! Mollitia vitae, ea eveniet in molestias enim perferendis repudiandae corporis
            porro doloribus harum. Soluta libero facilis exercitationem harum molestias aspernatur sapiente porro officia
            consequuntur itaque rerum consectetur, laborum repellendus excepturi suscipit eius sit odio! Odio neque impedit
            maiores omnis voluptatibus dignissimos quod earum soluta sequi expedita error commodi optio maxime cum beatae
            eligendi ipsam dolor doloribus atque, possimus quae! Cum nisi sunt quos.</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-header text-center">
                        Pendidikan Terakhir
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Politeknik Negeri Padang</li>
                        <li class="list-group-item">Teknologi Informasi</li>
                        <li class="list-group-item">2020 - 2024</li>
                        <li class="list-group-item">IPK 4.0</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-header text-center">
                        Biodata
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">riskimeji6@gmail.com</li>
                        <li class="list-group-item">18-01-2003</li>
                        <li class="list-group-item">085363779773</li>
                        <li class="list-group-item">Laki-Laki</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-header text-center">
                        Pengalaman Kerja
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Polsek Kuranji</li>
                        <li class="list-group-item">Admin</li>
                        <li class="list-group-item">2023 - 2024</li>
                        <li class="list-group-item">Pariwisata</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h4 class="mt-3">Lowongan Pekerjaan di Perusahaan ini</h4>
        <hr>
        <section data-aos="fade-up">
            <div class="row gap-4 justify-content-center" style="margin-right: 0px; margin-left:0px;">
                {{-- @foreach ($lowongans as $lowongan) --}}
                <div class="box lokercard">
                    <div name="logo" class="flex mt-2">
                        <a href="/detail/">
                            <img src="" style="width:100px; height:100px;" alt="logo_perusahaan"></a>
                    </div>
                    <hr>
                    <div class="ms-3">
                        <a href="/user/">
                            <label for="" class="mt-1" style="color:grey">
                            </label><br>
                        </a>
                        <a href="/detail/">
                            <label for="" class="" style="font-size:18px; font-weight: bold; color:#3D42A4;">
                            </label><br></a>
                        <label for="" class="mt-2"><i class="fas fa-map-marker-alt me-1"></i>
                        </label>
                        <label for="" class="mt-3" style="color:red; font-weight: bold; font-size: 15px;">
                        </label>
                    </div>
                    {{-- <div class="text-center mt-3">
                            <a href="/detail/{{ $lowongan->slug }}" class="btn btn-free">Details</a>
                        </div> --}}
                </div>
                {{-- @endforeach --}}
            </div>
        </section>
    </div>
@endsection
@section('script')
    {{-- <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script> --}}
    <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/profile.init.js') }}"></script>
@endsection
