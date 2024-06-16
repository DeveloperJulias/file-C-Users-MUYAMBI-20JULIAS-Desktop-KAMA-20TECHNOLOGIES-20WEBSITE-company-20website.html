

<?php

include '../includes/connect.php';

// ...........delete......

if (isset($_POST['delete'])) {

    $parking_space = $_POST['parking_space'];

    $current_timestamp = date('Y-m-d H:i:s');

    $deletespace=$_POST['deletespace'];

    if (!$conn) {
        die("connectionERROR:"  . mysqli_connect_error());
    }

    $sql = "UPDATE parking_spaces SET deleted_at ='$current_timestamp' WHERE id='$deletespace'";

    $outcome = mysqli_query($conn, $sql);
    if ($outcome) {
       echo "ndiwataabu"; 
        // header('Location:../parking_spaces.php');
    } else {
        echo "failed";
    }
}

