<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keisuke's Boarding Hotel - Riwayat Booking</title>
    @include('admin/inc/links')
</head>
<body>
    @include('customer/inc/headerprofile')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 ms-auto p-3">
                <h3 class="mb-4">Riwayat Booking</h3>

                @if (session()->has('succes'))
                    <div class="alert alert-success text-center" role="alert">
                        {{ session('succes') }}
                    </div>
                @endif
                
                @if(count($booking))
                    <div class="col-lg-12 col-md-12 px-4">
                        @foreach ($booking as $bk)
                        <div class="card mb-4 border-0 shadow">

                        <div class="row g-0 p-3 align-items-center">
                            <div class="col-md-4 mb-lg-0 mb-md-0 mb-3">
                                <h5 class="mb-1"> Kost {{ $bk->kost['nama'] }} </h5>
                                <img src="{{ asset('images/photo/'.$bk->kost['image']) }}" class="img-fluid rounded">
                            </div>
                            <div class="col-md-4 px-lg-3 px-md-3 px-0 ml-2">
                                <div class="mb-1">
                                    <h6 class="mb-1">Check In Date : </h6><span class="badge rounded-pill bg-light text-dark text-wrap lh-base"> {{ $bk->checkIn }}</span>
                                </div>
                                <div class="mb-1">
                                    <h6 class="mb-1">Check Out Date : </h6><span class="badge rounded-pill bg-light text-dark text-wrap lh-base"> {{ $bk->checkOut }}</span>
                                </div>
                                <div>
                                    <h6 class="mb-1"> Penghuni</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap lh-base"> {{ $bk->penghuni }} Orang</span>
                                </div>
                                <div class="mb-1">
                                    <h6 class="mb-1"> Harga </h6><span class="badge rounded-pill bg-light text-dark text-wrap lh-base"> Rp. {{ $bk->total }} </span>
                                </div>
                            </div>
                            <div class="col-md-4 px-lg-3 px-md-3 px-0">
                                <div>
                                    <h6 class="mb-1"> Pesan </h6>
                                    <p class="text-dark"> {{ $bk->pesan }} </p>
                                </div>
                                <div class="mb-1">
                                    <h6 class="mb-1"> Status </h6><span class="badge rounded-pill bg-light text-dark text-wrap lh-base"> {{ $bk->status }} </span>
                                </div>
                            </div>
                        </div>
                            @if($bk->status === "dikonfirmasi")
                                <a href="/antrianselesai/{{ $bk->id }}" type="button" class="btn btn-outline-dark mb-3 shadow-none" style="width: 150px; margin-right:auto; margin-left:auto;"> check out </a>
                            @endif
                        </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center">Tidak Ada Riwayat Pesanan</p>
                @endif
            </div>
        </div>
    </div>

    @include('admin/inc/script')
</body>
</html>