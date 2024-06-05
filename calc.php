<?php
if (isset($_POST['submit'])) {
    //Get the form data
    $patient_id = $_POST['patient_id'];
    $room_charges = $_POST['room_charges'];
    $medicine_charges = $_POST['medicine_charges'];
    $doctors_fees = $_POST['doctors_fees'];
    $total_amount = $_POST['total_amount'];

    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "hspmgmnt";
    //connect to the database
    $conn = mysqli_connect($host, $user, $password, $dbname);

    //Check for connection error
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //Insert the data into the database
    $sql = "INSERT INTO billing (patient_id, room_charges, medicine_charges, doctors_fees, total_amount) 
                VALUES ('$patient_id', '$room_charges', '$medicine_charges', '$doctors_fees', '$total_amount')";
    if (mysqli_query($conn, $sql)) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    //Close the database connection
    mysqli_close($conn);
}
