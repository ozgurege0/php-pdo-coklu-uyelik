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

if($kontrol==1){
    header("Location:welcome.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    <title>Kayıt Ol!</title>
  </head>
  <body>

  <div class="container mt-5">
      <div class="row">
          <div class="form">
          <form method="post" action="islem.php">

              <div class="col-md-6">
                <label>Kullanıcı Adı</label>
                <input class="form-control rounded" type="text" name="members_nick" required="">
              </div>

              <div class="col-md-6 mt-2">
                <label>Mail Adresi</label>
                <input class="form-control rounded" type="mail" name="members_mail" required="">
              </div>

              <div class="col-md-6 mt-2">
                <label>Şifre</label>
                <input class="form-control rounded" type="password" name="members_pass" required="">
              </div>

              <p class="mt-2">Üyeliğiniz zaten var mı? <a href="index.php">Giriş Yap.</a></p>
              <button type="submit" class="btn btn-primary mt-1" name="memberskayit">Kayıt Ol</button>
              

          </form>
          </div>
  </div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>