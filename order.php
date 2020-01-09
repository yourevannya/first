<?php 
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
				<center>	
					<h2>Jadwal Orderan</h2>
				</center>
		
			</div>
		</div>
		<br>
			<center>
				<div>
					<?php foreach ($barang as $barang) : ?>
						<td><img src="Image/<?=$barang["desain"];?>" alt=""></td><br><br>
						<?=$barang["namaproduk"];?><br>
						<?=$barang["namapemesan"];?><br>
						<?=$barang["alamat"];?><br>
						<?=$barang["jumlah"];?><br>
					<?php endforeach; ?> 





											<!-- <table class="table">
												<thead class="table-dark">
													<tr>
														<th width="150px"><center>Produk</center></th>
														<th width="300px"><center>Nama Pemesan</center></th>
														<th width="450px"><center>Alamat</center></th>
														<th width="150px"><center>Jumlah</center></th>
														<th width="450px"><center>Desain</center></th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($barang as $barang) : ?>
														<tr>
															<td><?=$barang["namaproduk"];?></td>
															<td><?=$barang["namapemesan"];?></td>
															<td><?=$barang["alamat"];?></td>
															<td><center><?=$barang["jumlah"];?></center></td>
															<td>
																<?=$barang["desain"];?>
																<img style="height: 400px;width: 400px;" src="Image/<?=$barang["desain"];?>" alt=""><br><br>		
															</td>
														</tr>
													<?php endforeach; ?>
												</tbody>
											</table> -->
				</div>
			</center>
		</div>

	</div>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>