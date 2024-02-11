<?php
session_start();
include("sidebar.php");
include('./includes/connection.php');

if (isset($_POST['save'])) {
    $Names = $_POST['Names'];
    // $last_name = $_POST['last_name'];
    $Id_number = $_POST['Id_number'];
    $email = $_POST['email'];
    $Telephone = $_POST['Telephone'];
    $gender = $_POST['gender'];
    $SDOB = $_POST['SDOB'];
    $Age = (date('Y') - date('Y', strtotime($SDOB)));
    $Tax_pin = $_POST['Tax_pin'];
    $E_date = $_POST['E_date'];
    $Designation = $_POST['Designation'];
    $E_type = $_POST['E_type'];
    $Department = $_POST['Department'];
    // accessing image & PDF
    $S_image = $_FILES['S_image']['name'];
    $S_letter = $_FILES['S_letter']['name'];
    // storing images & PDF
    $temp_image = $_FILES['S_image']['tmp_name'];
    $temp_file = $_FILES['S_letter']['tmp_name'];
    // check if fields are empty
    if ($Names == '' || $email == '' || $Id_number == '' || $SDOB == '' || $gender == '' || $Telephone == '' || $E_date == '' || $Designation == '' || $E_type == '' || $Department == '' || $S_image == '' || $S_letter == '') {
        echo "<script>alert('please fill all fields')</script>";
        echo (mysqli_error($con));
    } else {
        move_uploaded_file($temp_image, "./staff_image/$S_image");
        move_uploaded_file($temp_file, "./App_letters/$S_letter");
        //inserting to database
        $sql = "INSERT INTO staff (Names,email,Id_number,Telephone,SDOB,Age,gender,Tax_pin,E_date,Designation,E_type,Department,S_image,S_letter) values ('$Names','$email','$Id_number','$Telephone','$SDOB','$Age','$gender','$Tax_pin','$E_date','$Designation','$E_type','$Department','$S_image','$S_letter')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "<script>alert('Staff Added successfully')</script>";
        } else {
            echo (mysqli_error($con));
            echo "<script>alert('Error occured,Staff not added')</script>";
        }
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0 bg-gray-300">
            <button class="btn btn-info m-2"><a href="staff.php">Back</a></button>
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Collect Staff Data!</h1>
                        </div>
                        <form class="user" action="" method="post">
                            <div class="form-group row">
                                <!-- <div class="col-sm-6 mb-3 mb-sm-0"> -->
                                <label for="Full Name">Full Name</label>
                                <input type="text" class="form-control form-control-user" id="Names" name="Names" placeholder="Names">
                                <!-- </div>
                                 -->
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="Email">Email</label>
                                    <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address">
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="National Id">National Id</label>
                                    <input type="text" class="form-control form-control-user" id="Id_number" name="Id_number" placeholder="Id No.">
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="Date of Birth">Date of Birth</label>
                                    <input type="date" class="form-control form-control-user" id="SDOB" name="SDOB" placeholder="DOB">
                                </div>
                                <div class="col-sm-6">
                                    <label for="Mobile Number">Mobile Number</label>
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
                                    <label for="Kra Pin">Kra Pin</label>
                                    <input type="text" class="form-control form-control-user" id="Tax_pin" name="Tax_pin" placeholder="Tax Pin">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="Employement Date">Employement Date</label>
                                    <input type="date" class="form-control form-control-user" id="E_date" name="E_date" placeholder="Date of Employment">
                                </div>
                                <div class="col-sm-6">
                                    <label for="Designation">Designation</label>
                                    <input type="text" class="form-control form-control-user" id="Designation" name="Designation" placeholder="Designation">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="Employment Type">Employment Type</label>
                                    <select name="E_type" id="E_type" class="custom-select">
                                        <option value=""></option>
                                        <option value="Permanent">Permanent</option>
                                        <option value="Contract">Contract</option>
                                        <option value="Casual">Casual</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="Department">Department</label>
                                    <select name="Department" id="Department" class="custom-select">
                                        <option value=""></option>
                                        <option value="Ict">Ict</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Operations">Operations</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <div class="col-sm-6">
                                        <label for="passport">Staff Passport</label>
                                        <input type="file" class=" form-control-user" id="S_image" name="S_image">
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <div class="col-sm-6">
                                        <label for="passport">Staff Appointment letter</label>
                                        <input type="file" class=" form-control-user" id="S_letter" name="S_letter">
                                    </div>
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