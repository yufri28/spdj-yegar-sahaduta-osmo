<?php
 include '../config-admin/koneksi.php';
 include '../config-admin/proses-data.php';
 include '../config-admin/daftar.php';

    global $conn;
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

    if (isset($_GET['mod'])) {
        $queryData = mysqli_query($conn, 'SELECT * FROM tb_anggota');
        // read json file
        $data = file_get_contents('../kategorial/anggota.json');
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
                </script>";
            }
        } elseif ($kategorial == 'par') {
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
                </script>";
            }
        }
    } else {
        $queryData = mysqli_query($conn, 'SELECT * FROM tb_anggota');
    }
    $query_data = $queryData;
?>
<?php require_once '../'; ?>
<!-- offcanvas -->
<main class="mt-5 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4>Kategorial</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Anggota Jemaat
                    </div>
                    <div class="card-body">
                        <div class="button-report">
                            <a href="" type="button" class="btn btn-sm btn-secondary mb-3"><i class="bi bi-printer">
                                    Print</i></a>
                            <a href="" type="button" class="btn btn-sm btn-success mb-3"><i
                                    class="bi bi-file-earmark-spreadsheet"> Export to Excel</i></a>
                            <a href="" type="button" class="btn btn-sm btn-danger mb-3"><i
                                    class="bi bi-file-earmark-pdf"> Export to PDF</i></a>
                        </div>
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
                                            <div class="btn-group dropstart">
                                                <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
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
                                        <th class="w-25 Aksi">Aksi</th>
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
 require_once '../footer.php';
?>