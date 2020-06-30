<?php
session_start();
if (!isset($_SESSION['username']))
{
exit("Необходима <a href='index.html'>авторизация</a>");
}
$login = $_SESSION['username'];
$bd = new mysqli('localhost', 'root', '','mybd');
$bd->query("DELETE FROM `users` where `login` = '$login'");
session_destroy();
echo "Пользователь удалён";
?>
<br>
<a href='index.html'>Вход</a><br>
<a href='reg_form.html'>Регистрация</a>
