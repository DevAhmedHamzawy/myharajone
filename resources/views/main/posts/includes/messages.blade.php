    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div id="success-message"></div>

            <form action="#" class="p-1 bg-light">
                <div class="form-group">
                  <label for="name">Name *</label>
                  <input type="text" class="form-control" id="name-message">
                  <span id="name-message-error" class="invalid-feedback" role="alert"></span>
                </div>
                <div class="form-group">
                  <label for="email">Email *</label>
                  <input type="email" class="form-control" id="email-message">
                  <span id="email-message-error" class="invalid-feedback" role="alert"></span>
                </div>
                <div class="form-group">
                  <label for="mobile">mobile</label>
                  <input type="text" class="form-control" id="mobile-message">
                  <span id="mobile-message-error" class="invalid-feedback" role="alert"></span>
                </div>
        
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="" id="body-message" cols="30" rows="10" class="form-control"></textarea>
                  <span id="body-message-error" class="invalid-feedback" role="alert"></span>
                </div>
                <input type="hidden" name="to" id="to" value="{{ $post->user_id }}">	
                <button type="button" onclick="sendMessage()" class="btn btn-primary">إرسال الرسالة</button>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
        </div>
      </div>
    </div>
  </div>


 