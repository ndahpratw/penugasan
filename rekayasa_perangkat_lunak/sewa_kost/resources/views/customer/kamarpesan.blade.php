<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilihan Kamar - Keisuke's Boarding Hotel</title>
    @include('customer/inc/links')
</head>
<body class="bg-light">

    @include('customer/inc/header')

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Jenis Kamar</h2>
    </div>

    <div class="container">
        <a href="/kamar" class="btn btn-outline-dark w-15 shadow-none mb-2"> Kembali </a> 
        <div class="row">
            @if (count($status_aktif))
                <div class="col-lg-9 col-md-12 px-4" style="margin-left: auto; margin-right:auto">
                    @foreach ($kost as $item)
                    <div class="card mb-4 border-0 shadow">
                        <div class="row g-0 p-3 align-items-center">
                            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                                <h5 class="mb-2"> {{ $item->nama }} </h5>
                                <img src="{{ asset('images/photo/'.$item->image) }}" class="img-fluid rounded">
                            </div>
                            <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                <div class="facilities mb-3">
                                    <h6 class="mb-1"> Fasilitas </h6>
                                    <ul>
                                        @foreach ($item->fasilitas  as $fs)
                                            <li>{{ $fs->nama }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="guests mb-3">
                                    <h6 class="mb-1"> Penghuni </h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap lh-base"> {{ $item->penghuni }} Orang</span>
                                </div>
                                <div class="price mb-3">
                                    <h6 class="mb-1"> Harga </h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap lh-base"> Rp {{ $item->harga }}/hari </span>
                                </div>
                            </div>
                            <div class="col-md-2 text-center">
                                <button class="btn btn-success w-100 shadow-none mb-2">{{ $item->tersedia }} Tersedia </button> 
                                <a href="/booking/{{ $item->id }}" class="btn btn-outline-dark w-100 shadow-none">Booking</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-center" style="margin: 75px 0px">Mohon Maaf, Untuk Saat Ini Semua Akses Booking Sedang Dinonaktifkan</p>
            @endif
        </div>
    </div>

    @include('customer/inc/footer')

    <script src="vendor/jquery/jquery.min.js"></script>
</body>
</html>