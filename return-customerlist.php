<?php
include '../includes/connect.php';

// .....return........ -->

if (isset($_POST['return'])) {
    
    $vplate = $_POST['vplate'];
    $vname = $_POST['vname'];
    $vtype = $_POST['vtype'];
    $vcolor = $_POST['vcolor'];
    
    $edit = $_POST['edit_parking'];
    
    $query= "UPDATE customerlist SET  vehicle_no_plate='$vplate',vehicle_name='$vname',vehicle_type='$vtype',	vehicle_color='$vcolor' WHERE id='$edit'";
    {

    $edited = mysqli_query($conn, $query);

    if ($edited) {
        header("Location:customerlist.php");
    } else {
        die("failed" . mysqli_error($conn));
    }
}
}




