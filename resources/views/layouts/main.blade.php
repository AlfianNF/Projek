<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alfian Store</title>
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- SVG ICONS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <style>
      /* Style for card hover effect */
      .my-unique-card:hover {
        transform: scale(1.1); /* Mengubah ukuran gambar saat dihover */
        transition: transform 0.3s ease; /* Menambahkan transisi halus */
      }
    </style>
  </head>
  <body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-md bg-light mb-3">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand ms-5" href="/" style="color: green"><h2>Megumi Store</h2></a>
          <div class="navbar-link ms-3"><i><h3> Tempat Topup <span style="color: red; font-weight: bold;">TERMURAH</span> dan <span style="color: red; font-weight: bold;">TERPERCAYA</span></h3></i></div>

            
            
            <ul class="navbar-nav ms-auto me-5">
                <li class="nav-item">
                  @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 text-decoration-none btn btn-primary"><i class="bi bi-person-fill-gear"></i> Dashboard</a>
                        <a href="{{ url('/logout') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 text-decoration-none btn btn-danger"><i class="bi bi-person-dash"></i> Logout</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 text-decoration-none btn btn-success"><i class="bi bi-person-circle"></i> Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 text-decoration-none btn btn-warning"><i class="bi bi-person-fill-add"></i> Register</a>
                        @endif
                    @endauth
                </div>
                  @endif
                </li>
            </ul>
        </div>
    </nav>


  <div class="container">
    @yield('container')
  

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script type="text/javascript">
      function validateAndSubmit() {
        var form = document.getElementById('topupForm');
        var username = form.elements['username'].value;
        var uid = form.elements['uid'].value;
        var server = form.elements['server'].value;

        if (username.trim() === '' || uid.trim() === '' || server.trim() === '') {
          // Show an error message if any of the required fields is empty
          Swal.fire("Error", "Kolom tidak boleh kosong!", "error");
        } else {
          // Proceed with the SweetAlert
          JSalert();
        }
      }

      function JSalert() {
    Swal.fire({
        title: "Apakah Anda yakin mau Topup?",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "green",
        confirmButtonText: "Iya",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Topup Berhasil", "success");
            // Submit the form
            document.forms["topupForm"].submit();
        } else {
            Swal.fire("Topup Dibatalkan", "info");
            // The user clicked "Batal," so you can choose to do nothing or show a message.
        }
    });
}
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </div>
  </body>
</html>