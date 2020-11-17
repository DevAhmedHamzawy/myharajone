<div class="site-section bg-light">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-7 text-left border-primary">
          <h2 class="font-weight-light text-primary">الإعلانات الذهبية</h2>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-lg-6">

          @php $i = 0 @endphp
          @foreach ($trendingPosts as $post)
          @if ($i % 2 != 0)
              
          <div class="d-block d-md-flex listing">
            <a href="{{ route('posts.show', $post->title) }}" class="img d-block" style="background-image: url({{ $post->main_img_path }})"></a>
            <div class="lh-content">
              <span class="category"><a href="{{ route('categories.show', $post->category->name) }}" style="color: #000">{{ $post->category->name }}</a></span>
              <span class="icon-eye"></span>{{ $post->views }}
              <span class="icon-attach_money"></span>{{ number_format($post->price, 2, '.', '') }}
              <p style="font-size:11px;font-weight:bold;"><span class="icon-flag-o"></span> &nbsp; {{ $post->ad_sort }} &nbsp; <span class="icon-hand-o-left"></span> &nbsp; {{ $post->price_sort }} &nbsp; <span class="icon-money"></span> &nbsp; {{ $post->payment_sort }}</p>
              <h3><a href="{{ route('posts.show', $post->title) }}">{{ $post->title }}</a></h3>
              <p style="font-size:15px;"><span class="icon-user"></span>{{ $post->user->name }}</p>
              <p style="font-size:15px;"><span class="icon-clock-o"></span>{{ $post->create_at }}</p>
              <address style="font-size:13.5px;font-weight:bold;"><span class="icon-room"></span>{{ $post->area->name }}, {{ $post->areaName[0] }},  {{ $post->areaName[1] }}</address>    
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
            <a href="{{ route('posts.show', $post->title) }}" class="img d-block" style="background-image: url({{ $post->main_img_path }})"></a>
            <div class="lh-content">
              <span class="category"><a href="{{ route('categories.show', $post->category->name) }}" style="color: #000">{{ $post->category->name }}</a></span>
              <span class="icon-eye"></span>{{ $post->views }}
              <span class="icon-attach_money"></span>{{ number_format($post->price, 2, '.', '') }}
              <p style="font-size:11px;font-weight:bold;"><span class="icon-flag-o"></span> &nbsp; {{ $post->ad_sort }} &nbsp; <span class="icon-hand-o-left"></span> &nbsp; {{ $post->price_sort }} &nbsp; <span class="icon-money"></span> &nbsp; {{ $post->payment_sort }}</p>
              <h3><a href="{{ route('posts.show', $post->title) }}">{{ $post->title }}</a></h3>
              <p style="font-size:15px;"><span class="icon-user"></span>{{ $post->user->name }}</p>
              <p style="font-size:15px;"><span class="icon-clock-o"></span>{{ $post->create_at }}</p>
              <address style="font-size:13.5px;font-weight:bold;"><span class="icon-room"></span>{{ $post->area->name }}, {{ $post->areaName[0] }},  {{ $post->areaName[1] }}</address>    
            </div>
          </div>
          @endif
          @php $i++ @endphp

          @endforeach

        </div>
      </div>
    </div>
  </div>