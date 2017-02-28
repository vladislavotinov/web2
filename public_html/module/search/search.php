<?php 
Head('Поисковик') ?>
<body>
<div class="wrapper">
<div class="header"></div>
<div class="content">
<?php Menu();
MessageShow() 
?>
<div class="Page">
<form method="POST" action="/sresult_1">
<br/><input type="text" name="name" placeholder="Поиск по имени" maxlength="30"  title="Не менее 3 и неболее 30 латынских символов или цифр." />
<div class="capdiv"><input type="text" class="capinp" name="captcha" placeholder="Капча" maxlength="10" pattern="[0-9]{1,5}" title="Только цифры." required> <img src="/resource/captcha.php" class="capimg" alt="Каптча"></div>
<br/><br/><input type="submit" name="enter" value="Вход"/> <input type="reset" value="Очистить"/>
</form>
<form method="POST" action="/sresult_2">
<br/><select size="1" name="breed"><option value="0">Не скажу</option><option value="1">Белая</option><option value="2">Черный нигер</option><option value="3">Лысик</option><option value="4">Тигровая</option></select>
<div class="capdiv"><input type="text" class="capinp" name="captcha" placeholder="Капча" maxlength="10" pattern="[0-9]{1,5}" title="Только цифры." required> <img src="/resource/captcha.php" class="capimg" alt="Каптча"></div>
<br/><br/><input type="submit" name="enter" value="Вход"/> <input type="reset" value="Очистить"/>
</form>
</div>
</div>

<?php Footer() ?>
</div>
</body>
</html>