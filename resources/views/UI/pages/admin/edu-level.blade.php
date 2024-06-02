@extends('UI.templates.body')
@section('main-admin-section')
    @if (session()->has('success') || $errors->any())
        <div class="alert alert-{{ session()->has('success') ? 'success' : 'warning' }} alert-dismissible fade show rounded-3 shadow-sm"
            role="alert">
            @if (session()->has('success'))
                <strong>Sukses !</strong>
                {{ session('success') }}
            @else
                {{-- {{ dd($errors) }} --}}
                <strong>Gagal membuat data !</strong>
                Harap cek kembali form anda
            @endif
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col-12 col-xl-5" style="z-index: 10">
            <div class="bg-white rounded-4 AppShadow p-4 mb-3">
                <h5 class="mb-4">Data Jenjang</h5>
                <button class="btn btn-primary mb-4" onclick="OpenFormParent('none','none','post')">
                    Tambah Data
                </button>
                <table id="table_jenjang">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($edu_levels as $key => $edu_level)
                            <tr>
                                <td>
                                    <div class="text-uppercase">{{ $edu_level->nama_jenjang }}</div>
                                </td>
                                <td>
                                    <div class="container-fluid">
                                        <div class="row row-cols-1 row-cols-lg-2 justify-content-center">
                                            <div class="col p-1">
                                                <button class="btn btn-sm btn-warning w-100"
                                                    onclick="OpenFormParent('{{ $edu_level->nama_jenjang }}','{{ encrypt($edu_level->id) }}','edit')">
                                                    Edit
                                                </button>
                                            </div>
                                            <div class="col p-1">
                                                <button data-bs-toggle="modal" data-bs-target="#confirm_modal"
                                                    class="btn btn-sm btn-danger w-100"
                                                    onclick="LoadConfirmModal('delete','{{ base64_encode($edu_level->id) }}')">
                                                    Hapus
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form action="{{ route('destroyedulevels') }}" method="POST" class="d-none" id="main_form_delete_data">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="id" id="delete_field">
                </form>
                {{-- <p class="fw-light lh-base" style="text-align: justify">
                Selamat Datang, Dymas Arya <br><br>
                LabFunScan adalah sebuah aplikasi yang dibuat bertujuan untuk mengembangkan gaya kegiatan belajar mengajar di sekolah. Aplikasi ini sangat cocok untuk digunakan ketika KBM dilaksanakan di luar kelas atau <i>Outing Class</i>.<br>
                Cara Penggunaan : <br>
                <ol class="fw-light">
                    <li>Siapkan gambar untuk pembuatan konten</li>
                    <li>Isi bidang judul dan isi konten untuk menambah deskripsi dari konten yang dibuat</li>
                    <li>Sistem akan secara otomatis meng generate kode yang akan dijadikan sebagai <i>qrcode</i></li>
                    <li>Buat qrcode lewat <a href="https://www.canva.com/" target="_blank">canva</a> atau aplikasi lain yang memungkinkan membuat qrcode</li>
                    <li>Konten siap ditampilkan !</li>
                </ol>
            </p>
            <p class="fw-light">Jika terkendala dalam aplikasi silakan hubungi <a href="https://wa.me/089513909248?text=Saya%20terkendala%20aplikasi%20LabFunScan" target="_blank">Dymas</a> untuk troubleshoot lebih lanjut !</p> --}}
            </div>
        </div>
        <div class="col-12 col-xl-4 animate__animated animate__faster animate__fadeOutLeft" id="form_jenjang"
            style="--animation-duration: .5s">
            <div class="d-flex flex-column">
                <div class="bg-white rounded-4 p-4 AppShadow mb-4 order-2 d-none" id="form_container_edit">
                    <h5 class="mb-4">Edit Data</h5>
                    <form action="{{ route('putedulevels') }}" method="POST" id="main_form_edit_data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Jenjang</label>
                            <input name="nama_jenjang_edit" type="text"
                                class="form-control @error('nama_jenjang_edit')
                            is-invalid
                        @enderror"
                                id="inputEdit" aria-describedby="emailHelp">
                            <input type="hidden" name="id_jenjang" id="id_jenjang" class="form-control">
                            <div id="emailHelp" class="form-text">cth: SMP</div>
                            @error('nama_jenjang_edit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="btn btn-danger" onclick="CloseFormParent()">Tutup</div>
                        <div class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirm_modal"
                            onclick="LoadConfirmModal('edit')">Ubah</div>
                    </form>
                </div>
                <div class="bg-white rounded-4 p-4 AppShadow mb-4 order-1 d-none" id="form_container_post">
                    <h5 class="mb-4">Tambah Data</h5>
                    <form action="{{ route('storeedulevels') }}" method="POST" id="main_form_post_data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Jenjang</label>
                            <input name="nama_jenjang_post" type="text"
                                class="form-control @error('nama_jenjang_post')
                            is-invalid
                        @enderror"
                                id="inputEdit" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">cth: SMP</div>
                            @error('nama_jenjang_post')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="btn btn-danger" onclick="CloseFormParent()">Tutup</div>
                        <div class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirm_modal"
                            onclick="LoadConfirmModal('post')">Simpan</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="creator" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Buat Jenjang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('storeedulevels') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Jenjang</label>
                            <input name="nama_jenjang" type="text"
                                class="form-control @error('nama_jenjang')
                                is-invalid
                            @enderror"
                                id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('nama_jenjang') }}">
                            <div id="emailHelp" class="form-text">cth: SMP</div>
                            @error('nama_jenjang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success"
                            onclick="return confirm('Apakah anda yakin ingin membuat data ?')">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirm_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="confirm_modal_message">

                </div>
                <div class="modal-footer">
                    <input id="params" class="d-none"></input>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" id="confirm_modal_button_yes">Ya</button>
                </div>
                {{-- <form action="{{ route('storeedulevels') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Jenjang</label>
                            <input name="nama_jenjang" type="text"
                                class="form-control @error('nama_jenjang')
                                is-invalid
                            @enderror"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">cth: SMP</div>
                            @error('nama_jenjang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success"
                            onclick="return confirm('Apakah anda yakin ingin membuat data ?')">Simpan</button>
                    </div>
                </form> --}}
            </div>
        </div>
    </div>
    <script src="{{ asset('myassets/js/edu-level.js') }}"></script>
@endsection
