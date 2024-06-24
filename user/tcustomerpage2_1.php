<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	function component($productname,$productprice,$productoprice,$productimg,$productid,$productavail,$productquantity,$cat1){
		echo '
		
		<div class="col-md-3 col-sm-6 my-2 my-md-0">
        	<form action="" method="post">
            	<div class="card shadow">
                	<div>
                    	<img src='."$productimg".' alt="image1"  class="img-fluid card-img-top" />
                     </div>
                     <div class="card-body">
                     	<h5 class="card-title">'.$productname.'</h5>
						
						<h7></h7>
                     	<h6>
                     		<i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                     	 </h6>
                         <p class="card-text">
						 quantity:'.$productquantity.'
                          </p>
						  <p class="card-text">
						 '.$cat1.'  cake
                          </p>
                          <h5>
                         	 <small><s>Rs.'.$productoprice.'</s></small>
                         	 <span class="price">Rs.
                          		'.$productprice.'
                        	  </span>
                          </h5>
                          <button type="submit" name="add" value='."$productid".' class="btn btn-warning my-3">
                          	ADD to Cart
                            <i class="fas fa-shopping-cart">
                            </i>
                           </button>
						   <br>
						   <h7><small><i>Cakes are delicious desserts made from a combination of common ingredients.They typically consist of flour,sugar,butter or oil,a leaving agent such as baking powder or baking powder or baking soda, and flavourings.</i></small></h7>
                       </div>  
                </div>
            </form>
        </div>
		';
	}
		
	
	
	function carttable($pimg,$pname,$pquantity,$poprice,$pprice,$pid,$pavail){
		echo'
		<div class="small-container cart-page">
		<form action="" method="post">
		<table class="cart-table">
         <tr>
    		<td>
            	<div class="cart-info">
            		<img src='."$pimg".' />
                    <div>
                    	<p>'.$pname.'</p>
						<p>quantity:'.$pquantity.'</p>
						<small><s>'.$poprice.'</s></small>
                        <small>'.$pprice.'</small>
                        <br />
						</br>
                        <button type="submit" id="remove" name="remove" value='."$pid".'>Remove</button>
                     </div>
                </div>
            </td>
            <td><input type="number" value="1" max='."$pavail".' min="1" name="quantity" /></td>
    		<td>'.$pprice.'</td>
         </tr>
     </table>
	 </form>
	 </div>
	 </div>
		';
	}
	function carttotal($subtotal,$tax,$total){
		echo'
		<div class="small-container cart-page">
		 <div class="total-price">
		 <form action="" method="post">
     	<table>
        	<tr>
            	<td>Sub Total</td>
                <td>'.$subtotal.'</td>
              </tr>
              <tr>
            	<td>tax</td>
                <td>'.$tax.'</td>
              </tr>
				<tr>
            	<td>delivery charge</td>
                <td>free</td>
              </tr>
              <tr>
            	<td>total</td>
                <td>'.$total.'</td>
              </tr>
			  <tr>
			  	<td><button type="submit" class="buy" name="buy">BUY</td>
			  </tr>
		</table>
		</form>
 </div>
 ';
	}
	
function stockdetails($pid,$pname,$pprice,$pquantity,$pavail){
	echo '
	<table>
    <tr>
    	<td>'.$pid.'</td>
        <td>'.$pname.'</td>
        <td>'.$pprice.'</td>
        <td>'.$pquantity.'</td>
        <td>'.$pavail.'</td>
    </tr>
    
</table>
';
}

 ?>
</body>
</html>