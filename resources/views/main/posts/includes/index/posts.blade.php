<div class="row posts-listings">

    @forelse ($posts as $post)
    <div class="col-lg-6">
      
        <div class="d-block d-md-flex listing vertical">
          <a href="{{ route('posts.show', $post->title) }}" class="img d-block" style="background-image: url('images/img_1.jpg')"></a>
          <div class="lh-content">
            <span class="category">{{ $post->category->name }}</span>
            <a href="#" class="bookmark"><span class="icon-heart"></span></a>
            <h3><a href="{{ route('posts.show', $post->title) }}">{{ $post->title }}</a></h3>
            <p>مشاهدات: {{ $views }}, {{ $post->ad_sort }} , {{ $post->price_sort }} , {{ $post->payment_sort }}</p>
            <p>{{ number_format($post->price, 2, '.', '') }}</p>
            <p>{{ $post->user->name }}</p>
            <p>{{ $post->create_at }}</p>
            <address>{{ $post->area->name }}, {{ $post->areaName[0] }},  {{ $post->areaName[1] }}</address>
            
          </div>
        </div>

      </div>
    @empty
        لا يوجد إعلانات
    @endforelse
    
  
  </div>

  <div class="col-12 mt-5 text-center">عرض المزيد</div>