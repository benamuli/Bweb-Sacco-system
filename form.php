<?php
include("sidebar.php");
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
				<div class="col-sm-4mb-3 mb-sm-0">
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
					<input type="file" class=" form-control-user" id="M_image" name="M_image">
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
			<h3>CONTACT</h3>
			<input type="text" name="email" placeholder="Email" required>
			<input type="text" name="phone" placeholder="Phone Number" required>
			<input type="file" name="image" accept="image/*">
			<div class="btn-box">
				<button type="button" id="Previous1">Previous</button>
				<button type="button" id="Next2">Next</button>
			</div>
		</form>
		<form id="step3">
			<h3>SECURITY</h3>
			<input type="password" name="password_1" placeholder="Password" required>
			<input type="password" name="password_2" placeholder="Confirm Password" required>
			<div class="btn-box">
				<button type="button" id="Previous2">Previous</button>
				<button type="button" id="submit">Submit</button>
			</div>
		</form>

	</div>

	<script src="./form.js"></script>
</body>

</html>