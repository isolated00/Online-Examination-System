<!doctype html>
<html>
<head>
  <?php include_once 'head.php' ?>
  <style type="text/css">

  </style>
</head>
<div>
 <img src="include/image/header-22.jpg" width="100%" height="140px">
</div>
<body>
  <br>
  <?php
  session_start();
  require_once "connection.php";

  $uid=$_SESSION['userid'];

  $q1 = "SELECT * from exam WHERE ST_ID='".$uid."'";
  $r1 = mysqli_query( $conn, $q1 );
  while($row1 = mysqli_fetch_array( $r1 )){
   $P_CODE=$row1['P_CODE'];
 }

 $q2 = "SELECT * FROM paper WHERE P_CODE='".$P_CODE."'";
 $r2 = mysqli_query($conn,$q2);
 $ar = mysqli_fetch_array($r2);

//for the clock
 
 if (!isset($_SESSION['startTime'])) {
   $startTime=time();
   $_SESSION["startTime"]=$startTime;
 }

 if (isset($_SESSION['startTime'])) {
   $startTime=$_SESSION['startTime'];
   
   $currentTime=time();
   
   $diffRe=$currentTime-$startTime;
   
   $duration=(60*$ar['TIME_LIMIT'])-$diffRe;
   $_SESSION['duration']=$duration;
 }
 $duration1=$_SESSION['duration'];
 $duration2= ceil($duration1/60);

 ?>
 <script type="text/javascript">

  function startTimer(duration, display) {
    var start = Date.now(),
    diff,
    minutes,
    seconds;
    function timer() {
        // get the number of seconds that have elapsed since
        // startTimer() was called
        diff = duration - (((Date.now() - start) / 1000) | 0);

        // does the same job as parseInt truncates the float
        minutes = (diff / 60) | 0;
        seconds = (diff % 60) | 0;

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (diff < 0) {
            // add one second so that the count down starts at the full duration
            // example 05:00 not 04:59
            start = Date.now() + 1000;
          }
          if(diff == 0){
            document.getElementById('btn').click();
          }
        };
    // we don't want to wait a full second before the timer starts
    timer();
    setInterval(timer, 1000);
  }

  window.onload = function () {
    var fiveMinutes = <?php echo $duration1 ?>,
    display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
  };
</script>
<?php
$C_ID=$ar['C_ID'];
$Que="SELECT * FROM course WHERE C_ID='$C_ID'";
$Res=mysqli_query($conn,$Que);
$array=mysqli_fetch_array($Res);
$C_NAME=$array['C_NAME'];
?>
<div class="countdown">You have <span id="time"><?php echo $ar['TIME_LIMIT'] ?>:00</span> minutes left!</div><br><br>
<div class="paperinfo">
Paper Code: <?php echo "$P_CODE"; include("spaces.php")?>
Course Name: <?php echo "$C_NAME"; include("spaces.php")?>
Course Code: <?php echo "$C_ID" ?></div><br>

<?php

$q1 = "SELECT * from exam WHERE ST_ID='".$uid."'";
$r1 = mysqli_query( $conn, $q1 );
while($row1 = mysqli_fetch_array( $r1 )){

  if ($row1['EXAM_STATUS']=="Not Appeared"){
    $P_CODE=$row1['P_CODE'];
    $_SESSION['exam_code']=$row1['EXAM_CODE'];
    $_SESSION['p_code']=$P_CODE;

    $q2="SELECT * FROM question WHERE P_CODE='$P_CODE' ORDER BY RAND()";
    $r2= mysqli_query( $conn, $q2 );
    $i=1;
    $j=100;
    $k=1;
    $m=1;
    while($row=mysqli_fetch_array($r2)){
     $qno="$row[1]";
     $question="$row[2]";
     $ans1="$row[3]";
     $ans2="$row[4]";
     $ans3="$row[5]";
     $ans4="$row[6]";
     $_SESSION['que_count']=$k;

     ?>

     <form class="wrap2" method="post" name="f1" action="quiz_inc.php">
      <h4 style="font-size: 20px; color:  #196da8;">
        <?php echo $m.". ".$question; ?>
      </h4><br>
      <input type="hidden" name="<?php echo $j ?>" value="<?php echo $qno ?>">

      <input type="radio" name="<?php echo $i ?>" value="1"><font size="3">&nbsp<?php echo $ans1 ?></font>&nbsp&nbsp


      <input type="radio" name="<?php echo $i ?>" value="2"><font size="3">&nbsp<?php echo $ans2 ?></font>&nbsp&nbsp


      <input type="radio" name="<?php echo $i ?>" value="3"><font size="3">&nbsp<?php echo $ans3 ?></font>&nbsp&nbsp


      <input type="radio" name="<?php echo $i ?>" value="4"><font size="3">&nbsp<?php echo $ans4 ?></font>&nbsp&nbsp
      <br>
      <br>
      <?php
      $i++;
      $j++;
      $k++;
      $m++;
    }
    ?>
    <button id="btn" type="submit" class="btn btn-primary quizSubmit" name="submit"><font size="4">Submit</font></button><br>
    <br>
  </form>
  <?php
}
}
mysqli_close( $conn );
?>

</body>
</html>
