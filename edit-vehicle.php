<?php
include 'includes/connect.php';

// .....edit........ -->

if (isset($_POST['edit'])) {
        $model = $_POST['model'];
        $type = $_POST['type'];
        $number_plate = $_POST['number_plate'];
        
        


    $my_edit = $_POST['my_edit'];

    $edit = "UPDATE vehicle_details SET model='$model', type ='$type ',  number_plate='$number_plate' WHERE id='$my_edit'";
    $editresult = mysqli_query($conn, $edit);

    if ($editresult) {
        header("Location:vehicle-details.php");
    } else {
        die("failed" . mysqli_error($conn));
    }
}



