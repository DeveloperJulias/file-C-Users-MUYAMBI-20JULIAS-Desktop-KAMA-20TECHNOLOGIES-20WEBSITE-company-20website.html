<?php

include '../includes/connect.php';

// ...........delete......

if (isset($_POST['delete'])) {

    $vehiclebrand = $_POST['vehiclebrand'];
    $current_timestamp = date('Y-m-d H:i:s');

    $deletebrand=$_POST['deletebrand'];

    if (!$conn) {
        die("connectionERROR:"  . mysqli_connect_error());
    }

    $sql = "UPDATE brands SET deleted_at ='$current_timestamp' WHERE id='$deletebrand'";

    $outcome = mysqli_query($conn, $sql);
    if ($outcome) {
        
        header('Location:../brands.php');
    } else {
        echo "failed";
    }
}
