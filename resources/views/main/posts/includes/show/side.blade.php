<div class="col-md-3 ml-auto">
    <div class="mb-5">
      {{ $post->show_contact_telephone1 == 'لا' ? '' : $post->telephone1 }}
      <br>
      {{ $post->show_contact_telephone2 == 'لا' ? '' : $post->telephone2 }}
      <br>
      {{ $post->show_contact_email == 'لا' ? '' : $post->email }}

      @if($post->show_contact_telephone1 == 'لا' && $post->show_contact_telephone2 == 'لا' && $post->show_contact_email == 'لا')
        خدمة التواصل مع المستخدم غير متاحة
      @endif

    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      إرسال رسالة إلى صاحب الإعلان
    </button>

    <br><br><br>

    <div class="mb-5">
      <h2 class="h5 text-black mb-3">إعلانات مشابهة</h2>
      <ul class="list-unstyled">

        @foreach ($posts as $post)
          <li class="mb-2">
            <img src="{{ $post->main_img_path }}" width="340" height="230" alt="" srcset="">
            <a href="{{ route('posts.show', $post->title) }}">{{ $post->title }}</a>
          </li>
        @endforeach
       
      </ul>
    </div>

    <div class="mb-5">
      <h3 class="h5 text-black mb-3">اخر التعليقات</h3>
      <ul class="list-unstyled">

        @foreach ($comments as $comment)
          <li class="mb-2"><a href="#">{{ $comment->name }}</a> <em>فى إعلان</em> <a href="{{ route('posts.show', $comment->post->title) }}">{{ $comment->post->title }}</a></li>
        @endforeach
        
      </ul>
    </div>

  </div>