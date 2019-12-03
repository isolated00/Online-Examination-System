<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
session_start();
require("connection.php");

if(isset($_POST['submit'])){

    $uid= $_POST['uid'];
    $hintQu=$_POST['hintQu'];
    $hintAn=$_POST['hintAn'];
    
    $q1="SELECT * FROM profile WHERE USER_ID='".$uid."'";
    $r1=mysqli_query($conn,$q1);
    $row = mysqli_fetch_array( $r1 );
    $count = mysqli_num_rows( $r1 );
    
    if($count == 1){
        $hintQ=$row[4];
        $hintA=$row[5];
    }
    if($hintQu==$hintQ && $hintAn==$hintA){
        $_SESSION['userid']=$uid;
        header("Location: pwreset.php");
    }
    
}
?>
<body>
</body>
</html>