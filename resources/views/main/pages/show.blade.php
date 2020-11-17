@extends('main.layouts.app')

@section('content')


<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">

        <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
          
          
          <div class="row justify-content-center mt-5">
            <div class="col-md-8 text-center">
              <h1>Many People Selling Online</h1>
              <p class="mb-0">April 24th, 2019 <span class="mx-2">&bullet;</span> by <a href="#" class="text-white">Colorlib</a></p>
            </div>
          </div>

          
        </div>
      </div>
    </div>
</div>  

<div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">

{!! $content !!}
        </div>
      </div>
    </div>
</div>

@endsection