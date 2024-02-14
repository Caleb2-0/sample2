<?php
include("nav.php");



if($_SERVER['REQUEST_METHOD'] == "POST")
{
    
    //declaring variables and assignin their values
    $image = $user_data['image'];
    $name = $user_data['first_name'];
    $message = $_POST['review'];

    if(!empty($message))

    //writting to the database
        {
            $query = "insert into reviews (`name`,`review`,`image`) 
            VALUES ('$name','$message','$image')";
        
            mysqli_query($con, $query);
    
            header("Location: reviews.php?review=sucess");
            die;
        }
}

?>

<html>
    <body>
<section>
    <div class="review_top">
        <h1>reviews</h1>
    </div>
    <br>
    <?php 
          $sql = "SELECT * FROM reviews";
          $res = mysqli_query($con,  $sql);

          if (mysqli_num_rows($res) > 0) {
          	while ($row = mysqli_fetch_assoc($res)) {  
                ?>
            <div id = "rev">
             <div class="aimgs">
             	<img class = "aimg" src="images/<?=$row['image']?>">
             </div>
			<div class = "imgrevtext">
			 <h3><?php echo $row['name']?></h3>
             <br>
			 <p><?php echo $row['review']?></p>
             <br>
			 <p>Date: <?php echo $row['date']?></p>
			</div>
            
            </div>
            <br>
          		
    <?php } }?>
       </section>
       <form class = "formr" method = "POST">
            <div class="reviewarea"> 
            <h3>Kindly Leave A Review</h3>
            <br>
                <div class="reviewmessagearea">
                    <textarea type ="text" name = "review" rows ="5" placeholder="Your Review Goes Here"></textarea>
                    <button type="submit" name = "submit">POST</button>
                </div>
            </div>
        </form>
        
        <?php include("footer.php");?>
</body>
</html>