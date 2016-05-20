<?php
$data = json_decode($_POST['jsonData']);
$country;
foreach ($data as $key=>$value) {
    if($key=='selitem')
    {
        $country=$value;
    }
}

$dbAddres='localhost';#адрес базы
$dbUser='root';#имя
$dbpass='1';#пароль
$db='test';#имя базы
$link = mysqli_connect($dbAddres, $dbUser, $dbpass, $db);
mysqli_set_charset($link, "utf8");
$result = mysqli_query($link,"SELECT * FROM `cityes` WHERE `idcountry`=");
mysqli_close($link);

$arr = array('textnorm' => $StrNorm,'textform' => $StrForm, 'number' => $Number, 'Data' =>$dataG,'Help' => $texthelp);
echo json_encode($arr);	#
#добавление в базу


?>