<?php 
require_once '../../DB.php';
require_once 'header.php';

if(isset($_POST['submit'])){
  tambahDataPeminjaman($_POST);
}

$dataAnggota = ambilDataAnggota();
$dataBuku = ambilDataBuku();

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
			<label for="">Nama Anggota</label>
			<select name="id_anggota" id="" class="form-control">
				<?php foreach($dataAnggota as $dAng){ ?>
				<option value="<?php echo $dAng['id_anggota'] ?>"><?php echo $dAng['nama'] ?></option>
				<?php } ?>
			</select>
		</form-group>
		<div class="form-group">
			<label for="">Jumlah Buku</label>
			<select name="jumlah_buku" id="" class="form-control jumlah_buku">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
			</select>
		</div>
		<form-group>
			<label for="">Judul Buku</label>
			<select name="id_buku" id="" class="form-control">
				<?php foreach($dataBuku as $dBuk){ ?>
				<option value="<?php echo $dBuk['id_buku'] ?>"><?php echo $dBuk['judul'] ?></option>
				<?php } ?>
			</select>
			<select style="display: none" name="" id="" class="form-control id_buku2">
				<?php foreach($dataBuku as $dBuk){ ?>
				<option value="<?php echo $dBuk['id_buku'] ?>"><?php echo $dBuk['judul'] ?></option>
				<?php } ?>
			</select>
			<select style="display: none" name="" id="" class="form-control id_buku3">
				<?php foreach($dataBuku as $dBuk){ ?>
				<option value="<?php echo $dBuk['id_buku'] ?>"><?php echo $dBuk['judul'] ?></option>
				<?php } ?>
			</select>
		</form-group>
		<button class="btn btn-success" type="submit" name="submit">Kirim</button>
	</form>
</div>




      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../../index.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../assets/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../assets/js/demo/chart-area-demo.js"></script>
  <script src="../../assets/js/demo/chart-pie-demo.js"></script>

  <script>
  	$('.jumlah_buku').change(() => {
  		switch ($('.jumlah_buku').val()) {
  			case '1':
  				$('.id_buku2').attr('style','display: none');
  				$('.id_buku3').attr('style','display: none');
  				break;
  			case '2':
  				$('.id_buku2').attr('style','');
  				$('.id_buku2').attr('name','id_buku2');
  				$('.id_buku3').attr('style','display: none');
  				break;
  			case '3':
  				$('.id_buku2').attr('style','');
  				$('.id_buku2').attr('name','id_buku2');
  				$('.id_buku3').attr('style','');
  				$('.id_buku3').attr('name','id_buku3');
  				break;
  			default:
  				// statements_def
  				break;
  		}
  	});
  </script>

</body>

</html>
