<?php

session_start();

//koneksi
$conn = mysqli_connect('localhost','root','','siperpus');

//login
function login($data){
	global $conn;

	$username = $data['username'];
	$password = $data['password'];

	$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $query);
	$result = mysqli_fetch_assoc($result);


	if($result == null){
		$_SESSION['pesan'] = 'Password Salah';

		header("Location: index.php");
		exit;
	}

	if($result['level'] == 'admin'){
		header("Location: admin/index.php");
		exit;
	}else{
		header("Location: kepper/index.php");
		exit;
	}
}

function register($data){
	global $conn;

	$username = $data['username'];
	$password = $data['password'];
	$level = $data['level'];

	$query = "INSERT INTO user(username, password, level) VALUES('$username','$password','$level')";
	$result = mysqli_query($conn, $query);
}


//Admin
//-anggota
function ambilDataAnggota(){
	global $conn;

	$query = "SELECT * FROM anggota";
	$result = mysqli_query($conn, $query);

	$rows = [];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}

	return $rows;

}

function tambahDataAnggota($data){
	global $conn;

	$nim = $data['nim'];
	$nama = $data['nama'];
	$jurusan = $data['jurusan'];

	$query = "INSERT INTO anggota(nim, nama, jurusan) VALUES('$nim','$nama','$jurusan')";
	$result = mysqli_query($conn, $query);

	pesan();
}

function ambilDataAnggotaById($id){
	global $conn;

	$query = "SELECT * FROM anggota WHERE id_anggota='$id'";
	$result = mysqli_query($conn, $query);
	$result = mysqli_fetch_assoc($result);

	return $result;
}

function updateDataAnggota($data){
	global $conn;

	$id = $data['id'];
	$nim = $data['nim'];
	$nama = $data['nama'];
	$jurusan = $data['jurusan'];

	$query = "UPDATE anggota SET nim='$nim', nama='$nama', jurusan='$jurusan' WHERE id_anggota='$id'";
	$result = mysqli_query($conn, $query);


}

function hapusDataAnggota($id){
	global $conn;

	$query = "DELETE FROM anggota WHERE id_anggota='$id'";
	$result = mysqli_query($conn, $query);

	pesan();
}

//-buku
function ambilDataBuku(){
	global $conn;

	$query = "SELECT * FROM buku";
	$result = mysqli_query($conn, $query);

	$rows = [];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}

	return $rows;

}

function tambahDataBuku($data){
	global $conn;

	$judul = $data['judul'];
	$penulis = $data['penulis'];

	$query = "INSERT INTO buku(judul, penulis) VALUES('$judul','$penulis')";
	$result = mysqli_query($conn, $query);

	pesan();
}

function ambilDataBukuById($id){
	global $conn;

	$query = "SELECT * FROM buku WHERE id_buku='$id'";
	$result = mysqli_query($conn, $query);
	$result = mysqli_fetch_assoc($result);

	return $result;
}

function updateDataBuku($data){
	global $conn;

	$id = $data['id'];
	$judul = $data['judul'];
	$penulis = $data['penulis'];

	$query = "UPDATE buku SET judul='$judul', penulis='$penulis' WHERE id_buku='$id'";
	$result = mysqli_query($conn, $query);

	
}

function hapusDataBuku($id){
	global $conn;

	$query = "DELETE FROM buku WHERE id_buku='$id'";
	$result = mysqli_query($conn, $query);

	pesan();
}

//-peminjaman
function ambilDataPeminjaman(){
	global $conn;

	$query = "SELECT * FROM v_peminjaman";
	$result = mysqli_query($conn, $query);

	$rows = [];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}

	return $rows;

}

function tambahDataPeminjaman($data){
	global $conn;

	switch ($data['jumlah_buku']) {
		case '1':
			$id_buku = $data['id_buku'] . ",";
			break;
		case '2':
			$id_buku = implode(",",[$data['id_buku'],$data['id_buku2']]);
			break;
		case '3':
			$id_buku = implode(",",[$data['id_buku'],$data['id_buku2'], $data['id_buku3']]);
			break;
	}

	$id_anggota = $data['id_anggota'];
	$jumlah_buku = $data['jumlah_buku'];
	$status = "Belum Dikembalikan";
	$tgl_peminjaman = date("Y-m-d");


	$query = "INSERT INTO peminjaman(id_anggota, id_buku, status, tgl_peminjaman) VALUES('$id_anggota','$id_buku','$status','$tgl_peminjaman')";
	$result = mysqli_query($conn, $query);

	pesan();
}

function ambilDataPeminjamanById($id){
	global $conn;

	$query = "SELECT * FROM peminjaman WHERE id_peminjaman='$id'";
	$result = mysqli_query($conn, $query);
	$result = mysqli_fetch_assoc($result);

	return $result;
}

function updateDataPeminjaman($data){
	global $conn;

	$id = $data['id'];
	$id_anggota = $data['id_anggota'];
	$id_buku = $data['id_buku'];
	$status = $data['status'];
	$tgl_peminjaman = $data['tgl_peminjaman'];

	$query = "UPDATE peminjaman SET id_anggota = '$id_anggota', id_buku = '$id_buku', status = '$status', tgl_peminjaman = '$tgl_peminjaman'
	WHERE id_peminjaman='$id'";
	$result = mysqli_query($conn, $query);

	
}

function hapusDataPeminjaman($id){
	global $conn;

	$query = "DELETE FROM peminjaman WHERE id_peminjaman='$id'";
	$result = mysqli_query($conn, $query);

	pesan();
}

function dikembalikanPeminjaman($id){
	global $conn;
	$query = "UPDATE peminjaman SET status='Sudah Dikembalikan' WHERE id_peminjaman='$id'";
	$result = mysqli_query($conn, $query);
}

function ambilDataLaporan(){
	global $conn;
	$query = "SELECT * FROM v_kepper";
	$result = mysqli_query($conn, $query);

	$rows = [];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}

	return $rows;
}

function pesan(){
	$_SESSION['pesan'] = true;
}

function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tahun
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tanggal
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

 ?>