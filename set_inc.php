<!doctype html>
<html>
<head>
	<?php include_once 'head.php' ?>
</head>

<body>
	<?php 	
	include_once 'admin_nav.php' ;
	require_once('connection.php');
	session_start();
	?>
	
	<div class="wrap1">	
		<form  method="post" name="f1" action="paper_inc.php">
			<table class="table set">
				<tr style="font-family: on; background-color: #196da8; ">
					<th colspan="1" style="border: 3px solid #196da8 ;"><font size="5" color="white" >Set Question</font></th>
				</tr>
				<br>
				<br>
				<tbody>
					<?php
					if (isset($_POST['submit'])) {
						$C_ID = $_POST['course'];

						$q="SELECT * FROM paper WHERE C_ID='".$C_ID."'";
						$r=mysqli_query($conn,$q);
						$count=mysqli_num_rows($r);
						while($arr=mysqli_fetch_array($r)){

							$P_CODE=$arr['P_CODE'];

							$q2="SELECT * FROM question WHERE P_CODE='$P_CODE'";
							$r2=mysqli_query($conn,$q2);
							$count2=mysqli_num_rows($r2);


							$query="SELECT * FROM paper WHERE P_CODE='$P_CODE'";
							$result=mysqli_query($conn,$query);
							$array=mysqli_fetch_array($result);
							$no_of_ques=$array['NO_OF_QUES'];

							$query1="SELECT * FROM question WHERE P_CODE='$P_CODE'";
							$result2=mysqli_query($conn,$query1);
							$ques_count=mysqli_num_rows($result2);
							if ($ques_count<$no_of_ques) {



									?>

									<tr style="font-family: on; background-color: white;">

										<td style="width: 300px"><input type="radio" name="set" value="<?php echo $arr[0] ?>" required><?php echo "&nbsp".$arr[1]." > ".$arr[0] ?><br></td>

									</tr>



									<?php
								}
						}
						if ($count>0) {
							
							$query="SELECT * FROM paper WHERE P_CODE='$P_CODE'";
							$result=mysqli_query($conn,$query);
							$array=mysqli_fetch_array($result);
							$no_of_ques=$array['NO_OF_QUES'];

							$query1="SELECT * FROM question WHERE P_CODE='$P_CODE'";
							$result2=mysqli_query($conn,$query1);
							$ques_count=mysqli_num_rows($result2);
							if ($ques_count<$no_of_ques) {


								?>


								<tr style="font-family: on; background-color: white">

									<td><button id="btn" type="submit" class="btn btn-primary" name="submit">Next</button></td>


								</tr>
							</tbody>
						</table>
					</form>
				</div>
				<?php
			}else{
				?>  
				<script type="text/javascript"> alert("First, create question set for The Course!"); </script>
				<?php
				header('Refresh:0.1 ; URL=set.php?error=noquestionset');

			}

		}
		else{
			?>  
			<script type="text/javascript"> alert("First, create question set for The Course!"); </script>
			<?php
			header('Refresh:0.1 ; URL=set.php?error=noquestionset');

		}
	}else{
		?>  
		<script type="text/javascript"> alert("You are not so smart huh!"); </script>
		<?php
		header('Location: admin_home.php?LOL');
	}
	mysqli_close($conn);
	?>
</body>
</html

