<?php
require '../config.php';

$id = $_GET['id'];
$status = $_GET['status'];

if($status == 'aktif'){
  mysqli_query($conn, "UPDATE popup_pengumuman SET status='nonaktif'");
}

mysqli_query($conn, "
UPDATE popup_pengumuman 
SET status='$status' 
WHERE id='$id'
");

header("Location: popup.php");
