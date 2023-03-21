<?php
session_start();
include './class/dataBase.php';

$id = $_GET['id'];
$uploaddir = 'img/';

$img = $id . ".jpg";
$uploadfile = $uploaddir . $img;

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Файл корректен и был успешно загружен.\n";
} else {
    echo "Возможная атака с помощью файловой загрузки!\n";
}
print_r($uploadfile);
print_r("<br>");
echo 'Некоторая отладочная информация:';
print_r($_FILES);

print "</pre>";

$db = new dataBase();
$db->query("UPDATE cheburek  SET image = '".$img."' WHERE id = ".$id.";");
$cheburek = $db->queryRow("SELECT * FROM cheburek WHERE id = '".$id."' ;");

header('Location: '.$_SERVER["HTTP_REFERER"]);

?>
