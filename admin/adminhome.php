<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,Initial-scale=1.0">
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

.asuppliers{
	position:relative;
	top:-30px;
	right:5px;
	width:250px;
	height:40px;
}
.orders{
	position:relative;
	top:5px;
	right:300px;
	width:20px;
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

	
</style>
<title>Online bakery</title>
</head>

<body>

<div class="main">
	<div class="logo">
		<img src="../logo/OIP (7).jfif";
	</div>
	<div class="optionS">
	<ul>
		<li class="aitems"><a href="orderplaced.php"> Ordered Products</a></li>
		<li class="asuppliers"><a href="ready.php"> Ready Prducts</a></li>
		<li class="aitems"><a href="orders.php"> Orders</a></li>
		<li class="asuppliers"><a href="corder.php"> Customized Orders</a></li>
		<li class="aitems"><a href="addcake.php"> Add Cakes</a></li>
		<li class="asuppliers"><a href="removecake.php">Remove Cakes</a></li>
		<li class="aitems"><a href="addsweets.php">Add Sweets</a></li>
		<li class="asuppliers"><a href="removesweets.php"> Remove Sweets</a></li>
		<li class="aitems"><a href="addjuice.php">Add Juice</a></li>
		<li class="asuppliers"><a href="removejuice.php">Remove Juice</a></li>
		<li class="aitems"><a href="addsupplier.php">Add Suppliers</a></li>
		<li class="asuppliers"><a href="removesupplier.php">Remove Suppliers</a></li>
		<li class="aitems"><a href="addnewflavour.php">New Cake Flavour</a></li>
		<li class="asuppliers"><a href="cakeimg.php"> New Cake Image</a></li>
		<li class="aitems"><a href="addnewjuice.php">New Juice Flavour</a></li>
		<li class="asuppliers"><a href="juiceimg.php">New Juice Image</a></li>
		<li class="aitems"><a href="addnewsweets.php">New Sweets</a></li>
		<li class="asuppliers"><a href="sweetimg.php">New Sweets Image</a></li>
	</ul>
    </div>
</div>
<div class="content">
<h1>Online Bakery shop</h1>
<h5><i>Fresh bakes every day</i></h5>
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
	?>
<?php
echo '
<form action="" method="post">
	<table border="1px">
		<tr>
    		<th>Product Id</th>
    		<th>Product Name</th>
			<th>Veg/Non-veg</th>
    		<th>Product Price</th>
    		<th>Product Weight(in kg)</th>
			<th>Product Available</th>
			<th>Status</th>
    	</tr>
		';
		$sql="Select * from TPRODUCT where PAVAIL<4 AND STATUS=1";
		$result=mysql_query($sql,$link);
		while($row=mysql_fetch_array($result)){
			$pid=$row['PID'];
			$pname=$row['PNAME'];
			$cat1=$row['CATEGORY1'];
			$pprice=$row['PPRICE'];
			$pquantity=$row['PQUANTITY'];
			$pavail=$row['PAVAIL'];
			$status=$row['STATUS'];
			
				$statustxt="order to supplier";
			
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
		$sql="Select * from TSWEETS where PAVAIL<4 AND STATUS=1";
		$result=mysql_query($sql,$link);
		while($row=mysql_fetch_array($result)){
			$pid=$row['PID'];
			$pname=$row['PNAME'];
			$pprice=$row['PPRICE'];
			$pquantity=$row['PQUANTITY'];
			$pavail=$row['PAVAIL'];
			$status=$row['STATUS'];
			
				$statustxt="order to supplier";
			
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
		$sql="Select * from TJUICE where PAVAIL<4 AND STATUS=1";
		$result=mysql_query($sql,$link);
		while($row=mysql_fetch_array($result)){
			$pid=$row['PID'];
			$pname=$row['PNAME'];
			$pprice=$row['PPRICE'];
			$pquantity=$row['PQUANTITY'];
			$pavail=$row['PAVAIL'];
			$status=$row['STATUS'];
		
				$statustxt="order to supplier";
			
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
		$sql3="Select * from TPRODUCT where PID='$pid1' AND STATUS=1";
		$query3=mysql_query($sql3,$link);
		$result3=mysql_fetch_array($query3);
		$status1=$result3['STATUS'];
		$pavail1=$result3['PAVAIL'];
		if($status1=="1"){
			$sql1="Select * from TPRODUCT where PID='$pid1' AND STATUS=1"; 
			$result1=mysql_query($sql1,$link);
			while($row1=mysql_fetch_array($result1)){
				$pid1=$row1['PID'];
				$flavour1=$row1['PNAME'];
				$cat=$row1['CATEGORY1'];
				$qty1=$row1['PQUANTITY'];
				$avail=$row1['PAVAIL'];
				$oqty="4"-$avail;
				$status1="1";
				$sql2="insert into SUPPLIERORDER(CAT,PID,FLAVOUR,PQUANTITY,OQUANTITY,STATUS)values('$cat','$pid1','$flavour1','$qty1','$oqty','$status1')";
				$query2=mysql_query($sql2);
				if($query2){
					echo '<script>alert("ORDER SUCCESSFULL...!!")</script>';
				}
			}
			$sql2="update TPRODUCT set STATUS='2' where PID='$pid1'";
			$query2=mysql_query($sql2);
			header("Location:adminhome.php");
		}
	}
	
	
	if(isset($_POST['status'])){
		$pid1=$_POST['status'];
		$sql3="Select * from TSWEETS where PID='$pid1' AND STATUS=1";
		$query3=mysql_query($sql3,$link);
		$result3=mysql_fetch_array($query3);
		$status1=$result3['STATUS'];
		$pavail1=$result3['PAVAIL'];
		if($status1=="1"){
			$sql1="Select * from TSWEETS where PID='$pid1' AND STATUS=1"; 
			$result1=mysql_query($sql1,$link);
			while($row1=mysql_fetch_array($result1)){
				$pid1=$row1['PID'];
				$flavour1=$row1['PNAME'];
				$qty1=$row1['PQUANTITY'];
				$avail=$row1['PAVAIL'];
				$oqty="4"-$avail;
				$status1="1";
				$cat="";
				$sql2="insert into SUPPLIERORDER(CAT,PID,FLAVOUR,PQUANTITY,OQUANTITY,STATUS)values('$cat','$pid1','$flavour1','$qty1','$oqty','$status1')";
				$query2=mysql_query($sql2);
				if($query2){
					echo '<script>alert("ORDER SUCCESSFULL..!!")</script>';
				}
			}
			$sql2="update TSWEETS set STATUS='2' where PID='$pid1'";
			$query2=mysql_query($sql2);
			header("Location:adminhome.php");
		}
		
	}
	
	if(isset($_POST['status'])){
		$pid1=$_POST['status'];
		$sql3="Select * from TJUICE where PID='$pid1' AND STATUS=1";
		$query3=mysql_query($sql3,$link);
		$result3=mysql_fetch_array($query3);
		$status1=$result3['STATUS'];
		$pavail1=$result3['PAVAIL'];
		if($status1=="1"){
			$sql1="Select * from TJUICE where PID='$pid1' AND STATUS=1"; 
			$result1=mysql_query($sql1,$link);
			while($row1=mysql_fetch_array($result1)){
				$pid1=$row1['PID'];
				$flavour1=$row1['PNAME'];
				$qty1=$row1['PQUANTITY'];
				$avail=$row1['PAVAIL'];
				$oqty="4"-$avail;
				$status1="1";
				$cat="";
				$sql2="insert into SUPPLIERORDER(CAT,PID,FLAVOUR,PQUANTITY,OQUANTITY,STATUS)values('$cat','$pid1','$flavour1','$qty1','$oqty','$status1')";
				$query2=mysql_query($sql2);
				if($query2){
					echo '<script>alert("ORDER SUCCESSFULL..!!")</script>';
				}
			}
			$sql2="update TJUICE set STATUS='2' where PID='$pid1'";
			$query2=mysql_query($sql2);
			header("Location:adminhome.php");
		}
	}
?>

</body>
</html>