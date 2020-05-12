<?php 
require_once '../../DB.php';
require_once 'header.php';

if(isset($_POST['submit'])){
  tambahDataBuku($_POST);
}

 ?>


<div class="container-fluid">

	<?php 

	if(isset($_SESSION['pesan'])){

		 ?>

		 	<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Ditambah
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		 <?php 

		 session_unset();
	}

	 ?>
	
	<form class="form" action="" method="post">
		<form-group>
			<label for="">Judul</label>
			<input type="text" class="form-control" name="judul">
		</form-group>
		<form-group>
			<label for="">Penulis</label>
			<input type="text" class="form-control" name="penulis">
		</form-group>
		<button class="btn btn-success" type="submit" name="submit">Kirim</button>
	</form>
</div>


<?php 
require_once 'footer.php';

 ?>