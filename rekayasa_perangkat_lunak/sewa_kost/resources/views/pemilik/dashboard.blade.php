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
                    <h3>Dashboard</h3>
                    <h5 class="fw-bold">{{ \Carbon\Carbon::now()->format("d-m-Y") }}</h5 class="fw-bold">
                </div>
                
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        

                        <div class="d-flex align-items-center justify-content-between mb-3 text-center">

                            <div class="mb-4" style="border: 1px solid black;width: 200px; border-radius: 25px;">
                                <div style="height: 75px;">
                                    <p style="margin: 0px; padding-top: 5px;">Pemasukan</p>
                                    <p style="font-size: 25px; margin-bottom: 5px;">Rp {{ $income }}</p>
                                </div>
                                <div style="border-top: 1px solid black; height: 25px;">
                                    {{-- <a href="" style="font-size: 13px;">show more >>></a> --}}
                                </div>
                            </div>

                            <div class="mb-4" style="border: 1px solid black;width: 300px; border-radius: 25px;">
                                <p style="margin: 0px; padding-top: 5px; background-color:gray; border-top-right-radius: 25px; border-top-left-radius: 25px;">Available Room</p>
                                <div class="d-flex justify-content-between text-center" style="height: 50px;">
                                    {{-- <div style="width: 100px; border-right: 1px solid black; border-top: 1px solid;">
                                        <div style="margin: 0px; font-size: 20px;"> {{ $kotor }}
                                            <p style="font-size: 10px;">kotor</p>
                                        </div>
                                    </div> --}}
                                    <div style="width: 150px; border-left: 1px solid black; border-top: 1px solid;">
                                        <div style="margin: 0px; font-size: 20px;"> {{ $digunakan }}
                                            <p style="font-size: 10px;">digunakan</p>
                                        </div>
                                    </div>
                                    <div style="width: 150px; border-left: 1px solid black; border-top: 1px solid;">
                                        <div style="margin: 0px; font-size: 20px;"> {{ $tersedia }}
                                            <p style="font-size: 10px;">tersedia</p>
                                        </div>
                                    </div>
                                </div>
                                <div style="border-top: 1px solid black; height: 25px;">
                                    <a href="/kostD" style="font-size: 13px;">show more >>></a>
                                </div>
                            </div>

                            {{-- <div class="mb-4" style="border: 1px solid black;width: 200px; border-radius: 25px;">
                                <p style="margin: 0px; padding-top: 5px; background-color:gray; border-top-right-radius: 25px; border-top-left-radius: 25px;">Fasilitas</p>
                                <div class="d-flex justify-content-between text-center" style="height: 50px;">
                                    <div style="width: 200px; border-top: 1px solid;">
                                       <p style="font-size: 35px;">{{$fasilitas}}</p>
                                    </div>
                                </div>
                                <div style="border-top: 1px solid black; height: 25px;">
                                    <a href="/fasilitasD" style="font-size: 13px;">show more >>></a>
                                </div>
                            </div> --}}
                            
                            {{-- <div class="mb-4" style="border: 1px solid black;width: 150px; border-radius: 25px;">
                                <p style="margin: 0px; padding-top: 5px;">   
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i> </p>
                                <div class="d-flex justify-content-between text-center" style="height: 75px;">
                                    @if (count($testimoni))
                                    <div style="width: 100px; border-right: 1px solid black; border-top: 1px solid;"><p style="font-size:35px; margin-top: 10px; font-weight:bolder; "> {{ $rating }} </p></div>
                                    @else
                                    <div style="width: 100px; border-right: 1px solid black; border-top: 1px solid;"><p style="font-size:35px; margin-top: 10px; font-weight:bolder; "> - </p></div>
                                    @endif
                                    <div style="width: 100px; border-left: 1px solid black; border-top: 1px solid;"><p style="font-size:25px; margin-top: 15px;">5</p></div>
                                </div>
                            </div> --}}
                   
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-3 text-center">
                            <div class="mb-4" style="border: 1px solid black;width: 1000px; border-radius: 15px;">
                                <div>
                                    <p style="margin: 0px; padding: 5px 0px; border-bottom: 1px solid; font-weight: bolder;background-color:gray; border-top-right-radius: 15px; border-top-left-radius: 15px;">Booking's Overview</p>
                                    <div class="card shadow mb-4 mt-0">
                                        <!-- <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                                        </div> -->
                                        <div class="card-body">
                                            <div class="chart-area">
                                                <canvas id="myAreaChart"></canvas>
                                            </div>
                                            {{-- <hr>
                                            Styling for the area chart can be found in the --}}
                                            <!-- <code>/js/demo/chart-area-demo.js</code> file. -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="mb-4" style="border: 1px solid black;width: 275px; border-radius: 15px;">
                                <div >
                                    <p style="margin: 0px; padding: 5px 0px; border-bottom: 1px solid; font-weight: bolder; background-color:gray; border-top-right-radius: 15px; border-top-left-radius: 15px;">Room's Type</p>
                                    
                                    <!-- Donut Chart -->
                             
                                        <div class="card shadow mb-3">
                                            <!-- Card Header - Dropdown -->
                                            <!-- <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
                                            </div> -->
                                            <!-- Card Body -->
                                            <div class="card-body" style="margin-bottom: 0px;">
                                                <div class="chart-pie pt-2">
                                                    <canvas id="myPieChart"></canvas>
                                                </div>
                                                <div class="mt-4 text-center" style="font-size: 10px">
                                                    @foreach ($plabels as $pl)
                                                        <span class="mr-2">{{ $pl }}</span> |
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                             
                                </div>
                            </div> --}}
                        </div>
                        
                        <div class="d-flex align-items-center justify-content-between mb-3 text-center">
                            {{-- <div class="mb-4" style="width: 275px;">
                                <div style="width: 275px; border: 1px solid black; text-align:center; height: fit-content; padding: 5px; border-top-right-radius: 25px; border-top-left-radius: 25px;  background-color:gray; border-top-right-radius: 15px; border-top-left-radius: 15px;">
                                    <p style="font-size: 20px; margin-bottom: 0px;">We have {{ $user }} user</p>
                                </div>

                                @foreach ($customer as $cs)
                                    <div style="height: 50px;">
                                        <div class="d-flex justify-content-between" style="height: 50px;">
                                         
                                            @if ($cs->image === "")
                                                <div style="width: 75px; border: 1px solid black; text-align:center">
                                                    <img src="{{ asset("assets/img/testimoni/profil.jpg") }}" alt="icon" style="width: 45px;">
                                                </div>
                                            @else
                                                <div style="width: 75px; border: 1px solid black; text-align:center">
                                                    <img src="{{ asset('images/users/'.$cs->image) }}" alt="icon" style="width: 45px; border-radius:100px">
                                                </div>    
                                            @endif
                                            
                                            <div style="width: 200px; border: 1px solid black;">
                                                <p style="font-size: 15px; margin: 0px;">{{ $cs->username }}</p>
                                                <p style="font-size: 15px; margin: 0px;">Bergabung : {{ \Carbon\Carbon::parse($cs->created_at)->format("d-m-Y") }}</p>
                                                <p style="font-size: 15px; margin: 0px;">Bergabung : 2023-03-03</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                               

                                <div style="border: 1px solid black; height: 25px; border-bottom-right-radius: 25px; border-bottom-left-radius: 25px;">
                                    <a href="/user" style="font-size: 13px;">show more >>></a>
                                </div>
                            </div> --}}


                            <div class="mb-4" style="border: 1px solid black;width: 1000px; border-radius: 25px;">
                                <div style=" border: 1px solid black; text-align:center; height: fit-content; padding: 5px; border-top-right-radius: 25px; border-top-left-radius: 25px;  background-color:gray; border-top-right-radius: 15px; border-top-left-radius: 15px;">
                                    <p style="font-size: 25px; margin-bottom: 0px;">Antrian Booking</p>
                                </div>
                                @if (count($antrian))
                                    <div class="table-responsive-md" style=" padding: 15px;">
                                        <table class="table table-hover border">
                                            <thead class="sticky-top text-center">
                                                <tr class="bg-dark text-light">
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Check In</th>
                                                    <th scope="col">Check Out</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                @foreach ($antrian as $bk)
                                                    <tr>
                                                        <td>{{ $bk->customer['username'] }}</td>
                                                        <td>{{ $bk->checkIn }}</td>
                                                        <td>{{ $bk->checkOut }}</td>
                                                        <td>{{ $bk->status }}</td>   
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="text-center mt-3"> Belum Ada Antrian / Pesanan </p>
                                @endif
                                <div style="border-top: 1px solid black; height: 25px;">
                                    <a href="/antrianD" style="font-size: 13px;">show more >>></a>
                                </div>
                            </div>
                        </div>

                            
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page level plugins -->
    <script src="{{ asset("assets/vendor/chart.js/Chart.min.js") }}"></script>

    <script type="text/javascript">
        var _label ={!! json_encode ($label) !!}
        var _data ={!! json_encode ($data) !!}
    </script>
    
    <!-- Page level custom scripts -->
    <script src="{{ asset("assets/js/demo/chart-area-demo.js") }}"></script>
    <script src="{{ asset("assets/js/demo/chart-pie-demo.js") }}"></script>
    <script src="{{ asset("assets/js/demo/chart-bar-demo.js") }}"></script>

    @include('admin/inc/script')
    
</body>
</html>