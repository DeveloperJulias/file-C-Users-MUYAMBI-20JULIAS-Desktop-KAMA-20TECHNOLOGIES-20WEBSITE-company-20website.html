
<?php
include 'includes/connect.php';

if (isset($_POST['delete'])) {
    $customer = $_POST['customer'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
   $vname=$_POST['vname'];
   $vplate=$_POST['vplate'];
   $vtype=$_POST['vtype'];
   $vcolor=$_POST['vcolor'];
    $gender= $_POST['gender'];

    // var_dump($customer, $email, $phone, $vname, $vplate, $vtype, $vcolor, $gender);
    $customer_id = $_POST['customer_id'];

    if (!$conn) {
        die("connectionERROR:"  . mysqli_connect_error());
    }

    $mysql = "DELETE FROM customer_details WHERE id='$customer_id'";

    $result= mysqli_query($conn,"$customer");
        if (!$result) {
    
echo "success";
    // header('Location: customer-details.php');
} else {
    echo "failed";
}






}