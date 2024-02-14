<?php
include("nav.php");



if($_SERVER['REQUEST_METHOD'] == "POST")
{
    
    //declaring variables and assignin their values
    $sql = "SELECT * FROM pitches";
    $res = mysqli_query($con,  $sql);
    $row = mysqli_fetch_assoc($res);
    $name = $user_data['first_name'];
    $type = $row['type'];
    $stauts = $row['status'];



    //writting to the database

            $query = "insert into bookings (`name`,`type`) 
            VALUES ('$name','$type')";
        
            mysqli_query($con, $query);
    
            //header("Location: reviews.php?review=sucess");
           // die;
}
?>

<html>
    <body>
    <div id ="localtitle">
        <h1>pitches and availability</h1>
        </div>
    <div class="pitchesmain">
        <div class="zasearch">
    <div class="pithessearch">
    <form class="search-bar_pitches" action = "search2.php" method = "POST">
                <input type = "text" name = "search"class = "search_bar_input_pitch" placeholder = "Search Here" aria-label = "search"/>
                <button type = "submit" name = "submit"class = "search_submit"><i class = "fas fa-search" aria-label = " submit"></i></button>
            </form>
    </div>
    </div>
    <br>
    <div>
    <?php 
          $sql = "SELECT * FROM pitches";
          $res = mysqli_query($con,  $sql);

          if (mysqli_num_rows($res) > 0) {
          	while ($row = mysqli_fetch_assoc($res)) {  
                ?>        
            <div id = "pitches">
             <div class="alb">
             	<img class = "alb" src="images/<?=$row['image']?>">
             </div>
			<div class = "imgtext">
			 <h3><?php echo $row['type']?></h3>
			 <p><?php echo $row['description']?></p>
			 <p>Status: <?php echo $row['status']?></p>
			</div>
            
            </div>
            <br>
            </form>  		
    <?php } }?>
            </div>
            </div> 
            <br>
            <?php include("footer.php");?> 
</body>
</html>