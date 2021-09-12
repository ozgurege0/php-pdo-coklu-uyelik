<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<?php
require_once('baglan.php');

@ob_start();
@session_start();

$sorgu=$db->prepare("SELECT * FROM members where members_nick=:nick");
$sorgu->execute(array(
    'nick'=>$_SESSION['members_nick']
));

$vericek=$sorgu->fetch(PDO::FETCH_ASSOC);
$kontrol=$sorgu->rowCount();

if($kontrol==0){
    header("Location:index.php");
    exit;
}
?>
<a href="cikis.php"><button class="btn btn-primary">ÇIKIŞ YAP</button></a>