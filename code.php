<?php
session_start();
require 'koneksi.php';

if (isset($_POST['hapus_data_siswa'])) {
    $id_siswa = mysqli_real_escape_string($con, $_POST['hapus_data_siswa']);

    $query = "delete from siswa where id='$id_siswa' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Data Siswa Berhasil Dihapus";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Data Siswa Gagal Dihapus";
        header("Location: index.php");
        exit(0);
    }
}

if (isset($_POST['ubah_data_siswa'])) {
    $id_siswa = mysqli_real_escape_string($con, $_POST['id_siswa']);
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $no_hp = mysqli_real_escape_string($con, $_POST['no_hp']);
    $jurusan = mysqli_real_escape_string($con, $_POST['jurusan']);
    $umur = mysqli_real_escape_string($con, $_POST['umur']);
    $alamat = mysqli_real_escape_string($con, $_POST['alamat']);

    $query = "update siswa set nama='$nama', email='$email', no_hp='$no_hp', jurusan='$jurusan', umur='$umur', alamat='$alamat' where id='$id_siswa'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Data Siswa Berhasil Diubah";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Data Siswa Gagal Diubah";
        header("Location: index.php");
        exit(0);
    }
}


if (isset($_POST['simpan'])) {
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $no_hp = mysqli_real_escape_string($con, $_POST['no_hp']);
    $jurusan = mysqli_real_escape_string($con, $_POST['jurusan']);
    $umur = mysqli_real_escape_string($con, $_POST['umur']);
    $alamat = mysqli_real_escape_string($con, $_POST['alamat']);

    $query = "insert into siswa (nama,email,no_hp,jurusan,umur,alamat) values ('$nama', '$email', '$no_hp', '$jurusan', '$umur', '$alamat')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Data Siswa Berhasil Disimpan";
        header("Location: tambah_siswa.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Data Siswa Gagal Disimpan";
        header("Location: tambah_siswa.php");
        exit(0);
    }
}