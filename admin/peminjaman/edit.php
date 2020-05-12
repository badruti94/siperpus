<?php 
require_once '../../DB.php';



$data = ambilDataPeminjamanById($_GET['id']);
if(isset($_POST['submit'])){
  updateDataPeminjaman($_POST);

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
			<label for="">Id Anggota</label>
			<input type="text" class="form-control" name="id_anggota" value="<?php echo $data['id_anggota'] ?>"  >
		</form-group>
		<form-group>
			<label for="">Id Buku</label>
			<input type="text" class="form-control" name="id_buku" value="<?php echo $data['id_buku'] ?>"  >
		</form-group>
		<form-group>
			<label for="">Status</label>
			<input type="text" class="form-control" name="status" value="<?php echo $data['status'] ?>"  >
		</form-group>
		<form-group>
			<label for="">Tgl Peminjaman</label>
			<input type="date" class="form-control" name="tgl_peminjaman" value="<?php echo $data['tgl_peminjaman'] ?>"  >
		</form-group>
		<button class="btn btn-success" type="submit" name="submit">Kirim</button>
	</form>
</div>


<?php 
require_once 'footer.php';

 ?>