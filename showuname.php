<?php
session_start();
require_once("connection.php");

$uid=$_SESSION['userid'];

$q = "SELECT * FROM student WHERE ST_ID='" . $uid . "'";
	$result = mysqli_query( $conn, $q );
	$row = mysqli_fetch_array( $result );
	$count = mysqli_num_rows( $result );

echo $name=$row["ST_NAME"];
