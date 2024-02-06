<?php
session_start();
if (!isset($_SESSION['Username']))
    header('location:login.php');
include("sidebar.php");
include('./includes/connection.php');
$id = $_GET['memberid'];
$sql = "SELECT * FROM members where id=$id ";
$results = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($results);
$id = $row['id'];
$Names = $row['Names'];
$Unq_number = $row['Unq_number'];
$email = $row['email'];
$Telephone = $row['Telephone'];
$gender = $row['gender'];
$Tax_pin = $row['Tax_pin'];
$Kin = $row['Kin'];
$Kin_contact = $row['Kin_contact'];

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

        //updating database
        $sql = "UPDATE members set id='$id',Names='$Names',Unq_number='$Unq_number',email='$email',Telephone='$Telephone',gender='$gender',Tax_pin='$Tax_pin',Kin='$Kin',Kin_contact='$Kin_contact' where id='$id'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "<script>alert('Member Information Updated successfully')</script>";
        } else {
            echo (mysqli_error($con));
            echo "<script>alert('Error occurred, Member Information not Updated')</script>";
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
                <div class="col-lg-5 d-none d-lg-block"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Member Information</h1>
                        </div>
                        <form class="user" action="" method="post">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="Names" name="Names" value="<?php echo $Names ?>">
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="email" class="form-control form-control-user" id="email" name="email" value="<?php echo $email ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="Unq_number" name="Unq_number" value="<?php echo $Unq_number ?>">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="Telephone" name="Telephone" value="<?php echo $Telephone ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="gender" name="gender" value="<?php echo $gender ?>">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="Tax_pin" name="Tax_pin" value="<?php echo $Tax_pin ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="Kin" name="Kin" value="<?php echo $Kin ?>">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="Kin_contact" name="Kin_contact" value="<?php echo $Kin_contact ?>">
                                </div>
                                <!-- submit -->

                            </div>
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

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>