<?php
//include_once('../../common.php');
header("content-Type: text/html; charset=Utf-8"); 
$conn=mysql_connect("rds3z8j0t5gs30kmr75x.mysql.rds.aliyuncs.com","tk","nbESPsvxZdJNxfnK"); 
if (!$conn)
{
echo "链接数据库服务器失败";
}

$db=mysql_select_db("tk",$conn);
if(!$db){
	echo "链接数据库失败";
}
mysql_query("set names 'utf8'");
$sql="select * from tk.tk_casio3_photo";
//echo $sql;
$arr= mysql_query($sql);
$a=1;
while($re=mysql_fetch_array($arr)){
	echo "<pre>";
print_r($re);
	if($a>500){
		exit;	
	}
}

exit;
?>