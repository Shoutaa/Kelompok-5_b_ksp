<?php 
$tanggal = strtotime('2024-05-27');
$penambah = 4 * 24*60*60;

$jumlah = $tanggal + $penambah;
// echo $tanggal.' + '.$penambah.' = '.date('Y-m-d',$jumlah);

$nextmonth = mktime(0, 0, 0, date("m", $tanggal)+12, date("d", $tanggal), date("Y", $tanggal));
echo date('Y-m-d',$nextmonth);
 ?>