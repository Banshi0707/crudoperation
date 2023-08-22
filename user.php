<?php
include "connect.php";
// Assuming this file contains your database connection code
if(isset($_POST["submit"])){
  $Name = $_POST["Name"];
  $Age = $_POST["Age"];
  $Phone = $_POST["Phone"];
  $Subject = $_POST["Subject"];
  
  $sql = "INSERT INTO `crood`.`crudoperation`(`Name`, `Age`, `Phone`, `Subject`) VALUES ('$Name', '$Age', '$Phone', '$Subject')";
  $result = mysqli_query($con, $sql);
  
  if($result){
  
    // echo "Data inserted successfully";
    header('location:display.php');
  }
  else{
    die(mysqli_error($con));
    // echo "Database not connected successfully";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>crud operation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container my-5">
    <form method="post">
      <div class="form-group">
        <label>Name</label><br>
        <input type="text" class="form-control" placeholder="enter your name" name="Name" autocomplete="off">
      </div>
      <div class="form-group">
        <label>Age</label><br>
        <input type="text" class="form-control" placeholder="enter your age" name="Age">
      </div>
      <div class="form-group">
        <label>Phone No</label><br>
        <input type="text" class="form-control" placeholder="enter your Phone No" name="Phone">
      </div>
      <div class="form-group">
        <label>Subject Name</label><br>
        <input type="text" class="form-control" placeholder="enter your subject Name" name="Subject">
      </div>
      <br>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>
</body>
</html>