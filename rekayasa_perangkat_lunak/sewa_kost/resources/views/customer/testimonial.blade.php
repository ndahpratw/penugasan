<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
    <title>Keisuke's Boarding Hotel - Riwayat Booking</title>
    <style>
        .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
        }

        .rating > input{ display:none;}

        .rating > label {
            width: 1em;
            font-size: 2vw;
            color: #FFD600;
            cursor: pointer;
        }
        .rating > label::before{ 
        content: "\2605";
        position: absolute;
        opacity: 0;
        }
        .rating > label:hover:before,
        .rating > label:hover ~ label:before {
        opacity: 1 !important;
        }

        .rating > input:checked ~ label:before{
        opacity:1;
        }

        .rating:hover > input:checked ~ label:before{ opacity: 0.4; }

        body{ background: #222225; color: white;}
    </style>
    @include('admin/inc/links')
</head>
<body>
    @include('customer/inc/headerprofile')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 ms-auto p-3">
                <h3 class="mb-4">Testimonial</h3>
                <div class="col-lg-12 col-md-12 px-4">
                    <div class="card mb-4 border-0 shadow">

                        <div class="row g-0 p-3 align-items-center">
                            <div class="col-md-4 mb-lg-0 mb-md-0 mb-3">
                                <h5 class="mb-1"> {{ $booking->kost['nama'] }} </h5>
                                <img src="{{ asset('images/photo/'.$booking->kost['image']) }}" class="img-fluid rounded">
                            </div>
                            <div class="col-md-4 px-lg-3 px-md-3 px-0 ml-2">
                                <div class="mb-1">
                                    <h6 class="mb-1">Check In Date : </h6><span class="badge rounded-pill bg-light text-dark text-wrap lh-base"> {{ $booking->checkIn }}</span>
                                </div>
                                <div class="guests">
                                    <h6 class="mb-1"> Tamu</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap lh-base"> {{ $booking->total_dewasa }} Dewasa</span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap lh-base"> {{ $booking->total_anak }} Anak - Anak</span>
                                </div>
                                <div class="mb-1">
                                    <h6 class="mb-1"> Harga </h6><span class="badge rounded-pill bg-light text-dark text-wrap lh-base"> Rp. {{ $booking->total }} </span>
                                </div>
                            </div>
                            <div class="col-md-4 px-lg-3 px-md-3 px-0">
                                <div class="mb-1">
                                    <h6 class="mb-1">Check Out Date : </h6><span class="badge rounded-pill bg-light text-dark text-wrap lh-base"> {{ $booking->checkOut }}</span>
                                </div>
                                <div class="guests">
                                    <h6 class="mb-1"> Pesan </h6>
                                    <span class="badge rounded-pill text-dark text-wrap lh-base"> {{ $booking->pesan }} </span>
                                </div>
                                <div class="mb-1">
                                    <h6 class="mb-1"> Status </h6><span class="badge rounded-pill bg-light text-dark text-wrap lh-base"> {{ $booking->status }} </span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card mb-4 border-0 shadow">
                        <div class="row g-0 p-3 align-items-center">
                            <form action="/newtestimoni" method="post">
                                @csrf
                                <input type="hidden" value="{{ $booking->customer['id'] }}" name="customer_id" class="btn btn-outline-dark w-100 shadow-none col-md-6 mb-3">
                                <input type="hidden" value="{{ $booking->kost['id'] }}" name="kost_id" class="btn btn-outline-dark w-100 shadow-none col-md-6 mb-3">
                                <div class="rating">
                                    <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                    <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                    <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                    <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                    <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                </div>
                                <textarea rows="4" name="testimoni" class="form-control shadow-none col-md-6 mb-3" required></textarea>
                                <input type="submit" value="kirim" class="btn btn-outline-dark w-100 shadow-none col-md-6 mb-3">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin/inc/script')
    <script>
        var $star_rating = $('.star-rating .fa');

        var SetRatingStar = function() {
        return $star_rating.each(function() {
            if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
            return $(this).removeClass('fa-star-o').addClass('fa-star');
            } else {
            return $(this).removeClass('fa-star').addClass('fa-star-o');
            }
        });
        };

        $star_rating.on('click', function() {
        $star_rating.siblings('input.rating-value').val($(this).data('rating'));
        return SetRatingStar();
        });

        SetRatingStar();
        $(document).ready(function() {

        });
    </script>
</body>
</html>