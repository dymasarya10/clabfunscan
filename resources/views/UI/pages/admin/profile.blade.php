@extends('UI.templates.body')
@section('main-admin-section')
    <div class="row">
        @if (session()->has('success'))
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="col-12">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Gagal mengganti password silakan cek kembali form anda
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if (session()->has('failed'))
            <div class="col-12">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('failed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div id="profil" class="col-12 col-lg-6">
            <div class="bg-white rounded-4 AppShadow p-4 mb-3">
                <h5 class="mb-4">Profil</h5>
                <div class="container-fluid">
                    <div class="row row-cols-1">
                        <div class="col">
                            <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="" width="70rem"
                                class="img-fluid rounded-circle">
                        </div>
                        <div class="col mt-4">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            Nama
                                        </td>
                                        <td>
                                            : {{ auth()->user()->nama }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Email
                                        </td>
                                        <td>
                                            : {{ auth()->user()->email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Nama Pengguna
                                        </td>
                                        <td>
                                            : {{ auth()->user()->nama_pengguna }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jenjang
                                        </td>
                                        <td class="text-uppercase">
                                            : {{ auth()->user()->teacher->education_level->nama_jenjang }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button onclick="ShowForm()" class="btn btn-primary mt-3">
                                Ganti Password
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="form" class="col-12 col-lg-6 d-none">
            <div class="bg-white AppShadow rounded-4 p-4 mb-3">
                <h5 class="mb-4">
                    Ganti Password
                </h5>
                <form action="{{ route('changepass') }}" method="post">
                    <form>
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Password Lama</label>
                            <input type="password"
                                class="form-control @error('oldPass')
                                is-invalid
                            @enderror"
                                id="exampleInputEmail1" name="oldPass" aria-describedby="emailHelp">
                            @error('oldPass')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password Baru</label>
                            <input type="password"
                                class="form-control @error('newPass')
                                is-invalid
                            @enderror"
                                name="newPass" id="exampleInputPassword1">
                            @error('newPass')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button onclick="return confirm('Apakah anda yakin ?')" type="submit"
                            class="btn btn-primary">Ganti</button>
                        <button onclick="ShowProfil()" type="button" class="btn btn-danger">Batal</button>
                    </form>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('myassets/js/profile.js') }}"></script>
@endsection
