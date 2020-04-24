@extends('main.layouts.app')

@section('header')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    
@endsection

@section('content')

<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                            <h5>
                                {{ $user->name }}
                            </h5>
                            <h6>
                                إضافة رتبة هنا
                            </h6>
                            <p class="proile-rating">الجودة : <span>8/10</span></p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                   
                    <a href="">إرسال رسالة</a><br/>
                    <div class="row col-md-4 the-likes">
                        <span class="icon-thumbs-o-up" onclick="like()"></span> &nbsp;&nbsp; <div id="likes">{{ count($user->likes) }}</div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="icon-thumbs-o-down" onclick="dislike()"></span> &nbsp;&nbsp; <div id="dislikes">{{ count($user->dislikes) }}</div>
                    </div>

                    <div class="row">
                        <a href="javascript:void(0)" onclick="favourite()" id="favouriting" class="bookmark col-md-6 text-center">
                            <span class="{{ $user->favourite ? "icon-heart" : "icon-heart-o" }}"></span>
                        </a>
                        <a href="javascript:void(0)" class="report bookmark col-md-6 text-center"><span class="icon-report" onclick="reportPost()"></span></a>
                    </div>

                    {!! Share::currentPage()->facebook()->twitter()->linkedin()->whatsapp()->telegram() !!}

                   
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>كود</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->profile->code }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>الإسم</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>البريد الإلكترونى</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->profile->email }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>الهاتف</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->profile->telephone }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>الجوال</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->profile->mobile }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>الموقع الإلكترونى</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->profile->website }}</p>
                                    </div>
                                </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                        <div class="row">

                            @forelse ($user->posts as $post)
                            <div class="col-lg-6">
                              
                              <div class="d-block d-md-flex listing vertical">
                                <a href="{{ route('posts.show', $post->title) }}" class="img d-block" style="background-image: url({{ $post->main_img_path }})"></a>
                                <div class="lh-content">
                                  <span class="category">{{ $post->category->name }}</span>
                                  <span class="icon-eye"></span>{{ $post->views }}
                                  <span class="icon-attach_money"></span>{{ number_format($post->price, 2, '.', '') }}
                                  <p style="font-size:12px;font-weight:bold;"><span class="icon-flag-o"></span> &nbsp; {{ $post->ad_sort }} &nbsp; <span class="icon-hand-o-left"></span> &nbsp; {{ $post->price_sort }} &nbsp; <span class="icon-money"></span> &nbsp; {{ $post->payment_sort }}</p>
                                  <h3><a href="{{ route('posts.show', $post->title) }}">{{ $post->title }}</a></h3>
                                  <p style="font-size:16px;"><span class="icon-user"></span>{{ $post->user->name }}</p>
                                  <p style="font-size:16px;"><span class="icon-clock-o"></span>{{ $post->create_at }}</p>
                                  <address style="font-size:13.5px;font-weight:bold;"><span class="icon-room"></span>{{ $post->area->name }}, {{ $post->areaName[0] }},  {{ $post->areaName[1] }}</address>    
                                </div>
                              </div>
                        
                              </div>
                            @empty
                                لا يوجد إعلانات
                            @endforelse
                            
                          
                          </div>
                            
                    </div>
                </div>
            </div>
        </div>
    </form>           
</div>

@endsection


@section('footer')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{ asset('js/share.js') }}"></script>

    <script>
        function reportPost(){
            @auth
                let report = {
                    seller_id: {!! $user->id !!},
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

function sendMessage(){
    form_data.append('seller_id', {!! $user->id !!})
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
            axios.post('../../check', {seller_id: {!! $user->id !!}})
                .then((data) => {
                    if(data.data.length == 0){ window.checkuserlike = 0; }else{ window.checkuserlike = 1; }
                    axios.post('../../like', {seller_id: {!! $user->id !!}})
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
            axios.post('../../check', {seller_id: {!! $user->id !!}})
                .then((data) => {
                    if(data.data.length == 0){ window.checkuserdislike = 0; }else{ window.checkuserdislike = 1; }
                    axios.post('../../dislike', {seller_id: {!! $user->id !!}})
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
            axios.post('../../favourites', {seller_id: {!! $user->id !!}})
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