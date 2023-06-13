<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Hotel Kami</title>
    @include('admin/inc/links')
</head>
<body class="bg-light">

    @include('admin/inc/header')
    
    
    
    <div class="container-fluid">
        <div class="row">
            {{-- <div class="col-lg-6 col-md-6 mb-5 px-4">
                @foreach ($aboutcontact as $ac)
                <div class="bg-white rounded shadow p-4">
                    <iframe class="w-100 rounded mb-4" height="320px" src="{{ $ac->iframe }}" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <h5>Alamat</h5>
                    <a href="{{ $ac->maps }}" target="_blank" class="d-inline-block text-decoration text-dark mb-3">
                    <i class="bi bi-geo-alt-fill"></i> {{ $ac->alamat }} </a>
                    <h5 class="mt-4">Hubungi Kami</h5>
                    <a href="{{ $ac->telepon_rujukan }}" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> {{ $ac->telepon }} </a>
                    <h5 class="mt-4">Email</h5>
                    <a href="{{ $ac->email_rujukan }}" class="d-inline-block text-decoration text-dark mb-3"><i class="bi bi-envelope-fill"></i> {{ $ac->email }} </a>
                    <h5>Media Sosial Kami</h5>
                    <a href="{{ $ac->medsos_rujukan }}" class="d-inline-block text-dark fs-5 me-2"><i class="bi bi-instagram me-1"></i> {{ $ac->media_sosial }} </a>
                </div>
                @endforeach
            </div> --}}

            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                @if (session()->has('succes'))
                    <div class="alert alert-success text-center" role="alert">
                        {{ session('succes') }}
                    </div>
                @endif
                <!-- General Carousel Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="bg-white rounded shadow p-4">
                            <form action="/pengajuannew" method="post">
                                @csrf
                                {{-- <div class="mb-3">
                                    <label class="form-label" style="font-weight: 500;">Nama</label>
                                    <input type="text" name="" class="form-control shadow-none">
                                </div> --}}
                                {{-- <div class="mb-3">
                                    <label class="form-label" style="font-weight: 500;">Email</label>
                                    <input type="email" name="customer_id" class="form-control shadow-none" required>
                                </div> --}}
                                <input type="hidden" name="customer_id" value="{{ auth()->guard('pemilik')->id() }}">
                                <div class="mb-3">
                                    <label class="form-label" style="font-weight: 500;">Subjek</label>
                                    <input type="text" name="subjek" class="form-control shadow-none" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" style="font-weight: 500;">Pesan</label>
                                    <textarea class="form-control shadow-none" name="pesan" rows="5" style="resize: none;" required></textarea>
                                </div>
                                <input type="hidden" name="status" value="diproses">
                                <button type="submit" class="btn btn-success shadow-none">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('admin/inc/script')

</body>
</html>