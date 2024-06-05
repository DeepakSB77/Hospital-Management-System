<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hspmgmnt";
$connection = new mysqli($servername, $username, $password, $database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
if (isset($patient_id)) {
    $patient_id = $_GET['patient_id'];
    $sql = "DELETE FROM 'patients' WHERE patient_id = $patient_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location: patients.php?msg=Record Deleted Succesfully");
    } else {
        echo "Failed:" . mysqli_error($conn);
    }
}
