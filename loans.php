<?php
session_start();
if (!isset($_SESSION['Username']))
    header('location:login.php');
include("sidebar.php");
include('./includes/connection.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Loans</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">Members Data</h6> -->
            <a href="activeloans.php" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Active Loans</span>

            </a>
            <a href="settledloans.php" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa"></i>
                </span>
                <span class="text">Settled Loans</span>
            </a>
        </div>
        <div class="card-body bg-gray-300">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Names</th>
                            <!-- <th>LastName</th> -->
                            <th>Id</th>
                            <th>Loan Type</th>
                            <th>Loan Status</th>
                            <th>Disbursed Amount</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Names</th>
                            <!-- <th>LastName</th> -->
                            <th>Id</th>
                            <th>Loan Type</th>
                            <th>Loan Status</th>
                            <th>Disbursed Amount</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $sql = 'SELECT * FROM loans ';
                        $results = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($results)) {
                            $id = $row['id'];
                            $Names = $row['Names'];
                            // $last_name = $row['last_name'];
                            $Id_number = $row['Id_number'];
                            $App_status = $row['App_status'];
                            $Disb_amount = $row['Disb_amount'];
                            $Loan_type = $row['Loan_type'];
                            
                            echo '<tr>
                            <th scope="row">' . $id . '</th>
           <td>' . $Names . '</td>
       
       <td>' . $Id_number . '</td>
       <td>' . $Loan_type . '</td>
       <td>' . $App_status . '</td>
       <td>' . $Disb_amount . '</td>
       
       <td> <button class="btn btn-primary " style=" width:30px; height:30px "><a class="text-light "  href="loaninfo.php?loanid=' . $id . '"><i class="fas fa-eye text-gray-300"></i></a></button>
         </tr>';
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
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

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>