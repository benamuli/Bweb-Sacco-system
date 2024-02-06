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
    <h1 class="h3 mb-2 text-gray-800">Members</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4 bg-gray-300" >
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">Members Data</h6> -->
            <a href="addmember.php" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add New Member</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Names</th>
                            <th>Unique No.</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Names</th>
                            <th>Unique No.</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $sql = 'SELECT * FROM members';

                        $results = mysqli_query($con, $sql);

                        while ($row = mysqli_fetch_assoc($results)) {
                            $id = $row['id'];
                            $Names = $row['Names'];
                            // $last_name = $row['last_name'];
                            $Unq_number = $row['Unq_number'];
                            $Telephone = $row['Telephone'];
                            $email = $row['email'];
                            echo '<tr>
                            <th scope="row">' . $id . '</th>
           <td>' . $Names . '</td>
       
       <td>' . $Unq_number . '</td>
       <td>' . $Telephone . '</td>
       <td>' . $email . '</td>
              <td> <button class="btn btn-primary " style=" width:30px; height:30px "><a class="text-light "  href="info.php?infoid=' . $id . '"><i class="fas fa-eye text-gray-300"></i></a></button>
              <button class="btn btn-primary "><a class="text-light "  href="Editmember.php?memberid=' . $id . '">Edit</i></a></button>
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

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
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

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
</body>

</html>