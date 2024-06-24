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
	height:300px;
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
	session_start();
?>
<div class="logo">
<img src="../logo/OIP (7).jfif"; />
</div>
<div class="content">
<h1>Online Bakery shop</h1>
<h5><i>Fresh bakes every day</i></h5>
</div>
<?php
echo'
<div class="edit">
	<form action="" method="post">
		<table class="totaltable">
			<tr>
				<td>veg/nonveg</td>
				<td>'.$_SESSION['cat1'].'</td>
			</tr>
			<tr>
				<td>flavour</td>
				<td>'.$_SESSION['flavour'].'</td>
			</tr>
			<tr>
				<td>quantity</td>
				<td>'.$_SESSION['quantity'].'</td>
			</tr><tr>
				<td>price</td>
				<td>'.$_SESSION['oquantity'].'</td>
			</tr>
			<tr>
				<td>price</td>
				<td>'.$_SESSION['price'].'</td>
			</tr>
			<tr>
							<td>ENTER ADDRESS</td>
							<td><input type="text" name="address" required></td>
						</tr>
						<td>ENTER Pin code</td>
						<td>
							<select name="pin" required>
								<option value="574118">574118</option>
								<option value="576101">576101</option>
								<option value="576107">576107</option>
								<option value="576120">576120</option>
							</select><br/>
						</td>
						<tr>
							<td>ENTER PHONE NUMBER</td>
							<td><input type="text" name="phone" required></td>
						</tr>
						<tr>
							<td>ENTER DATE OF DELIVERY</td>
							<td><input type="date" name="date" required></td>
						</tr>
						<tr>
							<td>ENTER Payment mode</td>
							<td>
							<select name="payment" required>
								<option value="1">cash on delivery</option>
								<option value="2">online payment</option>
							</select><br/>
						</td>
						</tr>
						<tr>
							<td><button type="submit" name="proceedorder">PROCEED</button></td>
						</tr>
		</table>
	</form>
	<form action="" method="post">
    <button type="submit" name="back">Back</button>
   </form>
	</div>
	';

if(isset($_POST['proceedorder'])){
	$user=$_SESSION['user'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$pin=$_POST['pin'];
	$date=$_POST['date'];
	$status='1';
	$cat1=$_SESSION['cat1'];
	$flavour=$_SESSION['flavour'];
	$quantity=$_SESSION['quantity'];
	$oqty=$_SESSION['oquantity'];
	$price=$_SESSION['price'];
	$currentdate=date("Y-m-d");
	$payment=$_POST['payment'];
		if($payment=="1"){
			$paymentsts="pending";
		}
		else{
			$paymentsts="succesfull";
		}
	if($date>=$currentdate){
		$sql1="Select PID from CUSTOMIZE ORDER BY PID DESC LIMIT 1";
		$result1=mysql_query($sql1);
		if($result1){
			$row=mysql_fetch_array($result1);
			$pid=$row['PID']+1;
		}
		else{			
			$pid=1;
		}
		$sql2="insert into CUSTOMIZE(USER,PID,CATEGORY1,FLAVOUR,PQUANTITY,OQUANTITY,PRICE,DATE,ADDRESS,PHONE,PIN,STATUS,PAYMENT)values('$user','$pid','$cat1','$flavour','$quantity','$oqty','$price','$date','$address','$phone','$pin','$status','$paymentsts')";
		$query2=mysql_query($sql2);
		if($payment=="1"){
						echo '<script>alert("order successfull..")</script>';
						header("Location:urorder.php");
						}else{
					    header("Location:checkout.php?amount=".$total);
						}
					}
					else
				{
					echo '<script>alert("enter valid date")</script>';
				}
				
				}
				
		if(isset($_POST['back'])){
			 header("Location:customize.php");
		}
?>
</body>
</html>