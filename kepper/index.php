<?php
require_once '../DB.php'; 
require_once 'header.php';

$data = ambilDataLaporan();

 ?>

<div class="container-fluid">
  <table class="table table-bordered table-hover table-striped" >
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Tanggal</th>
	      <th scope="col">Jumlah Dipinjam</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php
	  	$i = 1;
	  	foreach ($data as $dt) { ?>
	    <tr>
	      <th scope="row"><?php echo $i ?></th>
	      <td><?php echo tgl_indo($dt['tgl_peminjaman']) ?></td>
	      <td><?php echo $dt['jumlah'] ?></td>
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