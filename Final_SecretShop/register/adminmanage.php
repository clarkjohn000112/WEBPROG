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
				<div>
					<div class="home_link">
						<a href="adminLogout.php">
							<span class="icon"></span>
							<span>Log-out Admin Account</span>
						</a>
						
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
		            <a href="adminmanage.php"  class="active">
		              <span class="icon">
		              <span class="list">Admin</span>
		            </a>
		          </li>
		          <li>
		            <a href="brandmanage.php">
		              <span class="list">Brands</span>
		            </a>
		          </li>
		          
		          <li>
		            <a href="itemmanage.php">
		              <span class="list">Items</span>
		            </a>
		          </li>

                  <li>
		            <a href="ordermanage.php" >
		             
		              <span class="list">Order</span>
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
<br>
	    <div class="container">
        <?php include ('../partials/connection.php')?>
<link rel="stylesheet" type="text/css" href="../style.css ?v=<?php echo time(); ?>">


        <div class="container">

        <h1>ADMIN MANAGEMENT</h1><br><br><br>
       
       <?php 
       
	 		if(isset($_SESSION['update-success'])) {
                echo "<span  class='msg'>" .$_SESSION['update-success']. "</span>";
				 unset($_SESSION['update-success']);
			 } 
           
            if(isset($_SESSION['add-success'])) {
                echo "<span  class='msg'>" .$_SESSION['add-success']. "</span>";
                unset($_SESSION['add-success']);
            } 
         
            if(isset($_SESSION['delete-success'])) {
                echo "<span  class='msg'>" .$_SESSION['delete-success']. "</span>";
                unset($_SESSION['delete-success']);
            } 
            
            if(isset($_SESSION['update-failed'])) {
                echo "<span  class='msg1'>" .$_SESSION['update-failed']. "</span>";
                unset($_SESSION['update-failed']);
            }
           
            if(isset($_SESSION['add-failed'])) {
                echo "<span  class='msg1'>" .$_SESSION['add-failed']. "</span>";
               unset($_SESSION['add-failed']);
           }  
           
            if(isset($_SESSION['delete-failed'])) {
                echo "<span  class='msg1'>" .$_SESSION['delete-failed']. "</span>";
               unset($_SESSION['delete-failed']);
           } 
	   ?>
  
      
        <br><br><br><br>
        <a href="adminadd.php" class="btn-primary">ADD ADMIN</a><br><br><br><br>
        <div style="overflow-x:auto;">
			<table>
				<tr>
					<th>Admin ID</th>
					<th>Full Name</th>
					<th>Username</th>
					<th>Actions</th>
				</tr>
				<?php 
					$sql = "SELECT * FROM admin";
					$res=mysqli_query($conn, $sql);

					if($res==TRUE)
					{
							$count = mysqli_num_rows($res);
							$yow =1;
							if($count>0){
								while($rows=mysqli_fetch_assoc($res)){
									$id=$rows['id'];
									$name=$rows['name'];
									$username=$rows['username'];
								?>
								 <tr>
					<th><?php echo $yow++;?></th>
					<td><?php echo $name;?></td>
					<td><?php echo $username;?></td>
					<td>
                    <a href="<?php echo SITEURL;?>/register/adminupdate.php?id=<?php echo $id;?>" class="btn-primary">Edit admin</a>
                    <a href="<?php echo SITEURL;?>/register/admindelete.php?id=<?php echo $id;?>" class="btn-primary12">Delete admin</a>
					
                    </td>
				</tr>
							<?php	
							}
							}
							else{
								echo "NO DATA FOUND";
							}
					}
				?>
               
			</table>
	
				</div>
			
	</div>
	<?php include ('../partials/footer.php')?>



	    
        </div>
	    	
	    </div>
	</div>
</div>
	

</body>
</html>