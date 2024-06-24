<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<style>

body{
	background-image:url(../77.jpg);
	background-position:center;
	background-size:cover;
	width:100%;
	height:100vh;
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

	.login-box{
		top:150px;
		right:-350px;
		width:600px;
		height:550px;
		position:relative;
		background-color:#C96;
		padding:5px;
		overflow:hidden;
		border-radius:30px;
	}
	.botton-box{
		width:500px;
		margin:10px 160px;
		position:relative;
		
	}
	.toggle-btn{
		padding: 20px 30px;
		cursor:pointer;
		background:transparent;
		border:0;
		outline:none;
		position:relative;
		font-size:30px;
	}
	#btn-list{
		position:absolute;
		width:160px;
		height:100%;
		background:#960;
		border-radius:50px;
		transition:.5s;
	}
	.input-group{
		top:100px;
		width:500px;
		position:absolute;
		transition:.5s;
		font-size:25px;
	}
	.input-info{
		width:100%;
		height:30px;
		padding:10px 0;
		margin:5px 0;
		background::transparent;
	}
	.submit-btn{
		width:40%;
		padding:10px 30px;
		cursor:pointer;
		margin:auto;
		background-color:#960;
		border-radius:30px;
		top:40px;
		position:relative;
	}
	.close-btn{
		width:40%;
		padding:10px 30px;
		cursor:pointer;
		margin:auto;
		background-color:#960;
		border-radius:30px;
		left:50px;
		top:40px;
		position:relative;
	}
	.reset-btn{
		width:40%;
		padding:10px 30px;
		cursor:pointer;
		margin:auto;
		background-color:#960;
		border-radius:30px;
	}
	#login{
		left:25px;
		alignment-adjust:middle;
	}
	#register{
		left:1050px;
	}
	#forgotpass{
		left:450px;
	}
	#forgot-pass{
		background:transparent;
		border-radius:20px;
		top:220px;
		left:400px;
		position:relative;
		transition:.5s;
	}
	.register-btn{
		width:40%;
		padding:10px 30px;
		cursor:pointer;
		margin:auto;
		background-color:#960;
		border-radius:30px;
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




	<div class="login-box">
    <div class="botton-box">
    <div id="btn-list"></div>

    <button type="button" class="toggle-btn" onclick="login()">LOG IN</button>
    <button type="button" class="toggle-btn" onclick="register()" id="registerbtn">Register</button>
    </div>
	<form id="login" class="input-group" action="" method="post">
    Enter phone number<br />
    <input type="text" class="input-info" placeholder="phone number" name="loginphone" required />
    <br /><br />
    Enter password<br />
    <input type="password" class="input-info" placeholder="password" name="loginpassword" required />
     
    <button type="submit" class="submit-btn" name="login-btn" value="login">LOG IN</button>
    <button type="button" class="close-btn" name="closebtn" value="closebtn">Close</button>
    </form>
    <form action="" method="post">
     <button type="submit" id="forgot-pass" name="forgot-pass" value="forgot-pass">forgot password</button><br /><br />
    </form>
  
   
    
    <form id="register" class="input-group" action="" method="post">
    Enter name<br />
    <input type="text" class="input-info" placeholder="enter your name" name="registername" required/>
    Enter phone number<br />
    <input type="text" class="input-info" placeholder="phone number" name="registerphone" required />
    Enter password<br />
    <input type="password" class="input-info" placeholder="password" name="registerpassword" required /><br />
    Enter your favourite teacher name<br />
     <input type="text" class="input-info" name="security" required /><br />
    <button type="submit" class="register-btn" name="register-btn" value="register">Register</button>
    <button type="reset" class="reset-btn">Reset</button>
    </form>
 
    
    </div>


 <?php
 session_start();
 
 if(isset($_POST['login-btn'])){
	 $pn=$_POST['loginphone'];
	 $_SESSION['user']=$pn;
	 $sql="Select * from TCUSTOMER where PHONE='$pn'";
	 $query=mysql_query($sql);
	 $result=mysql_fetch_array($query);
	 if($result){
		 $sql1="select PASSWORD FROM TCUSTOMER where PHONE='$pn'";
		 $query1=mysql_query($sql1);
		 $result1=mysql_fetch_array($query1);
		 $password=$_POST["loginpassword"];
		 if($result1["PASSWORD"]==$password){
			 header("Location:customerhome.php");
		 }
			else{
			 	echo '<script>alert("WRONG PASSWORD..")</script>';
			}
	 	}
	 	else
	 	{
		 echo '<script>alert("PLEASE REGISTER..")</script>';
		 }
	 }
	if(isset($_POST['register-btn'])){
		$pnpattern='/^\d{10}$/';
		$pn=$_POST['registerphone'];
		$namepattern='/^[a-zA-Z_]{3,20}$/';
		$name=$_POST['registername'];
		$passpattern='/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/';
		$ps=$_POST['registerpassword'];
		if(preg_match($pnpattern,$pn)){
			if(preg_match($namepattern,$name)){
				if(preg_match($passpattern,$ps)){
				
					$name=$_POST['registername'];
					$pn=$_POST['registerphone'];
					$ps=$_POST['registerpassword'];
					$security=$_POST['security'];
					$sql="Select * from TCUSTOMER where PHONE='$pn'";
	   				$query=mysql_query($sql);
	 				$result=mysql_fetch_array($query);
	 				if($result){
		  				echo '<script>alert("ALREADY EXIST..")</script>';
	 				}
	 				else
	 				{
		 				$sql1="insert into TCUSTOMER(NAME,PHONE,PASSWORD,SECURITY)values('$name','$pn','$ps','$security')";
						$query1=mysql_query($sql1);
						echo '<script>alert("REGISTERED SUCCESSFULLY..")</script>';
	 				}
				}
				else{
					echo '<script>alert("PASSWORD SHOULD BE OF ATLEAST 8 CHARACTERS WITH ONE SPECIAL CHARACTER")</script>';
				}
			}
			else{
				echo '<script>alert("INALID USERNAME")</script>';
			}
		}
		else{
			echo '<script>alert("INVALID PHONE NUMBER..")</script>';
		}
		
	
	}
if(isset($_POST['forgot-pass'])){
	header("Location:forgotpass.php");
}
 ?>
</body>
<script>
	var x=document.getElementById("login");
	var y=document.getElementById("register");
	var z=document.getElementById("btn-list");
	var f=document.getElementById("forgot-pass");
	
	function register(){
		x.style.left="-600px";
		y.style.left="25px";
		z.style.left="160px";
		f.style.left="-300px";
	}
	
	function login(){
		x.style.left="25px";
		y.style.left="1025px";
		z.style.left="0";
		f.style.left="400px";
		
	}
	
	
</script>
</html>