<?php
include("nav.php");
?>

<html lang="en">
<body>
    <section>
	<div id ="localtitle">
        <h1>Local attractions</h1>
        </div>
        <br>
     <?php 
          $sql = "SELECT * FROM attractions";
          $res = mysqli_query($con,  $sql);

          if (mysqli_num_rows($res) > 0) {
          	while ($row = mysqli_fetch_assoc($res)) {  
                ?>
            <div id = "attr">
             <div class="alb">
             	<img class = "alb" src="images/<?=$row['image']?>">
             </div>
			<div class = "imgtext">
			 <h3><?php echo $row['name']?></h3>
			 <p><?php echo $row['description']?></p>
			 <p>Type: <?php echo $row['type']?></p>
			 <p>Location: <?php echo $row['location']?></p>
			</div>
            
            </div>
            <br>
          		
    <?php } }?>
    </section>
    <?php include("footer.php");?>
	
</body>
</html>