<?php include("header.php");
include("inc/connect.php");
include("inc/lib.php");
include("inc/subpage.class.php");
//根据id取出内容
$typeid=intval($_GET['typeid']);
$mysqli=new mysqli($db_host,$db_user,$db_pwd,$db);
$mysqli->set_charset("utf8");
//取出记录总数
$totalsql="select * from news where typeid=$typeid";
$result_total=$mysqli->query($totalsql);
$total=$result_total->num_rows;
//分页代码
$page_size = 18;  //每页显示的条数 
$nums = $pid_totle=$total;   //总条数   
$sub_pages = $pid_totle/$page_size + 1;  //得到当前是第几页
if(isset($_GET['page'])) {
$pageCurrent=intval($_GET['page']);
} 
else $pageCurrent=1;    
$sql="select * from news where typeid=$typeid order by id desc limit ".$page_size*($pageCurrent-1).",".$page_size;
$result=$mysqli->query($sql);
//随机英语句子
$engsql="SELECT *
FROM `quotes` AS t1 JOIN (SELECT ROUND(RAND() * ((SELECT MAX(id) FROM `quotes`)-(SELECT MIN(id) FROM `quotes`))+(SELECT MIN(id) FROM `quotes`)) AS id) AS t2
WHERE t1.id >= t2.id
ORDER BY t1.id LIMIT 1";
$result_eng=$mysqli->query($engsql);
$row_eng=$result_eng->fetch_assoc();
$english=$row_eng['English'];
$chinese=$row_eng['Chinese'];
$type=array("","校内新闻","教育新闻","考试加油站","家长沟通");
?>
<div class="greenLocation">您当前的位置>各润资讯><?php echo $type[$typeid];?>></div>
<div class="greenNewsbox">
<div class="greenNewscontent">

<ul>
	<?php while($row=$result->fetch_assoc() ){
           $title=cut_str(strip_tags($row['title']),29,0); 
           $id=$row['id'];
           $time=substr($row['time'],0,10);
           $hits=$row['hits'];


		?> 
	<li class="newsentry"><a href="news.php?id=<?php echo $id; ?>"><?php echo $title; ?></a>
		<span class="newslist_time">点击：<?php echo $hits; ?>  发布时间：<?php echo $time; ?></span>
	
	</li>
	<?php } ?>
</ul>
<p class="pagination">本分类下<?php $subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,"newslist.php?typeid=$typeid&page=",1);?></p>
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
//取出点击最多的十条新闻
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