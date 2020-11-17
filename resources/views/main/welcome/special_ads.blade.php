<div class="site-section bg-light">
    <div class="container">
      
      
      <div class="row">
        <div class="col-12">
          <h2 class="h5 mb-4 text-black">الإعلانات المميزة</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-12  block-13">
          <div class="owl-carousel nonloop-block-13">
            
            @foreach ($trendingPosts as $post)
                
            <div class="d-block d-md-flex listing vertical">
              <a href="{{ route('posts.show', $post->title) }}" class="img d-block" style="background-image: url({{ $post->main_img_path }})"></a>
              <div class="lh-content">
                <span class="category"><a href="{{ route('categories.show', $post->category->name) }}" style="color: #000">{{ $post->category->name }}</a></span>
                <span class="icon-eye"></span>{{ $post->views }}
                <span class="icon-attach_money"></span>{{ number_format($post->price, 2, '.', '') }}
                <p style="font-size:9px;font-weight:bold;"><span class="icon-flag-o"></span> &nbsp; {{ $post->ad_sort }} &nbsp; <span class="icon-hand-o-left"></span> &nbsp; {{ $post->price_sort }} &nbsp; <span class="icon-money"></span> &nbsp; {{ $post->payment_sort }}</p>
                <h3><a href="{{ route('posts.show', $post->title) }}">{{ $post->title }}</a></h3>
                <p style="font-size:13px;"><span class="icon-user"></span><a href="{{ route('user.profile', $post->user->name) }}" color="#000">{{ $post->user->name }}</a></p>
                <p style="font-size:13px;"><span class="icon-clock-o"></span>{{ $post->create_at }}</p>
                <address style="font-size:11.5px;font-weight:bold;"><span class="icon-room"></span>{{ $post->area->name }}, {{ $post->areaName[0] }},  {{ $post->areaName[1] }}</address>    
              </div>
            </div>

            @endforeach


         

          </div>
        </div>


      </div>
    </div>
  </div>