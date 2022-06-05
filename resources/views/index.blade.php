    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">

        <title>YPR Cell</title>
    <!--
    SOFTY PINKO
    https://templatemo.com/tm-535-softy-pinko
    -->

        <!-- Additional CSS Files -->
        <link rel="stylesheet" type="text/css" href="{{asset('index/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('index/assets/css/font-awesome.css')}}">
        <link rel="stylesheet" href="{{asset('index/assets/css/templatemo-softy-pinko.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
        </head>

        <body>

        {{-- <!-- ***** Preloader Start ***** -->
        <div id="preloader">
            <div class="jumper">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <!-- ***** Preloader End ***** --> --}}


        <!-- ***** Header Area Start ***** -->
        <header class="header-area header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="main-nav">
                            <!-- ***** Logo Start ***** -->
                            <a href="#" class="logo">
                                {{-- <img src="assets/images/logo.png" alt="Softy Pinko"/> --}}
                                <h3>YPR Cell</h3>
                            </a>
                            <!-- ***** Logo End ***** -->
                            <!-- ***** Menu Start ***** -->
                            <ul class="nav">
                                <li><a href="#welcome" class="active">Beranda</a></li>
                                <li><a href="#features">Tentang Kami</a></li>
                                <li><a href="#work-process">Operator</a></li>
                                <li>
                                    @if (Auth::check() == true)
                                    <a href="{{route('dashboard.index')}}">Dashboard</a>
                                    @else
                                    <a href="#contact-us" data-bs-toggle="modal" data-bs-target="#exampleModal">Login</a>
                                    @endif

                                </li>
                                <li><a href="#contact-us" data-bs-toggle="modal" data-bs-target="#exampleModalRegister" >Register</a></li>
                            </ul>
                            <a class='menu-trigger'>
                                <span>Menu</span>
                            </a>
                            <!-- ***** Menu End ***** -->
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- ***** Header Area End ***** -->

        <!-- ***** Welcome Area Start ***** -->
        <div class="welcome-area" id="welcome">

            <!-- ***** Header Text Start ***** -->
            <div class="header-text">
                <div class="container">
                    <div class="row">
                        <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-sm-12">
                            <h1>Selamat datang di YPR Cell</h1>
                            <p>Silahkan Login terlebih dahulu untuk melakukan pemesanan pulsa</p>
                            <a href="#features" class="main-button-slider">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ***** Header Text End ***** -->
        </div>
        <!-- ***** Welcome Area End ***** -->

        <!-- ***** Features Small Start ***** -->
        {{-- <section class="section home-feature">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <!-- ***** Features Small Item Start ***** -->
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                                <div class="features-small-item">
                                    <div class="icon">
                                        <i><img src="assets/images/featured-item-01.png" alt=""></i>
                                    </div>
                                    <h5 class="features-title">Modern Strategy</h5>
                                    <p>Customize anything in this template to fit your website needs</p>
                                </div>
                            </div>
                            <!-- ***** Features Small Item End ***** -->

                            <!-- ***** Features Small Item Start ***** -->
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.4s">
                                <div class="features-small-item">
                                    <div class="icon">
                                        <i><img src="assets/images/featured-item-01.png" alt=""></i>
                                    </div>
                                    <h5 class="features-title">Best Relationship</h5>
                                    <p>Contact us immediately if you have a question in mind</p>
                                </div>
                            </div>
                            <!-- ***** Features Small Item End ***** -->

                            <!-- ***** Features Small Item Start ***** -->
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s">
                                <div class="features-small-item">
                                    <div class="icon">
                                        <i><img src="assets/images/featured-item-01.png" alt=""></i>
                                    </div>
                                    <h5 class="features-title">Ultimate Marketing</h5>
                                    <p>You just need to tell your friends about our free templates</p>
                                </div>
                            </div>
                            <!-- ***** Features Small Item End ***** -->
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- ***** Features Small End ***** -->

        <!-- ***** Features Big Item Start ***** -->
        <section class="section padding-top-70 padding-bottom-0" id="features">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-sm-12 align-self-center" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                        <img src="assets/images/left-image.png" class="rounded img-fluid d-block mx-auto" alt="App">
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-top-fix">
                        <div class="left-heading">
                            <h2 class="section-title">YPR Cell</h2>
                        </div>
                        <div class="left-text">
                            <p>Kegiatan I</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hr"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Features Big Item End ***** -->

        <!-- ***** Features Big Item Start ***** -->
        <section class="section padding-bottom-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-bottom-fix">
                        <div class="left-heading">
                            <h2 class="section-title">YPR Cell</h2>
                        </div>
                        <div class="left-text">
                            <p>Kegiatan 3</p>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5 col-md-12 col-sm-12 align-self-center mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                        <img src="assets/images/right-image.png" class="rounded img-fluid d-block mx-auto" alt="App">
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Features Big Item End ***** -->

        <!-- ***** Home Parallax Start ***** -->
        <section class="mini" id="work-process">
            <div class="mini-content">
                <div class="container">
                    <div class="row">
                        <div class="offset-lg-3 col-lg-6">
                            <div class="info">
                                <h1>Work Process</h1>
                                <p>Aenean nec tempor metus. Maecenas ligula dolor, commodo in imperdiet interdum, vehicula ut ex. Donec ante diam.</p>
                            </div>
                        </div>
                    </div>

                    <!-- ***** Mini Box Start ***** -->
                    <div class="row">
                        <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                            <a href="#" class="mini-box">
                                <i><img src="assets/images/work-process-item-01.png" alt=""></i>
                                <strong>Get Ideas</strong>
                                <span>Godard pabst prism fam cliche.</span>
                            </a>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                            <a href="#" class="mini-box">
                                <i><img src="assets/images/work-process-item-01.png" alt=""></i>
                                <strong>Sketch Up</strong>
                                <span>Godard pabst prism fam cliche.</span>
                            </a>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                            <a href="#" class="mini-box">
                                <i><img src="assets/images/work-process-item-01.png" alt=""></i>
                                <strong>Discuss</strong>
                                <span>Godard pabst prism fam cliche.</span>
                            </a>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                            <a href="#" class="mini-box">
                                <i><img src="assets/images/work-process-item-01.png" alt=""></i>
                                <strong>Revise</strong>
                                <span>Godard pabst prism fam cliche.</span>
                            </a>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                            <a href="#" class="mini-box">
                                <i><img src="assets/images/work-process-item-01.png" alt=""></i>
                                <strong>Approve</strong>
                                <span>Godard pabst prism fam cliche.</span>
                            </a>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                            <a href="#" class="mini-box">
                                <i><img src="assets/images/work-process-item-01.png" alt=""></i>
                                <strong>Launch</strong>
                                <span>Godard pabst prism fam cliche.</span>
                            </a>
                        </div>
                    </div>
                    <!-- ***** Mini Box End ***** -->
                </div>
            </div>
        </section>
        <!-- ***** Home Parallax End ***** -->
        <!-- ***** Footer Start ***** -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <ul class="social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <p class="copyright">Copyright &copy; 2021 YPR Cell</p>
                    </div>
                </div>
            </div>
        </footer>


            <!-- Modal Login -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" class="my-login-validation" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">E-Mail Address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password
                        </label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required data-eye autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="custom-checkbox custom-control">
                            <input type="checkbox" name="remember" id="remember" class="custom-control-input" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember"  class="custom-control-label">Remember Me</label>
                        </div>
                    </div>
                    <div class="form-group m-0">
                        <button type="submit" class="btn btn-primary btn-block">
                            Login
                        </button>
                        <div class="form-group mt-3">
                            <p class="text-center"><b>Silahkan Register dulu  jika tidak memiliki akun</b>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
        </div>


        {{-- Modal Register --}}
        <div class="modal fade" id="exampleModalRegister" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="my-login-validation" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">E-Mail Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password
                            </label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required data-eye autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">Konfirmasi Password
                            </label>
                            <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group m-0">
                            <button type="submit" class="btn btn-primary btn-block">
                                Daftar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
            </div>

        <!-- jQuery -->
        <script src="{{asset('index/assets/js/jquery-2.1.0.min.js')}}"></script>

        <!-- Bootstrap -->
        <script src="{{asset('index/assets/js/popper.js')}}"></script>
        <script src="{{asset('index/assets/js/bootstrap.min.js')}}"></script>

        <!-- Plugins -->
        <script src="{{asset('index/assets/js/scrollreveal.min.js')}}"></script>
        <script src="{{asset('index/assets/js/waypoints.min.js')}}"></script>
        <script src="{{asset('index/assets/js/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('index/assets/js/imgfix.min.js')}}"></script>

        <!-- Global Init -->
        <script src="{{asset('index/assets/js/custom.js')}}"></script>

    </body>
    </html>

