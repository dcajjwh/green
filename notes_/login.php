<?php
session_start();
require_once ('inc/connect.php');
require_once ('inc/lib.php');
$mysqli= new mysqli($db_host,$db_user,$db_pwd,$db);
$action = $_GET['action'];
if ($action == 'login') {  //登录
	$user = trim($_POST['stuname']);
	$pass = trim($_POST['stupwd']);
	$vcode = strtolower(stripslashes(trim($_POST['vcode'])));
	if (empty ($user)) {
		echo '用户名不能为空';
		exit;
	}
	if (empty ($pass)) {
		echo '密码不能为空';
		exit;
	}
	if (!eregi("^[A-Za-z0-9]+$",$user))
{  $arr['success'] = 0;
	    $arr['msg'] = '用户名或密码错误！';
		echo json_encode($arr);
		exit;
	}
	if (!eregi("^[A-Za-z0-9]+$",$pass))
{  $arr['success'] = 0;
	    $arr['msg'] = '用户名或密码错误！';
		echo json_encode($arr);
		exit;
	}
	if ( $vcode==strtolower($_SESSION['verycode']))
	{
	$md5pass = $pass;
	$query = "select * from user where name='$user'";
	

	$us = is_array($row = mysql_fetch_array($query));

	$ps = $us ? $md5pass == $row['password'] : FALSE;
	if ($ps) {
		$counts = $row['hits'] + 1;
		$_SESSION['user'] = $row['stuname'];
		$_SESSION['rank'] = $row['rank'];
		$_SESSION['login_counts'] = $counts;
		$ip = get_client_ip();
		$logintime = time();
		$rs = mysql_query("update user set login_time='$logintime',login_ip='$ip',login_counts='$counts'");
		if ($rs) {
			//echo '1';exit;
			$arr['success'] = 1;
			$arr['user'] = $_SESSION['user'];
			$arr['login_time'] = date('Y-m-d H:i:s',$_SESSION['login_time']);
			$arr['login_counts'] = $_SESSION['login_counts'];
			
		} else {
			$arr['success'] = 0;
			$arr['msg'] = '登录失败';
		}
	} else {
		$arr['success'] = 0;
	    $arr['msg'] = '用户名或密码错误！';
	}}
	 else {
		$arr['success'] = 0;
	    $arr['msg'] = '验证码错误！';
	}
	echo json_encode($arr);
}
elseif ($action == 'logout') {  //退出
	unset($_SESSION);
	session_destroy();
	echo '1';
}
?>



