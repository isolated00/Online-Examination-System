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
    
    $password=$_POST['pass'];
    $cpassword=$_POST['cpass'];
    $uid=$_SESSION['userid'];
   

        if($password==$cpassword){
            $hpassword=$password;
            $q1="UPDATE profile SET PASSWORD='".$hpassword."'WHERE USER_ID='".$uid."'";
            $r1=mysqli_query($conn,$q1);
            if ( !$r1 ) {
                ?>
                <script> alert("record insertion failed!"); </script>
                <?php
            } else {
                session_unset();
                session_destroy();
                header("location: index.php");
            }
        }else{
            ?>
            <script> alert("Please enter your password correctly!"); </script>
            <?php
            header("Refresh:0.5; URL=forget.php");
        }
    }
    ?>
    <body>
    </body>
    </html>