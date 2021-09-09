<?php

// // $conn = mysqli_connect('localhost', 'root', '', 'spdj_yegar_osmo');
// // if (mysqli_connect_errno()) {
// //     echo 'Koneksi Gagal!:'.mysqli_connect_errno();
// // }
// include '../config/koneksi.php';
// // include '../views/users/Dasboard.php';

// class Login
// {
//     public $username;
//     public $password;

//     public function __construct($username, $password)
//     {
//         $this->username = $username;
//         $this->password = $password;
//     }

//     // Login
//     public function login()
//     {
//         global $conn;

//         $login_user = mysqli_query($conn, "SELECT * FROM tb_kepala_keluarga WHERE nkj = '$this->username'");
//         $login_admin = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$this->username'");

//         //cek Username user
//         if (mysqli_num_rows($login_user) === 1) {
//             //cek password
//             $row_user = mysqli_fetch_assoc($login_user);

//             if (password_verify($this->password, $row_user['password'])) {
//                 //set sesi untuk masuk
//                 $_SESSION['login_user'] = true;
//                 $_SESSION['username'] = $this->username;
//                 header('location: ../views/users/index.php');
//                 exit;
//             }
//         } elseif (mysqli_num_rows($login_admin)) {
//             //cek password
//             $row_admin = mysqli_fetch_assoc($login_admin);

//             if (password_verify($this->password, $row_admin['password'])) {
//                 //set sesi untuk masuk
//                 $_SESSION['login_admin'] = true;
//                 header('location: ../views/admin/index.php');
//                 exit;
//             }
//         }
//         $error = true;
//     }
// }