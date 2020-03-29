@extends('main.layouts.app')

@section('content')

  @include('main.posts.includes.cover')

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">

          <figure>
            <img src="images/img_2.jpg" alt="Image" class="img-fluid">
            <figcaption>{{ $post->title }}</figcaption>
          </figure>


          <h3><a href="{{ route('posts.show', $post->title) }}">{{ $post->title }}</a></h3>

          <div class="lh-content">
            <p>{{ $post->code }}</p>
            <span class="category">{{ $post->category->name }}</span>
            <a href="#" class="bookmark"><span class="icon-heart"></span></a>
            <p>مشاهدات: {{ $views }}, {{ $post->ad_sort }} , {{ $post->price_sort }} , {{ $post->payment_sort }}</p>
            <p>{{ number_format($post->price, 2, '.', '') }}</p>
            <p>{{ $post->user->name }}</p>
            <p>{{ $post->create_at }}</p>
            <p>{{ $post->update_at }}</p>
            <address>{{ $post->area->name }}, {{ $post->areaName[0] }},  {{ $post->areaName[1] }}</address>
            
          </div>

          {{ $post->body }}


          <div class="pt-5">
            <p>الخدمات: 
                @foreach ($post->allServices as $service)
                    <a href="#">#{{ $service }}</a>
                @endforeach
            </p>

            <p>الوسوم: 
                @foreach ($post->allTags as $tag)
                    <a href="#">#{{ $tag }}</a>
                @endforeach
            </p>

          </div>


          @include('main.posts.includes.comments')

        </div>


        @include('main.posts.includes.side')

      </div>
    </div>
  </div>
@endsection