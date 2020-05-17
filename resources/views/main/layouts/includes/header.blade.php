<div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar container py-0 " role="banner">

      <!-- <div class="container"> -->
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="index.html" class="text-white mb-0">إعلاناتك</a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active"><a href="{{ url('/') }}">الرئيسية</a></li>
                <li><a href="{{ route('posts.index') }}">الإعلانات</a></li>
                <li class="has-children">
                  <a href="#">عن الموقع</a>
                  <ul class="dropdown">
                    <li><a href="#">شروط الإستخدام</a></li>
                    <li><a href="#">العضويات</a></li>
                    <li><a href="#">تطبيق الجوال</a></li>
                    <li><a href="#">القائمة السوداء</a></li>
                  </ul>
                </li>
                <li class="mr-5"><a href="{{ route('contact-us') }}">تواصل معنا</a></li>

                @guest
                  <li class="ml-xl-3 login"><a href="{{ url('/login') }}"><span class="border-left pl-xl-4"></span>دخول</a></li>
                  <li><a href="{{ url('/register') }}" class="cta"><span class="bg-primary text-white rounded">تسجيل</span></a></li>      
                @endguest

                @auth

                  <li class="has-children">
                    <span class="border-left pl-xl-4"></span>
                    <a href="{{ url('home') }}">{{ auth()->user()->name }}</a>
                    <ul class="dropdown">
                      <li><a href="#">شروط الإستخدام</a></li>
                      <li><a href="#">العضويات</a></li>
                      <li><a href="#">تطبيق الجوال</a></li>
                      <li><a href="#">القائمة السوداء</a></li>
                    </ul>
                  </li>
                    
                @endauth
              
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-auto py-3 col-6 text-right" style="position: relative; top: 3px;">
            <a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a>
          </div>

        </div>
      <!-- </div> -->
      
    </header>