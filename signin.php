<?php
session_start();

include("connection.php");
include("functions.php");
$msg = '';
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $ip_address = getIp();
    $time = time() - 600;
    $check_login_row = mysqli_fetch_assoc(mysqli_query($con, "select count(*) as total_count from login_log where try_time
     > $time and ip_address = '$ip_address'"));
     $total_count = $check_login_row['total_count'];

     if($total_count == 3)
     {
        $msg ="Failed Too Many Attemps, Try After 10 Minutes";
     }
     else
     {
    //declaring variables and assignin their values

    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
if(!empty($username) && !empty($password))
{
        //reading from the database
        $query = "select * from users where username = '$username' limit 1";
        
        //getting result from the sql query

        $result = mysqli_query($con, $query);

        if($result) //checking if the result was sucessful
        {
            if($result && mysqli_num_rows($result) > 0 )
            {
                //checking if the password matches the username

                $user_data = mysqli_fetch_assoc($result);

                if($user_data['password']=== $password)
                {
                    //assigning a session id
                    $_SESSION['user_id'] = $user_data['user_id'];

                    //st a cookie
                    
                        $expires = time() + ((60*60*24)*7);
                        $salt = "#%@salt";
                        $token_key = hash('sha256',(time() . $salt));
                        $token_value = hash('sha256', ('Signed_in' . $salt));

                        setcookie('user_id', $token_key.':'.$token_value,$expires);
                        $id = $user_data['user_id'];
                        mysqli_query($con,$query);
                }

                    mysqli_query($con, "delete from login_log where ip_address = '$ip_address'");

                    //redirecting to index page
                    header("Location: index.php?signin=sucess");
                    die;
                }
                else
                {
                    $total_count++;
                    $rem_tim = 3 - $total_count;
                    if($rem_tim == 0)
                    {
                        $msg = "Wait 10 Minutes";
                    }
                    else
                    {

                    }
                    $ip_address = getIp();
                    $try_time = time();
                    mysqli_query($con, "insert into login_log(`ip_address`,`try_time`)values('$ip_address','$try_time')");
                    $msg = "Sign In Failed, Please Check Your Credentials. $rem_tim Attempts Left";
                }

            }
            
        }
        
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>GWSC-Sign In</title>
</head>
<body>
    <div class="signin">
        <h1>global wild camping and swimming</h1>
    </div>
    <div class="sigcont">
        <div class="form-wrap">
            <h1>Sign In</h1>
            <form method ="post">
                <div class="form-g">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="form-g">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="form-g">
                <div class="g-recaptcha" data-sitekey="6Le555clAAAAAKG24pcizomA5554-UgeZA4bOqg6"></div>
                </div>
                <div class="form-g">
                <button type="submit" id = "signin" value = "signin">Sign In</button>
                </div>
                <div class ="errormsg">
                <?php echo $msg ?>
                </div>
            </form>
        </div>
        <div class ="sfooter">
            <p>Don't Have An Account? Sign Up <a class="terms" href="signup.php">here</a>
</div>
    </div>
</body>
</html>
<script>
$(document).on('click', '#signin', function(){

    var response = grecaptcha.getResponse();
    if(response.length == 0)
    {
        alert("please verify you are not a robot")
        return false;
    }


});

</script>