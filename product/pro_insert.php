<?php

include "../conn.php";
if(isset($_POST['submit'])){
   $pid=$_POST['pid'];
   $name= $_POST['pname'];
   $price= $_POST['price'];
   $quantity= $_POST['quantity'];
   $limit= $_POST['q_lower_limit'];
  
//echo "details".$name."  ".$gender." ".$phone." ".$email;
  $q = "INSERT INTO product(`pid`, `pname`, `price`, `quantity`, `q_lower_limit`)  VALUES ('$pid','$name','$price','$quantity','$limit')";

  //$result = mysqli_query($conn,$q);
 if(mysqli_query($conn,$q)){
      echo "success";
     header('Location:pro_details.php');
    }else{
      //erroe
      echo 'query erroe' .mysqli_error($conn);
    }



}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCT</title>
</head>
<body>



  
<h1>INSERT PRODUCT DETAILS</h1>

<form action="pro_insert.php" method="post">
     <label for="pname">PRODUCT</label><br><br>
     <input type="text" class="pname" id="pname" name="pname" required><br><br>

     <label for="pid">PRODUCT ID</label><br><br>
     <input type="text" name="pid" id="pid"><br><br>

     <label for="price">PRICE (Rs.)</label><br><br>
     <input type="number" name="price" id="price"><br><br>

     <label for="quantity">Quantity:</label><br><br>
     <input type="number" id="quantity" name="quantity"  required><br><br>

     <label for="q_lower_limit">Quantity Lower Limit:</label><br><br>
     <input  type = "number" name="q_lower_limit" id="q_lower_limit" required>

        
     <button type="submit" name="submit" id="submit">ADD PRODUCT</button>
</form>
    
    
</body>
</html>