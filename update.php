<?php
include 'connection.php';
if(isset($_POST['done']))
{
	// print_r($_POST);
	// print_r($_FILES);
	// die();
$id=$_GET['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$vechicle=$_POST['vechicle'];
$vechicle_all=implode(" and ", $vechicle);
$files=$_FILES['image'];
      $filename=rand(0,999).$files['name'];
      $type=$files['type'];

      $tmpname=$files['tmp_name'];
       // echo  "tmp_name:-".$tmpname;
       // die();
      $size=$files['size'];
      $fileext=explode('.', $filename);
      $ext_file=strtolower(end($fileext));
      //print_r($ext_file);
      $file_accept= array('pdf');

      $file_destination='images/'.$filename;
        $res=move_uploaded_file($tmpname, $file_destination);
        // echo "result:-".$res;
        // die();
        if($res)
        {
$q="UPDATE user_info SET name='$name',email='$email',gender='$gender',vechicle='$vechicle_all',filename='$filename' where id=$id";
// echo "query:-".$q;
// die();
$que=mysqli_query($conn,$q);

header("location:display.php");
mysqli_close($conn);
}
else
{
	echo 'update unsucessfull';
}
}
?>