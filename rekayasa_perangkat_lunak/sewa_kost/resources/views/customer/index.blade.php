<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('customer/inc/links')
    <title>Keisuke's Boarding Hotel</title>
</head>
<body class="bg-light">

    @include('customer/inc/header')

    @if (session()->has('succes'))
        <div class="alert alert-success mt-4" role="alert" style="width: 1150px; margin-right:auto; margin-left:auto; text-align:center">
            <h4 class="alert-heading">Well done!</h4>
            <p> {{ session('succes') }} </p>
        </div>
    @elseif(session()->has('wrong'))
        <div class="alert alert-danger mt-4" role="alert" style="width: 1200px; margin-right:auto; margin-left:auto; text-align:center">
            {{ session('wrong') }}
            {{-- <a type="button" class="text-secondary alert-link" data-bs-toggle="modal" data-bs-target="#resetpassword">
                Forgot Password ?
            </a> --}}
        </div>
    @elseif(session()->has('cekLogin'))
        <div class="alert alert-danger mt-4" role="alert" style="width: 1200px; margin-right:auto; margin-left:auto; text-align:center">
            {{ session('cekLogin') }}
        </div>
    @endif
    

    <!-- Gambar Utama -->
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                @if (count($carousel))
                    @foreach ($carousel as $cr)
                        <div class="swiper-slide">
                            <img class="img-home" src="{{ asset('images/carousel/'.$cr->image) }}" class="w-100 d-block" />
                        </div>
                    @endforeach
                    @else
                        <div class="swiper-slide">
                            <img class="img-home" src="{{ asset('images/pengumuman/homepage.jpeg') }}" class="w-100 d-block" />
                        </div>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Cek Ketersediaan Kamar -->
    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <form action="/cekKetersediaanKamar" method="post">
                    @csrf
                    <div class="row align-items-end">
                        <div class="col-lg-3"> <h5 class="mb-4">Cek Ketersediaan</h5> </div>
                        <div class="col-lg-3">
                            <label for="checkBooking" class="form-label" style="font-weight: 500">Check In</label>
                            <input type="date" class="form-control shadow-none @error('checkIn') is-invalid @enderror" name="checkIn" id="checkBooking" aria-describedby="checkBooking">
                            @error('checkIn') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="col-lg-3">
                            <label for="checkBooking" class="form-label" style="font-weight: 500">Check Out</label>
                            <input type="date" class="form-control shadow-none @error('checkOut') is-invalid @enderror" name="checkOut"  id="checkBooking" aria-describedby="checkBooking">
                            @error('checkOut') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="col-lg-1">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Kamar -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Info Kost</h2>
    <div class="container">
        <div class="row">
            @foreach ($kostan as $ks)
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="{{ asset('images/photo/'.$ks->image) }}" class="card-img-top" style="height: 500px">
                    <div class="card-body">
                        <h5>{{ $ks->nama }}</h5>
                        <h6 class="mb-4">Rp {{ $ks->harga }}/hari</h6>
                        {{-- <div class="features mb-4">
                            <h6 class="mb-1">Fitur</h6>
                            @foreach ($ks->feature as $fr)
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">{{ $fr->nama }}</span>
                             @endforeach
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Fasilitas</h6>
                            @foreach ($ks->facilitiesroom as $fs)
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">{{ $fs->nama }}</span>
                            @endforeach
                        </div> --}}
                        <div class="guests mb-4">
                            <h6 class="mb-1">Hunian</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base"> {{ $ks->penghuni }} orang</span>
                        </div>
                        <div class="guests mb-4">
                            <h6 class="mb-1">Tersedia</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base"> {{ $ks->tersedia}} orang</span>
                        </div>
                        {{-- <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div> --}}
                        <div class="d-flex justify-content-evenly mb-2">
                            {{-- <a href="/cekKetersediaanKamar" class="btn btn-success shadow-none">Pesan Sekarang</a> --}}
                            <a href="/detail/{{ $ks->id }}" class="btn btn-outline-dark shadow-none">Detail Lainnya</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-lg-12 text-center mt-5">
                <a href="/kost" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">List Kost Lainnya >>></a>
            </div>
        </div>
    </div>

    <!-- Testimoni -->
    {{-- <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Testimoni</h2>
    <div class="container">
        <div class="swiper swiper-testimoni">
        <div class="swiper-wrapper mb-5">
            @if(count($testimoni))
                @foreach ($testimoni as $tm)
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="{{ asset('images/users/'. $tm->customer['image']) }}" width="150px">
                        <h6 class="m-0 ms-2">{{ $tm->customer['username'] }}</h6>
                    </div>
                    <p class="justify-content">Tipe Kamar : {{ $tm->room['jenis_kamar']}}</p>
                    <p class="justify-content">{{ $tm->testimoni}}</p>
                    <div class="rating">
                        @if($tm->rating==5)
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>  
                            <i class="bi bi-star-fill text-warning"></i>  
                        @elseif($tm->rating==4)
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>  
                        @elseif($tm->rating==3)
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        @elseif($tm->rating==2)
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i> 
                        @elseif($tm->rating==1)
                            <i class="bi bi-star-fill text-warning"></i> 
                        @endif
                    </div>
                </div>
                @endforeach
            @else
                <p style="margin-right: auto; margin-left: auto">Belum Ada Testimoni</p>
            @endif

        </div>
        <div class="swiper-pagination"></div>
        </div>
    </div> --}}

    <!-- Reach Us -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Lokasi Kami</h2>
    <div class="container">
        @foreach ($kontak as $a)
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe class="w-100 rounded" height="320px" src="{{ $a->iframe }}" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4" col -md-4>
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Hubungi Kami</h5>
                    <a href="#" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> {{ $a->telepon }} </a>
                </div>
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Media Sosial Kami</h5>
                    <a href="#" class="d-inline-block mb-3"></a>
                    <span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-instagram me-1"></i>{{ $a->media_sosial }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @include('customer/inc/footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
      var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        }
      });

      var swiper = new Swiper(".swiper-testimoni", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        slidesPerView: "3",
        loop: true,
        coverflowEffect: {
          rotate: 50,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows: false,
        },
        pagination: {
          el: ".swiper-pagination",
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
            },
            640: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        }
      });
    </script>
</body>
</html>