<?php 



$tanggal1 = new DateTime("2020-04-3");
$tanggal2 = new DateTime();
 
$perbedaan = $tanggal2->diff($tanggal1)->format("%a");
 
echo $perbedaan;

 ?>