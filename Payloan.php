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
$Loan_type = $row['Loan_type'];
$Disb_amount = $row['Disb_amount'];
$Installment = $row['Installment'];
$Balance = $row['Balance'];
$Paid = $row['Paid'];


if (isset($_POST['save'])) {
     $Mode = $_POST['Mode'];
    $Reference = $_POST['Reference'];
    $Inst_amount = $_POST['Inst_amount'];
    $Date = $_POST['Date'];
   $TotalPaid= $Paid + $Inst_amount;
   $LoanBalance=$Disb_amount - $TotalPaid;
//    echo $TotalPaid;
    // check if fields are empty
    if ($Names == '' || $Mode == '' || $Reference == '' || $Inst_amount == '' || $Date == '') {
        echo "<script>alert('please fill all fields')</script>";
        echo (mysqli_error($con));
        exit;
    } else {
        // echo $Total;
        //updating database
        $sql = "UPDATE loans set id='$id',Paid=$TotalPaid,Balance=$LoanBalance where id='$id'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "<script>alert('Payment Added successfully')</script>";
        } else {
            echo (mysqli_error($con));
            echo "<script>alert('Error occured,Payment not added')</script>";
        }
        $Category = 'Loan Repayment';
        
        //updating transaction database
        // $sql = "INSERT INTO transactions (Names,Mode,Reference,Amount,Date,Category) values ('$Names','$Mode','$Reference','$Inst_amount','$Date','$Category')";
        // $result = mysqli_query($con, $sql);
        // if ($result) {
        //     echo "<script>alert('Transaction Added successfully')</script>";
        // } else {
        //     echo (mysqli_error($con));
        //     echo "<script>alert('Error occured,Transaction not added')</script>";
        // }
    }
 }

?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0 bg-gray-300">
            <button class="btn btn-info m-2"><a href="Repayment.php">Back</a></button>
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Pay loan!</h1>
                        </div>
                        <form class="user" action="" method="post">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user"   value="<?php echo $Names ?>">
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user"   value="<?php echo $Loan_type ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="Current savings">Amount Paid</label>
                                <input type="text" class="form-control form-control-user"  value="<?php echo $Paid ?>">
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="Current savings">Installment Amount</label>
                                <input type="text" class="form-control form-control-user"  value="<?php echo $Installment ?>">
                                </div>
                                <div class="col-sm-4">
                                    <label for="Current savings">Current Balance</label>
                                    <input type="text" class="form-control form-control-user"  value="<?php echo $Balance ?>">
                                </div>
                            </div>
                            
                            <h1 class="h4 text-gray-900 mb-4">Payment Details</h1>
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
                                <div class="col-sm-6">
                                    <label for="">Amount Paying</label>
                                    <input type="text" class="form-control form-control-user" id="Inst_amount" name="Inst_amount" placeholder="Amount Paying">
                                </div>
                                <div class="col-sm-6">
                                    <label for="New Total">New Balance</label>
                                    <input type="text" class="form-control form-control-user" id="Total" name="Total" value="<?php $Total ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="Reference" name="Reference" placeholder="Reference code" autocapitalize="characters">
                                </div>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control form-control-user" id="Date" name="Date" placeholder="Date">
                                </div>
                            </div>
                            <!-- submit -->
                            <div class="col-md-4">
                                <div class="form-outline mb-4 w-50 m-auto">
                                    <input class="btn btn-primary mb-2 px-3C" type="submit" name="save" value="Save">
                                </div>
                            </div>
                        </form>