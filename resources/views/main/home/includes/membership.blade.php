<div class="container">
    <div class="text-center">العـــضـــويـــة</div>
    @if(auth()->user()->premium)
        {{ auth()->user()->premium->ended == 1 ? 'العضوية إنتهت .... رجاء التجديد' : auth()->user()->premium }}
    @else
        لم تقم بتسجيل عضوية
        <button class="col-md-12 btn btn-primary text-white"><a href="{{ route('userpremiums.create') }}" class="text-white">تـــســـجـــيـــل الـــعـــضـــويــــــة</a></button>
    @endif
</div>