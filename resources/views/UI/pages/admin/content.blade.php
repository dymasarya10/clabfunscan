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
        <div class="col-12">
            <div id="AppContentList" class="row animate__animated animate__faster mb-3">
                <div class="col-12 col-lg-7" style="z-index: 10">
                    <div class="bg-white rounded-4 p-4 AppShadow animate__animated animate__faster">
                        <h5 class="mb-4">Data Konten</h5>
                        <a href="" class="btn btn-primary mb-4">Tambah Data</a>
                        <table id="table_konten">
                            <thead>
                                <tr>
                                    <th>Creator</th>
                                    <th>Judul</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Creator</th>
                                    <th>Judul</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>Dymas Arya Nanda</td>
                                    <td>Belajar HTML</td>
                                    <td>
                                        <div class="container-fluid">
                                            <div class="row row-cols-2 row-cols-md-4 justify-content-center">
                                                <div class="col p-0">
                                                    <a onclick="ShowPreviewContent()"
                                                        class="btn btn-sm rounded-circle btn-info w-100">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                </div>
                                                <div class="col p-0">
                                                    <a onclick="" class="btn btn-sm rounded-circle btn-primary w-100">
                                                        <i class="fa-solid fa-magnifying-glass-arrow-right"></i>
                                                    </a>
                                                </div>
                                                <div class="col p-0">
                                                    <a onclick="" class="btn btn-sm rounded-circle btn-warning w-100">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                </div>
                                                <div class="col p-0">
                                                    <a class="btn btn-sm rounded-circle btn-danger w-100"
                                                        data-bs-toggle="modal" data-bs-target="#confirm_modal"
                                                        onclick="">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="AppPreviewContent" class="col-12 col-lg-5 d-none animate__animated animate__faster">
                    <div class="bg-white rounded-4 p-4 AppShadow">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="">Preview</h5>
                            <button onclick="ClosePreviewContent()" class="btn text-danger"><i
                                    class="fa-solid fa-xmark h5"></i></button>
                        </div>
                        <h5 id="AppTitleContent" class="mb-3">Judul Kartu</h5>
                        <div id="AppImageContent" class="d-flex" style="height: 15rem">
                            <div class="bg-secondary rounded-2 p-4 container-fluid"></div>
                        </div>
                        <div id="AppTextContent" class="fw-light mt-2 px-2"
                            style="text-align: justify; height: 10rem; overflow-x: hidden; overflow-y: scroll">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptates quos dignissimos tempore
                            aliquid esse, consequuntur officiis aut magnam dolorum assumenda odio nisi quidem delectus earum
                            laborum amet provident corporis. Voluptatibus ipsa facilis expedita ab cum voluptatem rerum
                            laudantium, quasi cupiditate.
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequatur aspernatur quaerat
                            molestias nobis aliquam aliquid eum enim delectus nisi ipsam rem asperiores, quidem quia
                            deserunt beatae amet placeat perferendis obcaecati?
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur numquam voluptates sapiente
                            est nostrum ex, facere corporis id aliquam dolorum nam iusto ipsa eaque deleniti quam,
                            distinctio nemo soluta minus blanditiis ut. Atque at minima voluptate voluptatibus, deserunt
                            blanditiis recusandae aut ad eos impedit magni commodi unde ipsa nisi qui, hic doloremque. Autem
                            exercitationem repudiandae molestias quam temporibus accusamus expedita voluptate enim
                            praesentium? Dolorum iste sint, eos facilis veritatis, nesciunt adipisci provident voluptates
                            asperiores dicta deleniti error, ducimus architecto dolor ipsam harum! Ea eius vitae minus
                            repudiandae laborum fugit pariatur.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="AppCreateContent" class="col-12">
            <div class="bg-white rounded-4 p-4 AppShadow">
                <h5 class="mb-4">Buat Konten</h5>
                <div class="row">
                    <div class="col-12 col-lg-5 mb-3 border">
                        <label for="" class="form-label mb-3">
                            Preview Gambar
                        </label>
                        <img src="{{ asset('myassets/img/emptyfile.png') }}" alt="" class="img-fluid rounded-3"
                            id="createPreviewImage">
                    </div>
                    <div class="col-12 col-lg-7 mb-3 border">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <form>
                                <div class="mb-3">
                                    <label for="judul_post" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="judul_post" name="judul_post"
                                        aria-describedby="emailHelp">
                                </div>

                                {{-- LANJUT DISINI BIKIN ATRIBUT BUAAT CONTENT --}}
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </form>
                    </div>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">

                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('myassets/js/content.js') }}"></script>
@endsection
