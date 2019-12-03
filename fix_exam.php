<!doctype html>
<html>
<head>
<?php include_once 'head.php' ?>
</head>
<body>
<?php include_once 'admin_nav.php'; 
	  require_once  'connection.php';
	  session_start();

	  $q1="SELECT * FROM exam WHERE EXAM_STATUS='Not Appeared' AND P_CODE IS NULL";
	  $r1=mysqli_query($conn,$q1);
	  $count=mysqli_num_rows($r1);
	  if ($count==0) {
	 ?>
	<script> alert("Nobody applied."); </script>
	<?php
	header("Refresh:.5; URL=admin_home.php");
	}
 ?>

<h3 class="gradehead">Fix Exam</h3><br>
<div class="container-fluid">
		<form class="wrap" method="post" name="f1" action="fixExam_inc.php">
			<div class="col-md-8 col-md-offset-2 content">
			
			<div class="form-group">    
				<label for="user">Exam Code:</label>     
				<select style="width: 250px;height: 30px;" name="e_code" required>
					<option disabled selected value>Choose Exam Code</option>
				<?php while($ar1=mysqli_fetch_array($r1)){?>

					<option value="<?php echo $ar1['EXAM_CODE'] ?>"> <?php echo $ar1['EXAM_CODE'] ?> </option> 

				<?php } ?>
				</select>  
			</div>
			<button type="submit" class="btn btn-primary" name="submit">Next</button>
		</div>
	</form>
</div>
</body>
</html>