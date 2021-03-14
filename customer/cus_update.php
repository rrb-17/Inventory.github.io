<?php

include '../conn.php';
$id=$_GET['cid'];

if(isset($_POST['submit'])){

$name = $_POST['name'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$email= $_POST['email'];


$q="UPDATE customer SET  name ='$name' , phone =$phone , gender = '$gender' , email='$email' WHERE cid=$id ";
if(mysqli_query($conn,$q)){
    echo "successful";
    header('location:cus_details.php');

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
    <title>INSERT DATA</title>
</head>
<body>



<h1>UPDATE CUSTOMER DATA</h1>
<?php 

$q2 = "SELECT * FROM customer WHERE cid=$id";
 $result2= mysqli_query($conn,$q2);

while($r=mysqli_fetch_assoc($result2))  {

?> 
<form method="post">
     <label for="name">NAME</label><br><br>
     <input type="text" class="name" id="name" name="name" value=<?php  echo $r['name']; ?>><br><br>
     <label for="email">EMAIL ID</label><br><br>
     <input type="email" name="email" id="email" value=<?php  echo $r['email'];?>><br><br>
     <label for="phone">Enter a phone number:</label><br><br>
     <input type="tel" id="phone" name="phone" pattern="[7-9]{1}[0-9]{9}" value=<?php  echo $r['phone'];?> required><br><br>
     <label for="gender">gender</label><br><br>
     <select name="gender" id="gender">

     <option value="Female">Female</option>
     <option value="Male">Male</option>       
     
     </select>
     <button type="submit" name="submit" id="submit">UPDATE</button>
</form>
    <?php
}
?>
</body>
</html>


