<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hspmgmnt";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = mysqli_real_escape_string($conn, $_POST["username"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);

if (empty($username) || empty($password)) {
    header("Location: signup.html?error=emptyfields");
    exit();
}

$sql = "SELECT username FROM administration WHERE username = ?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: signup.html?error=sqlerror");
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultCheck = mysqli_stmt_num_rows($stmt);
    if ($resultCheck > 0) {
        header("Location: signup.html?error=usertaken");
        exit();
    } else {

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);


        $sql = "INSERT INTO administration (username, password) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: signup.html?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPwd);
            mysqli_stmt_execute($stmt);
            header("Location: signup.html?signup=success");
            exit();
        }
    }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
