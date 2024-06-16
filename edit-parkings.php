
<?php
include 'includes/connect.php';

if (isset($_POST['edit'])) {
    $customer = $_POST['customer'];
    $vplate = $_POST['vplate'];
    $vname = $_POST['vname'];
    $vtype = $_POST['vtype'];
    $vcolor = $_POST['vcolor'];
    $parking_lot = $_POST['parking_lot'];
    $parking_space = $_POST['parking_space'];
    $duration = $_POST['duration'];
    $attendant = $_POST['attendant'];


    // var_dump($customer, $email, $phone, $vname, $vplate, $vtype, $vcolor, $gender);
    if (!$conn) {
        die("connectionERROR:"  . mysqli_connect_error());
    }
    $my_edit = $_POST['customer'];


    $edit = "UPDATE customer_details SET customer_name='$customer',vehicle_plate_number='$vplate', vehicle_name='$vname', vehicle_type='$vtype', vehicle_color='$vcolor',parking_lot='$parking_lot', parking_space='$parking_space', duration='$duration ', parking_attendant='$attendant WHERE id='$my_edit'";
    
    $editresult = mysqli_query($conn, $edit);

    $result= mysqli_query($conn,"$customer");
        if (!$result) {
    
echo "success";
    // header('Location: customer-details.php');
} else {
    echo "failed";
}






}



