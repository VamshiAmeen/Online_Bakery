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
	width:350px;
	height:200px;
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
<div class="logo">
<img src="../logo/OIP (7).jfif"; />
</div>
<div class="content">
<h1>Online Bakery shop</h1>
<h5><i>Fresh bakes every day</i></h5>
</div>
<div class="edit">
<form action="" method="post">
<h2><b><center>ADD SWEET IMAGE</center></b></h2><br />
<label class="sad">Enter flavour</label>
<input type="text"  placeholder="flavour"name="flavour" /><br /><br />
<label class="sad">Enter URL</label>
<input type="text"  placeholder="image url"name="image" /><br /><br />
<button type="submit" name="submit">submit</button>
<button class="back" type="close" name="backbtn">Back</button>
</form></div>
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
if(isset($_POST['submit'])){
	$flavour=$_POST['flavour'];
	$image=urlencode($_POST['image']);
		$sql2="insert into SWEETIMG(FLAVOUR,IMAGE)values('$flavour','$image')";
		$resul2t=mysql_query($sql2);
		if($resul2t){
			echo '<script>alert("image added")</script>';
		}
		else
		{
			echo '<script>alert("retry")</script>';
		}		
}
if(isset($_POST['backbtn'])){
	  header("Location:adminhome.php");
 }

?>


</body>
</html>