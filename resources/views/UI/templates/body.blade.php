@include('UI.templates.head')

<body class="sb-nav-fixed f-PlusJakartaSans">
    {{-- @include('UI.partials.navbar') --}}
    @include('UI.partials.appmenu')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('UI.partials.sidebar')
        </div>
        <div id="layoutSidenav_content" class="AppContent">
            <div class="container-fluid px-4">
                @include('UI.partials.header')
            </div>
            <div class="container-fluid mb-4 px-4 d-flex align-items-center AppNavigation">
                @include('UI.partials.navigation')
            </div>
            <main class="AppMainContent">
                <div class="container-fluid px-4">
                    @yield('main-admin-section')
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto AppFooter">
                @include('UI.partials.footer')
            </footer>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        style="z-index: 99999">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    {{-- <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body text-center">
                    Apakah anda yakin ingin keluar dari aplikasi ?
                    <div class="container-fluid d-flex justify-content-center mt-3">
                        <button type="button" class="mx-1 btn btn-sm btn-danger">
                            Ya
                        </button>
                        <button type="button" data-bs-dismiss="modal" class="mx-1 btn btn-sm btn-danger">
                            Batal
                        </button>
                    </div>
                </div>
                {{-- <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" >Batal</button>
                    <button type="button" class="btn btn-success">Ya</button>
                </div> --}}
            </div>
        </div>
    </div>
    @include('UI.partials.preloader')
    @include('UI.templates.foot')
