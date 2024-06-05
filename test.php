<!DOCTYPE html>
<html>

<head>
    <title>Billing</title>
    <script>
        function calculateTotal() {
            let room_charges = document.getElementById("room_charges").value;
            let medicine_charges = document.getElementById("medicine_charges").value;
            let doctors_fees = document.getElementById("doctors_fees").value;
            let total_amount = document.getElementById("total_amount");
            total_amount.value = parseFloat(room_charges) + parseFloat(medicine_charges) + parseFloat(doctors_fees);
        }
    </script>
    <style>
        body {
            background-color: #a3c4f3;
        }

        table {
            display: flex;
            justify-content: center;
            margin-top: 20%;
        }

        .btn {
            margin-top: 2em;
            display: flex;
            justify-content: center;
        }

        .btn-inp {
            padding: 0.5em;
            background-color: #03045e;
            color: #caf0f8;
            border-radius: 0.2em;
            cursor: pointer;
        }

        .btn-inp:hover {
            transform: scaleY(-0.3em);
            box-shadow: 0 0.5em 0.5em -0.4em #fe6d73;
        }
    </style>
</head>

<body>
    <form action="#" method="post">
        <table>
            <tr>
                <th>Patient ID</th>
                <td>
                    <input type="text" id="patient_id" name="patient_id" required>
                </td>
            </tr>
            <tr>
                <th>Room Charges</th>
                <td>
                    <input type="text" id="room_charges" name="room_charges" oninput="calculateTotal()">
                </td>
            </tr>
            <tr>
                <th>Medicine Charges</th>
                <td>
                    <input type="text" id="medicine_charges" name="medicine_charges" oninput="calculateTotal()">
                </td>
            </tr>
            <tr>
                <th>Doctor's Fees</th>
                <td>
                    <input type="text" id="doctors_fees" name="doctors_fees" oninput="calculateTotal()">
                </td>
            </tr>
            <tr>
                <th>Total Amount</th>
                <td>
                    <input type="text" id="total_amount" name="total_amount" readonly>
                </td>
            </tr>

            <input type="hidden" name="bill_no" id="bill_no" value="">
            <input type="hidden" name="date" id="date" value="">
            <input type="hidden" name="room_no" id="room_no" value="">
        </table>
        <div class="btn">
            <input class="btn-inp" type="submit" value="submit" name="submit">
        </div>
    </form>

</body>

</html>

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
