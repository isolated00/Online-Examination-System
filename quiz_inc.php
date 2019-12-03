<?php
require( "connection.php" );
session_start();
unset($_SESSION['startTime']);
unset($_SESSION['duration']);
$i = 1;
$j = 100;
$k = 0;
$l = 0;
$m = 0;
$a = 0;
$b = 0;
$ecode = $_SESSION[ 'exam_code' ];
$pcode = $_SESSION[ 'p_code' ];
$que_count = $_SESSION[ 'que_count' ];

while ( $i <= $que_count ) {

	$queno = $_POST[ $j ];
	$q6 = "SELECT * FROM question WHERE Q_NO='" . $queno . "' AND P_CODE='" . $pcode . "'";
	$r6 = mysqli_query( $conn, $q6 );

	$arr6 = mysqli_fetch_array( $r6 );
	if ( isset( $_POST[ $i ] ) ) {

		$ans = $_POST[ $i ];
		if ( $arr6[ 'C_ANS' ] == $ans ) {
			$k++; #CORRECT_ANS
			$a = $a + 1;

		} else {
			$l++; #WRONG_ANS	
		}
		$m++; #N OF_ATTEMPTS	
	}
	$i++;
	$j++;
}
$b = -$b;

$q5="SELECT * FROM paper WHERE P_CODE='$pcode'";
$r5=mysqli_query($conn,$q5);
$arr5=mysqli_fetch_array($r5);
$neg_mark_count=$arr5['NEG_MARKS_COUNT'];

if ($neg_mark_count==0) {
	$b=0;
}
elseif($neg_mark_count>$l){
	$b=0;
}else{
	$b=($l/$neg_mark_count);
	$a=($a-$b);
}

if ( $a == 0 ) {
	$Perc = 0;
} else if ( ( ( $a / $que_count ) * 100 ) < 0 ) {
	$Perc = 0;
} else {
	$Perc = ( $a / $que_count ) * 100;
}

if ( $Perc < 40 ) {
	$grade = "F";
	$status = "FAIL";
} else {
	$grade = "P";
	$status = "PASS";
}
$msg1="COMPLETED";

$stid= $_SESSION['userid'];

if ($status=='PASS') {
	$quee = "UPDATE student SET STATUS='$msg1' WHERE ST_ID='$stid'";
	$res=mysqli_query($conn,$quee);	
}


$q1 = "INSERT INTO result VALUES ('" . $ecode . "','" . $que_count . "','" . $m . "','" . $l . "','" . $k . "','" . $b . "','" . $a . "','" . $Perc . "','" . $grade . "','" . $status . "')";
$r1 = mysqli_query( $conn, $q1 );

if ( !$r1 ) {
	?>
	<script> alert("An serverside error occured.Please try again!"); </script>
	<?php
	header("Refresh:.5; URL= userhome.php?error=sqlerror");
	exit();
}
$q_xmstatus="UPDATE exam SET EXAM_STATUS='Appeared' WHERE EXAM_CODE='".$ecode."'";
$r_xmstatus=mysqli_query($conn,$q_xmstatus);
if ( !$r_xmstatus ) {
	?>
	<script> alert("An serverside error occured.Please try again!"); </script>
	<?php
	header("Refresh:.5; URL= userhome.php?error=sqlerror");
	exit();
}
if ( $k == 0 ) {
	$q2 = "UPDATE result SET CORRECT_ANS='0' WHERE EXAM_CODE='" . $ecode . "'";
	$r2 = mysqli_query( $conn, $q2 );
}
if ( $l == 0 ) {
	$q3 = "UPDATE result SET WRONG_ANS='0' WHERE EXAM_CODE='" . $ecode . "'";
	$r3 = mysqli_query( $conn, $q3 );
}

?>
	<script> alert("You Have Completed Your Exam Successfully."); </script>
<?php

mysqli_close( $conn );
session_start();
session_unset();
session_destroy();
header("Refresh:.5; URL=index.php?success");