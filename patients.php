<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        body {
            background-color: #eaf4f4;
        }

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

        footer {
            background-color: #2a9d8f;
            margin-top: 7em;
        }

        .li-footer {
            display: inline-block;
            /* margin: 0.1em; */
            align-content: center;
            padding-top: 0.5em;
            padding-bottom: 1em;
            padding-left: 8%;
            color: #ffb703;
            font-weight: bold;
            font-style: oblique;
        }

        .p-footer {
            display: flex;
            color: aliceblue;
            justify-content: center;
            font-weight: bold;
            padding-top: 0.5em;
        }

        .appointment a {
            color: #20718f;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 2em;
            margin-left: 18em;
            margin-right: 18em;
            /* border: 0.2em solid #005f73; */
            text-decoration: none;
            /* background-color: #be95c4; */
            padding: 1em;
            border-radius: 0.3em;
        }

        .appointment a:hover {
            font-weight: bolder;
            text-decoration: underline;
            background-image: linear-gradient(to right, #9f86c0, #be95c4 50%, #5e548e 50%);
            background-size: 200% 100%;
            background-position: -100%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            transition: all 0.3s ease-in-out;
        }

        .btn-bill {
            background-color: #caf0f8;
            padding: 0.3em;
            border-radius: 0.2em;
            color: #023e8a;
            margin: 0.3em;
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
            <li class="navv"><a href="rooms.html">Available rooms</a></li>
            <li class="navv"><a href="test.php">Bill</a></li>
        </ul>
    </nav>
    <h1>List of Patients</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Disease</th>
                <th>Contact</th>
                <th>Supervisor doctor</th>
                <th>Bill</th>
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
            $sql = "SELECT * FROM patients";
            $result = $connection->query($sql);

            if (!$result) {
                die("Invalid query: " . $connection->error);
            }
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["patient_id"] . "</td>
                    <td>" . $row["full_name"] . "</td>
                    <td>" . $row["age"] . "</td>
                    <td>" . $row["address"] . "</td>
                    <td>" . $row["gender"] . "</td>   
                    <td>" . $row["disease"] . "</td>   
                    <td>" . $row["phone"] . "</td>   
                    <td>" . $row["doctor_id"] . "</td>   
                    <td><a class='btn-bill' href='test.php'>Get Bill</a></td>   
                    <td>
                        <a class='btn btn-primary btn-sm' href='updatepatient.php?patient_id=" . $row["patient_id"] . "&fn=" . $row["full_name"] . "&age=" . $row["age"] . "&add=" . $row["address"] . "&dis=" . $row["disease"] . "&ph=" . $row["phone"] . "&d_id" . $row["doctor_id"] . ">'>Update</a>
                        
                    </td>
                </tr>";
            }

            $connection->close();
            ?>
        </tbody>
    </table>
    <h3 class="appointment"><a href="insert.html">Insert patient data!</a> </h3>
    <footer class="footer">
        <p class="p-footer"> Project Done by:</p>
        <li class="li-footer">Athar Ansari <br>2BU21CS402</li>
        <li class="li-footer">Deepak Bhadgaonkar<br>2BU21CS405</li>
        <li class="li-footer">Gouri Rane<br>2BU21CS406 </li>
        <li class="li-footer">Omkar Kallekar<br>2BU21CS407</li>
        <li class="li-footer">Mrunal <br>2BU21CS413</li>
        <li class="li-footer">Saniya Bagwan <br>2BU21CS422</li>
    </footer>
</body>

</html>