@extends('main.layouts.app')

@section('content')
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">

        <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
          
          
          <div class="row justify-content-center mt-5">
            <div class="col-md-8 text-center">
              <h1>Ads Listings</h1>
              <p class="mb-0">Choose product you want</p>
            </div>
          </div>

          
        </div>
      </div>
    </div>
  </div>  

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">

          @include('main.posts.includes.index.posts')

        </div>
        @include('main.posts.includes.index.side')

      </div>
    </div>
  </div>

  @include('main.posts.includes.index.trending_today')
  
  @include('main.posts.includes.index.testimonials')
@endsection


@section('footer')
    <script>

      function search(){
          axios.post('../search', { 'title' : $('#title').val(), 'category' : $('#category').val() })
          .then(function (response) {
            //console.log(response);
            $('.posts-listings').html(response.data.html);

          })
          .catch(function (error) {
            console.log(error);
          });
      }

      function getChildren(id)
      {
        axios.get(`../category_children/${id.value}`)
        .then(function (response) {
            $('.sub-category').empty();
            $('.sub-category').append('<span class="icon"><span class="icon-keyboard_arrow_down"></span></span>');
            if(id.value != 1){
              $('.sub-category-one').empty();
              $('.sub-category-two').empty();
              $('.sub-category').append('<select class="form-control category-sub-category" onchange="search()"></select>');
            }else{
              $('.sub-category').append('<select class="form-control category-sub-category" onchange="getSubChildren(this)"></select>');
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
        axios.get(`../category_children/${id.value}`)
        .then(function (response) {
            $('.sub-category-one').empty();
            $('.sub-category-one').append('<span class="icon"><span class="icon-keyboard_arrow_down"></span></span>');
            $('.sub-category-one').append('<select class="form-control category-sub-category-one" onchange="search()"></select>');

            for (const subcategory of response.data) {
              $('.category-sub-category-one').append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>')
            }

            var d = new Date();
            var n = d.getFullYear();

            $('.sub-category-two').empty();
            $('.sub-category-two').append('<span class="icon"><span class="icon-keyboard_arrow_down"></span></span>');
            $('.sub-category-two').append('<select class="form-control category-sub-category-two" onchange="search()"></select>');
            
            for (let i = 1960; i <= n; i++) {
                $('.category-sub-category-two').append('<option>'+i+'</option>')
            }
      
          })
          .catch(function (error) {
            console.log(error);
          });
      }

      
    </script>
@endsection