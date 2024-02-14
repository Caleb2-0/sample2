<?php

include("nav.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //declaring variables and assignin their values

    $message = $_POST['message'];
    $subject = $_POST['subject'];
    $email = $user_data['email'];

    if(!empty($subject) && !empty($message))
    {
        //writting to the database

        $query = "insert into messages (`email`,`subject`,`message`) 
        VALUES ('$email','$subject','$message')";
        
        mysqli_query($con, $query);
    
        header("Location: contact.php?sending-message=sucess");
        die;
    }
}
?>

<html lang="en">
<body>
    
    <div class ="header">
        <h1>contact us</h1>
    </div>
    <div class="contactcontainer">
        <div class="contactleft">
            <div class="phone">
            <i class="fa fa-phone"></i>
            <h3>+265 992 24 73 34</h3>
            </div>
            <div class="address">
            <i class="fa fa-address-card"></i>
            <h3>The SunSet Tower, off SunSet Boulevard</h3>
            </div>
            
        </div>
            <div class="contactright">
                <form method = "POST">
                      <div class="messagearea"> 
                      <label>Kindly Leave A Message</label>
                      <input type = "text" name = "subject" placeholder = "Subject"></input>
                      <br>
                      <textarea type ="text" name = "message" rows ="5" placeholder="Your message"></textarea>
                      <button type="submit" name = "submit">Send</button>
                      </div>
                </form>
            </div>
    </div>
    <div class="privacy">
        <a href = "terms.php">Privacy Policy</a>
    </div>
    <br>
    <?php include("footer.php");?>
</body>
</html>