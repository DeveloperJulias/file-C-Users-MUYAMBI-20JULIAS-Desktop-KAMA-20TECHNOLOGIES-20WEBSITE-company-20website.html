<?php

include '../includes/connect.php';

// ...........delete......

if (isset($_REQUEST['delete'])) {

    $fullname = $_POST['full_name'];

    var_dump($id);
    

    $current_timestamp = date('Y-m-d H:i:s');

    $deletecustomer = $_POST['full_name'];

    if (!$conn) {
        die("connectionERROR:"  . mysqli_connect_error());
    }

    $sql = "UPDATE customers SET deleted_at ='$current_timestamp' WHERE id='$deletecustomer'";

    $outcome = mysqli_query($conn, $sql);
    if ($outcome) {
        
        header('Location:../customer.php');
    } else {
        echo "failed";
    }
}
