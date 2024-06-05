<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "hspmgmnt";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($room_no)) {
    //getting id from url
    $room_no = $_GET['room_no'];
    $result = mysqli_query($mysqli, "SELECT * FROM room WHERE room_no=$room_no");

    while ($res = mysqli_fetch_array($result)) {
        $room_type = $_POST['room_type'];
        $status = $_POST['status'];
        $price = $_POST['price'];
        $patient_id = $_POST['patient_id'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=News+Cycle&family=Roboto+Slab:wght@300&family=Rowdies:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="iu.css">
</head>

<body>

    <h1>Enter Room Information!</h1>
    <form class="form" action="updateroom.php" method="post">


        <div class="input-p"> <label for="room_no">Room No.:</label>
            <input class="input-text" type="text" name="room_no" value="">
        </div>
        <div class="input-p"> <label for="room_type">Room Type</label>
            <input class="input-text" type="text" name="room_type" value="">
        </div>
        <div class="input-p"> <label for="status">status</label>
            <input class="input-text" type="text" name="status" value="">
        </div>
        <div class="input-p"> <label for="price">Price</label>
            <input class="input-text" type="text" name="price" value="">
        </div>
        <div class="input-p"> <label for="patient_id">Allocated to</label>
            <input class="input-text" type="text" name="patient_id" value="">
        </div>

        <br>


        <input class="submit" type="submit" value="Submit">
    </form>

</body>

</html>