<?php
error_reporting(0);

try{
    $db=new PDO("mysql:host=localhost;dbname=uyelik;charset=utf8","root","");

}catch(PDOException $hata){
    echo $hata->getMessage();
}
?>