<?php
include 'connection.php';
$id=$_GET['id'];
// echo $id;
// die();



$que=" SELECT count(filename) FROM `user_info` WHERE id=$id;";
 // echo 'que:-'.$que;
 // echo "<br>";
$quer=mysqli_query($conn,$que);
$resu=mysqli_num_rows($quer);

// echo "no:".$resu;
// die();


if($resu==1)
{

$sql="UPDATE `user_info` SET `filename` =' '  WHERE id=$id";
// echo $sql;
// die();
$res=mysqli_query($conn,$sql);
// echo ":".$res;
// die();
if($res) 
{
 
echo "<script>
alert('file removed sucessfully');
window.location.href='http://localhost:81/CRUD_29_09_2019/display.php';
 
</script>";




  // header("location:display.php");
}
}
else
{
	echo 'file not found';
	// header("location:display.php");

}


?>