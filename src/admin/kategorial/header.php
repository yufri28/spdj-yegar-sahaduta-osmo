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
                 <li>
                     <a href="#" class="nav-link px-3 active">
                         <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                         <span>Dashboard</span>
                     </a>
                 </li>
                 <li class="my-4">
                     <hr class="dropdown-divider bg-light" />
                 </li>
                 <li>
                     <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                         <span style="color: rgba(255, 255, 255, 0.589);">Jemaat</span>
                     </div>
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
                 <li>
                     <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#kategorial">
                         <span class="me-2"><i class="bi bi-people"></i></span>
                         <span>Kategorial</span>
                         <span class="ms-auto"><span class="right-icon"><i class="bi bi-chevron-down"></i></span>
                         </span>
                     </a>
                     <div class="collapse" id="kategorial">
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