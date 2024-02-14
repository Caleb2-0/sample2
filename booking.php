<?php
include("nav.php");


$msg = '';
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $id = $user_data['user_id'];
    $type = $_POST['combo_options'];
    $date = $_POST['date'];
    if(!empty($type) && !empty($date))
    {
    $query = "insert into bookings(`user_id`,`type`,`date`)values('$id','$type','$date')";

    mysqli_query($con,$query);
    header("Location:booking.php?=booking-success");
    }
    else
    {
        $msg = "Please Choose Both Date And Pitch!";
    }
}

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql = "DELETE FROM bookings WHERE book_id = $id";
    mysqli_query($con,$sql);
    header("Location:booking.php?delete=successful");
}

?>

<html lang="en">
<body>
    <div class="book-wrapper">
        <div class="book-contain">
    <div class="book_header">
        <h1>booking</h1>
    </div>
    <br>
    <div class ="errormsgbook">
        <?php echo $msg ?>
        </div>
        <br>
    <form method = 'POST'>
    <div class="combo">
        <select class = "combo_options" name = "combo_options">
            <?php
                $s = mysqli_query($con, "select * from pitches");
                while($r = mysqli_fetch_array($s))
                {
                    ?>
            <option> <?php echo $r['type'];?> </option>
            <?php
                }
                ?>
        </select>
    <div class="combo_date">
        <input type ="date" class = "combo_input" name = "date">
    </div>
    <div class="bookbtn">
        <button type = "submit" name = "book">Book</button>
        <h3>Choose a Pitch, Date And Click Book To Add New Booking.</h3>
    </div>
    </div>
    </form>
    <br>
    <div class="mybookh">
        <h3>my bookings</h3>
    </div>
    <br>
    <div class="mybooking">
    <form method = 'POST'>
    <table class="table">
        <thead>
            <tr class = "head">
                <th>BOOK ID</th>
                <th>USER ID</th>
                <th>TYPE</th>
                <th>DATE</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php
            $query = "select * from bookings";
            $result = mysqli_query($con,$query);

            while($row = mysqli_fetch_assoc($result))
            {
                echo "
            <td>$row[book_id]</td>
            <td>$row[user_id]</td>
            <td>$row[type]</td>
            <td>$row[date]</td>
            <td>$row[status]</td>

            <td>
            <a class = 'btn_edit' href = 'edit.php?id=$row[book_id]'>EDIT</a>
            <a class = 'btn_delete' href = 'booking.php?id=$row[book_id]'>DELETE</a>
            </td>

            </tr>
            ";
            }
            ?>
    
        </tbody>
    </table>
    </form>
        </div>
    </div>
    </div>
    </div>
    <br>
    <?php include("footer.php");?>
</body>
</html>