<?php
function valid_input($data)
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
function valid_regexp($data)
{
$regexp= "/[a-zA-z0-9]{6,}?/";
if (preg_match($regexp, $data) == 1)
{
return true;
}
else {
return false;
}
}
function chek_autorisation($login,$password)
{
$bd = new mysqli('localhost', 'root', '','mybd');
$s = "SELECT * FROM `users` WHERE `login` = '" . $login . "'";
$result=$bd->query($s);
$record = $result->fetch_assoc();
$pass_in_base = $record['password'];
if ($password == $pass_in_base)
{
return true;
}
else
{
return false;
}
}
function balance($login)
{
$bd = new mysqli('localhost', 'root', '','mybd');
$s = "SELECT * FROM `users` WHERE `login` = '" . $login . "'";
$result=$bd->query($s);
$record = $result->fetch_assoc();
$balance = $record['balance'];
return $balance;
}
?>
