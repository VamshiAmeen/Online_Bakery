<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<!--bootstrap css link-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
 integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
  crossorigin="anonymous">
<!--font awesome link-->
<link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
crossorigin="anonymous"
 referrerpolicy="no-referrer" />
 
 <style>
 body{
	background-image:url(../77.jpg);
	background-position:center;
	background-size:cover;
	width:100%;
	height:100vh;
}

 .cart-page
 {
	 color:#FFF;
	 margin:80px 200px;
 }
 .cart-table{
	 width:100%;
	 border-collapse:collapse;
 }
 .cart-table tr th{
	 text-align:left;
 }
 .cart-info{
	 display:flex;
	 flex-wrap:wrap;
 }
 .cart-table th{
	 text-align:left;
	 padding:10px;
	 color:#FFC;
	 background:#F93;
	 font-weight:normal;
 }
 .cart-table tr td{
	 padding:10px 10px;
	 text-align:center;
 }
 .cart-table td input{
	 width:40px;
	 height:30px;
	 padding:5px;
 }
 .cart-table td button{
	 color:#F93;
	 font-size:12px;
 }

 .cart-table td img{
	 width:180px;
	 height:120px;
	 margin-right:10px;
 }
 .total-price{
	 display:flex;
	 justify-content:flex-end;
 }
 .total-price table{
	 border-top:3px solid #ff523b;
	 width:400px;
	 height:200px;
	 max-width:450px;
 }
 td:last-child{
	 text-align:left;
 }
 th:last-child{
	 text-align:left;
 }
 .buy{
	height:30px;
	width:100px;
	text-align:center;
	border-radius:30px;
	position:relative;
	left:25%;	 
	 }
 </style>
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
require_once('tcustomerpage2_1.php');
session_start();
?>

<?php
				
$user=$_SESSION['user'];
$total=0;
$tax=0;
$subtotal=0;
$itemcount=0;
$sql="Select * from TCART where PHONE='$user'";
$result=mysql_query($sql,$link);
echo '
	<div class="small-container cart-page">
		<table class="cart-table">
    		<tr>
    			<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PRODUCT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
           		<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;QUANTITY&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
          		<th>SUBTOTAL</th>
        	</tr>
     	</table>
    </div>';
	while($row=mysql_fetch_array($result)){
		$pname=$row['PNAME'];
		$pquantity=$row['PQUANTITY'];
		$poprice=$row['POPRICE'];
		$pprice=$row['PPRICE'];
		$pid=$row['PID'];
		$pavail=$row['PAVAIL'];
		$qty=$row['OQUANTITY'];
		$pimg=urldecode(urldecode($row['PIMG']));
		$psprice=$pprice*$qty;
		echo'
			<div class="small-container cart-page">
				<form action="" method="post">
					<table class="cart-table">
        				<tr>
    						<td>
            					<div class="cart-info">
            						<img src='."$pimg".' />
                    				<div>
                    					<p>'.$pname.'</p>
										<p>quantity:'.$pquantity.'</p>
										<small><s>'.$poprice.'</s></small>
                        				<small>'.$pprice.'</small>
                        				<br />
										</br>
                        				<button type="submit" id="remove" name="remove" value='."$pid".'>Remove</button>
                    			 </div>
                			</div>
           				</td>
           			 <td>
						<button type="submit" name="minus" value='."$pid".'>-</button>
						<input type="text" name="quantity" value='."$qty".'>
						<button type="submit" name="plus" value='."$pid".'>+</button>
					</td>
    				<td>'.$psprice.'</td>
         		</tr>
     		</table>
	 	</form>
	 </div>
	 </div>
	';
	
	//carttable($decodedimg,$row['PNAME'],$row['PQUANTITY'],$row['POPRICE'],$row['PPRICE'],$row['PID'],$row['PAVAIL']);
	$subtotal=$subtotal+$psprice;
	$itemcount=$itemcount+1;
}
if(isset($_POST['plus'])){
		$qtyid=$_POST['plus'];
		$sql="Select * from TCART where PHONE='$user' AND PID='$qtyid'";
		$query=mysql_query($sql,$link);
		while($result1=mysql_fetch_array($query)){
			$oqty1=$result1['OQUANTITY'];
			$avail=$result1['PAVAIL'];
			if($oqty1<$avail){
				$oqty1=$oqty1+1;
			}
		}
		$sql2="update TCART set OQUANTITY='$oqty1' where PID='$qtyid' AND PHONE='$user'";
		$query2=mysql_query($sql2);
		header("Location:tcustomerpage1.php");
	}
	 if(isset($_POST['minus'])){
		$qtyid=$_POST['minus'];
		$sql="Select * from TCART where PHONE='$user' AND PID='$qtyid'";
		$query=mysql_query($sql,$link);
		while($result1=mysql_fetch_array($query)){
			$oqty1=$result1['OQUANTITY'];
			if($oqty1>1){
				$oqty1=$oqty1-1;
			}else{
				$oqty1=1;
			}
			$sql2="update TCART set OQUANTITY='$oqty1' where PID='$qtyid' AND PHONE='$user'";
			$query2=mysql_query($sql2);
			 header("Location:tcustomerpage1.php");
		}
	}
if($itemcount>0){
$tax=($subtotal*5)/100;
$total=$subtotal+$tax;
$_SESSION['amount']=$total;
carttotal($subtotal,$tax,$total);
if(isset($_POST['remove'])){
	$pid=$_POST['remove'];
	$sql1="Delete from TCART where PID='$pid'";
	$result1=mysql_query($sql1,$link);
		if($result1){
			header("Location:tcustomerpage1.php");
		}
	}
}
if(isset($_POST['buy'])){
					echo'
					<form action="" method="post">
					<table class="totaltable">
						<tr>
							<td>ENTER ADDRESS</td>
							<td><input type="text" name="address"></td>
						</tr>
						<td>ENTER Pin code</td>
						<td>
							<select name="pin">
								<option value="574118">574118</option>
								<option value="576101">576101</option>
								<option value="576107">576107</option>
								<option value="576120">576120</option>
							</select><br/>
						</td>
						<tr>
							<td>ENTER PHONE NUMBER</td>
							<td><input type="text" name="phone"></td>
						</tr>
						<tr>
							<td>ENTER DATE OF DELIVERY</td>
							<td><input type="date" name="date"></td>
						</tr>
						<tr>
							<td>ENTER Payment mode</td>
							<td>
							<select name="payment">
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
					';
				}
			
				if(isset($_POST['proceedorder'])){
					$phone=$_POST['phone'];
					$address=$_POST['address'];
					$pin=$_POST['pin'];
					$date=$_POST['date'];
					$currentdate=date("Y-m-d");
					$payment=$_POST['payment'];
					if($payment=="1"){
						$paymentsts="pending";
					}
					else{
						$paymentsts="succesfull";
					}
					if($date>=$currentdate){
					$sql="Select * from TCART where PHONE='$user'";
	 				$query=mysql_query($sql);
	 				while($result=mysql_fetch_array($query)){
						$pid=$result['PID'];
						$cat1="veg";
						$flavour=$result['PNAME'];
						$pqty=$result['PQUANTITY'];
						$oqty=$result['OQUANTITY'];
						$price=$psprice;
						$status="1";
		 				$rpavail=$result['PAVAIL'];
		 				$pavail=$rpavail-1;
		 				$sql2="update TPRODUCT set PAVAIL='$pavail' where PID='$pid'";
		 				$query2=mysql_query($sql2);
						$sql3="update TSWEETS set PAVAIL='$pavail' where PID='$pid'";
		 				$query3=mysql_query($sql3);
						$sql4="update TJUICE set PAVAIL='$pavail' where PID='$pid'";
		 				$query4=mysql_query($sql4);
						$sql2="insert into TORDER(USER,PID,CATEGORY1,FLAVOUR,PQUANTITY,OQUANTITY,PRICE,PHONE,ADDRESS,PIN,DATE,STATUS,PAYMENT)values('$user','$pid','$cat1','$flavour','$pqty','$oqty','$price','$phone','$address','$pin','$date','$status','$paymentsts')";
						$query2=mysql_query($sql2);
					}
						echo '<script>alert("ORDER SUCCESSFULL...")</script>';
	
	
						$sql1="Delete from TCART where PHONE='$user'";
						$result1=mysql_query($sql1,$link);
						if($payment=="1"){
						echo '<script>alert("ORDER SUCCESSFULL")</script>';
						header("Location:urorder.php");
						}else{
					    header("Location:checkout.php?amount=".$total);
						}
					}
					else
				{
					echo '<script>alert("ENTER VALID DATE")</script>';
				}
				
				}
				
		
?>
<!--bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>