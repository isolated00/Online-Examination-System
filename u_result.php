<!doctype html>
<html>
<head>
<?php include 'head.php' ?>
<style type="text/css">
table, td, th {
  border: 1px solid black;
}

table {
 width: 80%;
 position: relative;
 left: 115px;
}

th {
  height: 50px;
}
</style>
</head>

<body>
<?php include 'user_nav.php';

$uid=$_SESSION['userid'];
$q="SELECT * FROM exam WHERE ST_ID='".$uid."'";
$r=mysqli_query($conn,$q);
$array=mysqli_fetch_array($r);
if ($array['EXAM_STATUS']=="Appeared") {
?>
<br>
<br>
<br>
<div class="container-fluid">
	<table style="border: 1px solid black;	text-align: center;">
		<thead style="height: 60px; background-color: #196da8">
			<tr style="color: white; font-family: on;" >
				<td>Exam Code</td>
				<td>Total Questions</td>
				<td>Attempts</td>
				<td>Wrong Answer</td>
				<td>Correct Answer</td>
				<td>Negative Marks</td>
				<td>Marks</td>
				<td>Percentage</td>
				<td>Grade</td>
				<td>Status</td>
			</tr>
	</thead>
<?php
$q="SELECT * FROM exam WHERE ST_ID='".$uid."'";
$r=mysqli_query($conn,$q);
while($exam_cd_arr=mysqli_fetch_array($r)){
$e_id=$exam_cd_arr['EXAM_CODE'];
$q1="SELECT * FROM result WHERE EXAM_CODE='".$e_id."'";
$r1=mysqli_query($conn,$q1);
$result_arr=mysqli_fetch_array($r1);
$count1=mysqli_num_rows($r1);
if ($count1>0) {
?>
		<tbody style="height: 40px;">
			<tr>
				<td><?php echo $result_arr[0]?></td>
				<td><?php echo $result_arr[1]?></td>
				<td><?php echo $result_arr[2]?></td>
				<td><?php echo $result_arr[3]?></td>
				<td><?php echo $result_arr[4]?></td>
				<td><?php echo $result_arr[5]?></td>
				<td><?php echo $result_arr[6]?></td>
				<td><?php echo $result_arr[7]?></td>
				<td><?php echo $result_arr[8]?></td>
				<td><?php echo $result_arr[9]?></td>
			</tr>
		</tbody>	
<?php
}
}
?>
</table>
</div>
<?php
}
else{
	header("Refresh:.5; URL=user_home.php");
?>
	<script> alert("You don't have any result to show."); </script>
<?php
}
mysqli_close( $conn );
?>	
</body>
</html>