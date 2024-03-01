

<?php

include '../includes/connect.php';

// ...........edit......

if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $title = $_POST['title'];

$current_timestamp = date('Y-m-d H:i:s');
// var_dump($current_timestamp);
    $update=$_POST['updatestaffs'];

    if (!$conn) {
        die("connectionERROR:"  . mysqli_connect_error());
    }

    $sql = "UPDATE  staffs SET  name = '$name', phone = '$phone', email='$email',title ='$title', updated_at='$current_timestamp' WHERE id='$update'";
    
    $outcome = mysqli_query($conn, $sql);
    if ($outcome) {
        
        header('Location:../staffs.php');
    } else {
        echo "failed";
    }
}


















    
    $edit = $_POST['customer_id'];




