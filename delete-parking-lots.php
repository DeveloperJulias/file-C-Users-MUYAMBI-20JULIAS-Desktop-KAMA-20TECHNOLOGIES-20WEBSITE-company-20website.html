

<?php

include '../includes/connect.php';

// ...........delete......

if (isset($_POST['delete'])) {

    $parkinglot = $_POST['parkinglot'];
    $maxparkingspaces = $_POST['capacity'];

    
    $current_timestamp = date('Y-m-d H:i:s');

    $deleteparkinglot=$_POST['deleteparkinglot'];

    if (!$conn) {
        die("connectionERROR:"  . mysqli_connect_error());
    }

    $sql = "UPDATE  parking_lots  SET deleted_at ='$current_timestamp' WHERE id='$deleteparkinglot'";

    $outcome = mysqli_query($conn, $sql);
    if ($outcome) {
    
        header('Location:../parking-lots.php');
    } else {
        echo "failed";
    }
}

