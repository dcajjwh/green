<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="教育,培训,辅导,高中,初中,高考,中考,中高考,1对1,高分,各润" name="Keywords">
<meta name="description" content="各润教育(www.grjy.cn),通过三大团队的精诚合作努力和学生及家长的积极支持，我们将塑造初高中考试培训的新的里程碑。以教学确定地域龙头，以教研打造全国知名品牌是我们的理念。" />
 
<title>各润教育</title>
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<link href="css/slider.css" rel="stylesheet" type="text/css" /> 
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<link rel="stylesheet" type="text/css" href="css/news.css"/>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/menu.js"></script> 
<script type="text/javascript" src="js/slider.js"></script> 
<script type="text/javascript">
  function newvcode(obj ,url){
    obj.src=url+'?present'+new Date().getTime();
  }
</script>
<script language="javascript" type="text/javascript" >
$(document).ready(function(){
//关键的代码
$("#btn").click(function(event){
if(checkUserName() && checkUserPwd() && checkCheckCode())
{
var data = {
stuname: $('#stuname').val(),
stupwd: $('#stupwd').val(),
vcode: $('#vcode').val()
};
//提交数据给login.php页面处理
$.post("login.php",data,function(result){
if(result.status== "6") //登录成功
{
alert("登录成功"+result.name);
}
else if(result.status == "1") //验证码错误
{
alert("验证码错误");
}
else
{
alert(result.msg);
} 
} , "json"  );
}
else
{
checkUserName();
checkUserPwd();
checkCheckCode();
}
});
});

//check the userName
function checkUserName()
{
if($("#stuname").val().length == 0)
{
alert("用户名不能为空");
return false;
}
else
{
return true;
}
}

//check the pwd
function checkUserPwd()
{
if($('#stupwd').val().length == 0)
{
alert("密码不能为空");
return false;
}
else
{
return true;
}
}
// check the check code
function checkCheckCode()
{
if($('#vcode').val().length == 0)
{
alert("验证码不能为空");
return false;
}
else
{
return true;
}
}
</script> 
  <script type="text/javascript">
$(document).ready(function(){
$("#pageOverlay").click(function(){
    $("#pageOverlay").hide();
    $("#login_div").hide();
});
$(".downdocs").click(function(e){
    e.preventDefault();
    lid=$(this).attr("id");
    $("#downframe").attr("src", "get.php?id="+lid);  
    $("#pageOverlay").show();
    $("#login_div").show();
});
});</script>
</head>
<body>
<div class="container">
<div class="top"><img src="image/logo.jpg" /><img src="image/banner.gif" /></div>
<div class="clear"></div>
 <div id="menu">
<div class="left"></div>
<ul id="nav">
<li class="mainlevel" id="mainlevel_01"><a href="index.php" >首页</a>
  
    </li>
    
    <li class="mainlevel" id="mainlevel_02"><a href="#" target="_blank">关于各润</a>
    <ul id="sub_02">
    <li><a href="#" target="_blank">各润简介</a></li>
    <li><a href="#" target="_blank">各润荣誉</a></li>
    <li><a href="#" target="_blank">教学理念</a></li>
    <li><a href="#" target="_blank">教学特色</a></li>
    <li><a href="#" target="_blank">各润风采</a></li>
    </ul>
    </li>
    <li class="mainlevel" id="mainlevel_03"><a href="#" target="_blank">课程介绍</a>
    <ul id="sub_03">
    <li><a href="#" target="_blank">最新课程表</a></li>
    <li><a href="#" target="_blank">应试类课程</a></li>
    <li><a href="#" target="_blank">素质类课程</a></li>
    </ul>
    </li>
    
    <li class="mainlevel" id="mainlevel_04"><a href="#" target="_blank">名师团队</a>
    <ul id="sub_04">
    <li><a href="#" target="_blank">&nbsp英语团队</a></li>
    <li><a href="#" target="_blank">数学团队</a></li>
    <li><a href="#" target="_blank">物理团队</a></li>
    <li><a href="#" target="_blank">化学团队</a></li>
    <li><a href="#" target="_blank">语文团队</a></li>
    </ul>
    </li>
    
    <li class="mainlevel" id="mainlevel_05"><a href="#" target="_blank">各润资讯</a>
    <ul id="sub_05">
    <li><a href="#" target="_blank">校内新闻</a></li>
    <li><a href="#" target="_blank">教育新闻</a></li>
    <li><a href="#" target="_blank">考试加油站</a></li>
    <li><a href="#" target="_blank">家长沟通</a></li>
    </ul>
    </li>
     <li class="mainlevel" id="mainlevel_06"><a href="#" target="_blank">各润1对1</a>
   
    </li>
     <li class="mainlevel" id="mainlevel_07"><a href="#" target="_blank">学习园地</a>
   
    </li>
    <li class="mainlevel" id="mainlevel_08"><a href="#" target="_blank">联系我们</a>
   
    </li>
    <div class="clear"></div>

</ul>
<div class="right"></div>
</div>
</div>
<div class="clear"></div>