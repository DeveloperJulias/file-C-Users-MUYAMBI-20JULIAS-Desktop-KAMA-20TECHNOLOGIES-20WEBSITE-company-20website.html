<?php
include 'includes/connect.php';
include 'includes/header.php';
include 'includes/top-left-nav.php'
?>
<span style="float:right">

    <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-event" class="btn btn-primary">
        <i class="ti-plus"></i> Add Parking Space
    </a>

</span><br><br>


<!-- Modal Adding customers-->
<div class="modal fade none-border" id="add-new-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Record A new</strong> parking Space</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <form action="INCLUDES/store-parking-spaces.php" method="POST">
                <div class=" container-fluid">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">

                                <label for="">Parking Space *</label>
                                <input id="" name="parking_space" type="text" class="required form-control" required>



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
        <h5 class="card-title">PARKING SPACES OVERVIEW</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>SN.</th>
                        <th>Parking Space</th>


                        <th>Actions</th>
                    </tr>
                </thead>

                <?php
                $data = "SELECT * FROM parking_spaces WHERE deleted_at IS  NULL ORDER BY id DESC ";
                $result_query = mysqli_query($conn, $data);
                $i = 0;
                foreach ($result_query as $spaces) {

                    $i++
                ?>



                    <tr>

                        <td><?= $i ?></td>
                        <td><?= $spaces['parking_space'] ?> </td>


                        <td>

                            <a href="javascript:void()" data-toggle="modal" data-target="#edit<?= $spaces['id'] ?>" class="btn btn-primary"><i class="fas fa-pencil-square-o"></i> Edit</a>
                            <a href="javascript:void()" data-toggle="modal" data-target="#delete<?= $spaces['id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    <!-- BEGIN DELETE MODAL -->

                    <div class="modal fade none-border" id="delete<?= $spaces['id'] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">DELETE PARKING SPACE: <?= $spaces['parking_space'] ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <form action="includes/delete-parking-spaces.php" method="post">
                                    <div class="modal-body">
                                        <p>Are you Sure you want to <b>delete</b> <?= $spaces['parking_space'] ?></p>

                                        <input id="" name="deletespace" value="<?= $spaces['id'] ?>" type="hidden" class="form-control" required>


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

                    <div class="modal fade none-border" id="edit<?= $spaces['id'] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit <?= $spaces['parking_space'] ?>'s Information</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>

                                <form action="includes/edit-parking-spaces.php" method="POST">
                                    <div class=" container-fluid">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <label for="parking_space">Parking Spaces *</label>
                                                    <input id="" value="<?= $spaces['parking_space'] ?>" name="parking_space" type="text" class="required form-control" required>
                                                    <input id="" value="<?= $spaces['id'] ?>" name="updatespace" type="hidden" class="required form-control" required>



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