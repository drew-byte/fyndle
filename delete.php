<?php 
include "connection.php";

$id = $_GET['id'];
$sql = "DELETE FROM `accounts` WHERE id = $id";
$result = mysqli_query($conn,$sql);

if($result)
{
    header("Location: index.php");
}


?>