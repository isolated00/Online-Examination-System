<!doctype html>
<html>
<head>
	<?php include_once 'head.php' ?>
</head>
<body>
	<?php include_once 'user_nav.php' ?>

	<?php
	
	$uid=$_SESSION['userid'];
	$q1="SELECT * FROM exam WHERE ST_ID='$uid' AND EXAM_STATUS='Not Appeared'";
		$r1=mysqli_query($conn,$q1);
		$count1=mysqli_num_rows($r1);
		$row1 = mysqli_fetch_array( $r1 );

			$date=$row1['EXAM_DATE'];
			$datetoday= date("Y-m-d");



	if ($count1==0) {
		?>
		<script> alert("Your have already given your exam."); </script>
		<?php
		header('Refresh:.5 ; URL=user_home.php');
		exit();
	}

		if ($date!=$datetoday){
		?>
		<script> alert("Your exam is not today."); </script>
		<?php
		header('Refresh:.5 ; URL=user_home.php');
		exit();
	}

	$msg="Not Appeared";

	$q3="SELECT * FROM exam WHERE ST_ID='".$_SESSION['userid']."' AND EXAM_STATUS='".$msg."'";
	$r3=mysqli_query($conn,$q3);
	$arr3=mysqli_fetch_array($r3);

	if (empty($arr3[1])||empty($arr3[2])||empty($arr3[3])||empty($arr3[6])){

		?>
		<script> alert("Your exam has not been set yet."); </script>
		<?php
		header('Refresh:1 ; URL=user_home.php');
		exit();
	}


	?>

	<div class="container-fluid act">
		<form class="wrap" method="post" name="f1" action=""> 
			<div class="col-md-8 col-md-offset-2 content">
				<br>
				<label for="act_no">ACTIVATION NO:</label><br><br> 
				<div class="form-group">     
					<input class="textboxx" type="text" class="form-control" name="act_no" required> 
				</div><br> 
				<button class="btn btn-primary" type="submit" name="submit">Submit</button> 
			</div>

		</form>
	</div>
	<?php
if(isset($_POST['submit'])){

		$act_no=mysqli_real_escape_string( $conn,$_POST['act_no']);
		$uid=$_SESSION['userid'];

		$q1="SELECT * FROM exam WHERE ST_ID='$uid' AND EXAM_STATUS='Not Appeared'";
		$r1=mysqli_query($conn,$q1);
		$count1=mysqli_num_rows($r1);

		if($count1>0){

			while($row1 = mysqli_fetch_array( $r1 )){
				$ract_no=$row1['ACTIVATION_NO'];

				if($ract_no==$act_no){
						
				header("Location: terms.php");
	
					}else{
						?>
						<script> alert("You have already gave your exam!"); </script>
						<?php
					}
			
				}
		
		}else{
				?>
				<script> alert("Please apply for exam!"); </script>
				<?php
			 }
}
	
?>

</body>
</html>