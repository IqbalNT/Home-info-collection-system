<!DOCTYPE> 
<html>
	<head>
		<link href="files/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link href="files/css/style.css" rel="stylesheet" id="bootstrap-css">
		<script src="files/js/bootstrap.min.js"></script>
		<script src="files/js/jquery-1.11.1.min.js"></script>
		<!------ Include the above in your HEAD tag ---------->	
		
		<title>Home Management System</title>
	</head>
	
	<body>
		<div class="container">
			<div class="row container-fluid"style="margin-bottom:10px">
				<h3 style="text-align:center;margin-bottom:10px"> Home Owner Registration Form </h3>
			</div>			
			<div class="row">
				<form>			
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-12 form-group">
								<label style="color:red">Personal Details</label>
							</div>
						</div>
						<div class="row">	
							<div class="col-sm-4 form-group">
								<label>Name</label>
								<input type="text" placeholder="Enter Owner Name Here" class="form-control">
							</div>
							<div class="col-sm-4 form-group">
								<label>Father's Name</label>
								<input type="text" placeholder="Enter Father's Name Here" class="form-control">
							</div>
							<div class="col-sm-4 form-group">
								<label>Mother's Name</label>
								<input type="text" placeholder="Enter Mother's Name Here" class="form-control">
							</div>							
						</div>
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>Date Of Birth</label>
								<input type="date" class="form-control">
							</div>
							<div class="col-sm-4 form-group">
								<label>Sex</label>
								<select class="form-control">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Others">Others</option>
								</select>
							</div>							
							<div class="col-sm-4 form-group">
								<label>Marital Status</label>
								<select class="form-control">
									<option value="Married">Married</option>
									<option value="Unmarried">Unmarried</option>
									<option value="Divorced">Divorced</option>
								</select>
							</div>							
						</div>						
						<div class="form-group">
							<label>Permanent Address</label>
							<textarea placeholder="Enter Permanent Address Here" rows="3" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label>Occupation And Address</label>
							<textarea placeholder="Enter Your Occupation With Address Here" rows="3" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label>Present Address</label>
							<textarea placeholder="Enter Present Address Here" rows="3" class="form-control"></textarea>
						</div>						
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>Religion</label>
								<select class="form-control">
									<option value="Islam">Islam</option>
									<option value="Hinduism">Hinduism</option>
									<option value="Buddhist">Buddhist</option>
									<option value="Christian">Christian</option>
									<option value="Others">Others</option>
								</select>								
							</div>	
							<div class="col-sm-4 form-group">
								<label>Educational Qulifications</label>
								<select class="form-control">
									<option value="Ph.D">Ph.D</option>
									<option value="M.Sc">M.Sc</option>
									<option value="M.A">M.A</option>
									<option value="MBA">MBA</option>
									<option value="B.Sc">B.Sc</option>
									<option value="B.A">B.A</option>
									<option value="BBA">BBA</option>
									<option value="HSC">HSC</option>
									<option value="SSC">SSC</option>
									<option value="Under SSC">Under SSC</option>
								</select>								
							</div>	
							<div class="col-sm-4 form-group">
								<label>NID</label>
								<input type="number" placeholder="Enter NID Number" class="form-control">
							</div>		
						</div>
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>Passport number</label>
								<input type="number" placeholder="Enter Passport Number" class="form-control">
							</div>						
							<div class="col-sm-4 form-group">
								<label>Phone Number</label>
								<input type="text" placeholder="Enter Phone Number Here.." class="form-control">
							</div>		
							<div class="col-sm-4 form-group">
								<label>Email Address</label>
								<input type="email" placeholder="Enter Email Address Here.." class="form-control">
							</div>
						</div>			
						<div class="row">
							<div class="col-sm-12 form-group">
								<label style="color:red">Family Details</label>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Name</label>
								<input type="text" placeholder="Enter Name" class="form-control">
							</div>
							<div class="col-sm-6 form-group">
								<label>Relation</label>
								<input type="text" placeholder="Enter Relation" class="form-control">
							</div>	
							<div class="col-sm-6 form-group">
								<label>Address</label>
								<input type="text" placeholder="Enter Address" class="form-control">
							</div>	
							<div class="col-sm-6 form-group">
								<label>Cell No</label>
								<input type="text" placeholder="Enter Cell No" class="form-control">
							</div>									
						</div>						
						<div class="row">
							<div class="col-sm-12 form-group">
								<label style="color:red">In Case Of Emergency</label>
							</div>
						</div>						
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Name</label>
								<input type="text" placeholder="Enter Name" class="form-control">
							</div>
							<div class="col-sm-6 form-group">
								<label>Relation</label>
								<input type="text" placeholder="Enter Relation" class="form-control">
							</div>	
							<div class="col-sm-6 form-group">
								<label>Address</label>
								<input type="text" placeholder="Enter Address" class="form-control">
							</div>	
							<div class="col-sm-6 form-group">
								<label>Cell No</label>
								<input type="text" placeholder="Enter Cell No" class="form-control">
							</div>									
						</div>
					<button type="button" class="btn btn-lg btn-info">Submit</button>					
					</div>
				</form> 				
			</div>			
		</div>	
	</body>
</html>	