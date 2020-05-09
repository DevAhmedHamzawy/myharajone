@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    مستخدمين الموقع
                    <a href="{{ route('membershipdurations.create') }}" class="btn btn-primary" style="float:left">إضافة مستخدم جديد</a>
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
                                    <th scope="col">البريد الإلكترونى</th>
                                    <th scope="col">العمليات</th>
                                </tr>
                            </thead>
                            @forelse ($membershipdurations as $membershipduration)
                            <tbody>
                                <tr>
                                    <td scope="row">#</td>
                                    <td>{{ $membershipduration->name  }}</td>
                                    <td>{{ $membershipduration->email }}</td>
                                    {{--<td><img src="{{ $membershipduration->img_path }}" alt="" srcset=""></td>--}}
                                    <td class="row">
                                        {{--<a href="{{ route('membershipdurations.show', $membershipduration->membershipduration_name) }}" class="btn btn-primary">Show</a>--}}
                                        <a href="{{ route('membershipdurations.edit', $membershipduration->id) }}" class="btn btn-warning">تعديل</a>
                                        &nbsp;&nbsp;
                                        <form action="{{ route('membershipdurations.destroy', $membershipduration->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">حذف</button>
                                        </form>
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