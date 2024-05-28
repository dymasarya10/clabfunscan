<nav class="sb-topnav navbar navbar-expand navbar-dark AppNavbar">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="#">
        <img src="{{ asset('myassets/img/LabJakAppsDark.png') }}" alt="Logo" width="30rem"
            class="d-inline-block align-text-bottom me-3">
        {{ env('APP_NAME') }}
    </a>
    <div
        class="container-fluid d-none d-md-flex justify-content-start align-items-center ms-auto me-0 me-md-3 my-2 my-md-0">
    </div>
    <!-- Navbar Search-->
    {{-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 border border-warning">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form> --}}
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            {{-- <a class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#profileImage" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false"><img src="{{ asset('myassets/img/ProfileImg.png') }}" alt=""
                    class="img-fluid rounded-circle me-1" width="40rem"></a> --}}
            {{-- <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="#!">Logout</a></li>
            </ul> --}}
            <!-- Sidebar Toggle-->
            {{-- <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-dark bg-white rounded-circle" id="sidebarToggle"
                href="#!"><i class="fas fa-bars"></i></button> --}}
        </li>
    </ul>
</nav>
<!-- Modal Profile -->
<div class="modal fade" id="profileImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-4">
                <img src="{{ asset('myassets/img/ProfileImg.png') }}" alt="" class="img-fluid rounded-circle">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger bg-AppDanger" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
