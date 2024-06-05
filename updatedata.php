<?php

$patient_id = $_POST['patient_id'];
$full_name = $_POST['full_name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$disease = $_POST['disease'];
$phone = $_POST['phone'];
$doctor_id = $_POST['doctor_id'];


$host = "localhost";
$user = "root";
$password = "";
$dbname = "hspmgmnt";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE patients SET full_name='$full_name', age='$age', gender='$gender', address='$address', disease='$disease', phone='$phone', doctor_id='$doctor_id' WHERE patient_id=$patient_id";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
    header("Location: patients.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
