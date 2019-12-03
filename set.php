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
		<form  method="post" name="f1" action="set_inc.php">
			<table class="table set">
				<tr style="font-family: on; background-color: #196da8; ">
					<th colspan="1" style="border: 3px solid #196da8 ;"><font size="5" color="white" >Set Question</font></th>
				</tr>
				<br>
				<br>
				<tbody>
					<?php
					$q1="SELECT * FROM course";
					$r1=mysqli_query($conn,$q1);
					while ($arr1=mysqli_fetch_array($r1)) {	
						?>
						<tr style="font-family: on; background-color: white;">

							<td style="width: 300px"><input type="radio" name="course" value="<?php echo $arr1[0] ?>" required><?php echo "&nbsp".$arr1[1]." > ".$arr1[0] ?><br></td>

						</tr>
						<?php
					}
					mysqli_close($conn);
					?>
					<tr style="font-family: on; background-color: white">

							<td><button id="btn" type="submit" class="btn btn-primary" name="submit">Next</button></td>

					</tr>
				</tbody>
			</table>
		</form>
	</div>
</body>
</html>