<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<?php
session_start();
require( "connection.php" );
if ( isset( $_POST[ 'submit' ] ) ) {
	$uid = mysqli_real_escape_string( $conn, $_POST[ 'uid' ] );
	$pass = mysqli_real_escape_string( $conn, $_POST[ 'pass' ] );

	$q = "SELECT * FROM profile WHERE USER_ID='" . $uid . "'";
	$result = mysqli_query( $conn, $q );
	$row = mysqli_fetch_array( $result );
	$count = mysqli_num_rows( $result );


	if ( $count == 1 ) {

		if ( $row[ 3 ] == 1 ) {

			
			if ($pass!=$row[1]) {
				header("Location: index.php?error=wrongpassword");
				exit();
			} elseif ( $pass==$row[1] ) {
				$_SESSION[ 'userid' ] = $uid;
				switch ( $row[ 2 ] ) {
					case 'STUDENT':
						header( "Location: user_home.php?login=success" );
						break;

					case 'ADMIN':
						header( "Location: admin_home.php?login=success" );
						break;
				}
			}
		} else {
			header("Location: index.php?error=disabled");
			exit();
		}
	} else {
		header("Location: index.php?error=nouser");
		exit();
	}
	mysqli_close( $conn );
}
?>

<body>
</body>
</html>