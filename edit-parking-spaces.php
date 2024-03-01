<?php

include '../includes/connect.php';

// ...........edit......

if (isset($_POST['update'])) {

    $parking_space = $_POST['parking_space'];

    $current_timestamp = date('Y-m-d H:i:s');

    $update = $_POST['updatespace'];

    if (!$conn) {
        die("connectionERROR:"  . mysqli_connect_error());
    }

    $sql = "UPDATE parking_spaces  SET  parking_space='$parking_space' WHERE id='$update'";

    $outcome = mysqli_query($conn, $sql);
    if ($outcome) {
echo "active";
     header('Location: ../parking-spaces.php');
    } else {
        echo "failed";
    }
}
