<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Dashboard Template · Bootstrap v4.6</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/dashboard/">

    <!-- fontawesome -->
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">

    <!-- Bootstrap core CSS -->
    <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- slide -->

    <link rel="stylesheet" href="../../resource/slick-master/slick/slick.css">
    <!-- <link rel="stylesheet" href="../../resource/slick-master/slick/slick-theme.css"> -->
    <style>
    @charset 'UTF-8';

    /* Slider */

    .slick-loading .slick-list {
        background: #fff url('./ajax-loader.gif') center center no-repeat;
    }


    /* Icons */

    @font-face {
        font-family: 'slick';
        font-weight: normal;
        font-style: normal;
        src: url('./fonts/slick.eot');
        src: url('./fonts/slick.eot?#iefix') format('embedded-opentype'), url('./fonts/slick.woff') format('woff'), url('./fonts/slick.ttf') format('truetype'), url('./fonts/slick.svg#slick') format('svg');
    }


    /* Arrows */

    .slick-prev,
    .slick-next {
        font-size: 0;
        line-height: 0;
        position: absolute;
        top: 50%;
        display: block;
        width: 20px;
        height: 20px;
        padding: 0;
        -webkit-transform: translate(0, -50%);
        -ms-transform: translate(0, -50%);
        transform: translate(0, -50%);
        cursor: pointer;
        color: white;
        border: none;
        outline: none;
        background: #064b9b69;
        border-radius: 45%;
    }

    .slick-prev:hover,
    .slick-prev:focus,
    .slick-next:hover,
    .slick-next:focus {
        color: white;
        outline: none;
        background: #064b9b69;
    }

    .slick-prev:hover:before,
    .slick-prev:focus:before,
    .slick-next:hover:before,
    .slick-next:focus:before {
        opacity: 1;
    }

    .slick-prev.slick-disabled:before,
    .slick-next.slick-disabled:before {
        opacity: .25;
    }

    .slick-prev:before,
    .slick-next:before {
        font-family: 'slick';
        font-size: 20px;
        line-height: 1;
        opacity: .75;
        color: white;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .slick-prev {
        left: -25px;
    }

    [dir='rtl'] .slick-prev {
        right: -25px;
        left: auto;
    }

    .slick-prev:before {
        content: '<';
    }

    [dir='rtl'] .slick-prev:before {
        content: '>';
    }

    .slick-next {
        right: -25px;
    }

    [dir='rtl'] .slick-next {
        right: auto;
        left: -25px;
    }

    .slick-next:before {
        content: '>';
    }

    [dir='rtl'] .slick-next:before {
        content: '<';
    }


    /* Dots */

    .slick-dotted.slick-slider {
        margin-bottom: 30px;
    }

    .slick-dots {
        position: absolute;
        bottom: -25px;
        display: block;
        width: 100%;
        padding: 0;
        margin: 0;
        list-style: none;
        text-align: center;
    }

    .slick-dots li {
        position: relative;
        display: inline-block;
        width: 20px;
        height: 20px;
        margin: 0 5px;
        padding: 0;
        cursor: pointer;
    }

    .slick-dots li button {
        font-size: 0;
        line-height: 0;
        display: block;
        width: 20px;
        height: 20px;
        padding: 5px;
        cursor: pointer;
        color: transparent;
        border: 0;
        outline: none;
        background: transparent;
    }

    .slick-dots li button:hover,
    .slick-dots li button:focus {
        outline: none;
    }

    .slick-dots li button:hover:before,
    .slick-dots li button:focus:before {
        opacity: 1;
    }

    .slick-dots li button:before {
        font-family: 'slick';
        font-size: 6px;
        line-height: 20px;
        position: absolute;
        top: 0;
        left: 0;
        width: 20px;
        height: 20px;
        content: '•';
        text-align: center;
        opacity: .25;
        color: black;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .slick-dots li.slick-active button:before {
        opacity: .75;
        color: black;
    }

    /* slick */
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }


    /* navbar */
    nav {
        background-color: #2876b6;
    }

    /* .container-chart {
        display: flex;
        justify-content: center;
    } */

    .charts-hidden {
        display: flex;
    }

    @media screen and (max-width:992px) {
        /* .container-chart {
            display: block;
        } */

        .container-cards {
            display: flex;
            justify-content: center;
        }

        .slider {
            width: 90%;
        }

        .charts-hidden {
            display: block;
        }

        .input-search {
            width: 100%;
        }

        .dropleft {
            display: none;
        }

        .small-dev {
            display: block;
        }


    }

    @media screen and (min-width:992px) {

        .input-search {
            width: 25%;
        }

        .small-dev {
            display: none;
        }

    }

    .nav-link:hover {
        background-color: #4a99dab7;
        color: white;
    }

    /* .input-search {
        width: 100%;
    } */
    </style>


    <!-- Custom styles for this template -->
    <link href="./dashboard/dashboard.css" rel="stylesheet">
</head>

<body>

    <!-- ======================= Navbar ===================== -->
    <nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">SPDJ | J-YES OSMO</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input style="color: gray; border-radius: 2px;" class="form-control input-search form-control" type="text"
            placeholder="Search" aria-label="Search">
        <!-- Default dropleft button -->
        <div class="btn-group dropleft px-3" data-toggle='tooltip' title="Yufridon Chrisma Luttu">
            <button type="button" class="btn text-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="fa fa-user"></i>
            </button>
            <div class="dropdown-menu">
                <a class="nav-link text-dark">Yufridon Chrisma Luttu</a>
                <a class="nav-link" href="#">Ganti Password</a>
                <a class="nav-link" href="#">Logout</a>
            </div>
        </div>
        <ul class="navbar-nav small-dev px-3">
            <li class="nav-item text-nowrap pt-1 pb-1">
                <span class="showMenuAkun" onclick="showMenuAkn()" style="color: white;">Yufridon Chrisma Luttu <i
                        class="fa fa-angle-down"></i></span>
                <span class="hideMenuAkun" onclick="hideMenuAkn()" hidden style="color: white;">Yufridon Chrisma Luttu
                    <i class="fa fa-angle-up"></i></span>
                <!-- <button class="btn nav-link btn-primary text-dark">Yufridon Chrisma Luttu</button> -->
                <a class="nav-link openGp" hidden href="#">Ganti Password</a>
                <a class="nav-link openLt" hidden href="#">Logout</a>
            </li>
        </ul>

        <script>
        const showMenuAkun = document.querySelector(".showMenuAkun");
        const hideMenuAkun = document.querySelector(".hideMenuAkun");
        const openGp = document.querySelector(".openGp");
        const openLt = document.querySelector(".openLt");

        function showMenuAkn() {
            showMenuAkun.hidden = true;
            hideMenuAkun.hidden = false;
            openGp.hidden = false;
            openLt.hidden = false;
        }

        function hideMenuAkn() {
            showMenuAkun.hidden = false;
            hideMenuAkun.hidden = true;
            openGp.hidden = true;
            openLt.hidden = true;
        }
        </script>
    </nav>

    <!-- ======================== SideBar ============================= -->
    <div class="container-fluid bg-white">
        <div class="row">
            <nav id="sidebarMenu" style="border-radius: 0 5px 5px 0;"
                class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3 mt-2">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <span data-feather="home"></span>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="buttons-dataJemaat nav-link">
                                <span class="cls1" style="cursor: pointer;" onclick="hideUp1()" id="id1">Kategorial
                                </span>
                                <span class="cls2" style="cursor: pointer;" hidden onclick="hideDown1()"
                                    id="id2">Kategorial</span>
                                <button id="down1" onclick="hideUp1()"
                                    style="border: none; background-color: transparent; padding-right: 109px;"><i
                                        class="fa fa-angle-down down1"></i>
                                </button>
                                <button id="up1" hidden onclick="hideDown1()"
                                    style="border: none; background-color: transparent; padding-right: 109px;"><i
                                        class="fa fa-angle-up up1"></i>
                                </button>
                                <div class="menu-dataJemaat ml-n2" style="color: white;" hidden id="menu-datajem">
                                    <a class="nav-link" href="./kategorial/allKategorial.php">Semua Anggota
                                        Jemaat</a>
                                    <a class="nav-link" href="">Kaum Bapak</a>
                                    <a class="nav-link" href="">Kaum Ibu</a>
                                    <a class="nav-link" href="">Pemuda</a>
                                    <a class="nav-link" href="">PAR</a>
                                </div>
                            </div>
                            <style>
                            .backGround {
                                background-color: #4a99dab7;
                            }
                            </style>
                            <script>
                            var up1 = document.getElementById("up1");
                            var down1 = document.getElementById("down1");
                            var menuDataJemaat = document.getElementById("menu-datajem");
                            var id1 = document.getElementById("id1");
                            var id2 = document.getElementById("id2");
                            var buttonsDataJemaat = document.querySelector(".buttons-dataJemaat");


                            function hideUp1() {
                                buttonsDataJemaat.classList.add("backGround");
                                down1.hidden = true;
                                up1.hidden = false;
                                menuDataJemaat.hidden = false;
                                id2.hidden = false;
                                id1.hidden = true;
                            }

                            function hideDown1() {
                                id2.hidden = true;
                                id1.hidden = false;
                                down1.hidden = false;
                                up1.hidden = true;
                                menuDataJemaat.hidden = true;
                            }
                            </script>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Anggota Jemaat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Baptisan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Sidi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Pernikahan</a>
                        </li>
                        <!-- <h6
                            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Saved reports</span>
                            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                                <span data-feather="plus-circle"></span>
                            </a>
                        </h6>
                        <ul class="nav flex-column mb-2">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="file-text"></span>
                                    Current month
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="file-text"></span>
                                    Last quarter
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="file-text"></span>
                                    Social engagement
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="file-text"></span>
                                    Year-end sale
                                </a>
                            </li>
                        </ul> -->
                        <h6
                            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Akun</span>
                            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                                <span data-feather="plus-circle"></span>
                            </a>
                        </h6>
                        <ul class="nav flex-column mb-2">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="file-text"></span>
                                    Ganti Password
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="file-text"></span>
                                    Logout
                                </a>
                            </li>
                        </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex mt-n2 justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button>
                    </div>
                </div>
                <div class="container container-cards col-sm-10">
                    <div class="row mt-n2 card-jumlah-jemaat slider justify-content-center">
                        <div class="card mt-2 mb-2 ml-3 mr-3 m-2">
                            <div class="card-body text-primary">
                                <h6 class="text-center">Total Jemaat</h6>
                                <h5 class="text-center">140</h5>
                            </div>
                        </div>
                        <div class="card m-2 mt-2 mb-2 ml-3 mr-3">
                            <div class="card-body text-dark">
                                <h6 class="text-center">Kaum Bapak</h6>
                                <h5 class="text-center">20</h5>
                            </div>
                        </div>
                        <div class="card m-2 mt-2 mb-2 ml-3 mr-3">
                            <div class="card-body text-danger">
                                <h6 class="text-center">Kaum Ibu</h6>
                                <h5 class="text-center">40</h5>
                            </div>
                        </div>
                        <div class="card mt-2 mb-2 mt-2 mb-2 ml-3 mr-3">
                            <div class="card-body text-warning">
                                <h6 class="text-center">Pemuda</h6>
                                <h5 class="text-center">60</h5>
                            </div>
                        </div>
                        <div class="card m-2 mt-2 mb-2 ml-3 mr-3">
                            <div class="card-body text-info">
                                <h6 class="text-center">PAR</h6>
                                <h5 class="text-center">20</h5>
                            </div>
                        </div>
                        <div class="card m-2 mt-2 mb-2 ml-3 mr-3" id="cardTeruna">
                            <div class="card-body text-info">
                                <h6 class="text-center">Teruna</h6>
                                <h5 class="text-center">20</h5>
                            </div>
                        </div>
                        <div class="card m-2 mt-2 mb-2 ml-3 mr-3" id="cardLansia">
                            <div class="card-body text-warning">
                                <h6 class="text-center">Lansia</h6>
                                <h5 class="text-center">20</h5>
                            </div>
                        </div>
                        <!-- <button class="button col-md-10" style="border: none; color: gray; background-color: transparent;"
                        id="btnTerunaLansiaShow">
                        <small><i>Klik untuk melihat semua</i></small>
                        <i class="fa fa-angle-down" id="cardTerunaLansiaDown"></i>
                    </button>
                    <button hidden class="button col-md-10"
                        style="border: none; color: gray; background-color: transparent;" id="btnTerunaLansiaHide">
                        <small><i>Klik untuk melihat sebagian</i></small>
                        <i class="fa fa-angle-up" id="cardTerunaLansiaUp"></i>
                    </button> -->
                    </div>
                </div>


                <!-- <script>
                var btnTerunaLansiaShow = document.getElementById("btnTerunaLansiaShow");
                var btnTerunaLansiaHide = document.getElementById("btnTerunaLansiaHide");
                btnTerunaLansiaShow.addEventListener("click", function() {
                    const cardUp = document.getElementById("cardTerunaLansiaUp");
                    const cardDown = document.getElementById("cardTerunaLansiaDown");
                    const cardTeruna = document.getElementById("cardTeruna");
                    const cardLansia = document.getElementById("cardLansia");
                    btnTerunaLansiaShow.hidden = true;
                    btnTerunaLansiaHide.hidden = false;
                    btnTerunaLansiaHide.style.display = "block";
                    cardUp.hidden = false;
                    cardDown.hidden = true;
                    cardTeruna.hidden = false;
                    cardLansia.hidden = false;
                }); -->

                <!-- btnTerunaLansiaHide.addEventListener("click", function() {
                    const cardUp = document.getElementById("cardTerunaLansiaUp");
                    const cardDown = document.getElementById("cardTerunaLansiaDown");
                    const cardTeruna = document.getElementById("cardTeruna");
                    const cardLansia = document.getElementById("cardLansia");
                    btnTerunaLansiaHide.hidden = true;
                    btnTerunaLansiaShow.hidden = false;
                    cardUp.hidden = true;
                    cardDown.hidden = false;
                    cardTeruna.hidden = true;
                    cardLansia.hidden = true;
                });
                </script> -->
                <div class="container-chart justify-content-center row">
                    <div class="charts card m-2 col-md-6">
                        <div class="card-body">
                            <canvas class="w-100" id="myLineChart" width="100" height="75"></canvas>
                        </div>
                    </div>
                    <div class="pie-chart card m-2 col-md-4">
                        <div class="card-body bg-white">
                            <canvas class="w-100" id="myPieChart" width="100" height="75"></canvas>
                        </div>
                    </div>
                </div>
                <!-- <div class="charts-hide" id="charts-hide" style="display: none;">
                    <div id="hidden-charts col-12" class="charts-hidden">
                        <div class="charts col-md-6">
                            <canvas class="my-4 w-100" id="myChart2" width="100" height="100"></canvas>
                        </div>
                        <div class="charts1 charts col-md-6">
                            <canvas class="my-4 w-100" id="myChart3" width="20" height="20"></canvas>
                        </div>
                    </div>
                    <div id="hidden-charts col-12" class="charts-hidden">
                        <div class="charts1 charts col-md-6">
                            <canvas class="my-4 w-100" id="myChart1" width="20" height="20"></canvas>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="buttonShowDiagram d-flex justify-content-center col-md-12" id="btnShow">
                    <button onclick="showCharts()" id="btnDown" class="btn btn-primary">Lihat semua diagram <i
                            class="fa fa-angle-down"></i></button>
                    <button onclick="hideCharts()" id="btnUp" style="display: none;" class="btn btn-primary">Sembunyikan
                        diagram <i class="fa fa-angle-up"></i></button>
                </div> -->
                <h2 class="mt-5">Section title</h2>

                <?php
                    // require_once './kategorial/allKategorial.php';
                ?>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Header</th>
                                <th>Header</th>
                                <th>Header</th>
                                <th>Header</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1,001</td>
                                <td>random</td>
                                <td>data</td>
                                <td>placeholder</td>
                                <td>text</td>
                            </tr>
                            <tr>
                                <td>1,002</td>
                                <td>placeholder</td>
                                <td>irrelevant</td>
                                <td>visual</td>
                                <td>layout</td>
                            </tr>
                            <tr>
                                <td>1,003</td>
                                <td>data</td>
                                <td>rich</td>
                                <td>dashboard</td>
                                <td>tabular</td>
                            </tr>
                            <tr>
                                <td>1,003</td>
                                <td>information</td>
                                <td>placeholder</td>
                                <td>illustrative</td>
                                <td>data</td>
                            </tr>
                            <tr>
                                <td>1,004</td>
                                <td>text</td>
                                <td>random</td>
                                <td>layout</td>
                                <td>dashboard</td>
                            </tr>
                            <tr>
                                <td>1,005</td>
                                <td>dashboard</td>
                                <td>irrelevant</td>
                                <td>text</td>
                                <td>placeholder</td>
                            </tr>
                            <tr>
                                <td>1,006</td>
                                <td>dashboard</td>
                                <td>illustrative</td>
                                <td>rich</td>
                                <td>data</td>
                            </tr>
                            <tr>
                                <td>1,007</td>
                                <td>placeholder</td>
                                <td>tabular</td>
                                <td>information</td>
                                <td>irrelevant</td>
                            </tr>
                            <tr>
                                <td>1,008</td>
                                <td>random</td>
                                <td>data</td>
                                <td>placeholder</td>
                                <td>text</td>
                            </tr>
                            <tr>
                                <td>1,009</td>
                                <td>placeholder</td>
                                <td>irrelevant</td>
                                <td>visual</td>
                                <td>layout</td>
                            </tr>
                            <tr>
                                <td>1,010</td>
                                <td>data</td>
                                <td>rich</td>
                                <td>dashboard</td>
                                <td>tabular</td>
                            </tr>
                            <tr>
                                <td>1,011</td>
                                <td>information</td>
                                <td>placeholder</td>
                                <td>illustrative</td>
                                <td>data</td>
                            </tr>
                            <tr>
                                <td>1,012</td>
                                <td>text</td>
                                <td>placeholder</td>
                                <td>layout</td>
                                <td>dashboard</td>
                            </tr>
                            <tr>
                                <td>1,013</td>
                                <td>dashboard</td>
                                <td>irrelevant</td>
                                <td>text</td>
                                <td>visual</td>
                            </tr>
                            <tr>
                                <td>1,014</td>
                                <td>dashboard</td>
                                <td>illustrative</td>
                                <td>rich</td>
                                <td>data</td>
                            </tr>
                            <tr>
                                <td>1,015</td>
                                <td>random</td>
                                <td>tabular</td>
                                <td>information</td>
                                <td>text</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <!-- 
    <script>
    var pieChartHide = document.getElementById("charts-hide");
    var BtnShowChart = document.getElementById("btnDown");
    var BtnHideChart = document.getElementById("btnUp");

    function showCharts() {
        BtnShowChart.style.display = "none";
        BtnHideChart.style.display = "block";
        pieChartHide.style.display = "block";
    }

    function hideCharts() {
        BtnShowChart.style.display = "block";
        BtnHideChart.style.display = "none";
        pieChartHide.style.display = "none";
    }
    </script> -->
    <script src="../../assets/bootstrap/jquery/jquery.js">
    </script>
    <!-- <script>
    window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script> -->
    <script src="../../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../../resource/chartJs/dist/chart.js"></script>
    <script src="../../resource/chartJs/dist/chart.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script> -->
    <script src="../admin/dashboard/chart.js"></script>
    <script src="../../resource/slick-master/slick/slick.min.js"></script>

    <script>
    $(document).ready(function() {

        $('.slider').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]
        });
        // $('.slider').slick({
        //     centerMode: true,
        //     centerPadding: '60px',
        //     slidesToShow: 4,
        //     responsive: [{
        //             breakpoint: 768,
        //             settings: {
        //                 arrows: false,
        //                 centerMode: true,
        //                 centerPadding: '40px',
        //                 slidesToShow: 3
        //             }
        //         },
        //         {
        //             breakpoint: 480,
        //             settings: {
        //                 arrows: false,
        //                 centerMode: true,
        //                 centerPadding: '40px',
        //                 slidesToShow: 1
        //             }
        //         }
        //     ]
        // });
    });
    </script>
</body>

</html>