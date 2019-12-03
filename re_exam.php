<!doctype html>
<html>
<head>
<?php include_once 'head.php' ?>
</head>

<body>
<?php include_once 'user_nav.php' ?>
<?php

$uid=$_SESSION['userid'];
$q2= "SELECT * FROM exam WHERE ST_ID='$uid'";
        $r2= mysqli_query($conn, $q2);
        $row1= mysqli_fetch_array($r2);
        $count1=mysqli_num_rows($r2);
     if ($count1>=2) {
        ?>
        <script> alert("You have used all your attempts for re-application!"); </script>
        <?php
        header("Refresh:.1;URL=user_home.php?error");
        exit();
        }

$que7= "SELECT EXAM_CODE FROM exam WHERE ST_ID='$uid' AND EXAM_STATUS='Appeared'";
$res7=mysqli_query($conn,$que7);
$array=mysqli_fetch_array($res7);
$count2=mysqli_num_rows($res7);
if ($count2>0) {
$ecode1=$array[0];

$que6= "SELECT * FROM result WHERE EXAM_CODE='$ecode1'";
$res6=mysqli_query($conn,$que6);
$row6= mysqli_fetch_array($res6);
$count=mysqli_num_rows($res6);
if ($row6['STATUS']!="FAIL") {
  ?>
        <script> alert("You have already passed your exam!"); </script>
        <?php
        header("Refresh:.1;URL=user_home.php?error");
        exit();
        }

}


if (isset($_POST['submit'])) {
	$uid=$_SESSION['userid'];

	$e = "E";
        if ( !isset( $Ecode ) ) {
            $Ecode = 1000;
        }

        $q1 = "SELECT * from exam";
        $r1 = mysqli_query( $conn, $q1 );
        if ( isset( $r1 ) ) {
            while ( $arr1 = mysqli_fetch_array( $r1 ) ) {
                $Ecode = ltrim( $arr1[ 0 ], 'E' );
                $Ecode = $Ecode + 1;
            }
        }

       	$q2= "SELECT * FROM exam WHERE ST_ID='".$uid."'";
       	$r2= mysqli_query($conn, $q2);
       	$row1= mysqli_fetch_array($r2);
        $count1=mysqli_num_rows($r2);

        if ($count1<2) {
        
       	if ($row1['EXAM_STATUS']!="Not Appeared" ) {
       		
       	$q3 = "SELECT * FROM student WHERE ST_ID='" . $uid . "'";
        $r3 = mysqli_query( $conn, $q3 );
        $arr3 = mysqli_fetch_array( $r3 );

        $activno= rand(10000,99999);
        $text="Not Appeared";

   		$q4 = "INSERT INTO exam (EXAM_CODE,ST_ID,C_ID,ACTIVATION_NO,EXAM_STATUS) VALUES ('".$e.$Ecode."','".$uid."','".$arr3['C_ID']."','".$activno."','".$text."')";
        $r4=mysqli_query($conn, $q4);	
       	
       	 if ( !$r4 ) {
             ?>
			<script> alert("Re-application failed."); </script>
			<?php
              header("Refresh:.5; URL=user_home.php");
            } 
            else {
            ?>
			<script> alert("Re-application Succesful."); </script>
			<?php

               	header("Refresh:.5; URL=user_home.php");
       		}
        }
       	else{
       		 ?>
			<script> alert("You have not Appeared in your previous exam."); </script>
			<?php
       	}

        }else {
      ?>
      <script> alert("You have used all your attempts."); </script>
      <?php

        }
} 
$uid=$_SESSION['userid'];

$que2= "SELECT * FROM exam WHERE ST_ID='".$uid."'";
        $re2= mysqli_query($conn, $que2);
       
        $ro1= mysqli_fetch_array($re2);
        $ecode=$ro1['EXAM_CODE'];

        $que3="SELECT * FROM result WHERE EXAM_CODE='$ecode'";
        $re3=mysqli_query($conn,$que3);
        $ro2=mysqli_fetch_array($re3);
        $count1=mysqli_num_rows($re3);

        if ($count1>1) {
        ?>
        <script> alert("You have used all your attempts."); </script>
        <?php
        header("Refresh:.5;URL=user_home.php?error");
        }
        elseif ($count1==0) {
        ?>
        <script> alert("You have not Appeared in your previous exam."); </script>
        <?php
        header("Refresh:.5;URL=user_home.php?error");
        }
        elseif ($ro2['STATUS']=='PASS') {
        ?>
        <script> alert("You have already passed in your previous exam."); </script>
        <?php
        header("Refresh:.5;URL=user_home.php?error");
        }
        else{

?>
<div class="container-fluid reapply">
<form class="wrap" method="post" name="f1" action=""> 
        <div class="col-md-8 col-md-offset-2 content">
        
         <button class="btn btn-primary bigbutton" type="submit" name="submit"><font size="5" >Reapply</font></button>
        </div>
 </form>
</div>
<?php
}
mysqli_close( $conn );
?>
</body>
</html>