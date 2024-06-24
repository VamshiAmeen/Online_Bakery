<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>


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
.home{
	position:relative;
	top:20px;
	right:400px;
	width:20px;
	height:40px;
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


	.adminlogin-box{
		width:300px;
		height:300px;
		background-color:#C96;
		border-radius:30px;
		top:200px;
		left:500px;
		position:relative;
	}
	.login-heading{
		width:100%;
		height:50px;
		background-color:#960;
		
		position:relative;
		top:20px;
		}
	.headlbl{
	position:relative;
	right:-6%;
	top:40%	
		}
	.adminlogin-group{
		padding:40px 40px;
		top:10px;
		position:relative;
	}
	.input-info{
		padding:5px 20px;
	}
	.login-btn{
		position:relative;
		top:20px;
		background-color:#960;
		border-radius:30px;
		width:100px;
		height:30px;
		font-size:14px;
	}
	.close-btn{
		position:relative;
		left:20px;
		top:20px;
		background-color:#960;
		border-radius:30px;
		width:100px;
		height:30px;
		font-size:16px;
	}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

<div class="adminlogin-box">

<div class="login-heading">
    <label class="headlbl">LOGIN</label>
    </div>
<form id="login" class="adminlogin-group" action="" method="post">
	
    Enter phone number<br />
    <input type="text" class="input-info" placeholder="phone number" name="loginphone" required />
    <br /><br />
    Enter password<br />
    <input type="text" class="input-info" placeholder="password" name="loginpassword" required />
    </br>
    <br />
    <button type="submit" class="login-btn" name="login" value="login">LOG IN</button>
    <button type="button" class="close-btn" name="closebtn" value="closebtn">Close</button>
    </form>
</div>



<?php
 if(isset($_POST['login'])){
	 $pn=$_POST['loginphone'];
	 $sql="Select * from TADMIN where APHONE='$pn'";
	 $query=mysql_query($sql);
	 $result=mysql_fetch_array($query);
	 if($result){
		 $sql1="select APASSWORD FROM TADMIN where APHONE='$pn'";
		 $query1=mysql_query($sql1);
		 $result1=mysql_fetch_array($query1);
		 $password=$_POST["loginpassword"];
		 if($result1["APASSWORD"]==$password){
			$phoneno=$_POST['loginphone'];
			 header("Location:adminhome.php");
		 }
			else{
			 	echo '<script>alert("WRONG PASSWORD..")</script>';
			}
	 	}
	 	else
	 	{
		 echo '<script>alert("ENTER PROPER PHONE NUMBER")</script>';
		 }
	 }
?>
</body>
</html>