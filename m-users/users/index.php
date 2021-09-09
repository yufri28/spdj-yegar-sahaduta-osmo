<?php

    session_start();
    include '../../config/koneksi.php';
    include '../../config/proses-data.php';
    include '../../config/proses_login.php';

    if (!$_SESSION['login_user']) {
        header('location: ../login.php');
        exit;
    }

    // tampilkan data
    global $conn, $is_empty;
    $username = $_SESSION['username'];
    $query_data = mysqli_query($conn, "SELECT * FROM tb_anggota WHERE nkj = '$username'");

    $jumlah_anggota = mysqli_num_rows($query_data);

    if (isset($_POST['daftar'])) {
        if ($_SESSION['pesan']) {
            echo
            "<script>
                alert('Daftar Berhasil!. Silahkan gunakan NKJ dan NIJ kepala keluarga untuk login.');
            </script>";

            $_SESSION['pesan'] = false;
            echo '<script>                
                  window.location.reload();
                  </script>';
        }
    }

    $query_data_nikah = mysqli_query($conn, "SELECT * FROM tb_nikah WHERE nkj = '$username'");

    // if ($_SESSION['notif'] == true) {
    //     $_SESSION['notifshow'] = false;
    //     foreach ($query_data_nikah as $value) {
    //         if (empty($value['nama_tempat']) || empty($value['tanggal_nikah']) || empty($value['nij_suami']) || empty($value['nij_istri'])) {
    //             $_SESSION['notifshow'] == true;
    //             $is_empty = true;
    //             $_SESSION['notif'] = [];
    //         } else {
    //             $is_empty = false;
    //         }
    //     }
    // }

    //  else {
    //     // $is_empty = false;
    //     $_SESSION['notifshow'] = [];
    //     $_SESSION['notif'] = [];
    //     $is_empty = $_SESSION['notifshow'];
    // }

    // if (isset($_GET['konfir'])) {
    //     $konf = $_GET['konfir'];
    //     $konfir = mysqli_query($conn, "SELECT * FROM tb_anggota WHERE nij = '$konf'");
    //     // foreach ($konfir as $value) {

    //     foreach ($konfir as $value) {
    //         $kl = $value['nama'];
    //     }
    //     // }
    // }

    // $konf = (isset($_GET['konfir']) ? $_GET['konfir'] : '');
//     $nama_anggota = mysqli_query($conn, "SELECT nama FROM tb_anggota WHERE nij = '$konf'");

//    echo $_SESSION['nama_anggota'];

    // // tambah data
    // if (!isset($_SESSION['token-daftar-anggota'])) {
    //     $_SESSION['token-daftar-anggota'] = base64_encode(openssl_random_pseudo_bytes(32));
    // }

    // $pathJsonFile = '../../database/json/generate.json';
    // $curData = file_get_contents($pathJsonFile);
    // $data = json_decode($curData, true);

    // if (isset($_POST['simpan-user']) && $_SESSION['token-daftar-anggota'] == $_POST['token-daftar-anggota']) {
    //     $nama = $_POST['nama'];
    //     $tempatLahir = $_POST['tempat_lahir'];
    //     $tanggalLahir = $_POST['tanggal'];
    //     $jenis_kel = $_POST['jenis_kel'];
    //     $pendidikan_terakhir = $_POST['pendidikan'];
    //     $status_dalam_kel = $_POST['status_dalam_kel'];
    //     $kode = $_POST['kode_rayon'];
    //     $jumAnggota = $_POST['jum_anggota'];
    //     $nkj = $_POST['nkj'];

    //     if ($jumAnggota < 10) {
    //         ++$jumAnggota;
    //         $nij = $nkj.'0'.$jumAnggota;
    //     } elseif ($jumAnggota >= 10) {
    //         ++$jumAnggota;
    //         $nij = $nkj.'0'.$jumAnggota;
    //     }

    //     $data_anggota = [
    //      'nama' => $nama,
    //      'tempat_lahir' => $tempatLahir,
    //      'tanggal_lahir' => $tanggalLahir,
    //      'jenis_kelamin' => $jenis_kel,
    //      'pendidikan' => $pendidikan_terakhir,
    //      'status' => $status_dalam_kel,
    //      'kode_rayon' => $kode,
    //      'jumlahAnggota' => $jumAnggota,
    //      'nij' => $nij,
    //      'nkj' => $nkj,
    //     ];

    //     // $check_Nij = mysqli_query($conn, "SELECT nkj FROM tb_anggota WHERE nij = '$nij'");

    //     // if (mysqli_fetch_assoc($check_Nij)) {
    //     //     echo
    //     //         "<script>
    //     //             alert('NIJ sudah digunakan!');
    //     //         </script>";

    //     //     return false;
    //     // }

    //     // $query = "INSERT INTO tb_anggota VALUES ('$nij','$nkj','$nama','$tempatLahir','$tanggalLahir','$jenis_kel','$pendidikan_terakhir','$status_dalam_kel','$kode')";
    //     // $insert_anggota = mysqli_query($conn, $query);

    //     // if ($insert_anggota) {
    //     //     echo
    //     //         "<script>
    //     //             alert('Data berhasil ditambahkan!');
    //     //         </script>";
    //     // }

    //     $dataAnggota = new TambahAnggota($data_anggota);
    //     $dataAnggota->tambah_data_anggota($data_anggota);

    //     // echo $nama;
    //     // echo $tempatLahir;
    //     // echo $tanggalLahir;
    //     // echo $jenis_kel;
    //     // echo $pendidikan_terakhir;
    //     // echo $status_dalam_kel;
    //     // echo $kode;
    //     // echo $jumAnggota;
    //     // echo $nij;
    // }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User | SPDJ J-Yes Osmo</title>

    <link rel="stylesheet" href="../../style.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <script src="../../assets/bootstrap/jquery/jquery.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.bundle.min.js">
    </script>


    <!-- DataTables -->
    <script src="../../resource/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="../../resource/DataTables/media/js/dataTables.bootstrap5.min.js"></script>
    <script src="../admin/main-template/js/script.js"></script>
    <!-- <link rel="stylesheet" href="../../resource/DataTables/media/css/jquery.dataTables.css"> -->
    <link rel="stylesheet" href="../../resource/DataTables/media/css/dataTables.bootstrap5.min.css">
    <style>
    @font-face {
        font-family: 'Inter';
        src: url('../../assets/fonts/Inter/static/Inter-Light.ttf');
        src: url('../../assets/fonts/Inter/static/Inter-Light.ttf') format('ttf'), url('../../assets/fonts/Inter/static/Inter-Light.ttf') format('truetype');
    }

    .judul-halaman,
    table,
    body {
        font-family: 'Inter';
    }

    nav {
        background-color: #2876b6;
        /* background-color: #2876b6b7; */
    }

    .Button {
        border: 1px solid rgba(250, 250, 250, 0.616);
        border-radius: 5px;
    }

    .Button:hover {
        border: 1px solid rgba(250, 250, 250, 0.911);
    }

    .judul {
        margin-top: 70px;
    }


    .dataTables_wrapper {
        font-size: 13px;
    }

    .aksi {
        font-size: smaller;
    }



    /* .tb {
        display: flex;
        align-items: center;
        border: 1px solid #2876b6;
        padding: 1%;
        min-height: 65vh;
        width: 100%;
    } */

    .notify {
        display: flex;
        justify-content: center;
    }

    ul {
        text-decoration: none;
    }

    @media screen and (max-width:992px) {
        .Button {
            width: 30%;
        }

        .form-group {
            margin: 0 10px 0 10px;
        }

        .btn-akun {
            background-color: #2876b6;
            color: white;
            font-size: small;
        }

        .large-device {
            display: none;
        }
    }

    @media screen and (min-width:992px) {
        .small-device {
            display: none;
        }

        .small-device {
            color: white;
        }

        .Logo-text {
            width: 1%;
            height: 1%;
            font-weight: 500;
        }

        .btn-akun {
            background-color: #2876b6;
            color: white;
            font-size: large;
        }

        .btn-akun:hover {
            color: rgba(229, 226, 226, 0.911);
        }

        /* .fa-info-circle {
        margin: 3px 6px; 
         font-size: 15px;
    } */
    }

    /* .Aksi {
        font-size: 12px;
    } */
    /* svg{
    width: 12px;
    height: 12px;
} */
    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand Logo-text fs-4" href="#">
                SPDJ | J-YES Osmo
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span> -->
                <i class="fas fa-user-circle"><i class="fas ml-1 fa-caret-down"></i></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mt-2 ml-auto">
                    <div class="small-device text-white">
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-item nav-link">Logout</a>
                        </li>
                        <li class="nav-item">
                            <a href="../../lupa-password.php" class="nav-item nav-link">Ganti Password</a>
                        </li>
                    </div>
                    <div class="large-device btn-group" data-toggle='tooltip' data-placement='bottom'
                        title='Info Login'>
                        <button type="button" class="btn btn-akun btn-sm dropdown-toggle mb-2" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <!-- Akun -->
                            <i class="fas fa-user-circle"></i>
                        </button>
                        <div class="dropdown-menu bg-white">
                            <a href="../logout.php" data-toggle='tooltip' data-placement='bottom' title='Logout'
                                class="dropdown-item">Logout</a>
                            <?php
                                echo "<a href='../../lupa-password.php?page=index&nkj=$username' data-placement='bottom'
                                title='Ganti Password' class=' dropdown-item'>Ganti
                                Password</a>";
                                ?>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container col-lg-10">
        <div class="tabels mb-5 mt-n5" style="margin: 0 -13px;">
            <div class="judul">
                <h3 class="mt-n1 judul-halaman text-center">Daftar Anggota Keluarga</h3>
                <h5 class="mt-1 mb-4 text-center">NKJ : <?=$username; ?></h5>
            </div>
            <div class="menuBtn text-center">
                <!-- <button data-toggle="modal" data-target="#staticBackdrop" class="btn btn-primary btn-sm mb-2">Tambah
                    Anggota</button> -->
                <?php

               echo "<a class='btn btn-primary btn-sm ml-1 mb-2'
                        href='../users/tambah_anggota.php?user=$username'>Tambah
                Anggota</a>";
                echo "<a class='btn btn-danger btn-sm ml-1 mb-2'
                        href='../users/tambah_anggota.php?user=$username'>Baptis <span class='badge badge-light'>4</span></a>";
                echo "<a class='btn btn-secondary btn-sm ml-1 mb-2'
                        href='../users/tambah_anggota.php?user=$username'>Sidi <span class='badge badge-light'>1</span></a>";
                echo "<a class='btn btn-info btn-sm ml-1 mb-2'
                        href='../users/tambah_anggota.php?user=$username'>Nikah <span class='badge badge-light'>2</span></a>";
                // echo "<a href='./cetak-kk.php?u=$username' class='btn btn-secondary ml-1 btn-sm mb-2'>Cetak KK</a>";
                ?>
                <!-- <a href="./cetak-kk.php?u=$username" class="btn btn-secondary btn-sm mb-2">Cetak KK</a> -->
                <!-- <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-warning dropdown-toggle mb-2" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Lainnya
                    </button>
                    <div class="dropdown-menu bg-warning">
                        <a href="" class="dropdown-item">Baptis</a>
                        <a href="" class="dropdown-item">Sidi</a>
                        <a href="" class="dropdown-item">Nikah</a>
                    </div>
                </div> -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <span><i class="fas fa-table"></i></span> Data Table
                        </div>
                        <div class="tb card-body table-responsive">
                            <table class="table table-striped text-center table-hover data">
                                <thead>
                                    <tr>
                                        <th>NIJ</th>
                                        <th class="w-25">Nama</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Pendidikan Terakhir</th>
                                        <th class="w-25">Status</th>
                                        <th class="w-25">Pekerjaan</th>
                                        <th class="w-25 Aksi">Aksi</th>
                                        <th hidden>NIJ</th>
                                        <th hidden>NIJ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($query_data as $data) : ?>
                                    <tr>
                                        <td><?= $data['nij']; ?></td>
                                        <td><?= $data['nama']; ?></td>
                                        <td><?= $data['tempat_lahir']; ?></td>
                                        <td><?= $data['tanggal_lahir']; ?></td>
                                        <td><?= $data['jenis_kelamin']; ?></td>
                                        <td><?= $data['pendidikan_terakhir']; ?></td>
                                        <td><?= $data['status_dalam_kel']; ?></td>
                                        <td><?= $data['pekerjaan']; ?></td>
                                        <td hidden><?= $data['nkj']; ?></td>
                                        <td hidden><?= $data['kode_rayon']; ?></td>
                                        <td class="Aksi">
                                            <!-- Default dropstart button -->
                                            <div class="btn-group dropleft">
                                                <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    Aksi
                                                </button>
                                                <ul class="dropdown-menu text-center">
                                                    <?php
                                    echo "<a href='../../m-users/users/edit.php?user=".$data['nij']."' data-toggle='modal' data-placement='bottom' title='Edit' class='btn aksi edit btn-sm btn-secondary mt-1'><svg data-toggle='tooltip' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                                        class='bi bi-pencil-square' viewBox='0 0 16 16'> <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z' />
                                        <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z' /></svg></a>";
                                    echo "<a href='../../m-users/users/index.php?konfir=".$data['nij']."' data-toggle='modal' data-target='#staticBackdrophps' data-placement='bottom' title='Hapus'
                                        class='btn aksi hapus btn-sm btn-danger mt-1'><svg data-toggle='tooltip'
                                            xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                                            class='bi bi-trash' viewBox='0 0 16 16'>
                                            <path
                                                d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z' />
                                            <path fill-rule='evenodd'
                                                d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z' />
                                        </svg></a>";
                                    echo "<a href='../../m-users/users/detail.php?user=".$data['nij']."' data-toggle='modal' data-target='#staticBackdropDetail' data-placement='bottom' title='Detail' class='btn aksi detail btn-sm btn-info mt-1'><svg data-toggle='tooltip' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-circle' viewBox='0 0 16 16'><path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/><path d='m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/></svg></a>";

                                    // echo "<a href='' class='ml-2'><i class='fas fa-bell text-danger'>5</i></a>";

                                ?>
                                                </ul>
                                            </div>

                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- Modal untuk hapus-->
    <form action="../../m-users/users/hapus.php" method="POST">
        <div class="modal fade" id="staticBackdrophps" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLabel">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times</span>
                        </button>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group">
                            <!-- <label for="validationServer01" class="text-dark">Masukkan Token</label> -->
                            <div class="input-group mt-3" id="datetimepicker">
                                <label for="">Anda yakin ingin menghapus <strong class="strong"></strong> ?</label>
                            </div>
                            <input type="hidden" name="nij" id="data_nij">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Hapus" name="hapus">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Button trigger modal -->
    <form action="../konfirmasi-user.php" method="POST">
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLabel">Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times</span>
                        </button>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group">
                            <!-- <label for="validationServer01" class="text-dark">Masukkan Token</label> -->
                            <div class="input-group mt-3" id="datetimepicker">
                                <label for="" class="mr-3">Nama : </label>
                                <label for="" class="text-center"> Yufridon Chrisma Luttu</label>
                            </div>
                            <div class="input-group mt-3" id="datetimepicker">
                                <label for="" class="mr-3">Tempat Lahir : </label>
                                <label for="" class="text-center"> Nemberala</label>
                            </div>
                            <div class="input-group mt-3" id="datetimepicker">
                                <label for="" class="mr-3">Tanggal Lahir : </label>
                                <label for="" class="text-center"> 28 Juni 1999</label>
                            </div>
                            <div class="input-group mt-3" id="datetimepicker">
                                <label for="" class="mr-3">Jenis Kelamin : </label>
                                <label for="" class="text-center"> Laki-Laki</label>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                        <!-- <button type="submit" name="berikutnya" class="btn btn-primary">Berikutnya</button> -->
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Modal untuk edit-->
    <form action="../../m-users/users/edit.php" method="POST">
        <div class="modal fade" id="staticBackdropEdit" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times</span>
                        </button>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group">
                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-8">
                                    <label for="validationServer01" class="text-dark mt-1">Nama Lengkap</label>
                                    <div class="input-group" id="datetimepicker">
                                        <input name="nama" required placeholder="nama lengkap" id="input-nama"
                                            type="text" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="validationServer01" class="text-dark mt-1">Tempat Lahir</label>
                                    <div class="input-group" id="datetimepicker">
                                        <input name="tempat_lahir" required placeholder="tempat lahir"
                                            id="input-tempatlahir" type="text" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="validationServer01" class="text-dark mt-1">Tanggal Lahir</label>
                                    <div class="input-group" id="datetimepicker">
                                        <input name="tanggal" required id="input-tanggal" type="date"
                                            class="form-control form-control-sm">
                                    </div>
                                    <small><i>Format bulan/tanggal/tahun</i></small>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="validationServer01" class="text-dark mt-1">Jenis Kelamin</label>
                                    <div class="input-group" id="datetimepicker">
                                        <select name="jenis_kel" required id="jenisKel"
                                            class="form-control form-control-sm">
                                            <option value="">-- Pilih --</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="validationServer01" class="text-dark mt-1">Pendidikan Terakhir</label>
                                    <div class="input-group">
                                        <select id="input-pendidikan" name="pendidikan"
                                            class="form-control form-control-sm" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="Tidak sekolah">Tidak sekolah</option>
                                            <option value="TK">TK</option>
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA/SMK">SMA/SMK</option>
                                            <option value="Diploma I">Diploma I</option>
                                            <option value="Diploma II">Diploma II</option>
                                            <option value="Diploma III">Diploma III</option>
                                            <option value="Strata 1">Strata 1</option>
                                            <option value="Strata 2">Strata 2</option>
                                            <option value="Strata 3">Strata 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="validationServer01" class="text-dark mt-1">Status Dalam Keluarga</label>
                                    <input value='$data_stts' id="stts_kel" name='status_dalam_kel' required
                                        placeholder='status dalam keluarga' type='text'
                                        class='form-control form-control-sm'>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="pekerjaan" class="text-dark">Pekerjaan</label>
                                    <div class="input-group" id="pekerjaan">
                                        <input name="pekerjaan" required placeholder="Pekerjaan" id="input-pekerjaan"
                                            type="text" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                            <input type='hidden' id="kode_rayon" name='kode_rayon' required
                                placeholder='status dalam keluarga' class='form-control'>
                            <input type='hidden' id="nkj" name='nkj' required class='form-control'>
                            <input type='hidden' id="nij" name='nij' required class='form-control'>";
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Simpan" name="Edit">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- modal detail -->
    <div class="modal fade" id="staticBackdropDetail" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times</span>
                    </button>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group">
                        <!-- <label for="validationServer01" class="text-dark">Masukkan Token</label> -->
                        <div class="input-group mt-3" id="datetimepicker">
                            <label for="" class="mr-3">Nomor Induk Jemaat : </label>
                            <label for="" class="nij text-center"></label>
                        </div>
                        <div class="input-group mt-3" id="datetimepicker">
                            <label for="" class="mr-3">Nama : </label>
                            <label for="" class="nama text-center"></label>
                        </div>
                        <div class="input-group mt-3" id="datetimepicker">
                            <label for="" class="mr-3">Tempat Lahir : </label>
                            <label for="" class="tempat text-center"></label>
                        </div>
                        <div class="input-group mt-3" id="datetimepicker">
                            <label for="" class="mr-3">Tanggal Lahir : </label>
                            <label for="" class="tanggal text-center"></label>
                        </div>
                        <div class="input-group mt-3" id="datetimepicker">
                            <label for="" class="mr-3">Jenis Kelamin : </label>
                            <label for="" class="jenisKel text-center"></label>
                        </div>
                        <div class="input-group mt-3" id="datetimepicker">
                            <label for="" class="mr-3">Jenis Kelamin : </label>
                            <label for="" class="pendidikan text-center"></label>
                        </div>
                        <div class="input-group mt-3" id="datetimepicker">
                            <label for="" class="mr-3">Status Dalam Keluarga : </label>
                            <label for="" class="status text-center"></label>
                        </div>
                        <div class="input-group mt-3" id="datetimepicker">
                            <label for="Pekerjaan" class="mr-3">Pekerjaan : </label>
                            <label for="Pekerjaan" class="pekerjaan text-center"></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                    <!-- <button type="submit" name="berikutnya" class="btn btn-primary">Berikutnya</button> -->
                </div>
            </div>
        </div>
    </div>


    <!-- ========== notifikasi ========= -->
    <!-- Modal untuk notifikasi nikah-->

    <!-- input hidden -->
    <div class="hidden-inputs">
        <?php
            echo "<input type='hidden' name='dataNikah' value='$is_empty' id='dataNikah'>";
        ?>
    </div>
    <form action="../../m-users/users/hapus.php" method="POST">
        <div class="modal fade" id="staticBackdropnotif" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLabel">Notifkasi</h5>
                        <button type="button" id="closeNotif" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times</span>
                        </button>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group">
                            <!-- <label for="validationServer01" class="text-dark">Masukkan Token</label> -->
                            <div class="input-group mt-3" id="datetimepicker">
                                <label for="">Apakah anda ingin melengkapi data pernikahan <strong
                                        class="strong"></strong>
                                    ?</label>
                            </div>
                            <!-- <input type="hidden" name="nij" id="data_nij"> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Lengkapi" name="lengkapi">
                        <button type="button" id="closeNotif1" class="btn btn-danger"
                            data-dismiss="modal">Nanti</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
<script type="text/javascript">
$(document).ready(function() {
    $('.data').DataTable({
        "lengthMenu": [4, 1, 2, 3, 5]
    });
    $('.hapus').on('click', function() {
        $('#staticBackdrophps').modal('show');
        $tr = $(this).closest('tr');

        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();

        $('.strong').text(data[1]);

        $('#data_nij').val(data[0]);
    });
    $('.edit').on('click', function() {
        $('#staticBackdropEdit').modal('show');
        $tr = $(this).closest('tr');
        // $tr = $(this).closest('tr');

        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();

        $('#input-nama').val(data[1]);
        $('#input-tempatlahir').val(data[2]);
        $('#input-tanggal').val(data[3]);
        $('#jenisKel').val(data[4]);
        $('#input-pendidikan').val(data[5]);
        $('#stts_kel').val(data[6]);
        $('#input-pekerjaan').val(data[7]);
        $('#nij').val(data[0]);
        $('#nkj').val(data[8]);
        $('#kode_rayon').val(data[9]);
    });

    $('.detail').on('click', function() {
        $('#staticBackdropDetail').modal('show');
        $tr = $(this).closest('tr');

        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();

        $('.nama').text(data[1]);
        $('.tempat').text(data[2]);
        $('.tanggal').text(data[3]);
        $('.jenisKel').text(data[4]);
        $('.pendidikan').text(data[5]);
        $('.status').text(data[6]);
        $('.pekerjaan').text(data[7]);
        $('.nij').text(data[0]);
        $('#nkj').val(data[8]);
        $('#kode_rayon').val(data[9]);
    });

    //notif
    var dataNikah = $('#dataNikah').val();
    if (dataNikah === '1') {
        $('#staticBackdropnotif').modal('show');
    }

    $('#titikTiga').on('click', function() {
        $('#dpm').addClass('notify');
    });
});
</script>

</html>