@include('UI.templates.head')

<body class="f-PlusJakartaSans">

    <div id="ScanContainer" class="min-vh-100 d-flex align-items-center justify-content-center animate__animated"
        style="background: linear-gradient(to right bottom, #2c2c54, #40407a)">
        <div class="container-fluid text-center">
            <div class="row justify-content-center mb-4">
                <div class="col-11 col-lg-8">
                    <div id="thereader"
                        class="bg-white rounded-4 AppShadow p-4 d-flex flex-column align-items-center justify-content-center">
                        <img src="{{ asset('myassets/img/LabJakAppsLogo.png') }}" alt="" class="img-fluid"
                            width="60rem">
                        <h5 class="mt-2 mb-4">{{ env('APP_NAME') }}</h5>
                        <div id="reader" class="w-100"></div>
                        <div id="data-content" data-contents="{!! htmlspecialchars(json_encode($contents), ENT_QUOTES, 'UTF-8') !!}" class="d-none"></div>
                        <button class="btn btn-danger" onclick="OpenResultContainer('9fwjON46TI9vT')">CLICK</button>
                    </div>
                </div>
            </div>
            <a href="{{ route('login') }}" class="text-white">Buat Konten</a>
        </div>
    </div>
    <div id="ResultContainer" class="min-vh-100 d-none pt-4 flex-column align-items-center animate__animated">
        <div class="d-flex container-fluid align-items-center">
            <img src="{{ asset('myassets/img/LABIH.png') }}" alt="" class="img-fluid" width="100rem">
            <h2 class="fw-bold ms-2" style="color: #2c2c54">"Did you know ?"</h2>
        </div>
        <div class="d-flex flex-column align-items-center p-4">
            <h4 id="contentTitle" class="h2 text-center mb-3">Lorem ipsum dolor sit amet consectetur.</h4>
            <img id="contentImage" src="{{ asset('myassets/img/emptyfile.png') }}" alt=""
                class="img-fluid mb-2">
            <div id="contentText" class="container-fluid p-0" style="max-height: 50vh; overflow: auto">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero eos architecto tempora sed saepe
                reiciendis
                eveniet est eius a, repellat sit omnis excepturi id maiores, voluptates, ut ducimus impedit error
                voluptate
                labore reprehenderit perspiciatis. Natus quia quasi dolorum quaerat quis magni illo omnis iusto vero,
                corrupti autem totam rem nesciunt tempora sint similique impedit aliquam. Id voluptate dolore nemo
                vitae.
                Fugit delectus esse necessitatibus deserunt sint veniam non autem ullam magnam sed, ipsam ut et
                incidunt.
                Commodi, nostrum odit esse in labore totam magnam enim consequuntur, nobis inventore, aliquam fugit?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas accusantium tempora eum animi dolor
                minima, praesentium debitis accusamus quidem! Necessitatibus ipsam illo aperiam in quisquam quia
                distinctio saepe qui blanditiis.
                Excepturi dignissimos quos voluptas delectus consectetur quae, molestias error nesciunt omnis, quod
                officiis nostrum soluta fugit incidunt iusto aut aliquam impedit quasi iure odit officia! Iure eveniet
                nemo in placeat.
                Rerum odit exercitationem quaerat ratione deserunt autem impedit repellat similique nemo, quos, neque
                cum veniam eveniet doloribus! Sint voluptates asperiores magni dignissimos, totam sapiente ducimus.
                Impedit officiis at sed accusantium.
                Maiores quo fugit earum mollitia cupiditate quaerat inventore repudiandae autem iusto, accusamus rem
                asperiores ipsum distinctio. Quia impedit consequatur minima ad consectetur, beatae facilis, voluptate,
                labore ipsam deserunt fugit dolor!
                Deserunt rem dolor repudiandae incidunt sapiente asperiores quos quas deleniti delectus. Dolorem dolor
                eligendi, laboriosam laudantium cumque saepe, quibusdam sapiente ducimus fugit exercitationem
                accusantium est earum a, beatae voluptas corrupti!
                Distinctio, excepturi dignissimos magnam tempore iusto sequi, quas eaque reprehenderit recusandae
                similique ea molestias totam molestiae illo quisquam temporibus minus culpa voluptas atque quibusdam
                nesciunt accusamus repellendus. Atque, facere nisi.
                Explicabo itaque aspernatur ducimus enim cumque, minima quibusdam repellat facere. Quod provident
                incidunt cum, quis ex iure. Doloremque ex sunt fugiat laudantium reprehenderit doloribus, voluptates
                similique hic sint quidem repudiandae.
                Fuga, nemo neque? Consequuntur dignissimos ipsa nesciunt quos sint. Fugit dolorem aut eius, repellendus
                temporibus inventore amet voluptatum repudiandae harum iste esse minima natus, a in illo. Hic, nemo
                excepturi!
                Id harum tempora enim veritatis debitis sit eligendi, quo libero, necessitatibus asperiores error?
                Beatae rem eligendi voluptatibus in provident quis totam possimus asperiores, nemo similique
                perspiciatis, nulla, ut deserunt nostrum.
                Ducimus suscipit ipsum quam ullam error cum quos pariatur quas commodi sed est, voluptates amet ipsam
                cumque, ex, dignissimos eius adipisci voluptatem temporibus! At, ullam saepe magni ab placeat repellat?
            </div>
            <div class="mt-3 container-fluid p-0">
                <button class="w-100 btn btn-primary"
                    style="
                    --bs-btn-bg: white;
                    --bs-btn-color: #5f27cd;
                    --bs-btn-hover-bg: #5f27cd;
                    --bs-btn-hover-color: white;
                    --bs-btn-active-bg: #5f27cd;
                    --bs-btn-border-color: #5f27cd;
                    --bs-btn-hover-border-color: #5f27cd;
                "
                    onclick="CloseResult()">
                    Cari Barcode Lagi !
                </button>
            </div>
        </div>
    </div>
    <div id="altResultContainer" class="animate__animated animate__faster d-none fixed-bottom w-100 min-vh-100">
        <div id="theResult" class="animate__animated animate__faster d-flex flex-column bg-white w-100 align-items-center py-4 px-3"
            style="overflow: auto">
            <div class="d-flex justify-content-end px-2 w-100">
                <button class="btn" onclick="CloseResultContainer()">
                    <i class="fa-solid fa-xmark text-danger h4"></i>
                </button>
            </div>
            <h2 id="altTitleContent" class="text-center mb-4">Judul</h2>
            <img id="altImageContent" src="{{ asset('myassets/img/emptyfile.png') }}" alt="" class="img-fluid">
            <div id="altTextContent" class="mt-3 w-100">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt dignissimos iure culpa rerum quae
                corrupti alias dolorum accusantium! Labore, quasi necessitatibus tempora incidunt consequatur amet
                possimus, ut quia tenetur, quam molestiae architecto inventore. Id corrupti sint officiis maxime earum
                ea enim iste asperiores soluta provident, esse quas praesentium ex fugiat libero, obcaecati nulla unde
                quia. Labore odio assumenda eum commodi fuga! Numquam itaque dignissimos neque fugiat atque non eveniet
                dolores, error eaque voluptates reprehenderit praesentium saepe nesciunt enim repellendus nobis iusto
                voluptatum quibusdam ipsam commodi, culpa voluptatibus molestias magni? Fugit, maiores repudiandae.
                Asperiores fugiat repudiandae doloribus magni corporis dolorem quidem.
            </div>
        </div>
    </div>
    <div id="ErrMessage" class="min-vh-100 d-none p-4 flex-column align-items-center justify-content-center">
        <div class="d-flex">
            <img src="{{ asset('myassets/img/LABIH.png') }}" alt="" class="img-fluid me-3" width="80rem">
            <h3>Konten yang kamu cari tidak ditemukan ! </h3>
        </div>
        <button class="w-100 mt-5 btn btn-primary"
            style="
                    --bs-btn-bg: white;
                    --bs-btn-color: #5f27cd;
                    --bs-btn-hover-bg: #5f27cd;
                    --bs-btn-hover-color: white;
                    --bs-btn-active-bg: #5f27cd;
                    --bs-btn-border-color: #5f27cd;
                    --bs-btn-hover-border-color: #5f27cd;
                "
            onclick="CloseResult()">
            Coba Lagi !
        </button>
    </div>
    <div id="content-loader" class="content-loader" style="margin-top: -2000px">
        <div class="loader">
        </div>
    </div>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script src="{{ asset('myassets/js/barcode-scan.js') }}"></script>
    @include('UI.templates.foot')
