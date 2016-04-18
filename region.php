<?php 
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$db="tx_two";
	$conn = mysqli_connect($servername, $username, $password,$db);
	// 检测连接
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	// mysqli_select_db("tx_two", $conn);
	// Create database
	$parentid=$_GET['id'];
	if($parentid==0){
		$sql = "select id,name from region where parentid=0";
	}else {
		$sql = "select id,name from region where parentid=".$parentid;
	}
	
	$res=mysqli_query($conn, $sql);//$row['name']
	while($row = mysqli_fetch_array($res))
  	{
  		// var_dump($row['name']);
  		// $result[]=array('id' => intval($row['id']),'name' => urlencode($row['name']));
  		 $row['name']=iconv("GBK", "UTF-8", $row['name']); 
  		$res1[]=array('id' => intval($row['id']),'name' => $row['name']);
  	}
  	// var_dump($result);
  	// echo urldecode(json_encode($result));
  	// echo '<hr />';
  	// echo 1111;
  	echo json_encode($res1);
  	// var_dump(json_last_error());
	mysqli_close($conn);
?>