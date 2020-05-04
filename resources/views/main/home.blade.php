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

<div class="container">

    <h1 class="text-center">إعلاناتى</h1>
<div class="row">

@foreach (auth()->user()->posts as $post)
<div class="col-lg-6">
    <div class="d-block d-md-flex listing">
        <a href="{{ route('posts.show', $post->title) }}" class="img d-block" style="background-image: url({{ $post->main_img_path }})"></a>
        <div class="lh-content">
          <span class="category">{{ $post->category->name }}</span>
          <span class="icon-eye"></span>{{ count($post->views) }}
          <span class="icon-attach_money"></span>{{ number_format($post->price, 2, '.', '') }}
          <p style="font-size:12px;font-weight:bold;"><span class="icon-flag-o"></span> &nbsp; {{ $post->ad_sort }} &nbsp; <span class="icon-hand-o-left"></span> &nbsp; {{ $post->price_sort }} &nbsp; <span class="icon-money"></span> &nbsp; {{ $post->payment_sort }}</p>
          <h3><a href="{{ route('posts.show', $post->title) }}">{{ $post->title }}</a></h3>
          <p style="font-size:16px;"><span class="icon-user"></span>{{ $post->user->name }}</p>
          <p style="font-size:16px;"><span class="icon-clock-o"></span>{{ $post->create_at }}</p>
          <address style="font-size:13.5px;font-weight:bold;"><span class="icon-room"></span>{{ $post->area->name }}, {{ $post->areaName[0] }},  {{ $post->areaName[1] }}</address>    
        </div>
    </div>
</div>
@endforeach

</div>

</div>


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


<div class="container">
    <div class="text-center">العـــضـــويـــة</div>
    @if(auth()->user()->premium)
        {{ auth()->user()->premium->ended == 1 ? 'العضوية إنتهت .... رجاء التجديد' : auth()->user()->premium }}
    @else
        لم تقم بتسجيل عضوية
        <button class="col-md-12 btn btn-primary"><a href="{{ route('userpremiums.create') }}">تـــســـجـــيـــل الـــعـــضـــويــــــة</a></button>
    @endif
</div>


@endsection
