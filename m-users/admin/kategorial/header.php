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
 <div class="container-fluid bg-light">
     <div class="row">
         <nav id="sidebarMenu" style="border-radius: 0 5px 5px 0;"
             class="col-md-3 col-lg-2 d-md-block bg-white sidebar collapse">
             <div class="sidebar-sticky pt-3 mt-2">
                 <ul class="nav flex-column">
                     <li class="nav-item">
                         <a class="nav-link" href="../index.php">
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
                                 <a class="nav-link active" href="./kategorial/allKategorial.php">Semua Anggota
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
     </div>
 </div>