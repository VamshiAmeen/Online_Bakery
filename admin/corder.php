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


.edit{
	background-color:#C96;
	width:450px;
	height:450px;
	top:180px;
	right:-400px;
	position:relative;
		padding:5px;
		overflow:hidden;
		border-radius:30px;
}
.submit{
	width:50px;
	height:20px;
}
.close{
	width:50px;
	height:20px;
}

.logo img{
	float:left;
	width:100px;
	height::auto;
}
.content{
	font-size:36px;
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
.box1{
	height:50px;
	width:50%;
	position:relative;
}
.box2{
	height:50px;
	width:50%;
	left:800px;
	position:relative
}
.box3{
	height:50px;
	width:50%;;
	left:1600px;
	top:-30px;
	position:relative
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
<title>Online bakery</title>
</head>

<body>
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
<div class="logo">
<img src="../logo/OIP (7).jfif"; />
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
echo '
<div class="box1">
<form action="" method="post">
	<table border="1px" align="center">
		//<tr>
			<th colspan="10"><center>ORDERS TO BE PLACED TO SUPLLIER</center></th>
		</tr>
		<tr>
  	<th>Veg/Nonveg</th>
    <th>Qlavour</th>
    <th>Weight(in kg)</th>
    <th>Order Quantity</th>
    <th>Price</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Pin</th>
    <th>Date</th>
    <th>Status</th>
    	</tr>
		';
		$sql="Select * from CUSTOMIZE where STATUS=1";
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
		$status=$row['STATUS'];
		//if($status=="1"){
		$statustxt="order to supplier";
			/*}
			if($status=="2"){
				$statustxt="order placed";
			}
			if($status=="3"){
				$statustxt="Deliver";
			}*/
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
    <td><button type="submit" name="status" value='.$pid.'>'.$statustxt.'</td>
   			</tr>
		';
	}
	echo '
	</table>
</form>
</div>
	';
	if(isset($_POST['status'])){
		$pid1=$_POST['status'];
		$sql3="Select * from CUSTOMIZE where PID='$pid1'";
		$query3=mysql_query($sql3,$link);
		$result3=mysql_fetch_array($query3);
		$status1=$result3['STATUS'];
	
		if($status1=="1"){
			$sql1="Select * from CUSTOMIZE where PID='$pid1'"; 
			$result1=mysql_query($sql1,$link);
			while($row1=mysql_fetch_array($result1)){
				$cat=$row1['CATEGORY1'];
				$pid1=$row1['PID'];
				$flavour1=$row1['FLAVOUR'];
				$qty1=$row1['PQUANTITY'];
				$oqty=$row1['OQUANTITY'];
				$status1="1";
				$sql2="insert into SUPPLIERORDER(CAT,PID,FLAVOUR,PQUANTITY,OQUANTITY,STATUS)values('$cat','$pid1','$flavour1','$qty1','$oqty','$status1')";
				$query2=mysql_query($sql2);
				if($query2){
					echo '<script>alert("order successfull..")</script>';
				}
			}
			$sql2="update CUSTOMIZE set STATUS='2' where PID='$pid1'";
			$query2=mysql_query($sql2);
			header("Location:corder.php");
		}
		/*if($status1=="3"){
				$sql3="Delete from CUSTOMIZE where PID='$pid1'";
				$result3=mysql_query($sql3,$link);
				$sql1="Delete from SUPPLIERORDER where PID='$pid1'";
				$result1=mysql_query($sql1,$link);
				echo '<script>alert("delivered")</script>';
			header("Location:corder.php");
			}*/
}	
?>

<?php
echo '

<div class="box2">
<form action="" method="post">
	<table border="1px" align="center">
		<tr>
			<th colspan="10"><center>ORDER PLACED TO SUPLLIER</center></th>
		</tr>
		<tr>
  	<th>Veg/Nonveg</th>
    <th>Qlavour</th>
    <th>Weight(in kg)</th>
    <th>Order Quantity</th>
    <th>Price</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Pin</th>
    <th>Date</th>
    <th>Status</th>
    	</tr>
		';
		$sql="Select * from CUSTOMIZE where STATUS=2";
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
		$status=$row['STATUS'];
		/*if($status=="1"){
		$statustxt="order to supplier";
			}
			if($status=="2"){*/
				$statustxt="order placed";
			/*}
			if($status=="3"){
				$statustxt="Deliver";
			}*/
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
    <td><button type="submit" name="status" value='.$pid.'>'.$statustxt.'</td>
   			</tr>
		';
	}
	echo '
	</table>
</form>
</div>
	';
?>

<?php
echo '

<div class="box3">
<form action="" method="post">
	<table border="1px" align="center">
		<tr>
			<th colspan="10">c<center>READY PRODUCTS</center></th>
		</tr>
		<tr>
  	<th>veg/nonveg</th>
    <th>flavour</th>
    <th>quantity</th>
    <th>order quantity</th>
    <th>price</th>
    <th>phone</th>
    <th>address</th>
    <th>pin</th>
    <th>date</th>
    <th>status</th>
    	</tr>
		';
		$sql="Select * from CUSTOMIZE where STATUS=3";
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
		$status=$row['STATUS'];
		/*if($status=="1"){
		$statustxt="order to supplier";
			}
			if($status=="2"){
				$statustxt="order placed";
			}
			if($status=="3"){*/
				$statustxt="Deliver";
			//}*/
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
    <td><button type="submit" name="status" value='.$pid.'>'.$statustxt.'</td>
   			</tr>
		';
	}
	echo '
	</table>
</form>
</div>
	';
	if(isset($_POST['status'])){
		$pid1=$_POST['status'];
		$sql3="Select * from CUSTOMIZE where PID='$pid1'";
		$query3=mysql_query($sql3,$link);
		$result3=mysql_fetch_array($query3);
		$status1=$result3['STATUS'];
		if($status1=="3"){
				$sql2="update CUSTOMIZE set STATUS=0 where PID='$pid1'";
				$query2=mysql_query($sql2);
				//$sql3="Delete from CUSTOMIZE where PID='$pid1'";
				//$result3=mysql_query($sql3,$link);
				//$sql1="Delete from SUPPLIERORDER where PID='$pid1'";
				//$result1=mysql_query($sql1,$link);
				echo '<script>alert("delivered")</script>';
			header("Location:corder.php");
			}
	}

?>


</table>
</form>
</body>
</html>