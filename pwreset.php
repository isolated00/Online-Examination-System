<!doctype html>
<html>
<head>
<?php include_once 'head.php' ?>
</head>

<body>
<?php include_once 'nav.php' ?>

<h3 class="gradehead">Reset Your Password</h3><br>
<div class="container-fluid">
        <form class="wrap" method="post" name="f1" action="pwreset_inc.php"> 
        <div class="col-md-8 col-md-offset-2 content"> 
     <div class="form-group">     
         <label for="pwd">Enter New Password:</label>     
         <input class="textboxx" type="password" class="form-control" name="pass" pattern="(?=.*\d)(?=.*[a-z]).{6,}" title="Must contain at least one number and one lowercase letter, and at least 6 or more characters">  
     </div>
    <div class="form-group">     
         <label for="pwd">Enter Confirm Password:</label>     
         <input class="textboxx" type="password" class="form-control" name="cpass" required>  
    </div> 
    <button type="submit" class="btn btn-primary" name="submit">Submit</button> 
    </div>
    </form>
</div>
</body>
</html>