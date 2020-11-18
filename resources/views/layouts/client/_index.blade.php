<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include("includes.client_head")
<body>
    <div id="app">
       @include('includes.header')
        <main>
            {{-- hero --}}
            <section id="hero" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="img-thumbnail" src="images/1.jpg" alt="">
                    </div>
                    <div class="carousel-item">
                    <img class="img-thumbnail" src="images/2.jpg" alt="">
                    </div>
                    <div class="carousel-item">
                    <img class="img-thumbnail" src="images/3.jpg" alt="">
                    </div>
                    <div class="carousel-item">
                    <img class="img-thumbnail" src="images/4.jpg" alt="">
                    </div>
                </div>
            </section>
            

            <div class="container">
                {{-- services --}}
                <section id="services">
                    <h2 class="text-center">Our Available Services</h2>
                    <div class="service-container">
                        @foreach ($services as $service)
                        <div class="service card">
                            <div class="card-body">
                                {{ $service['service'] }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>

                {{-- about --}}
                <section id="about">
                    <div class="left appear-animation" data-appear-animation="bounceInLeft" data-appear-animation-delay="0" data-appear-animation-duration="1s">about image</div>
                    <div class="right appear-animation" data-appear-animation="bounceInRight" data-appear-animation-delay="0" data-appear-animation-duration="1s">
                        <h1 class="title">About us</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita maxime id quae voluptatem, consequuntur neque commodi hic nam aliquid officia illum sequi modi. Ipsa, magnam!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est eum repudiandae officiis vel laboriosam autem eos fugiat? Adipisci facilis velit provident expedita cum facere unde illum! Reiciendis assumenda explicabo maiores.</p>
                    </div>
                </section>
            </div>

            {{-- book --}}
            <section id="book">
                <div class="container">
                    <form id="chk-radios-form" method="POST" action="{{ route('book') }}">
                        @csrf

                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Schedule<span class="required">*</span></label>
                            <div class="col-sm-9">
                                <div >
                                    <input id="scheduled_at" name="scheduled_at" type="datetime-local" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Services<span class="required">*</span></label>
                            <div class="col-sm-9">
                                @foreach($services as $service) 
                                <div class="checkbox-custom chekbox-primary">
                                    <input id="{{ $service['service'] }}" value="{{ $service['id'] }}" type="checkbox" name="for[]" required />
                                    <label for="{{ $service['service'] }}">{{ $service['service'] }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                @if (Auth::user())
                                <input type="hidden" name="user_id" value={{ Auth::id() }}>
                                <button class="btn btn-primary">Book Now</button>
                                @else
                                <a class="btn btn-primary" href="{{ route('login') }}">Book Now</a>
                                @endif
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </section>
        </main>
    </div>
    @include('includes.footer')
		<script src="vendor/jquery/jquery.js"></script>
		<script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="vendor/popper/umd/popper.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.js"></script>
		<script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="vendor/common/common.js"></script>
		<script src="vendor/nanoscroller/nanoscroller.js"></script>
		<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="vendor/jquery-placeholder/jquery.placeholder.js"></script>
		<script src="vendor/jquery-appear/jquery.appear.js"></script>
		<script src="js/theme.js"></script>
		<script src="js/custom.js"></script>
        <script src="js/theme.init.js"></script>
        
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>






