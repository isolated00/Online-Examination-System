<!doctype html>
<html>
<head>
	<?php include_once 'head.php' ?>
	<style type="text/css">
		.textboxx1{
			width: 120px;
		}
		.textboxx2{
			width: 350px;
		}
		td{
			width: 500px;
		}

	</style>
</head>

<body>
	<?php include_once 'admin_nav.php' ;
	require_once('connection.php');
	session_start();
	if (!isset($_SESSION['P_CODE'])) {
		$P_CODE=$_POST['set'];
		$_SESSION['P_CODE']=$P_CODE;
	}
	$q1="SELECT * FROM paper WHERE P_CODE='".$_SESSION['P_CODE']."'";
	$r1=mysqli_query($conn,$q1);
	$arr1=mysqli_fetch_array($r1);
	$P_NAME=$arr1['P_NAME'];
	$no_of_ques=$arr1['NO_OF_QUES'];
	if (!isset($_SESSION['count'])) {

		$_SESSION['count']=1;
	}

	$paper_code=$_SESSION['P_CODE'];
	$last_ques="SELECT * FROM question WHERE P_CODE='$paper_code'";
	$result=mysqli_query($conn,$last_ques);
	$count1=mysqli_num_rows($result);

	if ($count1>0) {
		while($array_ques=mysqli_fetch_array($result)){
			$ques_no=$array_ques['Q_NO'];	
		}
		if ($ques_no<$no_of_ques) {

			$last_ques="SELECT * FROM question WHERE P_CODE='$paper_code'";
			$result=mysqli_query($conn,$last_ques);
			while($array_ques=mysqli_fetch_array($result)){
				$ques_no=$array_ques['Q_NO'];	
			}

			include "ques_insert.php";


		}else{
			?>  
			<script type="text/javascript"> alert("This Question Set is Full!"); </script>

			<?php
			unset($_SESSION['P_CODE']);
			unset($_SESSION['count']);
			header("Refresh:.5; URL=admin_home.php?submit=all");
			exit();
		}
		}else{

			include "ques_insert.php";

		}
	?>
</body>
</html>
