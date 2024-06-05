@extends('UI.templates.body')
@section('main-admin-section')
    @if (session()->has('success') || $errors->any())
        <div class="alert alert-{{ session()->has('success') ? 'success' : 'warning' }} alert-dismissible fade show rounded-3 shadow-sm"
            role="alert">
            @if (session()->has('success'))
                <strong>Sukses !</strong>
                {{ session('success') }}
            @else
                <strong>Gagal membuat data !</strong>
                Harap cek kembali form anda
            @endif
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row row-cols-1">
        <div class="col">
            <div class="bg-white rounded-4 p-4 AppShadow mb-4 animate__animated animate__faster" id="creator_list">
                <h5 class="mb-4">Data Creator</h5>
                <a onclick="ShowCreateForm()" class="btn btn-primary rounded-3 mb-4">
                    Tambah Data
                </a>
                <table id="table_creator">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Nama Pengguna</th>
                            <th>Email</th>
                            <th>Foto</th>
                            <th>Jenjang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Nama Pengguna</th>
                            <th>Email</th>
                            <th>Foto</th>
                            <th>Jenjang</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($creators as $creator)
                            <tr>
                                <td>{{ $creator->user->nama }}</td>
                                <td>{{ $creator->user->nama_pengguna }}</td>
                                <td>{{ $creator->user->email }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $creator->user->foto) }}" alt=""
                                        class="img-fluid rounded-circle" width="40rem">
                                </td>
                                <td>
                                    {{ strtoupper($creator->education_level->nama_jenjang) }}
                                </td>
                                <td>
                                    <div class="container-fluid">
                                        <div class="row row-cols-1 row-cols-md-2 justify-content-center">
                                            <div class="col p-1">
                                                <a onclick="ShowUpdateForm({{ $creator }},'{{ encrypt($creator->id) }}')"
                                                    class="btn btn-sm btn-warning w-100">
                                                    Edit
                                                </a>
                                            </div>
                                            <div class="col p-1">
                                                <a class="btn btn-sm btn-danger w-100" data-bs-toggle="modal"
                                                    data-bs-target="#confirm_modal"
                                                    onclick="LoadConfirmData('delete',{{ $creator->id }})">
                                                    Hapus
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-12 col-lg-7">
                    <div class="bg-white rounded-4 p-4 AppShadow mb-4 animate__animated animate__faster d-none"
                        id="create_creator">
                        <h5 class="mb-4">Tambah Data Creator</h5>
                        @if ($edulvls->count() < 1)
                            <div class="container-fluid fst-italic text-secondary d-flex flex-column">
                                <div class="container">
                                    <i class="fa-solid fa-circle-exclamation"></i>&nbsp;&nbsp;Belum ada jenjang yang
                                    tersedia !
                                    Silakan tambah data jenjang.
                                </div>
                                <div class="container-fluid mt-3">
                                    <div class="btn btn-primary btn-sm" onclick="ShowCreatorList('create')">Kembali</div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{ route('creators.store') }}" method="POST"
                                        enctype="multipart/form-data" id="post_form">
                                        @csrf
                                        <div class="mb-3">
                                            <div class="d-flex">
                                                <div class="me-3">
                                                    <img src="{{ asset('myassets/img/emptyfile.png') }}" alt=""
                                                        class="rounded-circle" width="90rem" height="90rem"
                                                        id="previewImg">
                                                </div>
                                                <div class="">
                                                    <label for="" class="form-label">Masukan foto</label>
                                                    <input type="file" name="foto_post"
                                                        class="form-control @error('foto_post')
                                            is-invalid
                                        @enderror"
                                                        onchange="previewImage(event)">
                                                    @error('foto_post')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row row-cols-1 row-cols-md-2">
                                                <div class="col">
                                                    <label for="exampleInputEmail1" class="form-label">Nama Pengguna</label>
                                                    <input name="nama_pengguna_post" type="text"
                                                        class="form-control @error('nama_pengguna_post')
                                            is-invalid
                                        @enderror"
                                                        aria-describedby="emailHelp"
                                                        value="{{ old('nama_pengguna_post') }}">
                                                    @error('nama_pengguna_post')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col">
                                                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                                                    <input name="nama_post" type="text"
                                                        class="form-control @error('nama_post')
                                            is-invalid
                                        @enderror"
                                                        aria-describedby="emailHelp" value="{{ old('nama_post') }}">
                                                    @error('nama_post')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email</label>
                                            <input type="email"
                                                class="form-control @error('email_post')
                                    is-invalid
                                @enderror"
                                                aria-describedby="emailHelp" name="email_post"
                                                value="{{ old('email_post') }}">
                                            @error('email_post')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password"
                                                class="form-control @error('password_post')
                                    is-invalid
                                @enderror"
                                                id="exampleInputPassword1" name="password_post"
                                                value="{{ old('password_post') }}">
                                            @error('password_post')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Pilih Jenjang</label>
                                            <select
                                                class="form-select @error('education_level_id_post')
                                    is-invalid
                                @enderror"
                                                aria-label="Default select example" name="education_level_id_post">
                                                <option value="pilih">Pilih</option>
                                                @foreach ($edulvls as $edulvl)
                                                    <option value="{{ base64_encode($edulvl->id) }}"
                                                        {{ old('education_level_id_post') === base64_encode($edulvl->id) ? 'selected' : '' }}>
                                                        {{ strtoupper($edulvl->nama_jenjang) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('education_level_id_post')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="container-fluid p-0 text-end mt-4">
                                            <div class="btn btn-danger" onclick="ShowCreatorList('create')">Batal</div>
                                            <a class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#confirm_modal"
                                                onclick="LoadConfirmData('post')">Simpan</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="bg-white rounded-4 p-4 AppShadow mb-4 animate__animated animate__faster d-none"
                        id="update_creator">
                        <h5 class="mb-4">Edit Creator</h5>
                        <form action="{{ route('creators.put') }}" method="POST" enctype="multipart/form-data"
                            id="update_form">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <div class="d-flex">
                                    <div class="me-3">
                                        <img src="{{ asset('myassets/img/emptyfile.png') }}" alt=""
                                            class="rounded-circle" width="90rem" height="90rem" id="foto_field">
                                    </div>
                                    <div class="">
                                        <label for="" class="form-label">Masukan foto</label>
                                        <input type="file" name="foto_update"
                                            class="form-control @error('foto_update')
                                            is-invalid
                                        @enderror"
                                            onchange="previewEditImage(event)">
                                        @error('foto_update')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="form-text fst-italic">Kosongkan jika tidak ingin mengganti foto. Maks
                                            3mb</div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row row-cols-1 row-cols-md-2">
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Nama Pengguna</label>
                                        <input id="nama_pengguna_field" name="nama_pengguna_update" type="text"
                                            class="form-control @error('nama_pengguna_update')
                                            is-invalid
                                        @enderror"
                                            aria-describedby="emailHelp" value="{{ old('nama_pengguna_update') }}">
                                        @error('nama_pengguna_update')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                                        <input id="nama_field" name="nama_update" type="text"
                                            class="form-control @error('nama_update')
                                            is-invalid
                                        @enderror"
                                            aria-describedby="emailHelp" value="{{ old('nama_update') }}">
                                        @error('nama_update')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input id="email_field" type="email"
                                    class="form-control @error('email_update')
                                    is-invalid
                                @enderror"
                                    aria-describedby="emailHelp" name="email_update" value="{{ old('email_update') }}">
                                @error('email_update')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Pilih Jenjang</label>
                                <select id="edulevel_field"
                                    class="form-select @error('education_level_id_update')
                                    is-invalid
                                @enderror"
                                    aria-label="Default select example" name="education_level_id_update">
                                    <option value="pilih">Pilih</option>
                                    @foreach ($edulvls as $edulvl)
                                        <option class="FormOption" value="{{ base64_encode($edulvl->id) }}"
                                            {{ old('education_level_id_update') === base64_encode($edulvl->id) ? 'selected' : '' }}>
                                            {{ strtoupper($edulvl->nama_jenjang) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('education_level_id_update')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <input type="hidden" name="id_update" id="id_field">
                            <div class="container-fluid p-0 text-end mt-4">
                                <div class="btn btn-danger" onclick="ShowCreatorList('update')">Batal</div>
                                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirm_modal"
                                    onclick="LoadConfirmData('update')">Simpan</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('creators.destroy') }}" method="post" id="delete_form" class="d-none">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id_creator_delete" id="delete_id">
    </form>
    @include('UI.partials.confirm-modal')
    <script src="{{ asset('myassets/js/creator.js') }}"></script>
@endsection
