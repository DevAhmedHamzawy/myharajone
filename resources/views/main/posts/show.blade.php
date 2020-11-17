@extends('main.layouts.app')

@section('header')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        ul{
            list-style-type: none;
            display: inline;
        }
        ul li{
            display: inline-block;
            padding-left: 6.8em;
        }
        ul li .fa{
            font-size: 2em;
        }

        .bookmark span{
            font-size: 3em;
        }

        .the-likes span{
            font-size: 1.5em;
        }
    </style>
@endsection

@section('content')

  @include('main.posts.includes.show.cover')

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">

          <figure>
            <img src="{{ $post->main_img_path }}" width="500" height="150" alt="Image" class="img-fluid">
            <figcaption>{{ $post->title }}</figcaption>
          </figure>


          <h3><a href="{{ route('posts.show', $post->title) }}">{{ $post->title }}</a></h3>

          <div class="lh-content">
            <div class="row">
                <div class="col-md-3"><p>{{ $post->code }}</p></div>
                <div class="col-md-3"><span class="category">{{ $post->category->name }}</span></div>
                <div class="col-md-3"><span class="icon-eye"></span>{{ count($post->views) }}</div>
                <div class="col-md-3"><span class="icon-attach_money"></span>{{ number_format($post->price, 2, '.', '') }}</div>
            </div>
            
            <div class="row">
                <div class="col-md-4"><p style="font-size:12px;font-weight:bold;"><span class="icon-flag-o"></span> &nbsp; {{ $post->ad_sort }} &nbsp;</p></div>
                <div class="col-md-4"><p style="font-size:12px;font-weight:bold;"><span class="icon-hand-o-left"></span> &nbsp; {{ $post->price_sort }} &nbsp;</p></div>
                <div class="col-md-4"><p style="font-size:12px;font-weight:bold;"><span class="icon-money"></span> &nbsp; {{ $post->payment_sort }} &nbsp;</p></div>
            </div>  
            <hr>
         
            <div class="row">
                <div class="col-md-6"><p style="font-size:16px;"><span class="icon-user"></span>{{ $post->user->name }}</p></div>
                <div class="col-md-6"><address style="font-size:13.5px;font-weight:bold;"><span class="icon-room"></span>{{ $post->area->name }}, {{ $post->areaName[0] }},  {{ $post->areaName[1] }}</address></div>
            </div>
           
            <div class="row">
                <div class="col-md-4"><span class="icon-clock-o"></span>{{ $post->create_at }}</div>
                <div class="col-md-4"><span class="icon-clock-o"></span>{{ $post->update_at }}</div>
                <div class="row col-md-4 the-likes">
                    <span class="icon-thumbs-o-up" onclick="like()"></span> &nbsp;&nbsp; <div id="likes">{{ count($post->likes) }}</div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="icon-thumbs-o-down" onclick="dislike()"></span> &nbsp;&nbsp; <div id="dislikes">{{ count($post->dislikes) }}</div>
                </div>
            </div>       
            <hr>
        </div>

          {{ $post->body }}


          


          <div class="row">
            <a href="javascript:void(0)" onclick="favourite()" id="favouriting" class="bookmark col-md-6 text-center">
                <span class="{{ $post->favourite ? "icon-heart" : "icon-heart-o" }}"></span>
            </a>
            <a href="javascript:void(0)" class="report bookmark col-md-6 text-center"><span class="icon-report" onclick="reportPost()"></span></a>
          </div>
          <hr>
          {!! Share::currentPage()->facebook()->twitter()->linkedin()->whatsapp()->telegram() !!}

          @include('main.posts.includes.show.comments')

        </div>


        @include('main.posts.includes.show.side')

      </div>
    </div>
  </div>


  @include('main.posts.includes.show.messages')

  @include('main.welcome.golden_ads')

@endsection


@section('footer')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{ asset('js/share.js') }}"></script>

<script>

function reportPost(){
            @auth
                let report = {
                    post_id: {!! $post->id !!},
                }
            axios.post('../../reportpost', report)
                .then((data) => {

                    
                        $('.report').append('<div class="alert alert-success mt-3" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>تم الإبلاغ عن الإعلان .... إدارة الموقع ستراجع البلاغ المقدم!</div></div>');
                        setTimeout(() => {
                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove() 
                            });
                        }, 2000);
                    
                }).catch((error) => {

                })
            @endauth
            @guest
                swalMessageIfUnauthenticated();
             @endguest
            }



  window.form_data = new FormData();

function sendComment(){
    form_data.append('post_id', {!! $post->id !!})
    form_data.append('name', $("#name").val())
    form_data.append('email', $("#email").val())
    form_data.append('website', $("#website").val())
    form_data.append('body', $("#body").val())

    axios.post('../../sendcomment', form_data)
                .then((data) => {

                    $("#name").val('');
                    $("#email").val('');
                    $("#website").val('');
                    $("#body").val('');

                    $("#name").removeClass('is-invalid');
                    $("#email").removeClass('is-invalid');
                    $("#website").removeClass('is-invalid');
                    $("#body").removeClass('is-invalid');

                    $('#name-comment-error').empty();
                    $('#body-comment-error').empty();
                    $('#website-comment-error').empty();
                    $('#email-comment-error').empty();


                    $('.comment-list').append('<li class="comment"><div class="vcard"><img src="https://www.gravatar.com/avatar" alt="Image placeholder"></div><div class="comment-body"><h3>'+data.data.name+'</h3><div class="meta">الان</div><p>'+data.data.body+'</p><p><a href="#" class="reply rounded">Reply</a></p></div>')
                    
                }).catch((error) => {

                    $('#name-comment-error').empty();
                    $('#body-comment-error').empty();
                    $('#website-comment-error').empty();
                    $('#email-comment-error').empty();

                   
                if(error.response.data.errors.name){
                    $('#name-comment-error').append('<strong>'+error.response.data.errors.name+'</strong>');
                    $('#name').addClass('is-invalid')
                }
                if(error.response.data.errors.email){
                    $('#email-comment-error').append('<strong>'+error.response.data.errors.email+'</strong>');
                    $('#email').addClass('is-invalid')
                }
                if(error.response.data.errors.website){
                    $('#website-comment-error').append('<strong>'+error.response.data.errors.website+'</strong>');
                    $('#website').addClass('is-invalid')
                }
                if(error.response.data.errors.body){
                    $('#body-comment-error').append('<strong>'+error.response.data.errors.body+'</strong>');
                    $('#body').addClass('is-invalid')
                }
                });

}

 
 






  window.form_data = new FormData();

function sendMessage(){
    form_data.append('post_id', {!! $post->id !!})
    form_data.append('name', $("#name-message").val())
    form_data.append('email', $("#email-message").val())
    form_data.append('mobile', $("#mobile-message").val())
    form_data.append('body', $("#body-message").val())
    form_data.append('to', $("#to").val())

    axios.post('../../sendmessage', form_data)
                .then((data) => {

                    $("#name-message").val('');
                    $("#email-message").val('');
                    $("#mobile-message").val('');
                    $("#body-message").val('');
                    $("#to").val(''),


                    $("#name-message").removeClass('is-invalid');
                    $("#email-message").removeClass('is-invalid');
                    $("#mobile-message").removeClass('is-invalid');
                    $("#body-message").removeClass('is-invalid');

                    $('#name-message-error').empty();
                    $('#body-message-error').empty();
                    $('#mobile-message-error').empty();
                    $('#email-message-error').empty();


                    $('#success-message').append('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>تم الإرسال!</strong> الرسالة قد تم إرسالها بنجاح!</div></div>');
                    setTimeout(() => {
                        $(".alert").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove() 
                        });
                    }, 2000);                    
                }).catch((error) => {

                    $('#name-message-error').empty();
                    $('#body-message-error').empty();
                    $('#mobile-message-error').empty();
                    $('#email-message-error').empty();

                   
                if(error.response.data.errors.name){
                    $('#name-message-error').append('<strong>'+error.response.data.errors.name+'</strong>');
                    $('#name-message').addClass('is-invalid')
                }
                if(error.response.data.errors.email){
                    $('#email-message-error').append('<strong>'+error.response.data.errors.email+'</strong>');
                    $('#email-message').addClass('is-invalid')
                }
                if(error.response.data.errors.mobile){
                    $('#mobile-message-error').append('<strong>'+error.response.data.errors.mobile+'</strong>');
                    $('#mobile-message').addClass('is-invalid')
                }
                if(error.response.data.errors.body){
                    $('#body-message-error').append('<strong>'+error.response.data.errors.body+'</strong>');
                    $('#body-message').addClass('is-invalid')
                }
                });

}

 
function like(){
            @guest
                swalMessageIfUnauthenticated();
             @endguest
             @auth
            axios.post('../../check', {post_id: {!! $post->id !!}})
                .then((data) => {
                    if(data.data.length == 0){ window.checkuserlike = 0; }else{ window.checkuserlike = 1; }
                    axios.post('../../like', {post_id: {!! $post->id !!}})
                    .then((data) => {
                        $('#likes').html(parseInt($('#likes').html(), 10)+1)
                        if(checkuserlike != 0){
                            $('#dislikes').html(parseInt($('#dislikes').html(), 10)-1)
                        }
                    })
                })
                @endauth
           
        }


        function dislike(){
            @guest
                swalMessageIfUnauthenticated();
             @endguest
             @auth
            axios.post('../../check', {post_id: {!! $post->id !!}})
                .then((data) => {
                    if(data.data.length == 0){ window.checkuserdislike = 0; }else{ window.checkuserdislike = 1; }
                    axios.post('../../dislike', {post_id: {!! $post->id !!}})
                    .then((data) => {
                        $('#dislikes').html(parseInt($('#dislikes').html(), 10)+1)
                        if(checkuserdislike != 0){
                            $('#likes').html(parseInt($('#dislikes').html(), 10)-1)
                        }
                    })
                })
                @endauth
        }

        function favourite()
        {
            @guest
                swalMessageIfUnauthenticated();
             @endguest
             @auth
            axios.post('../../favourites', {post_id: {!! $post->id !!}})
                .then((data) => {
                    console.log(data.data)
                    if(data.data == 1){
                        $('#favouriting').empty() 
                        $('#favouriting').append('<i class="icon-heart-o"></i>')
                    }else{
                        $('#favouriting').empty() 
                        $('#favouriting').append('<i class="icon-heart"></i>')
                    }
                })   
                @endauth
        }

        function swalMessageIfUnauthenticated()
        {
            Swal.fire({
                    icon: 'error',
                    position: 'center',
                    type: 'error',
                    title: "تنبيه",
                    html:
                    '<h5>الرجاء تسجيل الدخول أو الإنضمام للموقع</h5> <br/>' +
                    '<a class="btn btn-info" href="{{ route("login") }}">دخول الموقع</a> ' +
                    '<a class="btn btn-info" href="{{ route("register") }}">الإنضمام للموقع</a> ' +
                    '<a class="btn btn-info" onclick="swal.closeModal(); return false;">شكراً ... ربما لاحقاً</a> ',
                    showConfirmButton: false,
                   
                })
        }
 </script>
@endsection