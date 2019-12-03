<div class="modal fade " id="myregister" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal" ><font style="font-size:48px;color:red">&times;</font></button>
					<h3 class="modal-title gradehead">Registration</h3><br>

					<div class="modal-body">
						
						<form class="form-horizontal" id="frm-mobile-verification" method="post" name="f1" action="register_inc.php">

							<div class="form-group">   
									<label class="control-label col-sm-2" style="width: 189.333px; position: relative;">Student ID:</label>
									<div class="col-sm-6">  
										<input type="text"  id="uid" name="uid" required autofocus oninvalid="this.setCustomValidity('Enter Student ID Here')"
										oninput="this.setCustomValidity('')" style="width: 254px; height: 34px;position: relative;">
									</div>
									<input type="button" class="btnSubmit btn btn-primary sendotpp" value="Send OTP" onClick="sendOTP();">
							</div>
							
							<div class="container">
							<div style="position: relative;left: 180px" class="sendOTP"></div>
							</div>
							<div class="form-group">     
								<label class="control-label col-sm-4">Password:</label> 
								<div class="col-sm-6">    
									<input type="password" class="form-control" id="pass" name="pass" required pattern="(?=.*\d)(?=.*[a-z]).{6,}" title="Must contain at least one number and one lowercase letter, and at least 6 or more characters"> 
								</div>  
							</div>
							<div class="form-group">     
								<label class="control-label col-sm-4">Confirm Password:</label> 
								<div class="col-sm-6">    
									<input type="password" class="form-control" name="cpass" id="cpass" required oninvalid="this.setCustomValidity('Confirm Your Password')"
									oninput="this.setCustomValidity('')">  
								</div>  
							</div>
							<div class="form-group">     
								<label class="control-label col-sm-4">Hint Question:</label> 
								<div class="col-sm-6">    
									<select type="text" class="form-control" name="hint" required oninvalid="this.setCustomValidity('Choose Hint Question')"
									oninput="this.setCustomValidity('')"><br>
									<option disabled selected value>Choose Question</option>
									<option value="What is your nick name?">What is your nick name?</option>
									<option value="What is your mother's name?">What is your mother's name?</option> 
								</select>
							</div>
						</div>
						<div class="form-group">     
							<label class="control-label col-sm-4">Answer:</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="hAns" id="hans" required oninvalid="this.setCustomValidity('Enter Your Answer')"
								oninput="this.setCustomValidity('')"> 
							</div>
						</div>


						<div class="form-group">
							<div class="col-sm-offset-5 col-sm-10">
								<button id="registerbtn" type="submit" class="btn btn-primary" name="submit">Register</button>
							</div>
						</div> 
					</form>
				</div>
			</div>	
		</div>
	</div>
</div>
<?php
$fullUrl= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($fullUrl, "error=invaliduid") == true) {
	?>  
	<script type="text/javascript"> alert("Your Student Id does not exist on our database."); </script>
	<?php
}
elseif (strpos($fullUrl, "error=passwordcheck&stid") == true) {
	?>  
	<script type="text/javascript"> alert("Please enter the same password!"); </script>
	<?php
}
elseif (strpos($fullUrl, "error=sqlerror") == true) {
	?>  
	<script type="text/javascript"> alert("There is some problem with the server! Try Again!"); </script>
	<?php
}
elseif (strpos($fullUrl, "error=uidalreadytaken") == true) {
	?>  
	<script type="text/javascript"> alert("You have already been registered. Please log in."); </script>
	<?php
}
elseif (strpos($fullUrl, "error=besmarter") == true) {
	?>  
	<script type="text/javascript"> alert("You are not so smart huh!"); </script>
	<?php
}
elseif (strpos($fullUrl, "signup=success") == true) {
	?>  
	<script type="text/javascript"> alert("Your account has been created successfully!"); </script>
	<?php
}
?>