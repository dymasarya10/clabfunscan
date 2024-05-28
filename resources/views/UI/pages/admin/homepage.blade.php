@extends('UI.templates.body')
@section('main-admin-section')
    <div class="row row-cols-1">
        <div class="col">
            <div class="bg-white rounded-4 AppShadow p-4 mb-3">
                <h5 class="mb-4">Petunjuk Umum !</h5>
                <p class="fw-light lh-base" style="text-align: justify">
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
                <p class="fw-light">Jika terkendala dalam aplikasi silakan hubungi <a href="https://wa.me/089513909248?text=Saya%20terkendala%20aplikasi%20LabFunScan" target="_blank">Dymas</a> untuk troubleshoot lebih lanjut !</p>
            </div>
        </div>
    </div>
@endsection
