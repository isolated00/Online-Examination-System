<div class="modal fade " id="mylogin" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal" ><font style="font-size:48px;color:red">&times;</font></button>
				<h3 class="modal-title gradehead">Login</h3><br>

				<div class="modal-body">

					<form class="form-horizontal" method="post" name="f1" action="login_inc.php">
						<div class="form-group">     
							<label class="control-label col-sm-3">Student ID:</label> 
							<div class="col-sm-6">    
								<input type="text" class="form-control" id="uid" name="uid" required autofocus oninvalid="this.setCustomValidity('Enter Student ID Here')"
								oninput="this.setCustomValidity('')"> 
							</div>  
						</div> 
						<div class="form-group">     
							<label class="control-label col-sm-3">Password:</label> 
							<div class="col-sm-6">    
								<input  type="password" class="form-control" id="pass"  name="pass" required oninvalid="this.setCustomValidity('Enter Your Password Here')"oninput="this.setCustomValidity('')">
							</div>  
						</div>
						<div class="form-group">
							<div class="col-sm-offset-5 col-sm-10">
								<button type="submit"  class="btn btn-primary" name="submit">Login</button>
							</div>
						</div>
					</form>

				</div>


				<div style="text-align: right;"><a href="forget.php">Forgot your password?</a></div>



			</div>
		</div>

	</div>

</div>

<?php
$fullUrl= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($fullUrl, "error=nouser") == true) {
	?>  

	<?php
}
elseif (strpos($fullUrl, "error=wrongpassword") == true) {
	?>  
	<script type="text/javascript"> alert("Enter your correct Student ID/Password!"); </script>
	<?php
}
elseif (strpos($fullUrl, "error=sqlerror") == true) {
	?>
	<script type="text/javascript"> alert("There is some problem with the server!Try Again!"); </script>
	<?php
} 
elseif (strpos($fullUrl, "error=disabled") == true) {
	?>
	<script type="text/javascript"> alert("Your account has been disabled by the management."); </script>
	<?php
}
?>