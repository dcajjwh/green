<?php 
include('connect.php');
include('lib.php');
class shownews
{
	public $typeid;
	public $newsnum;
	public $cut;
	function __construct ($id,$newsnum,$cut)
	{
	$this->typeid=$id;
	$this->newsnum=$newsnum;
	$this->cut=$cut;
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
       $atitle=$row['title'];
	   $title=cut_str(stripslashes($row['title']),$this->cut,0);
	   $id=$row['id'];
	   $time=substr($row['time'], 5,5);
	    echo "<li><a href=\"news.php?id=$id\" title=\"$atitle\"> $title</a><span id=\"newstime\">($time)</span></li>";
              }	
       else {
          echo "<li>暂无内容</li>";
      }
	 }	
	}
	
?>

