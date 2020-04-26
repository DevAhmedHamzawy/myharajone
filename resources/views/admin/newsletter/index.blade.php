@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    النشرة التسويقية الإلكترونية

                    <div style="float:left">
                        إختر الكل<input type="checkbox" id="check_all">

                        <button type="button" id="modal-btn" class="btn btn-danger" data-toggle="modal" data-target="#form">
                           إضافة إعلان جديد
                        </button>  
                    </div>
                   

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

                                <input type="hidden" id="formIds" name="ids" value="">
                               
                                <div class="form-group">
                                  <label for="message">Message</label>
                                  <textarea name="message" id="message" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                               
                               
                              </div>
                              <div class="modal-footer border-top-0 d-flex justify-content-center">
                                <button class="btn btn-success" id="send-newsletter">Submit</button>
                              </div>
                            </form>
                          </div>
                        </div>
                    </div>

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
                                    <th scope="col">الحى</th>
                                    <th scope="col">المنطقة</th>
                                    <th scope="col">رقم الجوال</th>
                                    <th scope="col">البريد الإلكترونى</th>
                                    <th scope="col">إختر</th>
                                </tr>
                            </thead>
                            @forelse ($newsletters as $newsletter)
                            <tbody>
                                <tr>
                                    <td scope="row">#</td>
                                    <td>{{ $newsletter->name  }}</td>
                                    <td>{{ $newsletter->neighborhood }}</td>
                                    <td>{{ $newsletter->area_id }}</td>
                                    <td>{{ $newsletter->mobile }}</td>
                                    <td>{{ $newsletter->email }}</td>
                                    <td><input type="checkbox" class="checkboxes" data-id="{{$newsletter->id}}"></td>
                                </tr>
                            </tbody>
                            
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
    
    $(document).on("click", "#send-newsletter", function(e){

        e.preventDefault();

       
        let formIds = $('#formIds').val();
        let message = $('#message').val();
        


        axios.post('../admin/newsletters', {formIds, message})
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
                $('.message-newsletter-error').append('<strong>'+error.response.data.errors.message+'</strong>');
                $('.message').addClass('is-invalid')
            }
        })

    });

    $("#modal-btn").attr("disabled", "disabled");

    $('#check_all').on('click',function(){
        if($(this).prop('checked')==true){
            $('.checkboxes').prop('checked',true);
            $("#modal-btn").removeAttr("disabled");
        }else {
            $('.checkboxes').prop('checked',false);
            $("#modal-btn").attr("disabled", "disabled");
        }
    });

    $('.checkboxes').on('click',function(){
        if($('.checkboxes').filter(":checked").length==0){
            $("#modal-btn").attr("disabled", "disabled");
        }else {
            $("#modal-btn").removeAttr("disabled");
        }

        if($('.checkboxes').filter(":checked").length==$('.checkboxes').length) {
            $('#check_all').prop('checked',true);
        }else {
            $('#check_all').prop('checked',false);
        }
    });


    $('#modal-btn').on('click',function(){
        var ids='';
        $('.checkboxes').each(function(){
            if($(this).prop('checked')==true){
            ids+=$(this).data('id')+',';}
        });
        $('#formIds').attr('value',ids);
        $('#form').modal('show');
    });

</script>
    
@endsection