<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>


body{
	background-image:url(../77.jpg);
	background-position:center;
	background-size:cover;
	width:100%;
	height:100vh;
}
ul{
	float:right;
	list-style-type:none;
	margin-top:25px;
}
ul li a{
	text-decoration:none;
	color:#fff;
	padding:5px 20px;
	border:1px solid #fff;
	transition:0.6s ease;
}
ul li a:hover{
	background-color:#fff;
	color:#000;
}
.content{
	font-size:xx-large;
	width:80%;
	position:absolute;
	top:-7%;
	transform:translate(-30%);
	text-align:center;
	color:#FFF;
	right:100px;

}
table{
	top:200px;
	position:relative;
	color:#FFF;
	width:40%;
border-collapse:collapse;
}
th,td{
	padding:9px;
	text-align:right;
	border-bottom:1px solid #930;
}
th{

	text-align:left;
background-color:#f2f2f2;
color:#000;
}
.logo img{
	float:left;
	width:100px;
	height::auto;
	
}
.main{
	max-width:1900px;
	margin:auto;
}
</style>
<title>Online bakery</title>
</head>

<body>

<div class="logo">
<img src="../logo/OIP (7).jfif";
</div>
<!--<table><tr>
<th>Orders</th></tr>
<tr>
<th>id</th>
<th>name</th>
<th>Category</th>
<th>price</th>
<th>quantity</th>
<th>available</th>
</tr></table>-->
<?php
	$link=mysql_connect('localhost','root','');
	if(!$link){
		die('connection failed'.mysql_error());
	}
	$db=mysql_select_db('TPROJECT');
	if(!$db){
		die('selected database unavailable'.mysql_error());
	}
?>
<?php
echo '
<form action="" method="post">
	<table border="1px">
		<tr>
    		<th>Veg/nonveg</th>
    		<th>product name</th>
    		<th>order quantity</th>
    		<th>product quantity</th>
			<th>STATUS</th>
    	</tr>
		';
		$sql="Select * from SUPPLIERORDER where STATUS='1'";
		$result=mysql_query($sql,$link);
		while($row=mysql_fetch_array($result)){
			$pid=$row['PID'];
			$pname=$row['FLAVOUR'];
			$cat=$row['CAT'];
			$pquantity=$row['PQUANTITY'];
			$oqty=$row['OQUANTITY'];
			$sts=$row['STATUS'];
			if($sts=="1"){
			echo '
    		<tr>
				<td>'.$cat.'</td>
        		<td>'.$pname.'</td>
       			<td>'.$pquantity.'</td>
     			<td>'.$oqty.'</td>
				<td><button type="submit" name="status" value='.$pid.'>ready</td>
   			</tr>
		';
			}
	}
	echo '
	</table>
</form>
	';
	if(isset($_POST['status'])){
	$pid1=$_POST['status'];
	$sql2="update TPRODUCT set STATUS=3 where PID='$pid1'";
	$query2=mysql_query($sql2);
	$sql2="update TSWEETS set STATUS=3 where PID='$pid1'";
	$query2=mysql_query($sql2);
	$sql2="update TJUICE set STATUS=3 where PID='$pid1'";
	$query2=mysql_query($sql2);
	$sql2="update CUSTOMIZE set STATUS=3 where PID='$pid1'";
	$query2=mysql_query($sql2);
	
	$sql4="update SUPPLIERORDER set STATUS='0' where PID='$pid1'";
	$query4=mysql_query($sql4);
	if($query4){
		header("Location:supplierhome.php");
	}

}


?>

<div class="content">
<h1>Online Bakery shop</h1>
<h6><i>Fresh bakes every day</i></h6>
</div>
</div>

</body>
</html>


