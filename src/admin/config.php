<?php

$page = (isset($_GET['mod'])) ? $_GET['mod'] : '';
switch ($page) {
  case 'kategorial': // $page == home (jika isi dari $page adalah home)
  include './kategorial.php'; // load file home.php yang ada di folder views
  break;

  case 'berita': // $page == berita (jika isi dari $page adalah berita)
  include 'views/berita.php'; // load file berita.php yang ada di folder views
  break;

  case 'tentang': // $page == tentang (jika isi dari $page adalah tentang)
  include 'views/tentang.php'; // load file tentang.php yang ada di folder views
  break;

  // case 'case_selanjutnya':
  // include "views/case_selanjutnya.php";
  // break;

  // case 'case_selanjutnya':
  // include "views/case_selanjutnya.php";
  // break;

  // case 'case_selanjutnya':
  // include "views/case_selanjutnya.php";
  // break;

  default: // Ini untuk set default jika isi dari $page tidak ada pada 3 kondisi diatas
  include './index.php';
}