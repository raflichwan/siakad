@extends('layout.guest')
@section('content')

<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li>Blog Single</li>
        </ol>
        <h2>Blog Single</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-12 entries">

            <article class="entry entry-single">
            <div>
                  <img src="{{ asset('storage/'.$artikel->url) }}" alt="" class="img-fluid">
                </div>

                <h2 class="entry-title mt-2">
                  {{ $artikel->judul }}
                </h2>

                <div class="entry-content">
               <?php 
             
              echo $artikel->description;
             ?>
                
              </div>
             
              
            </article><!-- End blog entry -->

            

            

          </div><!-- End blog entries list -->


        </div>

      </div>
    </section><!-- End Blog Single Section -->

@endsection