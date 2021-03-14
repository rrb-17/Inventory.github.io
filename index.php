<!DOCTYPE html>
<html lang="en">
<head>
<style>
.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  height :200px;
  width :200px;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
  margin: 20px;
}

</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

      <h1 style="text-align:center;"> WELCOME TO INVENTORY MANAGEMENT APPLICATION</h1>
   
   <button  class="btn-primary btn btn-lg"><span class="glyphicon glyphicon-list"></span><br><a href="customer/cus_details.php" class="text-white text-center">CUSTOMER DETAILS</a></button> 
   <button  class="btn-primary btn btn-lg"><span class="glyphicon glyphicon-list"></span><br><a href="product/pro_details.php" class="text-white text-center">PRODUCT DETAILS</a></button>  
 
    <button  class="btn-primary btn btn-lg"><span class="glyphicon glyphicon-user"></span><br><a href="customer/insert.php" class="text-white text-center">ADD CUSTOMER</button>
    <button  class="btn-primary btn btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span><br><a href="product/pro_insert.php" class="text-white text-center">ADD PRODUCT</button>
    <button  class="btn-primary btn btn-lg"><span class="glyphicon glyphicon-exclamation-sign"></span><br><a href="q_lower_limit.php" class="text-white text-center">LOWER QUANTITY <br>ITEM</a></button> 


</body>
</html>