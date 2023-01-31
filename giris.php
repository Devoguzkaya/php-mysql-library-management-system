<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş yap</title>
</head>
<body>
    <form action="">
<table>
    <tr>
        <td>Kullanıcı adı:</td>
        <td><input type="text" name="kadi" required></td>
    </tr>
    <tr>
        <td>Şifre:</td>
        <td><input type="password" name="sifre" required></td>
    </tr>
</table>
</form>
</body>
</html>


<?php

// BURADA KALDIK
include("baglanti.php");
$kadi=$_POST["kadi"];
$sifre=$_POST["sifre"];


?>