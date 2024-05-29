<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ Auth()->user()->role }} | {{ config('app.web_title') }}</title>

  <link rel="shortcut icon" type="image/png" href="{{ asset('images/logos/favicon.png')}}" />
  <link rel="stylesheet" href="{{ asset('css/styles.min.css')}}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
        #editor {
            height: 300px;
            border: 1px solid #ced4da;
            padding: 10px;
            border-radius: 5px;
            overflow-y: auto;
        }
        .btn-group .btn i {
            margin-right: 0;
        }
    </style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="{{ asset('images/logos/dark-logo.svg')}}" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        @include('components.sidebar')
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <a href="https://adminmart.com/product/modernize-free-bootstrap-admin-dashboard/" target="_blank" class="btn btn-primary">Download Free</a>
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="{{ asset('images/profile/user-1.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf

                      <button class="btn btn-outline-primary mx-3 mt-2 d-block" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        Logout
                      </button>
                    </form>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
        {{ $slot }}
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Copyright &copy; {{ date('Y') }} {{ config('app.web_title') }}. All rights reserved. </p>
        </div>
      </div>
    </div>
  </div>
  <script>
    // Fungsi untuk menambahkan event listener ke semua tombol hapus
    function addDeleteEventListeners() {
      const deleteButtons = document.querySelectorAll('.delete-btn'); // Pilih semua tombol hapus
      deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
          event.preventDefault();
          const form = this.closest('form');
          Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini tidak bisa dikembalikan setelah dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.isConfirmed) {
              setTimeout(() => {
                form.submit();
              }, 1000);
            }
          });
        });
      });
    }

    // Jalankan fungsi saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
      addDeleteEventListeners(); // Menambahkan event listener ke tombol hapus saat halaman dimuat
    });
  </script>
  

  @if(session('success') || session('error'))
  <script>
    Swal.fire({
      icon: "{{ session('success') ? 'success' : 'error' }}",
      title: "{{ session('success') ? 'Berhasil!' : 'Gagal!' }}",
      text: "{{ session('success') ?? session('error') }}",
      timer: 3000,
      showConfirmButton: false
    });
  </script>
  @endif

  <script src="{{ asset('libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('js/sidebarmenu.js')}}"></script>
  <script src="{{ asset('js/app.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js"></script>
  <script src="{{ asset('libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{ asset('libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="{{ asset('js/dashboard.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script>
    function execCmd(command, value = null) {
      document.execCommand(command, false, value);
    }

    document.getElementById('editorForm').addEventListener('submit', function() {
      document.getElementById('content').value = document.getElementById('editor').innerHTML;
    });
  </script>
</body>

</html>