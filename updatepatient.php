<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "hspmgmnt";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$patient_id = $_GET['patient_id'];
$fn = $_GET['fn'];
$age = $_GET['age'];
$add = $_GET['add'];
$dis = $_GET['dis'];
$ph = $_GET['ph'];
// $did = $_GET['d_id'];

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update patient</title>
    <link rel="stylesheet" href="iu.css">
    <link href="https://fonts.googleapis.com/css2?family=News+Cycle&family=Roboto+Slab:wght@300&family=Rowdies:wght@300&display=swap" rel="stylesheet">
</head>

<body>

    <h1>Update Patient Data</h1>
    <form class="form" action="updatedata.php" method="post">




        <p class="update-p"> <label for="patient_id">Patient No:</label>
            <input class="update-input" type="text" name="patient_id" value="<?php echo "$patient_id" ?>" required>
        </p>

        <p class="update-p"> <label for="full_name">Full Name</label>
            <input class="update-input" type="text" name="full_name" value="<?php echo "$fn" ?>">
        </p>
        <p class="update-p"> <label for="age">Age</label>
            <input class="update-input" type="text" name="age" value="<?php echo "$age" ?>">
        </p>
        <p class="update-p"> <label for="gender">Gender</label>
            <select class="update-input" name="gender" value="">
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>

            </select>
        </p>
        <p class="update-p"> <label for="address">Address</label>
            <input class="update-input" type="text" name="address" value="<?php echo "$add" ?>">
        </p>
        <p class="update-p"> <label for="disease">Disease</label>
            <input class="update-input" type="text" name="disease" value="<?php echo "$dis" ?>">
        </p>
        <p class="update-p"> <label for="phone">Contact No:</label>
            <input class="update-input" type="text" name="phone" value="<?php echo "$ph" ?>">
        </p>
        <p class="update-p"> <label for="doctor_id">Treatment Under:</label>
            <input class="update-input" type="text" name="doctor_id" value="">
        </p>



        <input class="submit" type="submit" value="Submit">
    </form>

</body>

</html>