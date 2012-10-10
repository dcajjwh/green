<?php include("header.php");
include("inc/connect.php");
include("inc/lib.php");
//根据id取出新闻内容
$id=intval($_GET['id']);
$mysqli=new mysqli($db_host,$db_user,$db_pwd,$db);
$mysqli->set_charset("utf8");
$sql="select * from news where id=$id";
$result=$mysqli->query($sql);
$row=$result->fetch_assoc();
$title=$row['title'];
$hits=$row['hits'];
$content=stripslashes($row['content']);
$time=$row['time'];
$typeid=$row['typeid'];
//增加点击次数
$sqlhit="update news set hits=hits+1 where id=$id";
$mysqli->query($sqlhit);
//上一篇
$sql_prev="select * from news where id>$id and typeid=$typeid order by id desc  limit 1";
$result_prev=$mysqli->query($sql_prev);
$row_prev=$result_prev->fetch_assoc();
if($row_prev){
$title_prev=$row_prev['title'];
$id_prev=$row_prev['id'];
$str_prev="<a href=\"news.php?id=$id_prev\">$title_prev</a>";
}
else{
	$str_prev="没有了";}

//下一篇
$sql_next="select * from news where id<$id  and typeid=$typeid order by id desc  limit 1";
$result_next=$mysqli->query($sql_next);
$row_next=$result_next->fetch_assoc();
if($row_next){
$title_next=$row_next['title'];
$id_next=$row_next['id'];
$str_next="<a href=\"news.php?id=$id_next\">$title_next</a>";
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
<div class="greenLocation">您当前的位置>各润资讯>教育新闻><?php echo $title;?></div>
<div class="greenNewsbox">
<div class="greenNewscontent">
<h2 class="newstitle"><?php echo $title;?></h2>
<p class="newsinfo">发布时间：<span class="datetime"><?php echo $time;?></span>来源：各润教育 浏览:<span class="hits"><?php echo $hits;?></span>次</p>
<div class="newsbody">
<?php echo $content;?>
<div class="clear"></div>
</div>
<p>上一篇：<?php echo $str_prev;?></p>
<p>下一篇：<?php echo $str_next;?></p>
<div class="clear"></div>
</div>

<div class="greenNewsright">
<div class="newsType">
	<h2>新闻分类</h2>
	<ul>
		<li><a href="newslist.php?typeid=1">校内新闻</a></li>
		<li><a href="newslist.php?typeid=2">教育新闻</a></li>
		<li><a href="newslist.php?typeid=3">考试加油站</a></li>
		<li><a href="newslist.php?typeid=4">家长沟通</a></li>
	</ul>
</div>
<div class="newsTopten">
	<h2>点击排行</h2>
	<ul>
		<?php 
         $sqltop="select * from news where typeid=$typeid order by hits desc limit 10";
         $result_top=$mysqli->query($sqltop);
		while ($row_top=$result_top->fetch_assoc())
		{ 
			$toptitle=$row_top['title'];
			$topid=$row_top['id'];
      ?>
		<li><a href="news.php?id=<?php echo $topid ?>" title="<?php echo $toptitle ?>"><?php echo cut_str($toptitle,16,0) ; ?></a></li>
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