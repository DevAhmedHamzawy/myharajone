@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

  <div class="row">

  <div class="col-md-6 my-3">

    <div class="bg-mattBlackLight p-3" style="border-radius:8px;">
      <h4 class="mb-2 text-center">  أعلانات شهر {{ date("M") }}</h4>
      <div>{!! $postsByMonth->container() !!}</div>
    </div>

    <br>
    <div class="bg-mattBlackLight p-3" style="border-radius:8px;">

      <h3 class="mb-2 text-center">  البائعين المميزين  </h3>

      <table class="table table-striped table-dark" style="width: 95%;margin: 3%;">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">كود</th>
            <th scope="col">الإسم</th>
            <th scope="col">عدد الإعلانات</th>
          </tr>
        </thead>
        @foreach ($bestSellers as $bestSeller)
          <tbody>
            <td scope="row">#</td>
            <td>{{ $bestSeller->profile->code ?? 0  }}</td>
            <td>{{ $bestSeller->name }}</td>
            <td>{{ count($bestSeller->posts) }}</td>
          </tbody>
        @endforeach
      </table>
    </div>



    <br>
    <div class="bg-mattBlackLight p-3" style="border-radius:8px;">

      <h3 class="mb-2 text-center">  اكثر البلاغات للمستخدمين  </h3>

      <table class="table table-striped table-dark" style="width: 95%;margin: 3%;">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">كود</th>
            <th scope="col">الإسم</th>
            <th scope="col">عدد البلاغات</th>
          </tr>
        </thead>
        @foreach ($mostReportedSellers as $mostReportedSeller)
          <tbody>
            <td scope="row">#</td>
            <td>{{ $mostReportedSeller->profile->code ?? 0  }}</td>
            <td>{{ $mostReportedSeller->name }}</td>
            <td>{{ $mostReportedSeller->reports_count }}</td>
          </tbody>
        @endforeach
      </table>
    </div>
  </div>


  <div class="col-md-6 my-3">
    <div class="bg-mattBlackLight p-3" style="border-radius:8px;">
      <h4 class="mb-2 text-center"> أكثر التصنيفات مشاهدة {{ date("Y") }}</h4>
    <div>{!! $countCategoryChart->container() !!}</div>
  </div>

  <br>
  <div class="bg-mattBlackLight p-3" style="border-radius:8px;">

    <h4 class="mb-2 text-center"> أفضل البائعين  </h4>

    <table class="table table-striped table-dark" style="width: 95%;margin: 3%;">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">كود</th>
          <th scope="col">الإسم</th>
          <th scope="col">عدد الإعجابات</th>
        </tr>
      </thead>
      @foreach ($bestSellers as $bestSeller)
        <tbody>
          <td scope="row">#</td>
          <td>{{ $bestSeller->profile->code ?? 0  }}</td>
          <td>{{ $bestSeller->name }}</td>
          <td>{{ $bestSeller->likes_count }}</td>
        </tbody>
      @endforeach
    </table>

  </div>


  <br>
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
          <span class="count-name">عدد التعليقات  </span>
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
          <span class="count-name">عدد الإعجابات  </span>
        </div>
      </div>
    </div>
    </div>
  </div>
  </div>







  <div class="row">
    <div class="col-md-12">
      <div class="bg-mattBlackLight" style="border-radius:8px;">

        <h3 class="text-center pt-3 mb-3">إحصائيات الإعلانات لعام {{ date("Y") }}</h3>
        <div class="col-md-12">
          {!! $postsAddingInYear->container() !!}
        </div>

      </div>
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

      <div class="bg-mattBlackLight p-3" style="border-radius:8px;">

        <h3 class="text-center pt-3 mb-3">أكثر الإعلانات بلاغا</h3>

        <table class="table table-striped table-dark" style="width: 95%;margin: 3%;">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">كود</th>
              <th scope="col">الإسم</th>
              <th scope="col">عدد البلاغات</th>
            </tr>
          </thead>
          @foreach ($mostReportedPosts as $mostReportedPost)
            <tbody>
              <td scope="row">#</td>
              <td>{{ $mostReportedPost->profile->code ?? 0  }}</td>
              <td>{{ $mostReportedPost->name }}</td>
              <td>{{ $mostReportedPost->reports_count }}</td>
            </tbody>
          @endforeach
        </table>

      </div>

    </div>


  <div class="col-md-6 my-3">

    <div class="bg-mattBlackLight p-3" style="border-radius:8px;">

      <h3 class="text-center pt-3 mb-3">اكثر المستخدمين إضافة للإعلانات</h3>

      <table class="table table-striped table-dark" style="width: 95%;margin: 3%;">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">كود</th>
            <th scope="col">الإسم</th>
            <th scope="col">عدد الإعلانات</th>
          </tr>
        </thead>
        @foreach ($mostSellersPosts as $mostSellersPost)
          <tbody>
            <td scope="row">#</td>
            <td>{{ $mostSellersPost->profile->code ?? 0  }}</td>
            <td>{{ $mostSellersPost->name }}</td>
            <td>{{ count($mostSellersPost->posts) }}</td>
          </tbody>
        @endforeach
      </table>
    </div>
  </div>

  </div>


  {{--<div class="row">
  <div class="col-md-6 my-3">


  <div class="bg-mattBlackLight p-3" style="border-radius:8px;">

  <h3 class="text-center pt-3 mb-3">إحصائيات الإعلانات لعام {{ date("Y") }}</h3>
    
  <table class="table table-striped table-dark" style="width: 95%;margin: 3%;">
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





  </div>


  <div class="col-md-6 my-3">

  <div class="bg-mattBlackLight p-3" style="border-radius:8px;">

  <table class="table table-striped table-dark" style="width: 95%;margin: 3%;">
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

  </div>--}}

</div>


@endsection


@section('footer')
{!! $countCategoryChart->script() !!}
{!! $postsByMonth->script() !!}
{!! $postsAddingInYear->script() !!}

@endsection