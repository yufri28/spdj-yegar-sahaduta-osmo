<?php
    session_start();
    include '../config/koneksi.php';

    // include '../config/proses_login.php';

    global $conn, $error;
    // Security for Login
    // CSRF
    // random token
    if (!isset($_SESSION['token'])) {
        $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
    }

    // login
    if (isset($_POST['login']) && $_SESSION['token'] == $_POST['token_form']) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $login_user = mysqli_query($conn, "SELECT * FROM tb_keluarga WHERE nkj = '$username'");
        $login_admin = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

        //cek Username user
        if (mysqli_num_rows($login_user) === 1) {
            //cek password
            $row_user = mysqli_fetch_assoc($login_user);
            if (password_verify($password, $row_user['password'])) {
                //set sesi untuk masuk
                $_SESSION['login_user'] = true;
                $_SESSION['notif'] = true;
                $_SESSION['username'] = $username;
                header('location: ../m-users/users/index.php');
                exit;
            }
            $error = true;
        } elseif (mysqli_num_rows($login_admin) == 1) {
            //cek password
            $row_admin = mysqli_fetch_assoc($login_admin);

            if (password_verify($password, $row_admin['password'])) {
                //set sesi untuk masuk
                $_SESSION['login_admin'] = true;
                header('location: ../m-users/admin/index.php');
                exit;
            }
            $error = true;
        } else {
            $error = true;
        }

        $error = true;
        // if ($error == true) {
        //     echo "<script>
        //        alert('Login gagal!!');
        //     </script>";
        // }
        // $username = $_POST['username'];
        // $password = $_POST['password'];
        // $login = new Login($username, $password);
        // $login->login();
    }

    $token_lupa_pass = 'abc1234';
    $nkj = '0404001';
    if (isset($_POST['lupaPass'])) {
        $NKJ = $_POST['input-nkj'];
        $token = $_POST['tokenlupaPass'];
        if ($token === $token_lupa_pass && $nkj === $NKJ) {
            $_SESSION['lupaPass'] = true;
            $_SESSION['nkj'] = $NKJ;
            // $session = 1;
            header('location: ../lupa-password.php');
            exit;
        } else {
            echo "<script>
            alert('Terjadi kesalahan!');
            window.location = './m-users/login.php';
            </script>";
        }
    }

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <script src="../assets/bootstrap/jquery/jquery.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js">
    </script>
    <title>Login | SPDJ J-YES OSMO</title>
    <style>
    * {
        margin: 0;
        padding: 0;
    }

    #banner {
        background: linear-gradient(rgba(0, 0, 0, 0.5), #2876b6), url(../assets/images/layouts/Bg-Login.png);
        background-size: cover;
        background-repeat: none;
        height: 100vh;
        /* overflow: scroll; */
    }

    body {
        background: linear-gradient(rgba(0, 0, 0, 0.5), #2876b6);
    }

    .logo {
        color: #2876b6;
        margin: 0 50px;

        /* background-color: #2876b6; */
    }

    .logo-text {
        font-family: 'Roboto-Bold';
    }

    .navbar {
        color: white;
    }

    .navbar-brand {
        text-decoration: none;
        list-style: none;
        color: white;
    }

    /* .container {
        color: black;
    } */

    .container-form-input {
        color: black;
        /* background-color: #2876b6; */
    }

    .form-login {
        background: rgba(7, 7, 7, 0.417);
        border-radius: 0.6em;
    }

    .form-login-input {
        color: white;
    }

    .container-01 {
        justify-content: center;
        align-items: center;
    }

    small {
        color: rgb(161, 158, 158);
    }

    .btn-login {
        border: 1px solid white;
        color: white;
        border-radius: 1em;
    }

    .btn-login:hover {
        background-color: #2876b6;
        color: white;
    }

    .btn-daftar {
        border: 1px solid white;
        color: white;
        border-radius: 1em;
    }

    .btn-daftar:hover {
        background-color: #177433ad;
        color: white;
    }

    .btn {
        font-family: 'Roboto-Regular';
    }

    @media screen and (max-width:992px) {
        #banner {
            overflow: scroll;
        }
    }

    text-p {
        font-family: Arial, Helvetica, sans-serif;
    }


    .judul-h6 {
        font-family: 'Times New Roman', Times, serif;
        font-weight: 900;
        color: black;
    }

    label,
    input,
    button {
        font-family: 'Roboto-Light';
    }
    </style>
</head>

<body>
    <section id="banner" class="text-light">
        <div class="navbar">
            <div class="navbar logo-text text-light d-block">
                <h5>Sistem Pengelolaan Data Jemaat</h5>
                <h4>Yegar Sahaduta Osmo</h4>
            </div>
        </div>
        <div class="container justify-content-center align-items-center">
            <div class="form-input container-01 row m-3">
                <form action="" method="POST" class="form-login mt-3">
                    <h2 class="font-weight-bold text-center mb-3 mt-3">LOGIN</h2>
                    <div class="login-error d-flex justify-content-center col-12">
                        <?php if ($error) : ?>
                        <div class="alert alert-error text-center alert-danger alert-dismissible fade show col-sm-6"
                            role="alert" id="alert-error">
                            <i class="text-danger"><strong>Login gagal!</strong></i>
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-row mb-3 ml-3 mr-3 justify-content-center">
                        <div class="mb-3 form-login-input col-sm-10">
                            <label for="validationServer01">Username</label>
                            <input type="text" placeholder="username" name="username" class="form-control"
                                id="validationServer01" required>
                            <!-- <small class="form-text"><i>Jangan bagikan Nomor Kartu Jemaat ke orang lain.</i></small> -->
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3 col-sm-10 form-login-input justify-content-center">
                            <label for="validationServer02">Password</label>
                            <input type="password" placeholder="password" name="password" class="form-control"
                                id="validationServer02" required>
                            <!-- <small class="form-text"><i>Harap mengganti password baru setelah login.</i></small> -->
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <input type="hidden" name="token_form" value="<?= $_SESSION['token']; ?>">
                        <div class="checkMeBtn col-sm-10 mt-2">
                            <div class="form-row mb-2 justify-content-around">
                                <button class="btn btn-login text-light col-8" name="login" type="submit">Login</button>
                            </div>
                            <div class="form-row justify-content-around">
                                <button id="daftarKK" data-toggle="modal" data-target="#staticBackdrop"
                                    class="btn btn-daftar text-light mb-2 col-8" type="button">Daftar KK Baru</button>
                            </div>
                            <div class="form-row mb-3 justify-content-around">
                                <a href="" id="lupaPass" data-toggle="modal" data-target="#lupaPassword"
                                    class="btn btn-lupaPass text-light mb-3 col-8" type="button">Lupa password?</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Button trigger modal -->
        <form action="../konfirmasi-user.php" method="POST">
            <!-- Modal for konfirmasi user-->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="exampleModalLabel">Konfirmasi User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times</span>
                            </button>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="form-group">
                                <!-- <label for="validationServer01" class="text-dark">Masukkan Token</label> -->
                                <div class="input-group mt-3" id="datetimepicker">
                                    <input name="token" placeholder="Masukan Token" id="input-token" type="text"
                                        class="form-control form-control-md">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                            <button type="submit" name="berikutnya" class="btn btn-primary">Berikutnya</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Button trigger modal -->
        <form action="" method="POST">
            <!-- Modal for lupa password-->
            <div class="modal fade" id="lupaPassword" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="exampleModalLabel">Konfirmasi Jemaat</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times</span>
                            </button>
                        </div>
                        <div class="form-row ml-2 mr-2  justify-content-center">
                            <div class="form-group">
                                <!-- <label for="validationServer01" class="text-dark">Masukkan Token</label> -->
                                <div class="input-group mt-3" id="datetimepicker">
                                    <input name="input-nkj" required placeholder="Masukan NKJ" id="input-nij"
                                        type="text" class="form-control form-control-md">
                                </div>
                                <small><i>Jika lupa NKJ, silahkan hubungi admin/operator!.</i></small>
                                <div class="input-group mt-3" id="datetimepicker">
                                    <input name="tokenlupaPass" required placeholder="Masukan Token" id="tokenlupaPass"
                                        type="text" class="form-control form-control-md">
                                </div>
                                <small><i>Jika belum dapat token, silahkan hubungi admin/operator!.</i></small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                            <button type="submit" id="berikutnya" name="lupaPass"
                                class="btn btn-primary">Berikutnya</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <!-- lupa password -->
        <div class="container">
            <input type="hidden" name="ambilSession" id="SessionLupaPass" value="<?=$session; ?>">
            <!-- Button trigger modal -->
            <form action="" method="POST">
                <!-- Modal for lupa password-->
                <div class="modal fade" id="menuUbahPass" data-backdrop="static" data-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark" id="exampleModalLabel">Lupa Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times</span>
                                </button>
                            </div>
                            <div class="form-row mt-3 justify-content-center">
                                <div class="text-lp">
                                    <h6 class="judul-h6 text-dark text-center">Silahkan pilih salah satu menu ubah
                                        password!</h6>
                                </div>
                                <div class="text-lp ml-4 mr-4">
                                    <p class="text-center text-dark text-p">Password Baru untuk membuat password baru
                                        dan Password
                                        Default
                                        untuk mengubah
                                        password secara otomatis dengan password ketika mendaftar.</p>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" name="passBaru" id="passBaru" class="btn btn-danger">Password
                                    Baru</button>
                                <button type="submit" name="PassDefault" class="btn btn-primary">Password
                                    Default</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- password baru -->
        <div class="container">
            <!-- Button trigger modal -->
            <form action="" method="POST">
                <!-- Modal for password baru-->
                <div class="modal fade" id="masukanPass" data-backdrop="static" data-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark" id="exampleModalLabel">Ubah Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times</span>
                                </button>
                            </div>
                            <div class="form-row mt-3 justify-content-center">
                                <div class="form-group ml-4 mr-4">
                                    <div class="label-1">
                                        <label for="validationServer01" class="text-dark mt-2">Password Baru</label>
                                    </div>
                                    <div class="input-group" id="datetimepicker">
                                        <input name="input-passBaru" required placeholder="Masukan Password Baru"
                                            id="input-passBaru" type="text" class="form-control form-control-md">
                                    </div>
                                    <small><i>Gunakan password yang kuat untuk keamanan akun!.</i></small>
                                    <div class="label-2">
                                        <label for="validationServer01" class="text-dark mt-4">Konfirmasi
                                            Password</label>
                                    </div>
                                    <div class="input-group" id="datetimepicker">
                                        <input name="konfirmasiJemaat" required placeholder="Konfirmasi Password"
                                            id="konfirmasiJemaat" type="text" class="form-control form-control-md">
                                    </div>
                                    <small><i>Masukan Password Sekali Lagi!</i></small>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" name="batalBuatPass" id="batalBuatPass" class="btn btn-danger"
                                    data-dismiss="modal">Batal</button>
                                <button type="submit" id="simpan-pass" name="simpan-pass"
                                    class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- jquery -->
    <script>
    $(document).ready(function() {
        // $('#berikutnya').on('click', function() {
        $(window).on('load', function() {
            $('#menuUbahPass').modal('hide');
        });


        // $('#menuUbahPass').modal('show');

        // var session = $('#SessionLupaPass').val();
        // if (session == 1) {
        //     $('#menuUbahPass').modal('show');
        // }
        // });

        $('#berikutnya').on('click', function() {
            const token_lupa_pass = 'abc1234';
            const nkj = '0404001';
            var NKJ = $('#input-nkj').val();
            var token = $_POST['tokenlupaPass'];
            console.log('------------------------------------');
            console.log(NKJ);
            console.log('------------------------------------');
            if (token === token_lupa_pass && nkj === $NKJ) {
                console.log('------------------------------------');
                console.log('berhasil');
                console.log('------------------------------------');
                // $_SESSION['lupaPass'] = true;
                // $session = 1;
                // header('location: ./users/lupa-password.php');
                // exit;
            } else {
                alert('Terjadi kesalahan!');
                window.location = './m-users/login.php';
            }
        });

        $("#passBaru").on('click', function() {
            $('#masukanPass').modal('show');
            $('#menuUbahPass').modal('hide');
            session = 0;
        });
    });
    </script>
</body>

</html>