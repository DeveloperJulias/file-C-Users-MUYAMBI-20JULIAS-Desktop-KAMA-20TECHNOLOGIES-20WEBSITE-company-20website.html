<?php
include 'includes/header.php';
include 'includes/top-left-nav.php';
?>


<span style="float:right">

    <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-event" class="btn btn-primary">
        <i class="fas fa-user"></i> New Staff Member
    </a>

</span><br><br>


<!-- Modal Adding staffs-->
<div class="modal fade none-border" id="add-new-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Record A new</strong> Staff Member</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <form action="includes/store-staffs.php" method="POST">
                <div class=" container-fluid">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">


                                <label for="">Staff Member <span class="text-danger">*</span></label>
                                <input id="" name="name" type="text" class="form-control" required>

                                <label for="">Phone <span class="text-danger">*</span></label>
                                <input id="" name="phone" type="text" class="form-control" required>

                                <label for=""> Email<span class="text-danger">*</span></label>
                                <input id="" name="email" type="text" class="form-control" required>

                                <label for="">Role <span class="text-danger">*</span></label>
                                <input id="" name="title" type="text" class="form-control" required>


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
        <h5 class="card-title">STAFF MEMBERS </h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>SN</th>

                        <th>Staff Member</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Role</th>


                        <th>Actions</th>
                    </tr>
                </thead>

                <?php
                $my_data = "SELECT * FROM staffs WHERE deleted_at IS NULL ORDER BY id DESC ";
                $parkresult = mysqli_query($conn, $my_data);
                $i = 0;
                foreach ($parkresult as $lots) {

                    $i++;
                ?>
                    <tr>
                        <td><?= $i ?> </td>


                        <td><?= $lots['name'] ?> </td>
                        <td><?= $lots['phone'] ?> </td>
                        <td><?= $lots['email'] ?> </td>
                        <td><?= $lots['title'] ?> </td>

                        <td>
                            <a href="#" data-toggle="modal" data-target="#return<?= $lots['id'] ?>" class="btn btn-info"><i class="fa fa-refresh"></i> Return</a>
                            <a href="#" data-toggle="modal" data-target="#edit<?= $lots['id'] ?>" class="btn btn-primary"><i class="fas fa-pencil-square-o"></i> Edit</a>
                            <a href="#" data-toggle="modal" data-target="#delete<?= $lots['id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    <!-- BEGIN DELETE MODAL -->

                    <div class="modal fade none-border" id="delete<?= $lots['id'] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">DELETE STAFF MEMBER: <?= $lots['name'] ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <form action="includes/delete-staffs.php" method="POST">
                                    <div class="modal-body">
                                        <p>Are you Sure you want to <b>delete</b> <?= $lots['name'] ?></p>

                                

                                        <input id="" name="name" value="<?= $lots['id'] ?>" type="hidden" class="form-control" required>


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
                                    <h4 class="modal-title">Edit <?= $lots['name'] ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>

                                <form action="includes/edit-staffs.php" method="POST">
                                    <div class=" container-fluid">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="">Staff Member <span class="text-danger">*</span></label>
                                                    <input id="" name="name" value="<?= $lots['name'] ?>" type="text" class="form-control" required>
                                                    <input id="" name="updatestaffs" value="<?= $lots['id'] ?>" type="hidden" class="form-control" required>

                                                    <label for="">Phone <span class="text-danger">*</span></label>
                                                    <input id="" name="phone" value="<?= $lots['phone'] ?>" type="text" class="form-control" required>
                                                    <input id="" name="updatestaffs" value="<?= $lots['id'] ?>" type="hidden" class="form-control" required>

                                                    <label for="">email<span class="text-danger">*</span></label>
                                                    <input id="" name="email" value="<?= $lots['email'] ?>" type="text" class="required form-control" required>
                                                    <input id="" name="updatestaffs" value="<?= $lots['id'] ?>" type="hidden" class="form-control" required>

                                                    <label for="">Role<span class="text-danger">*</span></label>
                                                    <input id="" name="title" value="<?= $lots['title'] ?>" type="text" class="required form-control" required>
                                                    <input id="" name="updatestaffs" value="<?= $lots['id'] ?>" type="hidden" class="form-control" required>


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

                    <!-- <div class="modal fade none-border" id="return<?= $lots['id'] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"> <?= $lots['full_name'] ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>

                                <form action="return-vehicle_brands.php" method="POST">
                                    <div class=" container-fluid">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <label for="">Customer<span class="text-danger">*</span></label>
                                                    <input id="" name="name" value="<?= $lots['full_name'] ?>" type="text" class="required form-control" required>
                                                    <input id="" name="editstaffs" value="<?= $lots['id'] ?>" type="hidden" class="required form-control" required>
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
                    </div> -->
                    <!-- ......end....return...... -->
                <?php    } ?>
            </table>


        </div>


    </div>

</div>

<?php include 'includes/footer.php' ?>