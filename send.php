<?php
session_start();
require "scripts.php";
if (!isset($_SESSION['username']))
{
exit("Необходима <a href='index.html'>авторизация</a>");
}
$sender = valid_input($_SESSION['username']);
$receiver = valid_input($_POST['receiver']);
$sum = $_POST['sum'];
$bd = new mysqli('localhost', 'root', '', 'mybd');
$s = "SELECT * FROM `users` WHERE `login` = '" . $sender . "'";
$result=$bd->query($s);
$record = $result->fetch_assoc();
$max_sum = $record['balance'];
if ($sum < 0)
{
echo "Сумма перевода должна быть положительной и не равна 0<br>";
include "send_form.php";
}
else if ($sum > $max_sum)
{
echo "Отправить больше чем у вас есть невозможно!<br>";
include "send_form.php";
}
else
{
$bd->query("UPDATE `users` SET `balance` = `balance`- $sum where `login`= '$sender'");
$bd->query("UPDATE `users` SET `balance` = `balance`+ $sum where `login`= '$receiver'");
echo "<a href='main.php'>В главное меню</a>";
}
?>
