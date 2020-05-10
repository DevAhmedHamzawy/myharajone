@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1 class="text-center">بيانات العضوية الجديدة</h1></div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('memberships.store') }}">
                        @csrf


                       
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">الإسم</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="free_commission" class="col-md-2 col-form-label text-md-right">إعفاء من العمولة</label>

                            <div class="col-md-10">
                                <label for="no" class="col-md-2 col-form-label text-md-right">لا</label>
                                <input type="radio" name="free_commission" id="free_commission" value="0">
                                <label for="yes" class="col-md-2 col-form-label text-md-right">نعم</label>
                                <input type="radio" name="free_commission" id="free_commission" value="1">

                                @error('free_commission')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="max_posts" class="col-md-2 col-form-label text-md-right">أقصى عدد إعلانات</label>

                            <div class="col-md-10">
                                <input id="max_posts" type="number" class="form-control @error('max_posts') is-invalid @enderror" name="max_posts" value="{{ old('max_posts') }}" required autocomplete="max_posts" autofocus>

                                @error('max_posts')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="turn_off_comments" class="col-md-2 col-form-label text-md-right">إغلاق التعليقات</label>

                            <div class="col-md-10">
                                <label for="no" class="col-md-2 col-form-label text-md-right">لا</label>
                                <input type="radio" name="turn_off_comments" id="turn_off_comments" value="0">
                                <label for="yes" class="col-md-2 col-form-label text-md-right">نعم</label>
                                <input type="radio" name="turn_off_comments" id="turn_off_comments" value="1">

                                @error('turn_off_comments')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="feature_ads" class="col-md-2 col-form-label text-md-right">الإعلانات المميزة</label>

                            <div class="col-md-10">
                                <label for="no" class="col-md-2 col-form-label text-md-right">لا</label>
                                <input type="radio" name="feature_ads" id="feature_ads" value="0">
                                <label for="yes" class="col-md-2 col-form-label text-md-right">نعم</label>
                                <input type="radio" name="feature_ads" id="feature_ads" value="1">

                                @error('feature_ads')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-primary col-md-12">
                                إضافة عضوية جديد
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection