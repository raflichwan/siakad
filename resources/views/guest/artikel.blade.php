@extends('layout.guest')
@section('content')

<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="index.html">Home</a></li>
      <li>Blog</li>
    </ol>
    <h2>Blog</h2>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">

    <div class="row">
      <div class="col-lg-12 entries">
        @foreach($artikel as $value)
        <article class="entry">
          <div class="entry-img">
            <img src="{{ asset('storage/'.$value->url) }}" alt="" class="img-fluid">
          </div>

          <h2 class="entry-title">
            {{ $value->judul }}
          </h2>

          <div class="entry-content">
            <div class="read-more">
              <a href="artikeldetail/{{ $value->id }}">Read More</a>
            </div>
          </div>

        </article><!-- End blog entry -->
        @endforeach
        <div class="blog-pagination">
          <ul class="justify-content-center">
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
          </ul>
        </div>

      </div><!-- End blog entries list -->



    </div>

  </div>
</section><!-- End Blog Section -->

@endsection