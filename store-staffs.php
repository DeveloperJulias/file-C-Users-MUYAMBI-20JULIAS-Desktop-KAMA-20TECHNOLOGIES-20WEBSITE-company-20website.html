
<?php

include '../includes/connect.php';
if (isset($_POST['save'])) {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $title = $_POST['title'];


    if (!$conn) {
        die("connectionERROR:"  . mysqli_connect_error());
    }

    $sql = "INSERT INTO staffs ( name, phone, email , title ) 
    VALUES ( '$name ','$phone ','$email ' ,'$title')";
    
    $outcome = mysqli_query($conn, $sql);
    if ($outcome) {

        header('Location:../staffs.php');
        
    } else {
        echo "failed";
    }
}
