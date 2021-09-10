<?php

    session_start();
    require_once '../../config/proses-data.php';
    require_once '../../config/_koneksi.php';

    if ($_SESSION['lupaPass'] == true) {
        $Nkj = $_SESSION['nkj'];
        $obj = new Jemaat();
        $obj->ubah_password_dafault($Nkj);
    }