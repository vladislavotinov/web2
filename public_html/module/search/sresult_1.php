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
$name = trim($_REQUEST['name']); 
$_POST['captcha'] = FormChars($_POST['captcha']);
if (!$_POST['name'] or !$_POST['captcha']) MessageSend(1, 'Невозможно обработать форму.');
if ($_SESSION['captcha'] != md5($_POST['captcha'])) MessageSend(1, 'Капча введена не верно.');
?>
<br /><br /><br />Поиск по имени: <?php echo $name ?><br />
<?php
$per = 0;
$name = trim($_REQUEST['name']); 
/* while(mysqli_fetch_assoc(mysqli_query($CONNECT,"SELECT 'name','email','breed' FROM `users` WHERE `name` = '$name'") ))
{ ?>
     <br /><p style="text-align:center">
     картинка
     </p>
     <br/><p>Имя кота: <?php echo $Row['name'] ?></p>
     <br/><p>Порода кота: <?php echo $Row['breed'] ?></p>
     <br/><p>Email владельца: <?php echo $Row['email'] ?></p>
     <br/><p>Дата регистрации: <?php echo $Row['regdate'] ?></p>
    <?php
    $per++;
}
*/
?>


</div>
</div>

<?php Footer() ?>
</div>
</body>
</html>