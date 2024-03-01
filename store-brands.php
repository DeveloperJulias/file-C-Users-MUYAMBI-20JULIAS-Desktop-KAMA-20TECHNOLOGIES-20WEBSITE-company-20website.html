<?php
include '../includes/connect.php';
if (isset($_POST['save'])) {

    $vehiclebrand = $_POST['vehiclebrand'];



    if (!$conn) {
        die("connectionERROR:"  . mysqli_connect_error());
    }

    $sql = "INSERT INTO  brands ( vehicle_brand ) 
            VALUES ( '$vehiclebrand ')";
    $outcome = mysqli_query($conn, $sql);
    if ($outcome) {
        
        header('Location:../brands.php');
    } else {
        echo "failed";
    }
}
