@extends('main.layouts.app')

@section('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">

    <style>
        .bootstrap-tagsinput {
            width: 100%;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            display: inline-block;
            padding: 4px 6px;
            color: #555;
            vertical-align: middle;
            border-radius: 4px;
            max-width: 100%;
            line-height: 22px;
            cursor: text;
        }

        .label {
            display: inline;
            padding: .2em .6em .3em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25em;
        }

        .label-info {
            background-color: #5bc0de;
        }
    </style>
@endsection

@section('content')

@include('main.posts.includes.show.cover')


<form action="{{ route('posts.update', $post->title) }}" method="post" class="p-5 bg-white">
    @method('PUT')
    @csrf
    <div class="row form-group">       
        <div class="col-md-4">
            <select class="form-control" onchange="getCities(this);">
                @foreach ($areas as $area)
                  <option value="{{ $area->name }}">{{ $area->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control" id="cities" onchange="getSubCities(this);"></select>
        </div>
        <div class="col-md-4">
            <select class="form-control" id="area_id" name="area_id" onchange="setMap(this);"></select>
        </div>
    </div>

    <div class="row form-group">       
        <div class="col-md-12">
            <input type="text" id="title" name="title" value="{{ $post->title }}" placeholder="إسم الإعلان" class="form-control">
        </div>
    </div>

    <div class="row form-group">       
        <div class="col-md-12">
          <textarea name="body" class="form-control" placeholder="وصف الإعلان" cols="30" rows="10">{{ $post->body }}</textarea>
        </div>
    </div>

    <div class="row form-group">       
        <div class="col-md-6">
            <select class="form-control" name="main_category" onchange="getChildren(this)">
                <option selected disabled>نوع التصنيف</option>
                @foreach ($mainCategories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <div class="select-wrap sub-category">
            </div>
        </div>
    </div>

    <div class="row form-group">       

        <div class="col-md-6">
            <div class="select-wrap sub-category-one">
            </div>
        </div>

        <div class="col-md-6">
            <div class="select-wrap sub-category-two">
            </div>
        </div>

    </div>

    <div class="row form-group">       
        <div class="col-md-6">
            <input type="text" name="services" class="bootstrap-tagsinput services" placeholder="الخدمات" data-role="tagsinput">
        </div>
        <div class="col-md-6">
            <input type="text" name="tags" class="bootstrap-tagsinput tags" placeholder="الوسوم" data-role="tagsinput">
        </div>
    </div>

    <div class="row form-group">       
        <div class="col-md-6">
          <input type="text" name="telephone1" value="{{ $post->telephone1 }}" placeholder="رقم الهاتف/الجوال 1" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="text-black" for="show_contact_telephone1">إظهار</label> 
            <input type="checkbox" name="show_contact_telephone1">
        </div>
    </div>

    <div class="row form-group">       
        <div class="col-md-6">
          <input type="text" name="telephone2" value="{{ $post->telephone2 }}" placeholder="رقم الهاتف/الجوال 2" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="text-black" for="show_contact_telephone2">إظهار</label> 
            <input type="checkbox" name="show_contact_telephone2">
        </div>
    </div>

    <div class="row form-group">       
        <div class="col-md-6">
          <input type="email" name="email" value="{{ $post->email }}" placeholder="البريد الإلكترونى" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="text-black" for="show_contact_email">إظهار</label> 
            <input type="checkbox" name="show_contact_email">
        </div>
    </div>


    <div class="row form-group">       
        <div class="col-md-6">
          <input type="number" name="price" value="{{ $post->price }}" placeholder="السعر" class="form-control">
        </div>
        <div class="col-md-6">
            <select name="price_sort" class="form-control">
                <option selected disabled>نوع السعر</option>
                @foreach ($priceSorts as $sort)
                    <option>{{ $sort }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row form-group">       
        <div class="col-md-6">
            <select name="ad_sort" class="form-control">
                <option selected disabled>نوع الإعلان</option>
                @foreach ($adSorts as $sort)
                    <option>{{ $sort }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <select name="payment_sort" class="form-control">
                <option selected disabled>نوع الدفع</option>
                @foreach ($paymentSorts as $sort)
                    <option>{{ $sort }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="post-estate-map" style="display:none;">   
        
        <div class="row form-group">       
            <div class="col-md-4">
                <select name="destination" class="form-control">
                    <option selected disabled>واجهة العقار</option>
                    @foreach ($destinations as $destination)
                        <option>{{ $destination }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <select name="sort" class="form-control">
                    <option selected disabled>نوع العقار</option>
                    @foreach ($sorts as $sort)
                        <option>{{ $sort }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <select name="contract" class="form-control">
                    <option selected disabled>نوع العقد</option>
                    @foreach ($contracts as $contract)
                        <option>{{ $contract }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <h1 class="text-center">مكان العقار على الخريطة</h1>
        <div id="map" style="height:550px;"></div>
        <input type="hidden" name="latlng" id="latlng" />
    </div>
    
    <button type="submit" class="btn btn-primary col-md-12">تـــــعـــــديــــــل</button>
</form>

@endsection

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <script>
         function getChildren(id)
      {
        axios.get(`../../category_children/${id.value}`)
        .then(function (response) {
            $('.sub-category').empty();
            $('.sub-category').append('<span class="icon"><span class="icon-keyboard_arrow_down"></span></span>');
            if(id.value != 1){
              $('.sub-category-one').empty();
              $('.sub-category-two').empty();
              $('.sub-category').append('<select class="form-control category-sub-category" name="category_id"></select>');
            }else{
              $('.sub-category').append('<select class="form-control category-sub-category" onchange="getSubChildren(this)"></select>');
            }

            if(id.value == 2){
                $('.post-estate-map').css("display", "block");
            }else{
                $('.post-estate-map').css("display", "none");
            }

            for (const subcategory of response.data) {
              $('.category-sub-category').append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>')
            }
      
          })
          .catch(function (error) {
            console.log(error);
          });
      }


      function getSubChildren(id)
      {
        axios.get(`../../category_children/${id.value}`)
        .then(function (response) {
            $('.sub-category-one').empty();
            $('.sub-category-one').append('<span class="icon"><span class="icon-keyboard_arrow_down"></span></span>');
            $('.sub-category-one').append('<select class="form-control category-sub-category-one" name="category_id"></select>');

            for (const subcategory of response.data) {
              $('.category-sub-category-one').append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>')
            }

            var d = new Date();
            var n = d.getFullYear();

            $('.sub-category-two').empty();
            $('.sub-category-two').append('<span class="icon"><span class="icon-keyboard_arrow_down"></span></span>');
            $('.sub-category-two').append('<select class="form-control category-sub-category-two" name="model"></select>');
            
            for (let i = 1960; i <= n; i++) {
                $('.category-sub-category-two').append('<option>'+i+'</option>')
            }
      
          })
          .catch(function (error) {
            console.log(error);
          });
      }

      function initMap(lat = null, lng = null) {
      if(lat == null){ var myLatLng = {lat: 24.774265, lng: 46.738586} } else{ var myLatLng = {lat, lng} } ;
    
      var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 13
      });
    
      var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!',
            draggable: true
      });
    
        google.maps.event.addListener(marker, 'dragend', function(marker) {
        var latLng = marker.latLng;
        document.getElementById('latlng').value = [latLng.lat(),latLng.lng()];
        });
        }


        function setMap(item)
        {
        let lat = $('option:selected', item).data("lat");
        let lng = $('option:selected', item).data("lng");
        initMap(Math.floor(lat), Math.floor(lng));
        }
    

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap&key=AIzaSyDqET1nIDZzMGEieGANkEF_xB1RSCkJTjk" async defer></script>

@endsection