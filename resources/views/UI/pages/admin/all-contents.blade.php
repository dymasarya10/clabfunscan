@extends('UI.templates.body')
@section('main-admin-section')
<div class="row row-cols-1">
    <div class="col">
        <div class="bg-white rounded-4 AppShadow p-4 mb-3">
            <h5 class="mb-4">Data Konten</h5>
            <a href="{{ route('createcontents') }}" class="btn btn-primary rounded-3 mb-4">
                Tambah Data
            </a>
            <table id="datatablesSimple">
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
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['address'] }}</td>
                            <td>
                                <div class="container-fluid">
                                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 justify-content-center">
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
        </div>
    </div>
</div>
@endsection
