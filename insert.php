<?php
include 'connection.php';
 
 if(isset($_POST['done']))
 {
 	 
 	    // phpinfo();
      // print_r($_FILES);
      // die();
      // echo "<br>";
      // // print_r($_POST);
      // // print_r($_FILES);
      // die();
      $name=$_POST['name'];
      
      $email=$_POST['email'];
      $date=$_POST['date'];
      $gender=$_POST['gender'];
      $vechicle=$_POST['vechicle'];
      $vechicle_all=(implode(" and ", $vechicle));
      $files=$_FILES['image'];
      $filename=rand(0,999).trim(strtolower($files['name']));
      $type=$files['type'];

      $tmpname=$files['tmp_name'];
       // echo  "tmp_name:-".$tmpname;
       // die();
      $size=$files['size'];
      $fileext=explode('.', $filename);
      $ext_file=strtolower(end($fileext));
      //print_r($ext_file);
      



   
     
        //echo "string";
        $file_destination='images/'.$filename;
        $res=move_uploaded_file($tmpname, $file_destination);
        // echo "result:-".$res;
        // die();
        if($res)
             
        {
          // echo 'file moved';
          // die();
          $q="INSERT INTO `user_info`(`name`, `email`,`date`,`gender`,`vechicle`,`filename`) VALUES ('$name','$email','$date','$gender','$vechicle_all','$filename')"; 
               
      $query=mysqli_query($conn,$q);

      if($query)
      {
        echo '<script type="text/javascript">
        window.onload=function()
        {
          alert("data inserted sucessfully");
          window.location.href = "display.php";
        }
        </script>';


      }
      else
      {
         echo '<script type="text/javascript">
        window.onload=function()
        {
          alert("data insertion unsucessfull");
          
        }
        </script>';
        header("Location:insert.php"); 
      }


      mysqli_close($conn);

 }

        }
        else
        {
          echo 'errorr';
        }
       
   

     ?>




