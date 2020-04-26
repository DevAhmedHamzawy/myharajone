@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">رسائل تواصل معنا</h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   

                    

                    <table class="table table-striped table-dark">

                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">الإسم</th>
                                    <th scope="col">رقم الجوال</th>
                                    <th scope="col">البريد الإلكترونى</th>
                                    <th scope="col">الملف المرفق</th>
                                    <th scope="col">نص الرسالة</th>
                                    <th scope="col">العمليات</th>
                                </tr>
                            </thead>
                            @forelse ($contacts as $contact)
                            <tbody>
                                <tr>
                                    <td scope="row">#</td>
                                    <td>{{ $contact->name  }}</td>
                                    <td>{{ $contact->mobile }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->file_path }}</td>
                                    <td>{{ $contact->body }}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#form">
                                           كتابة رد على الرسالة
                                        </button>  
                                    </td>
                                </tr>
                            </tbody>
                            <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header border-bottom-0">
                                      <h5 class="modal-title" id="exampleModalLabel">Create Account</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form>
                                      <div class="modal-body">
        
                                        <input type="hidden" name="name" value="{{ $contact->name }}">
                                        <input type="hidden" name="email" value="{{ $contact->email }}">
                                        <div class="form-group">
                                          <label for="message">Message</label>
                                          <textarea name="message" id="message" class="form-control" cols="30" rows="10"></textarea>
                                        </div>
                                       
                                       
                                      </div>
                                      <div class="modal-footer border-top-0 d-flex justify-content-center">
                                        <button class="btn btn-success" id="reply">Submit</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                            </div>
                            @empty
                                <li class="list-group-item">
                                    لا يوجد رسائل
                                </li>
                            @endforelse
                        </table>
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer')

<script>


    
    window.form_data = new FormData();

    $(document).on('change','#file',function(e){

    let file_data = $('#file').prop('files')[0];
    form_data.append('file', file_data);


    });
    
    $(document).on("click", "#reply", function(e){

        e.preventDefault();

        form_data.append('name', '{!! auth()->user()->user_name !!}')
        form_data.append('mobile', '{!! $settings->telephone ?? '01055445544'  !!}')
        form_data.append('email', '{!! $settings->email ?? 'a@a.com'  !!}')
        form_data.append('body', $('#message').val())
        form_data.append('receiver_email', $('#email').val())
        form_data.append('receiver_name', $('#name').val())


        axios.post('../admin/contacts', form_data)
        .then((response) => {
            $('#success-message').append('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>تم الإرسال!</strong> تم إضافة عميل جديد بنجاح!</div></div>');
                setTimeout(() => {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove() 
                    });
            }, 2000);
            //console.log(response);
        }).catch((error) => {
            if(error.response.data.errors.message){
                $('.message-contact-error').append('<strong>'+error.response.data.errors.message+'</strong>');
                $('.message').addClass('is-invalid')
            }
        })

    });

</script>
    
@endsection