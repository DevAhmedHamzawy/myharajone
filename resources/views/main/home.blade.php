@extends('main.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    {{ auth()->user()->name }}
                </div>
            </div>
        </div>
    </div>
</div>


@foreach (auth()->user()->posts as $post)
<div class="d-block d-md-flex listing">
    <a href="{{ route('posts.show', $post->title) }}" class="img d-block" style="background-image: url('images/img_1.jpg')"></a>
      <div class="lh-content">
        <span class="category">{{ $post->category->name }}</span>
        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
        <h3><a href="{{ route('posts.show', $post->title) }}">{{ $post->title }}</a></h3>
        <p>مشاهدات: {{ count($post->views) }}, {{ $post->ad_sort }} , {{ $post->price_sort }} , {{ $post->payment_sort }}</p>
        <p>{{ number_format($post->price, 2, '.', '') }}</p>
       
        <p>{{ $post->create_at }}</p>
        <address>{{ $post->area->name }}</address>    
      </div>
  </div>
@endforeach


@foreach (auth()->user()->favourites as $favourite)
<div class="d-block d-md-flex listing">
    <a href="{{ route('posts.show', $favourite->post->title) }}" class="img d-block" style="background-image: url('images/img_1.jpg')"></a>
      <div class="lh-content">
        <span class="category">{{ $favourite->post->category->name }}</span>
        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
        <h3><a href="{{ route('posts.show', $favourite->post->title) }}">{{ $favourite->post->title }}</a></h3>
        <p>مشاهدات: {{ count($favourite->post->views) }}, {{ $favourite->post->ad_sort }} , {{ $favourite->post->price_sort }} , {{ $favourite->post->payment_sort }}</p>
        <p>{{ number_format($favourite->post->price, 2, '.', '') }}</p>
       
        <p>{{ $favourite->post->create_at }}</p>
        <address>{{ $favourite->post->area->name }}</address>    
      </div>
  </div>
@endforeach


@endsection
