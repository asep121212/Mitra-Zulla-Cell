@extends('layouts.app')

@section('content')
    <div class="container"> 
    <div class="container-xll">
        <div class="body">
                <div class="slider">
                    <div class="slides">
                            <input type="radio" name="radio-btn" id="radio1">
                            <input type="radio" name="radio-btn" id="radio2">
                            <input type="radio" name="radio-btn" id="radio3">
                            <input type="radio" name="radio-btn" id="radio4">

                        <div class="slide first">
                            <img src="../images/thrif.jpg" alt="">     
                        </div>
                        <div class="slide">
                            <img src="../images/thrif.jpg" alt="">
                        </div>
                        <div class="slide">
                            <img src="../images/thrif.jpg" alt="">
                        </div>
                        <div class="slide">
                            <img src="../images/thrif.jpg" alt="">
                        </div>
                    </div>

                    <div class="navigation-auto">
                        <div class="auto-btn1"></div>
                        <div class="auto-btn2"></div>
                        <div class="auto-btn3"></div>
                        <div class="auto-btn4"></div>
                    </div>

                    <div class="navigation-manual">
                        <label for="radio1" class="manual-btn"></label>
                        <label for="radio2" class="manual-btn"></label>
                        <label for="radio3" class="manual-btn"></label>
                        <label for="radio4" class="manual-btn"></label>
                    </div>
                </div>
            </div>
    <section class="container">
            <article class="why-donor pt-5 pb-5 d-flex flex-column">
                <h1 class="mb-5 text-center">Mengapa Harus Zulla Cell ?</h1>
                <div class="why d-flex mb-5">
                    <div class="why-image">
                        <img src="../images/thrif.jpg" width="100%" alt="gambar orang bertanya">
                    </div>
                    <div class="why-content align-self-center ml-3" style="width: 60%;">
                        <p style="font-size: 18px;">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit at magnam in libero distinctio pariatur laudantium culpa asperiores, placeat obcaecati, sint architecto tempore officiis dolores repellat accusantium ipsa animi nulla.
                    </p>
                        <p style="font-size: 18px;">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque deserunt provident sit rem dolore, perferendis est aliquid quasi magni explicabo odio, cum dolorem eius ut dolores facilis consequuntur similique vitae!
                        </p>
                    </div>
                </div>
                <div class="button align-self-center">
                    <a href=""><button type="button" class="primary-btn">Daftar Sekarang</button></a>
                </div>
            </article>
        </section>
        <section id="faq" class="faq">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
        <h1 class="mb-5 text-center">Kriteria Pendaftaran Mitra Di Zulla Cell ?</h1>
     
        </header>
        <div class="row">
            <div class="col-lg-6">
                <!-- F.A.Q List 1-->
                <div class="accordion accordion-flush" id="faqlist1">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                                Non consectetur a erat nam at lectus urna duis?
                            </button>
                        </h2>
                         <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                            <div class="accordion-body">
                                Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                             </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                            Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?
                            </button>
                        </h2>
                        <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                            <div class="accordion-body">
                            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?
                    </button>
                </h2>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                    <div class="accordion-body">
                        Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <!-- F.A.Q List 2-->
        <div class="accordion accordion-flush" id="faqlist2">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-1">
                    Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?
                    </button>
                </h2>
                <div id="faq2-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                    <div class="accordion-body">
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </div>
            </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-2">
              Tempus quam pellentesque nec nam aliquam sem et tortor consequat?
            </button>
          </h2>
        <div id="faq2-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
            <div class="accordion-body">
              Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
    </div>
    </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-3">
              Varius vel pharetra vel turpis nunc eget lorem dolor?
            </button>
          </h2>
          <div id="faq2-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
            <div class="accordion-body">
              Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
     
@endsection
