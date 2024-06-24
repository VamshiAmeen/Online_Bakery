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
	text-align:center;
	width:450px;
	height:250px;
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
	
?>


<div class="logo">
<img src="../logo/OIP (7).jfif"; />
</div>
<div class="content">
<h1>Online Bakery shop</h1>
<h5><i>Fresh bakes every day</i></h5>
</div>
<div class="edit">
<form action="" method="post">
<label><b><center>Customized order</center></b></label><br /><br />
	veg/nonveg
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<select name="cat1">
								<option value="veg">veg</option>
								<option value="nonveg">non veg</option>
							</select><br/>
    flavour
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="flavour" required/><br />
    Weight
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="quantity"  required/><br />
    order quantity
	<input type="text" name="oquantity" required/><br />
	<button type="submit" name="submit">BUY</button>
   </form>
   <form action="" method="post">
   <br />
    <button type="submit" name="back">Back</button>
   </form>
<?php
session_start();
if(isset($_POST['submit'])){
	$_SESSION['cat1']=$_POST['cat1'];
	$_SESSION['flavour']=$_POST['flavour'];
	$_SESSION['quantity']=$_POST['quantity'];
	$_SESSION['oquantity']=$_POST['oquantity'];
	$_SESSION['price']=$_SESSION['quantity']*$_SESSION['oquantity']*'600';
	header("Location:customize2.php");
	
}
if(isset($_POST['back'])){
			 header("Location:tcustomerpage2.php");
		}
?>	

<!--<form class="customize" action="" method="post">
<h2><b><center>CUSTOMIZE</center></b></h2>
<label class="sad"> Enter flavour </label>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;<input class="sad" type="text" placeholder="flavour" name="flavour" /><br /><br />
<label class="sad">Enter quantity</label>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;<input class="sad" type="text" placeholder="quantity in kg" name="quantity" /><br /><br />
<label class="sad">Enter number of cakes </label>
<input class="sad" type="text" placeholder="cakes" name="ncakes"/><br /><br />
<button class="submit" type="submit" name="customize">submit</button>
<button class="back" type="close" name="backbtn">Back</button>-->

</form>
</div>
</body>
</html>