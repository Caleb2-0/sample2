<?php
include("nav.php");
?>
<html>
    <body>
    <section class = "content-top">
        <div class ="topleft">
            <h1> WELCOME TO GLOBAL WILD CAMPING AND SWIMMING </h1>
        </div>
    </section>
    <br>
    <br>
<main>
<section class="submain">
    <div class="left">
    <div class="cont-right">
                <div class="slideshow">
                <div class="images">
                <img class = "slideimg" src="images/bg1.jpg" alt="image of a person swimming">
                <img class = "slideimg" src="images/bg2.jpg" alt="image of camping at night">
                <img class = "slideimg" src="images/bg3.jpg" alt="image of people swimming in the wild">
                <img class = "slideimg" src="images/bg4.jpg" alt="image of campers by the lake">
                <img class = "slideimg" src="images/bg5.jpg" alt="image of wild swimming">
                <img class = "slideimg" src="images/bg6.jpeg" alt="image of cmpers by the lake">
                <img class = "slideimg" src="images/bg7.jpg" alt="image of a pool">
                <img class = "slideimg" src="images/bg8.jpg" alt="image of people swimming in the wild">
                 </div>
                </div>
                <div class="text">
                    <p>Welcome to the Global Wild Swimming and Camping.</p>
                    <br>
                     <p>  You will find all the information you need to know about us,
                    please use the navigation bar to access parts of this website and use 
                    the search bar to search related items.  Find the privacy link in 
                    the footer below to read our policy</p>
                </div>
            </div>
    </div>
    <div class="right">
    <div class = "topright">
            <div class="pithessearch">
            <form class="search-bar_pitches" action = "search.php" method = "POST">
                <input type = "text" name = "search"class = "search_bar_input_pitch" placeholder = "Search Here" aria-label = "search"/>
                <button type = "submit" name = "submit"class = "search_submit"><i class = "fas fa-search" aria-label = " submit"></i></button>
            </form>
            </div>
        </div>
        <br>
        <div class="wearables">
        <h2>Wearable Technologies</h2>
        <br>

     <?php 
          $sql = "SELECT * FROM wearables";
          $res = mysqli_query($con,  $sql);

          if (mysqli_num_rows($res) > 0) {
          	while ($row = mysqli_fetch_assoc($res)) {  
                ?>
            <div class = "wear">
             <div class="img-wear">
             	<img src="images/<?=$row['image']?>">
             </div>
			<div class = "imgtext-wear">
			 <h3><?php echo $row['name']?></h3>
			 <p><?php echo $row['description']?></p>
			</div>
            
            </div>
            <br>
          		
    <?php } }?>
    </div>
    </div>
</main>
</section>
<br>
        <iframe class= "map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3871.6514908494764!2d33.80325201424451!3d-13.979338084653337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19202d2848b3eb31%3A0x3ead09117ba69a26!2sKamuzu%20Institute%20for%20Sports!5e0!3m2!1sen!2smw!4v1680257233812!5m2!1sen!2smw"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
 <br>   
</section>

        <?php include("footer.php");?>
</body>
</html>

<script>
    var indexValue = 0;
function slideShow(){
  setTimeout(slideShow, 2500);
  var x;
  const img = document.querySelectorAll(".slideimg");
  for(x = 0; x < img.length; x++){
    img[x].style.display = "none";
  }
  indexValue++;
  if(indexValue > img.length){indexValue = 1}
  img[indexValue -1].style.display = "block";
}
slideShow();
</script>