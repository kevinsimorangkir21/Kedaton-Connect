<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" navbar-scroll="true" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a></li>
                <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">{{ str_replace('-', ' ', Request::path()) }}</li>
            </ol>
            <h6 class="font-weight-bolder mb-0 text-capitalize">{{ str_replace('-', ' ', Request::path()) }}</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar"> 
            <div class="nav-item dropdown d-flex align-self-end">
                <a href="#" class="btn btn-primary active mb-0 text-white dropdown-toggle" role="button" id="spreadsheetDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-file"></i> File
                </a>
                <ul class="dropdown-menu" aria-labelledby="spreadsheetDropdown">
                    <li><a class="dropdown-item" href="https://docs.google.com/spreadsheets/d/1wJcP47ZJD0ao1qNJeVolZYE3HrwC8ABIqr0aifRnfr8/edit#gid=55332613" target="_blank">NEW ALL ORDER HSI LAMPUNG</a></li>
                    <li><a class="dropdown-item" href="https://docs.google.com/spreadsheets/d/1V-N9sFMobS8UKH44Sa842jo_-fAwCFR_nTo_v-vlivA/edit?gid=0#gid=0" target="_blank">PT3 BGES & AODM</a></li>
                    <!-- <li><a class="dropdown-item" href="#" target="_blank">Spreadsheet 3</a></li>
                    <li><a class="dropdown-item" href="#" target="_blank">Spreadsheet 4</a></li> -->
                </ul>
            </div>
            <div class="ms-md-3 pe-md-3 d-flex align-items-center">
                <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="Type here...">
                </div>
            </div>
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a href="{{ url('/logout')}}" class="nav-link text-body font-weight-bold px-0">
                        <i class="fa-solid fa-door-open"></i>
                        <span class="d-sm-inline d-none">Sign Out</span>
                    </a>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
