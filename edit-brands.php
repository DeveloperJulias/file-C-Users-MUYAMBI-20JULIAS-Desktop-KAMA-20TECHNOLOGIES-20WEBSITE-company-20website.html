<?php

include '../includes/connect.php';

// ...........edit......

if (isset($_POST['update'])) {

    $vehiclebrand = $_POST['vehiclebrand'];
$current_timestamp = date('Y-m-d H:i:s');
// var_dump($current_timestamp);
    $update=$_POST['updatebrand'];

    if (!$conn) {
        die("connectionERROR:"  . mysqli_connect_error());
    }

    $sql = "UPDATE  brands SET vehicle_brand='$vehiclebrand', updated_at='$current_timestamp' WHERE id='$update'";

    $outcome = mysqli_query($conn, $sql);
    if ($outcome) {
        
        header('Location:../brands.php');
    } else {
        echo "failed";
    }
}

