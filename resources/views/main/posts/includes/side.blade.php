<div class="col-md-3 ml-auto">
    <div class="mb-5">
      {{ $post->show_contact_telephone1 == 'لا' ? '' : $post->telephone1 }}
      {{ $post->show_contact_telephone2 == 'لا' ? '' : $post->telephone2 }}
      {{ $post->show_contact_email == 'لا' ? '' : $post->email }}

      @if($post->show_contact_telephone1 == 'لا' && $post->show_contact_telephone2 == 'لا' && $post->show_contact_email == 'لا')
        خدمة التواصل مع المستخدم غير متاحة
      @endif

    </div>

    <div class="mb-5">
      <h3 class="h5 text-black mb-3">Popular Posts</h3>
      <ul class="list-unstyled">
        <li class="mb-2"><a href="#">Lorem ipsum dolor sit amet</a></li>
        <li class="mb-2"><a href="#">Quaerat rerum voluptatibus veritatis</a></li>
        <li class="mb-2"><a href="#">Maiores sapiente veritatis reprehenderit</a></li>
        <li class="mb-2"><a href="#">Natus eligendi nobis</a></li>
      </ul>
    </div>

    <div class="mb-5">
      <h3 class="h5 text-black mb-3">Recent Comments</h3>
      <ul class="list-unstyled">
        <li class="mb-2"><a href="#">Joefrey</a> <em>in</em> <a href="#">Lorem ipsum dolor sit amet</a></li>
        <li class="mb-2"><a href="#">Joefrey</a> <em>in</em> <a href="#">Quaerat rerum voluptatibus veritatis</a></li>
        <li class="mb-2"><a href="#">Joefrey</a> <em>in</em> <a href="#">Maiores sapiente veritatis reprehenderit</a></li>
        <li class="mb-2"><a href="#">Joefrey</a> <em>in</em> <a href="#">Natus eligendi nobis</a></li>
      </ul>
    </div>

  </div>