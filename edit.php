<?php
include 'connection.php';
$id=$_GET['id'];
// echo $id;
// die();
$q="SELECT * FROM `user_info` WHERE id=$id";
// echo $q;
$que=mysqli_query($conn,$q);


while($row=mysqli_fetch_assoc($que))
{
   // print_r($row);
  // die();
 ?>
 <!DOCTYPE html>
<html>
<head>
  <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
 <body>
 <form action="update.php?id=<?php echo $row['id'];?>" method="POST" enctype="multipart/form-data" class = 'card p-1'> 
    <div class="col-xs-3">
      <div class="text-center">
        <input class="btn btn-link disabled" name="date"  value="<?php  date_default_timezone_set('Asia/Kolkata');echo date('m-d-Y h:i:sa')?>" readonly><br><br>
        </div>
      </div>
   <div class="container">
    <div class="text-center">
    
     <h1><input class="btn btn-default btn-block disabled" value="Fill Up The Following Details" readonly=""></h1><br>
      <level class="btn btn-default">Enter your name:</level><input class="btn btn-default" type="text" name="name" id="full_name" placeholder="Enter your name" value="<?php echo $row['name']?>">      
       <span style="display: none;" class="hid_name text-danger">*full name is required </span>
<br><br>

      <level class="btn btn-default">Enter your email:</level><input class="btn btn-default-lg" type="email" name="email" id="your_email" placeholder="Enter your email" required="" value="<?php echo $row['email']?>"><br><br>
<!--       <div class="row">
 -->   <level class="btn btn-default">select your gender:</level>
      <input class="btn btn-default" type="radio" name="gender" value="male" checked="">male
      <input class="btn btn-default" type="radio" name="gender" value="female">female
      <input class="btn btn-default" type="radio" name="gender" value="other">other<br><br>
      
<!--      </div>
 -->  <level class="btn btn-default"> select your vechicle:</level>
     <input class="btn btn-default" type="checkbox" name="vechicle[]" value="bike" checked="">bike
     <input class="btn btn-default" type="checkbox" name="vechicle[]" value="car">car<br><br>
     <level class="btn btn-default">select your image:</level>
     <input class="btn btn-primary active" type="file" name="image"><br><br>
   
   <button type="reset" class="btn btn-danger"  >Reset</button>
     <button type="submit" name="done" class="btn btn-primary btn_submit">Submit</button></level>
    </div>
</div>



  
  </form>
 <?php
}

?>