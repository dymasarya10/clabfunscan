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
    <div class="row mb-4">
        <div id="AppContentList" class="col-12 animate__animated animate__faster">
            <div class="row mb-3">
                <div class="col-12 col-lg-7 mb-3" style="z-index: 10">
                    <div class="bg-white rounded-4 p-4 AppShadow animate__animated animate__faster">
                        <h5 class="mb-4">Data Konten</h5>
                        @canMakeContent
                        <button onclick="ShowCreateContentForm()" class="btn btn-primary mb-4">Tambah Data</button>
                        @endcanMakeContent
                        <table id="table_konten">
                            <thead>
                                <tr>
                                    @can('showCreator', App\Models\Content::class)
                                        <th>Creator</th>
                                    @endcan
                                    <th>Kode</th>
                                    <th>Judul</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    @can('showCreator', App\Models\Content::class)
                                        <th>Creator</th>
                                    @endcan
                                    <th>Kode</th>
                                    <th>Judul</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($contents as $content)
                                    <tr>
                                        @can('showCreator', App\Models\Content::class)
                                            <td>{{ $content->teacher->user->nama }}</td>
                                        @endcan
                                        <td>{{ $content->kode_qr }}</td>
                                        <td>{{ $content->judul }}</td>
                                        <td>
                                            <div class="container-fluid">
                                                <div class="row row-cols-2 justify-content-center">
                                                    <div class="col p-0">
                                                        <a onclick="ShowPreviewContent({{ $content }})"
                                                            class="btn btn-sm rounded-0 btn-primary w-100">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                    </div>
                                                    @can('notadmin')
                                                        <div class="col p-0">
                                                            <a onclick="ShowEditContentForm({{ $content }},'{{ base64_encode($content->content_id) }}')"
                                                                class="btn btn-sm rounded-0 btn-warning w-100">
                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col p-0">
                                                            <a class="btn btn-sm rounded-0 btn-danger w-100"
                                                                data-bs-toggle="modal" data-bs-target="#confirm_modal"
                                                                onclick="LoadConfirmData('delete','{{ base64_encode($content->content_id) }}')">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    @endcan
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="AppPreviewContent" class="col-12 col-lg-5 d-none animate__animated animate__faster">
                    <div class="bg-white rounded-4 p-4 AppShadow text-center">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="">Preview</h5>
                            <button onclick="ClosePreviewContent()" class="btn text-danger"><i
                                    class="fa-solid fa-xmark h5"></i></button>
                        </div>
                        <h5 id="AppTitleContent" class="mb-3">Judul Kartu</h5>
                        <img src="" alt="" id="AppImageContent" class="img-fluid rounded-3">
                        {{-- <div id="AppTextContent" class="fw-light mt-3 px-2 border text-wrap"
                            style="text-align: justify; height: 20rem; overflow-y:auto; width: 576px;">
                        </div> --}}
                        <textarea id="AppTextContent" class="form-control">

                            </textarea>
                    </div>
                </div>
            </div>
        </div>
        <div id="AppCreateContent" class="col-12 d-none animate__animated animate__faster">
            <div class="bg-white rounded-4 p-4 AppShadow">
                <h5 class="mb-4">Buat Konten</h5>
                <div class="row">
                    <div class="col-12 col-lg-5 mb-3">
                        <label for="" class="form-label mb-2">
                            Preview Gambar
                        </label>
                        <img src="{{ asset('myassets/img/emptyfile.png') }}" alt="" class="img-fluid rounded-3"
                            id="createPreviewImage">
                    </div>
                    <div class="col-12 col-lg-7 mb-3">
                        <form action="{{ route('contents.store') }}" method="POST" enctype="multipart/form-data"
                            id="post_form">
                            @csrf
                            <div class="mb-3">
                                <label for="judul_post" class="form-label">Judul</label>
                                <input value="{{ old('judul_post') }}" type="text"
                                    class="form-control @error('judul_post')
                                    is-invalid
                                @enderror"
                                    id="judul_post" name="judul_post" aria-describedby="emailHelp">
                                @error('judul_post')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gambar_post" class="form-label">Gambar</label>
                                <input onchange="PreviewImagePost(event)" type="file"
                                    class="form-control @error('gambar_post')
                                    is-invalid
                                @enderror"
                                    id="gambar_post" name="gambar_post" aria-describedby="emailHelp" accept=".png, .jpeg, .jpg">
                                @error('gambar_post')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div id="customEditor" class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">
                                    Isi Konten
                                    @error('isi_konten_post')
                                        <div class="small text-danger">{{ $message }}</div>
                                    @enderror
                                </label>
                                <textarea name="isi_konten_post" id="editor" class="form-control">
                                    {{ old('isi_konten_post') }}
                                    </textarea>
                            </div>
                            <div class="container-fluid text-end p-0">
                                <button type="button" onclick="ShowContentList('post')"
                                    class="btn btn-danger">Batal</button>
                                <a data-bs-toggle="modal" data-bs-target="#confirm_modal" class="btn btn-success"
                                    onclick="LoadConfirmData('post')">Simpan</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="AppEditContent" class="col-12 d-none animate__animated animate__faster">
            <div class="bg-white rounded-4 p-4 AppShadow">
                <h5 class="mb-4">Edit Konten</h5>
                <div class="row">
                    <div class="col-12 col-lg-5 mb-3">
                        <label for="" class="form-label mb-2">
                            Preview Gambar
                        </label>
                        <img src="" alt="" class="img-fluid rounded-3" id="editPreviewImage">
                    </div>
                    <div class="col-12 col-lg-7">
                        <form action="{{ route('contents.put') }}" method="POST" enctype="multipart/form-data"
                            id="update_form">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="update_id" id="id_update">
                            <div class="mb-3">
                                <label for="judul_edit" class="form-label">Judul</label>
                                <input value="{{ old('judul_edit') }}" type="text"
                                    class="form-control @error('judul_edit')
                                    is-invalid
                                @enderror"
                                    id="judul_edit" name="judul_edit" aria-describedby="emailHelp">
                                @error('judul_edit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gambar_edit" class="form-label">Gambar</label>
                                <input onchange="PreviewImageEdit(event)" type="file"
                                    class="form-control @error('gambar_edit')
                                    is-invalid
                                @enderror"
                                    id="gambar_edit" name="gambar_edit" aria-describedby="emailHelp" accept=".png">
                                @error('gambar_edit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div id="customEditorEdit" class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">
                                    Isi Konten
                                    @error('isi_konten_edit')
                                        <div class="small text-danger">{{ $message }}</div>
                                    @enderror
                                </label>
                                <textarea name="isi_konten_edit" id="editor_edit" class="form-control">
                                    {{ old('isi_konten_edit') }}
                                </textarea>
                            </div>
                            <div class="container-fluid text-end p-0">
                                <button type="button" onclick="ShowContentList('edit')"
                                    class="btn btn-danger">Batal</button>
                                <a data-bs-toggle="modal" data-bs-target="#confirm_modal" class="btn btn-success"
                                    onclick="LoadConfirmData('update')">Simpan</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('contents.destroy') }}" method="POST" id="delete_form">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id_delete" id="delete_id">
    </form>

    @include('UI.partials.confirm-modal')
    <script src="{{ asset('myassets/js/content.js') }}"></script>
@endsection
