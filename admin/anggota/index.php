<?php 
require_once '../../DB.php';
require_once 'header.php';

$data = ambilDataAnggota();

 ?>

<div class="container-fluid">
	<?php 

	if(isset($_SESSION['pesan'])){

		 ?>

		 	<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Dihapus
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		 <?php 

		 session_unset();
	}

	 ?>


	<a class="btn btn-success" href="tambah.php">Tambah <i class="fas fa-plus" ></i> </a>
	 <table class="table table-bordered table-hover table-striped" >
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">NIM</th>
	      <th scope="col">Nama</th>
	      <th scope="col">Jurusan</th>
	      <th scope="col" colspan="2" class="text-center" >Aksi</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php
	  	$i = 1;
	  	foreach ($data as $dt) { ?>
	    <tr>
	      <th scope="row"><?php echo $i ?></th>
	      <td><?php echo $dt['nim'] ?></td>
	      <td><?php echo $dt['nama'] ?></td>
	      <td><?php echo $dt['jurusan'] ?></td>
	      <td class="text-center" ><a href="edit.php?id=<?php echo $dt['id_anggota'] ?>"  ><i class="fas fa-edit text-warning" ></i></a></td>
	      <td class="text-center" ><a onclick="return confirm('Data Akan dihapus?');" href="hapus.php?id=<?php echo $dt['id_anggota'] ?>"  ><i class="fas fa-trash text-danger" ></i></a></td>
	    </tr>
	    <?php 
	    $i++;
	}
	     ?>
	  </tbody>
	</table>
</div>


<?php 
require_once 'footer.php';

 ?>