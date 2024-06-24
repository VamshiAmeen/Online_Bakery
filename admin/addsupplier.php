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
	height:180px;
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

<form class="ADD" action="" method="post">
<h2><b><center>ADD SUPPLIER</center></b></h2>
<label class="sad"> Enter Supplier name</label>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;<input class="sad" type="text" placeholder="name" name="pname"/><br />

<label class="sad"> Supplier phone number</label>
&nbsp&nbsp&nbsp;<input class="sad" type="text" placeholder="phone number" name="pphone"/><br />
<label class="sad">create password</label>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;<input class="sad" type="text" placeholder="password" name="ppassword"/><br />
<button class="submit" type="submit" name="addsupplier">submit</button>
<button class="close" type="close" name="backbtn">close</button>
</form>
</div>
<?php
if(isset($_POST['addsupplier'])){
		$name=$_POST['pname'];
		$pn=$_POST['pphone'];
		$ps=$_POST['ppassword'];
		$sql="Select * from TSUPPLIER where PPHONE='$pn'";
	    $query=mysql_query($sql);
	 $result=mysql_fetch_array($query);
	 if($result){
		   echo '<script>alert("ALREADY EXIST!!")</script>';
	 }
	 else
	 {
		 $sql1="insert into TSUPPLIER(PNAME,PPHONE,PPASSWORD)values('$name','$pn','$ps')";
		$query1=mysql_query($sql1);
		echo '<script>alert("REGISTERED SUCCESFULLY.....")</script>';
	 }	

	
}
if(isset($_POST['backbtn'])){
	  header("Location:adminhome.php");
 }
?>
</body>

</html>

