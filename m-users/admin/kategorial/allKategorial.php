<?php
    include '../../../config/koneksi.php';

    $queryData = mysqli_query($conn, 'SELECT * FROM tb_anggota');
    // read json file
    $data = file_get_contents('../kategorial/anggota.json');

    // decode json
    $json_arr = json_decode($data, true);
    unset($json_arr);
    foreach ($queryData as $data) {
        $nkj = $data['nkj'];
        $nij = $data['nij'];
        $nama = $data['nama'];
        $tempat_lahir = $data['tempat_lahir'];
        $tanggal_lahir = $data['tanggal_lahir'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $pendidikan_terakhir = $data['pendidikan_terakhir'];
        $status_dalam_kel = $data['status_dalam_kel'];
        $pekerjaan = $data['pekerjaan'];
        $kode_rayon = $data['kode_rayon'];
        $tgl_lahir = $data['tanggal_lahir'];

        $umur = new DateTime($tanggal_lahir);
        $sekarang = new DateTime();
        $usia = $sekarang->diff($umur);
        // add data
        $json_arr[] = [
            'nij' => $nij,
            'nkj' => $nkj,
            'nama' => $nama,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'pendidikan_terakhir' => $pendidikan_terakhir,
            'status_dalam_kel' => $status_dalam_kel,
            'pekerjaan' => $pekerjaan,
            'kode_rayon' => $kode_rayon,
            'umur' => $usia->y,
        ];
    }
    $jsonfile = json_encode($json_arr, JSON_PRETTY_PRINT);
    // encode json and save to file
    file_put_contents('../kategorial/anggota.json', $jsonfile);

    if (isset($_POST['tampilkan'])) {
        $queryData = mysqli_query($conn, 'SELECT * FROM tb_anggota');
        // read json file
        $data = file_get_contents('../kategorial/anggota.json');
        // decode json
        $json_arr = json_decode($data, true);

        $kategorial = $_POST['kategori'];
        if ($kategorial == 'Kaum Ibu') {
            $queryData = mysqli_query($conn, "SELECT * FROM tb_anggota WHERE status_dalam_kel = 'Istri' ");
            if (!empty($json_arr)) {
                $queryData = $queryData;
            } else {
                echo "
                <script>
                alert('Data kategorial Kaum Ibu masih kosong!'); 
                window.location = '';
                </script>";
            }
        } elseif ($kategorial == 'Kaum Bapa') {
            $queryData = mysqli_query($conn, "SELECT * FROM tb_anggota WHERE status_dalam_kel = 'Kepala Keluarga' AND jenis_kelamin = 'Laki-Laki'");
            if (!empty($json_arr)) {
                $queryData = $queryData;
            } else {
                echo "
                <script>
                alert('Data kategorial Kaum Bapa masih kosong!'); 
                window.location = '';
                </script>";
            }
        } elseif ($kategorial == 'Pemuda') {
            foreach ($json_arr as $value) {
                if ($value['umur'] >= 16 && $value['status_dalam_kel'] == 'Anak') {
                    // $queryData = $json_arr;
                    // read json file
                    $data = file_get_contents('../kategorial/Pemuda.json');
                    // decode json
                    $json_arr = json_decode($data, true);
                    unset($json_arr);
                    $nkj = $value['nkj'];
                    $nij = $value['nij'];
                    $nama = $value['nama'];
                    $tempat_lahir = $value['tempat_lahir'];
                    $tanggal_lahir = $value['tanggal_lahir'];
                    $jenis_kelamin = $value['jenis_kelamin'];
                    $pendidikan_terakhir = $value['pendidikan_terakhir'];
                    $status_dalam_kel = $value['status_dalam_kel'];
                    $pekerjaan = $value['pekerjaan'];
                    $kode_rayon = $value['kode_rayon'];
                    $tgl_lahir = $value['tanggal_lahir'];

                    $umur = new DateTime($tanggal_lahir);
                    $sekarang = new DateTime();
                    $usia = $sekarang->diff($umur);
                    // add data
                    $json_arr[] = [
                        'nij' => $nij,
                        'nkj' => $nkj,
                        'nama' => $nama,
                        'tempat_lahir' => $tempat_lahir,
                        'tanggal_lahir' => $tanggal_lahir,
                        'jenis_kelamin' => $jenis_kelamin,
                        'pendidikan_terakhir' => $pendidikan_terakhir,
                        'status_dalam_kel' => $status_dalam_kel,
                        'pekerjaan' => $pekerjaan,
                        'kode_rayon' => $kode_rayon,
                        'umur' => $usia->y,
                        ];

                    $jsonfile = json_encode($json_arr, JSON_PRETTY_PRINT);
                    // encode json and save to file
                    file_put_contents('../kategorial/Pemuda.json', $jsonfile);
                }
            }
            $data = file_get_contents('../kategorial/Pemuda.json');
            // decode json
            $json_arr = json_decode($data, true);
            if (!empty($json_arr)) {
                $queryData = $json_arr;
            } else {
                echo "
                <script>
                alert('Data kategorial Pemuda masih kosong!'); 
                window.location = '';
                </script>";
            }
        } elseif ($kategorial == 'PAR') {
            foreach ($json_arr as $value) {
                if ($value['umur'] <= 15 && $value['status_dalam_kel'] == 'Anak') {
                    // $queryData = $json_arr;
                    // read json file
                    $data = file_get_contents('../kategorial/PAR.json');
                    // decode json
                    $json_arr = json_decode($data, true);
                    unset($json_arr);
                    $nkj = $value['nkj'];
                    $nij = $value['nij'];
                    $nama = $value['nama'];
                    $tempat_lahir = $value['tempat_lahir'];
                    $tanggal_lahir = $value['tanggal_lahir'];
                    $jenis_kelamin = $value['jenis_kelamin'];
                    $pendidikan_terakhir = $value['pendidikan_terakhir'];
                    $status_dalam_kel = $value['status_dalam_kel'];
                    $pekerjaan = $value['pekerjaan'];
                    $kode_rayon = $value['kode_rayon'];
                    $tgl_lahir = $value['tanggal_lahir'];

                    $umur = new DateTime($tanggal_lahir);
                    $sekarang = new DateTime();
                    $usia = $sekarang->diff($umur);
                    // add data
                    $json_arr[] = [
                        'nij' => $nij,
                        'nkj' => $nkj,
                        'nama' => $nama,
                        'tempat_lahir' => $tempat_lahir,
                        'tanggal_lahir' => $tanggal_lahir,
                        'jenis_kelamin' => $jenis_kelamin,
                        'pendidikan_terakhir' => $pendidikan_terakhir,
                        'status_dalam_kel' => $status_dalam_kel,
                        'pekerjaan' => $pekerjaan,
                        'kode_rayon' => $kode_rayon,
                        'umur' => $usia->y,
                        ];

                    $jsonfile = json_encode($json_arr, JSON_PRETTY_PRINT);
                    // encode json and save to file
                    file_put_contents('../kategorial/PAR.json', $jsonfile);
                }
            }
            $data = file_get_contents('../kategorial/PAR.json');
            // decode json
            $json_arr = json_decode($data, true);
            if (!empty($json_arr)) {
                $queryData = $json_arr;
            } else {
                echo "
                <script>
                alert('Data kategorial PAR masih kosong!'); 
                window.location = '';
                </script>";
            }
        }
    } else {
        $queryData = mysqli_query($conn, 'SELECT * FROM tb_anggota');
    }
    $query_data = $queryData;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Dashboard Template · Bootstrap v4.6</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/dashboard/">

    <!-- fontawesome -->
    <link rel="stylesheet" href="../../../assets/fontawesome/css/all.min.css">

    <!-- Bootstrap core CSS -->
    <link href="../../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">



    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    /* navbar */
    nav {
        background-color: #2876b6;
    }

    /* .container-chart {
        display: flex;
        justify-content: center;
    } */

    .charts-hidden {
        display: flex;
    }

    @media screen and (max-width:992px) {
        /* .container-chart {
            display: block;
        } */

        .charts-hidden {
            display: block;
        }

        .input-search {
            width: 100%;
        }

        .dropleft {
            display: none;
        }

        .small-dev {
            display: block;
        }


    }

    @media screen and (min-width:992px) {

        .input-search {
            width: 25%;
        }

        .small-dev {
            display: none;
        }

    }

    .nav-link:hover {
        background-color: #4a99dab7;
        color: white;
    }

    /* .input-search {
        width: 100%;
    } */
    </style>


    <!-- Custom styles for this template -->
    <link href="../dashboard/dashboard.css" rel="stylesheet">

    <link rel="stylesheet" href="../../../style.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="../../../assets/fontawesome/css/all.min.css">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css"> -->
    <script src="../../../assets/bootstrap/jquery/jquery.js"></script>
    <script src="../../../assets/bootstrap/js/bootstrap.bundle.min.js">
    </script>


    <!-- DataTables -->
    <script src="../../../resource/DataTables/media/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="../../../resource/DataTables/media/css/jquery.dataTables.css">
    <link rel="stylesheet" href="../../../resource/DataTables/media/css/dataTables.bootstrap.css">

</head>

<body>
    <?php require_once './header.php'; ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="container-data">
            <div
                class="d-flex mt-n2 justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Anggota Jemaat</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <span data-feather="calendar"></span>
                        This week
                    </button>
                </div>
            </div>
        </div>
        <script>
        var btnTerunaLansiaShow = document.getElementById("btnTerunaLansiaShow");
        var btnTerunaLansiaHide = document.getElementById("btnTerunaLansiaHide");
        btnTerunaLansiaShow.addEventListener("click", function() {
            const cardUp = document.getElementById("cardTerunaLansiaUp");
            const cardDown = document.getElementById("cardTerunaLansiaDown");
            const cardTeruna = document.getElementById("cardTeruna");
            const cardLansia = document.getElementById("cardLansia");
            btnTerunaLansiaShow.hidden = true;
            btnTerunaLansiaHide.hidden = false;
            btnTerunaLansiaHide.style.display = "block";
            cardUp.hidden = false;
            cardDown.hidden = true;
            cardTeruna.hidden = false;
            cardLansia.hidden = false;
        });

        btnTerunaLansiaHide.addEventListener("click", function() {
            const cardUp = document.getElementById("cardTerunaLansiaUp");
            const cardDown = document.getElementById("cardTerunaLansiaDown");
            const cardTeruna = document.getElementById("cardTeruna");
            const cardLansia = document.getElementById("cardLansia");
            btnTerunaLansiaHide.hidden = true;
            btnTerunaLansiaShow.hidden = false;
            cardUp.hidden = true;
            cardDown.hidden = false;
            cardTeruna.hidden = true;
            cardLansia.hidden = true;
        });
        </script>
        <!-- <div class="container-chart justify-content-center row">
            <div class="charts card m-2 col-md-6">
                <div class="card-body">
                    <canvas class="w-100" id="myLineChart" width="100" height="75"></canvas>
                </div>
            </div>
            <div class="pie-chart card m-2 col-md-4">
                <div class="card-body bg-white">
                    <canvas class="w-100" id="myPieChart" width="100" height="75"></canvas>
                </div>
            </div>
        </div> -->
        <!-- <h2 class="mt-5">Section title</h2> -->


        <form action="" method="POST">
            <div class="form-orderBy d-flex">
                <select name="kategori" class="form-control mb-2 form-control-sm col-md-3" id="ketegori">
                    <option>--- Pilih Kategorial ---</option>
                    <option>Semua Kategorial</option>
                    <option>Kaum Bapa</option>
                    <option>Kaum Ibu</option>
                    <option>Pemuda</option>
                    <option>PAR</option>
                </select>
                <input type="submit" name="tampilkan" class="btn btn-secondary ml-2 mb-2 btn-sm" value="Tampilkan">
            </div>

        </form>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>NIJ</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Pendidikan Terakhir</th>
                        <th>Status</th>
                        <th>Pekerjaan</th>
                        <th class="Aksi">Aksi</th>
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
                            <?php
                                    echo "<a href='../../views/users/edit.php?user=".$data['nij']."' data-toggle='modal' data-placement='bottom' title='Edit' class='btn aksi edit btn-sm btn-secondary mt-1'><svg data-toggle='tooltip' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                                        class='bi bi-pencil-square' viewBox='0 0 16 16'> <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z' />
                                        <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z' /></svg></a>";
                                    echo "<a href='../../views/users/index.php?konfir=".$data['nij']."' data-toggle='modal' data-target='#staticBackdrophps' data-placement='bottom' title='Hapus'
                                        class='btn aksi hapus btn-sm btn-danger mt-1'><svg data-toggle='tooltip'
                                            xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                                            class='bi bi-trash' viewBox='0 0 16 16'>
                                            <path
                                                d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z' />
                                            <path fill-rule='evenodd'
                                                d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z' />
                                        </svg></a>";
                                    echo "<a href='../../views/users/detail.php?user=".$data['nij']."' data-toggle='modal' data-target='#staticBackdropDetail' data-placement='bottom' title='Detail' class='btn aksi detail btn-sm btn-info mt-1'><svg data-toggle='tooltip' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-circle' viewBox='0 0 16 16'><path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/><path d='m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/></svg></a>";

                                    // echo "<a href='' class='ml-2'><i class='fas fa-bell text-danger'>5</i></a>";

                                ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <script>
    $(document).ready(function() {
        $('.data').DataTable({
            "lengthMenu": [4, 1, 2, 3, 5]
        });
    });
    </script>

</body>

</html>