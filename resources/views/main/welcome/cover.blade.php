<div class="site-blocks-cover overlay" style="background-image: url('{{ url('storage/settings/cover/home.jpg')}}'); " data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">

        <div class="col-md-12">
          
          
          <div class="row justify-content-center mb-4">
            <div class="col-md-8 text-center" style="margin-top:80px;">
              <h1 class="" data-aos="fade-up">مرحباً بكم فى إعلاناتك</h1>
              <p data-aos="fade-up" data-aos-delay="100">منتجات مميزة ، لعملاء مميزون</p>
            </div>
          </div>

          <div class="form-search-wrap mb-3" data-aos="fade-up" data-aos-delay="200">
            <form method="post" action="{{ route('welcome-search') }}">
              @csrf
              <div class="row align-items-center">
                <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                  <input type="text" name="title" class="form-control rounded" placeholder="عن ماذا تبحث؟">
                </div>
                <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                  <div class="wrap-icon">
                    <span class="icon icon-room"></span>
                    <select class="form-control rounded" onchange="getCities(this);">
                      @foreach ($areas as $area)
                        <option value="{{ $area->name }}">{{ $area->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  
                </div>
                <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                  <div class="wrap-icon">
                    <span class="icon icon-room"></span>
                    <select class="form-control rounded" id="cities" onchange="getSubCities(this);">
                      <option selected disabled>المدينة</option>
                    </select>
                  </div>
                  
                </div>
                <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                  <div class="wrap-icon">
                    <span class="icon icon-room"></span>
                    <select class="form-control rounded" id="area_id" name="area_id">
                        <option selected disabled>المنطقة</option>
                    </select>
                  </div>
                  
                </div>
                <br><br>
                <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                  <div class="select-wrap">
                    <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                    <select class="form-control rounded" onchange="getChildren(this)">
                      <option value="">التصنيفات</option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  
                 

                </div>

                <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                  <div class="select-wrap sub-category">
                  </div>
                </div>

                <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                  <div class="select-wrap sub-category-one">
                  </div>
                </div>

                <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                  <div class="select-wrap sub-category-two">
                  </div>
                </div>
                <br><br><br><br>
                <div class="col-lg-12 col-xl-12 ml-auto text-right">
                  <input type="submit" class="btn btn-primary btn-block rounded" value="بــــحــــث">
                </div>
                
              </div>
            </form>
          </div>

          <div class="row text-left trending-search" data-aos="fade-up"  data-aos-delay="300">
            <div class="col-12">
              <h2 class="d-inline-block">الأكثر بحثاً:</h2>
              @foreach ($trends as $trend)
                <a href="{{ route('categories.show', $trend->name) }}">{{ $trend->name }}</a>
              @endforeach
            </div>
          </div>

        </div>
      </div>
    </div>
</div>  