<?php
include "connect.php";

$Name = isset($_GET['updateName']) ? $_GET['updateName'] : '';

// Use prepared statement to avoid SQL injection
$sql = "SELECT * FROM `crood`.`crudoperation` WHERE Name=?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $Name);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result) {
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $Name = $row['Name'];
        $Age = $row['Age'];
        $Phone = $row['Phone'];
        $Subject = $row['Subject'];
    } else {
        echo "No matching record found.";
    }

    mysqli_free_result($result);
} else {
    echo "Error fetching data: " . mysqli_error($con);
}

if (isset($_POST["submit"])) {
    $NewName = $_POST["Name"];
    $Age = $_POST["Age"];
    $Phone = $_POST["Phone"];
    $Subject = $_POST["Subject"];

    $updateSql = "UPDATE `crood`.`crudoperation` SET Age=?, Phone=?, Subject=? WHERE Name=?";
    $updateStmt = mysqli_prepare($con, $updateSql);
    mysqli_stmt_bind_param($updateStmt, "ssss", $Age, $Phone, $Subject, $Name);
    $updateResult = mysqli_stmt_execute($updateStmt);

    if ($updateResult) {
        // echo "Data updated successfully";
        header('location:display.php');
    } else {
        echo "Error updating data: " . mysqli_error($con);
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
        <input type="text" class="form-control" placeholder="enter your name" name="Name" autocomplete="off" value=<?php echo $Name;?> >
      </div>
      <div class="form-group">
        <label>Age</label><br>
        <input type="text" class="form-control" placeholder="enter your age" name="Age"autocomplete="off" value=<?php echo $Age;?> >>
      </div>
      <div class="form-group">
        <label>Phone No</label><br>
        <input type="text" class="form-control" placeholder="enter your Phone No" name="Phone"autocomplete="off" value=<?php echo $Phone;?> >>
      </div>
      <div class="form-group">
        <label>Subject Name</label><br>
        <input type="text" class="form-control" placeholder="enter your subject Name" name="Subject"autocomplete="off" value=<?php echo $Subject;?> >>
      </div>
      
      <br>
      <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
  </div>
</body>
</html>