<html>
<head>
<title>  </title>
</head>
<body>
    <form name="kayit" method="post" action="kayitok.php">
        ISBN<input type="text" name="ISBN"> 
        Kitap adi<input type="text" name="kitapadi"><br><br>
        Yazar adi <input type="text" name="yazaradi">
        Yazar soyadi <input type="text" name="yazarsoyadi"><br><br>
        Yayın evi <input type="text" name="yayinevi">
        kitap türü <input type="text" name="kitapturu">
        basim yılı <input type="text" name="basimyil"><br>
        <input type="submit" value="kaydet">
</form>
        <br><br><br>
        <table border=1>
            <tr bgcolor="gray">
                <td>ID</id>
                <td>ISBN</td>
                <td>KİTAP ADI</td>
                <td>YAZAR ADI</td>
                <td>YAZAR SOYADI</td>
                <td>YAYINEVİ</td>
                <td>KİTAP TÜRÜ</td>
                <td>BASIM YILI</td>
</tr>
<?php
include('baglanti.php');
$sql="SELECT * FROM kitaplar";
$sorgu=mysqli_query($bagno,$sql);
$renk=1;
while($dizi=mysqli_fetch_array($sorgu))
{ 
    if($renk%2==0)
    {
        echo "<tr>";
    echo "<td> $dizi[0] </td>";
    echo "<td> $dizi[1] </td>";
    echo "<td> $dizi[2] </td>";
    echo "<td> $dizi[3] </td>";
    echo "<td> $dizi[4] </td>";
    echo "<td> $dizi[5] </td>";
    echo "<td> $dizi[6] </td>";
    echo "<td> $dizi[7] </td>";
    echo "</tr>";
    }
    else
    {
    echo "<tr bgcolor=\"gray\">";
    echo "<td> $dizi[0] </td>";
    echo "<td> $dizi[1] </td>";
    echo "<td> $dizi[2] </td>";
    echo "<td> $dizi[3] </td>";
    echo "<td> $dizi[4] </td>";
    echo "<td> $dizi[5] </td>";
    echo "<td> $dizi[6] </td>";
    echo "<td> $dizi[7] </td>";
    echo "</tr>";
    }
    $renk++;
}

?>
</table>
    </body>
</html>
