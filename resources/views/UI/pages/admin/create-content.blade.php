@extends('UI.templates.body')
@section('main-admin-section')
    @if (session()->has('failtocreate') || $errors->any())
        <div class="alert alert-warning alert-dismissible fade show rounded-3 shadow-sm" role="alert">
            <strong>Gagal membuat data !</strong>
            @if (session()->has('failtocreate'))
                {{ session('failtocreate') }}
            @else
                Harap cek kembali form anda
            @endif
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-4 order-lg-2 mb-4">
            <div class="bg-white rounded-4 p-4 AppShadow">
                <h5 class="mb-4">Preview Gambar</h5>
                <div class="container-fluid rounded-2 p-3 border">
                    <img id="previewImg" src="{{ asset('myassets/img/emptyfile.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-lg-8 order-lg-1 mb-4">
            <div class="bg-white rounded-4 p-4 AppShadow mb-4">
                <h5 class="mb-4">Data Konten</h5>
                <form action="{{ route('storecontents') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Judul</label>
                        <input name="judul" type="text"
                            class="form-control @error('judul')
                            is-invalid
                        @enderror rounded-0"
                            id="exampleFormControlInput1" placeholder="e.g Teknologi">
                        <div class="form-text fst-italic small">&nbsp;*maksimal 35 karakter</div>
                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">File</label>
                        <input name="gambar" type="file"
                            class="form-control @error('gambar')
                            is-invalid
                        @enderror rounded-0"
                            id="exampleFormControlInput1" onchange="previewImage(event)">
                        <div class="form-text fst-italic small">&nbsp;*maksimal 3mb</div>
                        @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">
                            Isi Konten
                            @error('isi_konten')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </label>
                        <textarea name="isi_konten" id="editor" class="form-control">
                        </textarea>
                    </div>
                    <div class="container-fluid p-0 text-end">
                        <a href="{{ route('contents') }}" class="btn btn-danger">Batal</a>
                        <button type="submit" class="btn btn-primary">Buat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                removePlugins: ['Heading'],
                toolbar: ['bold', 'italic', 'bulletedList', 'numberedList', 'link']
            })
            .catch(error => {
                console.error(error);
            });

        const previewImage = (event) => {
            let reader = new FileReader();
            reader.onload = () => {
                let output = document.getElementById('previewImg');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endsection
