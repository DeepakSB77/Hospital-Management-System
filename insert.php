<?php

$patient_id = $_POST['patient_id'];
$full_name = $_POST['full_name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$disease = $_POST['disease'];
$phone = $_POST['phone'];

$host = "localhost";
$user = "root";
$password = "";
$dbname = "hspmgmnt";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO patients (patient_id, full_name, age, gender, address, disease, phone) VALUES ('$patient_id','$full_name', '$age', '$gender', '$address', '$disease', '$phone')";

if (mysqli_query($conn, $sql)) {
    echo "New record insertd successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
