<?php

include '../../config/koneksi.php';
require_once '../../config/proses-data.php';
require_once '../../config/_koneksi.php';

 // tampilkan data
 global $conn;

 $username = (isset($_GET['user']) ? $_GET['user'] : '');
//  $username = $_SESSION['username'];
 $query_data = mysqli_query($conn, "SELECT * FROM tb_anggota WHERE nkj = '$username'");
 $jumlah_anggota = mysqli_num_rows($query_data);

 // tambah data
 if (!isset($_SESSION['token-daftar-anggota'])) {
     $_SESSION['token-daftar-anggota'] = base64_encode(openssl_random_pseudo_bytes(32));
 }

 if (isset($_POST['simpan-user'])) {
     $nama = $_POST['nama'];
     $tempatLahir = $_POST['tempat_lahir'];
     $tanggalLahir = $_POST['tanggal'];
     $jenis_kel = $_POST['jenis_kel'];
     $pendidikan_terakhir = $_POST['pendidikan'];
     $status_dalam_kel = $_POST['status_dalam_kel'];
     $pekerjaan = $_POST['pekerjaan'];
     $kode = $_POST['kode_rayon'];
     $jumAnggota = $_POST['jum_anggota'];
     $nkj = $_POST['nkj'];

     $get_data = mysqli_query($conn, "SELECT * FROM tb_anggota WHERE nkj = '$nkj'");

     foreach ($get_data as $value) {
         $status = $value['status_dalam_kel'];
         if ($jumAnggota < 10) {
             if ($status == $status_dalam_kel && $status == 'Kepala Keluarga') {
                 echo "<script>alert('Status $status_dalam_kel hanya bisa 1 dalam 1 keluarga. Jika ingin mengganti $status_dalam_kel, silahkan hapus data $status_dalam_kel terlebih dahulu!');</script>";
             } else {
                 if ($status_dalam_kel == 'Kepala Keluarga') {
                     $jumAnggota = 1;
                     $nij = $nkj.'0'.$jumAnggota;
                 } elseif ($status_dalam_kel == 'Istri') {
                     $jumAnggota = 2;
                     $nij = $nkj.'0'.$jumAnggota;
                     foreach ($get_data as $values) {
                         if ($nij == $values['nij']) {
                             ++$jumAnggota;
                             $nij = $nkj.'0'.$jumAnggota;
                         }
                     }
                 } else {
                     $jumAnggota = 3;
                     $nij = $nkj.'0'.$jumAnggota;
                     foreach ($get_data as $values) {
                         if ($nij == $values['nij']) {
                             ++$jumAnggota;
                             $nij = $nkj.'0'.$jumAnggota;
                         }
                     }
                 }
             }
         } elseif ($jumAnggota >= 10) {
             if (($status == $status_dalam_kel)) {
                 echo "<script>alert('Status $status_dalam_kel hanya bisa 1 dalam 1 keluarga. Jika ingin mengganti $status_dalam_kel, silahkan hapus data $status_dalam_kel terlebih dahulu!');</script>";
             } else {
                 if ($status_dalam_kel == 'Kepala Keluarga') {
                     $jumAnggota = 1;
                     $nij = $nkj.'0'.$jumAnggota;
                 } elseif ($status_dalam_kel == 'Istri') {
                     $jumAnggota = 2;
                     $nij = $nkj.'0'.$jumAnggota;
                     foreach ($get_data as $values) {
                         if ($nij == $values['nij']) {
                             ++$jumAnggota;
                             $nij = $nkj.'0'.$jumAnggota;
                         }
                     }
                 } else {
                     $jumAnggota = 3;
                     $nij = $nkj.'0'.$jumAnggota;
                     foreach ($get_data as $values) {
                         if ($nij == $values['nij']) {
                             ++$jumAnggota;
                             $nij = $nkj.'0'.$jumAnggota;
                         }
                     }
                 }
             }
         }
     }

     $data_anggota = [
      'nama' => $nama,
      'tempat_lahir' => $tempatLahir,
      'tanggal_lahir' => $tanggalLahir,
      'jenis_kelamin' => $jenis_kel,
      'pendidikan' => $pendidikan_terakhir,
      'status' => $status_dalam_kel,
      'pekerjaan' => $pekerjaan,
      'kode_rayon' => $kode,
      'jumlahAnggota' => $jumAnggota,
      'nij' => $nij,
      'nkj' => $nkj,
     ];

     $dataAnggota = new Jemaat();
     $dataAnggota->tambah_data_anggota($data_anggota);

     // echo $nama;
    // echo $tempatLahir;
    // echo $tanggalLahir;
    // echo $jenis_kel;
    // echo $pendidikan_terakhir;
    // echo $status_dalam_kel;
    // echo $kode;
    // echo $jumAnggota;
    // echo $nij;
 }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota | SPDJ J-YES OSMO</title>

    <link rel="stylesheet" href="../../style.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../assets/bootstrap/css//bootstrap.min.css">
    <script src="../../assets/bootstrap/jquery/jquery.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.bundle.min.js">
    </script>

    <style>
    body {
        font-family: 'Roboto-Regular';
    }

    #capital {
        text-transform: capitalize;
    }
    </style>

</head>

<body>
    <div class="container">
        <div class="container-form-input d-flex align-items-center justify-content-center">
            <!-- Button trigger modal -->
            <!-- <div class="kiri col-md-1"></div> -->
            <div class="card shadow-sm mt-3 mb-3 form-modal col-md-6">
                <form action="" class="mt-1" method="POST">
                    <div class="judul-form">
                        <h3 class="text-dark judul mt-1 text-center">Tambah Anggota</h3>
                    </div>
                    <hr>
                    <div class="container-form jus">
                        <div class="form-group">
                            <label for="nama-lengkap" class="text-dark">Nama Lengkap</label>
                            <div class="input-group" id="datetimepicker">
                                <div class="input-hidden" id="input-hidden">
                                    <?php foreach ($query_data as $value):?>
                                    <input type="hidden" name="nama-from-db" id="nama-from-db"
                                        value="<?=$value['nama']; ?>">
                                    <?php endforeach; ?>
                                </div>
                                <input name="nama" required placeholder="Nama Lengkap" id="input-nama" type="text"
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tempat-lahir" class="text-dark">Tempat Lahir</label>
                            <div class="input-group" id="datetimepicker">
                                <input name="tempat_lahir" required placeholder="Tempat Lahir" id="input-tempatlahir"
                                    type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal-lahir" class="text-dark">Tanggal Lahir</label>
                            <div class="input-group" id="datetimepicker">
                                <input name="tanggal" required id="input-tangaal" type="date"
                                    class="form-control form-control-sm">
                            </div>
                            <small><i>Format bulan/tanggal/tahun</i></small>
                        </div>
                        <div class="form-group">
                            <label for="jenis-kelamin" class="text-dark">Jenis Kelamin</label>
                            <div class="input-group" id="datetimepicker">
                                <select name="jenis_kel" onchange="removeStatus()" required id="jenisKel"
                                    class="form-control form-control-sm">>
                                    <option value="">-- Pilih --</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pendidikan-terakhir" class="text-dark">Pendidikan Terakhir</label>
                            <div class="input-group">
                                <select id="inputState" name="pendidikan" class="form-control form-control-sm" required>
                                    <option value="" id="select-option"> -- Pilih --</option>
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
                        <div class="form-group">
                            <label for="status-keluarga" class="text-dark">Status Dalam Keluarga</label>
                            <div class="input-group">
                                <select name="status_dalam_kel" id="statusKu" required
                                    placeholder="status dalam keluarga" type="text"
                                    class="form-control form-control-sm">
                                    <option value="">--- Pilih ---</option>
                                    <option id="kepalaKel" value="Kepala Keluarga">Kepala Keluarga</option>
                                    <option id="istri" value="Istri">Istri</option>
                                    <option value="Anak">Anak</option>
                                    <option value="Family Lain">Family Lain</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan" class="text-dark">Pekerjaan</label>
                            <div class="input-group" id="pekerjaan">
                                <input name="pekerjaan" required placeholder="Pekerjaan" id="input-pekerjaan"
                                    type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <input type="hidden" name="jum_anggota" value="<?=$jumlah_anggota; ?>">
                        <?php foreach ($query_data as $data) : ?>
                        <input type="hidden" name="kode_rayon" value="<?= $data['kode_rayon']; ?>">
                        <input type="hidden" name="nkj" value="<?=$data['nkj']; ?>">
                        <?php endforeach; ?>
                        <input type="hidden" name="token-daftar-anggota"
                            value="<?= $_SESSION['token-daftar-anggota']; ?>">
                        <div class="button text-center mb-3">
                            <button type="submit" name="simpan-user" id="simpan" class="btn btn-primary">Simpan</button>
                            <button type="button" id="button" onclick="kembali()" class="kembali btn btn-danger"
                                data-dismiss="modal">Kembali</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- <div class="kiri col-md-1"></div> -->
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdropCheckNama" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Konfirmasi Jemaat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times</span>
                    </button>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group">
                        <div class="input-group justify-content-center col-md-12 text-center">
                            <!-- <label for="" id="status-dalam-kel"></label> -->
                            <label for="" id="text-konfirmasi">Nama ini sudah ada!</label>
                        </div>
                        <div class="input-group">
                            <label for="" class="text-center">Apakah anda ingin menambahkan?</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ya</button>
                    <button type="button" class="btn tidak btn-danger" data-dismiss="modal">Tidak</button>
                    <!-- <button type="submit" name="berikutnya" class="btn btn-primary">Berikutnya</button> -->
                </div>
            </div>
        </div>

    </div>
    <script>
    function kembali() {
        window.location = "../users/index.php";
    }

    // function hapus options dari select status
    function removeStatus() {
        var getDataJk = document.getElementById('jenisKel');
        var getAttrStatus = document.getElementById('statusKu');
        // var getAttrKepalaKel = document.getElementById('kepalaKel');
        var getAttrIstri = document.getElementById('istri');
        getDataJk.value;

        for (let i = 0; i < getAttrStatus.length; i++) {
            // const element = getAttrStatus.options[i].value;
            if (getDataJk.value === "Laki-Laki") {
                // getAttrStatus.hidden(i);
                getAttrIstri.hidden = true;
            } else {
                getAttrIstri.hidden = false;
            }
        }
    }

    $(document).ready(function() {
        $("#input-nama").on('change', function() {
            // closest artinya:mengambil element html dengan id #input-hidden yang berada dekat tag input
            $input_hidden = $('input').closest('#input-hidden');

            var nilai = $input_hidden.children('input').map(function() {
                return $(this).val();
            }).get();
            var dataNama;
            var getNama = $("#input-nama").val();
            // ubah inputan ke capital di awal kata
            var inputNama = $("#input-nama").attr('id', 'capital');

            for (let i = 0; i < nilai.length; i++) {
                const element = nilai[i];
                if (element === getNama) {
                    var modaShow = $('#staticBackdropCheckNama').modal('show');
                    dataNama = element;

                }
            }
            $('.tidak').on('click', function() {
                $('#input-nama').val('');
            });
        });

        $("#input-tempatlahir").on('change', function() {
            var inputTempat = $("#input-tempatlahir").attr('id', 'capital');
        });

        $("#input-pekerjaan").on('change', function() {
            var inputTempat = $("#input-pekerjaan").attr('id', 'capital');
        });

    });
    </script>
</body>



</html>