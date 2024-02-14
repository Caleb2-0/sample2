<?php
include("nav.php");     
?> 


<html lang="en">
  </head>
  <body>
  <div id ="localtitle">
        <h1>features</h1>
        </div>
        <br>
    <?php 
          $sql = "SELECT * FROM features";
          $res = mysqli_query($con,  $sql);

          if (mysqli_num_rows($res) > 0) {
          	while ($row = mysqli_fetch_assoc($res)) {  
                ?>
      <div class="row">
        <div class="column">
          <div class="card">
            <div class="img-container">
            <img class = "alb" src="images/<?=$row['image']?>">
            </div>
            <h3><?php echo $row['feature']?></h3>
            <p><?php echo $row['description']?></p>
          </div>
        </div>
      </div>
          		
    <?php } }?>
    <br>
    <?php include("footer.php");?>
  </body>
</html>
