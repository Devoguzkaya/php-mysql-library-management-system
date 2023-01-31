<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php 
include('baglanti.php');
$ad_err=$email_err=$parola_err=$kullanici_adi_err=$soyad_err=$err_kayit="";
if(isset($_POST["ok"]))
{
// aynı kullanıcı adına sahip biri var mı sorgusu
$sorgukadi="SELECT kullaniciadi FROM kullanicilar WHERE kullaniciadi=\"".$_POST["kadi"]."\"";
$sorgulakadi=mysqli_query($conn,$sorgukadi);
$kadi2=mysqli_fetch_array($sorgulakadi);
// aynı mail adresine sahip biri var mı sorgusu
$sorgumail2="SELECT mail FROM kullanicilar WHERE mail=\"".$_POST["mail"]."\"";
$sorgulamail2=mysqli_query($conn,$sorgumail2);
$mail2=mysqli_fetch_array($sorgulamail2);

    // Ad soyad alanları için sorgu

    if(empty($_POST["ad"]))
    {
        $ad_err="Bu alan boş geçilemez";
    }
        else if(!preg_match ( '/^[a-zğüşöçıİĞÜŞÖÇ]{3,20}/i' , $_POST["ad"] ))
    {
        $ad_err="Geçerli formatta değil";
    }
    else
    {
        mb_strtolower($_POST["ad"],'UTF-8');//ad ve soyad tamamen küçük harflerden olacak şekilde çevrilmiştir
        ucwords($_POST["ad"]);// ad ve soy bilgisindeki her kelimenin ilk harfi büyük harfe çevrilmiştir
        $ad=$_POST["ad"];
    }
      // Ad soyad alanları için sorgu

      if(empty($_POST["soyad"]))
      {
          $soyad_err="Bu alan boş geçilemez";
      }
      else if(!preg_match ( '/^[a-zğüşöçıİĞÜŞÖÇ]{3,20}/i' , $_POST["soyad"] ))
      {
          $soyad_err="Geçerli formatta değil";
      }
      else
      {
          mb_strtolower($_POST["soyad"],'UTF-8');//ad ve soyad tamamen küçük harflerden olacak şekilde çevrilmiştir
          ucwords($_POST["soyad"]);// ad ve soy bilgisindeki her kelimenin ilk harfi büyük harfe çevrilmiştir
          $soyad=$_POST["soyad"];
      }


    //kullanıcı adı için sorgu

    if(empty($_POST["kadi"]))
    {
        $kullanici_adi_err="Bu alan boş geçilemez";
    }
    else if(!preg_match ( '/^[a-z\d_-]{5,20}/i' , $_POST["kadi"] )){
        $kullanici_adi_err="Girdiğiniz kullanıcı adı geçerli formatta değil.";
    }

    else if(!empty($kadi2)){
        $kullanici_adi_err="Bu kullanıcı adı daha önce alınmıştır.";
    }
    // veritabanında aynı kullanıcı adında biri var mı sorgusu eklenecek
    else
    {
        $kadi=$_POST["kadi"];//kullanıcı adı sorgudan geçip değişkene atanmıştır
    }

    // email sorgusu

    if(empty($_POST["mail"]))
    {
        $email_err="Bu alan boş geçilemez";
    }
    else if(!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) 
    {
        $email_err="Geçerli formatta değil";
    }
    else if(!empty($mail2)){
$email_err = "Bu e-mail adresi daha önce kullanılmış.";
    }
    else
    {
        $email=$_POST["mail"];// mail sorgudan başarılı bir şekilde geçip değişeken atanmıştır
    }

    //parola sorgusu

    if(empty($_POST["parola"]) || empty($_POST["parola_tekrar"]))
    {
        $parola_err="Bu alan boş geçilemez";
    }
    else if($_POST["parola"]!=$_POST["parola_tekrar"])
    {
        $parola_err="Parolalar uyuşmuyor";
    }
    else if(strlen($_POST["parola"])<8 || strlen($_POST["parola"])>16)
    {
        $parola_err="Parolanız 8 ile 16 karakterden oluşmalıdır";
    }
    else
    {
        $parola=md5($_POST["parola"]);//şifre kriptolanarak bir değişkene atanmıştır.
    
    }


    //TELEFON BOŞ MU SORGUSU

    if(empty($_POST["tel"]))
    {
        $tel_err="Bu alan boş geçilemez";
    }
    else
    {
        $tel=$_POST["tel"];
    }
//adres atama 

if(empty($_POST["adres"]))
{$adres = "Adres girilmemiş.";}
else {
    $adres= $_POST["adres"];
}

    //kayıt 
    if(!empty($ad) && !empty($email) && !empty($parola) && !empty($kadi) && !empty($tel)) 
    {
        $sql="INSERT INTO kullanicilar VALUES (null,'$ad','$soyad','$kadi','$email','$parola','$tel','$adres')";
        $sorgu=mysqli_query($conn,$sql);
        $err_kayit= "Kayıt başarıyla gerçekleşti.";
    }
     else
         {
           $err_kayit="Kayıt yapılamadı";
         }
    }
       

?>





<table border=0 >
<form action="#" method="post">


<tr><td colspan=2><center>KÜTÜPHANE ÜYE KAYIT FORMU</center> <hr></td></tr>


<tr><td>Ad</td><td><input type="text" name="ad" class="giris"><?php echo "<br><font color=\"red\" size=2>".$ad_err."</font>";  ?></td></tr>

<tr><td>Soyad</td><td><input type="text" name="soyad" class="giris"><?php echo "<br><font color=\"red\" size=2>".$soyad_err."</font>";  ?></td></tr>


<tr><td>Kullanıcı Adı</td><td><input type="text" name="kadi" class="giris" ><?php  echo "<br><font color=\"red\" size=2>".$kullanici_adi_err."</font>"; ?></td></tr>


<tr><td>E-mail</td><td><input type="text" name="mail" class="giris"><?php echo "<br><font color=\"red\" size=2>".$email_err."</font>";  ?></td></tr>


<tr><td>Telefon</td><td><input type="text" name="tel" class="giris" placeholder="(___)(_______)"></td></tr>


<tr><td>Adres</td><td><textarea  name="adres" class="giris" ></textarea></td></tr>


<tr><td>Parola</td><td><input type="password" name="parola" class="giris"></td></tr>
<tr><td>Parola Tekrar</td><td><input type="password" name="parola_tekrar" class="giris"><?php echo "<br><font color=\"red\" size=2>".$parola_err."</font>";  ?></td></tr>


<tr><td colspan=2><center><input type="submit" value="KAYIT OL" name="ok" class="uyeol" style="margin-left:180px;"></center></td></tr>
<tr><td colspan=2><center><?php
echo $err_kayit;
?></center></td></tr>
</form>
</table>
<br>




</body>

</html>