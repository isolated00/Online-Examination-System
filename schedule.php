<!doctype html>
<html>
<head>
	<?php include_once 'head.php' ?>
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
	<?php session_start();
	include_once 'admin_nav.php';
	require_once 'connection.php';
	?>	<h3 class="gradehead">Exam Schedule</h3><br>
	<div class="container-fluid date">
		<form class="wrap" method="post" name="f1" action="">
			<div class="col-md-8 col-md-offset-2 content">

				<div class="form-group">     
					<label for="user">Choose Date:</label>     
					<input class="textboxx" type="Date" class="form-control" name="date" required>   
				</div>
				<div class="searchbtn">
					<button type="submit" class="btn btn-primary" name="submit">Search</button>
				</div>
			</div>
		</form>
	</div>
	<?php
	if (isset($_POST['submit'])) {
		$date= $_POST['date'];
		$fdate=date("d-m-Y",strtotime($date));

		$q="SELECT * FROM exam WHERE EXAM_DATE='".$date."'";
		$r=mysqli_query($conn,$q);
		$count1=mysqli_num_rows($r);
		if ($count1>0) {
			while ($arr=mysqli_fetch_array($r)) {
				if ($arr['EXAM_STATUS']=="Not Appeared") {
					?>
					<div class="container-fluid">
						<table style="border: 1px solid black;	text-align: center;">
							<thead style="height: 60px; background-color: #196da8">
								<tr style="color: white; font-family: on;" >
									<td>Student ID</td>
									<td>Student Name</td>
									<td>Course ID</td>
									<td>Course Name</td>
									<td>Exam Code</td>
									<td>Exam Date</td>
									<td>Exam Slot</td>
									<td>Machine No.</td>
									<td>Activation No.</td>
								</tr>
							</thead>
						</div>
						<?php
						break;
					}
				}
				$q1="SELECT * FROM exam WHERE EXAM_DATE='".$date."'";
				$r1=mysqli_query($conn,$q1);
				while ($arr1=mysqli_fetch_array($r1)) {

					if ($arr1['EXAM_STATUS']=="Not Appeared") {
						$ST_ID=$arr1['ST_ID'];
						$C_ID=$arr1['C_ID'];
						$E_CODE=$arr1['EXAM_CODE'];
						$date1=$arr1['EXAM_DATE'];
						$fdate1=date("d-m-Y",strtotime($date1));
						$SLOT=$arr1['EXAM_SLOT'];
						$MAC=$arr1['M_NO'];
						$ACT_CODE=$arr1['ACTIVATION_NO'];

						$q2="SELECT * FROM student WHERE ST_ID='".$ST_ID."'";
						$r2=mysqli_query($conn,$q2);
						$arr2=mysqli_fetch_array($r2);

						$ST_NAME=$arr2['ST_NAME'];

						$q3="SELECT * FROM course WHERE C_ID='".$C_ID."'";
						$r3=mysqli_query($conn,$q3);
						$arr3=mysqli_fetch_array($r3);

						$C_NAME=$arr3['C_NAME'];
						?>
						<tbody style="height: 40px;">
							<tr>
								<td><?php echo $ST_ID?></td>
								<td><?php echo $ST_NAME?></td>
								<td><?php echo $C_ID?></td>
								<td><?php echo $C_NAME?></td>
								<td><?php echo $E_CODE?></td>
								<td><?php echo $fdate1?></td>
								<td><?php echo $SLOT?></td>
								<td><?php echo $MAC?></td>
								<td><?php echo $ACT_CODE?></td>
							</tr>
						</tbody>
						<?php
					}
				}
			?>
			</table>
			<?php	
		}
		else{
			?>
			<script> alert("No Exam Scheduled on <?php echo $fdate?>."); </script>
			<?php
		}
	mysqli_close( $conn );	
	}
	?>

</body>
</html>