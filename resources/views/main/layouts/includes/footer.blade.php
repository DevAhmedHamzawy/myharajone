<div class="newsletter bg-primary py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h2>النشرة التسويقية البريدية</h2>
          <p>قم بالتسجيل بالنشرة ليصلك كل جديد.</p>
        </div>
        <div class="col-md-6">
          <div id="success-message-footer"></div>
          <form class="d-flex">
            <input type="text" id="email-newsletter-footer" class="form-control" placeholder="اليريد الإلكترونى">
            <span class="email-newsletter-footer-error invalid-feedback" role="alert"></span> 
            <input type="submit" onclick="subscribefooter();return false;" value="Subscribe" class="btn btn-white">
          </form>
        </div>
      </div>
    </div>
  </div>

  
  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-6">
              <h2 class="footer-heading mb-4">عن الموقع</h2>
              <p>موقع مختص لعرض السلع</p>
            </div>
            
            <div class="col-md-3">
              <h2 class="footer-heading mb-4">القائمة</h2>
              <ul class="list-unstyled">
                <li><a href="#">عن الموقع</a></li>
                <li><a href="#">خدمات</a></li>
                <li><a href="#">تواصل معنا</a></li>
              </ul>
            </div>
            <div class="col-md-3">
              <h2 class="footer-heading mb-4">تابعنا</h2>
              <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <form action="#" method="post">
            <div class="input-group mb-3">
              <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Search products..." aria-label="Enter Email" aria-describedby="button-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary text-white" type="button" id="button-addon2">Search</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </footer>
</div>

<script src="{{ asset('main/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('main/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('main/js/jquery-ui.js') }}"></script>
<script src="{{ asset('main/js/popper.min.js') }}"></script>
<script src="https://cdn.rtlcss.com/bootstrap/v4.1.3/js/bootstrap.min.js" integrity="sha384-C/pvytx0t5v9BEbkMlBAGSPnI1TQU1IrTJ6DJbC8GBHqdMnChcb6U4xg4uRkIQCV" crossorigin="anonymous"></script>
<script src="{{ asset('main/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('main/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('main/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('main/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('main/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('main/js/aos.js') }}"></script>
<script src="{{ asset('main/js/rangeslider.min.js') }}"></script>

<script src="{{ asset('main/js/main.js') }}"></script>

<script>

function getChildren(id)
      {
        axios.get(`../category_children/${id.value}`)
        .then(function (response) {
            $('.sub-category').empty();
            $('.sub-category').append('<span class="icon"><span class="icon-keyboard_arrow_down"></span></span>');
            if(id.value != 1){
              $('.sub-category-one').empty();
              $('.sub-category-two').empty();
              $('.sub-category').append('<select class="form-control category-sub-category" name="category_id"></select>');
            }else{
              $('.sub-category').append('<select class="form-control category-sub-category" onchange="getSubChildren(this)"></select>');
            }

            if(id.value == 2){
                $('.post-estate-map').css("display", "block");
                $('.estates-posts-filter-show').css("display", "block");

            }else{
                $('.post-estate-map').css("display", "none");
                $('.estates-posts-filter-show').css("display", "none");
            }

            for (const subcategory of response.data) {
              $('.category-sub-category').append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>')
            }
      
          })
          .catch(function (error) {
            console.log(error);
          });
      }


      function getSubChildren(id)
      {
        axios.get(`../category_children/${id.value}`)
        .then(function (response) {
            $('.sub-category-one').empty();
            $('.sub-category-one').append('<span class="icon"><span class="icon-keyboard_arrow_down"></span></span>');
            $('.sub-category-one').append('<select class="form-control category-sub-category-one" name="category_id"></select>');

            for (const subcategory of response.data) {
              $('.category-sub-category-one').append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>')
            }

            var d = new Date();
            var n = d.getFullYear();

            $('.sub-category-two').empty();
            $('.sub-category-two').append('<span class="icon"><span class="icon-keyboard_arrow_down"></span></span>');
            $('.sub-category-two').append('<select class="form-control category-sub-category-two" name="model"></select>');
            
            for (let i = 1960; i <= n; i++) {
                $('.category-sub-category-two').append('<option>'+i+'</option>')
            }
      
          })
          .catch(function (error) {
            console.log(error);
          });
      }

      function subscribefooter(){
    //console.log('subscribefooter');

    let newsletter = {
        email: $('#email-newsletter-footer').val(),
    }

    axios.post('../../savenewsletter', newsletter)
      .then((data) => {

          
            $('#email-newsletter-footer').val("");

            $('.email-newsletter-footer-error').empty();

            $('#success-message-footer').append('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>تم الإشتراك!</strong>تم الإشتراك فى النشرة التسويقية !</div></div>');
            setTimeout(() => {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove() 
                });
            }, 2000);
        }).catch((error) => {
               
                $('.email-newsletter-footer-error').empty();

               
             
                if(error.response.data.errors.email){
                    $('.email-newsletter-footer-error').append('<strong>'+error.response.data.errors.email+'</strong>');
                    $('.email-newsletter').addClass('is-invalid')
                }

        });
}
</script>