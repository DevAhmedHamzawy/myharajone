@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4 class="text-center">إضافة مستخدم جديد</h4></div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                      
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for=""> اختر اسم الدولة <em>*</em></label>
                            </div>
                            <div class="col-md-10">
                                <select class="form-control selectOption required" onchange="getCities(this);" required>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->name }}">{{ $area->name }}</option>
                                    @endforeach
                                </select>											
                            </div>
                            <div class="col-md-2">
                                <label for=""> اختر اسم المنطقة <em>*</em></label>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control selectOption required" id="cities" onchange="getSubCities(this);" required>
                                    <option>اختر المنطقة</option>
                                   
                                </select>											
                            </div>
                            <div class="col-md-2">
                                <label for=""> اختر اسم المدينة  <em>*</em></label>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control selectOption required" name="area_id" id="area_id" onchange="setMap(this);" required>
                                    <option>اختر المدينة</option>
                                </select>													
                            </div>
                        </div>
                       

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">الإسم</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"   >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="mobile" class="col-md-2 col-form-label text-md-right">الجوال</label>
                        
                            <div class="col-md-10">
                                <input type="text" id="mobile"  class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">
                        
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">البريد الإلكترونى</label>
                        
                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="telephone" class="col-md-2 col-form-label text-md-right">الهاتف</label>
                        
                            <div class="col-md-10">
                                <input type="text" id="telephone"  class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone">
                        
                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="website" class="col-md-2 col-form-label text-md-right">الموقع الإلكترونى</label>
                        
                            <div class="col-md-10">
                                <input type="text" id="website" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" required autocomplete="website">
                        
                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">كلمة المرور</label>

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <h1 class="text-center">مكان العقار على الخريطة</h1>
                        <div id="map"></div>
                        <input type="hidden" name="latlng" id="latlng" />


                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-primary col-md-12">
                                إضافة مستخدم جديد
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer')
    <script>
      




        function getCities(item){
    axios.get('../../../areas/'+item.value)
        .then((data) => {
           $('#cities').empty()
           for(city of data.data){
           $('#cities').append('<option value="'+city.name+'" data-lat="'+city.latitude+'" data-lng="'+city.longitude+'">'+city.name+'</option>')
           }  
        })
    }


function getSubCities(item){
    initMap(item.lat,item.lng)
    axios.get('../../../areas/'+item.value)
        .then((data) => {
           $('#area_id').empty()
           for(subcity of data.data){
           $('#area_id').append('<option value="'+subcity.id+'" data-lat="'+subcity.latitude+'" data-lng="'+subcity.longitude+'">'+subcity.name+'</option>')
           }  
        })
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