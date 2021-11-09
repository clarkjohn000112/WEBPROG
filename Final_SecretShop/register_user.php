
<?php include ('connection.php')?>
<html>
    <head>
        <title>REGISTER USER</title>
        <link rel="stylesheet" href="../css/style.css">
       
    </head>

    <body>


  <br>

<div class="containers">
    <h1 CA>REGISTER USER</h1>
<?php 
    if(isset($_SESSION['login'])){
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    if(isset($_SESSION['no-login-message']))
    {
       echo $_SESSION['no-login-message'];
       unset($_SESSION['no-login-message']);
    }
?>


  <form action="" method="POST" class="container2">
  <h3>Fullname</h3><br>
    <input class="logincon" type="text" placeholder="      Enter Full Name" name="full_name" required> 
    <h3>Username</h3><br>
    <input class="logincon" type="text" placeholder="      Enter Username" name="username" required>

    <h3>Password</h3> <br>
    <input class="logincon" type="password" placeholder="      Enter Password" name="password" required>
    <br> <br> <br><input type="submit" name="submit" value="REGISTER" class="btn-primary1">
    
</form>


<?php 
    if(isset($_POST['submit']))
    {
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql1= "SELECT * FROM tbl_user where full_name='$full_name' and username = '$username' and password = '$password'";
        $res1 = mysqli_query($conn, $sql1);
  
        if(mysqli_num_rows($res1)>0)
        {   
            $_SESSION['add'] = "ADMIN ALREADY EXIST";
            header("location:".SITEURL.'/admin/add-admin.php');
        }
        else
        {

        $sql = "INSERT into tbl_user set full_name='$full_name', username='$username', password='$password'";
      
        $res = mysqli_query($conn, $sql);
        if($res==TRUE){
            echo "DATA INSERTED";
            $_SESSION['add'] = "DATA INSERTED";
            header("location:".SITEURL.'/admin/login.php');
        }
        else{
            $_SESSION['add'] = "FAILED TO INSERT";
            header("location:".SITEURL.'/admin/register_user.php');
        }
    }
    }
    ?>
    
</div>    
</body>
</html>
