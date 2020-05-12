<?php 
require_once '../../DB.php';
hapusDataAnggota($_GET['id']);

header("Location: index.php");


 ?>