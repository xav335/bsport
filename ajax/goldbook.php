<?php
require '../admin/classes/StorageManager.php';
require '../admin/classes/utils.php';
session_start();

$storageManager = new StorageManager();

error_log(date("Y-m-d H:i:s") ." : ". print_r($_POST) ."\n", 3, "../log/spy.log");
error_log(date("Y-m-d H:i:s") ." : ". $_POST['email'] ."\n", 3, "../log/spy.log");
error_log(date("Y-m-d H:i:s") ." : ". $_POST['message'] ."\n", 3, "../log/spy.log");
error_log(date("Y-m-d H:i:s") ." : ". $_POST['tag'] ."\n", 3, "../log/spy.log");

?>