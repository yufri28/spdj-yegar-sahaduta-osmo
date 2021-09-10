<?php

    session_start();
    // cek jika belum konfirmasi maka akan dikembalikan ke login
    if (!isset($_SESSION['konfir'])) {
        header('location: ./login.php');
        exit;
    }

    include '../config/koneksi.php';
    include '../config/daftar.php';

    // Security for Login
    // CSRF
    // random token
    if (!isset($_SESSION['token_daftar'])) {
        $_SESSION['token_daftar'] = base64_encode(openssl_random_pseudo_bytes(32));
    }

    //$rayon = mysqli_query($conn, 'SELECT * FROM tb_rayon');

    $pathJsonFile = '../database/json/generate.json';
    $curData = file_get_contents($pathJsonFile);
    $data = json_decode($curData, true);

    // global $kode, $jumData, $kodeRayon, $skode;
    global $nkj, $nij, $nama, $rayon, $token, $kodeRayon;

     if (isset($_POST['daftar']) && $_SESSION['token_daftar'] == $_POST['token_daftar']) {
         //  $nkj = $_POST['nkJ'];
         //  $nij = $_POST['niJ'];
         $nik = $_POST['nik'];
         $nama = $_POST['nama_lengkap'];
         $rayon = $_POST['rayon'];
         $token = $_POST['token'];

         //  echo $nkj;
         //  echo $nij;
         //  echo $nama;
         //echo $rayon;
         //  echo $token;

         //  foreach ($data as $key => $value) {
         //      if ($rayon == $value['nama_rayon']) {
         //          $kodeRayon = $value['kode_rayon'];
         //          //  echo $value['kode_rayon'];
         //      }
         //  }

         //  daftarKeluarga($dataKeluarga);

         $kode = $_POST['rayon'];
         //$skode = $kode.'01';
         // echo $skode;

         foreach ($data as $key => $value) {
             if ($kode === $value['nama_rayon']) {
                 $kodeRayon = $data[$key]['kode_rayon'];
                 $jumData = $data[$key]['jumlah_data'];
                 if ($jumData == 0) {
                     $jumData = 1;
                     $nkj = $kodeRayon.'00'.$jumData;
                 } elseif ($jumData < 10) {
                     ++$jumData;
                     $nkj = $kodeRayon.'00'.$jumData;
                 } elseif ($jumData == 10 || $jumData < 100) {
                     ++$jumData;
                     $nkj = $kodeRayon.'0'.$jumData;
                 } else {
                     ++$jumData;
                     $nkj = $kodeRayon.$jumData;
                 }
             }
         }
         $nij = $nkj.'0'.'1';

         $dataKeluarga = [
            'nkj' => $nkj,
            'nij' => $nij,
            'nik' => $nik,
            'nama' => $nama,
            'password' => $nij,
            'kode_rayon' => $kodeRayon,
        ];

         $daftar = new Daftar($dataKeluarga);
         $daftar->daftar_keluarga_baru();
     }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input data</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <script src="../assets/bootstrap/jquery/jquery.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <style>
    .btn-simpan {
        color: white;
        border-radius: 0.3em;
        padding: 10px;
        border: none;
        background-color: #2876b6;
    }

    .btn-simpan:hover {
        color: rgb(204, 204, 199);
        background: linear-gradient(rgba(0, 0, 0, 0.5), #2876b6);
    }

    .btn-generate {
        color: white;
        border-radius: 0.3em;
        padding: 10px;
        border: none;
        /* background-color: #2876b6; */
        width: fit-content;
        height: fit-content;
    }

    /* .btn-generate:hover {
            color: rgb(204, 204, 199);
            background: linear-gradient(rgba(0, 0, 0, 0.5), #2876b6);
        } */

    .btn-Batal {
        color: white;
        border-radius: 0.3em;
        padding: 10px;
        border: none;
    }

    .btn-Batal:hover {
        color: rgb(204, 204, 199);
    }

    .judul-input {
        color: #2876b6;
    }

    #select-option {
        font-style: italic;
    }

    #celendar4 {
        border: 1px solid rgb(80, 76, 76);
        background-color: #c7cacc;
        max-width: fit-content;
    }

    .container-daftar-KK {
        height: fit-content;
        width: fit-content;
        align-items: center;
    }

    .text-berjalan {
        width: fit-content;
    }

    .btn-generate-NIKJ-NIJ {
        display: flex;
        align-content: center;
        align-items: center;
    }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="row container-daftar-KK">
            <div class="col">
                <div class="container-form-input">
                    <div class="kiri col-md-12">
                        <div class="form-row justify-content-center">
                            <div class="alert alert-primary text-center mt-3 col-md-10" role="alert">
                                <h4 class="text-center">INFORMASI</h4>
                                <small class="mt-2">Nomor Kartu Jemaat (NKJ) dan Nomor Induk Jemaat (NIJ) kepala
                                    keluarga akan dibuatkan secara otomatis ketika mendaftar.</small><br>
                                <small>Nomor Kartu
                                    Jemaat
                                    (NKJ) dan Nomor Induk Jemaat akan digunakan sebagai username dan (NIJ) kepala
                                    keluarga akan digunakan sebagai default password, sehingga setelah mendaftar,
                                    anda
                                    bisa mengubah password yang lebih baik untuk meningkatkan keamanan data.</small>
                            </div>
                        </div>
                        <!-- <marquee behavior="slite" direction="left" class="text-berjalan">
                        </marquee> -->
                        <p class="font-weight-bold mt-3 judul-input text-center">DATA KEPALA KELUARGA</p>
                        <hr>
                        <form action="" method="POST">
                            <div class="form-row row justify-content-center">
                                <div class="form-group col-md-6">
                                    <input type="hidden" name="Rayon" id="rayonValue">
                                    <label for="inputState" class="col-form-label">Rayon</label>
                                    <select id="inputStateRayon" required name="rayon" onchange="pilih()"
                                        class="form-control form-control-sm">
                                        <option value="">-- Pilih --</option>
                                        <option value="Rayon I">Rayon I</option>
                                        <option value="Rayon II">Rayon II</option>
                                        <option value="Rayon III">Rayon III</option>
                                        <option value="Rayon IV">Rayon IV</option>
                                        <option value="Rayon V">Rayon V</option>
                                        <option value="Rayon VI">Rayon VI</option>
                                        <option value="Rayon VII">Rayon VII</option>
                                        <option value="Rayon VIII">Rayon VIII</option>
                                        <option value="Rayon IX">Rayon IX</option>
                                        <option value="Rayon X">Rayon X</option>
                                    </select>
                                    <!-- <small class="form-text"><i id="textUbah" style="font-size: smaller; color:gray;"
                                            onchange="ubahText()">Silahkan pilih Rayon untuk membuat NKJ dan
                                            NIJ.</i></small> -->
                                </div>
                                <!-- <div class="btn-generate-NIKJ-NIJ">
                                    <button class="btn-generate btn-sm btn-secondary" onclick="pesan()" type="button"
                                        disabled id="buttonGenerate">Generate</button>
                                </div> -->
                            </div>
                            <!-- <div class="form-row justify-content-center">
                                <div class="mb-3 col-md-3">
                                    <label for="validationServer01">NKJ</label>
                                    <input type="text" readonly name="nkJ" placeholder="NKJ"
                                        class="form-control form-control-sm col-md-12" id="validationServer01" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="validationServer01">NIJ</label>
                                    <input type="text" readonly name="niJ" placeholder="NIJ"
                                        class="form-control form-control-sm col-md-12" id="validationServer02" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div> -->
                            <div class="form-row justify-content-center">
                                <div class="mb-3 col-md-6">
                                    <label for="validationServer01">NIK Kepala Keluarga</label>
                                    <input type="text" name="nik" placeholder="Nomor Induk Kependudukan"
                                        class="form-control form-control-sm col-md-12" id="validationServer01" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="mb-3 col-md-6">
                                    <label for="validationServer01">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" placeholder="Nama lengkap"
                                        class="form-control form-control-sm col-md-12" id="validationServer01" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="form-group col-sm-6">
                                    <label for="validationServer01">Masukkan Token</label>
                                    <div class="input-group" id="datetimepicker">
                                        <input name="token" placeholder="Masukan Token" id="input-token" type="text"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="token_daftar" value="<?=$_SESSION['token_daftar']; ?>">
                            <div class="form-row mb-3 ml-1 justify-content-center">
                                <input name="daftar" class="btn-simpan mb-3" value="Daftar" type="submit">
                                <input class="btn-Batal btn-danger mb-3 ml-1" onclick="kembali()" type="button"
                                    value="Kembali">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        // let dataHero = [
        //     "Rayon I", "Rayon II", "Rayon III", "Rayon IV", "Rayon V",
        //     "Rayon VI", "Rayon VII", "Rayon VIII", "Rayon IX", "Rayon X"
        // ];

        function kembali() {
            window.location = "./login.php";
        }

        // function pilih() {
        //     const rayon = document.getElementById("inputStateRayon");
        //     if (rayon.value !== "") {
        //         // var Button = document.getElementById("buttonGenerate");
        //         // Button.disabled = false;
        //         pesan();
        //     }
        // }

        // let nkj = "";
        // let nij = "";
        // let kodeRayon = "";
        // let jumDat = 0;
        // const NKJ = document.getElementById("validationServer01");
        // const NIJ = document.getElementById("validationServer02");

        // function pesan() {
        //     const index = document.getElementById("inputStateRayon");
        //     const rayon = dataHero[index.value];
        //     var rayonVal = document.getElementById('rayonValue');
        //     // readFileJson("../database/json/generate.json", function(text) {
        //     //     var data = JSON.parse(text);
        //     //     for (let index = 0; index < data.length; index++) {
        //     //         const element = data[index]['nama_rayon'];
        //     //         if (element == rayon) {

        //     //             console.log('------------------------------------');
        //     //             console.log(data[index]['jumlah_data']);
        //     //             console.log('------------------------------------');
        //     //         }
        //     //     }
        //     // });

        //     readFileJson("../database/json/generate.json", function(text) {
        //         var data = JSON.parse(text);
        //         for (let index = 0; index < data.length; index++) {
        //             const element = data[index]['nama_rayon'];
        //             if (element == rayon) {
        //                 rayonVal.value = rayon;
        //                 kodeRayon = data[index]['kode_rayon'];
        //                 jumDat = data[index]['jumlah_data'];

        //                 console.log('------------------------------------');
        //                 console.log(jumDat);
        //                 console.log('------------------------------------');
        //                 // if (jumDat == 0) {
        //                 //     nkj = kodeRayon + "00" + "1";
        //                 //     nij = nkj + "00" + "1";
        //                 //     // console.log('------------------------------------');
        //                 //     // console.log(nkj);
        //                 //     // console.log('------------------------------------');
        //                 // } else if (jumDat < 0) {
        //                 //     jumDat += 1;
        //                 //     nkj = kodeRayon + "00" + jumDat;
        //                 //     nij = nkj + "00" + "1";
        //                 // }
        //             }
        //         }
        //         NKJ.value = nkj;
        //         NIJ.value = nij;

        //         // alert(
        //         //     "NKJ anda : " + nkj +
        //         //     " dan NIJ anda : " + nij +
        //         //     ". NIKJ digunakan sebagai Username dan NIJ digunakan sebagai Password ketika login. Silahkan lengkapi nama, masukan token yang diberikan dari operator gereja dan klik daftar."
        //         // )
        //         // NKJ.disabled = false;
        //         // NIJ.disabled = false;
        //     });


        // }

        // let selects = document.getElementById('inputStateRayon');




        // for (let index = 0; index < dataHero.length; index++) {
        //     var result = "<option value=" + index +
        //         ">" + dataHero[index] + "</option>";
        //     selects.innerHTML += result;
        // }
        // // readFileJson("../database/json/generate.json", function(text) {
        // //     var data = JSON.parse(text);
        // //     for (let index = 0; index < data.length; index++) {
        // //         const element = data[index]['nama_rayon'];
        // //         if (element == rayon) {

        // //             // console.log('------------------------------------');
        // //             // console.log(data[index]['kode_rayon']);
        // //             // console.log('------------------------------------');
        // //         }
        // //     }
        // // });

        // function readFileJson(file, callback) {
        //     var rawfile = new XMLHttpRequest();
        //     rawfile.overrideMimeType("../database/json/generate.json")
        //     rawfile.open("GET", file, true);
        //     rawfile.onreadystatechange = function() {
        //         if (rawfile.readyState === 4 && rawfile.status == "200") {
        //             callback(rawfile.responseText);
        //         }
        //     }
        //     rawfile.send(null);
        // }
        </script>
</body>

</html>