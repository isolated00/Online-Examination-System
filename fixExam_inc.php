<!doctype html>
<html>
<head>
<?php include_once 'head.php' ?>
</head>
<body>
<?php 
	if (isset($_POST['submit'])) {
	include_once 'admin_nav.php'; 
	require_once 'connection.php';
	session_start();

   $E_CODE=$_POST['e_code'];
   $_SESSION['e_code']=$E_CODE;
   
   $q1 = "SELECT * FROM exam WHERE EXAM_CODE='$E_CODE'";
   $r1 = mysqli_query($conn,$q1);
   $arr1=mysqli_fetch_array($r1);
   $courseID=$arr1["C_ID"];
   $stid=$arr1['ST_ID'];

   $que1="SELECT * FROM student WHERE ST_ID='$stid'";
   $result=mysqli_query($conn,$que1);
   $array1=mysqli_fetch_array($result);

   $name=$array1['ST_NAME'];

   $que2="SELECT * FROM course WHERE C_ID='$courseID'";
   $result2=mysqli_query($conn,$que2);
   $array2=mysqli_fetch_array($result2);

   $courseName=$array2['C_NAME'];

  	$q2="SELECT P_CODE FROM paper WHERE C_ID='$courseID' ORDER BY RAND() LIMIT 1";
	$r2=mysqli_query($conn,$q2);
	$array=mysqli_fetch_array($r2);
	$count1=mysqli_num_rows($r2);
	$P_CODE=$array[0];
	$_SESSION['$p_code']=$P_CODE;
	if ($count1>0) {

	

?>
<h3 class="gradehead">Fix Exam</h3><br>
 <div class="container-fluid">
		<form class="wrap" method="post" name="f1" action="fixExam1_inc.php">
			<div class="col-md-8 col-md-offset-2 content">
			<div class="form-group">    
				<label for="user">Student ID:</label>
				<input class="textboxx" type="text" class="form-control" name="stid" value="<?php echo $stid?>" required>
			</div>
			<div class="form-group">    
				<label for="user">Student Name:</label>
				<input class="textboxx" type="text" class="form-control" name="name" value="<?php echo $name?>" required>
			</div>
			<div class="form-group">    
				<label for="user">Course ID:</label>
				<input class="textboxx" type="text" class="form-control" name="cid" value="<?php echo $courseID ?>" required>
			</div>
			<div class="form-group">    
				<label for="user">Course Name:</label>
				<input class="textboxx" type="text" class="form-control" name="cname" value="<?php echo $courseName ?>" required>
			</div>
			<div class="form-group">     
					<label for="user">Exam Date:</label>     
					<input class="textboxx" type="Date" class="form-control" name="date" required="Choose A date from tomorrow onwards">   
			</div>
			<div class="form-group">     
					<label for="user">Paper Code:</label>     
					<input class="textboxx" type="text" class="form-control" name="p_code" value="<?php echo $P_CODE ?>" required>   
			</div>
			<div class="form-group">    
					<label>Time Slots:</label>
					<select name="Tslot">
					<option disabled selected value>Select</option>
					<?php 
					$q2="SELECT * FROM exam_slot";
					$r2=mysqli_query($conn,$q2);
					while ($arr2=mysqli_fetch_array($r2)) {?>
					<option value="<?php echo $arr2['EXAM_SLOT'] ?>"> <?php echo $arr2['EXAM_SLOT'] ?> </option> 
					<?php
					}
					?>
				</select>
			</div>
			<button type="submit" class="btn btn-primary" name="submit">Submit</button>
		</div>
	</form>
</div>
<br>
<br>
<br>
</body>
</html>
<?php
}
else{
	$q3="SELECT C_NAME FROM course WHERE C_ID='$courseID'";
	$r3=mysqli_query($conn,$q3);
	$ar3=mysqli_fetch_array($r3);
	$coursename= $ar3[0];
	?>
	<script> alert("Please create question first for the <?php echo $coursename ?> (<?php echo $courseID ?>)."); </script>
	<?php
	header("Refresh:.5; URL=fix_exam.php");
}
}
?>