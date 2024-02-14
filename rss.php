
<?php

//read.php

$feed_url = "http://localhost/tutorial/how-to-create-dynamic-rss-feed-in-php/index.php";

$object = new DOMDocument();

$object->load($feed_url);

$content = $object->getElementsByTagName("item");


?>

<!DOCTYPE html>
<html>
 <head>
  <title>How to Read RSS Feed in PHP</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <body>
  <div class="container">
   <br />
   <h2 align="center">How to Read RSS Feed in PHP</h2>
   <br />
   <?php
    
   foreach($content as $row)
   {
    echo '<h3 class="text-info">' . $row->getElementsByTagName("title")->item(0)->nodeValue . '</h3>';
    echo '<hr />';
    echo '
    <div class="row">
     <div class="col-md-3">
      <p>'.$row->getElementsByTagName("pubDate")->item(0)->nodeValue.'</p>
      <br />
      <img src="'.$row->getElementsByTagName("enclosure")->item(0)->attributes["url"]->nodeValue.'" class="img-responsive img-thumbnail" />
     </div>
     <div class="col-md-9">
      <p align="right"><b><i>By '.$row->getElementsByTagNameNS("ns:1", "*")->item(0)->nodeValue.'</i></b></p>
      <br />
      <p>'.$row->getElementsByTagName("description")->item(0)->nodeValue.'</p>
     </div>
    </div>
    ';
    echo '<br />';
    echo '<span class="label label-primary">'.$row->getElementsByTagName("category")->item(0)->nodeValue.'</span>';
    echo '<br />';
    echo '<hr />';
    echo '<br />';
    
   }

   ?>
  </div>
 </body>
</html>