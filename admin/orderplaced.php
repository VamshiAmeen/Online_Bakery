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
			<th colspan="10"><center>ORDER PLACED TO SUPPLER</center></th>
		</tr>
		<tr>
    		<th>Product Id</th>
    		<th>Product Name</th>
			<th>Veg/Non-veg</th>
    		<th>Product Price</th>
    		<th>Product Weight(in kg)</th>
			<th>Product Aailable</th>
			<th>Status</th>
    	</tr>
		';
		$sql="Select * from TPRODUCT where PAVAIL<4 AND STATUS=2";
		$result=mysql_query($sql,$link);
		while($row=mysql_fetch_array($result)){
			$pid=$row['PID'];
			$pname=$row['PNAME'];
			$cat1=$row['CATEGORY1'];
			$pprice=$row['PPRICE'];
			$pquantity=$row['PQUANTITY'];
			$pavail=$row['PAVAIL'];
			$status=$row['STATUS'];
				$statustxt="order placed";
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
		$sql="Select * from TSWEETS where PAVAIL<4 AND STATUS=2";
		$result=mysql_query($sql,$link);
		while($row=mysql_fetch_array($result)){
			$pid=$row['PID'];
			$pname=$row['PNAME'];
			$pprice=$row['PPRICE'];
			$pquantity=$row['PQUANTITY'];
			$pavail=$row['PAVAIL'];
			$status=$row['STATUS'];
				$statustxt="order placed";
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
		$sql="Select * from TJUICE where PAVAIL<4 AND STATUS=2";
		$result=mysql_query($sql,$link);
		while($row=mysql_fetch_array($result)){
			$pid=$row['PID'];
			$pname=$row['PNAME'];
			$pprice=$row['PPRICE'];
			$pquantity=$row['PQUANTITY'];
			$pavail=$row['PAVAIL'];
			$status=$row['STATUS'];
						$statustxt="order placed";
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
?>

</body>
</html>