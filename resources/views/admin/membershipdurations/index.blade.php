@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    مدة العضويات 
                    <a href="{{ route('membershipdurations.create') }}" class="btn btn-primary" style="float:left">إضافة مدة جديدة</a>
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
                                    <th scope="col">إسم العضوية</th>
                                    <th scope="col">المدة</th>
                                    <th scope="col">العدد</th>
                                    <th scope="col">السعر</th>
                                    <th scope="col">العمليات</th>
                                </tr>
                            </thead>
                            @forelse ($membershipdurations as $membershipduration)
                            <tbody>
                                <tr>
                                    <td scope="row">#</td>
                                    <td>{{ $membershipduration->membership->name  }}</td>
                                    <td>{{ $membershipduration->display_name }}</td>
                                    <td>{{ $membershipduration->duration }}</td>
                                    <td>{{ $membershipduration->price }}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{ route('membershipdurations.edit', $membershipduration->id) }}" class="btn btn-warning">تعديل</a>
                                            &nbsp;&nbsp;
                                            <form action="{{ route('membershipdurations.destroy', $membershipduration->id) }}" method="post">
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
                                    No membershipdurations Added
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