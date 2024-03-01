

<?php

include '../includes/connect.php';

// ...........edit......

if (isset($_POST['update'])) {

    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

$current_timestamp = date('Y-m-d H:i:s');
// var_dump($current_timestamp);
    $update=$_POST['updatecustomer'];

    if (!$conn) {
        die("connectionERROR:"  . mysqli_connect_error());
    }

    $sql = "UPDATE  customers SET  full_name = '$fullname', phone = '$phone', email='$email', updated_at='$current_timestamp' WHERE id='$update'";
    
    $outcome = mysqli_query($conn, $sql);
    if ($outcome) {
        
        header('Location:../customer.php');
    } else {
        echo "failed";
    }
}


















    
    $edit = $_POST['customer_id'];




