<?php
session_start();
if (!isset($_SESSION['Username']))
    header('location:login.php');
include("sidebar.php");
include('./includes/connection.php');
$id = $_GET['infoid'];
$sql = "SELECT * FROM members where id=$id ";
$results = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($results);
$id = $row['id'];
$Names = $row['Names'];
$Unq_number = $row['Unq_number'];
$email = $row['email'];
$M_no = $row['M_no'];
$DOB = $row['DOB'];
$Age = $row['Age'];
$Telephone = $row['Telephone'];
$gender = $row['gender'];
$Tax_pin = $row['Tax_pin'];
$Kin = $row['Kin'];
$Kin_R = $row['Kin_R'];
$Kin_contact = $row['Kin_contact'];
$M_image = $row['M_image'];
$M_form = $row['M_form'];

// $sql = "SELECT * FROM savings where Names=$id ";
// $Amount = $row['Amount'];
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0 bg-gray-300">
            <button class="btn btn-info m-2"><a href="members.php">Back</a></button>
            <!-- Nested Row within Card Body -->
            <div class="row">
                <!-- <div class="col-lg-5 d-none d-lg-block">
                    <img src="./member_image/<?php echo $row['temp_image']; ?>">
                </div> -->
                <div class="col-lg-7">

                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Member Information!</h1>
                        </div>
                        <form class="user" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="Full Name">Full Name</label>
                                    <input type="text" class="form-control form-control-user" id="Names" name="Names" value="<?php echo $Names ?>">
                                </div>
                                <div class="col-sm-6">
                                    <label for="Email">Email</label>
                                    <input type="email" class="form-control form-control-user" id="email" name="email" value="<?php echo $email ?>">
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="col-sm-6">
                                    <label for="Membership No.">Membership No.</label>
                                    <input type="text" class="form-control form-control-user" id="M_no" name="M_no" value="<?php echo $M_no ?>">
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="Identification Number">Identification Number</label>
                                    <input type="text" class="form-control form-control-user" id="Unq_number" name="Unq_number" value="<?php echo $Unq_number ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="Date of Birth">Date of Birth</label>
                                    <input type="date" class="form-control form-control-user" id="DOB" name="DOB" value="<?php echo $DOB ?>">
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="Date of Birth">Age</label>
                                    <input type="text" class="form-control form-control-user" id="Age" name="Age" value="<?php echo $Age ?>">
                                </div>
                                <div class="col-sm-4">
                                    <label for="Telephone No.">Telephone No.</label>
                                    <input type="text" class="form-control form-control-user" id="Telephone" name="Telephone" value="<?php echo $Telephone ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="gender">Gender</label>
                                    <input type="text" class="form-control form-control-user" id="exampleInputPassword" value="<?php echo $gender ?>">
                                </div>
                                <div class="col-sm-6">
                                    <label for="Kra Pin">Kra Pin</label>
                                    <input type="text" class="form-control form-control-user" id="Tax_pin" name="Tax_pin" value="<?php echo $Tax_pin ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="Name of Next of Kin">Name of Next of Kin</label>
                                    <input type="text" class="form-control form-control-user" id="Kin" name="Kin" value="<?php echo $Kin ?>">
                                </div>
                                <div class="col-sm-6">
                                    <label for="R Next of Kin">Relationship of Next of Kin</label>
                                    <input type="text" class="form-control form-control-user" id="Kin_R" name="Kin_R" value="<?php echo $Kin_R ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="Contact of Next of Kin">Contact of Next of Kin</label>
                                    <input type="text" class="form-control form-control-user" id="Kin_contact" name="Kin_contact" value="<?php echo $Kin_contact ?>">
                                </div>
                                <div class="col-sm-6">
                                    <label for="passport">Member Passport</label>
                                    <input type="text" class=" form-control-user" id="M_image" name="M_image" value="<?php echo $M_image ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="passport">Member form</label>
                                <input type="text" class="form-control " id="pdf_file" name="pdf_file" value="<?php echo $M_form ?>">
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


<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>