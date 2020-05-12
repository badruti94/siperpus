<?php 
require_once '../../DB.php';



$data = ambilDataBukuById($_GET['id']);
if(isset($_POST['submit'])){
  updateDataBuku($_POST);

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
			<label for="">Judul</label>
			<input type="text" class="form-control" name="judul" value="<?php echo $data['judul'] ?>" >
		</form-group>
		<form-group>
			<label for="">Penulis</label>
			<input type="text" class="form-control" name="penulis" value="<?php echo $data['penulis'] ?>" >
		</form-group>
		<button class="btn btn-success" type="submit" name="submit">Kirim</button>
	</form>
</div>


<?php 
require_once 'footer.php';

 ?>