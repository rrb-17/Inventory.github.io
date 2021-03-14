<?php

include "../conn.php";
if(isset($_POST['submit'])){

   $name= $_POST['name'];
   $gender= $_POST['gender'];
   $phone= $_POST['phone'];
   $email= $_POST['email'];
  
//echo "details".$name."  ".$gender." ".$phone." ".$email;
  $q = "INSERT INTO `customer`(name, `email`, `phone`, `gender`) VALUES ('$name','$email','$phone','$gender')";

  //$result = mysqli_query($conn,$q);
 if(mysqli_query($conn,$q)){
      echo "success";
      header('Location:cus_details.php');
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
    <title>INSERT DATA</title>
</head>
<body>



<h1>INSERT CUSTOMER DATA</h1>

<form action="insert.php" method="post">
     <label for="name">NAME</label><br><br>
     <input type="text" class="name" id="name" name="name" required><br><br>
     <label for="email">EMAIL ID</label><br><br>
     <input type="email" name="email" id="email" required><br><br>
     <label for="phone">Enter a phone number:</label><br><br>
     <input type="tel" id="phone" name="phone" pattern="[7-9]{1}[0-9]{9}" required><br><br>
     <label for="gender">gender</label><br><br>
     <select name="gender" id="gender">

     <option value="Female">Female</option>
     <option value="Male">Male</option>       
     
     </select>
     <button type="submit" name="submit" id="submit">ADD CUSTOMER</button><br><br>
     
</form>
<button type="submit" name="addpro" id="addpro" onclick="document.location='../add_pro.php'">ADD PRODUCT</button><br><br>


</body>
</html>