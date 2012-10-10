<?php include("header.php");
include("inc/news_class.php");
include("inc/connect.php");
$mysqli=new mysqli($db_host,$db_user,$db_pwd,$db);
$mysqli->set_charset("utf8");
$sql_docs="select * from docs order by id desc limit 6";
$result_docs=$mysqli->query($sql_docs);
?>
<div class="info">
 <div class="wrapper">  
        <div id="slider">  
            <ul>  
             
                <li><a href="news.php?id=203" target="_blank"><img src="image/slider/2.jpg" width="400px"title="我校举行2012年优秀学员颁奖仪式" /></a></li> 
                <li><a href="news.php?id=211" target="_blank"><img src="image/slider/1.jpg" width="400px"title="2012年中考我校被名校录取的部分学员" /></a></li>  
                <li><a href="news.php?id=201" target="_blank"><img src="image/slider/4.jpg" width="400px"title="各润教育2012年中招考试成绩展示" /></a></li>  
 
          </ul>  
      </div> 
      <div id="info"><em id="title"></em><div class="btn"></div></div>
</div>  
<div class="newstop"><h2>校内新闻</h2>
<ul>
<?php $scnews=new shownews(1,8,20);
$scnews->show();
?>
</ul></div>
<div id="login">
<h2> 学员登录</h2>
<table width="100%" border="0" id="tb">
  <tr>
    <td width="39%" height="44"><span>账号:</span></td>
    <td width="61%"><input type="text" name="stu_name" id="stuname" size="15" /></td>
  </tr>
  <tr>
    <td height="34"><span>密码：</span></td>
    <td><input name="stu_pwd" type="text" id="stupwd" size="15" /></td>
  </tr>
  <tr >
    <td height="53" >验证码：</td>
    <td><input  name="vacode" type="text" id="vcode" size="8" />
      <img src="inc/vcode.php" width="60" height="20" id="vcode"onclick="javascript:newvcode(this,this.src)"/></td>
  </tr>
  <tr >
    <td>&nbsp;</td>
    <td ><input type="button"id="btn" value="ok"/></td>
  </tr>
</table>
<br />
<br />
<br />

</div>
<div class="clear"></div>
<div class="newsbox">
<h2 id="topbg"></h2>
<div class="news"><h2>教育新闻</h2>
<ul>
<?php $edunews=new shownews(2,5,19);
$edunews->show();
?>
</ul></div>
<div class="news"><h2>考试加油站</h2>
<ul>
<?php $examnews=new shownews(3,5,18);
$examnews->show();
?>
</ul>
</div>
<div class="news"><h2>家长沟通</h2>
<ul>
<?php $comnews=new shownews(4,5,18);
$comnews->show();
?>
</ul></div>
<div class="clear"></div>
</div>
<div class="classbox">
  <h2></h2>
 <div class="subject eng">
   <ul >
     <LI>课程1</LI>
     <LI>课程2</LI>
     <LI>课程3</LI>
     <LI>课程4</LI>
     <LI>课程5</LI>
   </ul>
 </div>
 <div class="subject math">
   <ul >
     <LI>课程1</LI>
     <LI>课程2</LI>
     <LI>课程3</LI>
     <LI>课程4</LI>
     <LI>课程5</LI>
   </ul>
 </div>
 <div class="subject physics">
   <ul >
     <LI>课程1</LI>
     <LI>课程2</LI>
     <LI>课程3</LI>
     <LI>课程4</LI>
     <LI>课程5</LI>
   </ul>
 </div>
 <div class="subject chem">
  <ul >
     <LI>课程1</LI>
     <LI>课程2</LI>
     <LI>课程3</LI>
     <LI>课程4</LI>
     <LI>课程5</LI>
   </ul></div>
 <div class="subject chinese"><ul >
     <LI>课程1</LI>
     <LI>课程2</LI>
     <LI>课程3</LI>
     <LI>课程4</LI>
     <LI>课程5</LI>
   </ul></div>
</div>
<div class="teacher"><span class="teacher_top"></span>
		<div class="phpmain_lmin php-zxs">
			<ul>
				<li>
					<a href="teachers.php?id=38"><img src="image/teachers/english.png"></a>
				</li>
				<li>
					<a href="teachers.php?id=35"><img src="image/teachers/math.png"></a>
				</li>
				<li>
					<a href="teachers.php?id=36"><img src="image/teachers/physics.png"></a>
				</li>
				<li>
					<a href="teachers.php?id=37"><img src="image/teachers/chemistry.png"></a>
				</li>
		
			</ul>
		</div>
	</div>
  <div class="learningbox">

   <h2></h2>
<div class="stu">
<ul>
        <li>
          <img src="image/st1.png" alt="" />
        </li>
        <li>
          <img src="image/st1.png" alt="" />
        </li>
      </ul>
</div>
<div class="docs">
  <ul>
    <?php while ($row_docs=$result_docs->fetch_assoc()) { 
        $doctitle=$row_docs['title'];
        $id=$row_docs['id'];
      ?>
    <li><a class="downdocs" id="<?php echo $id; ?>" href="docs.php?id=<?php echo $id; ?>"> <?php echo $doctitle; ?></a></li>
    <?php  } ?> 
  </ul>
</div>
<div class="quote"></div>
<div class="clear"></div>
  </div>
  <div class="clear"></div>
   
<div id="footer"><p>Copyright©2012 各润教育 All Rights Reserved </p><p>电话 0371- 68975191 zzgr_edu@163.com
校址：郑州市嵩山路汝河路交叉口东南角，珍宝商务四楼</p></div>
<div id="login_div">
  <iframe id="downframe" width="100%" scrolling="no" height="156" frameborder="0" src="get.php" allowtransparency="true" name="downframe">
</iframe>
<span>关闭</span></div> 
</div>
<div id="pageOverlay"></div>
     
</body>
</html>