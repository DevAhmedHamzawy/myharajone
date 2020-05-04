@extends('main.layouts.app')

@section('content')

@include('main.posts.includes.show.cover')

<form action="{{ route('userpremiums.store') }}" method="post" class="p-5 bg-white">
    @csrf

    <div class="row form-group">
        <select name="membership_id" id="membership_id" onchange="getDurations(this)" class="form-control">
            @foreach ($memberships as $membership)
                <option value="{{ $membership->id }}">{{ $membership->name }}</option>
            @endforeach
        </select>
    </div>
   

    <div class="row form-group durations">
       
    </div>

    <div class="row form-group">       
        <div class="col-md-12">
            <input type="text" id="mobile" name="mobile" value="{{ auth()->user()->mobile ?? '' }}" placeholder="رقم الجوال" class="form-control">
        </div>
    </div>

    <div class="row form-group">       
        <div class="col-md-12">
            <input type="text" id="name" name="name" value="{{ auth()->user()->name }}"  placeholder="إسم المحول" class="form-control">
        </div>
    </div>

    <div class="row form-group">       
        <div class="col-md-12">
          <input type="text" id="price" name="price" placeholder="مبلغ الإشتراك" class="form-control">
        </div>
    </div>

    <div class="row form-group">       
        <div class="col-md-12">
            <select name="bankaccount_id" id="bankaccount_id" class="form-control">
                @foreach ($bankaccounts as $bankaccount)
                    <option value="{{ $bankaccount->id }}">{{ $bankaccount->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row form-group">       
        <div class="col-md-12">
          <input type="date" id="transaction_date" name="transaction_date" placeholder="تاريخ التحويل" class="form-control">
        </div>
    </div>

    <div class="row form-group">       
        <div class="col-md-12">
            <textarea name="notes" id="notes" cols="30" rows="10" class="form-control" placeholder="ملاحظات..."></textarea>
        </div>
    </div>


    <button type="submit" class="btn btn-primary col-md-12">إضـــــــافـــــة</button>

</form>

@endsection

@section('footer')
    <script>
        function getDurations(id)
      {
        axios.get(`../membership_durations/${id.value}`)
        .then(function (response) {
            $('.durations').empty();
            $('.durations').append('<div class="row form-group"><div class="col-md-12">');
            $('.durations').append('<select name="duration_id" class="duration form-control"></select>');
            $('.durations').append('</div></div>');
           

            for (const duration of response.data) {
              $('.duration').append('<option value="'+duration.id+'">'+duration.display_name+'</option>')
            }
      
          })
          .catch(function (error) {
            console.log(error);
          });
      }

      
    </script>
@endsection