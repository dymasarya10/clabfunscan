@include('UI.templates.head')

<body class="f-PlusJakartaSans">
    <div class="d-flex vh-100 align-items-center justify-content-center">
        {{-- style="background-color: rgba(255, 255, 255, 0.8);" --}}
        <div id="AppLoginForm" class="AppLoginForm d-none justify-content-center align-items-center animate__animated"
            style="width: 40rem">
            <div class="row justify-content-center">
                <div class="col-10 col-lg-7">
                    <div class="d-flex flex-column min-vh-100 w-100 align-items-center justify-content-center">
                        <img src="{{ asset('myassets/img/LabJakAppsLogo.png') }}" width="80rem" alt=""
                            class="img-fluid">
                        <h3 class="h4 mt-3">{{ env('APP_NAME') }}</h3>
                        <form action="{{ route('auth') }}" method="POST" class="mt-3 w-100">
                            @csrf
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                Login Gagal
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <div class="form-floating mb-2">
                                <input name="nama_pengguna" type="text" class="form-control" id="floatingInput"
                                    placeholder="Nama Pengguna">
                                <label for="floatingInput">Nama Pengguna</label>
                            </div>
                            <div class="form-floating">
                                <input name="password" type="password" class="form-control" id="floatingPassword"
                                    placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="d-flex flex-column mt-4">
                                <button type="submit" class="btn btn-primary w-100 mb-2">Login</button>
                                <a href="" class="btn btn-primary w-100"
                                    style="
                                    --bs-btn-bg: white;
                                    --bs-btn-color: #0d6efd;
                                    --bs-btn-hover-bg: whitesmoke;
                                    --bs-btn-hover-color: #0d6efd;
                                ">Register</a>
                            </div>
                        </form>
                        <div class="small mt-3">Copyright&copy; D-Lab 2024</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('UI.partials.preloader')
    @include('UI.templates.foot')
