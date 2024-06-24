
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
	height:390px;
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
<?php
echo '
<div class="edit">

<form class="additem" action="" method="post">
<h2><b><center>ADD CAKE</center></b></h2>
<!--<label class="sad"> Enter product id </label>-->
<!--&nbsp&nbsp&nbsp&nbsp&nbsp;<input class="sad" type="text" placeholder="product id" name="pid"/><br /><br />-->
<label class="sad"> VEG/NONVEG</label>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;<select name="category1">
<option value="1">veg</option>
<option value="2">non-veg</option>
</select><br/><br/>



<label class="sad">Enter product name</label>
<select name="category2">
';
$sql="Select * from TADDCAKE";
$result=mysql_query($sql,$link);
while($row=mysql_fetch_array($result)){
	$flavourid=$row['PID'];
	$flavourname=$row['PFLAVOUR'];
	echo '
	<option value='."$flavourid".'>'.$flavourname.'</option>
	';
}
echo '
</select>



<!--<input class="sad" type="text" placeholder="product name" name="pname" /><br />--><br /><br/>
<label class="sad">Enter price</label>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;<input class="sad" type="text" placeholder="price" name="pprice" /><br /><br />
<label class="sad">Enter original price</label>
<input class="sad" type="text" placeholder="original price" name="poprice"/><br /><br />
<label class="sad">Enter weight </label>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;
<select name="category3">

<option value="1">0.5kg</option>
<option value="2">1kg</option>
<option value="3">1.5kg</option>
<option value="4">2kg</option>
</select><br/><br/>




<label class="sad">Available</label>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;<input  class="sad" type="text" placeholder="available number" name="pflavour" /><br /><br />
<label class="sad">Enter image url</label>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;<select name="pimg">
';
$sql="Select * from CAKEIMG";
$result=mysql_query($sql,$link);
while($row=mysql_fetch_array($result)){
	$flavour1=$row['FLAVOUR'];
	$image=($row['IMAGE']);
	echo '
	<option value='."$image".'>'.$flavour1.'</option>
	';
}
echo '
</select><br /><br />
<button class="submit" type="submit" name="addcake">submit</button>
<button class="back" type="close" name="backbtn">Back</button>
</form>
</div>
';
?>
<?php
 if(isset($_POST['addcake'])){
	 $category1=$_POST['category1'];
	 $category2=$_POST['category2'];
	 $category3=$_POST['category3'];
	 $sql1="Select PFLAVOUR FROM TADDCAKE where PID='$category2'";
	 $query1=mysql_query($sql1);
	 $result1=mysql_fetch_array($query1);
	 $flavour=$result1['PFLAVOUR'];
	 $pid="1".$category1.$category2.$category3;
	 if($category1=="1"){
		 $cat1="veg";
	 }
	 else{
		 $cat1="nonveg";
	 }
	 $pprice=$_POST['pprice'];
	 $poprice=$_POST['poprice'];
	 if($category3=="1"){
		 $quantity="0.5kg";
	 }
	 if($category3=="2"){
		 $quantity="1kg";
	 }
	 if($category3=="3"){
		 $quantity="1.5kg";
	 }
	 if($category3=="4"){
		 $quantity="2kg";
	 }
	 $pavail=$_POST['pflavour'];
	 
	 $pimg=($_POST['pimg']);
	 
	 
	 $sql="Select * from TPRODUCT where PID='$pid'";
	 $query=mysql_query($sql);
	 $result=mysql_fetch_array($query);
 if($result){
	 $rpavail=$result['PAVAIL'];
		$pavail=$pavail+$rpavail;
		$sql2="update TPRODUCT set PAVAIL='$pavail' where PID='$pid'";
		$query2=mysql_query($sql2);
		echo '<script>alert("PRODUCT ADDED..")</script>';
		 }
	else
	 {
		$status="1";
	 $sql1="insert into TPRODUCT(PID,PNAME,CATEGORY1,PPRICE,POPRICE,PQUANTITY,PAVAIL,PIMAGE,STATUS)values('$pid','$flavour','$cat1','$pprice','$poprice','$quantity','$pavail','$pimg','$status')";
		$query1=mysql_query($sql1);
		echo '<script>alert("PRODUCT ADDED SUCCESSFULLY")</script>';
	 }
    
 }
 if(isset($_POST['backbtn'])){
	  header("Location:adminhome.php");
 }
 ?>
</body>
</html>