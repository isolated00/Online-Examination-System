<!doctype html>
<html>
<head>
	<?php include_once 'head.php' ?>
</head>

<body>
	<?php 	include_once 'admin_nav.php' ;
	require_once('connection.php');
	session_start();
	?>

	<div class="wrap1">	
		<form  method="post" name="f1" action="ViewPaper_inc.php">
			<table class="table set">
				<tr style="font-family: on; background-color: #196da8; ">
					<th colspan="1" style="border: 3px solid #196da8 ;"><font size="5" color="white" >View Question</font></th>
				</tr>
				<br>
				<br>
				<tbody>
					<?php
					$q1="SELECT DISTINCT paper.P_CODE FROM paper INNER JOIN question ON paper.P_CODE = question.P_CODE;";
					$r1=mysqli_query($conn,$q1);
					$count=mysqli_num_rows($r1);
					if ($count>0) {

						while ($arr1=mysqli_fetch_array($r1)) {	

							$que2="SELECT P_NAME FROM paper WHERE P_CODE='$arr1[0]'";
							$res2=mysqli_query($conn,$que2);
							$array2=mysqli_fetch_array($res2);
							?>
							<tr style="font-family: on; background-color: white;">

								<td style="width: 300px"><input type="radio" name="course" value="<?php echo $arr1[0] ?>" required><?php echo "&nbsp".$array2[0]." > ".$arr1[0] ?><br></td>

							</tr>
							<?php
						}
					}
					else{
						header("Refresh:.5; URL=admin_home.php");
						?>
						<script> alert("You haven't created any question yet."); </script>
						<?php
					}
					mysqli_close($conn);
					?>
					<tr style="font-family: on; background-color: white">

						<td><button id="btn" type="submit" class="btn btn-primary" name="submit">View</button></td>

					</tr>
				</tbody>
			</table>
		</form>
	</div>
</body>
</html>