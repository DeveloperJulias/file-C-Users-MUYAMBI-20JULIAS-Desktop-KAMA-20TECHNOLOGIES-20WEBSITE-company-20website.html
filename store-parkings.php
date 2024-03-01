<?php
include '../includes/connect.php';
if (isset($_POST['save'])) {

    $fullname = $_POST['fullname'];
    $vehiclebrand = $_POST['vehiclebrand'];
    $number_plate = $_POST['number_plate'];
    $parking_lot = $_POST['parking_lot'];
    $color = $_POST['color'];
    $parking_lot = $_POST['parking_lot'];
    $parking_space = $_POST['parking_space'];
    $duration = $_POST['duration'];
    $service_provider = $_POST['service_provider'];


    if (!$conn) {
        die("connectionERROR:"  . mysqli_connect_error());
    }


    $customer = "INSERT INTO parking_details (customer_id, vehicle_brand_id, number_plate, color, parking_lot_id, parking_space_id, duration, service_provider_id) 
    VALUES ('$fullname', '$vehiclebrand','$number_plate', '$color', '$parking_lot','$parking_space', '$duration ', '$service_provider')";


    if (mysqli_query($conn, $customer)) {
        header("Location:../parking-details.php");
    } else {
        die("customer failed" . mysqli_error($conn));
    }
}
