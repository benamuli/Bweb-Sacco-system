<?php
session_start();
if (!isset($_SESSION['Username']))
    header('location:login.php');
include("sidebar.php");
include('./includes/connection.php');
$id = $_GET['loanid'];
$sql = "SELECT * FROM loans where id=$id ";
$results = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($results);
$id = $row['id'];
$Names = $row['Names'];
$Id_number = $row['Id_number'];
$Contact = $row['Contact'];
$Residence = $row['Residence'];
$Occupation = $row['Occupation'];
$Loan_type = $row['Loan_type'];
$Req_amount = $row['Req_amount'];
$Pay_period = $row['Pay_period'];
$Pay_Schedule = $row['Pay_Schedule'];
$Guarantor1 = $row['Guarantor1'];
$G1_id = $row['G1_id'];
$Guarantor2 = $row['Guarantor2'];
$G2_id = $row['G2_id'];
$App_date = $row['App_date'];
$App_status = $row['App_status'];
$Disb_amount = $row['Disb_amount'];
$Installment = $row['Installment'];
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Loan Details</h1>
    <!-- Application Form -->
    <div class="card shadow mb-4">
    
        <div class="card-body bg-gray-300">
        <button class="btn btn-info m-2"><a href="loans.php">Back</a></button>
            <form class="user" action="" method="post">
                <div class="form-group row">
                    <div class="col-sm-8 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="Id_number" name="Id_number" value="<?php echo $Names ?>">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="Id_number" name="Id_number" value="<?php echo $Id_number ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="Contact" name="Contact" value="<?php echo $Contact ?>">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="Residence" name="Residence" value="<?php echo $Residence ?>">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="Occupation" name="Occupation" value="<?php echo $Occupation ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" id="Id_number" name="Id_number" value="<?php echo $Loan_type ?>">
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="Req_amount" name="Req_amount" value="<?php echo $Req_amount ?>">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="Pay_period" name="Pay_period" value="<?php echo $Pay_period ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" id="Id_number" name="Id_number" value="<?php echo $Pay_Schedule ?>">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="last_name" name="last_name"
                        value="<?php echo $Guarantor1 ?>">
                    </div>
                    <div class="col-sm-4">
                        <label for="">Guarantor1 ID No.</label>
                        <input type="text" class="form-control form-control-user" id="G1_id" name="G1_id" value="<?php echo $G1_id ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="ID_number" name="ID_number"
                        value="<?php echo $Guarantor2 ?>">
                    </div>
                    <div class="col-sm-4">
                        <label for="">Guarantor2 ID No.</label>
                        <input type="text" class="form-control form-control-user" id="G2_id" name="G2_id" value="<?php echo $G2_id ?>">
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="">Date of Application</label>
                        <input type="date" class="form-control form-control-user" id="App_date" name="App_date" value="<?php echo $App_date ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" id="Id_number" name="Id_number" value="<?php echo $App_status ?>">
                    </div>
                    <div class="col-sm-4">
                        <label for="">Amount to be Disbursed</label>
                        <input type="text" class="form-control form-control-user" id="Disb_amount" name="Disb_amount" value="<?php echo $Disb_amount ?>">
                    </div>
                    <div class="col-sm-4">
                        <label for="">Installment</label>
                        <input type="text" class="form-control form-control-user" id="Installment" name="Installment" value="<?php echo $Installment ?>">

                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
</div>