<div class="col-md-8">
    <div class="tab-content profile-tab" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <label>كود</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $user->profile->code }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>الإسم</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $user->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>البريد الإلكترونى</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $user->profile->email }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>الهاتف</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $user->profile->telephone }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>الجوال</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $user->profile->mobile }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>الموقع الإلكترونى</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $user->profile->website }}</p>
                        </div>
                    </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            <div class="row">

                @forelse ($user->posts as $post)
                <div class="col-lg-6">
                  
                  <div class="d-block d-md-flex listing vertical">
                    <a href="{{ route('posts.show', $post->title) }}" class="img d-block" style="background-image: url({{ $post->main_img_path }})"></a>
                    <div class="lh-content">
                      <span class="category">{{ $post->category->name }}</span>
                      <span class="icon-eye"></span>{{ $post->views }}
                      <span class="icon-attach_money"></span>{{ number_format($post->price, 2, '.', '') }}
                      <p style="font-size:12px;font-weight:bold;"><span class="icon-flag-o"></span> &nbsp; {{ $post->ad_sort }} &nbsp; <span class="icon-hand-o-left"></span> &nbsp; {{ $post->price_sort }} &nbsp; <span class="icon-money"></span> &nbsp; {{ $post->payment_sort }}</p>
                      <h3><a href="{{ route('posts.show', $post->title) }}">{{ $post->title }}</a></h3>
                      <p style="font-size:16px;"><span class="icon-user"></span>{{ $post->user->name }}</p>
                      <p style="font-size:16px;"><span class="icon-clock-o"></span>{{ $post->create_at }}</p>
                      <address style="font-size:13.5px;font-weight:bold;"><span class="icon-room"></span>{{ $post->area->name }}, {{ $post->areaName[0] }},  {{ $post->areaName[1] }}</address>    
                    </div>
                  </div>
            
                  </div>
                @empty
                    لا يوجد إعلانات
                @endforelse
                
              
              </div>
                
        </div>
    </div>
</div>