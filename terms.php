<!DOCTYPE html>
<html>
<head>
<?php include_once 'head.php' ?>
</head>
<body onload="disableSubmit()">
<?php include "user_nav.php";
if (isset($_SESSION['startTime'])||isset($_SESSION['duration'])) {
unset($_SESSION['startTime']);
unset($_SESSION['duration']);
}
?>
<script>
function preback(){window.history.forward();}
setTimeout("preback()",0);
window.onunload=function(){null};
</script>

	<div ng-if="UserInfo.approvedTermsAndConditions || !UserInfo.isAuthenticated">
  <ncy-breadcrumb></ncy-breadcrumb>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <form name="tandc" ng-submit="approveTandC()">
        <div class="panel panel-default" style="margin-top:20px;">
          <div class="panel-body" style="max-height:350px; overflow-y:scroll; background-color:white;">
            <div style="text-align:center;">
              <h1>Terms and Conditions</h1>
              <p>
                <h4>GENERAL</h4>
                <p>
                We develop, distribute and maintain the Products and will also provide you with log in details. We will also manage your access to the Products and provide support to you, where necessary.</p>
                <p>
                You shall not copy, modify, transmit, distribute or in any way exploit the Products or any other copyrighted materials provided other than for your individual training. Any other purpose is expressly prohibited under these terms. You shall also not permit anyone else to copy, use, modify, transmit, distribute or in any way exploit the Products or any other copyrighted materials.
              </p><p>
                We provide the materials ‘as is’ and without any warranties, whether express or implied, except those that cannot be excluded under statute. We also do not warrant that the materials will be error free, including technical inaccuracies. </p>
                <p>
                We provide the materials ‘as is’ and without any warranties, whether express or implied, except those that cannot be excluded under statute. We also do not warrant that the materials will be error free, including technical inaccuracies. </p>
                <p>
                We provide the materials ‘as is’ and without any warranties, whether express or implied, except those that cannot be excluded under statute. We also do not warrant that the materials will be error free, including technical inaccuracies. </p>
                <p>
                We provide the materials ‘as is’ and without any warranties, whether express or implied, except those that cannot be excluded under statute. We also do not warrant that the materials will be error free, including technical inaccuracies. </p>
            </div>
          </div>
        </div>
    </form>

    <script>
 function disableSubmit() {
  document.getElementById("submit").disabled = true;
 }

  function activateButton(element) {

      if(element.checked) {
        document.getElementById("submit").disabled = false;
       }
       else  {
        document.getElementById("submit").disabled = true;
      }

  }
</script>
 <input type="checkbox" name="terms" id="terms" onchange="activateButton(this)"> I Agree to Terms & Coditions
        <div style="text-align:center;" ng-if="settings.Authentication.RequireTermsAndConditions && !UserInfo.approvedTermsAndConditions && UserInfo.isAuthenticated">
          <form action="shortcountdown.php" method="post">
          <button class="btn btn-primary" id="submit" type="submit" name="submit">Submit</button>
    	  </form>
        </div>
     
    </div>
  </div>
</div>
</body>
</html>