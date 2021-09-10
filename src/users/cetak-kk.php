<?php
    include '../../config/koneksi.php';
    $nkj = (isset($_GET['u']) ? $_GET['u'] : '');
    $query_data = mysqli_query($conn, "SELECT * FROM tb_anggota WHERE nkj = '$nkj'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kartu Keluarga | SPDJ J-YES OSMO</title>
    <link rel="stylesheet" href="../../style.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <script src="../../assets/bootstrap/jquery/jquery.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.bundle.min.js">
    </script> -->
    <!-- html2pdf -->
    <script src="../../resource//html2pdf/dist/html2pdf.bundle.min.js"></script>
    <style>
    .tabels-center {
        height: auto;
        width: auto;
        display: flex;
        color: black;
        justify-content: center;
        /* align-items: center;
        align-content: center; */
        font-size: 16px;
        font-family: Arial, Helvetica, sans-serif;
    }

    /* .tb {
        display: flex;
        align-items: center;
        border: 1px solid #2876b6;
        padding: 2%;
        min-height: 65vh;
        width: 100%;
    } */

    .tabel {
        display: flex;
        justify-content: center;
    }

    .container {
        font-family: sans-serif;
    }

    .text-footer {
        display: flex;
        justify-content: end;
        border: 1px solid red;
    }

    .text {
        text-align: end;
    }

    th {
        text-align: center;
    }

    .judul {
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="container" id="container">
        <div class="tabel-content text-dark" id="tabel">
            <div class="judul mt-3">
                <h3 class="mt-n1 judul-halaman text-center">Kartu Keluarga Jemaat</h3>
                <h5 class="mt-1 text-center">NKJ : 3003030</h5>
                <h6 class="text-center">Rayon V</h6>
            </div>
            <div class="tabel">
                <table class="table table-responsive table-bordered" border="1" cellspacing='0'>
                    <thead>
                        <tr>
                            <th scope="col">NIJ</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Pendidikan Terakhir</th>
                            <th scope="col">Status</th>
                            <th scope="col">Pekerjaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < 6; ++$i) :?>
                        <tr>
                            <td>19292929</td>
                            <td>Yufridon</td>
                            <td>Yufridon</td>
                            <td>Yufridonssssss</td>
                            <td>Yufridon</td>
                            <td>Yufridon</td>
                            <td>Yufridon</td>
                            <td>Petani</td>
                        </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
            <div class="text-footer text-right mb-3 mr-3">
                <small class="mt-n3 mb-2 text text-center"><i class="text-center">GMIT-Yegar
                        Sahaduta
                        Osmo</i></small>
            </div>
        </div>
    </div>
    <div class="buttonCetak">
        <button type="button" onclick="Cetak()">Cetak</button>
        <a href="./index.php" class="btn btn-danger" type="button">Kembali</a>
    </div>
    <script>
    function Cetak() {
        var element = document.getElementById('container');
        var opt = {
            margin: 1,
            filename: 'myfile.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: 'in',
                format: 'letter',
                orientation: 'landscape'
            }
        };
        // New Promise-based usage:
        html2pdf().set(opt).from(element).save();

        // Old monolithic-style usage:
        // html2pdf(element, opt);
    }
    </script>
</body>

</html>