<?php
require_once('../phpCode/queryCode.php');
if (array_key_exists("action",$_GET)){
	$action = $_GET['action'];
	$date = date('Y-m-d H:i:s');
	isset($id);
	isset($nama_lengkap);
	isset($jenis_kelamin);
	isset($alamat);
	isset($email);
	$created_at = $date;
	$updated_at = $date;
	if (array_key_exists("add_id",$_POST)) $id = $_POST['add_id'];
	if (array_key_exists("add_nama_lengkap",$_POST)) $nama_lengkap = $_POST['add_nama_lengkap'];
	if (array_key_exists("add_jenis_kelamin",$_POST)) $jenis_kelamin = $_POST['add_jenis_kelamin'];
	if (array_key_exists("add_alamat",$_POST)) $alamat = $_POST['add_alamat'];
	if (array_key_exists("add_email",$_POST)) $email = $_POST['add_email'];

	if (array_key_exists("update_id",$_POST)) $id = $_POST['update_id'];
	if (array_key_exists("update_nama_lengkap",$_POST)) $nama_lengkap = $_POST['update_nama_lengkap'];
	if (array_key_exists("update_jenis_kelamin",$_POST)) $jenis_kelamin = $_POST['update_jenis_kelamin'];
	if (array_key_exists("update_alamat",$_POST)) $alamat = $_POST['update_alamat'];
	if (array_key_exists("update_email",$_POST)) $email = $_POST['update_email'];

	if (array_key_exists("delete_id",$_POST)) $id = $_POST['delete_id'];	
	$c = new Connection;
	switch ($action) {
		case 'update':
				/*
				action for updating data
				aksi untuk mengubah data
				*/
				$data = array(
					"id" => $id,
					"nama_lengkap" => $nama_lengkap,
					"jenis_kelamin" => $jenis_kelamin,
					"alamat" => $alamat,
					"email" => $email,
					"updated_at" => $updated_at
					);
				$c->update($data);
			break;
		case 'delete':
				/*
				action for deleting data
				aksi untuk menghapus data
				*/
				$c->delete($id);
			break;
		case 'add':
				/*
				action for adding data
				aksi untuk menambah data
				*/
				$data = array(
					"nama_lengkap" => $nama_lengkap,
					"jenis_kelamin" => $jenis_kelamin,
					"alamat" => $alamat,
					"email" => $email,
					"created_at" => $created_at,
					"updated_at" => $updated_at
					);		
				$c->insert($data);
			break;
		default:
			echo "Modul tidak diketahui";
			break;
	}
}
header("Location: ../index.php");
die();
?>