<?php 
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
      $conn=new mysqli("localhost","root","root","green");
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
	
?>

