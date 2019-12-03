<?php
$quesno="qno"; $quess="ques"; $anss1="ans1"; $anss2="ans2"; $anss3="ans3"; $anss4="ans4"; $canss="cans";
$quessno=mysqli_real_escape_string( $conn,$_POST[$quesno.$_SESSION['count']]);
				$ques=mysqli_real_escape_string( $conn,$_POST[$quess.$_SESSION['count']]);
				$ans1=mysqli_real_escape_string( $conn,$_POST[$anss1.$_SESSION['count']]);
				$ans2=mysqli_real_escape_string( $conn,$_POST[$anss2.$_SESSION['count']]);
				$ans3=mysqli_real_escape_string( $conn,$_POST[$anss3.$_SESSION['count']]);
				$ans4=mysqli_real_escape_string( $conn,$_POST[$anss4.$_SESSION['count']]);
				$cans=$_POST[$canss.$_SESSION['count']];

				$q3="INSERT INTO question(Q_NO,QUESTION,ANS1,ANS2,ANS3,ANS4,C_ANS,P_CODE) VALUES('".$quessno."','".$ques."','".$ans1."','".$ans2."','".$ans3."','".$ans4."','".$cans."','".$P_CODE."')";
				$r3=mysqli_query($conn,$q3);

				if (!$r3) {
					?>  
					<script type="text/javascript"> alert("ERROR!! Please Try Again!!"); </script>

					<?php
					header("Refresh:.5; URL=admin_home.php?submit=error");
					exit();	
				}
				$_SESSION['count']++;
