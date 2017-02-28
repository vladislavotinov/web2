
<h3> 3.ru/api/vvod_mysql_table/login/vvod_login/param/vvod_param <br/>
 vvod_param = ' ../param/name.regdate.id   '
 </h3>
 <br />
<?php

function Error($p1, $p2) {
exit('{"error":'.$p1.', "text":"'.$p2.'"}');
}


if ($Module == 'users') {

if (!$Param['login']) Error(1, 'Не указан логин пользователя');
if (!$Param['param']) Error(2, 'Не указан параметр метода');
$Param['login'] = FormChars($Param['login']);


$Array = array('name', 'regdate', 'id'); // Вся инфа которая может быть получена

$Exp = explode('.', $Param['param']);

foreach($Exp as $key) if ($Param['param'] != 'all' and !in_array($key, $Array)) Error(3, 'Параметр указан неверно');


if ($Param['param'] == 'all') $Select = $Array;
else $Select = $Exp;

foreach ($Select as $key) $SQL .= "`$key`,";

$SQL = substr($SQL, 0, -1);


echo json_encode(mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT $SQL FROM `users` WHERE `login` = '$Param[login]'")), JSON_UNESCAPED_UNICODE);

}


else Error(0, 'Метод не указан');

?>