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
        <div class="row">
            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">FILTER</h4>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2 " id="filterDropdown">
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Cek Ketersediaan</h5>
                                <form action="/cekKetersediaanKamar" method="post">
                                    @csrf
                                    <label for="checkBooking" class="form-label" style="font-weight: 500">Check In</label>
                                    <input type="date" class="form-control shadow-none @error('checkIn') is-invalid @enderror" name="checkIn" id="checkBooking" aria-describedby="checkBooking">
                                    @error('checkIn') 
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div> 
                                    @enderror
                                    <label for="checkBooking" class="form-label" style="font-weight: 500">Check In</label>
                                    <input type="date" class="form-control shadow-none @error('checkOut') is-invalid @enderror" name="checkOut" id="checkBooking" aria-describedby="checkBooking">
                                    @error('checkOut') 
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div> 
                                    @enderror
                                    <button type="submit" class="btn btn-success w-100 shadow-none mb-2 mt-3">Cek Ketersedian</button>
                                </form>
                            </div>
                           <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Rentang Harga</h5>
                                <form action="/cekharga" method="post">
                                    <div class="d-flex">
                                        <div class="me-2">
                                            <input type="number" class="form-control shadow-none">
                                        </div>
                                        <div class="me-2">
                                            <input type="number" class="form-control shadow-none">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success w-100 shadow-none mb-2 mt-3">Cari</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9 col-md-12 px-4">
                @foreach ($kost as $item)
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-lg-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="{{ asset('images/photo/'.$item->image) }}" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-2"> Kost {{ $item->nama }} </h5>
                            <div class="facilities mb-3">
                                <h6 class="mb-1"> Fasilitas</h6>
                                <ul>
                                    @foreach ($item->fasilitas as $fs)
                                        {{-- <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">{{ $fs->nama }}</span> --}}
                                        <li> {{ $fs->nama }} </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="guests mb-3">
                                <h6 class="mb-1"> Hunian </h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base"> {{ $item->penghuni }} Orang</span>
                            </div>
                        </div>
                        <div class="col-md-2 text-center">
                            <h6 class="mb-4">Rp {{ $item->harga }}/hari</h6>
                            <a href="/booking/{{ $item->id }}" class="btn btn-success shadow-none mb-2" style="padding: 0px 25px"> Tersedia <br> {{ $item->tersedia }} kamar </a>
                            <a href="/detail/{{ $item->id }}" class="btn btn-outline-dark w-175 shadow-none">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('customer/inc/footer')

    <script src="vendor/jquery/jquery.min.js"></script>
</body>
</html>