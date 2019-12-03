<!doctype html>
<html>
<head>
	<?php include_once "head.php";?>
	<style type="text/css">
		table{

			position: relative;
			right: 240px;
		}
		td {
			width: 180px;
			border: 1px solid white;
		}
	</style>
</head>

<body>
	<?php include_once 'user_nav.php'; 

	$q1="SELECT * FROM student WHERE ST_ID='".$_SESSION['userid']."'";
	$r1=mysqli_query($conn,$q1);
	$arr1=mysqli_fetch_array($r1);

	$q2="SELECT C_NAME FROM course WHERE C_ID='".$arr1['C_ID']."'";
	$r2=mysqli_query($conn,$q2);
	$arr2=mysqli_fetch_array($r2);

	$msg="Not Appeared";

	$q3="SELECT * FROM exam WHERE ST_ID='".$_SESSION['userid']."' AND EXAM_STATUS='".$msg."'";
	$r3=mysqli_query($conn,$q3);
	$arr3=mysqli_fetch_array($r3);

	if (empty($arr3[0])||empty($arr3[1])||empty($arr3[2])||empty($arr3[3])) {
		?>
		<script> alert("Your Admit Card has not been generated."); </script>
		<?php

		header('Refresh:.5 ; URL=user_home.php');
		exit();
	}
	?>


	<div class="wrap1">	
		<table class="table">
			<tr style="font-family: on; background-color: #196da8">
				<th colspan="4" style="border: 3px solid #196da8;"><font size="5" color="white" face="Times New Roman" >Admit Card</font></th>
			</tr>
			<br>
			<br>
			<tbody>
				<tr style="font-family: on; background-color: white">

					<td><b>Student ID:</b></td>
					<td><?php echo $arr1[0] ?></td>
					<td><b>Student Name:</b></td>
					<td><?php echo $arr1[1]?></td>
				</tr>
				<tr style="font-family: on; background-color: white">
					<td><b>Course ID:</b></td>
					<td><?php echo $arr1['C_ID']?></td>
					<td><b>Course Name:</b></td>
					<td><?php echo $arr2[0]?></td>
				</tr>

				<tr style="font-family: on; background-color: white">
					<td><b>Exam Code:</b></td>
					<td><?php echo $arr3[0] ?></td>
					<td><b>Exam Date:</b></td>
					<td><?php echo $arr3[1]?></td>
				</tr>
				<tr style="font-family: on; background-color: white">
					<td><b>Exam Slot:</b></td>
					<td><?php echo $arr3[2]?></td>
					<td><b>Machine No:</b></td>
					<td><?php echo $arr3[3] ?></td>
				</tr>
			</tbody>	
		</table>
		<form method="post" action="">
		<input style="position: relative;left: 30px;" type="submit" name="submit" value="Download As PDF">
		</form>
	</div>
	<?php
	if (isset($_POST['submit'])) {
	require_once __DIR__ . '/vendor/autoload.php';



	$mpdf = new \Mpdf\Mpdf();

	$data='<div>	
		<table class="table" style="width:100%; height:800px;" cellspacing="50">
			<tr style="font-family: on; background-color: #196da8">
				<th colspan="4" style="border: 3px solid #196da8;"><font size="5" color="white" face="Times New Roman" >Admit Card</font></th>
			</tr>
			<br>
			<br>
			<tbody border="2">
				<tr style="font-family: on; background-color: white">

					<td><b>Student ID:</b></td>
					<td>'.$arr1[0].'</td>
					<td><b>Student Name:</b></td>
					<td>'.$arr1[1].'</td>
				</tr>
				<tr style="font-family: on; background-color: white">
					<td><b>Course ID:</b></td>
					<td>'.$arr1["C_ID"].'</td>
					<td><b>Course Name:</b></td>
					<td>'.$arr2[0].'</td>
				</tr>

				<tr style="font-family: on; background-color: white">
					<td><b>Exam Code:</b></td>
					<td>'.$arr3[0].'</td>
					<td><b>Exam Date:</b></td>
					<td>'.$arr3[1].'</td>
				</tr>
				<tr style="font-family: on; background-color: white">
					<td><b>Exam Slot:</b></td>
					<td>'.$arr3[2].'</td>
					<td><b>Machine No:</b></td>
					<td>'.$arr3[3].'</td>
				</tr>
			</tbody>	
		</table>
	</div>';
	$mpdf->WriteHTML($data);
	$mpdf->Output('myfile.pdf','D');

	}
	?>
</body>
</html>