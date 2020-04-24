@extends('main.layouts.app')

@section('content')


  <div class="site-section">
    <div class="container">
      <div class="row">
        @include('main.posts.includes.index.side')

        <div class="col-lg-8">

          <div class="posts-listings">

            <div class="row align-items-stretch no-gutters mb-3">

                @foreach ($mainCategories as $categorylist)
                <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-3">
                  <a href="{{ route('categories.show', $categorylist->name) }}" class="popular-category h-100">
                    <span class="icon"><span class="{{ $categorylist->icon }}"></span></span>
                    <span class="caption mb-2 d-block">{{ $categorylist->name }}</span>
                    <span class="number">{{ count($categorylist->views) }}</span>
                  </a>
                </div>
                @endforeach
                
            </div>

            


            <div class="row text-left trending-search mb-3" data-aos="fade-up"  data-aos-delay="300">
              <div class="col-12">
                @foreach ($childrenCategories as $categorylist)
                  <a href="{{ route('categories.show', $categorylist->name) }}" style="color:#000;border:1px solid #4d4d4d;">{{ $categorylist->name }}</a>
                @endforeach
              </div>
            </div>


            @if ($category->parent_id != null && $childrenCategoriesOfCategory != null)
                
            <div class="row text-left trending-search mb-3" data-aos="fade-up"  data-aos-delay="300">
              <div class="col-12">
                
                @forelse ($childrenCategoriesOfCategory as $categorylist)
                  <a href="{{ route('categories.show', $categorylist->name) }}" style="color:#000;border:1px solid #4d4d4d;">{{ $categorylist->name }}</a>
                @empty
                @endforelse
              </div>
            </div>
            @endif
            

            @include('main.posts.includes.index.posts')
          </div>

        </div>

      </div>
    </div>
  </div>

  
@endsection


@section('footer')
    <script>

      function search(){

         let filters = 
         { 
           'area_id' : $('#area_id').val(),
           'category_id' : $('#category_id').val(),
           'title' : $('#title').val(), 
           'price' : $('#price').val(),
           'price_sort' : $('#price_sort').val(),
           'ad_sort' : $('#ad_sort').val(),
           'payment_sort' : $('#payment_sort').val(),
           'model' : $('#model').val(),
           'destination' : $('#destination').val(),
           'sort' : $('#sort').val(),
           'contract' : $('#contract').val(),
          };

          axios.post('../search', filters)
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
            $('.category-sub-category').val('');
            $('.sub-category').append('<span class="icon"><span class="icon-keyboard_arrow_down"></span></span>');
            if(id.value != 1){
              $('.sub-category-one').empty();
              $('.sub-category-two').empty();
              $('.sub-category').append('<select class="form-control category-sub-category" id="category_id" onchange="search()"></select>');
            }else{
              $('.sub-category').append('<select class="form-control category-sub-category" onchange="getSubChildren(this)"></select>');
            }


            if(id.value == 2){
                $('.estates-posts-filter-show').css("display", "block");

            }else{
                $('.estates-posts-filter-show').css("display", "none");
                $("#destination").val('');
                $("#sort").val('');
                $("#contract").val('');

            }


            $('.category-sub-category').append('<option value="">التصنيف</option>');
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
            $('.sub-category-one').append('<select class="form-control category-sub-category-one" id="category_id" onchange="search()"></select>');

            for (const subcategory of response.data) {
              $('.category-sub-category-one').append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>')
            }

            var d = new Date();
            var n = d.getFullYear();

            $('.sub-category-two').empty();
            $('.sub-category-two').append('<span class="icon"><span class="icon-keyboard_arrow_down"></span></span>');
            $('.sub-category-two').append('<select class="form-control category-sub-category-two" id="model" onchange="search()"></select>');
            
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