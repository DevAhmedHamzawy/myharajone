@extends('main.layouts.app')

@section('header')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    
@endsection

@section('content')

<div class="container emp-profile">
    <form method="post">
        <div class="row">
           @include('main.profile.includes.head')
        </div>
        <div class="row">
            @include('main.profile.includes.side')
            @include('main.profile.includes.info')
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