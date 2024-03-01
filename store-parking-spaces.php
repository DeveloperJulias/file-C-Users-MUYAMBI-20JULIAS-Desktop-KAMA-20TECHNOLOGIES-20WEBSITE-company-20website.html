<?php
include '../includes/connect.php';
if (isset($_POST['save'])) {
    $parking_space = $_POST['parking_space'];
    
    

    if (!$conn) {
        die("connectionERROR:"  . mysqli_connect_error());
    }


    $sql = "INSERT INTO  parking_spaces ( parking_space ) 
            VALUES ('$parking_space')";

    $outcome = mysqli_query($conn, $sql);
   
    header('Location: ../parking-spaces.php');
} else {
    echo "failed";
}









