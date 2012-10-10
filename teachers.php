<?php include("header.php");
include("inc/connect.php");
include("inc/lib.php");
//根据id取出新闻内容
$id=intval($_GET['id']);
$mysqli=new mysqli($db_host,$db_user,$db_pwd,$db);
$mysqli->set_charset("utf8");
$sql="select * from teachers where id=$id";
$result=$mysqli->query($sql);
$row=$result->fetch_assoc();
$resume=$row['resume'];
$hits=$row['hits'];
$content=stripslashes($row['content']);
$name=$row['name'];
$typeid=$row['subid'];
if(!empty($row['pic'])){
           	$photo=$row['pic'];
           }
           else $photo="logo.jpg";
//增加点击次数
$sqlhit="update teachers set hits=hits+1 where id=$id";
$mysqli->query($sqlhit);
//上一篇
$sql_prev="select * from teachers where id>$id and subid=$typeid order by id desc  limit 1";
$result_prev=$mysqli->query($sql_prev);
$row_prev=$result_prev->fetch_assoc();
if($row_prev){
$title_prev=$row_prev['name'];
$id_prev=$row_prev['id'];
$str_prev="<a href=\"teachers.php?id=$id_prev\">$title_prev</a>";
}
else{
	$str_prev="没有了";}

//下一篇
$sql_next="select * from teachers where id<$id  and subid=$typeid order by id desc  limit 1";
$result_next=$mysqli->query($sql_next);
$row_next=$result_next->fetch_assoc();
if($row_next){
$title_next=$row_next['name'];
$id_next=$row_next['id'];
$str_next="<a href=\"teachers.php?id=$id_next\">$title_next</a>";
}
else{
	$str_next="没有了";}

//随机英语句子
$engsql="SELECT *
FROM `quotes` AS t1 JOIN (SELECT ROUND(RAND() * ((SELECT MAX(id) FROM `quotes`)-(SELECT MIN(id) FROM `quotes`))+(SELECT MIN(id) FROM `quotes`)) AS id) AS t2
WHERE t1.id >= t2.id
ORDER BY t1.id LIMIT 1";
$result_eng=$mysqli->query($engsql);
$row_eng=$result_eng->fetch_assoc();
$english=$row_eng['English'];
$chinese=$row_eng['Chinese'];

?>
<div class="greenLocation">您当前的位置>各润资讯>教育新闻></div>
<div class="greenNewsbox">
<div class="greenNewscontent">
<h2 class="newstitle"><?php echo $name;?></h2>
<p class="newsinfo">发布时间：<span class="datetime"><?php echo $hits;?></span>来源：各润教育 人气:<span class="hits"><?php echo $hits;?></span></p>
<div class="tbody">
<p><img src="image/teachers/photo/<?php echo $photo;?>" alt=""></p>
	<p class="tcv"><span class="tem">【名师简介】</span><?php echo $resume;?></p></div>

<div class="tcontent"><span class="tem">【教学心得】</span><?php echo $content;?></div>


</div>
<div class="greenNewsright">
<div class="newsType">
	<h2>名师团队</h2>
	<ul>
		<li><a href="teacherlist.php?typeid=9">数学团队</a></li>
		<li><a href="teacherlist.php?typeid=10">物理团队</a></li>
		<li><a href="teacherlist.php?typeid=11">化学团队</a></li>
		<li><a href="teacherlist.php?typeid=12">英语团队</a></li>
		<li><a href="teacherlist.php?typeid=18">语文团队</a></li>
	</ul>
</div>
<div class="newsTopten">
	<h2>人气排行</h2>
	<ul>
		<?php 
         $sqltop="select * from teachers  order by hits desc limit 10";
         $result_top=$mysqli->query($sqltop);
		while ($row_top=$result_top->fetch_assoc())
		{ 
			$toptitle=$row_top['name'];
			$topid=$row_top['id'];
      ?>
		<li><a href="teachers.php?id=<?php echo $topid ?>" title="<?php echo $toptitle ?>"><?php echo cut_str($toptitle,16,0) ; ?></a></li>
	<?php } ?>
	</ul>
</div>
<div class="englishCorner">
	<h2>英语角</h2>
	<ul>
		<p><?php echo $english;?></p>
		<p><?php echo $chinese ?></p>
		
	</ul>
</div>
</div>
<div class="clear"></div>
</div>
<div class="clear"></div>