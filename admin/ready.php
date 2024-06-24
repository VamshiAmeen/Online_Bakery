<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
.main{
	margin:0;
	padding:0;
	font-family:Century Gothic;
}
body{
	background-image:url(../77.jpg);
	background-position:center;
	background-size:cover;
	width:100%;
	height:100vh;
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
.logo img{
	float:left;
	width:100px;
	height::auto;
	
}
.main{
	max-width:1900px;
	margin:auto;

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
	ul{
	float:right;
	list-style-type:none;
	margin-top:25px;
}
.aitems{
	position:relative;
	top:10px;
	right:240px;
	width:250px;
	height:40px;
}

ul li a{
	text-decoration:none;
	color:#fff;
	padding:10px 40px;
	border:1px solid #fff;
	transition:0.6s ease;
}
ul li a:hover{
	background-color:#fff;
	color:#000;
}




</style>
</head>

<body>
<div class="logo">
		<img src="../logo/OIP (7).jfif";
</div>
<div class="content">
<h1>Online Bakery shop</h1>
<h5><i>Fresh bakes every day</i></h5>
</div>
<div class="contents">
<ul>
<li class="aitems"><a href="adminhome.php">Back</a></li>
</ul>
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
    		<th>Product Id</th>
    		<th>Product name</th>
			<th>Veg/Non-veg</th>
    		<th>Product Price</th>
    		<th>Product Weight(in kg)</th>
			<th>Product Available</th>
			<th>Status</th>
    	</tr>
		';
		$sql="Select * from TPRODUCT where PAVAIL<4 AND STATUS=3";
		$result=mysql_query($sql,$link);
		while($row=mysql_fetch_array($result)){
			$pid=$row['PID'];
			$pname=$row['PNAME'];
			$cat1=$row['CATEGORY1'];
			$pprice=$row['PPRICE'];
			$pquantity=$row['PQUANTITY'];
			$pavail=$row['PAVAIL'];
			$status=$row['STATUS'];
				$statustxt="add product";
			echo '
    		<tr>
    			<td>'.$pid.'</td>
        		<td>'.$pname.'</td>
				<td>'.$cat1.'</td>
       			<td>'.$pprice.'</td>
       			<td>'.$pquantity.'</td>
     			<td>'.$pavail.'</td>
				<td><button type="submit" name="status" value='.$pid.'>'.$statustxt.'</td>
   			</tr>
		';
		}
		$sql="Select * from TSWEETS where PAVAIL<4 AND STATUS=3";
		$result=mysql_query($sql,$link);
		while($row=mysql_fetch_array($result)){
			$pid=$row['PID'];
			$pname=$row['PNAME'];
			$pprice=$row['PPRICE'];
			$pquantity=$row['PQUANTITY'];
			$pavail=$row['PAVAIL'];
			$status=$row['STATUS'];
				$statustxt="add product";
			echo '
    		<tr>
    			<td>'.$pid.'</td>
        		<td>'.$pname.'</td>
				<td></td>
       			<td>'.$pprice.'</td>
       			<td>'.$pquantity.'</td>
     			<td>'.$pavail.'</td>
				<td><button type="submit" name="status" value='.$pid.'>'.$statustxt.'</td>
   			</tr>
		';
		}
		$sql="Select * from TJUICE where PAVAIL<4 AND STATUS=3";
		$result=mysql_query($sql,$link);
		while($row=mysql_fetch_array($result)){
			$pid=$row['PID'];
			$pname=$row['PNAME'];
			$pprice=$row['PPRICE'];
			$pquantity=$row['PQUANTITY'];
			$pavail=$row['PAVAIL'];
			$status=$row['STATUS'];
				$statustxt="add product";
			echo '
    		<tr>
    			<td>'.$pid.'</td>
        		<td>'.$pname.'</td>
				<td></td>
       			<td>'.$pprice.'</td>
       			<td>'.$pquantity.'</td>
     			<td>'.$pavail.'</td>
				<td><button type="submit" name="status" value='.$pid.'>'.$statustxt.'</td>
   			</tr>
		';
	}
	echo '
	</table>
</form>
	';
	if(isset($_POST['status'])){
		$pid1=$_POST['status'];
		$sql3="Select * from TPRODUCT where PID='$pid1'";
		$query3=mysql_query($sql3,$link);
		$result3=mysql_fetch_array($query3);
		$status1=$result3['STATUS'];
		$pavail1=$result3['PAVAIL'];
		if($status1=="3"){
			$sql5="Select * from SUPPLIERORDER where PID='$pid1'";
			$query5=mysql_query($sql5,$link);
			$result5=mysql_fetch_array($query5);
			$oqty1=$result5['OQUANTITY'];
			$avail=$pavail1+$oqty1;
			echo $pavail1;
			echo $oqty1;
			echo $avail;
			$sql4="update TPRODUCT set PAVAIL='$avail',STATUS='1' where PID='$pid1'";
		 	$query4=mysql_query($sql4);
			if($query4){
				$sql2="update SUPPLIERORDER set STATUS='0' where PID='$pid1'";
			$query2=mysql_query($sql2);
			}
			header("Location:ready.php");
		}
	}
	
	
	if(isset($_POST['status'])){
		$pid1=$_POST['status'];
		$sql3="Select * from TSWEETS where PID='$pid1'";
		$query3=mysql_query($sql3,$link);
		$result3=mysql_fetch_array($query3);
		$status1=$result3['STATUS'];
		$pavail1=$result3['PAVAIL'];
		if($status1=="3"){
			$sql5="Select * from SUPPLIERORDER where PID='$pid1'";
			$query5=mysql_query($sql5,$link);
			$result5=mysql_fetch_array($query5);
			$oqty1=$result5['OQUANTITY'];
			$avail=$pavail1+$oqty1;
			echo $pavail1;
			echo $oqty1;
			echo $avail;
			$sql4="update TSWEETS set PAVAIL='$avail',STATUS='1' where PID='$pid1'";
		 	$query4=mysql_query($sql4);
			if($query4){
				$sql2="update SUPPLIERORDER set STATUS='0' where PID='$pid1'";
			$query2=mysql_query($sql2);
			}
			header("Location:ready.php");
		}
	}
	
	if(isset($_POST['status'])){
		$pid1=$_POST['status'];
		$sql3="Select * from TJUICE where PID='$pid1'";
		$query3=mysql_query($sql3,$link);
		$result3=mysql_fetch_array($query3);
		$status1=$result3['STATUS'];
		$pavail1=$result3['PAVAIL'];
		if($status1=="3"){
			$sql5="Select * from SUPPLIERORDER where PID='$pid1'";
			$query5=mysql_query($sql5,$link);
			$result5=mysql_fetch_array($query5);
			$oqty1=$result5['OQUANTITY'];
			$avail=$pavail1+$oqty1;
			echo $pavail1;
			echo $oqty1;
			echo $avail;
			$sql4="update TJUICE set PAVAIL='$avail',STATUS='1' where PID='$pid1'";
		 	$query4=mysql_query($sql4);
			if($query4){
				$sql2="update SUPPLIERORDER set STATUS='0' where PID='$pid1'";
			$query2=mysql_query($sql2);
			}
			header("Location:ready.php");
		}
	}
?>

</body>
</html>