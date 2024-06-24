<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
.aitems{
	position:relative;
	top:10px;
	right:-840px;
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
.box1{
	height:50px;
	width:50%;
	position:relative;
}
.box2{
	height:50px;
	width:50%;
	left:900px;
	top:-110px;
	position:relative
}
	
</style>
<title>Untitled Document</title>
</head>

<body>
<div class="logo">
		<img src="../logo/OIP (7).jfif";
</div>
<div class="content">
<h1>Online Bakery shop</h1>
<h5><i>Fresh bakes every day</i></h5>
</div>
<div class="optionS">
	<ul>
		<li class="aitems"><a href="customerhome.php">Back</a></li>
        </ul>
  </div>
<?php
	$link=mysql_connect('localhost','root','');
	if(!$link){
		die('connection failed'.mysql_error());
	}
	$db=mysql_select_db('TPROJECT');
	if(!$db){
		die('selected database unavailable'.mysql_error());
	}
	session_start();
	?>
    <div class="box1">
    <form action="" method="post">
<table border="1px" >
	<tr>
    	<th colspan="11">ORDERS</th>
        </tr>
	<tr>
    <th>Veg/Nonveg</th>
    <th>Flavour</th>
    <th>Weight</th>
    <th>Order Quantity</th>
    <th>Price</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Pin</th>
    <th>Date</th>
    <th>Payment Status</th>
    <th>Status</th>
    
    </tr>
    <?php
	$user=$_SESSION['user'];
	$sql="Select * from TORDER where USER='$user'";
	$result=mysql_query($sql,$link);
	while($row=mysql_fetch_array($result)){
		$pid=$row['PID'];
		$cat1=$row['CATEGORY1'];
		$flavour=$row['FLAVOUR'];
		$payment=$row['PAYMENT'];
		$quantity=$row['PQUANTITY'];
		$oqty=$row['OQUANTITY'];
		$price=$row['PRICE'];
		$phone=$row['PHONE'];
		$address=$row['ADDRESS'];
		$pin=$row['PIN'];
		$date=$row['DATE'];
		$status=$row['STATUS'];
		if($status=="1"){
			$statustxt="ordered";
		}
		if($status=="0"){
			$statustxt="delievered";
			$payment="cleared";
		}
		
	echo '
    <tr>
    <td>'.$cat1.'</td>
    <td>'.$flavour.'</td>
    <td>'.$quantity.'</td>
    <td>'.$oqty.'</td>
    <td>'.$price.'</td>
    <td>'.$phone.'</td>
    <td>'.$address.'</td>
    <td>'.$pin.'</td>
    <td>'.$date.'</td>
	<td>'.$payment.'</td>
    <td>'.$statustxt.'</td>
    </tr>
	';
	}
?>
</table>
</form>
<?php
echo '
<div class="box2">
<form action="" method="post">
	<table border="1px">
		//<tr>
			<th colspan="11">CUSTOMIZED ORDERS</th>
		</tr>
		<tr>
  	<th>Veg/Nonveg</th>
    <th>Flavour</th>
    <th>Weight</th>
    <th>Order Quantity</th>
    <th>Price</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Pin</th>
    <th>Date</th>
	<th>Payment Status</th>
    <th>Status</th>
    	</tr>
		';
		$sql="Select * from CUSTOMIZE where USER='$user'";
		$result=mysql_query($sql,$link);
		while($row=mysql_fetch_array($result)){
			$pid=$row['PID'];
		$cat1=$row['CATEGORY1'];
		$flavour=$row['FLAVOUR'];
		$quantity=$row['PQUANTITY'];
		$oqty=$row['OQUANTITY'];
		$price=$row['PRICE'];
		$phone=$row['PHONE'];
		$address=$row['ADDRESS'];
		$pin=$row['PIN'];
		$date=$row['DATE'];
		$payment=$row['PAYMENT'];
		$status=$row['STATUS'];
		if($status=="0"){
			$statustxt="delievered";
			$payment="cleared";
		}else{
			$statustxt="ordered";
		}
			echo '
    		<tr>
    			<td>'.$cat1.'</td>
    <td>'.$flavour.'</td>
    <td>'.$quantity.'</td>
    <td>'.$oqty.'</td>
    <td>'.$price.'</td>
    <td>'.$phone.'</td>
    <td>'.$address.'</td>
    <td>'.$pin.'</td>
    <td>'.$date.'</td>
	<td>'.$payment.'</td>
    <td>'.$statustxt.'</td>
   			</tr>
		';
	}
	echo '
	</table>
</form>
</div>
	';
	?>
</div>
</body>
</html>