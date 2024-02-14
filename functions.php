<?php
function check_signin($con)
{
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";
        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0 )
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    //redirecting to signin page
    header("location: signin.php");
    die;
}

function getIp()
{
    if(!empty($_SERVER['HTTP_CLIENT_IP']))
    {
        $ipAddr = $_SERVER['HTTTP_CLIENT_IP'];
    }
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
        $ipAddr = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ipAddr = $_SERVER['REMOTE_ADDR'];
    }
    return $ipAddr;
}