<?php
// include('./includes/connection.php');
// function reg_number($i)
// {
//     $regNum = '';
//     $uniqueId = str_pad($i, 2, '0', STR_PAD_LEFT);
//     $date = date('y');
//     $regNum = "JMB" . '\\' . $date . '\\' . $uniqueId;
//     return $regNum;
// };
// echo reg_number(3);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="form.js">
    <title>Member form</title>
</head>

<body>
   <!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0 bg-gray-300">
            <button class="btn btn-info m-2"><a href="members.php">Back</a></button>
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block">
                    <img src="assets/jumbo nuts.png">
                </div>
                <div class="col-lg-7">

                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" action="" method="post" enctype="multipart/form-data">
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

                                <div class="col-sm-6">
                                    <label for="Membership No.">Membership No.</label>
                                    <input type="text" class="form-control form-control-user" id="M_no" name="M_no" placeholder="Membership No">
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="Identification Number">Identification Number</label>
                                    <input type="text" class="form-control form-control-user" id="Unq_number" name="Unq_number" placeholder="Id No.">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="Date of Birth">Date of Birth</label>
                                    <input type="date" class="form-control form-control-user" id="DOB" name="DOB" placeholder="DOB">
                                </div>

                                <div class="col-sm-6">
                                    <label for="Telephone No.">Telephone No.</label>
                                    <input type="text" class="form-control form-control-user" id="Telephone" name="Telephone" placeholder="Telephone No. +254">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender" class="custom-select">
                                        <option value=""></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <!-- <input type="password" class="form-control form-control-user"
                                                        id="exampleInputPassword" placeholder="Gender"> -->
                                </div>
                                <div class="col-sm-6">
                                    <label for="Kra Pin">Kra Pin</label>
                                    <input type="text" class="form-control form-control-user" id="Tax_pin" name="Tax_pin" placeholder="Tax Pin">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="Name of Next of Kin">Name of Next of Kin</label>
                                    <input type="text" class="form-control form-control-user" id="Kin" name="Kin" placeholder="Next of kin">
                                </div>
                                <div class="col-sm-6">
                                    <label for="R Next of Kin">Relationship of Next of Kin</label>
                                    <input type="text" class="form-control form-control-user" id="Kin_R" name="Kin_R" placeholder="Next of Kin Relationship">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="Contact of Next of Kin">Contact of Next of Kin</label>
                                    <input type="text" class="form-control form-control-user" id="Kin_contact" name="Kin_contact" placeholder="+254xxxxxxxxxxx">
                                </div>
                                <div class="col-sm-6">
                                    <label for="passport">Member Passport</label>
                                    <input type="file" class=" form-control-user" id="M_image" name="M_image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="passport">Member form</label>
                                <input type="file" class="form-control " id="pdf_file" name="pdf_file">
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

    <!-- /.MultiStep Form -->
</body>

</html>