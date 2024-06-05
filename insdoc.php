<?php

$doctor_id = $_POST['doctor_id'];
$full_name = $_POST['full_name'];
$speciality = $_POST['speciality'];
$age = $_POST['age'];
$contact = $_POST['contact'];
$gender = $_POST['gender'];


$host = "localhost";
$user = "root";
$password = "";
$dbname = "hspmgmnt";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO doctor (doctor_id, full_name, speciality, age, contact, gender) VALUES ('$doctor_id','$full_name', '$speciality', '$age', '$contact', '$gender')";

if (mysqli_query($conn, $sql)) {
    echo "New record insertd successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
