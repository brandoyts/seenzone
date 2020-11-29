<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-lg-left">Copyright © Seen Zone 2021</div>
            <div class="col-lg-4 my-3 my-lg-0">
                <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/seenzoneautoclinic"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
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
<script>
    var images=new Array('landing_page/assets/img/c_1.jpg','landing_page/assets/img/c_2.jpg', 'landing_page/assets/img/c_4.jpg');
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