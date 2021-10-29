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
$('.open-overlay').click(function() {
    var overlay_navigation = $('.overlay-navigation'),
      nav_item_1 = $('nav li:nth-of-type(1)'),
      nav_item_2 = $('nav li:nth-of-type(2)'),
      nav_item_3 = $('nav li:nth-of-type(3)'),
      nav_item_4 = $('nav li:nth-of-type(4)'),
      nav_item_5 = $('nav li:nth-of-type(5)'),
      nav_item_6 = $('nav li:nth-of-type(6)'),
      nav_item_7 = $('nav li:nth-of-type(7)'),
      nav_item_8 = $('nav li:nth-of-type(8)'),
      top_bar = $('.bar-top'),
      middle_bar = $('.bar-middle'),
      bottom_bar = $('.bar-bottom');
  
    overlay_navigation.toggleClass('overlay-active');
    if (overlay_navigation.hasClass('overlay-active')) {
  
      top_bar.removeClass('animate-out-top-bar').addClass('animate-top-bar');
      middle_bar.removeClass('animate-out-middle-bar').addClass('animate-middle-bar');
      bottom_bar.removeClass('animate-out-bottom-bar').addClass('animate-bottom-bar');
      overlay_navigation.removeClass('overlay-slide-up').addClass('overlay-slide-down')
      nav_item_1.removeClass('slide-in-nav-item-reverse').addClass('slide-in-nav-item');
      nav_item_2.removeClass('slide-in-nav-item-delay-1-reverse').addClass('slide-in-nav-item-delay-1');
      nav_item_3.removeClass('slide-in-nav-item-delay-2-reverse').addClass('slide-in-nav-item-delay-2');
      nav_item_4.removeClass('slide-in-nav-item-delay-3-reverse').addClass('slide-in-nav-item-delay-3');
      nav_item_5.removeClass('slide-in-nav-item-delay-4-reverse').addClass('slide-in-nav-item-delay-4');
      nav_item_6.removeClass('slide-in-nav-item-delay-5-reverse').addClass('slide-in-nav-item-delay-5');
      nav_item_7.removeClass('slide-in-nav-item-delay-6-reverse').addClass('slide-in-nav-item-delay-6');
      nav_item_8.removeClass('slide-in-nav-item-delay-7-reverse').addClass('slide-in-nav-item-delay-7');
      document.getElementById("scroll-up-btns").style.display = "none";
      document.getElementById("scroll-down-btns").style.display = "none";
    } else {
      top_bar.removeClass('animate-top-bar').addClass('animate-out-top-bar');
      middle_bar.removeClass('animate-middle-bar').addClass('animate-out-middle-bar');
      bottom_bar.removeClass('animate-bottom-bar').addClass('animate-out-bottom-bar');
      overlay_navigation.removeClass('overlay-slide-down').addClass('overlay-slide-up')
      nav_item_1.removeClass('slide-in-nav-item').addClass('slide-in-nav-item-reverse');
      nav_item_2.removeClass('slide-in-nav-item-delay-1').addClass('slide-in-nav-item-delay-1-reverse');
      nav_item_3.removeClass('slide-in-nav-item-delay-2').addClass('slide-in-nav-item-delay-2-reverse');
      nav_item_4.removeClass('slide-in-nav-item-delay-3').addClass('slide-in-nav-item-delay-3-reverse');
      nav_item_5.removeClass('slide-in-nav-item-delay-4').addClass('slide-in-nav-item-delay-4-reverse');
      nav_item_6.removeClass('slide-in-nav-item-delay-5').addClass('slide-in-nav-item-delay-5-reverse');
      nav_item_7.removeClass('slide-in-nav-item-delay-6').addClass('slide-in-nav-item-delay-6-reverse');
      nav_item_8.removeClass('slide-in-nav-item-delay-7').addClass('slide-in-nav-item-delay-7-reverse');
      document.getElementById("scroll-up-btns").style.display = "block";
      document.getElementById("scroll-down-btns").style.display = "block";
    }
  })

