@extends('UI.templates.body')
@section('main-admin-section')
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Primary Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Warning Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Success Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Danger Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4">
            <div class="bg-white rounded-4 AppShadow p-4 mb-4">
                <h5 class="mb-4">Grafik</h5>
                <canvas id="myAreaChart" width="100%" height="70"></canvas>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="bg-white rounded-4 AppShadow p-4 mb-4">
                <h5 class="mb-4">Grafik</h5>
                <canvas id="myBarChart" width="100%" height="70"></canvas>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="bg-white rounded-4 AppShadow p-4 mb-4">
                <h5 class="mb-4">Grafik</h5>
                <canvas id="myPieChart" width="100%" height="70"></canvas>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-4 AppShadow p-4 mb-3">
        <h5 class="mb-4">Data Murid</h5>
        <a href="" class="btn btn-primary btn-sm rounded-2 mb-3"><i class="fa-solid fa-plus"></i> Tambah Data</a>
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>NISN</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>NISN</th>
                    <th>Date</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['address'] }}</td>
                        <td>{{ $user['nisn'] }}</td>
                        <td>{{ $user['date'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
