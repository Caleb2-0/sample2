<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_signin($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GWSC Search</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class = "results"> Search Results</h1>
    <br>
    <div class="search_results">
        <?php
        if(isset($_POST['submit'])){
            $search = mysqli_real_escape_string($con, $_POST['search']);
            $sql = "SELECT * FROM pitches WHERE type LIKE '%$search%' OR description LIKE '%$search%' OR status LIKE '%$search%'";
              $result = mysqli_query ($con, $sql);
              $queryResult = mysqli_num_rows($result);

              echo "There are ".$queryResult." results!";

              if($queryResult > 0) {
                while($row = mysqli_fetch_assoc($result)){
                    echo "<a href = 'pitches.php?name=".$row['type']."'<div>
                    <h2>".$row['type']."</h2>
                    <p>".$row['description']."</p>
                    <p>".$row['status']."</p>
                    </div></a>";
                }
              }else{
                echo "No results found!";
              }
        }
        ?>
    </div>
</body>
</html>