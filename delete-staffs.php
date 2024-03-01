<?php

include '../includes/connect.php';

// ...........delete......

if (isset($_REQUEST['delete'])) {

    $name = $_POST['name'];

    var_dump($id);
    

    $current_timestamp = date('Y-m-d H:i:s');

    $deletestaffs = $_POST['name'];

    if (!$conn) {
        die("connectionERROR:"  . mysqli_connect_error());
    }

    $sql = "UPDATE customers SET deleted_at ='$current_timestamp' WHERE id='$delete'";

    $outcome = mysqli_query($conn, $sql);
    if ($outcome) {
        
        header('Location:../staffs.php');
    } else {
        echo "failed";
    }
}
