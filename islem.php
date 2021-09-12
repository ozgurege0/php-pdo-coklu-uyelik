<?php
@ob_start();
@session_start();

require_once('baglan.php');

if(isset($_POST['memberslogin'])){
    $members_nick=$_POST['members_nick'];
    $members_pass=md5($_POST['members_pass']);
    
    $sorgu=$db->prepare("SELECT * FROM members where members_nick=:nick and members_pass=:pass");
    $sorgu->execute(array(
        'nick'=>$members_nick,
        'pass'=>$members_pass
    ));

    echo $kontrol=$sorgu->rowCount();

    if($kontrol=1){
        $_SESSION['members_nick']=$members_nick;
        session_regenerate_id();
        header("Location:welcome.php");
        exit;
    }else{
        header("Location:index.php?durum=basarisiz");
    }
}

if(isset($_POST["memberskayit"])){
    $kaydet=$db->prepare("INSERT INTO members SET
    members_nick=:nick,
    members_mail=:mail,
    members_pass=:pass
    ");
    $insert=$kaydet->execute(array(
    'nick' => htmlspecialchars($_POST['members_nick'],ENT_QUOTES,'UTF-8'),
    'mail' => htmlspecialchars($_POST['members_mail'],ENT_QUOTES,'UTF-8'),
    'pass' => md5($_POST['members_pass'])
    ));
    if($insert){
        Header("Location:index.php");

    }else{
        Header("Location:index.php");
    }
}
?>