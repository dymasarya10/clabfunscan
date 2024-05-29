<nav class="sb-sidenav accordion sb-sidenav-light AppSidebar border-end" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav px-3 pt-4">
            <div class="container-fluid d-flex">
                <img src="{{ asset('myassets/img/LabJakAppsLogo.png') }}" alt="" class="img fluid" width="42rem">
                <div class="container-fluid d-flex flex-column">
                    <div class="fw-bold small">LabFunScan</div>
                    <div class="fw-light small">Dymas Arya</div>
                </div>
            </div>
            <div class="sb-sidenav-menu-heading">menu utama</div>
            <a class="nav-link py-2 {{ $title === 'dashboard' ? 'active' : '' }}" style="--bs-nav-link-font-size: .9rem;" href="{{ route('adm-dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <a class="nav-link py-2 {{ $title === 'konten' ? 'active' : '' }}" style="--bs-nav-link-font-size: .9rem;" href="{{ route('adm-contents') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-qrcode"></i></div>
                Konten
            </a>
        </div>
        {{-- <div class="container-fluid p-3 mt-4">
            <div class="bg-white rounded-3 p-3 shadow AppSidebarMessage mb-2">
                <div class="row mb-2">
                    <div class="col-5">
                        <img src="{{ asset('myassets/img/LogoYayasan.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-7">
                        <div class="fw-light">
                            Sekolah Laboratorium Jakarta
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="sb-sidenav-footer">
        <div class="container-fluid p-3 d-flex justify-content-end">
            <a href="" class="text-danger small w-100 btn-danger" data-bs-toggle="modal"
                data-bs-target="#logoutModal">
                <i class="fa-solid fa-right-from-bracket"></i>&nbsp;Keluar
            </a>
        </div>
    </div>
</nav>
