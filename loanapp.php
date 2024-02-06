<?php
session_start();
if (!isset($_SESSION['Username']))
    header('location:login.php');
include("sidebar.php");
include('./includes/connection.php');
if (isset($_POST['save'])) {
    $Names = $_POST['Names'];
    // $last_name = $_POST['last_name'];
    $Id_number = $_POST['Id_number'];
    $Contact = $_POST['Contact'];
    $Residence = $_POST['Residence'];
    $Occupation = $_POST['Occupation'];
    $Loan_type = $_POST['Loan_type'];
    $Req_amount = $_POST['Req_amount'];
    $Pay_period = $_POST['Pay_period'];
    $Pay_Schedule = $_POST['Pay_Schedule'];
    $Guarantor1 = $_POST['Guarantor1'];
    $G1_id = $_POST['G1_id'];
    $Guarantor2 = $_POST['Guarantor2'];
    $G2_id = $_POST['G2_id'];
    $App_date = $_POST['App_date'];
    $App_status = $_POST['App_status'];
    $Disb_amount = $_POST['Disb_amount'];
    $Installment = $_POST['Installment'];
    // check if fields are empty
    if ($Names == '' || $Id_number == '' || $Contact == '' || $Residence == '' || $Occupation == '' || $Loan_type == '' || $Req_amount == '' || $Pay_period == '' || $Pay_Schedule == ''|| $App_date == '' || $G1_id == '' || $G2_id == '' || $App_status =='' || $Disb_amount =='' || $Installment == '' ) {
        echo "<script>alert('please fill all fields')</script>";
        echo (mysqli_error($con));
        exit;
    } else {

        //inserting to database
        $sql = "INSERT INTO loans (Names,Id_number,Contact,Residence,Occupation,Loan_type,Req_amount,Pay_period,Pay_Schedule,Guarantor1,G1_id,Guarantor2,G2_id,App_date,App_status,Disb_amount,Installment  ) values ('$Names','$Id_number','$Contact','$Residence','$Occupation','$Loan_type','$Req_amount','$Pay_period','$Pay_Schedule','$Guarantor1','$G1_id','$Guarantor2','$G2_id','$App_date','$App_status','$Disb_amount','$Installment')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "<script>alert('Loan Added successfully')</script>";
        } else {
            echo (mysqli_error($con));
            echo "<script>alert('Error occured,Loan not added')</script>";
        }
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Loan Application form</h1>
    <!-- Application Form -->
    <div class="card shadow mb-4">
        <div class="card-body bg-gray-300">
            <form class="user" action="" method="post">
                <div class="form-group row">
                    <div class="col-sm-8 mb-3 mb-sm-0">
                        
                        <label for="Names"> Names</label>
                        <select name="Names" id="Names" class="custom-select">
                            <option value="">Select Name</option>
                            <?php
                            $sql = "select Names from members";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $Names = $row['Names'];
                                $id = $row['id'];
                                echo "<option value='$Names'>$Names</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <label for="">Applicants ID No</label>
                        <input type="text" class="form-control form-control-user" id="Id_number" name="Id_number"
                            placeholder="ID Number">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="Contact" name="Contact"
                            placeholder="Contact Number" autocomplete="off">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="Residence" name="Residence"
                            placeholder="Residence">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="Occupation" name="Occupation"
                            placeholder="Occupation">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                                                <!-- <label for="Product"> Loan Type</label> -->
                        <select name="Loan_type" id="Loan_type" class="custom-select" placeholder="Loan Type">
                            <option value="">Select Product</option>
                            <?php
                            $sql = "select product_name from products";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $product_name = $row['product_name'];
                                $id = $row['id'];
                                echo "<option value='$product_name'>$product_name</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="Req_amount" name="Req_amount"
                            placeholder="Amount Requesting" autocomplete="off">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="Pay_period" name="Pay_period"
                            placeholder="Payment Period in Months">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="type">Payment Schedule</label>
                        <select name="Pay_Schedule" id="Pay_Schedule" class="custom-select">
                            <option value=""></option>
                            <option value="Weekly">Weekly</option>
                            <option value="Monthly">Monthly</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <!-- <input type="text" class="form-control form-control-user" id="last_name" name="last_name"
                            placeholder="Guarantor 1"> -->
                        <label for="Guarantor1 Name"> Guarantor 1 Name</label>
                        <select name="Guarantor1" id="Guarantor1" class="custom-select">
                            <option value="">Select Name</option>
                            <?php
                            $sql = "select Names from members";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $Names = $row['Names'];
                                $id = $row['id'];
                                echo "<option value='$Names'>$Names</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="">Guarantor1 ID No.</label>
                        <input type="text" class="form-control form-control-user" id="G1_id" name="G1_id"
                            placeholder="G1 Id_number">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <!-- <input type="text" class="form-control form-control-user" id="ID_number" name="ID_number"
                            placeholder="Guarantor 2"> -->
                        <label for="Guarantor2 Name"> Guarantor 2 Name</label>
                        <select name="Guarantor2" id="Guarantor2" class="custom-select">
                            <option value="">Select Name</option>
                            <?php
                            $sql = "select Names from members";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $Names = $row['Names'];
                                $id = $row['id'];
                                echo "<option value='$Names'>$Names</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="">Guarantor2 ID No.</label>
                        <input type="text" class="form-control form-control-user" id="G2_id" name="G2_id"
                            placeholder="G2 Id_number">
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="">Date of Application</label>
                        <input type="date" class="form-control form-control-user" id="App_date" name="App_date"
                            placeholder="Date of Application" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-4">
                        <label for="type">Application Status</label>
                        <select name="App_status" id="App_status" class="custom-select">
                            <option value=""></option>
                            <option value="Approved">Approved</option>
                            <option value="Declined">Declined</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="">Amount to be Disbursed</label>
                    <input type="text" class="form-control form-control-user" id="Disb_amount" name="Disb_amount"
                            placeholder="Amount to be Disbursed" autocomplete="off"> 
                    </div>
                    <div class="col-sm-4">
                        <label for="">Installment</label>
                    <input type="text" class="form-control form-control-user" id="Installment" name="Installment"
                            placeholder="Installment Amount" autocomplete="off"> 
                            
                    </div>
                </div>
                <!-- submit -->
                <div class="form-group row">
                    <div class="form-outline mb-4 w-50 m-auto">
                       <center><input class="btn btn-primary mb-2 px-3C" type="submit" name="save" value="Save"></center> 
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
<!-- Footer -->
<?php
include("footer.php");
?>
<!-- End of Footer -->