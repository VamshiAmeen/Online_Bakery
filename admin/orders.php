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
.cus{
	position:relative;
	top:120px;
	right:-800px;
}
	
</style>
<title>Online bakery</title>
</head>

<body>

<div class="main">
<div class="logo">
<img src="../logo/OIP (7).jfif"; />
</div>
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

<form action="" method="post">
<table border:1px solid red>
	<tr>
    <td>Veg/Nonveg</td>
    <td>Plavour</td>
    <td>Weight</td>
    <td>Order Quantity</td>
    <td>Price</td>
    <td>Phone</td>
    <td>Address</td>
    <td>Pin</td>
    <td>Date</td>
    <td>Payment Status</td>
    <td>Status</td>
    
    </tr>
    <?php
	
	$sql="Select * from TORDER where STATUS=1";
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
			$statustxt="deliver";
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
    <td><button type="submit" name="status" value='.$pid.'>'.$statustxt.'</td>
    </tr>
	';
	}
?>
</table>
</form>
<?php
if(isset($_POST['status'])){
	$pid1=$_POST['status'];
	//$sql1="Delete from TORDER where PID='$pid1'";
	//$result1=mysql_query($sql1,$link);
	$sql4="update TORDER set STATUS='0' where PID='$pid1'";
	$query4=mysql_query($sql4);
	echo '<script>alert("ORDER DELIVERED")</script>';
	header("Location:orders.php");

	
}



?>
<div class="content">
<h1>Online Bakery shop</h1>
<h5><i>Fresh bakes every day</i></h5>
</div>

</body>
</html>