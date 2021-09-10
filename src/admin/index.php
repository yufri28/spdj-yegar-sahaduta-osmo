<?php
 include './config-admin/_koneksi.php';
 include './config-admin/proses-data.php';
 include './config-admin/daftar.php';

    global $conn;
    $queryData = mysqli_query($conn, 'SELECT * FROM tb_anggota');
     // read json file
     $data = file_get_contents('./kategorial/anggota.json');

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
    file_put_contents('./kategorial/anggota.json', $jsonfile);

    if (isset($_GET['mod'])) {
        $queryData = mysqli_query($conn, 'SELECT * FROM tb_anggota');
        // read json file
        $data = file_get_contents('./kategorial/anggota.json');
        // decode json
        $json_arr = json_decode($data, true);

        $kategorial = $_GET['mod'];
        if ($kategorial == 'ibu') {
            $queryData = mysqli_query($conn, "SELECT * FROM tb_anggota WHERE status_dalam_kel = 'Istri' ");
            if (!empty($queryData)) {
                $queryData = $queryData;
            } else {
                echo "
                <script>
                alert('Data kategorial Kaum Ibu masih kosong!'); 
                </script>";
            }
        } elseif ($kategorial == 'bapak') {
            $queryData = mysqli_query($conn, "SELECT * FROM tb_anggota WHERE status_dalam_kel = 'Kepala Keluarga' AND jenis_kelamin = 'Laki-Laki'");
            if (!empty($queryData)) {
                $queryData = $queryData;
            } else {
                echo "
                <script>
                alert('Data kategorial Kaum Bapa masih kosong!'); 
                </script>";
            }
        } elseif ($kategorial == 'pemuda') {
            foreach ($json_arr as $value) {
                if ($value['umur'] >= 16 && $value['status_dalam_kel'] == 'Anak') {
                    // $queryData = $json_arr;
                    // read json file
                    $data = file_get_contents('./kategorial/Pemuda.json');
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
                    file_put_contents('./kategorial/Pemuda.json', $jsonfile);
                }
            }
            $data = file_get_contents('./kategorial/Pemuda.json');
            // decode json
            $json_arr = json_decode($data, true);
            if (!empty($json_arr)) {
                $queryData = $json_arr;
            } else {
                echo "
                <script>
                alert('Data kategorial Pemuda masih kosong!'); 
                </script>";
            }
        } elseif ($kategorial == 'par') {
            foreach ($json_arr as $value) {
                if ($value['umur'] <= 15 && $value['status_dalam_kel'] == 'Anak') {
                    // $queryData = $json_arr;
                    // read json file
                    $data = file_get_contents('./kategorial/PAR.json');
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
                    file_put_contents('./kategorial/PAR.json', $jsonfile);
                }
            }
            $data = file_get_contents('./kategorial/PAR.json');
            // decode json
            $json_arr = json_decode($data, true);
            if (!empty($json_arr)) {
                $queryData = $json_arr;
            } else {
                echo "
                <script>
                alert('Data kategorial PAR masih kosong!'); 
                </script>";
            }
        }
    } else {
        $queryData = mysqli_query($conn, 'SELECT * FROM tb_anggota');
    }
    $query_data = $queryData;

    // data card dashboard
    $queryKK = mysqli_query($conn, 'SELECT COUNT(*) AS jumlahKK FROM tb_keluarga');
    $jumlahKK = mysqli_fetch_array($queryKK);
    $querySemuaData = mysqli_query($conn, 'SELECT COUNT(*) AS jumlahData FROM tb_anggota');
    $semuaData = mysqli_fetch_array($querySemuaData);
    $queryKaumBapak = mysqli_query($conn, "SELECT COUNT(status_dalam_kel) AS jumlahBapak FROM tb_anggota WHERE status_dalam_kel = 'Kepala Keluarga' AND jenis_kelamin = 'Laki-Laki'");
    $kaumBapak = mysqli_fetch_array($queryKaumBapak);
    $queryKaumIbu = mysqli_query($conn, "SELECT COUNT(status_dalam_kel) AS jumlahIbu FROM tb_anggota WHERE status_dalam_kel = 'Istri' AND jenis_kelamin = 'Perempuan'");
    $kaumIbu = mysqli_fetch_array($queryKaumIbu);

    $data = file_get_contents('./kategorial/Pemuda.json');
    $json_arr = json_decode($data, true);
    if (empty($json_arr)) {
        $pemuda = 0;
    } else {
        $pemuda = count($json_arr);
    }

    $data1 = file_get_contents('./kategorial/PAR.json');
    $json_arr1 = json_decode($data1, true);
    if (empty($json_arr1)) {
        $par = 0;
    } else {
        $par = count($json_arr1);
    }
    // hapus data lama
    unset($json_arr);
    unset($json_arr1);
    foreach ($query_data as $value) {
        $tanggal = $value['tanggal_lahir'];
        $umur = new DateTime($tanggal);
        $sekarang = new DateTime();
        $usia = $sekarang->diff($umur);
        if ($usia->y >= 16 && $usia->m >= 6 && $value['status_dalam_kel'] != 'Kepala Keluarga' && $value['status_dalam_kel'] != 'Istri') {
            $json_arr[] = [
                'nij' => $value['nij'],
                'nkj' => $value['nkj'],
                'nama' => $value['nama'],
                'tempat_lahir' => $value['tempat_lahir'],
                'tanggal_lahir' => $value['tanggal_lahir'],
                'jenis_kelamin' => $value['jenis_kelamin'],
                'pendidikan_terakhir' => $value['pendidikan_terakhir'],
                'status_dalam_kel' => $value['status_dalam_kel'],
                'pekerjaan' => $value['pekerjaan'],
                'kode_rayon' => $value['kode_rayon'],
                'umur' => $usia->y,
                ];

            $jsonfile = json_encode($json_arr, JSON_PRETTY_PRINT);
            // encode json and save to file
            file_put_contents('./kategorial/Pemuda.json', $jsonfile);
        } elseif ($usia->y <= 16 && $usia->m <= 5) {
            $json_arr1[] = [
                'nij' => $value['nij'],
                'nkj' => $value['nkj'],
                'nama' => $value['nama'],
                'tempat_lahir' => $value['tempat_lahir'],
                'tanggal_lahir' => $value['tanggal_lahir'],
                'jenis_kelamin' => $value['jenis_kelamin'],
                'pendidikan_terakhir' => $value['pendidikan_terakhir'],
                'status_dalam_kel' => $value['status_dalam_kel'],
                'pekerjaan' => $value['pekerjaan'],
                'kode_rayon' => $value['kode_rayon'],
                'umur' => $usia->y,
                ];
            $jsonfile1 = json_encode($json_arr1, JSON_PRETTY_PRINT);
            // encode json and save to file
            file_put_contents('./kategorial/PAR.json', $jsonfile1);
        }
    }
?>
<?php
require_once './header.php';
?>
<!-- offcanvas -->
<main class="mt-5 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 class="judul-page">Dashboard</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 index-total-jemaat mb-3" style="cursor: pointer;">
                <div class="card text-white h-100" style="background: #A12568;">
                    <div class="card-body py-5">
                        <h4 class="text-center">Total Kepala Keluarga</h4>
                        <h3 class="text-center"><?= $jumlahKK['jumlahKK']; ?></h3>
                    </div>
                    <div class="card-footer d-flex">
                        View Details
                        <span class="ms-auto">
                            <i class="bi bi-chevron-right"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 index-total-jemaat mb-3" style="cursor: pointer;">
                <div class="card text-white h-100" style="background: #297F87;">
                    <div class="card-body py-5">
                        <h4 class="text-center">Total Jemaat</h4>
                        <h3 class="text-center"><?= $semuaData['jumlahData']; ?></h3>
                    </div>
                    <div class="card-footer d-flex">
                        View Details
                        <span class="ms-auto">
                            <i class="bi bi-chevron-right"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 index-kaum-bapak mb-3" style="cursor: pointer;">
                <div class="card bg-warning text-dark h-100">
                    <div class="card-body py-5">
                        <h4 class="text-center">Kaum Bapak</h4>
                        <h3 class="text-center"><?= $kaumBapak['jumlahBapak']; ?></h3>
                    </div>
                    <div class="card-footer d-flex">
                        View Details
                        <span class="ms-auto">
                            <i class="bi bi-chevron-right"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 index-kaum-ibu mb-3" style="cursor: pointer;">
                <div class="card bg-success text-white h-100">
                    <div class="card-body py-5">
                        <h4 class="text-center">Kaum Ibu</h4>
                        <h3 class="text-center"><?= $kaumIbu['jumlahIbu']; ?></h3>
                    </div>
                    <div class="card-footer d-flex">
                        View Details
                        <span class="ms-auto">
                            <i class="bi bi-chevron-right"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 index-pemuda mb-3" style="cursor: pointer;">
                <div class="card bg-danger text-white h-100">
                    <div class="card-body py-5">
                        <h4 class="text-center">Pemuda</h4>
                        <h3 class="text-center"><?= $pemuda; ?></h3>
                    </div>
                    <div class="card-footer d-flex">
                        View Details
                        <span class="ms-auto">
                            <i class="bi bi-chevron-right"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 index-par mb-3" style="cursor: pointer;">
                <div class="card bg-info text-white h-100">
                    <div class="card-body py-5">
                        <h4 class="text-center">PAR</h4>
                        <h3 class="text-center"><?= $par; ?></h3>
                    </div>
                    <div class="card-footer d-flex">
                        View Details
                        <span class="ms-auto">
                            <i class="bi bi-chevron-right"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span> Area Chart Example
                    </div>
                    <div class="card-body">
                        <canvas class="chart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span> Area Chart Example
                    </div>
                    <div class="card-body">
                        <canvas class="chart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Data Table
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped data-table" style="width: 100%">
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
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NIJ</th>
                                        <th class="w-25">Nama</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Pendidikan Terakhir</th>
                                        <th class="w-25">Status</th>
                                        <th class="w-25">Pekerjaan</th>
                                        <th hidden>NIJ</th>
                                        <th hidden>NIJ</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
 require_once './footer.php';
?>