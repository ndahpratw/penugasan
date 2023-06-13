<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font text-white" href="index.php">Keisuke's Boarding House</a>
            <button class="navbar-toggler shadow-none text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active me-2 text-white" aria-current="page" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link me-2 text-white" href="/kost">Info Kost</a></li>
                    {{-- <li class="nav-item"><a class="nav-link me-2 text-white" href="/contact">Hubungi Kami</a></li> --}}
                    <li class="nav-item"><a class="nav-link me-2 text-white" href="/aboutUs">Tentang</a></li>
                </ul>
                @if (empty(auth('user')->user()))
                    <form class="d-flex" method="post">
                        <button type="button" class="btn btn-outline-light shadow-none me-lg-3 me-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                            Login
                        </button>
                        <button type="button" class="btn btn-outline-light shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
                            Register
                        </button>
                    </form>
                @else
                    <div style="color: white;"> Selamat Datang, <a href="/profil" class="btn text-secondary text-white shadow-none" style="border: 1px solid white;"> {{ auth('user')->user()->username }} <i class="bi bi-person"></i></a> </div>
                @endif
            </div>
        </div>
    </nav>
</div>

    <!-- Login -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/succesLogin" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center" id="loginModalLabel"><i class="bi bi-person-fill me-2"></i>User Login</h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h1>Silahkan Login</h1>
                        <div class="mb-3">
                            <label for="email" class="form-label  @error('email') is-invalid @enderror">Email</label>
                            <input type="text" class="form-control shadow-none @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="email" @if(Cookie::has('emailuser')) value="{{ Cookie::get('emailuser') }}" @endif>
                            @error('email') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control shadow-none @error('password') is-invalid @enderror" id="password" name="password" @if(Cookie::has('passuser')) value="{{ Cookie::get('passuser') }}" @endif>
                            @error('password') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="rememberme" @if(Cookie::has('emailuser')) checked @endif>
                            <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <button type="submit" name="login" class="btn btn-success shadow-none">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Register -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="/succesRegis" method="POST" enctype="multipart/form-data">>
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center" id="registerModalLabel"><i class="bi bi-person-add me-2"></i>User Register</h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h1>Silahkan Register</h1>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control shadow-none @error('username') is-invalid @enderror" id="username" name="username" aria-describedby="username" value="{{ old('username') }}">
                            @error('username') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control shadow-none @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="email" value="{{ old('email') }}">
                            @error('email') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">No. Telepon</label>
                            <input type="text" class="form-control shadow-none @error('telepon') is-invalid @enderror" id="phone" name="telepon" aria-describedby="phone" value="{{ old('telepon') }}">
                            @error('telepon') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control shadow-none @error('alamat') is-invalid @enderror" id="alamat" name="alamat"  aria-describedby="alamat" value="{{ old('alamat') }}">
                            @error('alamat') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="datebirth" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control shadow-none @error('tanggal_lahir') is-invalid @enderror"" id="datebirth" name="tanggal_lahir" aria-describedby="datebirth" value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="picture" class="form-label">Foto Diri</label>
                            <input type="file" class="form-control shadow-none @error('image') is-invalid @enderror" id="picture" name="image" aria-describedby="picture" accept="image/*">
                            @error('image') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control shadow-none @error('password') is-invalid @enderror" id="password" name="password">
                            @error('password') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" name="kirim" class="btn btn-dark shadow-none">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>