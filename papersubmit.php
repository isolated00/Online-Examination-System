<!doctype html>
<html>
<head>
</head>
<body>
	
	<?php
	session_start();
	require_once('connection.php');

		if (isset($_POST['submit'.$_SESSION['count']])) {

		$P_CODE=$_SESSION['P_CODE'];
		$last_ques="SELECT * FROM question WHERE P_CODE='$P_CODE'";
		$result=mysqli_query($conn,$last_ques);
		$count1=mysqli_num_rows($result);

		if ($count1>0) {
		$ques_no=$array_ques['Q_NO'];
			if ($ques_no<=$no_of_ques) {

				include "question_insert_back.php";
			}
		}else{

				include "question_insert_back.php";
			
			}

		}
		header('Location: paper_inc.php');

	?>
</body>
</html>