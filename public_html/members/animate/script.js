$(document).ready(function(){
    $(window).scroll(function(){
        // sticky navbar on scroll script
        if(this.scrollY > 20){
            $('.navbar').addClass("sticky");
        }else{
            $('.navbar').removeClass("sticky");
        }
        
        // scroll-up button show/hide script
        if(this.scrollY > -10){
            $('.scroll-up-btn').addClass("show");
        }else{
            $('.scroll-up-btn').removeClass("show");
        }
    });

    // slide-up script
    $('.scroll-up-btn').click(function(){
        $('html').animate({scrollTop: 0});
        // removing smooth scroll on slide-up button click
        $('html').css("scrollBehavior", "auto");
    });

    $('.navbar .menu li a').click(function(){
        // applying again smooth scroll on menu items click
        $('html').css("scrollBehavior", "smooth");
    });

    // toggle menu/navbar script
    $('.menu-btn').click(function(){
        $('.navbar .menu').toggleClass("active");
        $('.menu-btn i').toggleClass("active");
    });

    // typing text animation script
    var typed = new Typed(".typing", {
        strings: [],
        typeSpeed: 100,
        backSpeed: 60,
        loop: false
    });

    var typed = new Typed(".typing-2", {
        strings: [],
        typeSpeed: 100,
        backSpeed: 60,
        loop: false
    });

    // owl carousel script
    $('.carousel').owlCarousel({
        margin: 20,
        loop: true,
        autoplayTimeOut: 2000,
        autoplayHoverPause: true,
        responsive: {
            0:{
                items: 1,
                nav: false
            },
            600:{
                items: 2,
                nav: false
            },
            1000:{
                items: 3,
                nav: false
            }
        }
    });
    
    
    
   
    
    
});
function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
    document.getElementById("scroll-up-btns").style.display = "none";
    document.getElementById("scroll-down-btns").style.display = "none";
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("scroll-up-btns").style.display = "block";
    document.getElementById("scroll-down-btns").style.display = "block";
  }
  var slideIndex = 0;
  showSlides();
  
  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots =   document.getElementsByClassName("dot");
  
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
  
    slideIndex++;
    
    if (slideIndex > slides.length) {slideIndex = 1}
  
    slides[slideIndex-1].style.display = "block";  
    setTimeout(showSlides, 5000); // Change image every 2 seconds
  }
/*
<fieldset>
<div class="form-card">
    
    <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
    <div class="row justify-content-center">
        <div class="col-3"> <img src="images/checked.png" class="fit-image"> </div>
    </div> <br><br>
    <div class="row justify-content-center">
        <div class="col-7 text-center">
            <h5 class="purple-text text-center">You Have Successfully Signed Up. We will reach you thru the contact number you provided</h5>
        </div>
    </div>
</div>
</fieldset>
*/