
<?php
include('../php-includes/connect.php');
?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VGX 12</title>
    <link rel="icon" type="image/png" href="images/Logo.png"/>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

</head>
<style>
    html {
  scroll-behavior: smooth;
}

#heading {
    text-transform: uppercase;
    color: #81b536;
    font-weight: normal
}

#msform {
    text-align: center;
    position: relative;
    margin-top: 20px
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
}

.form-card {
    text-align: left
}

#msform fieldset:not(:first-of-type) {
    display: none
}

#msform input,
#msform select,
#msform textarea {
    padding: 8px 15px 8px 15px;
    border: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    background-color: #ECEFF1;
    font-size: 16px;
    letter-spacing: 1px
}

#msform input:focus,
#msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #81b536;
    outline-width: 0
}

#msform .action-button {
    width: 100px;
    background: #81b536;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 0px 10px 5px;
    float: right
}

#msform .action-button:hover,
#msform .action-button:focus {
    background-color: #81b536
}

#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px 10px 0px;
    float: right
}

#msform .action-button-previous:hover,
#msform .action-button-previous:focus {
    background-color: #000000
}

.card {
    z-index: 0;
    border: none;
    position: relative
}

.fs-title {
    font-size: 25px;
    color: #81b536;
    margin-bottom: 15px;
    font-weight: normal;
    text-align: left
}

.purple-text {
    color: #81b536;
    font-weight: normal
}

.steps {
    font-size: 25px;
    color: gray;
    margin-bottom: 10px;
    font-weight: normal;
    text-align: right
}

.fieldlabels {
    color: gray;
    text-align: left
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}

#progressbar .active {
    color: #81b536
}

#progressbar li {
    list-style-type: none;
    font-size: 15px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar #account:before {
    font-family: 'Ubuntu', sans-serif;
    content: " "
}

#progressbar #personal:before {
    font-family: 'Ubuntu', sans-serif;
    content: " "
}

#progressbar #payment:before {
    font-family: 'Ubuntu', sans-serif;
    content: " "
}

#progressbar #confirm:before {
    font-family: 'Ubuntu', sans-serif;
    content: " "
}

#progressbar li:before {
    
    line-height: 45px;
    display: block;
    font-size: 20px;
    color: #ffffff;
    background: lightgray;
  
    margin: 0 auto 10px auto;
    padding: 2px
}



#progressbar li.active:before,
#progressbar li.active:after {
    background: #81b536
}

.progress {
    height: 20px
}

.progress-bar {
    background-color: #81b536
}

.fit-image {
    width: 100%;
    object-fit: cover
}
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  text-align:center;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;

}

.sidenav a:hover{
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<body>
    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <nav class="navbar-index" style="background: #f1f1f1">
        <div class="max-width">
              <div class="logo" ><a href="index.html" style="color: #454545; font-size: 50px">V G X <span>   1 2.</span></a></div>
            <div class="overlay-navigation">
                    <nav role="navigation" class="nav">
                      <ul>
                        <li><a href="index.html" style="color: #454545; font-weight: bold;">Home</a></li>
                        <li><a href="earn.php#form" style="color: #454545; font-weight: bold;">Online Registration</a></li>
                        <li><a href="info.html#about"  style="color: #454545; font-weight: bold;">Products</a></li>
                        <li><a href="info.html#teams" style="color: #454545; font-weight: bold;">Testimonials</a></li>
                        <li><a href="earn.php"  style="color: #454545; font-weight: bold;">Be wealthy</a></li>
                        <li><a href="info.html#contact"  style="color: #454545; font-weight: bold;">About Us</a></li>
                        <li><a href="info.html#contact" style="color: #454545; font-weight: bold;">Contact</a></li>
                        <li><a href="#"></a></li>
                      </ul>
                    </nav>
                  </div>
             
                  <div class="open-overlay" style="font-size:30px;cursor:pointer ; color: #454545; border-radius: 50%; width: 40px;height: 40px; text-align: center; border-style: solid;
                  border-width: 3px ;border-color: #81b536; padding-top: -10px; padding-left: 6px; padding-right: 6px; margin-top: -20px;">
                    <span class="bar-top"></span>
                    <span class="bar-middle"></span>
                    <span class="bar-bottom"></span>
                  </div>

         
           
        </div>
    </nav>

 



    <!-- skills section start -->
    <section class="skills" id="Affiliate" style="background: #f1f1f1">
        <div class="max-width">
            <h2 class="title">How to be an Affiliate?</h2>
            <div class="skills">
                <div class="column left" style="margin-left: auto;
                margin-right: auto; background: #f1f1f1">
                  
                    <p><b style="font-size: 20px">2 ways to Earn</b> <br>
                    1. Commision base per Sub-Distributor. <br> 
                    2. Receive a Bonus. <br><br>
                    <b style="font-size: 20px ; color: #81b536">VGX 12</b><br>
                   <b style="font-size: 20px; color: #81b536"> Final share commission per level</b><br><br>
                    Level 1. Php 330 + Bonus of&nbsp; ₱ 1,100<br>
                    Level 2. Php 90 + Bonus of  &nbsp;  ₱ 7,500<br>
                    Level 3. Php 20 + Bonus of &nbsp;   ₱ 15,500<br>
                    Level 4. Php 9 + Bonus of  &nbsp;  ₱ 100,000<br>
                    Level 5. Php 2.1  + Bonus of  &nbsp;  ₱ 300,000<br>
                    </p>
                    <br>
                     
                      
                    <a  href="#form" onclick='myFunction()'>Register Online</a>
                    <div id="myDIV" style="display: none; background: #f1f1f1">
                        <div class="container-fluid">
                            <div class="row justify-content-center" id="form">
                                <div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3" >
                                        <br>
                                        <br>
                                        <br>
                                        <h2 id="heading"> Account Registration</h2>
                                        <p>Fill all form field to go to next step</p>
                                        <form id="msform" method="post" name="MyForm" action="register.php" enctype="multipart/form-data" style="background: #f1f1f1">
                                            <!-- progressbar -->
                                            <ul id="progressbar">
                                                <li class="active" id="account"><i class="fas fa-user"></i> <strong>Personal</strong></li>
                                                <li id="personal"> <i class="fas fa-map-marker-alt"></i> <strong>Address</strong></li>
                                                <li id="payment"><i class="fas fa-user-friends"></i> <strong>Benificiary</strong></li>
                                                <li id="confirm"><i class="fas fa-check-square"></i> <strong>Finished</strong></li>
                                            </ul>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div> <br> <!-- fieldsets -->
                                            <fieldset style="background: #f1f1f1">
                                                <div class="form-card">
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <h2 class="fs-title">Personal Information:</h2>
                                                        </div>
                                                        <div class="col-5">
                                                            <h2 class="steps">Step 1 - 4</h2>
                                                        </div>
                                                    </div> 
                                                    <label class="fieldlabels">First Name: *</label> 
                                                    <input type="text" name="first_name" placeholder="First Name" required/>
                                                    <label class="fieldlabels">Middle Name: *</label> 
                                                    <input type="text" name="middle_name" placeholder="Middle Name" required/> 
                                                    <label class="fieldlabels">Last Name: *</label> 
                                                    <input type="text" name="last_name" placeholder="Last Name" required/> 
                                                    <label class="fieldlabels">Gender: *</label> 
                                                    <input type="radio" name="gender" value="Male" style="width:25px; height:25px;" checked> Male
                                <input type="radio" name="gender"  value="Female" style="width:25px; height:25px;"> Female<br>
                                                    <label class="fieldlabels">Email: *</label> 
                                                    <input type="email" name="email" id="email" placeholder="Email" required/>
                                                    <div id="uname_response" ></div><br>
                                                    <label class="fieldlabels">Mobile Number: *</label> 
                                                    <input type="text" name="mobile" placeholder="Mobile Number" required/>
                                                    <label class="fieldlabels">Alternative Mobile Number: </label> 
                                                    <input type="text" name="mobile2" placeholder="Alternative Mobile Number" />
                                                    
                                                </div> <input type="button" name="next" class="next action-button" value="Next" />
                                            </fieldset>
                                            <fieldset style="background: #f1f1f1">
                                                <div class="form-card">
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <h2 class="fs-title">Address Information:</h2>
                                                        </div>
                                                        <div class="col-5">
                                                            <h2 class="steps">Step 2 - 4</h2>
                                                        </div>
                                                    </div> 
                                                    <label class="fieldlabels">Home Address: *</label> 
                                                    <input type="text" name="address" placeholder="Home Address" required/> 
                                                    <label class="fieldlabels">Work Address: *</label> 
                                                    <input type="text" name="work_address" placeholder="Work Address" /> 
                                                    <label class="fieldlabels">Province: *</label> 
                                                  
                                                    <select name="region"  onchange="prod_function(event)" required>
                                                    <option value="" disabled selected>Choose Region</option>
                                     <?php
									$i=1;
									$query = mysqli_query($con,"select * from refprovince ORDER BY provDesc asc");
									if(mysqli_num_rows($query)>0){
										while($row=mysqli_fetch_array($query)){
										
										?>
                                        <option value="<?php echo $row['regCode']?>"><?php echo $row['provDesc']?>
                                        </option>
                                        <?php
										
										}
									}
								?>
							 </select>
                                                    <label class="fieldlabels">Deliver To: *</label> 
                                                
                                                    <input type="radio" name="deliver" style="width:25px; height:25px;" value="Home Address" checked> Home Addres
                                <input type="radio" name="deliver" style="width:25px; height:25px;" value="Work Address"> Work Address
                                                </div> <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                            </fieldset>
                                            <fieldset style="background: #f1f1f1">
                                                <div class="form-card">
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <h2 class="fs-title">Benificiary Information:</h2>
                                                        </div>
                                                        <div class="col-5">
                                                            <h2 class="steps">Step 3 - 4</h2>
                                                        </div>
                                                    </div> 
                                                    <label class="fieldlabels">Beneficiary Name: *</label> 
                                                    <input type="text" name="beneficiary" placeholder="Beneficiary Name" required/> 
                                                    <label class="fieldlabels">Beneficiary Contact Information: *</label> 
                                                    <input type="text" name="beneficiary_contact" placeholder="Beneficiary Contact Information" required/> 
                                                    <label class="fieldlabels">Beneficiary Address: *</label> 
                                                    <input type="text" name="beneficiary_Address" placeholder="Beneficiary Address" required /> 
                                                </div> <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                            </fieldset>
                                            <fieldset style="background: #f1f1f1">
                                                <div class="form-card">
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <h2 class="fs-title">Finish:</h2>
                                                        </div>
                                                        <div class="col-5">
                                                            <h2 class="steps">Step 4 - 4</h2>
                                                        </div>
                                                    </div> 
                                                    <label class="fieldlabels">Product Cost: *</label> 
                                                  <input type="text" value="2,000"  readonly>
                              <label class="fieldlabels">Shipping Fee (COD): *</label> 
                                                    <input  type="text" id="myText" readonly>
                         
                                                    <label class="fieldlabels">Total Payment: *</label> 
                                                     <input type="text" id="totalpayment" readonly>
                                </div> <input type="submit" name="join_user" class="next action-button" value="Join" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                            </fieldset>
                                           
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                        


                        <!--  end-->
                        
                        </div>
                        <br>
                         <br>
                         <h2 style="color: #333; width: 100%">Health is Wealth. If you are HEALTY, you are WEALTHY</h2>
                         
                         <p><i>Base on: https://www.sciencealert.com/this-is-how-much-your-body-is-worth</i></p>
                         <br>
                          <img src="images/How-Much-Are-We-Worth-V2-large.jpg" alt="Name Of the Products Here" style=" max-width: 100%;height: auto;">
                </div>
               

            </div>
            
        </div>
    </section>


 <!-- contact section start -->
    <section class="contact" id="contact">
        <div class="max-width">
            <h2 class="title">Contact us</h2>
            <div class="contact-content">
                <div class="column left">
                 
                    <div class="icons">
                        <div class="row">
                            <i class="fas fa-user" style="color: #92c14d;"></i>
                            <div class="info">
                                <div class="head">Name</div>
                                <div class="sub-title">VGX12</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-map-marker-alt" style="color: #92c14d;"></i>
                            <div class="info">
                                <div class="head">Address</div>
                                <div class="sub-title">Agusan del Norte, Philippines</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-envelope" style="color: #92c14d;"></i>
                            <div class="info">
                                <div class="head">Email</div>
                                <div class="sub-title">VGX12net@gmail.com</div>
                            </div>
                        </div>
                        <div class="row">
                           <a href="https://www.facebook.com/VGX-101925948515472"><i class="fab fa-facebook-f" style="color: #3b5998;"></i></a>
                            <div class="info">
                                <a href="https://m.me/101925948515472"><i class="fab fa-facebook-messenger" style="color: #0078FF;"></i></a>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column right">
                    <div class="text">Message us</div>
                    <form action="#">
                        <div class="fields">
                            <div class="field name">
                                <input type="text" placeholder="Name" required>
                            </div>
                            <div class="field email">
                                <input type="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="field">
                            <input type="text" placeholder="Subject" required>
                        </div>
                        <div class="field textarea">
                            <textarea cols="30" rows="10" placeholder="Message.." required></textarea>
                        </div>
                        <div class="button">
                            <button type="submit">Send message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



    <script>
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
              nav_item_8.removeClass('slide-in-nav-item-delay-6-reverse').addClass('slide-in-nav-item-delay-6');
              document.getElementById("scroll-up-btn").style.display = "none";
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
              nav_item_8.removeClass('slide-in-nav-item-delay-6').addClass('slide-in-nav-item-delay-6-reverse');
              document.getElementById("scroll-up-btn").style.display = "block";
              document.getElementById("scroll-down-btns").style.display = "block";
            }
          })
              </script>
    <script>
        $(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;
var current = 1;
var steps = $("fieldset").length;

setProgressBar(current);

$(".next").click(function(){

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(++current);
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(--current);
});

function setProgressBar(curStep){
var percent = parseFloat(100 / steps) * curStep;
percent = percent.toFixed();
$(".progress-bar")
.css("width",percent+"%")
}

$(".submit").click(function(){
return false;
})

});
        function myFunction() {
          var x = document.getElementById("myDIV");
          if (x.style.display === "none") {
            x.style.display = "block";
          } else {
            x.style.display = "none";
          }
        }
         function prod_function(e) {
 if(e.target.value == '01' || e.target.value == '02'|| e.target.value == '03'|| e.target.value == '04'|| e.target.value == '17'|| e.target.value == '05'|| e.target.value == '13'|| e.target.value == '14'){
 document.getElementById("myText").value = '135',
  document.getElementById("totalpayment").value = '2,135'
 }
 else if(e.target.value == '09' || e.target.value == '10'|| e.target.value == '11'|| e.target.value == '12'|| e.target.value == '15'|| e.target.value == '16'){
 document.getElementById("myText").value = '105',
   document.getElementById("totalpayment").value = '2,105'
 }
     else if(e.target.value == '06' || e.target.value == '07'|| e.target.value == '08'){
 document.getElementById("myText").value = '125',
   document.getElementById("totalpayment").value = '2,125'
 }
 
}
        </script>
        
        <script>  
 $(document).ready(function(){  
   $('#email').blur(function(){

     var email = $(this).val();

     $.ajax({
      url:'../check_email.php',
      method:"POST",
      data:{email:email},
      success:function(data)
      {
       if(data != '0')
       {
        $('#uname_response').html('<span class="text-danger" style="color: red">Email not available </span>');
  
       }
       else
       {
        $('#uname_response').html('<span class="text-success" style="color: green">Email Available </span>');
     
       }
      }
     })

  });
 });  
 
 function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
        
    <script src="script.js"></script>
    <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=install_email
        page_id="101925948515472"
  theme_color="#13cf13">
      </div>
</body>
</html>