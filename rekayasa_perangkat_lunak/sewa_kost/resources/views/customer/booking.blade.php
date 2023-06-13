<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Booking Kamar - Keisuke's Boarding Hotel</title>
    @include('customer/inc/links')
</head>
<body class="bg-light">

    @include('customer/inc/header')

    <div class="my-4 px-3">
        <h2 class="fw-bold h-font text-center">Booking Kamar</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4 px-lg-2">
                <div class="card mb-4 border-2 shadow">
                    <div class="row g-0 p-5 align-items-center">
                        
                        <div class="swiper-container">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                @foreach ($photo as $rm)
                                    <div class="swiper-slide"><img src="{{ asset('images/photo/'.$rm->image) }}" style="width: 525px"></div>
                                @endforeach
                            </div>
                        </div>

                        <h5 class="mb-2 mt-3 text-center"> Kost {{ $kost->nama }} </h5>

                        <div class="facilities mb-3">
                            <h6 class="mb-1"> Fasilitas</h6>
                                <ul>
                                    @foreach ($fasilitas as $fs)
                                    {{-- <span class="badge rounded-pill bg-light text-dark text-wrap lh-base"> {{ $fs->nama }} </span> --}}
                                        <li>{{ $fs->nama }}</li>
                                    @endforeach
                                </ul>
                        </div>
                        <div class="guests">
                            <h6 class="mb-1"> Hunian </h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base"> {{ $kost->penghuni}} Orang</span>
                        </div>
                        
                        <div class="price mt-3">
                            <h6 class="mb-1">Price</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base"> Rp {{ $kost->harga }}/hari </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4 px-lg-2">
                <div class="card mb-4 border-2 shadow">
                    <div class="row g-0 p-5 align-items-center">

                        <div class="">
                            <form action="/newbooking/{{ $kost->id }}" id="rooms-setting" method="post" name="autoSumForm">
                                @csrf
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Pemesanan</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <input type="hidden" name="penyewa_id" class="form-control shadow-none" value="{{ auth('user')->user()->id }}">
                                        <input type="hidden" name="kost_id" class="form-control shadow-none" value="{{ $kost->id }}">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold  @error('checkIn') is-invalid @enderror">Check In Date</label>
                                            <input type="date" name="checkIn" class="form-control shadow-none @error('checkIn') is-invalid @enderror" onFocus="startCalc();" onBlur="stopCalc();" value="{{ old('checkIn') }}">
                                            @error('checkIn') 
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div> 
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold  @error('checkOut') is-invalid @enderror">Check Out Date</label>
                                            <input type="date" name="checkOut" class="form-control shadow-none @error('checkOut') is-invalid @enderror" onFocus="startCalc();" onBlur="stopCalc();" value="{{ old('checkOut') }}">
                                            @error('checkOut') 
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div> 
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Harga</label>
                                            <input type="number" name="harga" class="form-control shadow-none" value="{{ $kost->harga }}" disabled>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Total</label>
                                            <input type="number" name="total" class="form-control shadow-none" readonly value="{{ old('total') }}">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label fw-bold @error('penghuni') is-invalid @enderror">Penghuni</label>
                                            <input type="number" max="{{ $kost->penghuni }}" min="0" name="penghuni" class="form-control shadow-none @error('penghuni') is-invalid @enderror" value="{{ old('penghuni') }}">
                                            @error('penghuni') 
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div> 
                                        @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label fw-bold @error('pesan') is-invalid @enderror">Pesan</label>
                                            <textarea name="pesan" rows="4" class="form-control shadow-none"></textarea>
                                            @error('pesan') 
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div> 
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label fw-bold @error('metode_pembayaran') is-invalid @enderror">Metode Pembayaran</label>
                                            <select class="form-select @error('metode_pembayaran') is-invalid @enderror" aria-label="Default select example" name="metode_pembayaran">
                                                <option selected disabled>Pilih Metode Pembayaran</option>
                                                <option value="BNI">BNI</option>
                                                <option value="BCA">BCA</option>
                                                <option value="BCA">tunai</option>
                                            </select>
                                            {{-- @error('metode_pembayaran') 
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div> 
                                            @enderror --}}
                                        </div>
                                        <input type="hidden" class="form-control shadow-none" name="status" value="dipesan">
                                        <input type="hidden" class="form-control shadow-none" name="kondisi" value="digunakan">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary shadow-none" data-bs-toggle="modal" data-bs-target="#test"> Cancel </button>
                                    <div class="modal fade" id="test" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <p style="color: black">Apakah anda yakin untuk keluar dari halaman ini ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm shadow-none" data-bs-dismiss="modal">Tidak</button>
                                                    <a href="/" class="btn text-secondary shadow-none" data-bs-dismiss="modal"> Iya </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success text-white shadow-none">Kirim</button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('customer/inc/footer')

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>

    function startCalc(){
        interval = setInterval("calc()",1);
    } function calc(){
        one = document.autoSumForm.harga.value;
        two = document.autoSumForm.checkIn.value;
        tri = document.autoSumForm.checkOut.value;
        const d1 = new Date(two);
        const d2 = new Date(tri);
        const time = Math.abs(d2-d1);
        const day = Math.ceil(time/(1000*60*60*24))
        document.autoSumForm.total.value = (one * 1) * (day);
    } function stopCalc(){
        clearInterval(interval);
    }

    const mySwiper = new Swiper ('.swiper-container', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        speed: 300,
        mousewheel: true,
        coverflowEffect: {
        rotate: 30,
        slideShadows: true
    },
        // If we need pagination
        pagination: {
        el: '.swiper-pagination',
    },

        // Navigation arrows
        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

        // And if we need scrollbar
        scrollbar: {
        el: '.swiper-scrollbar',
    },
  })

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>