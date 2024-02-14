<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_signin($con);
 
$web_url = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
 
$str = "<?xml version='1.0' ?>";
$str .= "<rss version='2.0'>";
    $str .= "<channel>";
        $str .= "<title>Global wild swimming and camping</title>";
        $str .= "<description>latest articles</description>";
        $str .= "<language>en-US</language>";
        $str .= "<link>$web_url</link>";
 
        
        $result = mysqli_query($con, "SELECT * FROM articles ORDER BY art_id DESC");
 
        while ($row = mysqli_fetch_object($result))
        {
            $str .= "<item>";
                $str .= "<title>" . htmlspecialchars($row->title) . "</title>";
                $str .= "<description>" . htmlspecialchars($row->article) . "</description>";
                $str .= "<link>" . $web_url . "/product.php?id=" . $row->art_id . "</link>";
            $str .= "</item>";
        }
 
    $str .= "</channel>";
$str .= "</rss>";
 
file_put_contents("rss.xml", $str);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/98a3b417b0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>GWSC</title>
</head>
<body>
    <header class="gw-header">
        <div class="gw-cont">
            <div class="gw-logo">GWSC</div>
            <i class="fas fa-bars nav-toggle"></i>
            <?php $page = basename($_SERVER['PHP_SELF']);?>
            <nav class="gw-nav" data-visible="false">
                <li><a class = "<?php if($page == 'index.php'):echo 'active';endif;?>" href="index.php" accesskey="h" tabindex="1">home</a></li>
                <li><a class = "<?php if($page == 'features.php'):echo 'active';endif;?>" href="features.php" accesskey="f" tabindex = "2">features</a></li>
                <li><a class = "<?php if($page == 'attractions.php'):echo 'active';endif;?>" href="attractions.php" accesskey = "a" tabindex = "4">local attractions</a></li>
                <li><a class = "<?php if($page == 'pitches.php'):echo 'active';endif;?>" href="pitches.php" accesskey = "p" tabindex = "5">pitch &amp; availability</a></li>
                <li><a class = "<?php if($page == 'contact.php'):echo 'active';endif;?>" href="contact.php" accesskey = "c" tabindex = "6">contact</a></li>
                <li><a class = "<?php if($page == 'reviews.php'):echo 'active';endif;?>" href="reviews.php" accesskey = "r" tabindex = "7">reviews</a></li>
                <li><a class = "<?php if($page == 'booking.php'):echo 'active';endif;?>" href="booking.php" accesskey = "b" tabindex = "7">bookings</a></li>
                <li><a href="signout.php" accesskey = "l" tabindex = "7">Sign out</a></li>
                <li><a href = "rss.xml" target = "_blank"><i class="fa-solid fa-rss"></i> RSS</a></li>

            </nav>
        </div>
    </header>
    <br>
</body>
</html>

<script>
    const navToggleBtn = document.querySelector(".nav-toggle");
const navigation = document.querySelector(".gw-nav");

navToggleBtn.addEventListener("click", () => {
    const visibility = navigation.getAttribute("data-visible");
    
    if(visibility === "false"){
        navigation.setAttribute("data-visible", "true")
        navToggleBtn.classList.remove("fa-bars");
        navToggleBtn.classList.add("fa-times-circle");
    }
    else{
        navigation.setAttribute("data-visible", "false")
        navToggleBtn.classList.add("fa-bars");
        navToggleBtn.classList.remove("fa-times-circle");
    }
});
</script>