<!doctype html>
<html>
<head>
	<?php include_once 'head.php' ?>
</head>
<body>
	<?php include_once 'admin_nav.php' ;
	require_once('connection.php');
	session_start();

	$P_CODE=$_POST['course'];

	$que= "SELECT * FROM question WHERE P_CODE='$P_CODE'";
	$res= mysqli_query($conn,$que);
	while($arr=mysqli_fetch_array($res)){
		?>
		<div class="wrap2">
			<h4 style="font-size: 20px; color:  #196da8;">
				<?php echo $arr['Q_NO'].". ".$arr['QUESTION']; ?>
			</h4><br>

			<font size="3">&nbsp<?php echo $arr['ANS1'] ?></font>&nbsp&nbsp
			<font size="3">&nbsp<?php echo $arr['ANS2'] ?></font>&nbsp&nbsp
			<font size="3">&nbsp<?php echo $arr['ANS3'] ?></font>&nbsp&nbsp
			<font size="3">&nbsp<?php echo $arr['ANS4'] ?></font>&nbsp&nbsp
			<font size="3">&nbsp<?php echo $arr['C_ANS'] ?></font>&nbsp&nbsp
		</div>
		<?php
	}
	?>
</body>
</html>