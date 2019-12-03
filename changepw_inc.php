<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
session_start();
require "connection.php";
if(isset($_POST['submit'])){
$opw=mysqli_real_escape_string( $conn,$_POST['opass']);
$pw=mysqli_real_escape_string( $conn,$_POST['pw']);	
$pw1=mysqli_real_escape_string( $conn,$_POST['pw1']);	
$uid=$_SESSION['userid'];

$q1 = "SELECT * FROM profile WHERE USER_ID='" . $uid . "'";
    $r1 = mysqli_query( $conn, $q1 );
    $row = mysqli_fetch_array( $r1 );


if ( $opw==$row[1] ) {
if($pw==$pw1){

    $hpassword= $pw;
    $q1="UPDATE profile SET PASSWORD='".$hpassword."'WHERE USER_ID='".$uid."'";
    $r1=mysqli_query($conn,$q1);
    if ( !$r1 ) {
             ?>
                 <script> alert("An server-side error occured.Please try again!"); </script>
             <?php
                 header("Refresh:.5;URL=index.php?error");
            } else {
             ?>
                 <script> alert("Your password has been updated!"); </script>
             <?php
                session_unset();
                session_destroy();
                header("Refresh:.5;URL=index.php?success");
            }
    }
}else{
    ?>
		<script> alert("Please enter your old password correctly!"); </script>
	<?php
}
}
?>
<body>
</body>
</html>