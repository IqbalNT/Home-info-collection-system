
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="files/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link href="files/css/style.css" rel="stylesheet" id="bootstrap-css">
		<script src="files/js/bootstrap.min.js"></script>
		<script src="files/js/jquery-1.11.1.min.js"></script>	
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="files/css/style.css" rel="stylesheet" type="text/css">
		<link href="files/css/reg.css" rel="stylesheet" type="text/css">
<style>	
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
</style>	
	</head>
	<body>
		<form id="regForm" action="code/add_owner_reg.php" enctype="multipart/form-data" method="POST" role="form" >
		  <h1>Owner Registration Form </h1>
		  <!-- One "tab" for each step in the form: -->
		  <div class="tab">Personal Details:
			<div class="row">
				<div class="col-md-6">
					<p><input placeholder="Owner Name" oninput="this.className = ''" name="owName"></p>
					<p><input placeholder="Father's Name..." oninput="this.className = ''" name="fatName"></p>
					<p><input placeholder="Mother's Name..." oninput="this.className = ''" name="motName"></p>
					<p><input placeholder="Date Of Brithday" class="textbox-n" type="text" onfocus="(this.type='date')"  name="DOB"> </p>
					<p><input placeholder="Occupation" oninput="this.className = ''" name="occupation"></p>						
					<p><input type="number" min=1 placeholder="NID Number"  name="nid"></p>
					<p>
						<select name="gender" oninput="this.className = ''" class="form-control" required>
							<option>----Select Gender----</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							<option value="Others">Others</option>
						</select>
					</p>
					<p>
						<select name="marital_status" oninput="this.className = ''" class="form-control" required>
							<option>----Select Your Marital Status----</option>
							<option value="Married">Married</option>
							<option value="Unmarried">Unmarried</option>
							<option value="Divorced">Divorced</option>
						</select>
					</p>
					<p><input placeholder="Passport Number" value="passport" oninput="this.className = ''" name="passposrt"></p>					
				</div>
				<div class="col-md-6">
					<p><input placeholder="House Number" oninput="this.className = ''" name="housenumber"></p>
					<p><input placeholder="Road Number" oninput="this.className = ''" name="roadnumber"></p>
					<p><input placeholder="Area" oninput="this.className = ''" name="area"></p>
					<p><input placeholder="Post Code" oninput="this.className = ''"  name="postcode"> </p>
					<p>
						<select name="policestation" oninput="this.className = ''" class="form-control" required>
							<option>----Select Your Police Station----</option>
							<?php 
								Include 'connect.php';
								$query = "SELECT * FROM ps_with_dis WHERE disName='Dhaka'";
								$res = mysqli_query($con,$query);
								while($row = mysqli_fetch_array($res)){
							 ?>
							<option value="<?php echo $row['psName'];?>"><?php echo $row['psName'];?></option>
							<?php } ?>
						</select>						
					</p>
					<p><input type="text" placeholder="Cell Number"   name="cell"></p>	
					<p>
						<select name="religion" oninput="this.className = ''" class="form-control" required>
							<option>----Select Religion----</option>
							<option value="Islam">Islam</option>
							<option value="Hinduism">Hinduism</option>
							<option value="Buddhist">Buddhist</option>
							<option value="Christian">Christian</option>
							<option value="Others">Others</option>
						</select>
					</p>
					<p>
						<select name="qualification" oninput="this.className = ''" class="form-control" required>
							<option>----Select Your Educational Qualification----</option>
								<option value="Ph.D">Ph.D</option>
								<option value="M.Sc">M.Sc</option>
								<option value="M.A">M.A</option>
								<option value="MBA">MBA</option>
								<option value="B.Sc">B.Sc</option>
								<option value="B.A">B.A</option>
								<option value="B.A">B.S.S</option>
								<option value="BBA">BBA</option>
								<option value="HSC">HSC</option>
								<option value="SSC">SSC</option>
								<option value="Under SSC">Under SSC</option>
						</select>
					</p>
						<p><input type="email" placeholder="E-mail" Value="Email" oninput="this.className = ''" name="email"></p>
										
				</div>
			</div>
		  </div>
		  
		  <div class="tab">Family Members:
			<table class="table table-bordered" id="dynamic_field"> 
					<tr>  
						 <td>
						<div class="form-group">
						  <label for="comment">Name</label>
						  <input type="input" name="fmlyname[]" class="form-control" rows="1" id="comment"></textarea>
						</div>
						</td>  
						 <td>
						 <div class="form-group">
						  <label for="comment">Relation</label>
						  <input type="input" name="relation[]" class="form-control" rows="1" id="comment"></textarea>
						</div>
						</td>    
						 <td> <button type="button" name="add" id="add" class="btn btn-success" style="background-color:#802000!important;">Add More</button></td> 	
					</tr>
			</table>
		  </div>		  

		  <div class="tab">In Case Of Emergency
			<p><input placeholder="Name" oninput="this.className = ''" name="emergenceName"></p>
			<p><input placeholder="Relation" oninput="this.className = ''" name="emergenceRelation"></p>
			<p><input placeholder="Cell Number" oninput="this.className = ''" name="emergenceNumber"></p>
		  </div>
		  <div class="tab">Last Step
			<p>
				<span class="btn btn-default btn-file">
					Upload Your Image <input type="file" name="personalIMG">
				</span>
				<span class="btn btn-default btn-file">
					Upload Your NID Scan Copy <input type="file" name="personalNID">
				</span>
			</p>			
			<p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
		  </div>
		  <div style="overflow:auto;">
			<div style="float:right;">
			  <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
			  <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
			</div>
		  </div>
		  <!-- Circles which indicates the steps of the form: -->
		  <div style="text-align:center;margin-top:40px;">
			<span class="step"></span>
			<span class="step"></span>
			<span class="step"></span>
			<span class="step"></span>
		  </div>
		</form>

		<script src="files/js/reg.js">
		</script>
		
		<script>
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><div class="form-group"><label for="comment">Name</label><input type="input" name="fmlyname[]" class="form-control" rows="1" id="comment"></textarea></div></td>  <td><div class="form-group"><label for="comment">Relation :</label><input type="input" name="relation[]" class="form-control" rows="1" id="comment"></textarea></div></td> <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });   
 });   		
		</script>
	</body>
</html>
