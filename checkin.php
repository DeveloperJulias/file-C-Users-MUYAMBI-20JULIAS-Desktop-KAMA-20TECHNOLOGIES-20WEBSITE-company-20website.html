<div class="modal fade none-border" id="add-new-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Customer </strong>Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <form action="store-customer-details.php" method="POST">
                <div class=" container-fluid">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">

                                <label for="userName">Customer Name *</label>
                                <input id="userName" name="username" type="text" class="required form-control" required>

                                <label for="name">Phone *</label>
                                <input id="phone" name="phone" type="text" class="required form-control" minlength="10" maxlength="12">



                            </div>

                            <div class="col-md-6">

                                <label for="email">Email </label>
                                <input id="email" name="email" type="text" class="required email form-control">


                                <label for="gender">Gender *</label>
                                <select id="gender" name="gender" class="required form-control" required>
                                    <option selected>choose.........</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="send" class="btn btn-danger">Save</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL -->

<!-- tables/.... -->
<?php
include 'includes/connect.php';
include 'includes/header.php';
include 'top-left-nav.php'
?>


<span style="float:right">
        
        <a href="customer-register.php" class="btn btn-primary">  Add Customer </a> 
    

</span><br><br>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">View Customer Details</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Customer name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <?php
                $get_data = "SELECT * FROM customers";

                $my_result = mysqli_query($conn, $get_data);
                $i = 0;
                foreach ($my_result as $details) {
                    $i++;
                  
                ?>
                    <tr>
                        <td><?= $i ?> </td>
                        <td><?= $details['username'] ?> </td>
                        <td><?= $details['gender'] ?> </td>
                        <td><?= $details['email'] ?> </td>
                        <td><?= $details['phone'] ?></td>
                        <td>
                            <!-- <a href="javascript:void()" data-toggle="modal" data-target="#view<?= $details['id'] ?>" class="btn btn-success">View<i class=" fas fa-eye-slash"></i></a> -->
                            <a href="javascript:void()" data-toggle="modal" data-target="#edit<?= $details['id'] ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i>Edit</a>
                            <a href="javascript:void()" data-toggle="modal" data-target="#delete<?= $details['id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a>
                        </td>
                    </tr>
                    <!-- BEGIN DELETE MODAL -->

                    <div class="modal fade none-border" id="delete<?= $details['id'] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">DELETE CUSTOMER: <?= $details['username'] ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <form action="delete-customer.php" method="post">
                                    <div class="modal-body">
                                        <p>Are you Sure you want to <b>delete</b> <?= $details['username'] ?></p>

                                        <input id="" name="customer_id" value="<?= $details['id'] ?>" type="hidden" class="required form-control" required>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">close</button>
                                        <button type="submit" name="delete" class="btn btn-danger ">Yes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- Modal view -->




                    <!-- <div class="modal fade none-border" id="view<?= $details['id'] ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">View <?= $details['username'] ?>Details</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>

                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-sm-4" style="background-color:lavender;">
                                                <h6>Name:</h6>
                                                <h6>Email:</h6>
                                                <h6>Phone No.:</h6>
                                                <h6>Parking Date:</h6>
                                                <h6>Car No. Plate:</h6>
                                                <h6>Duration:</h6>
                                                <h6>City:</h6>
                                            </div>



                                            <div class="col-sm-8" style="background-color:lavenderblush;border:red">

                                                <h6><?= $details['username'] ?> </h6>
                                                <h6><?= $details['email'] ?> </h6>
                                                <h6><?= $details['phone'] ?></h6>
                                                <h6><?= $details['parking_date'] ?></h6>
                                                <h6><?= $details['car_no_plate'] ?></h6>
                                                <h6><?= $details['days'] ?></h6>
                                                <h6><?= $details['city'] ?> </h6>

                                            </div>


                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- END MODAL -->
        </div>

        <!-- -----edit--- -->


        <div class="modal fade none-border" id="edit<?= $details['id'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><strong>Parking </strong>Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <form action="edit-customer.php" method="POST">
                        <div class=" container-fluid">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <label for="userName">Customer Name *</label>
                                        <input id="" name="username" value="<?= $details['username'] ?>" type="text" class="required form-control" required>
                                        <input id="" name="my_edit" value="<?= $details['id'] ?>" type="hidden" class="required form-control" required>

                                        <label for="name">Phone *</label>
                                        <input id="name" name="phone" type="text" value="<?= $details['phone'] ?>" class="required form-control" minlength="10" maxlength="12">


                                    </div>

                                    <div class="col-md-6">

                                        <label for="email">Email </label>
                                        <input id="email" name="email" type="text" value="<?= $details['email'] ?>" class="required email form-control">

                                        <label for="gender">Gender *</label>
                                        <select id="gender" name="gender" type="number" value="<?= $details['gender'] ?>" class="required form-control" min="1">
                                            <option selected>choose.........</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>




                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            <button type="submit" name="edit" class="btn btn-danger">Save</button>
                        </div>
                    </form>
                </div>





            <?php    } ?>
            </table>
            </div>

        </div>









    </div>


    <?php include 'includes/footer.php' ?>
    <!-- just.............table -->
    <div class="card">
    <div class="card-body">
        <h5 class="card-title">View Customer Details</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Customer name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <?php
                $get_data = "SELECT * FROM customers";

                $my_result = mysqli_query($conn, $get_data);
                $i = 0;
                foreach ($my_result as $details) {
                    $i++;
                  
                ?>
                    <tr>
                        <td><?= $i ?> </td>
                        <td><?= $details['username'] ?> </td>
                        <td><?= $details['gender'] ?> </td>
                        <td><?= $details['email'] ?> </td>
                        <td><?= $details['phone'] ?></td>
                        <td>
                            <!-- <a href="javascript:void()" data-toggle="modal" data-target="#view<?= $details['id'] ?>" class="btn btn-success">View<i class=" fas fa-eye-slash"></i></a> -->
                            <a href="javascript:void()" data-toggle="modal" data-target="#edit<?= $details['id'] ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i>Edit</a>
                            <a href="javascript:void()" data-toggle="modal" data-target="#delete<?= $details['id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a>
                        </td>
                    </tr>
                    <!-- BEGIN DELETE MODAL -->

                    <div class="modal fade none-border" id="delete<?= $details['id'] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">DELETE CUSTOMER: <?= $details['username'] ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <form action="delete-customer.php" method="post">
                                    <div class="modal-body">
                                        <p>Are you Sure you want to <b>delete</b> <?= $details['username'] ?></p>

                                        <input id="" name="customer_id" value="<?= $details['id'] ?>" type="hidden" class="required form-control" required>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">close</button>
                                        <button type="submit" name="delete" class="btn btn-danger ">Yes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- Modal view -->




                    <!-- <div class="modal fade none-border" id="view<?= $details['id'] ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">View <?= $details['username'] ?>Details</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>

                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-sm-4" style="background-color:lavender;">
                                                <h6>Name:</h6>
                                                <h6>Email:</h6>
                                                <h6>Phone No.:</h6>
                                                <h6>Parking Date:</h6>
                                                <h6>Car No. Plate:</h6>
                                                <h6>Duration:</h6>
                                                <h6>City:</h6>
                                            </div>



                                            <div class="col-sm-8" style="background-color:lavenderblush;border:red">

                                                <h6><?= $details['username'] ?> </h6>
                                                <h6><?= $details['email'] ?> </h6>
                                                <h6><?= $details['phone'] ?></h6>
                                                <h6><?= $details['parking_date'] ?></h6>
                                                <h6><?= $details['car_no_plate'] ?></h6>
                                                <h6><?= $details['days'] ?></h6>
                                                <h6><?= $details['city'] ?> </h6>

                                            </div>


                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- END MODAL -->
        </div>

        <!-- -----edit--- -->


        <div class="modal fade none-border" id="edit<?= $details['id'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><strong>Parking </strong>Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <form action="edit-customer.php" method="POST">
                        <div class=" container-fluid">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <label for="userName">Customer Name *</label>
                                        <input id="" name="username" value="<?= $details['username'] ?>" type="text" class="required form-control" required>
                                        <input id="" name="my_edit" value="<?= $details['id'] ?>" type="hidden" class="required form-control" required>

                                        <label for="name">Phone *</label>
                                        <input id="name" name="phone" type="text" value="<?= $details['phone'] ?>" class="required form-control" minlength="10" maxlength="12">


                                    </div>

                                    <div class="col-md-6">

                                        <label for="email">Email </label>
                                        <input id="email" name="email" type="text" value="<?= $details['email'] ?>" class="required email form-control">

                                        <label for="gender">Gender *</label>
                                        <select id="gender" name="gender" type="number" value="<?= $details['gender'] ?>" class="required form-control" min="1">
                                            <option selected>choose.........</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>




                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            <button type="submit" name="edit" class="btn btn-danger">Save</button>
                        </div>
                    </form>
                </div>





            <?php    } ?>
            </table>
            </div>

        </div>

