@extends('layouts.app')

@section('content')
    <div class="container">
    <section class="hero">
            <article class="hero d-flex pt-5 pb-5 container tentang-section">
                <div class="tentang-image mr-5">
                    <img src="../images/logo zula.jpeg" width="80%" alt="gambar hero">
                </div>
                <div class="hero-content align-self-center" style="width: 80%; margin-left:3rem;">
                    <h1 class="mt-4">Tentang Zulla Cell</h1>
                    <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit quaerat obcaecati saepe ut magnam recusandae, voluptatibus necessitatibus fuga, distinctio inventore repellendus ipsum in autem similique pariatur vel perferendis iure animi!</p>
                </div>
            </article>
        </section>
        <section class="container">
            <article class="team pt-5 pb-5 d-flex">
                <div class="team-content align-self-center mr-3" style="width: 50%;">
                    <h2 class="mb-2">Team Kami</h2>
                    <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum dicta nesciunt aperiam deserunt excepturi explicabo iste numquam qui, dolorum incidunt repellat, optio maxime delectus, sunt provident porro mollitia doloremque voluptates.</p>
                </div>
                <div class="team-kami d-flex">
                    <div class="card figo" style="width: 16rem; margin-right: 30px;">
                        <img src="../images/rohman.jpeg" width="70%" style="margin: auto; padding-top: 45px; height:300px" alt="Card image cap">
                        <div class="card-body text-center">
                            <h3>Nurohman Wijianto</h3>
                            <p class="card-text">Developer</p>
                        </div>
                        <div class="icons d-flex justify-content-center pb-5">
                            <a href="https://www.linkedin.com/in/ariyadi/"><i data-feather="linkedin" class="me-3"></i></a>
                            <a href="https://github.com/Nurohman25"><i data-feather="github" class="me-3"></i></a>
                            <a href="https://www.instagram.com/nu_rohman_wy/"><i data-feather="instagram" class="me-3"></i></a>
                        </div>
                    </div>
                    <div class="card figo" style="width: 16rem; margin-right: 30px;">
                        <img src="../images/arif.jpeg" width="70%" style="margin: auto; padding-top: 45px; height:300px" alt="Card image cap">
                        <div class="card-body text-center">
                            <h3>Arief Muhammad</h3>
                            <p class="card-text">Developer</p>
                        </div>
                        <div class="icons d-flex justify-content-center pb-5">
                        <a href="https://www.linkedin.com/in/ariyadi/"><i data-feather="linkedin" class="me-3"></i></a>
                            <a href="https://github.com/AriefMuhammadNatsir"><i data-feather="github" class="me-3"></i></a>
                            <a href="https://www.instagram.com/ariyadi/"><i data-feather="instagram" class="me-3"></i></a>
                        </div>
                    </div>
                    <div class="card raja" style="width: 16rem;">
                        <img src="../images/ariyadi.jpg" width="70%" style="margin: auto; padding-top: 45px; height:300px" alt="Card image cap">
                        <div class="card-body text-center">
                            <h3>Ariyadi Dwi Saputra</h3>
                            <p class="card-text">UI Designer | Developer</p>
                        </div>
                        <div class="icons d-flex justify-content-center pb-5">
                        <a href="https://www.linkedin.com/in/ariyadi/"><i data-feather="linkedin" class="me-3"></i></a>
                            <a href="https://github.com/asepyadi1212"><i data-feather="github" class="me-3"></i></a>
                            <a href="https://www.instagram.com/ariyadidwisaputra/"><i data-feather="instagram" class="me-3"></i></a>
                        </div>
                    </div>
                </div>                
            </article>
        </section>
        <section class="kriteria pb-5 pt-5">
            <article class=" container kriteria background-tertarik d-flex">
                <div class="tertarik-image align-self-end ml-5">
                    <img src="{{asset('/images/tertarik.png')}}" width="80%" alt="">
                </div>
                <div class="tertarik-content align-self-center" style="margin-left:3rem; padding-left:3rem;">
                    <div class="upper pb-3">
                        <h2 style="line-height: 0; color:#063726 !important;">Tertarik mendaftar Di Zulla Cell ?</h2>
                        <p style="line-height: 0;">Daftar dan ikuti semua langkahnya :)</p>
                    </div>
                    <a href="{{ route('admin.account.index') }}"><button type="button" class="primary-btn-green">Daftar Sekarang</button></a>
                </div>
            </article>
        </section>
    </div>
@endsection

