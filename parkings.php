<?php
include 'includes/connect.php';
include 'includes/header.php';
include 'includes/top-left-nav.php'
?>


<div class="page-breadcrumb md-12">

    <div class=" text-center p-3 mb-2 md-12 bg-dark text-white">
        <h4>PARK BOARDING</h4>
    </div>

</div>

<div class="container-fluid">

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="store-parkings.php" method="post">

                        <div class=" container-fluid">
                            <div class="row">



                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label>Customer Name <span class="text-danger">*</span></label>

                                        <select by id="id" class="form-control">
                                            <option> -- select customer --</option>

                                            <?php
                                            $my_data = "SELECT * FROM customers";
                                            $result = mysqli_query($conn, $my_data);
                                            $only_details  = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            foreach ($only_details  as $only_detail) { ?>
                                                <option value="<?= $only_detail['id'] ?>"> <?= $only_detail['full_name'] ?> </option>
                                            <?php  } ?>
                                        </select>
                                    </div>


                                    <div class="form-group">


                                        <label>Vehicle Plate Number <span class="text-danger">*</span></label>
                                        <input type="text" name="vplate" class="form-control" required>


                                    </div>
                                    <div class="form-group">
                                        <label>Vehicle Name <span class="text-danger">*</span></label>
                                        <select name="vname" class="form-control">
                                            <option> -- select vehicle Name --</option>

                                            <?php
                                            $my_data = "SELECT * FROM customerlist";
                                            $result = mysqli_query($conn, $my_data);
                                            $only_details  = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            foreach ($only_details  as $only_detail) { ?>
                                                <option value="<?= $only_detail['id'] ?>"> <?= $only_detail['vehicle_name'] ?> </option>
                                            <?php  } ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Vehicle Type <span class="text-danger">*</span></label>
                                        <select name="vtype" class="form-control">
                                            <option> -- select Vehicle Type --</option>

                                            <?php
                                            $my_data = "SELECT * FROM customerlist";
                                            $result = mysqli_query($conn, $my_data);
                                            $only_details  = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            foreach ($only_details  as $only_detail) { ?>
                                                <option value="<?= $only_detail['id'] ?>"> <?= $only_detail['vehicle_type'] ?> </option>
                                            <?php  } ?>
                                        </select>

                                    </div>

                                    <div class="form-group">

                                        <label>Vehicle Color <span class="text-danger">*</span></label>
                                        <select name="vcolor" class="form-control">
                                            <option> -- select color --</option>

                                            <?php
                                            $my_data = "SELECT * FROM customerlist";
                                            $result = mysqli_query($conn, $my_data);
                                            $only_details  = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            foreach ($only_details  as $only_detail) { ?>
                                                <option value="<?= $only_detail['id'] ?>"> <?= $only_detail['vehicle_color'] ?> </option>
                                            <?php  } ?>

                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label>Parking Lot<span class="text-danger">*</span></label>
                                        <select name="parking_lot" class="form-control">
                                            <option> -- select parking lot --</option>

                                            <?php
                                            $my_data = "SELECT * FROM parking_lots";
                                            $result = mysqli_query($conn, $my_data);
                                            $only_details  = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            foreach ($only_details  as $only_detail) { ?>
                                                <option value="<?= $only_detail['parking_lots_id'] ?>"> <?= $only_detail['parking_lot'] ?> </option>
                                            <?php  } ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Parking Space<span class="text-danger">*</span></label>
                                        <select name="parking_space" class="form-control">
                                            <option> -- select A parking space --</option>

                                            <?php
                                            $my_data = "SELECT * FROM parking_space";
                                            $result = mysqli_query($conn, $my_data);
                                            $only_details  = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            foreach ($only_details  as $only_detail) { ?>
                                                <option value="<?= $only_detail['id'] ?>"> <?= $only_detail['parking_space'] ?> </option>
                                            <?php  } ?>

                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label>Date/Time<span class="text-danger">*</span></label>
                                        <input type="datetime-local" class="form-control" name="duration" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Parking Attendant<span class="text-danger">*</span></label>
                                        <select name="attendant" class="form-control">
                                            <option> -- select A parking Attendant --</option>

                                            <?php
                                            $my_data = "SELECT * FROM parking_lots";
                                            $result = mysqli_query($conn, $my_data);
                                            $only_details  = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            foreach ($only_details  as $only_detail) { ?>
                                                <option value="<?= $only_detail['parking_lots_id'] ?>"> <?= $only_detail['parking_attendant'] ?> </option>
                                            <?php  } ?>

                                        </select>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" name="saved" class="btn btn-secondary">Save</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </form>



                </div>


            </div>
        </div>

    </div>



</div>
<?php include 'includes/footer.php' ?>