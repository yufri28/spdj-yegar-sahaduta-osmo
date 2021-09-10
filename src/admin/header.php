<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="../../../resource/slick-master/slick/slick.css">
    <!-- <link rel="stylesheet" href="../../resource/slick-master/slick/slick-theme.css"> -->
    <title>Frontendfunn - Bootstrap 5 Admin Dashboard Template</title>
    <style>
    @charset 'UTF-8';

    .top-nav,
    #sidebar {
        background: #2876b6;
    }

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
    </style>
</head>

<body>
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark top-nav fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
                aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
            </button>
            <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="#">SPDJ | J-Yes Osmo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar"
                aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="topNavBar">
                <form class="d-flex ms-auto my-3 my-lg-0">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person-fill"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div class="offcanvas offcanvas-start sidebar-nav" tabindex="-1" id="sidebar">
        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3">
                            <span style="color: rgba(255, 255, 255, 0.589);">CORE</span>
                        </div>
                    </li>
                    <li class="list-active-page">
                        <a href="#" class="nav-link px-3 dashboard active">
                            <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                            <span class="core-active">Dashboard</span>
                        </a>
                    </li>
                    <li class="my-4">
                        <hr class="dropdown-divider bg-light" />
                    </li>
                    <li>
                        <a href="./index.php" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts">
                            <span class="me-2"><i class="bi bi-layout-split"></i></span>
                            <span>Layouts</span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse" id="layouts">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="#" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- kategorial -->
                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#kategorial">
                            <span class="me-2"><i class="bi bi-people"></i></span>
                            <span>Kategorial</span>
                            <span class="ms-auto"><span class="right-icon"><i class="bi bi-chevron-down"></i></span>
                            </span>
                        </a>
                        <div class="collapse" id="kategorial">
                            <ul class="navbar-nav ps-3">
                                <li class="list-active">
                                    <a href="./kategorial.php" class="nav-link semua-kategori px-3">
                                        <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                                        <span>Semua Kategorial</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="./kategorial.php?mod=bapak" class="nav-link kaum-bapak px-3">
                                        <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                                        <span>Kaum Bapak</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="./kategorial.php?mod=ibu" class="nav-link kaum-ibu px-3">
                                        <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                                        <span>Kaum Ibu</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="./kategorial.php?mod=pemuda" class="nav-link pemuda px-3">
                                        <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                                        <span>Pemuda</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="./kategorial.php?mod=par" class="nav-link par px-3">
                                        <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                                        <span>PAR</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- pernikahan -->
                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#pernikahan">
                            <span class="me-2"><i class="bi bi-people"></i></span>
                            <span>Pernikahan</span>
                            <span class="ms-auto"><span class="right-icon"><i class="bi bi-chevron-down"></i></span>
                            </span>
                        </a>
                        <div class="collapse" id="pernikahan">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="#" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- baptisan -->
                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#baptisan">
                            <span class="me-2"><i class="bi bi-people"></i></span>
                            <span>Baptisan</span>
                            <span class="ms-auto"><span class="right-icon"><i class="bi bi-chevron-down"></i></span>
                            </span>
                        </a>
                        <div class="collapse" id="baptisan">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="#" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- sidi -->
                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#sidi">
                            <span class="me-2"><i class="bi bi-people"></i></span>
                            <span>Sidi</span>
                            <span class="ms-auto"><span class="right-icon"><i class="bi bi-chevron-down"></i></span>
                            </span>
                        </a>
                        <div class="collapse" id="sidi">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="#" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-book-fill"></i></span>
                            <span>Pages</span>
                        </a>
                    </li>
                    <li class="my-4">
                        <hr class="dropdown-divider bg-light" />
                    </li>
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                            <span style="color: rgba(255, 255, 255, 0.589);">Addons</span>

                        </div>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-graph-up"></i></span>
                            <span>Charts</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-table"></i></span>
                            <span>Tables</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>