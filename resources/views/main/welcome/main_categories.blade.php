<div class="site-section" data-aos="fade">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center border-primary">
          <h2 class="font-weight-light text-primary">التصنيفات الأساسية</h2>
          <p class="color-black-opacity-5">تعرف على التصنيفات الأساسية</p>
        </div>
      </div>
      <div class="overlap-category mb-5">
        <div class="row align-items-stretch no-gutters">

          @foreach ($categories as $category)
              
          
          <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-3">
            <a href="{{ route('categories.show', $category->name) }}" class="popular-category h-100">
              <span class="icon"><span class="{{ $category->icon }}"></span></span>
              <span class="caption mb-2 d-block">{{ $category->name }}</span>
              <span class="number">{{ $category->views }}</span>
            </a>
          </div>

          @endforeach

         

         
        </div>
      </div>
      
      
    </div>
  </div>