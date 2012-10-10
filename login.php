<?php
session_start();
include("inc/connect.php");
$server_vcode=$_SESSION['vcode'];
$input_vcode=trim($_POST['vcode']);
$name=trim($_POST['stuname']);
$pwd=trim($_POST['stupwd']);
if($server_vcode!=$input_vcode){
$info['status']=1;
}
else
{
$mysqli=new mysqli($db_host,$db_user,$db_pwd,$db);
$mysqli->set_charset("utf8");
$sql="select * from students where name='$name' and pwd='$pwd'";
$result=$mysqli->query($sql);
$num=$result->num_rows;
if($num==1){
	$row=$result->fetch_assoc();
	$info['status']=6;
	$info['name']=$row['cnname'];
}
else{
	$info['status']=2;
	$info['msg']="用户名或密码错误";
}
}
echo json_encode($info);
?>



