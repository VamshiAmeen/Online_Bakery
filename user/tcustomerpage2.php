<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<!--bootstrap-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<!--font awesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>

img{
	max-width:100%;
	height:auto;
	background:#0CF;
	background:radial-gradient(white 30%,lightblue 70%);                 
}

.fa-star,.fa-start-half{
	color:yellowgreen;
	padding:3% 0%;
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
?>
<?php
require_once('productview.php');
require_once('tcustomerpage2_1.php');
session_start();
?>
<div class="container">
	<div class="row text-center py-3 px-3">
		<?php
		if(isset($_POST['search'])){
	$search=$_POST['searchbar'];
    $sql="Select * from TPRODUCT where PNAME like '%$search%' OR CATEGORY1 like '%$search%'";
				$result=mysql_query($sql,$link);
				if(mysql_fetch_array($result)>0){
				while($row=mysql_fetch_array($result)){
					$decodedimg=urldecode($row['PIMAGE']);
					component($row['PNAME'],$row['PPRICE'],$row['POPRICE'],$decodedimg,$row['PID'],$row['PAVAIL'],$row['PQUANTITY'],$row['CATEGORY1']);
					
				}
				}else{
                 //echo '<script>alert("does not exist")</script';
				 header("Location:doesnot.php");
				}
			}
			else{
				$user=$_SESSION['user'];
				$sql="Select * from TPRODUCT where PAVAIL>0";
				$result=mysql_query($sql,$link);
				while($row=mysql_fetch_array($result)){
					$decodedimg=urldecode($row['PIMAGE']);
					component($row['PNAME'],$row['PPRICE'],$row['POPRICE'],$decodedimg,$row['PID'],$row['PAVAIL'],$row['PQUANTITY'],$row['CATEGORY1']);
				}
				if(isset($_POST['add'])){
					$pid=$_POST['add'];
					$sql3="Select * from TCART where PID='$pid' AND PHONE='$user'";
					$query3=mysql_query($sql3);
					$result3=mysql_fetch_array($query3);
					if($result3){
							echo '<script>alert("PRODUCT ALREADY EXIST IN CART!!1")</script>';
					}
					else
					{
						$sql1="Select * from TPRODUCT where PID='$pid'";
						$result1=mysql_query($sql1,$link);
							while($row1=mysql_fetch_array($result1)){
							$pname=$row1['PNAME'];
							$pprice=$row1['PPRICE'];
							$poprice=$row1['POPRICE'];
							$pavail=$row1['PAVAIL'];
							$pquantity=$row1['PQUANTITY'];
							$pimg=urlencode($row1['PIMAGE']);
							$oqty="1";
							$sql2="insert into TCART(PHONE,PID,PNAME,PPRICE,POPRICE,PAVAIL,PQUANTITY,OQUANTITY,PIMG)values('$user','$pid','$pname','$pprice','$poprice','$pavail','$pquantity','$oqty','$pimg')";
							$query2=mysql_query($sql2,$link);
							if($query2>0){
			 					echo '<script>alert("ADDED TO CART")</script>';
							}
							else{
								echo '<script>alert("PLEASE TRY AGAIN")</script>';
							}
						}
					}
				}	
}
				
?>
<?php

?>
        
    </div>
</div>






<!--bootstap js link-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>