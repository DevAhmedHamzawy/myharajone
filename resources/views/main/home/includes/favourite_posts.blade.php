

<div class="container">

    <h1 class="text-center">إعلاناتى المفضلة</h1>

    <div class="row">

   
@foreach (auth()->user()->favourites as $favourite)
<div class="col-lg-6">
    <div class="d-block d-md-flex listing vertical">
        <a href="{{ route('posts.show', $favourite->post->title) }}" class="img d-block" style="background-image: url({{ $favourite->post->main_img_path }})"></a>
        <div class="lh-content">
          <span class="category">{{ $favourite->post->category->name }}</span>
          <span class="icon-eye"></span>{{ count($favourite->post->views) }}
          <span class="icon-attach_money"></span>{{ number_format($favourite->post->price, 2, '.', '') }}
          <p style="font-size:12px;font-weight:bold;"><span class="icon-flag-o"></span> &nbsp; {{ $favourite->post->ad_sort }} &nbsp; <span class="icon-hand-o-left"></span> &nbsp; {{ $favourite->post->price_sort }} &nbsp; <span class="icon-money"></span> &nbsp; {{ $favourite->post->payment_sort }}</p>
          <h3><a href="{{ route('posts.show', $favourite->post->title) }}">{{ $favourite->post->title }}</a></h3>
          <p style="font-size:16px;"><span class="icon-user"></span>{{ $favourite->post->user->name }}</p>
          <p style="font-size:16px;"><span class="icon-clock-o"></span>{{ $favourite->post->create_at }}</p>
          <address style="font-size:13.5px;font-weight:bold;"><span class="icon-room"></span>{{ $favourite->post->area->name }}, {{ $favourite->post->areaName[0] }},  {{ $favourite->post->areaName[1] }}</address>    
        </div>
    </div>
</div>
@endforeach

</div>
</div>