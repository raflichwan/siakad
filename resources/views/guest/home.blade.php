@extends('layout.guest')
@section('content')

<!-- ======= About Section ======= -->
<section id="about" class="about">
  <div class="container">

    <div class="section-title">
      <h2>{{$tagtentang}}</h2>
      <h3>{{$judultentang}}</h3>
      <p>{{$detailtentang}}</p>
    </div>

    <div class="row content">
      <div class="col-lg-6">
        <p>
          {{$deskripsitentang1}}
        </p>
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0">
        <p>
          {{$deskripsitentang2}}
        </p>
      </div>
    </div>

  </div>
</section><!-- End About Section -->

<!-- ======= Services Section ======= -->


<!-- ======= Features Section ======= -->

<!-- ======= Cta Section ======= -->
<section id="cta" class="cta">
  <div class="container">

    <div class="text-center">
      <h3>{{$judulhubungi}}</h3>
      <p>{{$detailhubungi}}</p>
      <a class="cta-btn" href="#">Hubungi Kami</a>
    </div>

  </div>
</section><!-- End Cta Section -->

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
  <div class="container">

    <div class="section-title">
      <h2>{{$tagpelayanan}}</h2>
      <h3>{{$judulpelayanan}}</span></h3>
      <p>{{$detailpelayanan}}</p>
    </div>

    <div class="row portfolio-container">

      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <img src="{{ asset('storage/'.$fotolayanan1) }}" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>App 1</h4>
          <p>App</p>
          <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
          <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-web">
        <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>Web 3</h4>
          <p>Web</p>
          <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
          <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>App 2</h4>
          <p>App</p>
          <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
          <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>Card 2</h4>
          <p>Card</p>
          <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
          <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-web">
        <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>Web 2</h4>
          <p>Web</p>
          <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
          <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>App 3</h4>
          <p>App</p>
          <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
          <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>Card 1</h4>
          <p>Card</p>
          <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
          <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>Card 3</h4>
          <p>Card</p>
          <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
          <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-web">
        <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>Web 3</h4>
          <p>Web</p>
          <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
          <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Portfolio Section -->

<!-- ======= Pricing Section ======= -->

<!-- ======= F.A.Q Section ======= -->


<!-- ======= Team Section ======= -->
<section id="team" class="team">
  <div class="container">

    <div class="section-title">
      <h2>{{$tagpengurus}}</h2>
      <h3>{{$judulpengurus}}</h3>
      <p>{{$deskripsipengurus}}</p>
    </div>

    <div class="row">

      <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
        <div class="member">
          <div class="member-img">
            <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>{{$pengurus1}}</h4>
            <span>{{$jabatan1}}</span>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
        <div class="member">
          <div class="member-img">
            <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>{{$pengurus2}}</h4>
            <span>{{$jabatan2}}</span>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
        <div class="member">
          <div class="member-img">
            <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>{{$pengurus3}}</h4>
            <span>{{$jabatan3}}</span>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
        <div class="member">
          <div class="member-img">
            <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>{{$pengurus4}}</h4>
            <span>{{$jabatan4}}</span>
          </div>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Team Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">

    <div class="section-title">
      <h2>{{$tagbukutamu}}</h2>
      <h3>{{$judulbukutamu}}</h3>
      <p>{{$keteranganbukutamu}}</p>
    </div>

    <div class="row mt-5">

      <div class="col-lg-4">
        <div class="info">
          <div class="address">
            <i class="bi bi-geo-alt"></i>
            <h4>Location:</h4>
            <p>A108 Adam Street, New York, NY 535022</p>
          </div>

          <div class="email">
            <i class="bi bi-envelope"></i>
            <h4>Email:</h4>
            <p>info@example.com</p>
          </div>

          <div class="phone">
            <i class="bi bi-phone"></i>
            <h4>Call:</h4>
            <p>+1 5589 55488 55s</p>
          </div>

        </div>

      </div>

      <div class="col-lg-8 mt-5 mt-lg-0">

        <form action="inputpenjengukan" method="POST" enctype='multipart/form-data'>
          @csrf
          <!-- method="POST" id="saveEdit" enctype='multipart/form-data' action="web" -->

          <div class="form-group mt-3">
            <input type="text" class="form-control" name="nama_santri" id="nama_santri" placeholder="Nama Santri" required>
          </div>
          <div class="form-group mt-3">
            <input type="date" class="form-control" name="tanggal_penjengukan" id="tanggal_penjengukan" placeholder="MM/DD/YYYY" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="keterangan" rows="5" placeholder="Keterangan" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Penjengukan Sudah Diajukan. Terimakasih!</div>
          </div>
          <div class="text-center"><button type="submit">Kirim</button></div>
        </form>

      </div>

    </div>

  </div>
</section><!-- End Contact Section -->

@endsection