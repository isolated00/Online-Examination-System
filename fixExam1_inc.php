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
		$today=date("Y-m-d");

		if ($date>$today) {
			
		$Tslot=$_POST['Tslot'];
		?>
		<h3 class="gradehead">FIX EXAM</h3><br>
		<div class="container-fluid">
			<form class="wrap" method="post" name="f1" action="fixExam2_inc.php">
				<div class="col-md-8 col-md-offset-2 content">
					<input type="hidden" name="date" value="<?php echo $date ?>">
					<input type="hidden" name="Tslot" value="<?php echo $Tslot ?>">
					<div class="form-group">    
						<label>Machine Code:</label>
						<select name="Mcode" class="mech_code">
							<option disabled selected value>Select</option>
							<?php 
							$q_for_M="SELECT * FROM machine_allot WHERE EXAM_DATE='$date' AND EXAM_SLOT='$Tslot'";
							$result=mysqli_query($conn, $q_for_M);
							$count1=mysqli_num_rows($result);
							$s='';$comma=",";
							while ($arr=mysqli_fetch_array($result)) {

								$s = '"'.$arr['MAC_NO'].'"'.$comma.$s;
							}

							$s=substr($s, 0, -1);

							if ($count1>0) {
							$q23="SELECT * FROM machine WHERE M_NO NOT IN($s)";
							$r3=mysqli_query($conn,$q23);
							while ($arr3=mysqli_fetch_array($r3)) {?>
								<option value="<?php echo $arr3['M_NO'] ?>"> <?php echo $arr3['M_NO'] ?></option> 
								<?php	
							}
							}
							else{
							$q23="SELECT * FROM machine";
							$r3=mysqli_query($conn,$q23);
							while ($arr3=mysqli_fetch_array($r3)) {?>
								<option value="<?php echo $arr3['M_NO'] ?>"> <?php echo $arr3['M_NO'] ?></option> 
								<?php	
							}
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
		?>
	<script> alert("Choose A date from tomorrow onwards!"); </script>
	<?php
	header("Refresh:.5; URL=fix_exam.php");
	}
}
?>