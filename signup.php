<?php

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //declaring variables and assignin their values

    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

        //writting to the database

        $query = "insert into users (`first_name`, `last_name`, `email`, `username`, `password`) 
        VALUES ('$firstname', '$lastname', '$email', '$username', '$password')";
        
        mysqli_query($con, $query);
       //redirecting to sign in page
      header("Location: signin.php?signup=sucess");
      die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>GWSC-Sign Up</title>
</head>
<body>
    <div class="signin">
        <h1>global wild camping and swimming</h1>
    </div>
    <div class="regcont">
        <div class="form-wrap">
            <h1>Sign Up</h1>
            <form method = "POST">
                <div class="form-g">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name">
                </div>
                <div class="form-g">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name">
                </div>
                <div class="form-g">
                    <label for="email">Email</label>
                    <input type="email" name="email">
                </div>
                <div class="form-g">
                    <label for="username">Username</label>
                    <input type="text" name="username">
                </div>
                <div class="form-g">
                    <label for="password">Password</label>
                    <input type="password" name="password">
                </div>
                <div class="form-g">
                    <label for="cpass">Comfirm Password</label>
                    <input type="password" name="cpass">
                </div>
                <div class="form-g">
                <div class="g-recaptcha" data-sitekey="6Le555clAAAAAKG24pcizomA5554-UgeZA4bOqg6"></div>
                </div>
                <div class="form-g">
                <button type="submit" id = "signup" name ="signup">Sign Up</button>
                </div>
                <p>By Clicking Sign Up, You have agreed to our
                <a class="terms" href = "#">Terms & Conditions<a/> and
                <a class="terms" href="#">Privacy Policy</a></p>
            </form>
        </div>
        <div class ="sfooter">
            <p>Already Have An Account? Sign In <a class="terms" href="signin.php">here</a>
</div>
    </div>
</body>
</html>

<script>
$(document).on('click', '#signup', function(){

    var response = grecaptcha.getResponse();
    if(response.length == 0)
    {
        alert("please verify you are not a robot")
        return false;
    }


});

</script>