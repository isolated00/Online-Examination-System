<!doctype html>
<html>
<head>
	<?php include_once 'head.php' ?>
	<style type="text/css">
		body{
			background-color: #222222;
		}
	</style>
</head>

<body onload="disable()">
	<script src="sms/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="sms/verification.js"></script>

	<?php include_once 'nav.php' ?>

	<?php include 'register.php'?>

	<?php include 'login.php'?>

<div class="carousel slide" data-ride="carousel" id="myslide">

	<ol class="carousel-indicators">
		<li class="active" data-slide-to="0" data-target="#myslide"></li>
		<li  data-slide-to="1" data-target="#myslide"></li>
		<li  data-slide-to="2" data-target="#myslide"></li>
		<li  data-slide-to="3" data-target="#myslide"></li>	
	</ol>
	<div class="carousel-inner">

		<div class="item active">
			<div class="carousel-caption"><b><font size="6" style="text-shadow: 6px 6px 10px black;">EXAMS and GRADES are Temporary, but<br>EDUCATION is Permanent.</font></b></div>
			<img src="include/image/12.jpg" class="img-responsive" style="width: 100%; height: 450px;">
		</div> 

		<div class="item ">
			<div class="carousel-caption"><b><font size="6" style="text-shadow: 6px 6px 10px black;" >Are you ready for EXAMS?</font></b></div>
			<img src="include/image/13.jpg" class="img-responsive" style="width: 100%; height: 450px;">
		</div>

		<div class="item ">
			<div class="carousel-caption"><b><font size="6" style="text-shadow: 6px 6px 10px black;" >Don’t stress. Do your best. Forget the rest.</font></b></div>
			<img src="include/image/14.jpg" class="img-responsive" style="width: 100%; height: 450px;">
		</div>

		<div class="item ">
			<div class="carousel-caption"><b><font size="6" style="text-shadow: 6px 6px 10px black;" >GOOD LUCK</font></b></div>
			<img src="include/image/15.jpg" class="img-responsive" style="width: 100%; height: 450px;">
		</div>

	</div>
	<a class="carousel-control left" href="#myslide" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
	</a>
	<a class="carousel-control right" href="#myslide" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
	</a>
</div>
<?php include "footer.php" ?>
</body>
</html>