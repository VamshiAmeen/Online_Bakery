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
	height:340px;
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

<form class="removeitem" action="" method="post">
<h2><b><center>REMOVE CAKE</center></b></h2>
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
<label class="sad">Enter quantity </label>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;
<select name="category3">
<option value="1">0.5kg</option>
<option value="2">1kg</option>
<option value="3">1.5kg</option>
<option value="4">2kg</option>
</select><br/><br/>
<label class="sad">Enter number of cakes</label>
<input class="sad" type="text" placeholder="quantity" name="pavail"?><br/>

<button class="submit" type="submit" name="removecake">submit</button>
<button class="close" type="close" name="backbtn">close</button>
</form>
</div>
';
?>



<?php
if(isset($_POST['removecake'])){
	 $category1=$_POST['category1'];
	 $category2=$_POST['category2'];
	 $category3=$_POST['category3'];
	 
	 
	 $pid="1".$category1.$category2.$category3;
	/*$sql="Select * from TPRODUCT where PID='$pid'";
	 $query=mysql_query($sql);
	 $result=mysql_fetch_array($query);
	 if($result){
			 	$sql1="Delete from TPRODUCT where PID='$pid'";
				$query1=mysql_query($sql1,$link);
				 	echo '<script>alert("Item removed successfully")</script>';
			 }
			 else{
				 echo '<script>alert("Item doesnot exist of this id")</script>';
			 }
				 
			 

if(isset($_POST['backbtn'])){
	  header("Location:adminhome.php");
 }*/
 $aqty=$_POST['pavail'];
 $sql="Select PAVAIL from TPRODUCT where PID='$pid'";
 $query=mysql_query($sql);
	 $result=mysql_fetch_array($query);
	 if($result){
		 $avail=$result['PAVAIL'];
		 if($avail>=$aqty){
			 $newavail=$avail-$aqty;
			 $sql="Update TPRODUCT  set PAVAIL='$newavail' where PID='$pid'";
			 $query=mysql_query($sql);
	 		 //$result=mysql_fetch_array($query);

				 echo '<script>alert("ITEM REMOVED SUCCESSFULLY..")</script>';
	 	}
		else {
			echo '<script>alert("ENTERED QUANTITY IS MORE THAN AVAILABLE QUANTITY!!!")</script>';
			}
	}else{
		echo '<script>alert("PRODUCT IS NOT AVAILABLE!!!")</script>';
			}
		
	}
	 if(isset($_POST['backbtn'])){
	  header("Location:adminhome.php");
 }
?>
</body>

</html>

