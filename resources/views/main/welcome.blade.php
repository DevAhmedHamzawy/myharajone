@extends('main.layouts.app')

@section('content')
    
<div class="site-blocks-cover overlay" style="background-image: url(images/hero_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">

        <div class="col-md-12">
          
          
          <div class="row justify-content-center mb-4">
            <div class="col-md-8 text-center">
              <h1 class="" data-aos="fade-up">Welcome To DirectoryAds</h1>
              <p data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
            </div>
          </div>

          <div class="form-search-wrap mb-3" data-aos="fade-up" data-aos-delay="200">
            <form method="post" action="{{ route('welcome-search') }}">
              @csrf
              <div class="row align-items-center">
                <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                  <input type="text" name="title" class="form-control rounded" placeholder="عن ماذا تبحث؟">
                </div>
                <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                  <div class="wrap-icon">
                    <span class="icon icon-room"></span>
                    <select class="form-control rounded" onchange="getCities(this);">
                      @foreach ($areas as $area)
                        <option value="{{ $area->name }}">{{ $area->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  
                </div>
                <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                  <div class="wrap-icon">
                    <span class="icon icon-room"></span>
                    <select class="form-control rounded" id="cities" onchange="getSubCities(this);">
                      
                    </select>
                  </div>
                  
                </div>
                <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                  <div class="wrap-icon">
                    <span class="icon icon-room"></span>
                    <select class="form-control rounded" id="area_id" name="area_id">
                      
                    </select>
                  </div>
                  
                </div>
                <br><br>
                <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                  <div class="select-wrap">
                    <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                    <select class="form-control rounded" name="main_category" onchange="getChildren(this)">
                      <option value="">التصنيفات</option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  
                 

                </div>

                <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                  <div class="select-wrap sub-category">
                  </div>
                </div>

                <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                  <div class="select-wrap sub-category-one">
                  </div>
                </div>

                <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                  <div class="select-wrap sub-category-two">
                  </div>
                </div>
                <br><br><br><br>
                <div class="col-lg-12 col-xl-12 ml-auto text-right">
                  <input type="submit" class="btn btn-primary btn-block rounded" value="Search">
                </div>
                
              </div>
            </form>
          </div>

          <div class="row text-left trending-search" data-aos="fade-up"  data-aos-delay="300">
            <div class="col-12">
              <h2 class="d-inline-block">Trending Search:</h2>
              @foreach ($trends as $trend)
                <a href="#">{{ $trend->name }}</a>
              @endforeach
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>  

  <div class="site-section bg-light">
    <div class="container">
      
      
      <div class="row">
        <div class="col-12">
          <h2 class="h5 mb-4 text-black">Featured Ads</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-12  block-13">
          <div class="owl-carousel nonloop-block-13">
            
            @foreach ($trendingPosts as $post)
                
            <div class="d-block d-md-flex listing vertical">
              <a href="{{ route('posts.show', $post->title) }}" class="img d-block" style="background-image: url('images/img_1.jpg')"></a>
              <div class="lh-content">
                <span class="category">{{ $post->category->name }}</span>
                <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                <h3><a href="{{ route('posts.show', $post->title) }}">{{ $post->title }}</a></h3>
                <p>مشاهدات: {{ $post->views }}, {{ $post->ad_sort }} , {{ $post->price_sort }} , {{ $post->payment_sort }}</p>
                <p>{{ number_format($post->price, 2, '.', '') }}</p>
                <p>{{ $post->user->name }}</p>
                <p>{{ $post->create_at }}</p>
                <address>{{ $post->area->name }}, {{ $post->areaName[0] }},  {{ $post->areaName[1] }}</address>    
              </div>
            </div>

            @endforeach


         

          </div>
        </div>


      </div>
    </div>
  </div>
  
  <div class="site-section" data-aos="fade">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center border-primary">
          <h2 class="font-weight-light text-primary">Popular Categories</h2>
          <p class="color-black-opacity-5">Lorem Ipsum Dolor Sit Amet</p>
        </div>
      </div>
      <div class="overlap-category mb-5">
        <div class="row align-items-stretch no-gutters">

          @foreach ($categories as $category)
              
          
          <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-3">
            <a href="#" class="popular-category h-100">
              <span class="icon"><span class="{{ $category->icon }}"></span></span>
              <span class="caption mb-2 d-block">{{ $category->name }}</span>
              <span class="number">{{ $category->views }}</span>
            </a>
          </div>

          @endforeach

         

         
        </div>
      </div>
      
      
    </div>
  </div>


  <div class="site-section bg-light">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-7 text-left border-primary">
          <h2 class="font-weight-light text-primary">Trending Today</h2>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-lg-6">

          @php $i = 0 @endphp
          @foreach ($trendingPosts as $post)
          @if ($i % 2 != 0)
              
          <div class="d-block d-md-flex listing">
            <a href="{{ route('posts.show', $post->title) }}" class="img d-block" style="background-image: url('images/img_1.jpg')"></a>
              <div class="lh-content">
                <span class="category">{{ $post->category->name }}</span>
                <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                <h3><a href="{{ route('posts.show', $post->title) }}">{{ $post->title }}</a></h3>
                <p>مشاهدات: {{ $post->views }}, {{ $post->ad_sort }} , {{ $post->price_sort }} , {{ $post->payment_sort }}</p>
                <p>{{ number_format($post->price, 2, '.', '') }}</p>
                <p>{{ $post->user->name }}</p>
                <p>{{ $post->create_at }}</p>
                <address>{{ $post->area->name }}, {{ $post->areaName[0] }},  {{ $post->areaName[1] }}</address>    
              </div>
          </div>
          @endif
          @php $i++ @endphp

          @endforeach
          

            

           

        </div>
        <div class="col-lg-6">

          
          @php $i = 0 @endphp
          @foreach ($trendingPosts as $post)
          @if ($i % 2 == 0)
              
          <div class="d-block d-md-flex listing">
            <a href="{{ route('posts.show', $post->title) }}" class="img d-block" style="background-image: url('images/img_1.jpg')"></a>
              <div class="lh-content">
                <span class="category">{{ $post->category->name }}</span>
                <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                <h3><a href="{{ route('posts.show', $post->title) }}">{{ $post->title }}</a></h3>
                <p>مشاهدات: {{ $post->views }}, {{ $post->ad_sort }} , {{ $post->price_sort }} , {{ $post->payment_sort }}</p>
                <p>{{ number_format($post->price, 2, '.', '') }}</p>
                <p>{{ $post->user->name }}</p>
                <p>{{ $post->create_at }}</p>
                <address>{{ $post->area->name }}, {{ $post->areaName[0] }},  {{ $post->areaName[1] }}</address>    
              </div>
          </div>
          @endif
          @php $i++ @endphp

          @endforeach

        </div>
      </div>
    </div>
  </div>
  
  <div class="site-section bg-white">
    <div class="container">

      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center border-primary">
          <h2 class="font-weight-light text-primary">Testimonials</h2>
        </div>
      </div>

      <div class="slide-one-item home-slider owl-carousel">
        <div>
          <div class="testimonial">
            <figure class="mb-4">
              <img src="images/person_3.jpg" alt="Image" class="img-fluid mb-3">
              <p>John Smith</p>
            </figure>
            <blockquote>
              <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
            </blockquote>
          </div>
        </div>
        <div>
          <div class="testimonial">
            <figure class="mb-4">
              <img src="images/person_2.jpg" alt="Image" class="img-fluid mb-3">
              <p>Christine Aguilar</p>
            </figure>
            <blockquote>
              <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
            </blockquote>
          </div>
        </div>

        <div>
          <div class="testimonial">
            <figure class="mb-4">
              <img src="images/person_4.jpg" alt="Image" class="img-fluid mb-3">
              <p>Robert Spears</p>
            </figure>
            <blockquote>
              <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
            </blockquote>
          </div>
        </div>

        <div>
          <div class="testimonial">
            <figure class="mb-4">
              <img src="images/person_5.jpg" alt="Image" class="img-fluid mb-3">
              <p>Bruce Rogers</p>
            </figure>
            <blockquote>
              <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
            </blockquote>
          </div>
        </div>

      </div>
    </div>
  </div>

@endsection