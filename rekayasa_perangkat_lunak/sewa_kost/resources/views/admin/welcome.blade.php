<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Dashboard</title>
    
    @include('admin/inc/links')
</head>
<body class="bg-light">
    
    @include('admin/inc/header')

    
    <!-- BODY -->
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="fw-bold">
                        {{ \Carbon\Carbon::now()->format("d-m-Y") }}
                    </h5>
                    <h5 id="jam" class="fw-bold"></h5>
                </div>
                
                
                <!-- General Carousel Section -->
                @if (auth()->guard('pemilik')->check())
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body text-center">
                            <marquee class="fw-bold mb-3">S E L A M A T &nbsp; D A T A N G &nbsp; D I &nbsp; K E I S U K E ' S &nbsp; B O A R D I N G &nbsp; H O U S E</marquee>
                            <div class="text-bg-secondary d-flex justify-content-center align-items-center mb-3">
                                <div class="">
                                    <img src="{{ asset('assets/img/profil/profil.jpg') }}" class="rounded-circle" style="width: 250px; border: 1px solid black">
                                </div>
                            </div>
                            <h5>Halo {{ auth('pemilik')->user()->username }}</h5>
                        </div>
                    </div>
                @else
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body text-center">
                            <marquee class="fw-bold mb-3">S E L A M A T &nbsp; D A T A N G &nbsp; D I &nbsp; K E I S U K E ' S &nbsp; B O A R D I N G &nbsp; H O U S E</marquee>
                            <div class="text-bg-secondary d-flex justify-content-center align-items-center mb-3">
                                <div class="">
                                    <img src="{{ asset('assets/img/profil/profil.jpg') }}" class="rounded-circle" style="width: 250px; border: 1px solid black">
                                </div>
                            </div>
                            <h5>Halo {{ auth('admin')->user()->username }}</h5>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @include('admin/inc/script')
    <script type="text/javascript" src="{{ asset('assets/jam.js') }}"></script>
    
</body>
</html>