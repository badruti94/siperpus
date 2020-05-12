<?php 
require_once '../../DB.php';
require_once 'header.php';

$data = ambilDataPeminjaman();

function ambilBuku($id){
	$buku = ambilDataBukuById($id);
	return $buku['judul'];
}

function denda($tgl){
	$tanggal1 = new DateTime($tgl);
	$tanggal2 = new DateTime();
	 
	$selisih = $tanggal2->diff($tanggal1)->format("%a");

	$denda = $selisih * 1000;

	return number_format($denda, 0, ',','.');

}

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
	      <th scope="col">Nama Anggota</th>
	      <th scope="col">Judul Buku</th>
	      <th scope="col">Status</th>
	      <th scope="col">Tgl Peminjaman</th>
	      <th scope="col">Denda</th>
	      <th scope="col" colspan="3" class="text-center" >Aksi</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php
	  	$i = 1;
	  	foreach ($data as $dt) { ?>
	    <tr>
	      <th scope="row"><?php echo $i ?></th>
	      <td><?php echo $dt['nama'] ?></td>

	      <?php 

	      	

	      	$id_buku = explode(',', $dt['id_buku']);

	      	$judul = '';
	      	foreach($id_buku as $idb){
	      		$judul = $judul  . ambilBuku($idb) . ', ';
	      	}

	      	$judul = substr($judul, 0, -2);

	       ?>


	      <td><?php echo $judul ?></td>
	      <td><?php echo $dt['status'] ?></td>
	      <td><?php echo tgl_indo($dt['tgl_peminjaman']) ?></td>
	      <td>Rp. <?php echo denda($dt['tgl_peminjaman']) ?></td>
	      <td class="text-center" ><a href="kembalikan.php?id=<?php echo $dt['id_peminjaman'] ?>"  ><i class="fas fa-check text-warning" ></i></a></td>
	      <td class="text-center" ><a href="edit.php?id=<?php echo $dt['id_peminjaman'] ?>"  ><i class="fas fa-edit text-warning" ></i></a></td>
	      <td class="text-center" ><a onclick="return confirm('Data Akan dihapus?');" href="hapus.php?id=<?php echo $dt['id_peminjaman'] ?>"  ><i class="fas fa-trash text-danger" ></i></a></td>
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