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
      <h3 class="mb-5">Leave a comment</h3>
      <form action="#" class="p-5 bg-light">
        <div class="form-group">
          <label for="name">Name *</label>
          <input type="text" class="form-control" id="name">
          <span id="name-comment-error" class="invalid-feedback" role="alert"></span>
        </div>
        <div class="form-group">
          <label for="email">Email *</label>
          <input type="email" class="form-control" id="email">
          <span id="email-comment-error" class="invalid-feedback" role="alert"></span>
        </div>
        <div class="form-group">
          <label for="website">Website</label>
          <input type="url" class="form-control" id="website">
          <span id="website-comment-error" class="invalid-feedback" role="alert"></span>
        </div>

        <div class="form-group">
          <label for="message">Message</label>
          <textarea name="" id="body" cols="30" rows="10" class="form-control"></textarea>
          <span id="body-comment-error" class="invalid-feedback" role="alert"></span>
        </div>
        <div class="form-group">
          <button onclick="sendComment()"  class="btn btn-primary">أضف تعليق</button>
        </div>

      </form>
    </div>
  </div>


@section('footer')
<script>
  window.form_data = new FormData();

function sendComment(){
    form_data.append('post_id', {!! $post->id !!})
    form_data.append('name', $("#name").val())
    form_data.append('email', $("#email").val())
    form_data.append('website', $("#website").val())
    form_data.append('body', $("#body").val())

    axios.post('../../sendcomment', form_data)
                .then((data) => {

                    $("#name").val('');
                    $("#email").val('');
                    $("#website").val('');
                    $("#body").val('');

                    $("#name").removeClass('is-invalid');
                    $("#email").removeClass('is-invalid');
                    $("#website").removeClass('is-invalid');
                    $("#body").removeClass('is-invalid');

                    $('#name-comment-error').empty();
                    $('#body-comment-error').empty();
                    $('#website-comment-error').empty();
                    $('#email-comment-error').empty();


                    $('.comment-list').append('<li class="comment"><div class="vcard"><img src="https://www.gravatar.com/avatar" alt="Image placeholder"></div><div class="comment-body"><h3>'+data.data.name+'</h3><div class="meta">الان</div><p>'+data.data.body+'</p><p><a href="#" class="reply rounded">Reply</a></p></div>')
                    
                }).catch((error) => {

                    $('#name-comment-error').empty();
                    $('#body-comment-error').empty();
                    $('#website-comment-error').empty();
                    $('#email-comment-error').empty();

                   
                if(error.response.data.errors.name){
                    $('#name-comment-error').append('<strong>'+error.response.data.errors.name+'</strong>');
                    $('#name').addClass('is-invalid')
                }
                if(error.response.data.errors.email){
                    $('#email-comment-error').append('<strong>'+error.response.data.errors.email+'</strong>');
                    $('#email').addClass('is-invalid')
                }
                if(error.response.data.errors.website){
                    $('#website-comment-error').append('<strong>'+error.response.data.errors.website+'</strong>');
                    $('#website').addClass('is-invalid')
                }
                if(error.response.data.errors.body){
                    $('#body-comment-error').append('<strong>'+error.response.data.errors.body+'</strong>');
                    $('#body').addClass('is-invalid')
                }
                });

}

 
 
 </script>
@endsection