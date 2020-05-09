@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    مستخدمين الموقع
                    <a href="{{ route('bankaccounts.create') }}" class="btn btn-primary" style="float:left">إضافة مستخدم جديد</a>
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
                            @forelse ($bankaccounts as $bankaccount)
                            <tbody>
                                <tr>
                                    <td scope="row">#</td>
                                    <td>{{ $bankaccount->name  }}</td>
                                    <td>{{ $bankaccount->email }}</td>
                                    {{--<td><img src="{{ $bankaccount->img_path }}" alt="" srcset=""></td>--}}
                                    <td>
                                        {{--<a href="{{ route('bankaccounts.show', $bankaccount->bankaccount_name) }}" class="btn btn-primary">Show</a>--}}
                                        <a href="{{ route('bankaccounts.edit', $bankaccount->name) }}" class="btn btn-warning">تعديل</a>
                                        <form action="{{ route('bankaccounts.destroy', $bankaccount->name) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                            @empty
                                <li class="list-group-item">
                                    No bankaccounts Added
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