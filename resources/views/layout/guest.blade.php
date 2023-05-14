<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Pondok Pesantren</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  @foreach ($pilihCss as $value)
  <link rel="stylesheet" href="{{ asset($css[$value]) }}">
  @endforeach
  <!-- =======================================================
  * Template Name: Tempo
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top {{ @$classnonhome }}">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">Pondok Pesantren</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Pelayanan</a></li>
          <li><a class="nav-link scrollto" href="#team">Pengurus</a></li>
          <li><a href="artikel" id="artikel">Blog</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak Kami</a></li>
          <li><a class="nav-link scrollto" href="{{url('login')}}">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  @if(is_null(Request::segment(1)))
  <?php
  $foto = asset('storage/' . $backgroundutama);
  ?>
  <section id="hero" style="background-image:url('http://localhost:8000/storage/foto/XMtAFw7xlwTEZLAbKTtqjHm2DVoN1On6FOibyM4v.jpg') top center;">
    <div class="hero-container">
      <h3>ss{{$judulucapan}}</strong></h3>
      <h1>{{$judulutama}}</h1>
      <h2>{{$detailjudul}}</h2>
    </div>
  </section><!-- End Hero -->
  @endif

  <main id="main">
    @section('content')
    @show

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">

      <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
          <div class="copyright">
            &copy; Copyright <strong><span>Glory Tech</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/ -->
            Designed by <a href="https://glorytech.site/">Glory Tech</a>
          </div>
        </div>
      </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @foreach ($pilihJs as $value)
  <script src="{{ asset($js[$value]) }}"></script>
  @endforeach
</body>
<script>
  <?php
  if (isset($jsTambahan)) {
    echo $jsTambahan;
  }
  ?>

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
</script>

</html>