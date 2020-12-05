<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Auto Clinic" />
        <meta name="author" content="Seenzone" />
        <title>Seen Zone | Auto Clinic</title>
        <link rel="icon" type="image/x-icon" href="landing_page/assets/img/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <link href="landing_page/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="vendor/select2-bootstrap-theme/select2-bootstrap.min.css"/>
		<link rel="stylesheet" href="vendor/pnotify/pnotify.custom.css" />
    </head>
    <body id="page-top">
        
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="landing_page/assets/img/logo.jpg" alt=""></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger btn btn-danger text-light" href="#contact">Book Now</a></li>
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->email }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a data-toggle="modal" data-target="#exampleModal"
                                class="dropdown-item" href="#">Service History</a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Modal -->
        @if (Auth::user() && Auth::user()->role_id == 2)
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                <h5 class="modal-title" id="exampleModalLabel">Service History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive-lg">
                        <table class="table table-striped">
                            <thead>
                                <th scope="col">Plate Number</th>
                                <th scope="col">Service</th>
                                <th scope="col">Status</th>
                                <th scope="col">Scheduled At</th>
                                <th scope="col">Finished At</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($responseData['appointmentHistory'] as $key => $value)
                                <tr>
                                    <td>{{ $value['plate_number'] }}</td>
                                    <td>{{ $value['service'] }}</td>
                                    <td>{{ $value['name'] }}</td>
                                    <td>{{ $value['scheduled_at'] }}</td>
                                    <td>{{ $value['updated_at'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
        @endif

        <!-- Masthead-->
        <header class="masthead">
            <div class="overlay"></div>
            <div class="container">
                <div class="masthead-subheading">Welcome To Seen Zone</div>
                <div class="masthead-heading text-uppercase">Auto Clinic</div> 
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a> 
            </div>
        </header>
        
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Featured Services</h2>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-oil-can fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Change Oil</h4>
                       
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-angle-double-up fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Tune Up</h4>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-car fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Diagnostic Scanning</h4>
                    </div>
                </div>
            </div>
        </section>

        <!-- About-->
        <section class="page-section" id="about">
            <div class="overlay"></div>
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">About</h2>
                    <h3 class="section-subheading ">SeenZone Auto Clinic</h3>
                </div>
                
                <div class="about-content">
                    <div class="about-content-text">
                        <div class="contact-info">
                            <p class="contact-label">Contact us at:</p>
                            <p>0908-599-9031</p>
                        </div>
                        <div class="contact-info">
                            <p class="contact-label">Address:</p>
                            <p>918 Del Monte Ave, San Francisco del Monte, Quezon City, 1104 Metro Manila (INSIDE SEAOIL DELMONTE AVENUE QUEZON CITY) 1105 Quezon City, Philippines</p>
                        </div>
                        <div class="contact-info">
                            <a class="btn btn-primary" href="https://www.facebook.com/seenzoneautoclinic"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                    <div class="about-content-map">
                    </div>
                </div>
            </div>
        </section>
       
        


        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container"> 
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Set an appointment</h2>
                    @if(session()->has('message-success'))
                    <h3 class="text-success">{{ session()->get('message-success') }}</h3>
                    @elseif(session()->has('message-fail'))
                    <h3 class="text-warning">{{ session()->get('message-fail') }}
                    @endif
                </div>
                <form method="POST" action={{ route('book') }} >
                    @csrf
                    <div class="row align-items-stretch mb-5">
                        
                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" name="scheduled_at" id="scheduled_at" type="datetime-local" placeholder="Your First Name *" required data-validation-required-message="Please enter the appointment schedule." />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="form-group">
                                <input class="form-control" name="plate_number" id="plate_number" type="text" placeholder="Plate Number *" required data-validation-required-message="Please enter the plate number." />
                                <p class="help-block text-danger"></p>
                            </div>
                            @if (Auth::user())
                            <div class="form-group">
                                <input class="form-control" value={{ Auth::user()->firstname }} disabled name="firstname" id="firstname" type="text" placeholder="Your First Name *" required data-validation-required-message="Please enter your firstname name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" value={{ Auth::user()->lastname }} disabled name="lastname" id="lastname" type="text" placeholder="Your Last Name *" required data-validation-required-message="Please enter your last name." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" value={{ Auth::user()->email }} disabled name="email" id="email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" value={{ Auth::user()->contact_number }} disabled name="contact_number" id="contact_nummber" type="tel" placeholder="Your Phone *" required data-validation-required-message="Please enter your phone number." />
                                <p class="help-block text-danger"></p>
                            </div>
                            @else
                            <div class="form-group">
                                <input class="form-control" name="firstname" id="firstname" type="text" placeholder="Your First Name *" required data-validation-required-message="Please enter your firstname name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="lastname" id="lastname" type="text" placeholder="Your Last Name *" required data-validation-required-message="Please enter your last name." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="email" id="email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" name="contact_number" id="contact_nummber" type="tel" placeholder="Your Phone *" required data-validation-required-message="Please enter your phone number." />
                                <p class="help-block text-danger"></p>
                            </div>
                            @endif
                            <div class="form-group mb-md-0">
                                <label class="text-light" for="service_option">Choose a service:</label>
                                <select id="service_option" name="service_option" id="service_option"  name="service_option" required>
                                   
                                @foreach ($responseData['services'] as $key => $value)
                                    <option value="{{ $value['id'] }}">{{ $value['service'] }}</option>
                                @endforeach
                                </select>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        @if (Auth::user())
                        <button class="btn btn-primary btn-xl text-uppercase"  type="submit">Book</button>
                        @else
                        <a href="/login" class="btn btn-primary btn-xl text-uppercase">Book</a>
                        @endif
                    </div>
                </form>
            </div>
        </section>

        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">Copyright © Seen Zone 2021</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        
                        
                    </div>
                    <div class="col-lg-4 text-lg-right">
                        <a class="mr-3" href="#!">Privacy Policy</a>
                        <a href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
      
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="landing_page/assets/mail/jqBootstrapValidation.js"></script>
        <script src="landing_page/assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="landing_page/js/scripts.js"></script>
        <script type="text/javascript">
            var images=new Array('landing_page/assets/img/img1.png','landing_page/assets/img/img2.png', 'landing_page/assets/img/img3.png');
            var nextimage=0;
            doSlideshow();
            
            function doSlideshow(){
                if(nextimage>=images.length){nextimage=0;}
                $('.masthead')
                .css('background-image','url("'+images[nextimage++]+'")')
                .fadeIn(500,function(){
                    setTimeout(doSlideshow,8000);
                });
            }
        </script>
    </body>
</html>
