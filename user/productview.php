


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

.orders{
	position:relative;
	top:5px;
	right:500px;
	width:20px;
	height:40px;
}
ul li a{
	text-decoration:none;
	color:#fff;
	padding:5px 20px;
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
.logo{
	width:7%;
	height:7%;
}

</style>
<title>Online bakery</title>
<!--bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<!--font awesome link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<script type="text/javascript">
function getKey(){
	return document.getElementById("sea").text;
}
</script>

<body>
<!--navbar-->
<?php
echo '
<nav class="navbar navbar-expand-lg navbar-light bg-light">

<img src="../logo/OIP (7).jfif" alt="" class="logo" />
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label=
  "Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="customerhome.php">Home <span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="tcustomerpage2.php">CAKES <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="customize.php">Customize your order 
        </a>
      </li>
	   <li class="nav-item">
        <a class="nav-link" href="urorder.php">My Orders 
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tcustomerpage1.php"> <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
      </li>
     
      <ul>
    <form class="form-inline my-2 my-lg-0" method="post" action="">
     <input class="form-control mr-sm-2" name="searchbar" id="sea" type="text" placeholder="Search"/> 
     <!-- <input for="sea" class="fa fa-search" type="submit" value="search" name="submit" />-->
     <button type="submit" name="search">search</button>
    
    </form>
  </div>
</nav>

<div class="container p=0">
</div>
';
?>





<!--bootstap js link-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html>