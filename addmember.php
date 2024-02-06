<?php
session_start();
if (!isset($_SESSION['Username']))
    header('location:login.php');
include("sidebar.php");
include('./includes/connection.php');

if (isset($_POST['save'])) {
    $Names = $_POST['Names'];
    // $last_name = $_POST['last_name'];
    $Unq_number = $_POST['Unq_number'];
    $email = $_POST['email'];
    $Telephone = $_POST['Telephone'];
    $gender = $_POST['gender'];
    $Tax_pin = $_POST['Tax_pin'];
    $Kin = $_POST['Kin'];
    $Kin_contact = $_POST['Kin_contact'];

    // check if fields are empty
    if ($Names == '' || $email == '' || $Unq_number == '' || $gender == '' || $Telephone == '' || $Kin == '' || $Kin_contact == '') {
        echo "<script>alert('please fill all fields')</script>";
        echo (mysqli_error($con));
        // header('Location:addmember.php');
        // exit;
    } else {

        //inserting to database
        $sql = "INSERT INTO members (Names,Unq_number,email,Telephone,gender,Tax_pin,Kin,Kin_contact) values ('$Names','$Unq_number','$email','$Telephone','$gender','$Tax_pin','$Kin','$Kin_contact')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "<script>alert('Member Added successfully')</script>";
        } else {
            echo (mysqli_error($con));
            echo "<script>alert('Error occured,Member not added')</script>";
        }
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0 bg-gray-300">
            <button class="btn btn-info m-2"><a href="members.php">Back</a></button>
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block">
                <img  src="assets/jumbo nuts.png">
                </div>
                <div class="col-lg-7">
                    
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" action="" method="post">
                            <div class="form-group row">
                                <!-- <div class="col-sm-6 mb-3 mb-sm-0"> -->
                                <input type="text" class="form-control form-control-user" id="Names" name="Names" placeholder="Names">
                                <!-- </div> -->
                                <!-- <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="last_Name"
                                        name="last_name" placeholder="Last Name">
                                </div> -->
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="Unq_number" name="Unq_number" placeholder="Id No.">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="Telephone" name="Telephone" placeholder="Telephone No.">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender" class="custom-select">
                                        <option value=""></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <!-- <input type="password" class="form-control form-control-user"
                                                        id="exampleInputPassword" placeholder="Gender"> -->
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="Tax_pin" name="Tax_pin" placeholder="Tax Pin">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="Kin" name="Kin" placeholder="Next of kin">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="Kin_contact" name="Kin_contact" placeholder="Next of Kin Contact">
                                </div>
                            </div>
                            <!-- submit -->
                            <div class="col-md-4">
                                <div class="form-outline mb-4 w-50 m-auto">
                                    <input class="btn btn-primary mb-2 px-3C" type="submit" name="save" value="Save">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->

<!-- Footer -->
<?php
include("footer.php");
?>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>