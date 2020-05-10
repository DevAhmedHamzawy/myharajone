@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    العضويات بالموقع 
                    <a href="{{ route('memberships.create') }}" class="btn btn-primary" style="float:left">إضافة عضوية جديدة</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped table-dark">

                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">الإسم</th>
                                    <th scope="col">إعفاء من العمولة</th>
                                    <th scope="col">حد أقصى للإعلانات</th>
                                    <th scope="col">إغلاق التعليقات</th>
                                    <th scope="col">إعلانات مميزة</th>
                                    <th scope="col">العمليات</th>
                                </tr>
                            </thead>
                            @forelse ($memberships as $membership)
                            <tbody>
                                <tr>
                                    <td scope="row">#</td>
                                    <td>{{ $membership->name  }}</td>
                                    <td>{{ $membership->free_commission ? 'نعم' : 'لا' }}</td>
                                    <td>{{ $membership->max_posts }}</td>
                                    <td>{{ $membership->turn_off_comments ? 'نعم' : 'لا' }}</td>
                                    <td>{{ $membership->feature_ads ? 'نعم' : 'لا' }}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{ route('memberships.edit', $membership->id) }}" class="btn btn-warning">تعديل</a>
                                            &nbsp;&nbsp;
                                            <form action="{{ route('memberships.destroy', $membership->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">حذف</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            @empty
                                <li class="list-group-item">
                                    No members Added
                                </li>
                            @endforelse
                        </table>
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection