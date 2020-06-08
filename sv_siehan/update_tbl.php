<?php 

header('Access-Control-Allow-Origin: *');

include_once "koneksi_plasadata.php";
$table = $_POST['table'];
$id    = $_POST['idnya'];
mysqli_query($con, "UPDATE $table SET status=0 WHERE status = 1 AND id=$id") or die (mysqli_error());

?>