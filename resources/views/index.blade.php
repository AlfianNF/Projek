@extends('layouts.main')

@section('container')

{{-- Check for success message --}}
@if(session('success'))
   <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
@elseif(session('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

{{-- Carousel --}}
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/MegumiStore.png" class="d-block w-100 float-end img-fluid rounded" alt="..." style="width: 1000px; height:400px; overview:hidden;">
        </div>
        <div class="carousel-item">
          <a href="/gi">
            <img src="img/gi-carousel.png" class="d-block w-100 float-end img-fluid rounded" alt="..." style="width: 1000px; height:400px; overview:hidden;">
          </a>
        </div>
        <div class="carousel-item">
          <a href="/ml">
            <img src="img/ml-carousel.jpg" class="d-block w-100 float-end img-fluid rounded" alt="..." style="width: 1000px; height:400px; overview:hidden;">
          </a>
        </div>
        <div class="carousel-item">
          <a href="/hsr">
            <img src="img/hsr-carousel.jpeg" class="d-block w-100 float-end img-fluid rounded" alt="..." style="width: 1000px; height:400px; overview:hidden;">
          </a>
        </div>
        <div class="carousel-item">
          <a href="/coc">
            <img src="img/coc-carousel.jpg" class="d-block w-100 float-end img-fluid rounded" alt="..." style="width: 1000px; height:400px; overview:hidden;">
          </a>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

<!-- Card for Game -->
<div class="row mt-3 mb-3">
  <div class="col-md-3">
    <div class="card">
      <a href="/gi" class="text-decoration-none text-black">
        <div class="card-body">
          <img src="img/genshin.jpg" alt="Genshin Impact" class="rounded img-fluid my-unique-card">
          <h5 class="card-title mt-2">Genshin Impact</h5>
          <a href="/gi" class="btn btn-primary">Top Up</a>
        </div>
      </a>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card">
      <a href="/hsr" class="text-decoration-none text-black">
        <div class="card-body">
          <img src="img/hsr.jpg" alt="Honkai Star Rail" class="rounded img-fluid my-unique-card">
          <h5 class="card-title mt-2">Honkai Star Rail</h5>
          <a href="/hsr" class="btn btn-primary">Top Up</a>
        </div>
      </a>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card">
      <a href="/ml" class="text-decoration-none text-black">
        <div class="card-body">
          <img src="img/ml.png" alt="Mobile Legend" class="rounded img-fluid my-unique-card">
          <h5 class="card-title mt-2">Mobile Legend</h5>
          <a href="/ml" class="btn btn-primary">Top Up</a>
        </div>
      </a>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card">
      <a href="/coc" class="text-decoration-none text-black">
        <div class="card-body">
          <img src="img/coc.png" alt="Clash Of Clans" class="rounded img-fluid my-unique-card">
          <h5 class="card-title mt-2">Clash Of Clans</h5>
          <a href="/coc" class="btn btn-primary">Top Up</a>
        </div>
      </a>
    </div>
  </div>
</div>

  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    
@endsection