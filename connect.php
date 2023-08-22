<?php
$servername='localhost';
$username='root';
$password='';
$con=mysqli_connect($servername,$username,$password);
if(!$con){
    die("sorry we failed to connection:".mysqli_connect_error());
}else{
echo"connectuion is successfull";
}
?>