
<?php

include '../includes/connect.php';
if (isset($_POST['save'])) {

    $parkinglot = $_POST['parkinglot'];
    $maxparkingspaces = $_POST['capacity'];


    if (!$conn) {
        die("connectionERROR:"  . mysqli_connect_error());
    }

    $sql = "INSERT INTO parking_lots ( parking_lot, max_parking_spaces )  VALUES ( '$parkinglot ','$maxparkingspaces ')";
    $outcome = mysqli_query($conn, $sql);

    if ($outcome) {

        header('Location:../parking-lots.php');
    } else {
        echo "failed";
    }
}
