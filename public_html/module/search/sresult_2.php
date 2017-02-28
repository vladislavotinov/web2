<?php 
Head('Результат поиска') ?>
<body>
<div class="wrapper">
<div class="header"></div>
<div class="content">
<?php Menu()
?>
<div class="Page">
Не доделал. Зациклилось
<?php 
/*

$breed = trim($_REQUEST['breed']); 
$_POST['captcha'] = FormChars($_POST['captcha']);
if (!$_POST['name'] or !$_POST['captcha']) MessageSend(1, 'Невозможно обработать форму.');
if ($_SESSION['captcha'] != md5($_POST['captcha'])) MessageSend(1, 'Капча введена не верно.');
$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT 'name','email','avatar','breed' FROM `users` WHERE `breed` = '$_POST[breed]'"));

?>
<br /><br /><br />Поиск по породе: <?php echo '$_POST[breed]' ?><br />
<?php
while($Row)
{ ?>
     <br /><p style="text-align:center">
     картинка
     </p>
     <br/><p>Имя кота: <?php echo $Row['name'] ?></p>
     <br/><p>Порода кота: <?php echo $Row['breed'] ?></p>
     <br/><p>Email владельца: <?php echo $Row['email'] ?></p>

<?php
}


*/
?>
</div>
</div>

<?php Footer() ?>
</div>
</body>
</html>