

<?php

$room_no = $_POST['room_no'];
$room_type = $_POST['room_type'];
$status = $_POST['status'];
$price = $_POST['price'];
$patient_id = $_POST['patient_id'];


$host = "localhost";
$user = "root";
$password = "";
$dbname = "hspmgmnt";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO room (room_no, room_type, status, price, patient_id) VALUES ('$room_no','$room_type', '$status', '$price', '$patient_id')";

if (mysqli_query($conn, $sql)) {
    echo "New record insertd successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
