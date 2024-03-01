<?php
include 'includes/connect.php';
include 'includes/header.php';
include 'includes/top-left-nav.php'
?>


<span style="float:right">

    <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-event" class="btn btn-primary">
        <i class="ti-plus"></i> Add Parking Lot
    </a>

</span><br><br>


<!-- Modal Adding customers-->
<div class="modal fade none-border" id="add-new-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Record A new</strong> parking lot</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <form action="includes/store-parking-lots.php" method="POST">
                <div class=" container-fluid">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">

                                <label for="">Parking Lot <span class="text-danger">*</span></label>
                                <input id="" name="parkinglot" type="text" class="form-control" required>

                                <label for=""> Maximum Parking Spaces*</label>
                                <input id="" name="capacity" type="text" class="required form-control" required>



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
        <h5 class="card-title">PARKING LOTS MANAGEMENT</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Parking Lot</th>
                        <th>Maximum Parking Spaces</th>

                        <th>Actions</th>
                    </tr>
                </thead>

                <?php
                $my_data = "SELECT * FROM parking_lots WHERE deleted_at IS NULL ORDER BY id DESC";
                $parkresult = mysqli_query($conn, $my_data);
                $i = 0;
                foreach ($parkresult as $lots) {

                    $i++;
                ?>
                    <tr>
                        <td><?= $i ?> </td>
                        <td><?= $lots['parking_lot'] ?> </td>
                        <td><?= $lots['max_parking_spaces'] ?> </td>


                        <td>

                            <a href="javascript:void()" data-toggle="modal" data-target="#edit<?= $lots['id'] ?>" class="btn btn-primary"><i class="fas fa-pencil-square-o"></i> Edit</a>
                            <a href="javascript:void()" data-toggle="modal" data-target="#delete<?= $lots['id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    <!-- BEGIN DELETE MODAL -->

                    <div class="modal fade none-border" id="delete<?= $lots['id'] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">DELETE PARKING LOT: <?= $lots['parking_lot'] ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <form action="includes/delete-parking-lots.php" method="post">
                                    <div class="modal-body">
                                        <p>Are you Sure you want to <b>delete</b> <?= $lots['parking_lot'] ?></p>

                                        <input id="" name="deleteparkinglot" value="<?= $lots['id'] ?>" type="hidden" class="required form-control" required>


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
                                    <h4 class="modal-title">Edit <?= $lots['parking_lot'] ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>

                                <form action="includes/edit-parking-lots.php" method="POST">
                                    <div class=" container-fluid">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">



                                                    <label for="parking_lot">Parking Lot *</label>
                                                    <input id="" name="parkinglot" value="<?= $lots['parking_lot'] ?>" type="text" class="required form-control" required>
                                                    <input id="" name="updateparkinglot" value="<?= $lots['id'] ?>" type="hidden" class=" form-control" required>


                                                    <label for="type">Maximum Parking Spaces*</label>
                                                    <input id="" name="capacity" value="<?= $lots['max_parking_spaces'] ?>" type="text" class="required form-control" required>
                                                    <input id="" name="updateparkinglot" value="<?= $lots['id'] ?>" type="hidden" class="form-control" required>



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





                        <?php    } ?>


                        </div>
            </table>

        </div>

    </div>









</div>


<?php include 'includes/footer.php' ?>