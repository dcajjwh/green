<?php 
header("Content-Type:text/html;charset=utf-8"); 
include('connect.php');
class shownews
{
	public $typeid;
	public $newsnum;
	function __construct ($id,$newsnum)
	{
	$this->typeid=$id;
	$this->newsnum=$newsnum;
		}
	public function show()
	{ 
	 global $db_host,$db_user,$db_pwd,$db;
      $conn=new mysqli($db_host,$db_user,$db_pwd,$db);
      $conn->set_charset("utf8");
      $query=$conn->query("select * from news where typeid=$this->typeid order by id desc LIMIT $this->newsnum");
      $num=$query->num_rows;
	
 if ($num>0) 
      while($row=$query->fetch_assoc())
   {
	   $title=stripslashes($row['title']);
	   $id=$row['id'];
	   $time=substr($row['time'], 5,5);
	  echo "<li><a href=\"news.php?id=$id\"> $title</a><span id=\"newstime\">($time)</span></li>";
    
}
	
 else  echo "<li>暂无内容</li>";
 
	  

	}
	
	}
	
$n1=new shownews(1,4);
$n1->show();
echo "<br/><br/>";
$n2=new shownews(2,4);
$n2->show();
echo "<br/><br/>";
echo "<br/><br/>";
$n3=new shownews(3,4);
$n3->show();
?>

