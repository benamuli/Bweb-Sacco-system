<?php
session_start();
include("sidebar.php");
include('./includes/connection.php');

if (isset($_POST['save'])) {
    $Item = $_POST['Item'];
    $Model = $_POST['Model'];
    $Serial = $_POST['Serial'];
    $P_date = $_POST['P_date'];
    $Department = $_POST['Department'];
    $Net_worth = $_POST['Net_worth'];
    $Status = $_POST['Status'];
    

    // check if fields are empty
    if ($Item == '' || $Model == '' || $Serial == '' || $Net_worth == '' || $P_date == ''  || $Department == '' || $Status == '') {
        echo "<script>alert('please fill all fields')</script>";
        echo (mysqli_error($con));
    } else {

        //inserting to database
        $sql = "INSERT INTO assets (Item,Model,Serial,Net_worth,P_date,Department,Status) values ('$Item','$Model','$Serial','$Net_worth','$P_date','$Department','$Status')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "<script>alert('Asset Added successfully')</script>";
        } else {
            echo (mysqli_error($con));
            echo "<script>alert('Error occured,Asset not added')</script>";
        }
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0 bg-gray-300">
            <button class="btn btn-info m-2"><a href="assets.php">Back</a></button>
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Keep Asset Data!</h1>
                        </div>
                        <form class="user" action="" method="post">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="Item" name="Item" placeholder="Item">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="Model" name="Model" placeholder="Model">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="Serial" name="Serial" placeholder="Serial No.">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="Net_worth" name="Net_worth" placeholder="Net Worth">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="Date of Purchase">Date of Purchase</label>
                                    <input type="date" class="form-control form-control-user" id="P_date" name="P_date" placeholder="Date of Purchase">
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
                                    <label for="Status">Status</label>
                                    <select name="Status" id="Status" class="custom-select">
                                        <option value=""></option>
                                        <option value="Functional">Functional</option>
                                        <option value="Not Functional">Not Functional</option>
                                        <!-- <option value="Operations">Operations</option> -->
                                    </select>
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