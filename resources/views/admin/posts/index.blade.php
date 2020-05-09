@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">العقارات بالموقع</h4> 
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-dark data-table">

                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                {{--<th scope="col">نوع العقار</th>--}}
                                <th scope="col">إسم العقار</th>
                                {{--<th scope="col">المنطقة</th>
                                <th scope="col">التصنيف</th>
                                <th scope="col">النوع</th>
                                <th scope="col">العرض</th>
                                <th scope="col">مشاهدات</th>--}}
                                <th scope="col">العمليات</th>
                            </tr>
                        </thead>
                          
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer')
    <script type="text/javascript">

$(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('the-posts.index') }}",
        columns: [
            {data: 'code', name: 'code'},
            /*{data: 'adSort.display', name: 'adSort.display'},*/
            {data: 'title', name: 'title'},
            /*{data: 'areaName', name: 'areaName'},*/
            /*{data: 'category.name', name: 'category.name'},
            {data: 'sortName', name: 'sortName'},
            {data: 'offerName', name: 'offerName'},
            {data: 'views', name: 'views'},*/
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        dom: 'lBfrtip',
    });
    
  });


  $.fn.dataTable.ext.errMode = 'none';

    

    </script>
@endsection