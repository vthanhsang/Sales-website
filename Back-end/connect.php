<?php
$connect = mysqli_connect ('localhost', 'root', '', 'account') or die ('Không thể kết nối tới database');
mysqli_set_charset($connect, 'UTF8');
if($connect === false){ 
die("ERROR: Could not connect. " . mysqli_connect_error()); 
}

?>