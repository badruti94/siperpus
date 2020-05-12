<?php 
require_once '../../DB.php';



$data = ambilDataAnggotaById($_GET['id']);
if(isset($_POST['submit'])){
  updateDataAnggota($_POST);

  header("Location: index.php");
  exit;
}


require_once 'header.php';

 ?>


<div class="container-fluid">

		<?php 

	if(isset($_SESSION['pesan'])){

		 ?>

		 	<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Diubah
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		 <?php 

		 session_unset();
	}

	 ?>

	<form class="form" action="" method="post">
		<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" >
		<form-group>
			<label for="">NIM</label>
			<input type="text" class="form-control" name="nim" value="<?php echo $data['nim'] ?>" >
		</form-group>
		<form-group>
			<label for="">Nama</label>
			<input type="text" class="form-control" name="nama" value="<?php echo $data['nama'] ?>" >
		</form-group>
		<form-group>
			<label for="">Jurusan</label>
			<input type="text" class="form-control" name="jurusan" value="<?php echo $data['jurusan'] ?>" >
		</form-group>
		<button class="btn btn-success" type="submit" name="submit">Kirim</button>
	</form>
</div>


<?php 
require_once 'footer.php';

 ?>