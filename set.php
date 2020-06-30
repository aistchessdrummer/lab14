<?php
require "scripts.php";
$login = valid_input($_POST['user']);
$sum = valid_input($_POST['balance']);
$bd = new mysqli('localhost', 'root', '', 'mybd');
$bd->query("UPDATE `users` SET `balance` =  $sum where `login`= '$login'");
include "admin.php";
?>
