<?php

include '../config-admin/koneksi.php';

class Daftar
{
    public $nkj;
    public $nij;
    public $nik;
    public $nama_kepalaKel;
    public $password;
    public $kodeRayon;

    public function __construct($dataKeluarga)
    {
        $this->nkj = $dataKeluarga['nkj'];
        $this->nij = $dataKeluarga['nij'];
        $this->nik = $dataKeluarga['nik'];
        $this->nama_kepalaKel = $dataKeluarga['nama'];
        $this->password = $dataKeluarga['password'];
        $this->kodeRayon = $dataKeluarga['kode_rayon'];
    }

    // daftar KK baru
    public function daftar_keluarga_baru()
    {
        global $conn;

        $check_Nkj = mysqli_query($conn, "SELECT nkj FROM tb_keluarga WHERE nik = '$this->nik'");

        if (mysqli_fetch_assoc($check_Nkj)) {
            echo
        "<script>
         alert('NIK sudah digunakan!');
        </script>";

            return false;
        } else {
            $pathJsonFile = '../database/json/generate.json';
            $curData = file_get_contents($pathJsonFile);
            $dataJson = json_decode($curData, true);

            foreach ($dataJson as $key => $value) {
                if ($value['kode_rayon'] === $this->kodeRayon) {
                    //encripsi password
                    $password = password_hash($this->password, PASSWORD_DEFAULT);
                    //insert data admin ke datbase
                    $sukses = mysqli_query($conn, "INSERT INTO tb_keluarga VALUES('$this->nkj','$this->nik','$password','$this->kodeRayon')");
                    $tambah_anggota = mysqli_query($conn, "INSERT INTO tb_anggota VALUES('$this->nij','$this->nkj','$this->nama_kepalaKel','','','','','Kepala Keluarga','','$this->kodeRayon')");
                    ++$dataJson[$key]['jumlah_data'];
                    $putData = json_encode($dataJson, JSON_PRETTY_PRINT);
                    $simpan = file_put_contents($pathJsonFile, $putData);

                    if ($simpan && $sukses && $tambah_anggota) {
                        // echo
                        // "<script>
                        //     alert('Daftar Berhasil!. Silahkan gunakan NKJ dan NIJ kepala keluarga untuk login.');
                        // </script>";
                        $_SESSION['pesan'] = true;
                        $_SESSION['username'] = $this->nkj;
                        $_SESSION['login_user'] = true;
                        header('location: ../m-users/users/index.php');
                        exit;
                    }
                }
            }
        }
    }

    public function tambah_data_anggota()
    {
        global $conn;

        $check_Nij = mysqli_query($conn, "SELECT nkj FROM tb_anggota WHERE nij = '$this->nij'");

        var_dump($check_Nij['nij']);

        if (mysqli_fetch_assoc($check_Nij)) {
            echo
                "<script>
                    alert('NIJ sudah digunakan!');
                </script>";

            return false;
        } else {
            $insert_anggota = mysqli_query($conn, "INSERT INTO tb_anggota VALUES('$this->nij','$this->nkj','$this->nama','$this->tempatLahir','$this->tanggalLahir','$this->jenis_kel','$this->pendidikan_terakhir','$this->status_dalam_kel','$this->kode')");

            // $insert_anggota = mysqli_query($conn, "INSERT INTO tb_sidi VALUES('','$this->nkj','$this->nama','$this->tempatLahir')");

            if ($insert_anggota) {
                echo
                    "<script>
                        alert('Data berhasil ditambahkan!');
                    </script>";
            }

            // echo $this->conn;
            echo $this->nama;
            echo $this->tempatLahir;
            echo $this->tanggalLahir;
            echo $this->jenis_kel;
            echo $this->pendidikan_terakhir;
            echo $this->status_dalam_kel;
            echo $this->kode;
            echo $this->jumAnggota;
            echo $this->nij;
            echo $this->nkj;
            // echo 'sukses';
        }
    }
}

class TambahAnggota
{
    public $conn;
    public $nama;
    public $tempatLahir;
    public $tanggalLahir;
    public $jenis_kel;
    public $pendidikan_terakhir;
    public $status_dalam_kel;
    public $kode;
    public $jumAnggota;
    public $nij;
    public $nkj;

    public function __construct($data_anggota)
    {
        $this->nama = $data_anggota['nama'];
        $this->tempatLahir = $data_anggota['tempat_lahir'];
        $this->tanggalLahir = $data_anggota['tanggal_lahir'];
        $this->jenis_kel = $data_anggota['jenis_kelamin'];
        $this->pendidikan_terakhir = $data_anggota['pendidikan'];
        $this->status_dalam_kel = $data_anggota['status'];
        $this->kode = $data_anggota['kode_rayon'];
        $this->jumAnggota = $data_anggota['jumlahAnggota'];
        $this->nij = $data_anggota['nij'];
        $this->nkj = $data_anggota['nkj'];
        // $this->conn = $conn;
    }

    public function tambah_data_anggota()
    {
        global $conn;

        $check_Nij = mysqli_query($conn, "SELECT nkj FROM tb_anggota WHERE nij = '$this->nij'");

        var_dump($check_Nij['nij']);

        if (mysqli_fetch_assoc($check_Nij)) {
            echo
                "<script>
                    alert('NIJ sudah digunakan!');
                </script>";

            return false;
        } else {
            // $insert_anggota = mysqli_query($conn, "INSERT INTO tb_anggota VALUES('$this->nij','$this->nkj','$this->nama','$this->tempatLahir','$this->tanggalLahir','$this->jenis_kel','$this->pendidikan_terakhir','$this->status_dalam_kel','$this->kode')");

            $insert_anggota = mysqli_query($conn, "INSERT INTO tb_sidi VALUES('','$this->nkj','$this->nama','$this->tempatLahir')");

            if ($insert_anggota) {
                echo
                    "<script>
                        alert('Data berhasil ditambahkan!');
                    </script>";
            }

            // echo $this->conn;
            // echo $this->nama;
            // echo $this->tempatLahir;
            // echo $this->tanggalLahir;
            // echo $this->jenis_kel;
            // echo $this->pendidikan_terakhir;
            // echo $this->status_dalam_kel;
            // echo $this->kode;
            // echo $this->jumAnggota;
            // echo $this->nij;
            // echo $this->nkj;
            // echo 'sukses';
        }
    }
}