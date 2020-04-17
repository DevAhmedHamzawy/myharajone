<div class="col-lg-3 ml-auto">

    <div class="mb-5">
      <h3 class="h5 text-black mb-3">Filters</h3>
      <form action="#" method="post">
        @csrf
        <div class="form-group">
          <input type="text" onchange="search()" id="title" placeholder="What are you looking for?" class="form-control">
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
           
          </select>
          </div>
        </div>
        <div class="form-group">
          <!-- select-wrap, .wrap-icon -->
          <div class="select-wrap">

          <span class="icon icon-room"></span>
          <select class="form-control" id="area_id"></select>

          </div>
        </div>

      </form>
    </div>
    
    <div class="mb-5">
      <form action="#" method="post">
        <div class="form-group">
          <p>Radius around selected destination</p>
        </div>
        <div class="form-group">
          <input type="range" min="0" max="100" value="20" data-rangeslider>
        </div>
      </form>
    </div>

    <div class="mb-5">
      <form action="#" method="post">
        <div class="form-group">
          <p>Category 'Real Estate' is selected</p>
          <p>More filters</p>
        </div>
        <div class="form-group">
          <ul class="list-unstyled">
            <li>
              <label for="option1">
                <input type="checkbox" id="option1">
                Residential
              </label>
            </li>
            <li>
              <label for="option2">
                <input type="checkbox" id="option2">
                Commercial
              </label>
            </li>
            <li>
              <label for="option3">
                <input type="checkbox" id="option3">
                Industrial
              </label>
            </li>
            <li>
              <label for="option4">
                <input type="checkbox" id="option4">
                Land
              </label>
            </li>
          </ul>
        </div>
      </form>
    </div>

    <div class="mb-5">
      <h3 class="h6 mb-3">More Info</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti voluptatem placeat facilis, reprehenderit eius officiis.</p>
    </div>

  </div>