<div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
    <h3 class="mb-0">SELAMAT DATANG DI KEISUKE'S BORADING SCHOOL</h3>
</div>

<div class="col-lg-3 bg-dark border-top border-3 border-secondary" id="dashboard-menu">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid flex-lg-column align-items-stretch">
            <h4 class="mt-2 text-light"> {{ auth('user')->user()->username }}'s Profile</h4>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-items-stretch mt-2 " id="adminDropdown">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/profil"> Profile </a>
                    </li>
                    <li class="nav-item">
                        <button class="btn text-white px-3 w-100 shadow-none text-start d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#booking">
                            <span> Riwayat Saya </span>
                            <span><i class="bi bi-caret-down-fill"></i></span>
                        </button>
                        <div class="collapse show px-3 small mb-1" id="booking">
                            <ul class="nav nav-pills flex-column rounded border border-secondary bg-white">
                                <li class="nav-item">
                                    <a class="nav-link text-black" href="/bookingroom">Booking Room</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-black" href="/bookingriwayat">Riwayat Booking</a>
                                </li>
                              </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <form method="post">
                            <a href="/logoutt" class="nav-link text-white">Log Out</a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>