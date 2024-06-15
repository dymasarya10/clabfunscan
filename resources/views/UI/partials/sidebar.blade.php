<nav class="sb-sidenav accordion sb-sidenav-light AppSidebar border-end" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav px-3 pt-4">
            <div class="container-fluid d-flex">
                <img src="{{ asset('myassets/img/LabJakAppsLogo.png') }}" alt="" class="img fluid" width="42rem" height="42rem">
                <div class="container-fluid d-flex flex-column">
                    <div class="fw-bold small">{{ env('APP_NAME') }}</div>
                    <div class="fw-light small">{{ explode(" ",auth()->user()->nama)[0] }}</div>
                </div>
            </div>
            @canViewCreator
                <div class="sb-sidenav-menu-heading">superadmin</div>
                <a class="nav-link py-2 {{ $title === 'creator' ? 'active' : '' }}" style="--bs-nav-link-font-size: .9rem;"
                    href="{{ route('creators') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users-line"></i></div>
                    Creator
                </a>
                <a class="nav-link py-2 {{ $title === 'jenjang' ? 'active' : '' }}" style="--bs-nav-link-font-size: .9rem;"
                    href="{{ route('edulevels') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-school"></i></div>
                    Jenjang
                </a>
            @endcanViewCreator
            <div class="sb-sidenav-menu-heading">menu utama</div>
            @notSuperAdmin
            <a class="nav-link py-2 {{ $title === 'profil' ? 'active' : '' }}" style="--bs-nav-link-font-size: .9rem;"
                href="">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                Profil
            </a>
            @endnotSuperAdmin
            <a class="nav-link py-2 {{ $title === 'konten' ? 'active' : '' }}" style="--bs-nav-link-font-size: .9rem;"
                href="{{ route('contents') }}">
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
