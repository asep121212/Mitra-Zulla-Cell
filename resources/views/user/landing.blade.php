@extends('layouts.app')

@section('content')

            
    <section class="container" style="background-color:auqa">
            <article class="why-donor pt-5 pb-5 d-flex flex-column">
                <h1 class="mb-5 text-center">Mengapa Harus Zulla Cell ?</h1>
                <div class="why d-flex mb-5">
                    <div class="why-image">
                        <img src="../images/logo zula.jpeg" width="90%" alt="gambar orang bertanya">
                    </div>
                    <div class="why-content align-self-center ml-3" style="width: 100%;">
                        <p style="font-size: 18px;">
                       dengan membeli barang di konter zula cell tentu bisa memiliki keuntungan-keuntungan, seperti:
                    <ol type="1">
                        <li>Tempat terdekat untuk membeli barang</li>
                        <li>Keterjangkauan harga barang yang bisa di diskon</li>
                        <li>Kemudahan dalam pengambilan barang atau pembelian langsung tanpa harus memesan secara online</li>
                        <li>Bisa melihat dan memegang barang sebelum membelinya, sehingga bisa memastikan barang yang kita beli sesuai dengan keinginan dan harapan kita.
                    </ol>



                    </p>
                        <p style="font-size: 18px;">
                        membeli barang secara offline secara langsung dan datang ke outlet akan lebih pasti karena kita bisa melihat produk barang yang akan dibeli dan bergaransi.
                        </p>
                    </div>
                </div>
                <div class="button align-self-center">
                    <a href="{{ route('admin.account.index') }}"><button type="button" class="primary-btn">Daftar Sekarang</button></a>
                </div>
            </article>
        </section>
        <section id="faq" class="faq">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
        <h1 class="mb-5 text-center">Kriteria Pembelian Di Zulla Cell ?</h1>
     
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


@section('script')
<script type="text/javascript" src="{{ asset('app-assets/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('app-assets/js/dataTables.bootstrap5.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
    var counter = 1;
    setInterval(function() {
        document.getElementById('radio' + counter).checked = true;
        counter++;
        if(counter > 4){
            counter = 1;
        }
    }, 5000);
  
        function dotslide(n){
            showSlide(slideIndex = n);
        }

        function showSlide(n) {
            var i;
            var slides = document.getElementsByClassName("imgslide");
            var dot = document.getElementsByClassName("dot");
            
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length;
            }
            for (i = 0; i < slides.length; i++) {
                
                slides[i].style.display = "none";
            }

            for (i = 0; i < slides.length; i++) {
                
                dot[i].className = dot[i].className.replace(" active", "");
            }

            slides[slideIndex - 1].style.display = "block";

            dot[slideIndex - 1].className += " active";
            


        }
    // preview gambar
    function previewImg() {
        const foto = document.querySelector('#preview_gambar');
        // const fotoLabel = document.querySelector('.fotoLabel');
        const fotoLoad = document.querySelector('#gambar_load');

        // fotoLabel.textContent = foto.files[0].name;

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function (e) {
            fotoLoad.src = e.target.result;
        }
    }

    // Automation show picture

    // preview gambar edit
   
</script>
@endsection


