<?php

session_start();
    
    include("adminConn.php");
    include("adminFunctions.php");


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
            $query = "select * from admin_users where user_name = '$user_name' limit 1";
            //connection to the db
            $result = mysqli_query($con, $query);
            
            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    // checking if password is the same
                    if($user_data['password'] === $password)
                    {
                        $_SESSION['user_id'] =  $user_data['user_id'];
                        header("Location: AdminIndex.php");
                        die;
                    }
                }
            }
            echo '<script>alert("Wrong Username or Password...")</script>';
        }
        else
        {
            echo '<script>alert("Wrong Username or Password...")</script>';
        }
    }

	?>





<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Side Navigation Bar</title>
	<style> 
		#text{
                height: 25px;
                border-radius: 5px;
                padding: 4px;
                border: solid thin #aaa;
				color:black;
                width: 100%;
            }

            #button{
                padding: 10px;
                width: 100px;
                color: white;
                background-color: black;
                border: none;
            }

            #box{
                background-color: grey;
                margin: auto;
                width: 300px;
                padding: 20px;
            }
            .panel-body img{
	    width: 100%;
	    height: 23rem;
	    object-fit: cover;
	}
	
	a{
		color:black;

	}
	a:link {
  	color: teal;
	}

	/* visited link */
	a:visited {
	color: Teal;
	}

	/* mouse over link */
	a:hover {
	color: red;
	
	}

	/* selected link */
	a:active {
	color: Teal;
	}</style>
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
			<a href="adminLogin.php">SECRET SHOP</a>
		</div>
		<div class="top_menu">
			<div class="home_link">
				<a href="adminLogin.php">
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
		            <a href="login.php">
		             
		              <span class="list">Log In</span>
		            </a>
		          </li>
				  <li>
		            <a href="adminLogin.php" class="active">
		             
		              <span class="list">Admin Log-In</span>
		            </a>
		          </li>
		          
		         
		        </ul>

		        

	        </div>
	    </div>

		

	    
	</div>
	
</div>
<br><br>

<h1 style="background-color:black;text-align:center;color:white;font-family:cambria;font-weight:none;"><br>Welcome Admin, Log-In now.<br><br></h1>

<br><br><br><br>
<div id="box">


    
            <form method="post">
			<center><img src="images\logo.png" alt="Secret Shop Logo" width="120" height="120" style="text-align:center;"></center>
                <div style="font-size: 20px; margin: 10px;color: white;text-align:center;font-family:cambria;">Admin Log-in</div>
                <br>
                <br>

                <input id="text" type="text" name="user_name" placeholder="Enter Username..." required><br><br>
                <input id="text" type="password" name="password" placeholder="Enter Password..." required><br><br>
				<br>
                <center><input id="button" type="submit" value="Login" style="cursor: pointer;"></center><br>

                <br>
            </form>
            
        </div>
	

</body>
</html>