<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Side Navigation Bar</title>
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".hamburger").click(function(){
			  $(".wrapper").toggleClass("active")
			})
		});
	</script>
</head>
<body>

<div class="wrapper">

	<div class="top_navbar">
		<div class="logo">
			<a href="index.html">SECRET SHOP</a>
		</div>
		<div class="top_menu">
			<div class="home_link">
				<a href="#">
					<span class="icon"><i class="fas fa-home"></i></span>
					<span>Home</span>
				</a>
			</div>
			<div class="right_info">
				<div class="icon_wrap">
					<div class="icon">
						<i class="fas fa-bell"></i>
					</div>
				</div>
				<div class="icon_wrap">
					<div class="icon">
						<i class="fas fa-cog"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="main_body">
		
		<div class="sidebar_menu">
	        <div class="inner__sidebar_menu">
	        	
	        	<ul>
		          <li>
		            <a href="index.html"  >
		              <span class="icon">
		              <span class="list">Brands</span>
		            </a>
		          </li>
		          <li>
		            <a href="collection.html">
		              <span class="list">Collections</span>
		            </a>
		          </li>
		          <li>
		            <a href="sign.html" >
		             
		              <span class="list">Sign In</span>
		            </a>
		          </li>
		          <li>
		            <a href="cart.html" class="active">
		              <span class="list">My Cart</span>
		            </a>
		          </li>
		         
		        </ul>

		        <div class="hamburger">
			        <div class="inner_hamburger">
			            <span class="arrow">
			                <i class="fas fa-long-arrow-alt-left"></i>
			                <i class="fas fa-long-arrow-alt-right"></i>
			            </span>
			        </div>
			    </div>

	        </div>
	    </div>

	    <div class="container">
	    	<div class="item_wrap">
	    		<div class="item">
	    			<div class="gallery1">
					<?php

include("../Final_SecretShop/partials/connection.php");
if(empty($_SESSION['cart'])){
      echo"<h1>There are no items in Cart</h>";
}
else{
// var_dump($_SESSION['cart']);
echo '<form method="POST" action ="SaveBill.php">
<table class = "ordertables">
<tr>
<th>Item ID</th>
<th>Item Name</th>
<th>Quantity</th>
<th>Price</th>
<th>Amount</th>
<th>Action</th>
</tr>';
$i=1;
$tt=explode(",", substr($_SESSION['cart'],1));
foreach ($tt as $item)
{
$qry="select * from foodlist where foodid=$item";
$run=mysqli_query($con,$qry);
while ($rows=mysqli_fetch_array($run))
{
      if ($i%2==0)
      {
            echo "<tr><td>";
      }
      else
      {      
            echo "<tr><td>";
      }
      $i++;      
      echo $rows["foodid"];
      echo "</td>";
      echo "<td>";
      echo $rows["foodname"];
      echo "</td>";
      echo "<td>";
      echo '<input type="number" name="Quantity[]" value="1" size=5 style="text-align: center;"';
      echo "</td>";
      echo "<td>";
      echo '<input readonly type="number" name="price[]" value="'. $rows["price"].'" size=5 style="text-align: center;" disabled';
      echo "</td>";
      echo "<td>";
      echo $rows["price"];
      echo "</td>";
      $ItemID=$rows["foodid"];
      echo "<td><a href='removeitem.php?key=$ItemID' class = 'modlink'>DELETE</a></td>";
       
}
}      
}
?>
</table>
<br><br>
<center>
<input type="submit" class="icon" Value="Place Order"></button>
</center>
</form>
  				</div>
	    		</div>
	    		
	    	</div>
	    	
	    </div>
	</div>
</div>
	

</body>
</html>