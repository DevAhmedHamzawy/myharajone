<div class="pt-5">
    <h3 class="mb-5">{{ count($post->comments) }} تعليق</h3>
    <ul class="comment-list">
     
      @foreach ($post->comments as $comment)
      <li class="comment">
        <div class="vcard">
          <img src="{{ $comment->img_path }}" alt="Image placeholder">
        </div>
        <div class="comment-body">
          <h3>{{ $comment->name }}</h3>
          <div class="meta">{{ $comment->created_at->diffForHumans() }}</div>
          <p>{{ $comment->body }}</p>
        </div>

      </li>
      @endforeach
      

     
    </ul>
    <!-- END comment-list -->
    
    <div class="comment-form-wrap pt-5">
      <h3 class="mb-5">إترك تعليق</h3>
      <form action="#" class="p-5 bg-light">
        <div class="form-group">
          <label for="name">الإسم *</label>
          <input type="text" class="form-control" id="name">
          <span id="name-comment-error" class="invalid-feedback" role="alert"></span>
        </div>
        <div class="form-group">
          <label for="email">البريد الإلكترونى *</label>
          <input type="email" class="form-control" id="email">
          <span id="email-comment-error" class="invalid-feedback" role="alert"></span>
        </div>
        <div class="form-group">
          <label for="website">الموقع الإلكترونى / صفحة التواصل الإجتماعى</label>
          <input type="url" class="form-control" id="website">
          <span id="website-comment-error" class="invalid-feedback" role="alert"></span>
        </div>

        <div class="form-group">
          <label for="message">التعليق</label>
          <textarea name="" id="body" cols="30" rows="10" class="form-control"></textarea>
          <span id="body-comment-error" class="invalid-feedback" role="alert"></span>
        </div>
        <div class="form-group">
          <button onclick="sendComment()"  class="btn btn-primary">أضف تعليق</button>
        </div>

      </form>
    </div>
  </div>
