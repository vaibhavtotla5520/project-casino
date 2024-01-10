<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
echo "<pre>";

require_once "Config/Database.php";
$Database = new Database;
print_r($Database->connect());