
<?php

include '../includes/connect.php';
if (isset($_POST['save'])) {

    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];


    if (!$conn) {
        die("connectionERROR:"  . mysqli_connect_error());
    }

    $sql = "INSERT INTO customers ( full_name, phone, email ) 
    VALUES ( '$full_name ','$phone ','$email ')";

    $outcome = mysqli_query($conn, $sql);
    if ($outcome) {

        header('Location:../customer.php');
        
    } else {
        echo "failed";
    }
}
