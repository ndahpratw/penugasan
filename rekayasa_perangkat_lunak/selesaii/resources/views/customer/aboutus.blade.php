<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Keisuke's Boarding Hotel</title>
    @include('customer/inc/links')
    <style>
        .pop:hover{
            border-top-color: orangered !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>
</head>
<body class="bg-light">

    @include('customer/inc/header')

    @foreach ($aboutus as $as)
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Tentang Kami</h2>
        <p class="text-center mt-3">{{ $as->site_title }}</p>
    </div>
    
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-12 col-md-5 mb-4 order-2 order-lg-1 order-md-1">
                <h3 class="mb-3">{{ $as->site_about }}</h3>
                <p>{{ $as->deskripsi }}</p>
            </div>
            @endforeach
            {{-- @foreach ($headteam as $ht)
                <div class="col-lg-5 col-md-5 mb-4 order-1 order-lg-2 order-md-2">
                    <img src="{{ asset('images/teams/'.$ht->image) }}" class="w-100">
                </div>
            @endforeach --}}
        </div>
    </div>

    {{-- <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-6">
                <div class="bg-white rounded shadow p-2 border-top border-4 border-dark pop text-center">
                    <div class="d-flex">
                        <img src="{{ asset('assets/img/fasilitas/kamar.png') }}" width="75px" style="margin-right: auto; margin-left: auto;"><br>
                    </div>
                    <div class="d-flex mt-2">
                        <h4 style="margin-right: auto; margin-left: auto;">{{ $tersedia }}+ Kamar</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="bg-white rounded shadow p-2 border-top border-4 border-dark pop text-center">
                    <div class="d-flex">
                        <img src="{{ asset('assets/img/fasilitas/customer.png') }}" width="75px" style="margin-right: auto; margin-left: auto;"><br>
                    </div>
                    <div class="d-flex mt-2">
                        <h4 style="margin-right: auto; margin-left: auto;">{{ $customer }}+ Customers</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="bg-white rounded shadow p-2 border-top border-4 border-dark pop text-center">
                    <div class="d-flex">
                        <img src="{{ asset('assets/img/fasilitas/rating.png') }}" width="75px" style="margin-right: auto; margin-left: auto;"><br>
                    </div>
                    <div class="d-flex mt-2">
                        <h4 style="margin-right: auto; margin-left: auto;">{{ $testimoni }}+ Reviews</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="bg-white rounded shadow p-2 border-top border-4 border-dark pop text-center">
                    <div class="d-flex">
                        <img src="{{ asset('assets/img/fasilitas/cs.png') }}" width="75px" style="margin-right: auto; margin-left: auto;"><br>
                    </div>
                    <div class="d-flex mt-2">
                        <h4 style="margin-right: auto; margin-left: auto;">{{ $staff }}+ staff</h4>
                    </div>
                </div>
            </div>

        </div>
    </div> --}}

    <h3 class="my-5 fw-bold h-font text-center">Tim Pengelola</h3>
    <div class="container px-4">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5">
                @foreach ($aboutteam as $at)
                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                        <img src="{{ asset('images/profil/'.$at->image) }}" class="w-50" style="max-width: 200px; max-height:200px">
                        <h5 class="mt-2">{{ $at->nama }}</h5>
                </div>
                @endforeach
            </div>
        <div class="swiper-pagination"></div>
        </div>
    </div>

    
    @include('customer/inc/footer')

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
      var swiper = new Swiper(".mySwiper", {
        slidePerView: 4,
        spaceBetween: 40,
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
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 3,
            },
        }
      });
    </script>

</body>
</html>