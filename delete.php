<?php
include'connect.php';
if(isset($_GET['deleteName'])){
    $Name=$_GET['deleteName'];
    $sql="delete from `crood`.`crudoperation` WHERE Name='$Name'";
    $result=mysqli_query($con,$sql);
    if($result){
        // echo"Deleted successfull";
        header('location:display.php');
    }
    else{
        die(mysqli_error($con));
    }

}