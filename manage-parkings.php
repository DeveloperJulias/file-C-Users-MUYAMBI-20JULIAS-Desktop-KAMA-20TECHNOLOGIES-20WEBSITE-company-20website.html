<?php
include 'includes/connect.php';
include 'includes/header.php';
include 'includes/top-left-nav.php'
?>


<span style="float:right">

    <a href="parking-details.php" class="btn btn-primary"> <i class="fas fa-home"></i>Park Vehicle </a>


</span><br><br>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">DAILY PARKINGS OVERVIEW</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Customer Name</th>
                        <th>Vehicle Brand </th>
                        <th>Number Plate.</th>
                        <th>Color</th>
                        <th>Parking Lot</th>
                        <th>Parking Space</th>
                        <th>Phone</th>
                        <th>Service Provider</th>



                        <th>Actions</th>
                    </tr>
                </thead>

                <?php
                $my_data = "SELECT * FROM parking_details  JOIN customers ON parking_details.id = customers.id 
                JOIN brands ON customers.id= brands.id JOIN parking_lots ON brands.id = parking_lots.id JOIN parking_spaces ON parking_lots.id = parking_spaces.id JOIN staffs ON  parking_spaces.id = staffs.id 
                ";
                $parkresult = mysqli_query($conn, $my_data);
                $i = 0;
                foreach ($parkresult as $view_customer) {

                    $i++;
                ?>
                    <tr>
                        <td><?= $i ?> </td>
                        <td><?= $view_customer['full_name'] ?> </td>
                        <td><?= $view_customer['vehicle_brand'] ?> </td>
                        <td><?= $view_customer['number_plate'] ?> </td>
                        <td><?= $view_customer['color'] ?> </td>
                        <td><?= $view_customer['parking_lot'] ?> </td>
                        <td><?= $view_customer['parking_space'] ?> </td>
                        <td><?= $view_customer['phone'] ?> </td>
                        <td><?= $view_customer['name'] ?> </td>

                        <td>

                            <a href="javascript:void()" data-toggle="modal" data-target="#edit<?= $view_customer['id'] ?>" class="btn btn-primary"><i class="fas fa-pencil-square-o"></i> Edit</a>
                            <a href="javascript:void()" data-toggle="modal" data-target="#delete<?= $view_customer['id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>

                <?php } ?>

            </table>


        </div>


    </div>

</div>

<?php include 'includes/footer.php' ?>