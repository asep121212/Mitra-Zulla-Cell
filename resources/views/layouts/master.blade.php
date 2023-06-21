@php
    $set = \App\Models\Setting::first();
    $user = \App\Models\User::first();
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon"
        href="{{ $set->logo == null ? asset('app-assets/icon/store.png') : asset('storage/setting_images') . $set->logo }}">
    <title>{{ $set->name }}</title>

    <!-- Site Icons -->

    <link rel="apple-touch-icon" href="{{ asset('vendor/app/images/apple-touch-icon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/app/css/bootstrap.min.css') }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/app/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/app/css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/app/css/custom.css') }}">
    <link href="{{ asset('app-assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/css/responsive.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900"
        rel="stylesheet">

    <!-- Scripts -->
    <link href="{{ asset('app-assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script type="text/javascript" src="{{ asset('app-assets/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app-assets/js/bootstrap2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app-assets/js/feather.min.js') }}"></script>
  
    
</head>

<body>
    <div id="app" >
        <nav class="navbar navbar-expand-lg sticky-top" style="min-height: 76px; background-color: #ABAC84;">
            <div class="container">
                @if ($set->logo !== null)
                    <a class="navbar-brand fw-bold" href="/">
                        <img src="{{ asset('storage/setting_images') . $set->logo }}" class="img-logo"
                            alt="{{ $set->name }}">Zulla Cell
                      
                    </a>
                    @else
              <a class="navbar-brand fw-bold" href="/">Zulla Cell</a>
                @endif


            
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <i data-feather="menu" width="15"></i>
                </button>
                <div class="collapse navbar-collapse w-100" id="navbarText">
                    <ul class="navbar-nav ms-md-auto mb-2 mb-lg-0 ">
                        <li class="nav-item">
                            <a class="nav-link text-black" href="/home">Zulla Cell</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="/contat">Contact</a>
                        </li>
                        <li class="nav-item dropdown text-black"><a class="dropdown-toggle nav-link text-black" data-toggle="dropdown" aria-expanded="false" href="#" >Product</a>
                            <div class="dropdown-menu " role="menu"><a class="dropdown-item  text-black"  href="/pulsa">Pulsa</a><a class="dropdown-item  text-black" href="/voucher">Voucher</a><a class="dropdown-item  text-black" href="/handphone">Handhpone</a><a class="dropdown-item  text-black" href="/aksesoris">Aksesoris</a></div>
                        </li>
                        @if(auth()->user())
                        <li class="nav-item">
                            <a class="nav-link text-black" href="/cart">
                                <i data-feather="shopping-cart" width="15"></i>
                            </a>
                        </li>
                        @endif
                       <!-- Start Atribute Navigation -->
               
                
                        <li class="nav-item dropdown text-black">
                            <a href="#" class="dropdown-toggle nav-link text-black" data-toggle="dropdown"><i data-feather="user" width="15"></i></a>
                            <ul class="dropdown-menu" style="margin-right: 0 auto; margin-left:50%; padding-left: 50%;">
                                
                            @guest
                          
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                      
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @else
                                @if(auth()->user()->is_admin == 1)
                           
                                    <a class="dropdown-item  text-black" href="{{ route('admin.account.index') }}">{{ __('Admin Panel') }}</a>
                      
                                @endif
                            
                                    <a class="dropdown-item  text-black" href="{{ url('account') }}">{{ __('My Account') }}</a>
                       
                           
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
    </div>
                        
                          
                        </li>
                        @endguest
           
             
                <!-- End Atribute Navigation -->
                </div>
            </div>
        </nav>
       
            
            <main class="col-md-12" style="min-height: 100vh">
                    @yield('content')
                </main>
        <footer>
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-4">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <span class="footer-title fs-4 fw-semibold">{{ $set->name }}</span>
                            </li>
                            <li class="nav-item pt-2">
                                <span class="footer-title">{{ $set->keywords . '. ' . $set->description }}</span>
                            </li>
                            <li class="nav-item pt-2">
                                <span class="footer-title">{{ 'Alamat ' . $set->address }}</span>
                            </li>
                            <li class="nav-item pt-2">
                                <span class="footer-title">{{ 'Buka ' . $set->service_time }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 pt-3 pt-md-0 ps-0 ps-md-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <span class="footer-title ps-3">Company</span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/landing">Zulla Cell</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/cart">Keranjang</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 pt-3 pt-md-0 ps-0 ps-md-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <span class="footer-title ps-3">Contact</span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"><i data-feather="phone" class="me-3"></i>{{ $set->phone }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"><i data-feather="mail" class="me-3"></i>{{ $user->email }}</a>
                            </li>
                    </div>
                </div>

                <div class="text-center text-white py-4"><i data-feather="more-horizontal"></i></div>

                <div class="row justify-content-between">
                    <div class="col-md-6">
                        <span class="copyright quick-links">Copyright &copy; {{ $set->name }}
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                        </span>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                          <img src="../images/teknokrat.png" alt="logo dicoding" class="img-footer rounded me-3"> 
                     
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('app-assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/notify-script.js') }}"></script>
    <script src="{{ asset('app-assets/js/helper.js') }}"></script>
    <script src="{{ asset('app-assets/js/sweet-alert/sweetalert2@11.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @include('layouts.includes.notify')

    <script>
        feather.replace()

        function addToCart(data) {
            let dataOrder = localStorage.getItem('data_order')
            let dataProducts = localStorage.getItem('data_products')

            console.log(data)

            const products = []
            if (dataProducts == null) {
                products.push({
                    id: data.id,
                    qty: 1,
                    price: parseInt(data.price),
                    total_price: 1 * parseInt(data.price),
                    name: data.name,
                    real_data: data,
                })
                const order = {
                    total_product: products.length,
                    total_price: 1 * parseInt(data.price)
                }
                localStorage.setItem('data_products', JSON.stringify(products))
                localStorage.setItem('data_order', JSON.stringify(order))
            } else {
                dataProducts = JSON.parse(dataProducts)
                dataOrder = JSON.parse(dataOrder)

                let same = false
                dataProducts.forEach(p => {
                    if (p.id == data.id) {
                        p.qty = p.qty + 1
                        p.total_price = p.qty * p.price
                        same = true
                    }
                });
                if (!same) {
                    dataProducts.push({
                        id: data.id,
                        qty: 1,
                        price: parseInt(data.price),
                        total_price: 1 * parseInt(data.price),
                        name: data.name,
                        real_data: data
                    })
                }

                let grandTotal = 0
                dataProducts.forEach((p) => {
                    grandTotal += p.total_price
                })

                dataOrder.total_product = dataProducts.length
                dataOrder.total_price = grandTotal

                localStorage.setItem('data_products', JSON.stringify(dataProducts))
                localStorage.setItem('data_order', JSON.stringify(dataOrder))
                hitNotifSuccess('Berhasil menambah ke keranjang')
            }
        }
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
        function minCart(id) {
            let dataOrder = localStorage.getItem('data_order')
            let dataProducts = localStorage.getItem('data_products')

            dataProducts = JSON.parse(dataProducts)
            dataOrder = JSON.parse(dataOrder)

            dataProducts.forEach(p => {
                if (p.id == id) {
                    p.qty = p.qty - 1
                    p.total_price = p.qty * p.price
                }
            });

            let grandTotal = 0
            dataProducts.forEach((p) => {
                grandTotal += p.total_price
            })

            dataOrder.total_product = dataProducts.length
            dataOrder.total_price = grandTotal

            localStorage.setItem('data_products', JSON.stringify(dataProducts))
            localStorage.setItem('data_order', JSON.stringify(dataOrder))
        }

        function plusCart(id) {
            let dataOrder = localStorage.getItem('data_order')
            let dataProducts = localStorage.getItem('data_products')

            dataProducts = JSON.parse(dataProducts)
            dataOrder = JSON.parse(dataOrder)

            dataProducts.forEach(p => {
                if (p.id == id) {
                    p.qty = p.qty + 1
                    p.total_price = p.qty * p.price
                }
            });

            let grandTotal = 0
            dataProducts.forEach((p) => {
                grandTotal += p.total_price
            })

            dataOrder.total_product = dataProducts.length
            dataOrder.total_price = grandTotal

            localStorage.setItem('data_products', JSON.stringify(dataProducts))
            localStorage.setItem('data_order', JSON.stringify(dataOrder))
        }

        function removeDataCart(id) {
            let dataOrder = localStorage.getItem('data_order')
            let dataProducts = localStorage.getItem('data_products')

            dataProducts = JSON.parse(dataProducts)
            dataOrder = JSON.parse(dataOrder)

            dataProducts.forEach((d, idx) => {
                if (d.id == id) {
                    dataProducts.splice(idx, 1)
                }
            })

            let grandTotal = 0
            dataProducts.forEach((p) => {
                grandTotal += p.total_price
            })

            dataOrder.total_product = dataProducts.length
            dataOrder.total_price = grandTotal

            localStorage.setItem('data_products', JSON.stringify(dataProducts))
            localStorage.setItem('data_order', JSON.stringify(dataOrder))
        }

        function hitNotifSuccess(msg) {
            $.notify({
                message: msg,
            }, {
                type: 'success',
                allow_dismiss: false,
                newest_on_top: true,
                mouse_over: true,
                showProgressbar: false,
                spacing: 10,
                timer: 1000,
                placement: {
                    from: 'top',
                    align: 'center'
                },
                offset: {
                    x: 30,
                    y: 30
                },
                delay: 1000,
                z_index: 10000,
                animate: {
                    enter: 'animated flash',
                    exit: 'animated swing'
                }
            });
        }

        function hitNotifError(msg) {
            $.notify({
                message: msg,
            }, {
                type: 'danger',
                allow_dismiss: false,
                newest_on_top: true,
                mouse_over: true,
                showProgressbar: false,
                spacing: 10,
                timer: 2000,
                placement: {
                    from: 'top',
                    align: 'center'
                },
                offset: {
                    x: 30,
                    y: 30
                },
                delay: 1000,
                z_index: 10000,
                animate: {
                    enter: 'animated flash',
                    exit: 'animated swing'
                }
            });
        }
    </script>

    @yield('script')
</body>

</html>
