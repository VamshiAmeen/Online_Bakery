<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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




<div class="adminlogin-box">
<div class="login-heading">
    <label class="headlbl">LOGIN</label>
    </div>
<form id="login" class="adminlogin-group" action="" method="post">
	
     Enter product id<br />
    <input type="text" class="input-info" placeholder="password" name="pid" required />
    </br>
    <br />
    Enter product name<br />
    <input type="text" class="input-info" placeholder="product name" name="pname" required />
    <br /><br />
    Enter price<br />
    <input type="text" class="input-info" placeholder="password" name="pprice" required />
    </br>
    <br />
    Enter riginal price<br />
    <input type="text" class="input-info" placeholder="phone number" name="poprice" required />
    <br /><br />
    Enter quantity<br />
    <input type="text" class="input-info" placeholder="phone number" name="pquantity" required />
    <br /><br />
    Enter flavour<br />
    <input type="text" class="input-info" placeholder="phone number" name="pflavour" required />
    <br /><br />
    Enter imgeurl<br />
    <input type="text" class="input-info" placeholder="phone number" name="pimg" required />
    <br /><br />
    <button type="submit" class="login-btn" name="login" value="login">submit</button>
    <button type="button" class="close-btn" name="closebtn" value="closebtn">Close</button>
    </form>
</div>

<?php
 if(isset($_POST['login'])){
	 $pname=$_POST['pname'];
	 $pprice=$_POST['pprice'];
	 $poprice=$_POST['poprice'];
	 $pquantity=$_POST['pquantity'];
	 $pavail=$_POST['pflavour'];
	  $pid=$_POST['pid'];
	 $pimg=urlencode($_POST['pimg']);
	 $sql="Select * from TPRODUCT where PID='$pid'";
	 $query=mysql_query($sql);
	 $result=mysql_fetch_array($query);
	 if($result){
		 $rpavail=$result['PAVAIL'];
		 $pavail=$pavail+$rpavail;
		 $sql2="update TPRODUCT set PAVAIL='$pavail' where PID='$pid'";
		 $query2=mysql_query($sql2);
		 echo '<script>alert("product added")</script>';
		 
	 }
	 else
	 {
	 $sql1="insert into TPRODUCT(PID,PNAME,PPRICE,POPRICE,PQUANTITY,PAVAIL,PIMAGE)values('$pid','$pname','$pprice','$poprice','$pquantity','$pavail','$pimg')";
		$query1=mysql_query($sql1);
		echo '<script>alert("product added")</script>';
	 }
 }
 ?>
</body>
</html>
