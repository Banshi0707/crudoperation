<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <div class="container">
    <button class="btn btn-primary my-5"><a href="user.php" class="text-light">Add user</a>
</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Phone</th>
      <th scope="col">Subject</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
<?php
// include "update.php";
$sql="select * from `crood`. `crudoperation`";
$result=mysqli_query($con,$sql);
if($result){
    // $row=mysqli_fetch_assoc($result);
    // echo $row['Name'];
    while($row=mysqli_fetch_assoc($result)){
      $Name=$row['Name'];
      $Age=$row['Age'];
      $Phone=$row['Phone'];
      $Subject=$row['Subject']; 
      echo '<tr>
      <th scope="row">'.$Name.'</th>
      <td>'.$Age.'</td>
      <td>'.$Phone.'</td>
      <td>'.$Subject.'</td>
      <td>
      <button class="btn btn-primary"><a href="update.php? updateName='.$Name.'" class="text-light">Update</a></button>
      <button class="btn btn-danger"><a href="delete.php? deleteName='.$Name.'" class="text-light">Delete</a></button></td>
      </tr>';
    }
}
?>
  </tbody>
</table>
   </div> 
</body>
</html>