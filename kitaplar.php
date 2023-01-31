<html>
<head>
<title>  </title>
</head>
<body>
    <form name="kayit" method="post" action="kayitok.php">
        <table>
            <tr><td>  ISBN: <input type="text" name="ISBN"></td></tr>
            <tr><td>  Kitap adı: <input type="text" name="kitapadi"></td></tr>
            <tr> <td> Yazar adı: <input type="text" name="yazaradi"></td></tr>
            <tr> <td> Yazar soyadı: <input type="text" name="yazarsoyadi"></td></tr>
            <tr> <td> Yayınevi: <input type="text" name="yayinevi"></td></tr>
            <tr>  <td> Kitap türü: <input type="text" name="kitapturu"></td></tr>
            <tr> <td> Basım yılı: <input type="text" name="basimyil"></td></tr>
            <tr><td><input type="submit" value="Kaydet"></td></tr>
    </table>
    </form>
        <hr>
        <table>
            <tr>
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
$sorgu=mysqli_query($conn,$sql);
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
