<?php 
	//require function
	require 'function.php';

	//ambil file get
	$nama_barang = $_GET["nama_barang"];

	//query delete
	$query="DELETE from barang where nama_barang='$nama_barang'";
	mysqli_query($conn, $query);
	echo "<script>alert('Data barang berhasil dihapus'); document.location.href = 'index.php';</script>";
 ?>