<?php 
require_once '../../DB.php';
hapusDataPeminjaman($_GET['id']);

header("Location: index.php");


 ?>