<?php

include "../conn.php";
$id = $_GET['pid'];
$q = "DELETE FROM product WHERE  pid='$id' ";
if(mysqli_query($conn,$q)){

echo "successful!!";

}else{

  echo mysqli_error($conn);
}
header('location:pro_details.php');
?>