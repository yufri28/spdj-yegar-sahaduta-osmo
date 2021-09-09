<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password | SPDJ J-YES OSMO</title>

    <link rel="stylesheet" href="./style.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./assets/bootstrap/css//bootstrap.min.css">
    <script src="./assets/bootstrap/jquery/jquery.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.bundle.min.js">
    </script>

    <style>
    body {
        font-family: 'Roboto-Regular';
    }

    .container-form-input {
        margin-top: 15vh;
        align-items: center;
    }

    .judul-h6 {
        font-weight: bold;
    }

    i {
        color: gray;
    }

    .link-login {
        display: flex;
        margin-bottom: 12px;
        justify-content: center;
    }
    </style>

</head>

<body>
    <div class="container">
        <div class="container-form-input d-flex justify-content-center">
            <div class="card shadow-sm mt-3 mb-2 form-modal col-md-6">
                <form action="./views/users/ubah-password.php" class="mt-2" method="POST">
                    <div class="judul-form">
                        <h3 class="text-dark judul mt-1 text-center">Ubah Password</h3>
                    </div>
                    <hr>
                    <div class="container-form jus">
                        <div class="form-row mt-3 justify-content-center">
                            <div class="text-lp">
                                <h5 class="judul-h6 text-dark text-center">Silahkan pilih salah satu menu ubah
                                    password!</h5>
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
                        <a href="./views/login.php" class="link-login text-center"><i
                                class="fa fa-arrow-left text-primary"> Kembali
                                ke login</i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
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
                            <h5 class="modal-title text-dark" id="exampleModalLabel">Ubah Password Baru</h5>
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
                            <button type="submit" id="simpan-pass" name="simpan-pass"
                                class="btn btn-primary">Simpan</button>
                            <button type="button" name="batalBuatPass" id="batalBuatPass" class="btn btn-danger"
                                data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
    $(document).ready(function() {
        $("#passBaru").on('click', function() {
            $('#masukanPass').modal('show');
            $('#menuUbahPass').modal('hide');
            session = 0;
        });
    });
    </script>
</body>

</html>