<?php 
require_once '../../DB.php';
require_once 'header.php';

if(isset($_POST['submit'])){
  tambahDataAnggota($_POST);
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
			<label for="">NIM</label>
			<input type="text" class="form-control" name="nim">
		</form-group>
		<form-group>
			<label for="">Nama</label>
			<input type="text" class="form-control" name="nama">
		</form-group>
		<form-group>
			<label for="">Jurusan</label>
			<input type="text" class="form-control" name="jurusan">
		</form-group>
		<button class="btn btn-success" type="submit" name="submit">Kirim</button>
	</form>
</div>


<?php 
require_once 'footer.php';

 ?>