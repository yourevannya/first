<?php 
	//awalan menggunakan session
	session_start();

	//ce jika sudah login
	if ( !isset($_SESSION["login"]) )
	 {
		echo "<script>alert('Silakan login dulu'); document.location.href = 'login.php';</script>";
	}

	//buka file function
	require 'function.php';

	//ambil database
	$barang = query("SELECT * FROM produk");

	//jika tombol tambah di klik
	if ( isset($_POST["submit"]) ) 
	{

		//masuk ke fungsi tambah
		if( tambah($_POST) > 0 )
		{
			echo "<script>alert('Data barang berhasil ditambahkan'); document.location.href = 'index.php';</script>";
			
		} 
		else
		{
			echo "<script>alert('Data barang gagal ditambahkan'); document.location.href = 'index.php';</script>";
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

	<title>Halaman Utama</title>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="#">DANKE</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-item nav-link" href="login.php">Login<span class="sr-only">(current)</span></a>
					<a class="nav-item nav-link" href="index.php">Custom Produk</a>
					<a class="nav-item nav-link" href="order.php">Jadwal Orderan</a>
				</div>
			</div>
		</nav>


		<div>
			<div>
				<h2>Selamat Datang <!-- <?=$_SESSION["username"];?> --></h2>
				<a class="badge badge-dark" href="logout.php">Logout</a>
			</div>
		</div>

		<div class="container" id="form">
		    <form  action="" method="post" enctype="multipart/form-data">
		    <div class="row mt-3">
		        <div class="col-md-7 mt-6">

		          <div class="form-group">
		            <label >Produk</label>
		            <select class="form-control" name="namaproduk">
				      <option value="Hoodie">Hoodie</option>
				      <option value="Kaos">Kaos</option>
				    </select>
		            <!-- <input type="text" name="namaproduk" class="form-control"  placeholder="Masukkan Produk (Produk yang tersedia Kaos dan Hoodie)"> -->
		          </div>

		          <div class="form-group">
		            <label >Nama Pemesan</label>
		            <input type="text" name="namapemesan" class="form-control"  placeholder="Masukkan Nama Pemesan (Harus sesuai nama user)">
		          </div>

		          <div class="form-group">
		            <label >Alamat</label>
		            <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat"></textarea>
		            <!-- 	 -->
		          </div>

		          <div class="form-group">
		            <label >No Telp</label>
		            <input type="text" name="notelp" class="form-control"  placeholder="Masukkan No Telp">
		          </div>

		          <div class="form-group">
		            <label >Jumlah</label>
		            <input type="text" name="jumlah" class="form-control"  placeholder="Masukkan Jumlah Produk">
		          </div>

		          <!-- <div class="form-group">
		            <label >Desain</label>
		            <input type="text" name="desain" class="form-control"  placeholder="Masukkan Link Desain">
		          </div> -->

		          <div>
		          	<label> Upload Desain</label><br>
					<input type="file" name="desain" class="form-control-file" >
		          	<br>
		          </div>

		          <button type="submit" name="submit" class="btn btn-dark">Tambah Data</button>
		          
		        </div>
		      </div>
		    </form>
   			<br>
		</div>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>