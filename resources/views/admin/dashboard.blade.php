@extends('admin.layouts.app')

@section('content')



{{--
    <div class="row" style="margin-top:-50px;">
        <div class="col-md-4 my-3">
            <div class="bg-mattBlackLight p-3" style="border-radius:8px;">
              <h4 class="mb-2 text-center">المستخدمين لعام {{ date("Y") }}</h4>
              <div>{!! $usersByMonth->container() !!}</div>
            </div>
        </div>

        <div class="col-md-4 my-3">
          <div class="bg-mattBlackLight p-3" style="border-radius:8px;">
            <h4 class="mb-2 text-center">المكاتب العقارية لعام {{ date("Y") }}</h4>
            <div>{!! $officesByMonth->container() !!}</div>
          </div>
        </div>

      <div class="col-md-4 my-3">
        <div class="bg-mattBlackLight p-3" style="border-radius:8px;">
          <h4 class="mb-2 text-center">المحامين لعام {{ date("Y") }}</h4>
          <div>{!! $lawyersByMonth->container() !!}</div>
        </div>
      </div>

    </div>

    

    
    <div class="row">
      <div class="col-md-6 my-3">
          <div class="bg-mattBlackLight p-3">
            <h4 class="mb-2 text-center">مدة الإعلانات المثبتة</h4>
            <div>{!! $countPremiumChart->container() !!}</div>
          </div>
      </div>

      <div class="col-md-6 my-3">
        <div class="bg-mattBlackLight p-3">
          <h4 class="mb-2 text-center">مدة الإعلانات المضافة</h4>
          <div>{!! $countDurationChart->container() !!}</div>
        </div>
      </div>
    </div>



    <div class="row">
      <div class="col-md-4 my-3">
          <div class="bg-mattBlackLight p-3">
            <h4 class="mb-2 text-center">نوع العرض</h4>
            <div>{!! $countOfferChart->container() !!}</div>
          </div>
      </div>

      <div class="col-md-4 my-3">
        <div class="bg-mattBlackLight p-3">
          <h4 class="mb-2 text-center">النوع</h4>
          <div>{!! $countSortChart->container() !!}</div>
        </div>
      </div>

      <div class="col-md-4 my-3">
        <div class="bg-mattBlackLight p-3">
          <h4 class="mb-2 text-center">أعلى المستخدمين إضافة</h4>
          <div>{!! $topFiveUsersChart->container() !!}</div>
        </div>
      </div>

      
    </div>



    <div class="row">
     

      <div class="col-md-6 my-3">
        <div class="bg-mattBlackLight p-3">
          <h4 class="mb-2 text-center">نوع الإعلان</h4>
          <div>{!! $countCategoryChart->container() !!}</div>
        </div>
      </div>


      <div class="col-md-6 my-3">
        <div class="bg-mattBlackLight p-3">
          <h4 class="mb-2 text-center">نوع العقار</h4>
          <div>{!! $countAdSortChart->container() !!}</div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-6">
        <div class="card-counter success">
          <i class="material-icons icon">person</i>
          <span class="count-numbers">{{ $countVisitors }}</span>
          <span class="count-name">عدد الزوار</span>
        </div>
      </div>

      <div class="col-md-6">
       
      </div>


        <div class="col-md-6">
          <div class="card-counter danger">
            <i class="material-icons icon">track_changes</i>
            <span class="count-numbers">{{ $countClicks }}</span>
            <span class="count-name">عدد النقرات</span>
          </div>
        </div>

      
     

      <div class="col-md-6">
        <table class="table table-striped table-dark" style="margin-top:-105px;height:325px;">
          <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">IP</th>
                  <th scope="col">الدولة</th>
                  <th scope="col">عدد النقرات</th>
              </tr>
          </thead>
          @foreach ($allVisitors as $visitor)
          <tbody>
              <td scope="row">#</td>
              <td>{{ $visitor->ip  }}</td>
              <td>{{ $visitor->country }}</td>
              <td>{{  floor($visitor->clicks/2) }}</td>
          </tbody>
          @endforeach
        </table>
      </div>
      
    </div>
  

</div>


@endsection

@section('footer')
{!! $estateAddingByMonth->script() !!}
{!! $usersByMonth->script() !!}
{!! $officesByMonth->script() !!}
{!! $lawyersByMonth->script() !!}
{!! $countPremiumChart->script() !!}
{!! $countDurationChart->script() !!}
{!! $countSortChart->script() !!}
{!! $countAdSortChart->script() !!}
{!! $countOfferChart->script() !!}
{!! $countCategoryChart->script() !!}
{!! $topFiveUsersChart->script() !!}

@endsection--}}




<div class="container-fluid">
  

  <div class="row">
    

    <div class="col-md-6 my-3">


      <div class="bg-mattBlackLight p-3" style="border-radius:8px;">
        <h4 class="mb-2 text-center">  أعلانات شهر {{ date("M") }}</h4>
        <div>{!! $postsByMonth->container() !!}</div>
      </div>

      <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">كود</th>
                <th scope="col">الإسم</th>
                <th scope="col">خانة</th>
            </tr>
        </thead>
        @foreach ($bestSellers as $bestSeller)
        <tbody>
            <td scope="row">#</td>
            <td>{{ $bestSeller->profile->code ?? 0  }}</td>
            <td>{{ $bestSeller->name }}</td>
            <td>0</td>
        </tbody>
        @endforeach
      </table>

        <table class="table table-striped table-dark">
          <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">كود</th>
                  <th scope="col">الإسم</th>
                  <th scope="col">خانة</th>
              </tr>
          </thead>
          @foreach ($mostReportedSellers as $mostReportedSeller)
          <tbody>
              <td scope="row">#</td>
              <td>{{ $mostReportedSeller->profile->code ?? 0  }}</td>
              <td>{{ $mostReportedSeller->name }}</td>
              <td>0</td>
          </tbody>
          @endforeach
        </table>

     
    </div>
    <div class="col-md-6 my-3">
      <div class="bg-mattBlackLight p-3" style="border-radius:8px;">
        <h4 class="mb-2 text-center"> أكثر التصنيفات مشاهدة {{ date("Y") }}</h4>
        <div>{!! $countCategoryChart->container() !!}</div>
      </div>

      <div class="bg-mattBlackLight p-3" style="border-radius:8px;">

        <div class="row">
          <div class="col-md-4">
            <div class="card-counter primary">
              <i class="material-icons icon">person</i>
              <span class="count-numbers">{{ $postsCount }}</span>
              <span class="count-name">عدد الإعلانات</span>
            </div>
          </div>
      
          <div class="col-md-4">
            <div class="card-counter danger">
              <i class="material-icons icon">track_changes</i>
              <span class="count-numbers">{{ $usersCount }}</span>
              <span class="count-name">عدد المستخدمين</span>
            </div>
          </div>
      
          <div class="col-md-4">
            <div class="card-counter info">
              <i class="material-icons icon">collections</i>
              <span class="count-numbers">{{ $commentsCount }}</span>
              <span class="count-name">عدد رسائل التواصل </span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="card-counter primary">
              <i class="material-icons icon">person</i>
              <span class="count-numbers">{{ $postsCount }}</span>
              <span class="count-name">عدد الإعلانات</span>
            </div>
          </div>
      
          <div class="col-md-4">
            <div class="card-counter danger">
              <i class="material-icons icon">track_changes</i>
              <span class="count-numbers">{{ $usersCount }}</span>
              <span class="count-name">عدد المستخدمين</span>
            </div>
          </div>
      
          <div class="col-md-4">
            <div class="card-counter info">
              <i class="material-icons icon">collections</i>
              <span class="count-numbers">{{ $commentsCount }}</span>
              <span class="count-name">عدد رسائل التواصل </span>
            </div>
          </div>
        </div>
        

      </div>
           
      </div>



    </div>

</div>





  <div class="row" style="background-color:#343A40;">
    <h3 style="padding: 10px 14em;">إحصائيات الإعلانات لعام {{ date("Y") }}</h3>
    <div class="col-md-12">
        {!! $postsAddingInYear->container() !!}
    </div>
  </div>

  <div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="material-icons icon">person</i>
        <span class="count-numbers">{{ $postsCount }}</span>
        <span class="count-name">عدد الإعلانات</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="material-icons icon">track_changes</i>
        <span class="count-numbers">{{ $usersCount }}</span>
        <span class="count-name">عدد المستخدمين</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class="material-icons icon">collections</i>
        <span class="count-numbers">{{ $commentsCount }}</span>
        <span class="count-name">عدد رسائل التواصل </span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class="material-icons icon">collections</i>
        <span class="count-numbers">{{ $contactsCount }}</span>
        <span class="count-name">عدد رسائل التواصل </span>
      </div>
    </div>
      

  </div>

 

  <div class="row">
    <div class="col-md-6 my-3">


  

      <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">كود</th>
                <th scope="col">الإسم</th>
                <th scope="col">خانة</th>
            </tr>
        </thead>
        @foreach ($mostReportedPosts as $mostReportedPost)
        <tbody>
            <td scope="row">#</td>
            <td>{{ $mostReportedPost->profile->code ?? 0  }}</td>
            <td>{{ $mostReportedPost->name }}</td>
            <td>0</td>
        </tbody>
        @endforeach
      </table>
  
     
  
     
    </div>
  
  
    <div class="col-md-6 my-3">
      <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">كود</th>
                <th scope="col">الإسم</th>
                <th scope="col">خانة</th>
            </tr>
        </thead>
        @foreach ($mostSellersPosts as $mostSellersPost)
        <tbody>
            <td scope="row">#</td>
            <td>{{ $mostSellersPost->profile->code ?? 0  }}</td>
            <td>{{ $mostSellersPost->name }}</td>
            <td>0</td>
        </tbody>
        @endforeach
      </table>
    </div>
  
  </div>


  <div class="row">
    <div class="col-md-6 my-3">


  

      <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">كود</th>
                <th scope="col">الإسم</th>
                <th scope="col">خانة</th>
            </tr>
        </thead>
        @foreach ($mostReportedPosts as $mostReportedPost)
        <tbody>
            <td scope="row">#</td>
            <td>{{ $mostReportedPost->profile->code ?? 0  }}</td>
            <td>{{ $mostReportedPost->name }}</td>
            <td>0</td>
        </tbody>
        @endforeach
      </table>
  
     
  
     
    </div>
  
  
    <div class="col-md-6 my-3">
      <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">كود</th>
                <th scope="col">الإسم</th>
                <th scope="col">خانة</th>
            </tr>
        </thead>
        @foreach ($mostSellersPosts as $mostSellersPost)
        <tbody>
            <td scope="row">#</td>
            <td>{{ $mostSellersPost->profile->code ?? 0  }}</td>
            <td>{{ $mostSellersPost->name }}</td>
            <td>0</td>
        </tbody>
        @endforeach
      </table>
    </div>
  
  </div>
 




</div>


@endsection


@section('footer')
{!! $countCategoryChart->script() !!}
{!! $postsByMonth->script() !!}
{!! $postsAddingInYear->script() !!}

@endsection