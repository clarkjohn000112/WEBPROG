<?php include ('../partials/menu.php');


$id = $_GET['id'];

$sql = "DELETE FROM item where id=$id";
$res = mysqli_query($conn, $sql);

if($res==TRUE){
    echo "food DELETED";
    header("location:".SITEURL.'/register/itemmanage.php');
}
else{
    echo "ITEM FAILED TO DELETE";
}
?>