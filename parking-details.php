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
                    <form action="includes/store-parkings.php" method="post" autocomplete="off">

                        <div class=" container-fluid">
                            <div class="row">



                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label>Customer Name <span class="text-danger">*</span></label>
                                        </select>
                                        <select name="fullname" class="select2 form-control m-t-15" style="height: 36px;width: 100%;">


                                            <optgroup>

                                                <option value="" selected>select Customer Name</option>
                                                <?php
                                            $my_data = "SELECT * FROM customers";
                                            $result = mysqli_query($conn, $my_data);
                                            $only_details  = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            foreach ($only_details  as $only_detail) { ?>
                                                <option value="<?= $only_detail['id'] ?>"> <?= $only_detail['full_name'] ?> </option>
                                            <?php  } ?>
                                            </optgroup>
                                        </select>

                                    </div>


                                    <div class="form-group">

                                        <label>Vehicle Brand <span class="text-danger">*</span></label>  
                                        <select name="vehiclebrand" class="select2 form-control m-t-15" style="height: 36px;width: 100%;">
                                            <optgroup label="">

                                                <option value="" selected>select Vehicle Brand</option>
                                                <?php
                                            $my_data = "SELECT * FROM brands";
                                            $result = mysqli_query($conn, $my_data);
                                            $only_details  = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            foreach ($only_details  as $only_detail) { ?>
                                                <option value="<?= $only_detail['id'] ?>"> <?= $only_detail['vehicle_brand'] ?> </option>
                                            <?php  } ?>

                                            </optgroup>
                                        </select>

                                    </div>
                                    <div class="form-group style="height: 36px;width: 100%;">
                                        <label> No. Plate <span class="text-danger">*</span></label>
                                        <input type="texr" name="number_plate" class="form-control">

                                    </div>
                                    <div class="form-group style="height: 36px;width: 100%;">
                                        <label>Color <span class="text-danger">*</span></label>
                                        <input type="text" name="color" class="form-control">


                                    </div>


                                </div>

                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label>Parking Lot<span class="text-danger">*</span></label>                                                                     
                                        <select name="parking_lot" class="select2 form-control m-t-15" style="height: 36px;width: 100%;">
                                            <optgroup label="">
                                                <option value="" selected>select parking lot </option>
                                                <?php
                                            $my_data = "SELECT * FROM parking_lots";
                                            $result = mysqli_query($conn, $my_data);
                                            $only_details  = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            foreach ($only_details  as $only_detail) { ?>
                                                <option value="<?= $only_detail['id'] ?>"> <?= $only_detail['parking_lot'] ?> </option>
                                            <?php  } ?>
                                            </optgroup>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label>Parking Space<span class="text-danger">*</span></label>
                                        </select>
                                        <select name="parking_space" class="select2 form-control m-t-15" style="height: 36px;width: 100%;">
                                            <optgroup>

                                                <option value="" selected>select A parking space</option>
                                                <?php
                                                $my_data = "SELECT * FROM parking_spaces";
                                                $result = mysqli_query($conn, $my_data);
                                                $only_details  = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                foreach ($only_details  as $only_detail) { ?>
                                                    <option value="<?= $only_detail['id'] ?>"> <?= $only_detail['parking_space'] ?> </option>
                                                <?php  } ?>
                                            </optgroup>
                                        </select>

                                    </div>

                                    <div class="form-group style="height: 36px;width: 100%;">
                                        <label>Date/Time<span class="text-danger">*</span></label>
                                        <input type="datetime-local" class="form-control" name="duration" required>
                                    </div>

                                    <label>Service Provider<span class="text-danger">*</span></label>

                                    <select name="name" class="select2 form-control m-t-15" style="height: 36px;width: 100%;">


                                        <optgroup label="">

                                            <option value="" selected>Staff Member</option>
                                            <?PHP
                                            $my_data = "SELECT * FROM staffs";
                                                $result = mysqli_query($conn, $my_data);
                                                $only_details  = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                foreach ($only_details  as $only_detail) { ?>
                                                    <option value="<?= $only_detail['id'] ?>"> <?= $only_detail['name'] ?> </option>
                                                <?php  } ?>

                                        </optgroup>
                                    </select>




                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" name="save" class="btn btn-secondary">Save</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </form>



                </div>


            </div>
        </div>

    </div>



</div>
<?php include 'includes/footer.php' ?>