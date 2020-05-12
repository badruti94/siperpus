<?php 
require_once '../../DB.php';
dikembalikanPeminjaman($_GET['id']);

header("Location: index.php");


 ?>