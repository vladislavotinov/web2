<?php 
Head('Регистрация') ?>
<body>
<div class="wrapper">
<div class="header"></div>
<div class="content">
<?php Menu();
MessageShow() ?>
<div class="Page">
<form method="POST" action="/account/register">
<br/><input type="text" name="login" placeholder="Логин"/>
<br/><input type="email" name="email" placeholder="E-Mail" />
<br/><input type="password" name="password" placeholder="Пароль" required>
<br/><input type="text" name="name" placeholder="Имя" required>
<br/><select size="1" name="breed"><option value="0">Не скажу</option><option value="1">Белая</option><option value="2">Темненькая</option><option value="3">Лысик</option><option value="4">Тигровая</option></select>
<div class="capdiv"><input type="text" class="capinp" name="captcha" placeholder="Капча" maxlength="10" pattern="[0-9]{1,5}" title="Только цифры" required> <img src="/resource/captcha.php" class="capimg" alt="Каптча"></div>
<br/><br/><input type="submit" name="enter" value="Регистрация"> <input type="reset" value="Очистить">
</form>
</div>
</div>

<?php Footer() ?>
</div>
</body>
</html>