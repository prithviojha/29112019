<?php
include 'connection.php';
if(isset($_POST['login']))
{
  $username=$_POST['name'];
  $password=base64_encode(($_POST['psw']));

  session_start();
  $_SESSION['username']=$username;
  $_SESSION['password']=$password;
  if(isset($_POST['remember']))
{
  setcookie('username',$username,time()+(60*60*60*7));
  setcookie('password',$password,time()+(60*60*60*7));
  // echo "username_cookie:-".$_COOKIE['username'];
  // echo "password_cookie:-".$_COOKIE['password'];
} 
  if($username=='' || $password=='')
  {
    header('location:login.php');
  }
  else
  {
    $sql="INSERT INTO `login_details`( `username`, `password`) VALUES ('.$username.','.$password.')";
    $res=mysqli_query($conn,$sql);
   
  }

}

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
<script src="snowstorm.js"></script> 
</head>
 <body>
  <form action="insert.php" method="POST" enctype="multipart/form-data" class = 'card p-1' id="details"> 

  	<div class="col-xs-3">
  		<div class="text-center">
  			<input class="btn btn-link disabled" name="date"  value="<?php  date_default_timezone_set('Asia/Kolkata');echo date('m-d-Y h:i:sa')?>" readonly><br><br>
  			</div>
  		</div>
   <div class="container">
   	<div class="text-center">

   	
	   <h1><input class="btn btn-default btn-block disabled" value="Fill Up The Following Details" readonly=""></h1><br>
      <level class="btn btn-default">Enter your name:</level><input class="btn btn-default" type="text" name="name" id="full_name" placeholder="Enter your name">     
       <span style="display: none;" class="hid_name text-danger">*full name is required </span>
<br><br>

      <level class="btn btn-default">Enter your email:</level><input class="btn btn-default-lg" type="email" name="email" id="your_email" placeholder="Enter your email" required="" value="<?php echo $_SESSION['username'];?>" readonly><br><br>
<!--       <div class="row">
 -->   <level class="btn btn-default">select your gender:</level>
      <input class="btn btn-default" type="radio" name="gender" value="male" checked="">male
      <input class="btn btn-default" type="radio" name="gender" value="female">female
      <input class="btn btn-default" type="radio" name="gender" value="other">other<br><br>
      
<!--      </div>
 -->  <level class="btn btn-default"> select your vechicle:</level>
     <input class="btn btn-default" type="checkbox" name="vechicle[]" value="bike" checked="">bike
     <input class="btn btn-default" type="checkbox" name="vechicle[]" value="car">car<br><br>
     <div class="file">
     <level class="btn btn-default">select your image:</level>
     
     <input class="btn btn-primary active" type="file" name="image" id="image" value="" max>
      
    
     <!-- <button type="button" class="btn btn-sucess">Add more+</button><br><br> -->
   <input type="button" name="addmore" class="btn btn-sucess addmore" value="Add more+"><br><br>
   </div>
 	 <button type="reset" class="btn btn-danger"  >Reset</button>
     <button type="submit" name="done" class="btn btn-primary btn_submit">Submit</button></level>
    </div>
</div>



  
  </form>
  <script>
    $(document).ready(function()
    {
      var alphabets="only alphabets is acceptable";
     $('#full_name').focusout(function()
    {
      var fullname=$(this).val();
      if(fullname=='')
{
       $('.hid_name').show();
       $('.btn_submit').attr('disabled','disabled');
       return alphabets;
}
else
{
         $('.hid_name').hide();
        $('.btn_submit').removeAttr('disabled','disabled');

}
         
 
    
      });
      
     
});
   
  </script>
  <script type="text/javascript">
    $('.btn_submit').click(function()
    {
       
       var fileName = $('#image').val();
       var clean=fileName.split('\\').pop(); // clean from C:\fakepath OR C:\fake_path 
       if(!clean)
       {
        alert('please upload file');
        $('#details').attr('onsubmit','return false;');

       }
       else
       {
        $('#details').attr('onsubmit','return true;');

       }
       var size=$('#image')[0].files[0].size;
       var sizemb=size;
       // alert(sizemb);
       if(sizemb>8388608)
       {
        
        alert('Your file size is '+sizemb/1000000+' MB max is 8.388608 MB');
        $('#details').attr('onsubmit','return false;');
       }
       else
       {
         $('#details').attr('onsubmit','return true;');

       }
       

    });

  </script>
  <script type="text/javascript">
    var count=1;
    $('.addmore').click(function()
    {
      if(count<5)
      {
     $('.file').append('<br>&nbsp;&nbsp;&nbsp;<input class="btn btn-primary active" type="file" name="image" id="image" value="" max><br><br>');
     count++;
      }
      else
      {
        alert("file upload limit is 5");
      }
    });
  </script>s
  </body>
</html>
