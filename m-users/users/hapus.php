<?php

require_once '../../config/proses-data.php';
require_once '../../config/_koneksi.php';

if (isset($_POST['hapus'])) {
    $nij = $_POST['nij'];
    $obj = new Jemaat();
    $obj->hapus_data_anggota($nij);
}
// $username = (isset($_GET['user']) ? $_GET['user'] : '');

// $konf = (isset($_GET['konfir']) ? $_GET['konfir'] : '');

// if ($konfirmasi == 'Yes') {
//     $obj = new Jemaat();
//     $obj->hapus_data_anggota($username);
// } else {
//     header('location: ../index.php');
//     exit;
// }