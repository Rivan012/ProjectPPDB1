<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.web_title') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="icon" href="https://www.smkn-tgm.sch.id/media/icon/06pAcWVXSva7f3bn-logo.png" type="image/x-icon">
    @foreach ($seo as $s)
    <meta name="{{ $s->name }}" content="{{ $s->value }}">
    @endforeach
</head>

<body>
    <nav class="navbar navbar-expand-lg " style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand" href="#">PPDB {{ config('app.web_title') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Informasi
                        </a>
                        <ul class="dropdown-menu">
                            @if (Route::has('login'))
                            @auth
                            <li><a class="dropdown-item" href="{{ route(Auth()->user()->role) }}">Dashboard</a></li>
                            @else
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                            @endauth
                            @endif
                            <li><a class="dropdown-item" href="#">Syarat</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="container mt-1" id="gelombang">
        @include('page.gelombang')
    </section>
    <section id="pengumuman" class="container mt-1">
        @include('page.pengumuman')
    </section>
    <section id="syarat_umum" class="container mt-1">
        @include('page.syarat_umum')
    </section>
    <section id="timeline" class="container">
        @include('page.timeline')
    </section>
    <!-- Footer -->
    <footer style="background-color: #e3f2fd;" class="text-dark mt-5">
        @include('page.footer')
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    @foreach ($gelombang as $gel)
    <script>
        function countdown() {
            var gelombangBuka = new Date("{{ $gel->gelombang_buka }}");
            var gelombangTutup = new Date("{{ $gel->gelombang_tutup }}");
            var now = new Date();

            if (now < gelombangBuka) {
                var countdown = gelombangBuka - now;
                var days = Math.floor(countdown / (1000 * 60 * 60 * 24));
                var hours = Math.floor((countdown % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((countdown % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((countdown % (1000 * 60)) / 1000);

                document.getElementById("countdown").innerHTML = "Gelombang Selanjutnya Dibuka: " + days + " Hari, " + hours + " Jam, " + minutes + " Menit, " + seconds + " Detik";
            } else if (now < gelombangTutup) {
                var countdown = gelombangTutup - now;
                var days = Math.floor(countdown / (1000 * 60 * 60 * 24));
                var hours = Math.floor((countdown % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((countdown % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((countdown % (1000 * 60)) / 1000);

                document.getElementById("countdown").innerHTML = "Sisa Waktu Pendaftaran: : " + days + " Hari, " + hours + " Jam, " + minutes + " Menit, " + seconds + " Detik";
            } else {
                document.getElementById("countdown").innerHTML = "Gelombang sudah ditutup";
            }
        }

        setInterval(countdown, 1000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/dayjs@1.10.4/dayjs.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/dayjs@1.10.4/plugin/relativeTime.js"></script> -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const timeElements = document.querySelectorAll('.time-ago');

            timeElements.forEach(el => {
                const time = el.getAttribute('data-time');
                el.textContent = moment(time).fromNow();
                // el.textContent = dayjs(time).fromNow(); // Uncomment if using dayjs
            });
        });
    </script>
    @endforeach
</body>

</html>