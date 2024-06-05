<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .navigations {
            background-color: #2a9d8f;
            box-shadow: 5px 5px 3px 0px #005f73;
        }

        .navv {
            display: inline-block;
            margin: 0.4em;
            align-content: center;
            padding-top: 1em;
            padding-bottom: 1em;
            padding-left: 12%;
            font-style: #ffb703;
        }

        .navv a {
            color: #ffb703;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>

<body style="margin: 50px;">
    <nav class="navigations">
        <ul>
            <li class="navv"><a href="main.html">H.M.S</a></li>
            <li class="navv"><a href="patients.php">Patients</a></li>
            <li class="navv"><a href="doctors.php">Doctors</a></li>
            <li class="navv"><a href="rooms.php">Available rooms</a></li>
            <li class="navv"><a href="#">Go Back</a></li>
        </ul>
    </nav>
    <h1>Available room</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Room No</th>
                <th>Room Type</th>
                <th>status</th>
                <th>Price</th>
                <th>Allocated to</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "hspmgmnt";
            $connection = new mysqli($servername, $username, $password, $database);
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }
            $sql = "SELECT * FROM room";
            $result = $connection->query($sql);

            if (!$result) {
                die("Invalid query: " . $connection->error);
            }
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["room_no"] . "</td>
                    <td>" . $row["room_type"] . "</td>
                    <td>" . $row["status"] . "</td>
                    <td>" . $row["price"] . "</td>
                    <td>" . $row["patient_id"] . "</td>   
                    <td>
                    <a class='btn btn-primary btn-sm' href='updaterooms.php'>Update</a>
                    
                </td>
                </tr>";
            }

            $connection->close();
            ?>
        </tbody>
    </table>
</body>

</html>