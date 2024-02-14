<?php
include("nav.php");
include("footer.php");
$id = "";
$msg = '';
if($_SERVER['REQUEST_METHOD'] == "GET")
{
    if(!isset($_GET['id']))
    {
        header("Location:booking.php?update_failed_id_Not_found");
        exit;
    }

    $id = $_GET["id"];
    $sql = "SELECT * FROM bookings WHERE book_id = $id";
    $result = mysqli_query($con,$sql);
    $row = $result -> fetch_assoc();

    if(!$row)
    {
        header("Location:booking.php?update_failed_item_not_found");
        exit;
    }
    $book_id = $row["book_id"];
    $type = $row["type"];
    $date = $row["date"];
}
else
{
    $id = $_POST['book_id'];
    $type = $_POST['type'];
    $date = $_POST['date'];

    do{
        $query = "UPDATE bookings SET  type = '$type', date = '$date' WHERE book_id = $id";
        $result = mysqli_query($con,$query);
        if(!$result)
        {
            header("Location:booking.php?update_failed_query_error");
            break;
        }
        else
        {
            header("Location:booking.php?update=sucessful");
            break;
        }
    }while(true);
}
?>

<html lang="en">
<body>
    <div class="book_header">
        <h1>update booking</h1>
    </div>
    <br>
    <div class ="errormsgbook">
        <?php echo $msg ?>
        </div>
        <br>
    <form method = 'POST'>
        <input type = "hidden" name = "book_id" value = "<?php echo $id; ?>">
        <div class="combo">
        <select class = "combo_options" name = "type" value = "<?php echo $type ?>"> 
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
        </div>
    <div class="combo_date">
        <input type ="date" class = "combo_input" name = "date" value = "<?php echo $date ?>">
    </div>
    <div class="bookbtn">
        <button type = "submit" name = "book">UPDATE</button>
        <h3>Enter Details You Want To Update</h3>
    </div>
    </div>
    </form>
</body>
</html>