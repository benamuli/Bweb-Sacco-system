<?php
session_start();
if (!isset($_SESSION['Username']))
    header('location:login.php');
include("sidebar.php");
include('./includes/connection.php');
include('./includes/functions.php');

if (isset($_POST['save'])) {
    $CreatedBy=$_SESSION['username'];
    $Names = $_POST['Names'];
    // $last_name = $_POST['last_name'];
    $Unq_number = $_POST['Unq_number'];
    $email = $_POST['email'];
    $M_no = $_POST['M_no'];
    $DOB = $_POST['DOB'];
    $Age = (date('Y') - date('Y', strtotime($DOB)));
    $Telephone = $_POST['Telephone'];
    $gender = $_POST['gender'];
    $Tax_pin = $_POST['Tax_pin'];
    $Kin = $_POST['Kin'];
    $Kin_R = $_POST['Kin_R'];
    $Kin_contact = $_POST['Kin_contact'];
    // payment details
    $Mode = $_POST['Mode'];
    $Reference = $_POST['Reference'];
    $Amount = $_POST['Amount'];
    $Date = $_POST['Date'];
    // Distribution
    $Reg_fee=$_POST['Reg_fee'];
    $Shares=$_POST['Shares'];
    $Savings=$_POST['Savings'];
    // accessing image & PDF
    $M_image = $_FILES['M_image']['name'];
    $M_form = $_FILES['pdf_file']['name'];
    // storing images & PDF
    $temp_image = $_FILES['M_image']['tmp_name'];
    $temp_file = $_FILES['pdf_file']['tmp_name'];
    // check if fields are empty
    if ($Names == '' || $email == '' || $Unq_number == '' || $M_no == '' || $DOB == '' || $gender == '' || $Telephone == '' || $Kin == '' || $Kin_contact == '' || $Reg_fee) {
        echo "<script>alert('please fill all fields')</script>";
        echo (mysqli_error($con));
        // header('Location:addmember.php');
        // exit;
    } else {
        move_uploaded_file($temp_image, "./member_image/$M_image");
        move_uploaded_file($temp_file, "./pdf/$M_form");
        //inserting to database
        $sql = "INSERT INTO members (Names,Unq_number,email,M_no,DOB,Age,Telephone,gender,Tax_pin,Kin,Kin_R,Kin_contact,M_image,M_form) values ('$Names','$Unq_number','$email','$M_no','$DOB','$Age','$Telephone','$gender','$Tax_pin','$Kin','$Kin_R','$Kin_contact','$M_image','$M_form')";
        $Category='opening amount';
        $sql = "INSERT INTO transactions (Names,Mode,Reference,Amount,Date,Category) values ('$Names','$Mode','$Reference','$TAmount','$Date','$Category')";
        $sql = "INSERT INTO shares (Names,Mode,Reference,Shares,CreatedBy,Date) values ('$Names','$Mode','$Reference','$Shares','$CreatedBy','$Date')";
        $sql = "INSERT INTO savings (Names,Mode,Reference,Amount,CreatedBy,Date) values ('$Names','$Mode','$Reference','$Savings','$CreatedBy','$Date')";
        $sql = "INSERT INTO transactions (Names,Mode,Reference,Amount,Date,Category) values ('$Names','$Mode','$Reference','$Topup_Amount','$Date','$Category')";
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

<html>

<head>
    <title>Doc</title>
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="form.js">
</head>

<body>
    <div class="container">
        <div class="step-row">
            <div id="progress"></div>
            <div class="step-col"><small style="color: white;">Step 1</small></div>
            <div class="step-col"><small style="color: white;">Step 2</small></div>
            <div class="step-col"><small style="color: white;">Step 3</small></div>

        </div>
        <form id="step1">
            <h3>PERSONAL DATA</h3>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="Full Name">Full Name</label>
                    <input type="text" class="form-control form-control-user" id="Names" name="Names" placeholder="Names">
                </div>
                <div class="col-sm-6">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address">
                </div>

            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="Membership No.">Membership No.</label>
                    <input type="text" class="form-control form-control-user" id="M_no" name="M_no" placeholder="Membership No">
                </div>

                <div class="col-sm-4 mb-3 mb-sm-0">
                    <label for="Identification Number">Identification Number</label>
                    <input type="text" class="form-control form-control-user" id="Unq_number" name="Unq_number" placeholder="Id No.">
                </div>
                <div class="col-sm-4 mb-3 mb-sm-0">
                    <label for="Date of Birth">Date of Birth</label>
                    <input type="date" class="form-control form-control-user" id="DOB" name="DOB" placeholder="DOB">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="Telephone No.">Telephone No.</label>
                    <input type="text" class="form-control form-control-user" id="Telephone" name="Telephone" placeholder="Telephone No. +254">
                </div>
                <div class="col-sm-4 mb-3 mb-sm-0">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="custom-select">
                        <option value=""></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="Kra Pin">Kra Pin</label>
                    <input type="text" class="form-control form-control-user" id="Tax_pin" name="Tax_pin" placeholder="Tax Pin">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4 mb-3 mb-sm-0">
                    <label for="Name of Next of Kin">Name of Next of Kin</label>
                    <input type="text" class="form-control form-control-user" id="Kin" name="Kin" placeholder="Next of kin">
                </div>
                <div class="col-sm-4">
                    <label for="R Next of Kin">Relationship of Next of Kin</label>
                    <input type="text" class="form-control form-control-user" id="Kin_R" name="Kin_R" placeholder="Next of Kin Relationship">
                </div>
                <div class="col-sm-4">
                    <label for="Contact of Next of Kin">Contact of Next of Kin</label>
                    <input type="text" class="form-control form-control-user" id="Kin_contact" name="Kin_contact" placeholder="+254xxxxxxxxxxx">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    <label for="passport">Member Passport</label>
                    <input type="file" class=" form-control" id="M_image" name="M_image">
                </div>
                <div class="col-sm-6">
                    <label for="passport">Member form</label>
                    <input type="file" class="form-control " id="pdf_file" name="pdf_file">
                </div>
            </div>
            <div class="btn-box">
                <button type="button" id="Next1">Next</button>
            </div>
        </form>
        <form id="step2">
            <h3>FIRST OPENING AMOUNT</h3>
            <div class="form-group">
                <label for="type">Payment Mode</label>
                <select name="Mode" id="Mode" class="custom-select">
                    <option value=""></option>
                    <option value="Cash">Cash</option>
                    <option value="Mpesa">Mpesa</option>
                    <option value="Bank">Bank</option>
                </select>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="Reference" name="Reference" placeholder="Reference code" autocapitalize="characters">
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="Amount" name="Amount" placeholder="Amount">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    <input type="date" class="form-control form-control-user" id="Date" name="Date" placeholder="Date">
                </div>
            </div>
            <div class="btn-box">
                <button type="button" id="Previous1">Previous</button>
                <button type="button" id="Next2">Next</button>
            </div>
        </form>
        <form id="step3">
            <h3>FUND DISTRIBUTION</h3>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="Registration fee">Registration fee</label>
                    <input type="text" class="form-control form-control-user" id="Reg_fee" name="Reg_fee"  autocapitalize="characters">
                </div>
                <div class="col-sm-6">
                    <label for="Shares">Shares</label>
                    <input type="text" class="form-control form-control-user" id="Shares" name="Shares" placeholder=" Shares Amount">
                </div>
                <div class="col-sm-6">
                    <label for="Shares">Savings</label>
                    <input type="text" class="form-control form-control-user" id="Savings" name="Savings" placeholder=" Savings Amount">
                </div>
            </div>
            <div class="btn-box">
                <button type="button" id="Previous2">Previous</button>
                <input class="btn btn-primary mb-2 px-3C" type="submit" name="save" value="Save">
            </div>
        </form>

    </div>

    <script src="./form.js"></script>
</body>

</html>
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