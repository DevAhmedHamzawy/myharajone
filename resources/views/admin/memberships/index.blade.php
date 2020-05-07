@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    العضويات بالموقع 
                    <a href="{{ route('memberships.create') }}" class="btn btn-primary" style="float:left">إضافة مستخدم جديد</a>
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
                            @forelse ($memberships as $member)
                            <tbody>
                                <tr>
                                    <td scope="row">#</td>
                                    <td>{{ $member->name  }}</td>
                                    <td>{{ $member->email }}</td>
                                    {{--<td><img src="{{ $member->img_path }}" alt="" srcset=""></td>--}}
                                    <td>
                                        {{--<a href="{{ route('members.show', $member->member_name) }}" class="btn btn-primary">Show</a>--}}
                                        <a href="{{ route('memberships.edit', $member->name) }}" class="btn btn-warning">تعديل</a>
                                        <form action="{{ route('memberships.destroy', $member->name) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">حذف</button>
                                        </form>
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