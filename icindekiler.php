<?php
$sn=$_GET["sn"];

switch($sn)
{
    case "anasyfa": include('index.php'); break;
    case "kutuphane": include('kutuphane.php'); break;
    case "kitaplar": include('kitaplar.php'); break;
    case "hakkimizda": include('hakkimizda.php'); break;
    case "iletisim": include('iletisim.php'); break;
    default: include('#'); break;
}