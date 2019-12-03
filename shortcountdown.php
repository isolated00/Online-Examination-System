<!DOCTYPE html>
<html>
<head>
<?php include_once 'head.php' ?>

</head>
<body>
<div>   
   <img src="include/image/header-22.jpg" width="100%" height="140px">
</div>



<?php 
          
if (isset($_POST['submit'])) {
   header("Refresh:5 ; URL=quiz.php");
?>
<script>
function preback(){window.history.forward();}
setTimeout("preback()",0);
window.onunload=function(){null};
</script>
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
         document.getElementById("clock").style.display = "none";
        }
    };
    // we don't want to wait a full second before the timer starts
    timer();
    setInterval(timer, 1000);
}

window.onload = function () {
    var fivesecond = (5),
        display = document.querySelector('#time');
    startTimer(fivesecond, display);
};
</script> 

<div id="clock" class="smallclock">You Exam will Start After <span id="time">5</span> Seconds!</div><br><br>

<?php

}

?>