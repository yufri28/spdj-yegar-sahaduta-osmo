<?php

$page = (isset($_GET['page'])) ? $_GET['page'] : '';

switch ($page) {
  case 'daftar-pemuda': // $page == daftar-pemuda (jika isi dari $page adalah daftar pemuda)
  include './views/daftar-pemuda.php'; // load file daftar-pemuda.php yang ada di folder views
  break;

  default: // Ini untuk set default page
  include './views/users/index.php';
}