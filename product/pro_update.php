<?php

include '../conn.php';
$id=$_GET['pid'];

if(isset($_POST['submit'])){

    $name= $_POST['pname'];
    $price= $_POST['price'];
    $quantity= $_POST['quantity'];
    $limit= $_POST['q_lower_limit'];


$q="UPDATE product SET  pname ='$name' , price =$price , quantity = $quantity , q_lower_limit=$limit WHERE pid='$id' ";
if(mysqli_query($conn,$q)){
    echo "successful";
    header('location:pro_details.php');

}else{
    echo mysqli_error($conn);

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


<form  method="post">


     <label for="pname">PRODUCT</label><br><br>
     <input type="text" class="pname" id="pname" name="pname" required><br><br>


     <label for="price">PRICE (Rs.)</label><br><br>
     <input type="number" name="price" id="price" ><br><br>

     <label for="quantity">Quantity:</label><br><br>
     <input type="number" id="quantity" name="quantity"  required><br><br>

     <label for="q_lower_limit">Quantity Lower Limit:</label><br><br>
     <input  type = "number" name="q_lower_limit" id="q_lower_limit"  required>

        
     <button type="submit" name="submit" id="submit">UPDATE PRODUCT</button>


</form>
    

    
</body>
</html>