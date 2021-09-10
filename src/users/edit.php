<?php

include '../../config/koneksi.php';
require_once '../../config/proses-data.php';
require_once '../../config/_koneksi.php';

 global $conn;

 $username = (isset($_GET['user']) ? $_GET['user'] : '');
 $query_data = mysqli_query($conn, "SELECT * FROM tb_anggota WHERE nij = '$username'");

//  if (!isset($_SESSION['simpan-data-edit'])) {
//      $_SESSION['simpan-data-edit'] = base64_encode(openssl_random_pseudo_bytes(32));
//  }

 if (isset($_POST['Edit'])) {
     $nij = $_POST['nij'];
     $nkj = $_POST['nkj'];
     $nama = $_POST['nama'];
     $tempatLahir = $_POST['tempat_lahir'];
     $tanggalLahir = $_POST['tanggal'];
     $jenis_kel = $_POST['jenis_kel'];
     $pendidikan_terakhir = $_POST['pendidikan'];
     $pekerjaan = $_POST['pekerjaan'];
     $status_dalam_kel = $_POST['status_dalam_kel'];
     $kode = $_POST['kode_rayon'];

     $data_anggota = [
       'nama' => $nama,
       'tempat_lahir' => $tempatLahir,
       'tanggal_lahir' => $tanggalLahir,
       'jenis_kelamin' => $jenis_kel,
       'pendidikan' => $pendidikan_terakhir,
       'pekerjaan' => $pekerjaan,
       'status' => $status_dalam_kel,
       'kode_rayon' => $kode,
       'nij' => $nij,
       'nkj' => $nkj,
      ];

     //  $check_Nij = mysqli_query($conn, "SELECT nkj FROM tb_anggota WHERE nij = '$nij'");

     //  if (mysqli_fetch_assoc($check_Nij)) {
     //      echo
     //          "<script>
     //              alert('NIJ sudah digunakan!');
     //          </script>";

     //      return false;
     //  }

     //  $query = "INSERT INTO tb_anggota VALUES ('$nij','$nkj','$nama','$tempatLahir','$tanggalLahir','$jenis_kel','$pendidikan_terakhir','$status_dalam_kel','$kode')";
     //  $insert_anggota = mysqli_query($conn, $query);

     //  if ($insert_anggota) {
     //      echo
     //          "<script>
     //              alert('Data berhasil ditambahkan!');
     //          </script>";
     //  }

     $dataAnggota = new Jemaat();
     $dataAnggota->edit_data_anggota($data_anggota);

     //  echo $nama;
    //  echo $tempatLahir;
    //  echo $tanggalLahir;
    //  echo $jenis_kel;
    //  echo $pendidikan_terakhir;
    //  echo $status_dalam_kel;
    //  echo $kode;
    //  echo '<br>';
    //  // echo $jumAnggota;
    //  echo $nij;
    //  echo '<br>';
    //  echo $nkj;
 }