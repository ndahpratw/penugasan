<div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
    <h3 class="mb-0">Keisuke's Boarding House</h3>
    <form method="post">
        <a href="/logout" class="btn btn-light btn-sm">Log Out</a>
    </form>
</div>

@if (auth()->guard('pemilik')->check())
    <div class="col-lg-2 bg-dark border-top border-3 border-secondary" id="dashboard-menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid flex-lg-column align-items-stretch">
                <h4 class="mt-2 text-light">{{ auth('pemilik')->user()->username }}'s Panel</h4>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-column align-items-stretch mt-2 " id="adminDropdown">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/dashboard">Dashboard</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="/properti">Properti Saya</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="/penghuni">Data Penghuni</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="/pengajuan">Ajukan Pengajuan</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="/review">Review</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
@else
    <div class="col-lg-2 bg-dark border-top border-3 border-secondary" id="dashboard-menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid flex-lg-column align-items-stretch">
                <h4 class="mt-2 text-light">{{ auth('admin')->user()->username }}'s Panel</h4>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-column align-items-stretch mt-2 " id="adminDropdown">
                    <ul class="nav nav-pills flex-column">

                        <li class="nav-item">
                            <a class="nav-link text-white" href="/pengajuanD">Pengajuan</a>
                        </li>


                        <li class="nav-item">
                            <button class="btn text-white px-3 w-100 shadow-none text-start d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#roomlist">
                                <span> Daftar Kost-an </span>
                                <span><i class="bi bi-caret-down-fill"></i></span>
                            </button>
                            <div class="collapse show px-3 small mb-1" id="roomlist">
                                <ul class="nav nav-pills flex-column rounded border border-secondary bg-white">
                                    <li class="nav-item">
                                        <a class="nav-link text-black" href="/kostD">Detail</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-black" href="/kostN">Tambah</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <button class="btn text-white px-3 w-100 shadow-none text-start d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#aboutme">
                                <span> About Us </span>
                                <span><i class="bi bi-caret-down-fill"></i></span>
                            </button>
                            <div class="collapse show px-3 small mb-1" id="aboutme">
                                <ul class="nav nav-pills flex-column rounded border border-secondary bg-white">
                                    <li class="nav-item">
                                        <a class="nav-link text-black" href="/profilD">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-black" href="/user">Info User</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <button class="btn text-white px-3 w-100 shadow-none text-start d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#other">
                                <span> Other </span>
                                <span><i class="bi bi-caret-down-fill"></i></span>
                            </button>
                            <div class="collapse show px-3 small mb-1" id="other">
                                <ul class="nav nav-pills flex-column rounded border border-secondary bg-white">
                                    <li class="nav-item">
                                        <a class="nav-link text-black" href="/carouselD">Anouncement</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-black" href="/settingD">Pengaturan</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
@endif

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
