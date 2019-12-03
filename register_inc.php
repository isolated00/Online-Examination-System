<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration</title>
</head>
<?php
require( 'connection.php' );
if(isset($_POST['submit'])){
$uid = mysqli_real_escape_string( $conn, $_POST[ 'uid' ] );
$password = mysqli_real_escape_string( $conn, $_POST[ 'pass' ] );
$cpassword = mysqli_real_escape_string( $conn, $_POST[ 'cpass' ] );
$hintQue = mysqli_real_escape_string( $conn, $_POST[ 'hint' ] );
$hintAns = mysqli_real_escape_string( $conn, $_POST[ 'hAns' ] );
$user_type = "STUDENT";
$status = 1;

$e = "E";
        if ( !isset( $Ecode ) ) {
            $Ecode = 1001;
        }

        $q1 = "SELECT * from exam";
        $r1 = mysqli_query( $conn, $q1 );
        if ( isset( $r1 ) ) {
            while ( $arr1 = mysqli_fetch_array( $r1 ) ) {
                $Ecode = ltrim( $arr1[ 0 ], 'E' );
                $Ecode = $Ecode + 1;
            }
        }

$q2 = "SELECT * FROM profile WHERE USER_ID='" . $uid . "'";
$r2 = mysqli_query( $conn, $q2 );
$count2 = mysqli_num_rows( $r2 );
if ( $count2 == 0 ) {
    if ( $password == $cpassword ) {

        $q3 = "SELECT * FROM student WHERE ST_ID='" . $uid . "'";
        $r3 = mysqli_query( $conn, $q3 );
        $arr3 = mysqli_fetch_array( $r3 );
        $count1 = mysqli_num_rows( $r3 );
        if ( $count1 == 1 ) {
            $hpassword= $password;
            $q4 = "INSERT INTO profile (USER_ID,PASSWORD,USER_TYPE,STATUS,HINTS_QUES,HINTS_ANS) VALUES('" . $uid . "','" . $hpassword . "','" . $user_type . "','" . $status . "','" . $hintQue . "','" . $hintAns . "')";
            $r4 = mysqli_query( $conn, $q4 );
            $activno= rand(10000,99999);
            $text="Not Appeared";
            $q5 = "INSERT INTO exam (EXAM_CODE,ST_ID,C_ID,ACTIVATION_NO,EXAM_STATUS) VALUES ('".$e.$Ecode."','".$uid."','".$arr3['C_ID']."','".$activno."','".$text."') ";
            $r5=mysqli_query($conn, $q5);

            if ( !$r4 & !$r5 ) {
                header("Location: index.php?error=sqlerror");
            exit();
            } else {

                header("Location: index.php?signup=success");
                exit();
            }
        } else {
            header("Location: index.php?error=invaliduid");
        }

    }
    else{
        header("Location: index.php?error=passwordcheck&stid=" . $uid);
    }
}
else{
    header("Location: index.php?error=uidalreadytaken");
    exit();
}
mysqli_close($conn);
}
else{
    header("Location: index.php?error=besmarter!");
    exit();
}
mysqli_close( $conn );  
?>
<body>
</body>
</html>