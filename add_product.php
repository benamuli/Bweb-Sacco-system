<?php
session_start();
if (!isset($_SESSION['Username']))
    header('location:login.php');
include("sidebar.php");
include('./includes/connection.php');

if (isset($_POST['save'])) {
    $product_name = $_POST['product_name'];
    $Description = $_POST['Description'];
    $Interest_rate = $_POST['Interest_rate'];
    $Duration = $_POST['Duration'];
    $Amount = $_POST['Amount'];

    // check if fields are empty
    if ($product_name == '' || $Description == '' || $Interest_rate == '' || $Duration == '' || $Amount == '') {
        echo "<script>alert('please fill all fields')</script>";
        echo (mysqli_error($con));
        exit;
    } else {

        //inserting to database
        $sql = "INSERT INTO products (product_name,Description,Interest_rate,Duration,Amount) values ('$product_name','$Description','$Interest_rate','$Duration','$Amount')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "<script>alert('Product Added successfully')</script>";
        } else {
            echo (mysqli_error($con));
            echo "<script>alert('Error occured,Product not added')</script>";
        }
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0 bg-gray-300">
            <button class="btn btn-info m-2"><a href="products.php">Back</a></button>
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">New Product</h1>
                        </div>
                        <form class="user" action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="product_name" name="product_name" placeholder="Product Name">
                            </div>
                            <div class="form-group">
                                <textarea name="Description" id="Description" cols="60" rows="5" placeholder="Product Description"></textarea>
                                <!-- <input type="text" class="form-control form-control-user" id="Description"
                                    name="Description" placeholder="Description"> -->
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="Interest_rate" name="Interest_rate" placeholder="Interest Rate">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="Duration" name="Duration" placeholder="Duration">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="Amount" name="Amount" placeholder="Minimum amount">
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
<!-- Footer -->
<?php
include("footer.php");
?>
<!-- End of Footer -->