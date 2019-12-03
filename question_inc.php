<?php
require_once("connection.php");

if (isset($_POST['submit'])) {

	
$p_name = mysqli_real_escape_string($conn,$_POST['p_name']);
$c_id = mysqli_real_escape_string($conn,$_POST['c_id']);
$time_limit = $_POST['time_limit'];
$no_que = $_POST['no_que'];
$no_opt = $_POST['no_opt'];

$p = "P";
        if ( !isset( $Pcode ) ) {
            $Pcode = 1000;
        }

        $q1 = "SELECT * from paper";
        $r1 = mysqli_query( $conn, $q1 );
        if ( isset( $r1 ) ) {
            while ( $arr1 = mysqli_fetch_array( $r1 ) ) {
                $Pcode = ltrim( $arr1[ 0 ], 'P' );
                $Pcode = $Pcode + 1;
            }
        }


$q="INSERT INTO paper VALUES('".$p.$Pcode."', '".$p_name."','".$c_id."','".$time_limit."','".$no_que."','".$no_opt."')";
$r=mysqli_query($conn,$q);
if(!$r){
    ?>
    <script> alert("An server-side error occured.Please try again!"); </script>
    <?php
	header("Refresh:.5; URL=question.php?crquesset=error");
}
else{
    ?>
    <script> alert("Quesion set had been created for that course."); </script>
    <?php
	header("Refresh:.5;URL=question.php?crquesset=success");
}


}



