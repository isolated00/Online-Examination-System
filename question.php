<!doctype html>
<html>
<head>
<?php include_once "head.php";?>
<style type="text/css">
	body{
		height: 800px;
	}
</style>
</head>
<body>
<?php include_once "admin_nav.php" ?>
	<h3 class="gradehead">Create Question Set</h3><br>
	<div class="container-fluid">
		<form class="wrap" method="post" name="f1" action="question_inc.php">
			<div class="col-md-8 col-md-offset-2 content">
			<div class="form-group">     
				<label for="user">Paper Name:</label>     
				<input class="textboxx" type="text" class="form-control" name="p_name" required>   
			</div>
			<div class="form-group">
				<label for="course">Choose Courses:</label>
				<select class="textboxx" class="form-control" name="c_id" required>
						<option selected></option>
					<?php
					require_once "connection.php";
					$q="SELECT * FROM course";
					$r=mysqli_query($conn,$q);
					while($arr=mysqli_fetch_array($r)){
						?> 
						<option value="<?php echo $arr['C_ID'] ?>"> <?php echo $arr['C_NAME'] ?> </option> 
						<?php
					}
					?>		
				</select>
			</div>
			<div class="form-group">     
         	<label for="time_limit">Time Limit:</label>     
         	<input class="textboxx" type="number" class="form-control" name="time_limit" required>  
         	</div>
         	<div class="form-group">     
         	<label for="no_que">Number of Questions:</label>     
         	<input class="textboxx" type="number" class="form-control" name="no_que" required>  
         	</div>
         	<div class="form-group">     
         	<label for="no_opt">No of Q. needed per 1 neg mark:</label>     
         	<input class="textboxx" type="number" class="form-control" name="no_opt" required>  
         	</div>
         	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
         </div>
		</form>
	</div>
</body>
</html>