<?php
	include("koneksi.php");

	$result = "";
	if(isset($_GET['saveDataBarang'])){
		$namaBarang = $_POST['namaBarang'];
		$varianBarang = $_POST['varianBarang'];
		$hargaBeli = $_POST['hargaBeli'];
		$hargaJual = $_POST['hargaJual'];

		if($namaBarang == "" || $varianBarang == "" || $hargaBeli == "" || $hargaJual == ""){
			$result = '<div class="alert alert-danger text-white">Lengkapi Formulir!</div>';
		}
		else{
			$query = mysqli_query($konek, "SELECT * FROM `tabelbarang` WHERE `namaBarang` = '$namaBarang'") or die(mysqli_error($konek));
			if(mysqli_num_rows($query) == 0){
				$query = mysqli_query($konek, "INSERT INTO `tabelbarang` VALUES(DEFAULT, '$namaBarang', '$varianBarang', '$hargaBeli', '$hargaJual', 0, 0, 0)") or die(mysqli_error($konek));
				if($query){
					$result = '<div class="alert alert-success text-white">Sukses!</div>';
				}
				else{
					$result = '<div class="alert alert-danger text-white">Gagal Menyimpan!</div>';
				}
			}
			else{
				$result = '<div class="alert alert-danger text-white">'.$namaBarang.' sudah tersedia</div>';
			}
		}
	}

	if(isset($_GET['getDataBarang'])){
		$query = mysqli_query($konek, "SELECT * FROM `tabelbarang`") or die(mysqli_error($konek));
		$data = "";
		if(mysqli_num_rows($query) != 0){
			while($row = mysqli_fetch_array($query)){
				$inbound = mysqli_query($konek, "SELECT SUM(jumlahBarang) FROM `tabelinbound` WHERE `namaBarang` = '$row[namaBarang]' AND `varianBarang` = '$row[varianBarang]' AND `status` = 1") or die(mysqli_error($konek));
				$data .= '<tr>
	                      <td class="align-middle text-center text-capitalize">
	                        '.$row[1].'
	                      </td>
	                      <td class="align-middle text-center">
	                        '.$row[2].'
	                      </td>
	                      <td class="align-middle text-center">
	                        Rp. '.$row[3].',-
	                      </td>
	                      <td class="align-middle text-center">
	                        Rp. '.$row[4].',-
	                      </td>
	                      <td class="align-middle text-center">
	                        '.$row[5]+mysqli_fetch_array($inbound)[0].'
	                      </td>
	                    </tr>';
			}
			$result = $data;
		}
		else{
			$result = '<tr>
                      <td colspan="5" class="align-middle text-center">
                        Tidak ada Data tersedia
                      </td>
                    </tr>';
		}
	}

	//DRIVER
	if(isset($_GET['saveDataDriver'])){
		$namaDriver = $_POST['namaDriver'];

		if($namaDriver == ""){
			$result = '<div class="alert alert-danger text-white">Lengkapi Formulir!</div>';
		}
		else{
			$query = mysqli_query($konek, "SELECT * FROM `tabeldriver` WHERE `namaDriver` = '$namaDriver'") or die(mysqli_error($konek));
			if(mysqli_num_rows($query) == 0){
				$query = mysqli_query($konek, "INSERT INTO `tabeldriver` VALUES(DEFAULT, '$namaDriver')") or die(mysqli_error($konek));
				if($query){
					$result = '<div class="alert alert-success text-white">Sukses!</div>';
				}
				else{
					$result = '<div class="alert alert-danger text-white">Gagal Menyimpan!</div>';
				}
			}
			else{
				$result = '<div class="alert alert-danger text-white">'.$namaDriver.' sudah tersedia</div>';
			}
		}
	}

	if(isset($_GET['getDataDriver'])){
		$query = mysqli_query($konek, "SELECT * FROM `tabeldriver`") or die(mysqli_error($konek));
		$data = "";
		if(mysqli_num_rows($query) != 0){
			while($row = mysqli_fetch_array($query)){
				$data .= '<tr>
	                      <td class="align-middle text-center text-capitalize">
	                        '.$row[1].'
	                      </td>
	                      <td class="align-middle text-center">
	                        Aktif
	                      </td>
	                      <td class="align-middle text-center">
	                        Tidak Ada
	                      </td>
	                    </tr>';
			}
			$result = $data;
		}
		else{
			$result = '<tr>
                      <td colspan="3" class="align-middle text-center">
                        Tidak ada Data tersedia
                      </td>
                    </tr>';
		}
	}

	//INBOUND
	if(isset($_GET['saveDataInbound'])){
		$nomorInbound = $_POST['nomorInbound'];
		$namaBarang = $_POST['namaBarang'];
		$varianBarang = $_POST['varianBarang'];
		$jumlahBarang = $_POST['jumlahBarang'];

		if($namaBarang == "" || $varianBarang == "" || $jumlahBarang == ""){
			$result = '<div class="alert alert-danger text-white">Lengkapi Formulir!</div>';
		}
		else{
			$query = mysqli_query($konek, "INSERT INTO `tabelinbound` VALUES(DEFAULT, '$nomorInbound', '$namaBarang', '$varianBarang', '$jumlahBarang', 0)") or die(mysqli_error($konek));
			if($query){
				$result = '<div class="alert alert-success text-white">Sukses!</div>';
			}
			else{
				$result = '<div class="alert alert-danger text-white">Gagal Menyimpan!</div>';
			}
		}
	}

	if(isset($_GET['getDataInbound'])){
		$query = mysqli_query($konek, "SELECT * FROM `tabelinbound` WHERE `nomorInbound` = '$_GET[getDataInbound]'") or die(mysqli_error($konek));
		$data = "";
		if(mysqli_num_rows($query) != 0){
			while($row = mysqli_fetch_array($query)){
				$data .= '<tr>
                      <td class="align-middle text-center text-capitalize">
                        '.$row[2].'
                      </td>
                      <td class="align-middle text-center">
                        '.$row[3].'
                      </td>
                      <td class="align-middle text-center">
                        '.$row[4].'
                      </td>
                      <td class="align-middle text-center">
                        <button onclick="deleteDataInbound('.$row[0].')" type="button" class="btn btn-sm bg-gradient-danger btn-lg mt-2 mb-0">Hapus</button>
                      </td>
                    </tr>';
			}
			$result = $data;
		}
		else{
			$result = '<tr>
                      <td colspan="3" class="align-middle text-center">
                        Tidak ada Data tersedia
                      </td>
                    </tr>';
		}
	}

	if(isset($_GET['deleteDataInbound'])){
		$query = mysqli_query($konek, "DELETE FROM `tabelinbound` WHERE `idInbound` = '$_POST[id]'") or die(mysqli_error($konek));
		if($query){
			$result = "success";
		}
	}

	if(isset($_GET['accDataInbound'])){
		$nomorInbound = $_POST['nomorInbound'];
		$query = mysqli_query($konek, "UPDATE `tabelinbound` SET `status` = '1' WHERE `nomorInbound` = '$nomorInbound'") or die(mysqli_error($konek));
		if($query){
			$result = "success";
		}
	}

	echo $result;