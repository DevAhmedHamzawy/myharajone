<div class="container">
    <h1 class="text-center">العـــضـــويـــة</h1>
    @if(auth()->user()->premium)
        {{ auth()->user()->premium->ended == 1 ?? 'العضوية إنتهت .... رجاء التجديد' }}

        @if(auth()->user()->premium->ended != 1)
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">الإسم</th>
                <th scope="col">الجوال</th>
                <th scope="col">تكلفة الدفع</th>
              </tr>
            </thead>
            <tbody>

              
              <tr>
                <th scope="row">{{ auth()->user()->premium->id }}</th>
                <td>{{ auth()->user()->premium->name }}</td>
                <td>{{ auth()->user()->premium->mobile }}</td>
                <td>{{ auth()->user()->premium->price }}</td>
              </tr>
            
            </tbody>
          </table>
        @endif
    @else
        لم تقم بتسجيل عضوية
        <button class="col-md-12 btn btn-primary text-white"><a href="{{ route('userpremiums.create') }}" class="text-white">تـــســـجـــيـــل الـــعـــضـــويــــــة</a></button>
    @endif
</div>