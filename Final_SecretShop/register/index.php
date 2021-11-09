<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Side Navigation Bar</title>
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <?php include ('../partials/connection.php')?>
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
				<a href="index.html">
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
		            <a href="index.html"  class="active">
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
		            <a href="cart.html">
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




            <?php
                $sql = "SELECT * FROM brand where active = 'Yes' and featured = 'Yes' limit 6";
                $res1 = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res1);
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res1))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        ?>

			<div class="food-menu-box">
                            <div class="food-menu-desc">
                                <br>
                                  <h2><?php echo $title?></h2>
								  <img src="<?php echo $row['images_name']; ?>" height="500" width="600">
                                <br>
                                <a href="<?php echo SITEURL1;?>order.php? food_id=<?php echo $id1?>" class="btn btn-primary"></a>
                        </div><br><br>
                </div>

                        <?php
                    }
                }
                else
                { 
                    echo "<div class='error'>Category not Found.</div>";
                }
            ?>
			 <div class="clearfix"></div>

	    	</div>
	    	<div class="item_wrap">
	    		<div class="item">
	    			<div class="gallery1">
  					<a  href="dailygrind.html">
  					  <img src="C:\xampp\htdocs\WEBPROG\Hatdog\images\daily.png" alt="Cinque Terre" width="500" height="600">
  					</a>
  				</div>
	    		</div>
	    		<div class="item">
	    			<div class="gallery1">
  					<a  href="enimal.html">
  					  <img src="C:\xampp\htdocs\WEBPROG\Hatdog\images\enimal.png" alt="Cinque Terre" width="500" height="600">
  					</a>
				</div></div>
	    	</div>
	    	<div class="item_wrap">
	    		<div class="item"><div class="gallery1">
  					<a  href="dbtk.html">
  					  <img src="C:\xampp\htdocs\WEBPROG\Hatdog\images\dbtk.png" alt="Cinque Terre" width="500" height="500">
  					</a>
				</div></div>
	    		<div class="item"><div class="gallery1">
  					<a href="payaman.html">
  					  <img src="C:\xampp\htdocs\WEBPROG\Hatdog\images\tp.png" alt="Cinque Terre" width="500" height="500">
  					</a>
				</div></div>
	    	</div>
	    	<div class="item_wrap">
	    		<div class="item"><div class="gallery1">
  					<a  href="bucket.html">
  					  <img src="C:\xampp\htdocs\WEBPROG\Hatdog\images\bs.png" alt="Cinque Terre" width="500" height="500">
  					</a>
				</div></div>
	    		<div class="item"><div class="gallery1">
  					<a href="sumptuous.html">
  					  <img src="C:\xampp\htdocs\WEBPROG\Hatdog\images\sumptuous.png" alt="Cinque Terre" width="500" height="500">
  					</a>
				</div></div>
	    	</div>
	    	
	    </div>
	</div>
</div>

</body>
</html>