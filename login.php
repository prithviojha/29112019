<?php
include 'connection.php';
// print_r ($_COOKIE['username']); 
// echo("<br>");
// print_r (base64_decode(($_COOKIE['password']))); 

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="index.php" method="post">
  
<center>
  <div class="container">
  	<h2>Login Details</h2>
    <label for="name"><b>Email Id</b></label>
    <input type="Email" placeholder="Enter Username" name="name" value="<?php echo $_COOKIE['username'] ?>" ><br><br>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" value="<?php echo $_COOKIE['password'] ?>"><br><br>
    <label>
      <input type="checkbox"  name="remember"> Remember me
    </label><br><br>
    <button type="submit" name="login">Login</button>
    
  </div>

 </center>
</form>
</body>
</html>