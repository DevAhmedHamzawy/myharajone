@extends('main.layouts.app')


@section('content')


<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">

        <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
          
          
          <div class="row justify-content-center mt-5">
            <div class="col-md-8 text-center">
              <h1>Contact Us</h1>
              <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
            </div>
          </div>

          
        </div>
      </div>
    </div>
  </div>  


  <div class="site-section bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-7 mb-5"  data-aos="fade">

          

          <form class="p-5 bg-white">
            <div id="success-message"></div>

            <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="text-black" for="name">name</label>
                <input type="text" class="form-control name">
                <span class="name-contact-error invalid-feedback" role="alert"></span>
              </div>
              <div class="col-md-6">
                <label class="text-black" for="mobile">Mobile</label>
                <input type="text" class="form-control mobile">
                <span class="mobile-contact-error invalid-feedback" role="alert"></span>
              </div>
            </div>

            <div class="row form-group">
              
              <div class="col-md-12">
                <label class="text-black" for="email">Email</label> 
                <input type="email" class="form-control email">
                <span class="email-contact-error invalid-feedback" role="alert"></span>
              </div>
            </div>

            <div class="row form-group">
              
             
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="body">Body</label> 
                <textarea name="message" class="form-control body" id="message" cols="30" rows="7" placeholder="Write your notes or questions here..."></textarea>
                <span class="body-contact-error invalid-feedback" role="alert"></span> 
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <input type="submit" onclick="sendContact();return false;"  value="Send Message" class="btn btn-primary py-2 px-4 text-white">
              </div>
            </div>


          </form>
        </div>
        <div class="col-md-5"  data-aos="fade" data-aos-delay="100">
          
          <div class="p-4 mb-3 bg-white">
            <p class="mb-0 font-weight-bold">Address</p>
            <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

            <p class="mb-0 font-weight-bold">Phone</p>
            <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

            <p class="mb-0 font-weight-bold">Email Address</p>
            <p class="mb-0"><a href="#">youremail@domain.com</a></p>

          </div>
          
          <div class="p-4 mb-3 bg-white">
            <h3 class="h5 text-black mb-3">More Info</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur? Fugiat quaerat eos qui, libero neque sed nulla.</p>
            <p><a href="#" class="btn btn-primary px-4 py-2 text-white">Learn More</a></p>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center border-primary">
          <h2 class="font-weight-light text-primary">Frequently Ask Question</h2>
          <p class="color-black-opacity-5">Lorem Ipsum Dolor Sit Amet</p>
        </div>
      </div>


      <div class="row justify-content-center">
        <div class="col-8">
          <div class="border p-3 rounded mb-2">
            <a data-toggle="collapse" href="#collapse-1" role="button" aria-expanded="false" aria-controls="collapse-1" class="accordion-item h5 d-block mb-0">How to list my item?</a>

            <div class="collapse" id="collapse-1">
              <div class="pt-2">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.</p>
              </div>
            </div>
          </div>

          <div class="border p-3 rounded mb-2">
            <a data-toggle="collapse" href="#collapse-4" role="button" aria-expanded="false" aria-controls="collapse-4" class="accordion-item h5 d-block mb-0">Is this available in my country?</a>

            <div class="collapse" id="collapse-4">
              <div class="pt-2">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.</p>
              </div>
            </div>
          </div>

          <div class="border p-3 rounded mb-2">
            <a data-toggle="collapse" href="#collapse-2" role="button" aria-expanded="false" aria-controls="collapse-2" class="accordion-item h5 d-block mb-0">Is it free?</a>

            <div class="collapse" id="collapse-2">
              <div class="pt-2">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.</p>
              </div>
            </div>
          </div>

          <div class="border p-3 rounded mb-2">
            <a data-toggle="collapse" href="#collapse-3" role="button" aria-expanded="false" aria-controls="collapse-3" class="accordion-item h5 d-block mb-0">How the system works?</a>

            <div class="collapse" id="collapse-3">
              <div class="pt-2">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.</p>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      
    </div>
  </div>


@endsection



@section('footer')


 <script>
  window.form_data = new FormData();


function sendContact(){
    form_data.append('name', $(".name").val())
    form_data.append('mobile', $(".mobile").val())
    form_data.append('email', $(".email").val())
    form_data.append('body', $(".body").val())

    $(".name").removeClass('is-invalid');
    $(".email").removeClass('is-invalid');
    $(".mobile").removeClass('is-invalid');
    $(".body").removeClass('is-invalid');


    axios.post('../../sendcontact', form_data)
                .then((data) => {

                    $(".name").val('');
                    $(".mobile").val('');
                    $(".email").val('');
                    $(".body").val('');


                    $(".name").removeClass('is-invalid');
                    $(".email").removeClass('is-invalid');
                    $(".mobile").removeClass('is-invalid');
                    $(".body").removeClass('is-invalid');


                    $('.name-contact-error').empty();
                    $('.body-contact-error').empty();
                    $('.mobile-contact-error').empty();
                    $('.email-contact-error').empty();


                    $('#success-message').append('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>تم الإرسال!</strong> الرسالة قد تم إرسالها بنجاح!</div></div>');
                    setTimeout(() => {
                        $(".alert").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove() 
                        });
                    }, 2000);
                }).catch((error) => {

                    $('.name-contact-error').empty();
                    $('.body-contact-error').empty();
                    $('.mobile-contact-error').empty();
                    $('.email-contact-error').empty();

                    
                if(error.response.data.errors.name){
                    $('.name-contact-error').append('<strong>'+error.response.data.errors.name+'</strong>');
                    $('.name').addClass('is-invalid')
                }
                if(error.response.data.errors.email){
                    $('.email-contact-error').append('<strong>'+error.response.data.errors.email+'</strong>');
                    $('.email').addClass('is-invalid')
                }
                if(error.response.data.errors.mobile){
                    $('.mobile-contact-error').append('<strong>'+error.response.data.errors.mobile+'</strong>');
                    $('.mobile').addClass('is-invalid')
                }
                if(error.response.data.errors.body){
                    $('.body-contact-error').append('<strong>'+error.response.data.errors.body+'</strong>');
                    $('.body').addClass('is-invalid')
                }
                });

}

 
 
 </script>
    
@endsection