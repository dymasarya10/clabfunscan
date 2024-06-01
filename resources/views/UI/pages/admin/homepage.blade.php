@extends('UI.templates.body')
@section('main-admin-section')
    <div class="row">
        <div class="col-12">
            <div class="bg-white rounded-4 AppShadow p-4 mb-3">
                <h5 class="mb-4">Data Creator</h5>
                <a data-bs-toggle="modal" data-bs-target="#creator" class="btn btn-primary rounded-3 mb-4">
                    Tambah Data
                </a>
                <table id="datague" class="thedatatables">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>QRCode</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>QRCode</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>{{ $user['address'] }}</td>
                                <td>
                                    <div class="container-fluid">
                                        <div class="row row-cols-1 row-cols-lg-2 justify-content-center">
                                            <div class="col p-1">
                                                <a href="" class="btn btn-sm btn-primary w-100">
                                                    Detail
                                                </a>
                                            </div>
                                            <div class="col p-1">
                                                <a href="" class="btn btn-sm btn-warning w-100">
                                                    Edit
                                                </a>
                                            </div>
                                            <div class="col p-1">
                                                <a href="" class="btn btn-sm btn-danger w-100">
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
    </div>
    <!-- Modal -->
    <div class="modal fade" id="creator" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Creator</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Pengguna</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                            <div class="form-text">Password yang anda masukkan harus lebih dari 8 kata</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Jenjang</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
