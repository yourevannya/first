<?php 
	//koneksi database
	$conn = mysqli_connect("localhost","root","","rpl");

	//fungsi untuk query
	function query($query)
	{
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) 
		{
			$rows[] = $row;
		}
		return $rows;
	}

	//fungsi untuk tambah data barang
	function tambah($data)
	{
		global $conn;
		$namaproduk = $data["namaproduk"];
		$namapemesan = $data["namapemesan"];
		$alamat = $data["alamat"];
		$notelp = $data["notelp"];
		$jumlah = $data["jumlah"];
		// $desain = $data["desain"];

		$desain = upload();
		if(!$desain)
		{
			return false;
		}

		
	 	//query insert
		$query = "INSERT INTO produk VALUES ('$namaproduk','$namapemesan','$alamat','$notelp','$jumlah','$desain')";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}

	function upload()
	{
		$namaFile = $_FILES['desain']['name'];
		$ukuranFile = $_FILES['desain']['size'];
		$error = $_FILES['desain']['error'];
		$tmpName = $_FILES['desain']['tmp_name'];

		//cek ada tidak gambar yang diupload
		if($error === 4)
		{
			echo " <script> alert('Pilih gambar dulu!'); </script> ";
			return false;
		}

		//cek apakah gambar yang diupload
		$ekstensifrmtgambar = ['jpg','jpeg','png'];
		$ekstensigambar = explode('.', $namaFile);
		$ekstensigambar = strtolower(end($ekstensigambar));
		if(!in_array($ekstensigambar, $ekstensifrmtgambar))
		{
			echo "<script> alert('yang diupload bukan gambar !'); </script>";
			return false;
		}

		//cek ukuran gambar
		if ($ukuranFile > 9000000)
		{
			echo "<script> alert('yang diupload bukan gambar !'); </script>";
			return false;	
		}

		//gambar lolos upload
		move_uploaded_file($tmpName,'Image/'.$namaFile);

		return $namaFile;
	}


	//fungsi untuk tambah data user
	function daftar($data)
	{
		global $conn;
		$id = $data["id"];
		$nama = $data["nama"];
		$email = $data["email"];
		$username = $data["username"];
		$password = $data["password"];

	 	//query masukkan data
		$query = "INSERT INTO user VALUES ('','nama','$email'$username','$password')";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}
?>