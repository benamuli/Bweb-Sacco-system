<?php
session_start();
if (!isset($_SESSION['Username']))
    header('location:login.php');
include("sidebar.php");
include('./includes/connection.php');
$id = $_GET['topupid'];
$sql = "SELECT * FROM savings where id=$id ";
$results = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($results);
$id = $row['id'];
$Names = $row['Names'];
// $last_name = $row['last_name'];
//   $Mode = $row['Mode'];
//   $Reference = $row['Reference'];
$Amount = $row['Amount'];
//   $Date = $row['Date'];
// $Total=0;
// $NewTotal = $Amount + $Topup_Amount;
if (isset($_POST['save'])) {
    $Names = $_POST['Names'];
    // $last_name = $_POST['last_name'];
    $Mode = $_POST['Mode'];
    $Reference = $_POST['Reference'];
    $Topup_Amount = $_POST['Topup_Amount'];
    $Date = $_POST['Date'];
    //    $Total=array($Amount,$Topup_Amount); 
//     $NewTotal = array_sum($Amount);
    $Total = $Amount + $Topup_Amount;
    // check if fields are empty
    if ($Names == '' || $Mode == '' || $Reference == '' || $Amount == '' || $Date == '') {
        echo "<script>alert('please fill all fields')</script>";
        echo (mysqli_error($con));
        exit;
    } else {
        // echo $Total;
        //updating database
        $sql = "UPDATE savings set id='$id',Amount=$Total,Date=$Date where id='$id'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "<script>alert('Savings Added successfully')</script>";
        } else {
            echo (mysqli_error($con));
            echo "<script>alert('Error occured,Savings not added')</script>";
        }
        $Category='savings';
        // $Category=$_POST['Category'];
        //updating transaction database
        $sql = "INSERT INTO transactions (Names,Mode,Reference,Amount,Date,Category) values ('$Names','$Mode','$Reference','$Topup_Amount','$Date','$Category')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "<script>alert('Transaction Added successfully')</script>";
        } else {
            echo (mysqli_error($con));
            echo "<script>alert('Error occured,Transaction not added')</script>";
        }
    }
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0 bg-gray-300">
        <button class="btn btn-info m-2"><a href="savings.php">Back</a></button>
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Current Savings!</h1>
                        </div>
                        <form class="user" action="" method="post">
                            <div class="form-group row">
                                <!-- <div class="col-sm-6 mb-3 mb-sm-0"> -->
                                <input type="text" class="form-control form-control-user" id="Names" name="Names"
                                    placeholder="" autocomplete="off" value="<?php echo $Names ?>">

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="Current savings">Current Savings</label>
                                    <input type="text" class="form-control form-control-user" id="Amount" name="Amount"
                                        placeholder="Amount" value="<?php echo $Amount ?>">
                                </div>

                            </div>
                            <h1 class="h4 text-gray-900 mb-4">Top up Details</h1>
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
                                    <label for="">Top up Amount</label>
                                    <input type="text" class="form-control form-control-user" id="Topup_Amount"
                                        name="Topup_Amount" placeholder=" New Saving">
                                </div>
                                <div class="col-sm-6">
                                    <label for="New Total">New Total</label>
                                    <input type="text" class="form-control form-control-user" id="Total" name="Total"
                                        value="<?php $Total ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="Reference"
                                        name="Reference" placeholder="Reference code" autocapitalize="characters">
                                </div>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control form-control-user" id="Date" name="Date"
                                        placeholder="Date">
                                </div>
                            </div>
                            <!-- submit -->
                            <div class="col-md-4">
                                <div class="form-outline mb-4 w-50 m-auto">
                                    <input class="btn btn-primary mb-2 px-3C" type="submit" name="save" value="Save">
                                </div>
                            </div>
                        </form>