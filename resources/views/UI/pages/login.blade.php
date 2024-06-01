@include('UI.templates.head')

<body class="f-PlusJakartaSans"
    style="background-image: url(https://source.unsplash.com/1440x900); background-size: cover;background-position: center;">
    <div class="d-flex vh-100 align-items-center justify-content-center"
        style="background-color: rgba(255, 255, 255, 0.8);">
        <div class="AppLoginForm p-4 rounded-4 d-flex flex-column justify-content-center align-items-center">
            <img src="{{ asset('myassets/img/LabJakAppsDark.png') }}" alt="" class="img-fluid" width="50rem">
            <div class="container-fluid text-center mt-4">
                <h3 class="h4 text-white">{{ env('APP_NAME') }}</h3>
            </div>
            <form action="" class="mt-3 w-100">
                <div class="form-floating mb-3 w-100 ">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">ID Pengguna</label>
                </div>
                <div class="form-floating w-100 ">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Kata Sandi</label>
                </div>
                <a href="/dashboard" class="w-100 btn btn-primary btn-sm w-100 mt-4"
                    style="
                    --bs-btn-bg: rgba(255, 255, 255, 0.0);
                    --bs-btn-border-color: rgba(255, 255, 255, 1);
                    --bs-btn-hover-color: rgba(255, 255, 255, 1);
                    --bs-btn-hover-bg: #6610E1;
                    --bs-btn-hover-border-color: #6610E1;
                    --bs-btn-focus-shadow-rgb: #6610E1;
                    --bs-btn-active-color: #6610E1;
                    --bs-btn-active-bg: #6610E1;
                    --bs-btn-active-border-color: #6610E1;
                ">
                    MASUK
                </a>
                <button type="submit" class="d-none btn btn-primary btn-sm w-100 mt-4"
                    style="
                    --bs-btn-bg: rgba(255, 255, 255, 0.0);
                    --bs-btn-border-color: rgba(255, 255, 255, 1);
                    --bs-btn-hover-color: rgba(255, 255, 255, 1);
                    --bs-btn-hover-bg: #6610E1;
                    --bs-btn-hover-border-color: #6610E1;
                    --bs-btn-focus-shadow-rgb: #6610E1;
                    --bs-btn-active-color: #6610E1;
                    --bs-btn-active-bg: #6610E1;
                    --bs-btn-active-border-color: #6610E1;
                ">
                    MASUK
                </button>
            </form>
            <div class="small mt-4 text-white" style="font-size: .75rem">Copyright &copy; D-Lab 2024</div>
        </div>
    </div>
    @include('UI.partials.preloader')
    @include('UI.templates.foot')
