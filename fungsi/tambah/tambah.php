<?php 
session_start();
if(!empty($_SESSION['admin'])){
	require '../../config.php';
	if(!empty($_GET['kategori'])){
		$nama= $_POST['kategori'];
		$tgl= date("j F Y, G:i");
		$data[] = $nama;
		$data[] = $tgl;
		$sql = 'INSERT INTO kategori (nama_kategori,tgl_input) VALUES(?,?)';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=kategori&&success=tambah-data"</script>';
	}
	if(!empty($_GET['supplier'])){
		$nama= $_POST['supplier'];
		$alamat= $_POST['alamat'];
		$telepon= $_POST['telepon'];
		$tgl= date("j F Y, G:i");
		$data[] = $nama;
		$data[] = $tgl;
		$data[] = $alamat;
		$data[] = $telepon;
		$sql = 'INSERT INTO supplier (nama_supplier,tgl_input,alamat_supplier,telepon) VALUES(?,?,?,?)';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=supplier&&success=tambah-data"</script>';
	}
	if(!empty($_GET['pelanggan'])){
		$nama= $_POST['pelanggan'];
		$alamat= $_POST['alamat'];
		$telepon= $_POST['telepon'];
		$tgl= date("j F Y, G:i");
		$data[] = $nama;
		$data[] = $tgl;
		$data[] = $alamat;
		$data[] = $telepon;
		$sql = 'INSERT INTO pelanggan (nama_pelanggan,tgl_input,alamat_pelanggan,telepon) VALUES(?,?,?,?)';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=pelanggan&&success=tambah-data"</script>';
	}
	if(!empty($_GET['users'])){
		$nama= $_POST['nama'];
		$username = $_POST['username'];
		$alamat= $_POST['alamat'];
		$telepon= $_POST['telepon'];
		$email= $_POST['email'];
		$nik = $_POST['nik'];
		$password= $_POST['password'];
		$role= $_POST['role'];
		$data[] = $nama;
		$data[] = $alamat;
		$data[] = $telepon;
		$data[] = $email;
		$data[] = '';
		$data[] = $nik;
		$sql = 'INSERT INTO member (nm_member,alamat_member,telepon,email,gambar,NIK) VALUES(?,?,?,?,?,?)';
		$row = $config -> prepare($sql);
		$row -> execute($data);

		$sql = "select*from member where nm_member=?";
		$row = $config -> prepare($sql);
		$row -> execute(array($nama));
		$hasil = $row -> fetch();
		
		$login[] = $username;
		$login[] = $password;
		$login[] = $hasil['id_member'];
		$login[] = $role;

		$sql = "INSERT INTO login (user,pass,id_member,role) VALUES(?,md5(?),?,?)";
		$row = $config -> prepare($sql);
		$row -> execute($login);

		echo '<script>window.location="../../index.php?page=users&&success-tambah=tambah-data"</script>';
	}
	if(!empty($_GET['barang'])){
		$id = $_POST['id'];
		$kategori = $_POST['kategori'];
		$supplier = $_POST['supplier'];
		$nama = $_POST['nama'];
		$merk = $_POST['merk'];
		$beli = $_POST['beli'];
		$jual = $_POST['jual'];
		$satuan = $_POST['satuan'];
		$stok = $_POST['stok'];
		$tgl = $_POST['tgl'];
		
		$data[] = $id;
		$data[] = $kategori;
		$data[] = $supplier;
		$data[] = $nama;
		$data[] = $merk;
		$data[] = $beli;
		$data[] = $jual;
		$data[] = $satuan;
		$data[] = $stok;
		$data[] = $tgl;
		$sql = 'INSERT INTO barang (id_barang,id_kategori,id_supplier,nama_barang,merk,harga_beli,harga_jual,satuan_barang,stok,tgl_input) 
			    VALUES (?,?,?,?,?,?,?,?,?,?) ';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=barang&success=tambah-data"</script>';
	}
	if(!empty($_GET['jual'])){
		$id = $_GET['id'];
		
		// get tabel barang id_barang 
		$sql = 'SELECT * FROM barang WHERE id_barang = ?';
		$row = $config->prepare($sql);
		$row->execute(array($id));
		$hsl = $row->fetch();

		if($hsl['stok'] > 0)
		{
			$kasir =  $_GET['id_kasir'];
			$jumlah = 1;
			$total = $hsl['harga_jual'];
			$tgl = date("j F Y, G:i");
			
			$data1[] = $id;
			$data1[] = $kasir;
			$data1[] = 1;
			$data1[] = $jumlah;
			$data1[] = $total;
			$data1[] = $tgl;
			
			$sql1 = 'INSERT INTO penjualan (id_barang,id_member,id_pelanggan,jumlah,total,tanggal_input) VALUES (?,?,?,?,?,?)';
			$row1 = $config -> prepare($sql1);
			$row1 -> execute($data1);

			echo '<script>window.location="../../index.php?page=jual&success=tambah-data"</script>';

		}else{
			echo '<script>alert("Stok Barang Anda Telah Habis !");
					window.location="../../index.php?page=jual#keranjang"</script>';
		}
	}
}