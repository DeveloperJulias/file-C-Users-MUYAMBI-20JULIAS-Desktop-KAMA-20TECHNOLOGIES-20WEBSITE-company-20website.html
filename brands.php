<?php
include 'includes/connect.php';
include 'includes/header.php';
include 'includes/top-left-nav.php'
?>


<span style="float:right">

    <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-event" class="btn btn-primary">
        <i class="fas fa-car"></i> Add Vehicle Brand
    </a>

</span><br><br>


<!-- Modal Adding customers-->
<div class="modal fade none-border" id="add-new-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Record A new</strong> customer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <form action="includes/store-brands.php" method="POST">
                <div class=" container-fluid">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">


                                <label for="">Vehicle Brand <span class="text-danger">*</span></label>
                                <input id="" name="vehiclebrand" type="text" class="form-control" required>




                            </div>
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
<!-- END MODAL -->


<div class="card">
    <div class="card-body">
        <h5 class="card-title">VEHICLES RECORDED </h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>SN</th>


                        <th>Vehicle Brands</th>


                        <th>Actions</th>
                    </tr>
                </thead>

                <?php
                $my_data = "SELECT * FROM brands WHERE deleted_at IS NULL ORDER BY id DESC";
                $parkresult = mysqli_query($conn, $my_data);
                $i = 0;
                foreach ($parkresult as $lots) {

                    $i++;
                ?>
                    <tr>
                        <td><?= $i ?> </td>


                        <td><?= $lots['vehicle_brand'] ?> </td>





                        <td>
                            <a href="javascript:void()" data-toggle="modal" data-target="#return<?= $lots['id'] ?>" class="btn btn-info"><i class="fa fa-refresh"></i> Return</a>
                            <a href="javascript:void()" data-toggle="modal" data-target="#edit<?= $lots['id'] ?>" class="btn btn-primary"><i class="fas fa-pencil-square-o"></i> Edit</a>
                            <a href="javascript:void()" data-toggle="modal" data-target="#delete<?= $lots['id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    <!-- BEGIN DELETE MODAL -->

                    <div class="modal fade none-border" id="delete<?= $lots['id'] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">DELETE CUSTOMER: <?= $lots['vehicle_brand'] ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <form action="includes/delete-brands.php" method="post">
                                    <div class="modal-body">
                                        <p>Are you Sure you want to <b>delete</b> <?= $lots['vehicle_brand'] ?></p>

                                        <input id="" name="deletebrand" value="<?= $lots['id'] ?>" type="hidden" class="form-control" required>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="delete" class="btn btn-secondary ">Yes</button>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>







                    <!-- -----edit--- -->


                    <div class="modal fade none-border" id="edit<?= $lots['id'] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit A <?= $lots['vehicle_brand'] ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>

                                <form action="includes/edit-brands.php" method="POST">
                                    <div class=" container-fluid">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">


                                                    <label for="">Vehicle Brand<span class="text-danger">*</span></label>
                                                    <input id="" name="vehiclebrand" value="<?= $lots['vehicle_brand'] ?>" type="text" class="required form-control" required>
                                                    <input id="" name="updatebrand" value="<?= $lots['id'] ?>" type="hidden" class="form-control" required>



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="update" class="btn btn-secondary">Save</button>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>




                        </div>
                    </div>
                    <!-- ...........return................ -->

                    <div class="modal fade none-border" id="return<?= $lots['id'] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"> <?= $lots['vehicle_brand'] ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>

                                <form action="return-vehicle_brands.php" method="POST">
                                    <div class=" container-fluid">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="">Vehicle Brand<span class="text-danger">*</span></label>
                                                    <input id="" name="vehiclebrand" value="<?= $lots['vehicle_brand'] ?>" type="text" class="required form-control" required>
                                                    <input id="" name="edit_parking" value="<?= $lots['id'] ?>" type="hidden" class="required form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="return" class="btn btn-secondary">Save</button>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>




                        </div>
                    </div>
                    <!-- ......end....return...... -->
                <?php    } ?>
            </table>


        </div>


    </div>

</div>





<?php include 'includes/footer.php' ?>