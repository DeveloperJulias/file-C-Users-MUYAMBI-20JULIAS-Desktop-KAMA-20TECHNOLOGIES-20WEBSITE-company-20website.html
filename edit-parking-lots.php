

<?php

include '../includes/connect.php';

// ...........edit......

if (isset($_POST['update'])) {

    $parkinglot = $_POST['parkinglot'];
    $maxparkingspaces = $_POST['capacity'];

    $current_timestamp = date('Y-m-d H:i:s');

    $update = $_POST['updateparkinglot'];

    if (!$conn) {
        die("connectionERROR:"  . mysqli_connect_error());
    }

    $sql = "UPDATE  parking_lots SET parking_lot = ' $parkinglot', max_parking_spaces = '$maxparkingspaces', updated_at='$current_timestamp' WHERE id='$update'";

    $outcome = mysqli_query($conn, $sql);
    if ($outcome) {

        header('Location:../parking-lots.php');
    } else {
        echo "failed";
    }
}
