<!DOCTYPE html>
<html>
 <title>VGX 12</title>
    <link rel="icon" type="image/png" href="../images/Logo.png"/>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<style>
body, html {
  height: 100%;
  font-family: "Inconsolata", sans-serif;
}

.bgimg {
  background-position: center;
  background-size: cover;
  background-image: url("w3images/coffeehouse.jpg");
  min-height: 75%;
}

.menu {
  display: none;
}
</style>
<body>

<!-- Links (sit on top) -->
<div class="w3-top">
  <div class="w3-row w3-black">
    <div class="w3-col s3">
      <a href="#" class="w3-button w3-block w3-black"><h6>HOME</h6></a>
    </div>
    <div class="w3-col s3">
      <a href="#about" class="w3-button w3-block w3-black"><h6>ABOUT</h6></a>
    </div>
    <div class="w3-col s3">
      <a href="#menu" class="w3-button w3-block w3-black"><h6>PRODUCT</h6></a>
    </div>
    <div class="w3-col s3">
        <a href="user-login.php" class="w3-button w3-block w3-black"><h6>LOGIN</h6></a>
      </div>
  </div>
</div> 

<!-- Header with image -->


<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="https://www.w3schools.com/bootstrap/ny.jpg" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">
          <h3>Los Angeles</h3>
          <p>LA is always so much fun!</p>
        </div>
      </div>

      <div class="item">
        <img src="https://www.w3schools.com/bootstrap/la.jpg" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
          <h3>Chicago</h3>
          <p>Thank you, Chicago!</p>
        </div>
      </div>
    
      <div class="item">
        <img src="https://www.w3schools.com/bootstrap/chicago.jpg" alt="New York" style="width:100%;">
        <div class="carousel-caption">
          <h3>New York</h3>
          <p>We love the Big Apple!</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<!-- Add a background color and large text to the whole page -->
<div class="w3-sand w3-grayscale w3-large">

<!-- About Container -->
<div class="w3-container" id="about">
  <div class="w3-content" style="max-width:700px">
    <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">ABOUT THE PRODUCT</span></h5>
    <p>Herbal products are medicines derived from plants. They are used as supplements to improve health and well being, and may be used for other therapeutic purposes. Herbal products are available as tablets, capsules, powders, extracts, teas and so on.</p>
   
    <div class="w3-panel w3-leftbar w3-light-grey">
      <p><i>"Use products from nature for what it's worth - but never too early, nor too late."</i></p>
    </div>
    <img src="w3images/coffeeshop.jpg" style="width:100%;max-width:1000px" class="w3-margin-top">
  </div>
</div>

<!-- Menu Container -->
<div class="w3-container" id="menu">
  <div class="w3-content" style="max-width:700px">
 
    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">HERBAL BENEFITS</span></h5>
  
    <div class="w3-row w3-center w3-card w3-padding">
      <a href="javascript:void(0)" onclick="openMenu(event, 'Health');" id="myLink">
        <div class="w3-col s6 tablink">Health</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Body Care');">
        <div class="w3-col s6 tablink">Body Care</div>
      </a>
    </div>

    <div id="Health" class="w3-container menu w3-padding-48 w3-card">
      <h5>Strengthen the Immune System</h5>
      <p class="w3-text-grey">Herbs are rich in antioxidants, phytosterols, vitamins, and other nutrient substances that equip the body to fight against toxins and germs. They help in boosting the immune system as well. In fact, you can call herbs as ‘medicines’ when taken in small doses. These immune-boosting herbs are elderberry, garlic, ginger, onion, hibiscus, cinnamon, and goldenseal.</p><br>
    
      <h5>Anti-inflammatory Properties</h5>
      <p class="w3-text-grey">The essential oils present in some herbs, like ginger root, have excellent anti-inflammatory properties. These herbs inhibit the enzyme cyclooxygenase (COX), which facilitates inflammatory reactions in your body. This is the reason why herbs are excellent natural remedies for conditions like inflammation, osteoarthritis, and rheumatoid arthritis, and inflammatory bowel ailments like ulcerative colitis.</p><br>
    
      <h5>Reduce Blood Sugar & Cholesterol Levels</h5>
      <p class="w3-text-grey">Some herbs have positive effects on the pancreas, thereby balancing blood sugar levels. They have reportedly controlled many cases of type I or type II diabetes. For instance, fenugreek, bilberry, and cayenne pepper extracts are said to be good blood sugar-stabilizing herbs. Herbs like psyllium, fenugreek, and licorice can result in a noteworthy reduction of cholesterol and blood pressure levels, thereby preventing various coronary ailments.</p><br>
    
      <h5>Prevent Alzheimer’s Disease</h5>
      <p class="w3-text-grey">Many herbs have antioxidant, anti-amyloid, and anti-inflammatory properties, which can effectively prevent Alzheimer’s disease. In Europe, the Ginkgo herb has been used widely to treat Alzheimer’s disease and other forms of dementia.</p><br>
    
      <h5>Prevent Cancer</h5>
      <p class="w3-text-grey">Since ancient times, especially in Chinese medicine, herbs were extensively used for treating cancer symptoms. In fact, herbs also help soothe the aftereffects of chemotherapy. Researchers at Memorial Sloan Kettering Cancer Center have shown through a number of studies that gastric, hepatoma, colon, and breast cancer cells can be effectively destroyed by many medicinal herbs like oldenlandia, scutellaria, taraxacum, and phragmites. These herbs purify blood and prevent cell mutations that usually lead to cancerous growths. The volatile oils derived from certain herbs emit cytotoxicity action against pancreatic, prostate, endometrial, and colon cancer cells. However, the selection of herbs to cure cancer should be strictly done under the supervision of a medical practitioner.</p>
    </div>

    <div id="Body Care" class="w3-container menu w3-padding-48 w3-card">
      <h5>Skin Care</h5>
      <p class="w3-text-grey">For ages, herbs have shown significant benefits when it comes to natural skin care. Amongst the innumerable herbs found all over the globe, some common herbs like neem, turmeric, aloe vera, and holy basil assure radiant and healthy skin. If you mix the powdered form of holy basil, neem, mint leaves and a pinch of turmeric powder, it will eventually fade any dark spots on your face. Chamomile oil, when applied topically, helps repair damaged skin tissues. Tea tree oil is a great herbal extract used in cosmetics like face washes and creams for oily skin, as it has the ability to control oil secretion from the pores. Aloe vera is extensively used in manufacturing skin products, as this herb gives a smooth and youthful touch to the skin. Basil leaves are also an important ingredient for skin care products, particularly in India.</p><br>
    
      <h5>Hair Care</h5>
      <p class="w3-text-grey">Like skin care, hair care has also become a prevalent practice through herbal applications. Massaging your hair with jojoba oil stimulates the bountiful growth of your hair. There are many more herbs like gotu kola, horsetail, ginseng, and marigold extract that similarly stimulate hair growth. If you use cooled chamomile tea as a hair toner, it will give you a natural blonde hair coloring effect. With the application of lemon juice, you can enhance the color effect as well. Aloe vera juice or oil regenerate hair cells, thereby repairing damages and also soothing the scalp with a cooling sensation. Fenugreek enhances blood circulation to the hair roots. Ivy burdock cleanses hair and also cures scalp problems like itchiness and dandruff.</p><br>
    
      <h5>Dental Care</h5>
      <p class="w3-text-grey">Herbal toothpaste is now widely available in the market, which often ensures a perfect set of teeth and gums for you without any side effects. Some tooth cleaners on the market contain harsh abrasives, whiteners, detergents, or bleach that can cause harm to your teeth over the long term. Thus, opting for herbal methods for natural dental care is a wise choice. There are numerous herbs that, when used directly on the teeth and gums, give wonderful results. For instance, rubbing sage leaves on the teeth and gums cleans them instantly and makes the texture smooth. If teeth stains are a problem for you, rub alpine strawberry over the teeth. Bad breath can also be easily eradicated by using lavender water, fresh parsley or mint tea as an herbal mouthwash. For toothaches, clove oil is probably the most effective and readily available medicine. For a healthy mouth and gums, herbs like alpine strawberry, lavender, thyme, sage, neem, fennel, parsley, aloe vera, and mint are found to be very effective and are widely used in the manufacturing of herbal toothpaste, mouthwashes, and teeth whiteners.</p><br>
    </div>  
    <img src="w3images/coffeehouse2.jpg" style="width:100%;max-width:1000px;margin-top:32px;">
  </div>
</div>

<!-- Contact/Area Container -->


<!-- End page content -->
</div>

<!-- Footer -->


<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-dark-grey";
}
document.getElementById("myLink").click();
</script>

</body>
</html>