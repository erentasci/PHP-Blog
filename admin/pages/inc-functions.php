<?php 

header("Content-Type: text/html; charset=utf-8");

setlocale(LC_ALL,'tr_TR.UTF-8','tr_TR', 'tr', 'turkish');


$DBHost = "localhost";
$DBuser = "root";
$DBpass = "";
$DBname = "udemy";

try{
    $db = new PDO("mysql:host=$DBHost;dbname=$DBname",$DBuser,$DBpass);

}catch(PDOException $e){
    echo $e->getMessage();
}
$db->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");

define("_URL", "http://localhost/PHPEGİTİMSETİ/");

?>