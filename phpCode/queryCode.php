<?php

class Connection{
	/*
	Create connection into database
	Membuat koneksi dengan database
	*/
	private function dbConnection(){
		$db = new mysqli('localhost', 'root', '', 'db_anggota');
		if($db->connect_errno > 0){
			echo("<script>alert(\"Unable to connect to database [".$db->connect_error."]\");</script>");
		}
		return $db;	
	}

	/*
	mysqli function to insert data into table
	fungsi mysqli untuk memasukan data ke dalam tabel
	*/
	public function insert($data){
		$value = 1;
		$db = $this->dbConnection();
		$sql = "INSERT INTO `t_anggota`(`nama_lengkap`, `jenis_kelamin`, `alamat`, `email`, `created_at`, `updated_at`) VALUES ( \"".$data['nama_lengkap']."\", \"".$data['jenis_kelamin']."\", \"".$data['alamat']."\", \"".$data['email']."\", \"".$data['created_at']."\", \"".$data['updated_at']."\")";	
		if(!$result = $db->query($sql)){
			echo("<script>alert(\"There was an error running the query [". $db->error ."]\");</script>");
			$value = 0;
		}
		$db->close();
		return $value;
	}

	/*
	mysqli function to update data on table
	fungsi mysqli untuk mengubah data pada tabel
	*/
	public function update($data){
		$value = 1;
		$db = $this->dbConnection();
		$sql = "UPDATE `t_anggota` SET `nama_lengkap` = \"".$data['nama_lengkap']."\", `jenis_kelamin` = \"".$data['jenis_kelamin']."\" , `alamat` = \"".$data['alamat']."\" , `email` = \"".$data['email']."\" , `updated_at` = \"".$data['updated_at']."\" WHERE `id`= ".$data['id']." ";
		if(!$result = $db->query($sql)){
			echo("<script>alert(\"There was an error running the query [". $db->error ."]\");</script>");
			$value = 0;
		}
		$db->close();
		return $value;
	}

	/*
	mysqli function to delete data on table
	fungsi mysqli untuk menghapus data pada tabel
	*/	
	public function delete($id){
		$value = 1;
		$db = $this->dbConnection();
		$sql = "DELETE FROM `t_anggota` WHERE `id`= ".$id;
		if(!$result = $db->query($sql)){
			echo("<script>alert(\"There was an error running the query [". $db->error ."]\");</script>");
			$value = 0;
		}
		$db->close();
		return $value;
	}

	/*
	mysqli function to select all data on table
	fungsi mysqli untuk mengambil semua data pada tabel
	*/
	public function select(){
		$value = NULL;
		$db = $this->dbConnection();
		$sql = "SELECT * FROM `t_anggota` ORDER BY `id` ASC";
		if(!$result = $db->query($sql)){
			echo("<script>alert(\"There was an error running the query [". $db->error ."]\");</script>");
		}else{
			$value = $result->fetch_all();
		}
		$db->close();
		return $value;
	}

	/*
	mysqli function to select data on table by id
	fungsi mysqli untuk mengambil data pada tabel berdasarkan id
	*/
	public function select_where_id($id){
		$value = NULL;
		$db = $this->dbConnection();
		$sql = "SELECT * FROM `t_anggota` WHERE `id` = ".$id;
		if(!$result = $db->query($sql)){
			echo("<script>alert(\"There was an error running the query [". $db->error ."]\");</script>");
		}else{
			$value = $result->fetch_all();
		}
		$db->close();
		return $value;
	}	

	/*
	mysqli function to get last id and increment it once.
	fungsi mysqli untuk mengambil id terakhir dan menambahkan satu
	*/
	public function select_last_id(){
		$value = 1;
		$db = $this->dbConnection();
		$sql = "SELECT `id` FROM `t_anggota` ORDER BY `id` DESC LIMIT 1";
		if(!$result = $db->query($sql)){
			echo("<script>alert(\"There was an error running the query [". $db->error ."]\");</script>");
		}else{
			$r = $result->fetch_assoc();
			$value = $r['id']+1;
		}
		$db->close();
		return $value;
	}

}
	

?>