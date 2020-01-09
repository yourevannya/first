<?php 
	//awalan menggunakan session
	session_start();

	//cek apakah sudah login
	if ( !isset($_SESSION["login"]) )
	{
		header("location:login.php");
		exit;
	}

	//buka file function.php
	require 'function.php';

	//ambil file get nama_barang
	$nama_barang = $_GET["nama_barang"];

	//ambil spesifik data barang
	$barang = query("SELECT * FROM barang WHERE nama_barang = '$nama_barang'");

	//jika tombol klik di pilih
	if ( isset($_POST["submit"]) ) 
	{
		if( edit($_POST) > 0 )
		{
			echo "<script>alert('Data berhasil diedit'); document.location.href = 'index.php';</script>";		
		} 
		else
		{
			echo "<script>alert('Data gagal diedit'); document.location.href = 'index.php';</script>";
		}
	}
?>

<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<title>Edit Data</title>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="#">Latihan Responsi</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-item nav-link" href="login.php">Login<span class="sr-only">(current)</span></a>
					<a class="nav-item nav-link" href="index.php">Home</a>
				</div>
			</div>
		</nav>


		<div>
			<div>
				<h2>Edit Data</h2>
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-md-4">
				<form method="post" action="">
					<div class="form-group">
						<?php foreach($barang as $barang) : ?>
						<label>Nama Barang</label>
						<input type="text" name="nama_barang" class="form-control" value="<?=$barang["nama_barang"];?>">
					<?php endforeach; ?>
					</div>
					<div class="form-group">
						<label>Harga Barang</label>
						<input type="text" name="harga_barang" class="form-control" value="<?=$barang["harga_barang"];?>">
					</div>
					<div class="form-group">
						<label>Stock Barang</label>
						<input type="text" name="stock_barang" class="form-control" value="<?=$barang["stock_barang"];?>">
					</div>
					<button type="submit" name="submit" class="btn btn-dark">Edit</button>
				</form>
			</div>
		</div>

	</div>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>