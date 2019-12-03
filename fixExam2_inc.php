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

		$date=$_POST['date'];
		$Tslot=$_POST['Tslot'];
		$Mcode=$_POST['Mcode'];
		$P_CODE=$_SESSION['$p_code'];
		$E_CODE=$_SESSION['e_code'];


	$q2="UPDATE exam SET EXAM_DATE = '$date', EXAM_SLOT= '$Tslot', M_NO= '$Mcode', P_CODE='$P_CODE' WHERE EXAM_CODE = '$E_CODE'";
	$r2=mysqli_query($conn,$q2);
	if (!$r2) {
	?>
	<script> alert("An server-side error occured.Please try again!"); </script>
	<?php
	}
	else{
	$q3="INSERT INTO machine_allot (EXAM_DATE,EXAM_SLOT,MAC_NO) VALUES ('$date','$Tslot','$Mcode')";
	$r3=mysqli_query($conn,$q3);
	if (!$r3) {
	?>
	<script> alert("An server-side error occured.Please try again!!"); </script>
	<?php	
	}
	else{
	?>
	<script> alert("Exam (<?php echo $E_CODE ?>) is Fixed!"); </script>
	<?php
	unset($_SESSION['$p_code']);
	unset($_SESSION['e_code']);
	header("Refresh:.5; URL=admin_home.php");
	}
	}
}
	