<?php

// include '../../config/koneksi.php';
require_once '../../config/_koneksi.php';

class Jemaat extends database
{
    public function prepare($data)
    {
        $perintah = $this->conn->prepare($data);
        if (!$perintah) {
            die('Terjadi kesalahan di prepare statement'.$this->conn->connect_error);
        }

        return $perintah;
    }

    public function query($data)
    {
        $perintah = $this->conn->query($data);
        if (!$perintah) {
            die('Terjadi kesalahan di query!'.$this->conn->connect_error);
        }

        return $perintah;
    }

    public function tambah_data_anggota($data_anggota)
    {
        $nij = $data_anggota['nij'];

        $check_Nij = mysqli_query($this->conn, "SELECT nij FROM tb_anggota WHERE nij = '$nij'");

        if (mysqli_fetch_assoc($check_Nij)) {
            echo
                "<script>
                    alert('NIJ sudah digunakan!');
                </script>";

            return false;
        } else {
            $stmt = $this->conn->prepare('INSERT INTO tb_anggota VALUES(?,?,?,?,?,?,?,?,?,?)');
            $stmt->bind_param('ssssssssss', $nij, $nkj, $nama, $tempatLahir, $tanggalLahir, $jenis_kel, $pendidikan_terakhir, $status_dalam_kel, $pekerjaan, $kode);
            $nama = $data_anggota['nama'];
            $tempatLahir = $data_anggota['tempat_lahir'];
            $tanggalLahir = $data_anggota['tanggal_lahir'];
            $jenis_kel = $data_anggota['jenis_kelamin'];
            $pendidikan_terakhir = $data_anggota['pendidikan'];
            $status_dalam_kel = $data_anggota['status'];
            $pekerjaan = $data_anggota['pekerjaan'];
            $kode = $data_anggota['kode_rayon'];
            $nij = $data_anggota['nij'];
            $nkj = $data_anggota['nkj'];

            if ($stmt->execute()) {
                echo
                    "<script>
                        alert('Data berhasil ditambahkan!');
                        window.location='../users/index.php';
                    </script>";
            }
            $stmt->close();
        }
    }

    public function edit_data_anggota($data_anggota)
    {
        $stmt = $this->conn->prepare('UPDATE tb_anggota SET nij = ?, nkj = ?, nama = ?, tempat_lahir = ? ,tanggal_lahir = ?, jenis_kelamin = ?, pendidikan_terakhir = ?, status_dalam_kel = ?, pekerjaan = ?,kode_rayon = ? WHERE nij = ?');
        $stmt->bind_param('sssssssssss', $nij, $nkj, $nama, $tempatLahir, $tanggalLahir, $jenis_kel, $pendidikan_terakhir, $status_dalam_kel, $pekerjaan, $kode, $nij);
        $nama = $data_anggota['nama'];
        $tempatLahir = $data_anggota['tempat_lahir'];
        $tanggalLahir = $data_anggota['tanggal_lahir'];
        $jenis_kel = $data_anggota['jenis_kelamin'];
        $pendidikan_terakhir = $data_anggota['pendidikan'];
        $status_dalam_kel = $data_anggota['status'];
        $pekerjaan = $data_anggota['pekerjaan'];
        $kode = $data_anggota['kode_rayon'];
        $nij = $data_anggota['nij'];
        $nkj = $data_anggota['nkj'];
        // $stmt->execute();

        if ($stmt->execute()) {
            echo
                "<script>
                    alert('Data berhasil diedit!');
                    window.location='../users/index.php';
                </script>";
        } else {
            die();
            // echo
            //     "<script>
            //         alert('Edit data gagal!');
            //         window.location='../users/index.php';
            //     </script>";
        }

        $stmt->close();
    }

    public function hapus_data_anggota($nij)
    {
        $stmt = $this->conn->prepare('DELETE FROM tb_anggota WHERE nij = ?');
        $stmt->bind_param('s', $nij);
        // $stmt->execute();

        if ($stmt->execute()) {
            echo
                "<script>
                    alert('Data berhasil dihapus!');
                    window.location='../users/index.php';
                </script>";
        }
        $stmt->close();
    }

    public function ubah_password_dafault($nkj)
    {
        $getDataNij = mysqli_query($this->conn, "SELECT nij FROM tb_keluarga WHERE nkj = '$nkj'");

        foreach ($getDataNij as $key) {
            //encripsi password
            $password = password_hash($key['nij'], PASSWORD_DEFAULT);
        }

        $stmt = $this->conn->prepare('UPDATE tb_keluarga SET password = ? WHERE nkj = ?');
        $stmt->bind_param('ss', $password, $nkj);
        // $nama = $data_anggota['nama'];
        // $tempatLahir = $data_anggota['tempat_lahir'];
        // $tanggalLahir = $data_anggota['tanggal_lahir'];
        // $jenis_kel = $data_anggota['jenis_kelamin'];
        // $pendidikan_terakhir = $data_anggota['pendidikan'];
        // $status_dalam_kel = $data_anggota['status'];
        // $kode = $data_anggota['kode_rayon'];
        // $nij = $data_anggota['nij'];
        // $nkj = $data_anggota['nkj'];
        // $stmt->execute();

        if ($stmt->execute()) {
            session_start();
            session_unset();
            session_destroy();
            $_SESSION = [];
            echo
                "<script>
                    alert('Ubah Password berhasil. Silahkan login dengan NIJ kepala keluarga!');
                    window.location='../login.php';
                </script>";
        }

        $stmt->close();
    }
}