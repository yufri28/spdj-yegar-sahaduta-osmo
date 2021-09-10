<?php

$conn = mysqli_connect('localhost', 'root', '', 'spdj_yegar_osmo');

if (mysqli_connect_errno()) {
    echo 'Koneksi Gagal!:'.mysqli_connect_errno();
}

// // daftar KK baru
// function daftarKeluarga($dataKeluarga)
// {
//     global $conn;
//     $nkj = $dataKeluarga['nkj'];
//     $nij = $dataKeluarga['nij'];
//     $nama_kepalaKel = $dataKeluarga['nama'];
//     $password = $dataKeluarga['password'];
//     $kodeRayon = $dataKeluarga['kode_rayon'];

//     $check_Nkj = mysqli_query($conn, "SELECT nkj FROM tb_kepala_keluarga WHERE nkj = '$nkj'");

//     if (mysqli_fetch_assoc($check_Nkj)) {
//         echo
//         "<script>
//          alert('nkj sudah digunakan!');
//         </script>";

//         return false;
//     } else {
//         $pathJsonFile = '../database/json/generate.json';
//         $curData = file_get_contents($pathJsonFile);
//         $dataJson = json_decode($curData, true);

//         foreach ($dataJson as $key => $value) {
//             if ($value['kode_rayon'] === $kodeRayon) {
//                 //encripsi password
//                 $password = password_hash($password, PASSWORD_DEFAULT);
//                 //insert data admin ke datbase
//                 $sukses = mysqli_query($conn, "INSERT INTO tb_kepala_keluarga VALUES('$nkj','$nij','$nama_kepalaKel','$password','$kodeRayon')");
//                 ++$dataJson[$key]['jumlah_data'];
//                 $putData = json_encode($dataJson, JSON_PRETTY_PRINT);
//                 $simpan = file_put_contents($pathJsonFile, $putData);
//                 if ($simpan && $sukses) {
//                     echo
//                     "<script>
//                     alert('Daftar Berhasil!');
//                     </script>";
//                 }
//             }
//         }
//     }
// }

// // tambah anggota jemaat
// function tambahAnggota(){

// }

// // tambah admin baru
// function registrasi($data, $foto)
// {
//     global $conn, $konfirmasi_sukses;
//     $konfirmasi_sukses = false;
//     $username = stripcslashes($data['username']);
//     $password = mysqli_real_escape_string($conn, $data['password']);
//     $nama = $data['nama'];
//     $tempat_lahir = $data['tempat_lahir'];
//     $tanggal_lahir = $data['tanggal_lahir'];
//     $jenis_kelamin = $data['jenis_kelamin'];
//     $hak_akses = $data['hak_akses'];
//     $nama_file = $foto['nama_foto'];
//     $source = $foto['source'];
//     $folder = $foto['folder'];

//     $result = mysqli_query($conn, "SELECT username FROM login_admin WHERE username = '$username'");

//     if (mysqli_fetch_assoc($result)) {
//         echo
//         "<script>
//          alert('username sudah digunakan!');
//         </script>";

//         return false;
//     } else {
//         //encripsi password
//         $password = password_hash($password, PASSWORD_DEFAULT);
//         //insert data admin ke datbase
//         $sukses = mysqli_query($conn, "INSERT INTO login_admin VALUES('','$username','$password','$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$hak_akses','$nama_file')");
//         // simpan file gambar
//         move_uploaded_file($source, $folder.$nama_file);
//         // simpan data admin ke json file
//         $json_login_admin = '../../data/database/login-admin.json';
//         $cur_data = file_get_contents($json_login_admin);
//         $all_data = json_decode($cur_data, true);
//         $all_data = [$data, $foto];
//         $array_data[] = $all_data;
//         $putData = json_encode($array_data, JSON_PRETTY_PRINT);
//         $simpan = file_put_contents($json_login_admin, $putData);

//         if ($sukses && $simpan) {
//             $konfirmasi_sukses = 1;
//         } else {
//             $konfirmasi_sukses = 2;
//         }

//         return mysqli_affected_rows($conn);
//     }
// }