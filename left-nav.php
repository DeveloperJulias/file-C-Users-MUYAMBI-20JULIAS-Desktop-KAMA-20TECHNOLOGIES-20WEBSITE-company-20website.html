<?php include 'includes/header.php' ?>







<?php include 'top-left-nav.php' ?>

<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
<title>Matrix Template - The Ultimate Multipurpose admin template</title>
<!-- Custom CSS -->
<link href="assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
<link href="assets/libs/jquery-steps/steps.css" rel="stylesheet">
<link href="dist/css/style.min.css" rel="stylesheet">






<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="card">
        <div class="card-body wizard-content">
            <h4 class="card-title">Basic Form Example</h4>
            <h6 class="card-subtitle"></h6>
            <form id="example-form" action="#" class="m-t-40">
                <div>
                    <h3>Account</h3>
                    <section>
                        <label for="userName">User name *</label>
                        <input id="userName" name="userName" type="text" class="required form-control">
                        <label for="password">Password *</label>
                        <input id="password" name="password" type="text" class="required form-control">
                        <label for="confirm">Confirm Password *</label>
                        <input id="confirm" name="confirm" type="text" class="required form-control">
                        <p>(*) Mandatory</p>
                    </section>
                    <h3>Profile</h3>
                    <section>
                        <label for="name">First name *</label>
                        <input id="name" name="name" type="text" class="required form-control">
                        <label for="surname">Last name *</label>
                        <input id="surname" name="surname" type="text" class="required form-control">
                        <label for="email">Email *</label>
                        <input id="email" name="email" type="text" class="required email form-control">
                        <label for="address">Address</label>
                        <input id="address" name="address" type="text" class=" form-control">
                        <p>(*) Mandatory</p>
                    </section>
                    <h3>Hints</h3>
                    <section>
                        <ul>
                            <li>Foo</li>
                            <li>Bar</li>
                            <li>Foobar</li>
                        </ul>
                    </section>




                    <div class="border-top">
                        <div class="card-body">

                            <button type="submit" class="btn btn-primary" name="submit">submit</button>





                        </div>

                    </div>
            </form>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ==================i============================================ -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
    </dv>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->

    <?php include 'includes/footer.php' ?>




    <script>
        // Basic Example with form
        var form = $("#example-form");
        form.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });
        form.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            onStepChanging: function(event, currentIndex, newIndex) {
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinishing: function(event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function(event, currentIndex) {
                alert("Submitted!");
            }
        });
    </script>