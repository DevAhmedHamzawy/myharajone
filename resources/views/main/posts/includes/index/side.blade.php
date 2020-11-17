<div class="col-lg-3 mr-auto">

    <div class="mb-5">
      <h3 class="h5 text-black mb-3">البحث</h3>
      <form action="#" method="post">
        @csrf
        <div class="form-group">
          <input type="text" onchange="search()" id="title" placeholder="عن ماذا تبحث؟" class="form-control">
        </div>
        <div class="form-group">
          <div class="select-wrap">
              <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
              <select class="form-control" onchange="getChildren(this)">
                <option value="" selected="">الكل</option>
                @foreach ($mainCategories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
        </div>
        <div class="form-group">
          <div class="select-wrap sub-category">
              {{-- <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                   <select class="form-control" class="category" onchange="search()"></select> --}}
            </div>
        </div>
        <div class="form-group">
          <div class="select-wrap sub-category-one">
            {{--   <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
              <select class="form-control" class="category" onchange="search()"></select> --}}
            </div>
        </div>

        <div class="form-group">
          <div class="select-wrap sub-category-two">
            {{--   <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
              <select class="form-control" class="category" onchange="search()"></select> --}}
            </div>
        </div>

        <div class="estates-posts-filter-show" style="display:none">

          <div class="form-group">
            <div class="select-wrap">
              <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
              <select id="destination" class="form-control" onchange="search()">
                <option value="" selected disabled>واجهة العقار</option>
                @foreach ($destinations as $destination)
                  <option>{{ $destination }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="select-wrap">
              <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
              <select id="sort" class="form-control" onchange="search()">
                <option value="" selected disabled>نوع العقار</option>
                @foreach ($sorts as $sort)
                    <option>{{ $sort }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="select-wrap">
              <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
              <select id="contract" class="form-control" onchange="search()">
                <option value="" selected disabled>نوع العقد</option>
                @foreach ($contracts as $contract)
                    <option>{{ $contract }}</option>
                @endforeach
              </select>
            </div>
          </div>

        </div>

        <div class="form-group">
          <!-- select-wrap, .wrap-icon -->
          <div class="select-wrap">
            <span class="icon icon-room"></span>
          <select class="form-control" onchange="getCities(this);">
            @foreach ($areas as $area)
              <option value="{{ $area->name }}">{{ $area->name }}</option>
            @endforeach
          </select>
          </div>
          
        </div>
        <div class="form-group">
          <!-- select-wrap, .wrap-icon -->
          <div class="select-wrap">

          <span class="icon icon-room"></span>
          <select class="form-control" id="cities" onchange="getSubCities(this);">
            <option selected disabled>المدينة</option>
          </select>
          </div>
        </div>
        <div class="form-group">
          <!-- select-wrap, .wrap-icon -->
          <div class="select-wrap">

          <span class="icon icon-room"></span>
          <select class="form-control" id="area_id" onchange="search()">
            <option selected disabled>المنطقة</option>
          </select>
           
          </div>
        </div>

        
          <div class="form-group">
            <div class="select-wrap">
              <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
              <select id="price_sort" class="form-control" onchange="search()">
                <option selected disabled>نوع السعر</option>
                @foreach ($priceSorts as $sort)
                    <option>{{ $sort }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="select-wrap">
              <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
              <select id="ad_sort" class="form-control" onchange="search()">
                <option selected disabled>نوع الإعلان</option>
                @foreach ($adSorts as $sort)
                    <option>{{ $sort }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="select-wrap">
              <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
              <select id="payment_sort" class="form-control" onchange="search()">
                <option selected disabled>نوع الدفع</option>
                  @foreach ($paymentSorts as $sort)
                      <option>{{ $sort }}</option>
                  @endforeach
              </select>
            </div>
          </div>


          <div class="mb-5">
            <div class="form-group">
              <p>الســـعـــر</p>
            </div>
            <div class="form-group" dir="ltr">
              <input type="range" id="price" min="0" max="10000" onchange="search()" value="5000" data-rangeslider>
            </div>
          </div>
        

      </form>
    </div>
    
    

   

   

  </div>