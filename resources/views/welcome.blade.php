<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistem Antrian Puskesmas</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">Puskesmas Sehat</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="/login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-3">Puskesmas Sehat</h1>
            <!-- <div class="transparan rounded mt-4">
                <h4>NOMOR ANTRIAN SAAT INI</h4>
                <h4>1</h4>
            </div> -->
            <h5 class="mt-3">SELAMAT DATANG DI PUSKESMAS SEHAT <br> SILAHKAN AMBIL NOMOR ANTRIAN ANDA DI BAWAH INI
            </h5>
            <!-- Button trigger modal -->
            <h5 class="mt-3">Pilih Poli</h5>
            <form action="/antrian" method="POST">
                @csrf
                <label for="nama" class="form-label"></label>
                <input type="nama" name="nama" class="form-control border-success shadow" id="nama"
                    aria-describedby="nama" placeholder="Nama" required>
                <br>
                <select class="form-select border-success shadow" style="width: 250px" name="poli"
                    aria-label="Default select example">
                    <option value="umum">Umum</option>
                    <option value="gigi">Gigi</option>
                    <option value="mata">Mata</option>
                </select>
                <button type="submit" class="btn btn-success shadow mt-3">
                    Ambil Antrian
                </button>
            </form>

        </div>
    </header>

    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Lokasi</h4>
                    <p class="lead mb-0">
                        Cluster Abhipraya Residence
                        <br />
                        Blok C1 No.22, Jawa Timur 65152
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Tentang Kami</h4>
                    <a class="btn btn-outline-light btn-social mx-1"
                        href="https://www.instagram.com/garudatigapilar/?hl=id"><i
                            class="fab fa-fw fa-instagram"></i></a>
                    <!-- <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a> -->
                    <a class="btn btn-outline-light btn-social mx-1" href="http://www.3-pilar.com/"><i
                            class="fab fa-fw fa-dribbble"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; Tiga Pliar 2023</small></div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
