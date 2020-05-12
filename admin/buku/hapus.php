<?php 
require_once '../../DB.php';
hapusDataBuku($_GET['id']);

header("Location: index.php");


 ?>