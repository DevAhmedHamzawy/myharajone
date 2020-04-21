@extends('main.layouts.app')

@section('content')

@include('main.posts.includes.show.cover')

<h1>القائمة السوداء</h1>

<form class="p-5 bg-white">
    @csrf

    <div class="row form-group">       
        <div class="col-md-6">
          <input type="text" id="blacklist" name="blacklist" placeholder="ابحث عن إسم المستخدم / رقم هاتف المستخدم / كود الإعلان" class="form-control">
        </div>
    </div>

    <button onclick="getBlacklist();return false;" class="btn btn-primary col-md-12">إضـــــــافـــــة</button>

</form>

@endsection

@section('footer')
    <script>
        function getBlacklist()
        {
          axios.post(`../blacklist`, { 'blacklist' : $('#blacklist').val() })
          .then(function (response) {
              //alert(response.data);
          }).catch(function (error) {
            console.log(error);
          });
        }
    </script>
@endsection