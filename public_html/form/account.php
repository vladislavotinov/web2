<?php 
if ($Module == 'logout' and $_SESSION['USER_LOGIN_IN'] == 1) {
if ($_COOKIE['user']) {
setcookie('user', '', strtotime('-30 days'), '/');
unset($_COOKIE['user']);
}
session_unset();
exit("<meta http-equiv='refresh' content='0; url= /login'>");//exit(header('Location: /login'));
}


if ($Module == 'register' and $_POST['enter']) {
$_POST['login'] = FormChars($_POST['login']);
$_POST['email'] = FormChars($_POST['email']);
$_POST['password'] = FormChars($_POST['password']);//GenPass(FormChars($_POST['password']), $_POST['login']);
$_POST['name'] = FormChars($_POST['name']);
$_POST['breed'] = FormChars($_POST['breed']);
$_POST['avatar'] = FormChars($_POST['avatar']);
$_POST['avatar'] = 0;
$_POST['captcha'] = FormChars($_POST['captcha']);




if (!$_POST['login'] or !$_POST['email'] or !$_POST['password'] or !$_POST['name'] or $_POST['breed'] > 4) MessageSend(1,'Ошибка валидации формы.');

if ($_SESSION['captcha'] != md5($_POST['captcha'])) MessageSend(1,'Неверная каптча');

$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `login` FROM `users` WHERE `login` = '$_POST[login]'"));
if ($Row['login']) exit('Логин <b>'.$_POST['login'].'</b> уже используеться.');
$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `email` FROM `users` WHERE `email` = '$_POST[email]'"));
if ($Row['login']) exit('E-Mail <b>'.$_POST['email'].'</b> уже используеться.');
mysqli_query($CONNECT, "INSERT INTO `users` VALUES ('', '$_POST[login]', '$_POST[password]', '$_POST[name]', '$_POST[email]', 0 , $_POST[breed], NOW())");
echo 'Аккаунт зарегистрирован!';
exit("<meta http-equiv='refresh' content='0; url= /login'>");//exit(header('Location: /index')); // !
}


else if ($Module == 'login' and $_POST['enter']) {
$_POST['login'] = FormChars($_POST['login']);
$_POST['password'] = FormChars($_POST['password']);//GenPass(FormChars($_POST['password']), $_POST['login']);
$_POST['captcha'] = FormChars($_POST['captcha']);
if (!$_POST['login'] or !$_POST['password'] or !$_POST['captcha']) MessageSend(1, 'Невозможно обработать форму.');
if ($_SESSION['captcha'] != md5($_POST['captcha'])) MessageSend(1, 'Капча введена не верно.');
$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `password` FROM `users` WHERE `login` = '$_POST[login]'"));
if ($Row['password'] != $_POST['password']) MessageSend(1, 'Не верный логин или пароль.');
$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `id`, `name`, `regdate`, `email`, `breed`, `avatar`, `password`, `login` FROM `users` WHERE `login` = '$_POST[login]'"));

$_SESSION['USER_LOGIN'] = $Row['login'];
$_SESSION['USER_PASSWORD'] = $Row['password'];
$_SESSION['USER_ID'] = $Row['id'];
$_SESSION['USER_NAME'] = $Row['name'];
$_SESSION['USER_REGDATE'] = $Row['regdate'];
$_SESSION['USER_EMAIL'] = $Row['email'];
$_SESSION['USER_BREED'] = ($Row['breed']);
$_SESSION['USER_AVATAR'] = $Row['avatar'];
$_SESSION['USER_LOGIN_IN'] = 1;

if ($_REQUEST['remember']) setcookie('user', $_POST['password'], strtotime('+30 days'), '/');
exit("<meta http-equiv='refresh' content='0; url= /profile'>");//exit(header('Location: /profile'));
}

if ($Module == 'edit' and $_POST['enter']) {
$_POST['opassword'] = FormChars($_POST['opassword']);
$_POST['npassword'] = FormChars($_POST['npassword']);
$_POST['name'] = FormChars($_POST['name']);
$_POST['breed'] = FormChars($_POST['breed']);

if ($_POST['name'] != $_SESSION['USER_NAME']) {
mysqli_query($CONNECT, "UPDATE `users`  SET `name` = '$_POST[name]' WHERE `id` = $_SESSION[USER_ID]");
$_SESSION['USER_NAME'] = $_POST['name'];
}

if ($_POST['opassword'] or $_POST['npassword']) {
if (!$_POST['opassword']) MessageSend(2, 'Не указан старый пароль');
if (!$_POST['npassword']) MessageSend(2, 'Не указан новый пароль');
if ($_SESSION['USER_PASSWORD'] != $_POST['opassword']) MessageSend(2, 'Старый пароль указан не верно.');
$Password = $_POST['npassword'];
mysqli_query($CONNECT, "UPDATE `users`  SET `password` = '$Password' WHERE `id` = $_SESSION[USER_ID]");
$_SESSION['USER_PASSWORD'] = $Password;
}

if (($_POST['breed']) != $_SESSION['USER_BREED']) {
mysqli_query($CONNECT, "UPDATE `users`  SET `breed` = $_POST[breed] WHERE `id` = $_SESSION[USER_ID]");
$_SESSION['USER_BREED'] = ($_POST['breed']);
}
// с файлами хз
if ($_FILES['avatar']['tmp_name']) {
if ($_FILES['avatar']['type'] != 'image/jpeg') MessageSend(2, 'Не верный тип изображения.');
if ($_FILES['avatar']['size'] > 25000) MessageSend(2, 'Размер изображения слишком большой.');
$Image = imagecreatefromjpeg($_FILES['avatar']['tmp_name']);
$Size = getimagesize($_FILES['avatar']['tmp_name']);
$Tmp = imagecreatetruecolor(120, 120);
imagecopyresampled($Tmp, $Image, 0, 0, 0, 0, 120, 120, $Size[0], $Size[1]);
if ($_SESSION['USER_AVATAR'] == 0) {
$Files = glob('resource/avatar/*', GLOB_ONLYDIR);
foreach($Files as $num => $Dir) {
$Num ++;
$Count = sizeof(glob($Dir.'/*.*'));
if ($Count < 270) {
$Download = $Dir.'/'.$_SESSION['USER_ID'];
$_SESSION['USER_AVATAR'] = $Num;
mysqli_query($CONNECT, "UPDATE `users`  SET `avatar` = $Num WHERE `id` = $_SESSION[USER_ID]");
break;
}
}
}
else $Download = 'resource/avatar/'.$_SESSION['USER_AVATAR'].'/'.$_SESSION['USER_ID'];
imagejpeg($Tmp, $Download.'.jpg');
imagedestroy($Image);
imagedestroy($Tmp);
}

exit("<meta http-equiv='refresh' content='0; url= /profile'>");
}



?>