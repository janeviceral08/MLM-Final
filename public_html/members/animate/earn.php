
<?php
include('../php-includes/connect.php');
?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VGX 12</title>
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
     <nav class="navbar-index" style="background: #f1f1f1;">
        <div class="max-width">
            <div class="logo" ><a href="#" style="color: #454545;">V G X  <span>1 2</span></a></div>
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" >&times;</a>
               <a href="index.html" >Home</a>
                <a href="earn.php#form" >Online Registration</a>
                <a href="#about" >Products</a>
                <a href="#teams" >Testimonials</a>
                <a href="earn.php" >Be Wealthy</a>
                <a href="#contact" >About us</a>
                <a href="#contact" >Contact</a>
              </div>
              <span style="font-size:30px;cursor:pointer ; color: #454545; border-radius: 50%; width: 50px; text-align: center; border-style: solid;
              border-width: 3px ;border-color: #81b536;" onclick="openNav()" >&#9776; </span>
          
        </div>
    </nav>

   

         
           
        </div>
    </nav>

 
    <!-- services section start -->
    <section class="services" id="How-to-earn">
        <div class="max-width">
            <h2 class="title" style="color: #454545;">How to Earn Extra Money</h2>
            <div class="serv-content">
                <div class="card" style="margin-left: auto;
                margin-right: auto">
                    <div class="box">
                        <div class="text">Recruit</div>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem quia sunt, quasi quo illo enim.</p>
                    </div>
                </div>
             
               </div>
            </div>
        </div>
    </section>


  



    <!-- skills section start -->
    <section class="skills" id="Affiliate">
        <div class="max-width">
            <h2 class="title">How to be an Affiliate?</h2>
            <div class="skills-content">
                <div class="column left" style="margin-left: auto;
                margin-right: auto">
                  
                    <p>Here are some word explaining why it is the benefits of being affiliate. Dignissimos, ratione error est recusandae consequatur, iusto illum deleniti quidem impedit, quos quaerat quis minima sequi. Cupiditate recusandae laudantium esse, harum animi aspernatur quisquam et delectus ipsum quam alias quaerat? Quasi hic quidem illum. Ad delectus natus aut hic explicabo minus quod.</p>
                    <a  href="#form" onclick='myFunction()'>Register Online</a>
                    <div id="myDIV" style="display: none;">
                        <div class="container-fluid">
                            <div class="row justify-content-center" id="form">
                                <div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3" >
                                        <br>
                                        <br>
                                        <br>
                                        <h2 id="heading"> Account Registration</h2>
                                        <p>Fill all form field to go to next step</p>
                                        <form id="msform" method="post" name="MyForm" action="register.php" enctype="multipart/form-data">
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
                                            <fieldset>
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
                                                    <input type="text" name="first_name" class="step1" placeholder="First Name" required/>
                                                    <label class="fieldlabels">Middle Name: *</label> 
                                                    <input type="text" name="middle_name"  class="step1" placeholder="Middle Name" required/> 
                                                    <label class="fieldlabels">Last Name: *</label> 
                                                    <input type="text" name="last_name"  class="step1" placeholder="Last Name" required/> 
                                                    <label class="fieldlabels">Gender: *</label> 
                                                    <input type="radio" name="gender"  class="step1" value="Male" style="width:25px; height:25px;" checked> Male
                                <input type="radio" name="gender"  value="Female" style="width:25px; height:25px;"> Female<br>
                                                    <label class="fieldlabels">Email: *</label> 
                                                    <input type="email" name="email"  class="step1" id="email" placeholder="Email" required/>
                                                    <div id="uname_response" ></div>
                                                    <label class="fieldlabels">Mobile Number: *</label> 
                                                    <input type="text" name="mobile"  class="step1" placeholder="Mobile Number" required/>
                                                    <label class="fieldlabels">Alternative Mobile Number: </label> 
                                                    <input type="text" name="mobile2" placeholder="Alternative Mobile Number" />
                                                    
                                                </div> <input type="button" name="next" class="next action-button" value="Next" />
                                            </fieldset>
                                            <fieldset>
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
                                            <fieldset>
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
                                            <fieldset>
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
                                </div>
                                
                 
                                <input type="submit" name="join_user" class="action-button" value="Join" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" /><br><br><br>
                                  <p style="color: red">If the Registration won't Proceed please Double Check the form and make sure you fill in all the required fields (*)</p>
                                            </fieldset>
                                         
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        


                        <!--  end-->
                        </div>
                </div>
               

            </div>
            
        </div>
    </section>

 
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
        $('#uname_response').html('<span class="text-danger">Email not available</span>');
  
       }
       else
       {
        $('#uname_response').html('<span class="text-success">Email Available</span>');
     
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
</body>
</html>