<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
    <title>Booking Kamar - Keisuke's Boarding Hotel</title>
    @include('customer/inc/links')
</head>
<body class="bg-light">

    @include('customer/inc/header')

    <div class="my-4 px-3">
        <h2 class="fw-bold h-font text-center">Detail Kamar</h2>
    </div>

    <div class="container mt-5">
        <div class="row">
            <h3 class="mb-2"> Kost {{ $kost->nama }} </h3>

            <div class="col-lg-6 px-lg-2">    
                <div style="padding: 25px 0px 0px">
                    <div class="container">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @foreach ($photo as $item)
                                    <div class="swiper-slide"><img src="{{ asset('images/photo/'.$item->image) }}" style="width: 800px"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 px-lg-2" style="width: 500px; padding:25px 0px 0px;">  
                <div class="card mb-4 border-5 shadow" style="padding: 25px">
                    {{-- <div class="row g-0 p-5 align-items-center">
                        <div class="col-md-5 px-lg-3 px-md-3 px-0"> --}}
                            <h5 class="mb-4 fw-bold">Rp {{ $kost->harga }}/hari</h5>

                            <div class="rating mb-3">
                                @if($rating==5)
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>  
                                    <i class="bi bi-star-fill text-warning"></i>  
                                @elseif(4.9 >= $rating and 4.1 <= $rating)
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>  
                                    <i class="bi bi-star-half text-warning"></i>
                                @elseif($rating==4)
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star"></i>
                                @elseif(3.9 >= $rating and 3.1 <= $rating)
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>  
                                    <i class="bi bi-star-half text-warning"></i>  
                                    <i class="bi bi-star"></i>
                                @elseif($rating==3)
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                @elseif(2.9 >= $rating and 2.1 <= $rating)
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-half text-warning"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                @elseif($rating==2)
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i> 
                                @elseif(1.9 >= $rating and 1.1 <= $rating)
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-half text-warning"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                @elseif($rating==1)
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                @elseif(0.9 >= $rating and 0.1 <= $rating) 
                                    <i class="bi bi-star-half text-warning"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i> 
                                @else
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                @endif
                            </div>

                            <div class="features mb-3">
                                <h6 class="mb-1">Fasilitas yang tersedia : </h6>
                                    <ul>
                                        @foreach ($fasilitas as $item)
                                            <li > {{ $item->nama }} </li>
                                        @endforeach
                                    </ul>
                            </div>
                            <div class="guests mb-3">
                                <h6 class="mb-1"> Penghuni </h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base"> {{ $kost->penghuni}} orang</span>
                            </div>
                            <div class="guests mb-3">
                                <h6 class="mb-1"> Tersedia </h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base"> {{ $kost->tersedia}} kamar</span>
                            </div>
                            <div class="d-flex guests mb-3">
                                <p> https://wa.me/{{ $kost->pemilik['telepon']}}</p>
                            </div>
                            
                            {{-- <a href="#" class="btn btn-success w-100 shadow-none mb-2">Pesan</a> --}}
                            <div class="text-center">
                                <a href="/booking/{{ $kost->id }}" class="btn btn-outline-success w-45 shadow-none">Book Now</a>
                                <a href="/kost" class="btn btn-outline-dark w-45 shadow-none">Kembali</a>
                            </div>
                        </div>
                    {{-- </div>
                </div> --}}
            </div>

            <div class="col-lg-6 px-lg-2">    
                <div style="padding: 25px 0px">
                    <h3 class="mb-2"> Lokasi : </h3>
                    <iframe src="{{ $kost->lokasi }}" width="525" height="150" style="border:1 px solid;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            
            <div class="col-lg-5 px-lg-2" style="width: 500px; padding:25px 0px;">  
                <div tyle="padding: 25px">
                    <h3 class="mb-2"> Detail : </h3>
                    <p style="text-indent: 25px; text-align: justify; ">{{ $kost->deskripsi }}</p>
                </div>
            </div>

            <div class="col-lg-20 px-lg-2">    
                <div>
                    <div style="padding: 15px">
                        <h3 class="mb-2"> Reviews dan Rating </h3>
                        @if (count($testimoni))
                            @foreach ($testimoni as $tm)
                                <div style="margin: 0px 15px">
                                    <img src="{{ asset('images/profil/'.$tm->customer['image']) }}" alt="icon" class="image" style="width:50px; border-radius: 35px;"> {{ $tm->customer['username'] }}
                                    <p style="text-indent: 25px; text-align: justify; margin: 0px; ">{{ $tm->testimoni }}</p>
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
                                    <hr>
                                </div>
                            @endforeach
                        @else
                            <p class="text-center">belum ada review</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('customer/inc/footer')

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
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

</body>
</html>