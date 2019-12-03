<!doctype html>
<html>
<head>
<?php include_once 'head.php' ?>
</head>
<body>
<?php include_once 'nav.php' ?>

<div class="container-fluid">
<form class="wrap" method="post" name="f1" action="forget_inc.php">
<div class="col-md-8 col-md-offset-2 content"> 
<h2 class="text-primary"><u>Forgot Your Password?</u></h2><br>
 <div class="form-group">     
        <label for="user">Student ID:</label>     
        <input class="textboxx" type="text" class="form-control" name="uid" required>   
</div>

<div class="form-group">
         <label for="cpwd">Hint Question:</label>    
        <select class="textboxx" type="text" class="form-control" name="hintQu" required><br>
        <option value="What is your nick name?">What is your nick name?</option>
        <option value="What is your mother's name?">What is your mother's name?</option> 
        </select>   
</div> 
<div class="form-group">     
        <label for="ans">Answer:</label>     
        <input class="textboxx" type="text" class="form-control" name="hintAn" required>   
</div> 
<button type="submit" class="btn btn-primary" name="submit">Submit</button>
</div>
</form>
</body>
</html>