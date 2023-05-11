<?php

include "connection.php";


$id = htmlentities($_GET['id']);
$id = mysqli_real_escape_string($conn, $id); // ALWAYS ESCAPE USER INPUT
$query = "SELECT * FROM files WHERE `id`=$id";
$result = mysqli_query($conn, $query);
$result_check = mysqli_num_rows($result);
if($result_check > 1 || $result_check < 1){ //If more then 1 result die
    die('Invalid');
}
$row = mysqli_fetch_assoc($result);
header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=".$row['fileName']);
header("Content-Type: application/zip");
header("Content-Transfer-Encoding: binary");
echo $row['fileName'];

?>
