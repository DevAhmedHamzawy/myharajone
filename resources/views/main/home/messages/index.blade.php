@extends('main.layouts.app')

@section('title') صندوق الرسائل @endsection

@section('header')
    <link rel="stylesheet" href="{{ asset('main/css/messages.css')}}">
@endsection

@section('content')
    
<div class="container">
    <h3 class=" text-center">صندوق الرسائل</h3>
    <div class="messaging">
          <div class="inbox_msg">
            <div class="inbox_people">
              <div class="headind_srch">
                <div class="recent_heading">
                  <h4>Recent</h4>
                </div>
                <div class="srch_bar">
                  <div class="stylish-input-group">
                    <input type="text" class="search-bar"  placeholder="Search" >
                    <span class="input-group-addon">
                    <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                    </span> </div>
                </div>
              </div>
              <div class="inbox_chat">
                
                @foreach ($messages as $message)
                    <div class="chat_list" onclick="getMessages({{ $message->from }}, {{ $message->to }})">
                       
                        <div class="chat_people">
                        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                        <div class="chat_ib">
                            <h5>{{ $message->name }} <span class="chat_date">{{ $message->created_at }}</span></h5>
                            <p>{{ $message->body }}</p>
                        </div>
                        </div>
                    </div>    
                @endforeach
                
                
              </div>
            </div>
            <div class="mesgs">
              <div class="msg_history">

                @foreach ($latestmessage as $message)
                    @if ($message->from == auth()->user()->id)

                    <div class="outgoing_msg">
                        <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                        <div class="sent_msg">
                            <p>{{ $message->body }}</p>
                            <span class="time_date">{{ $message->created_at }}</span>
                        </div>
                    </div>
                        
                    @else
                    <div class="incoming_msg">
                        <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                        <div class="received_msg">
                        <div class="received_withd_msg">
                            <p>{{ $message->body }}</p>
                            <span class="time_date">{{ $message->created_at }}</span></div>
                        </div>
                    </div>
                        
                    @endif
                @endforeach
                
               
               
              </div>
              <div class="type_msg">
                <div class="input_msg_write">
                  <div class="reciever_process">
                    @if (!empty($messages))
                        
                    @if($messages[0]->from != auth()->user()->id)
                    <input type="hidden" id="to" value="{{ $messages[0]->from }}">
                    @else
                    <input type="hidden" id="to" value="{{ $messages[0]->to }}">
                    @endif

                    @endif
                  </div>  
                  
                  <input type="text" class="write_msg" id="body" placeholder="Type a message" />
                  <button class="msg_send_btn" onclick="sendMessage()" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                </div>
              </div>
            </div>
          </div>
                  
        </div></div>
@endsection

@section('footer')
    <script>
        function getMessages(from, to){
            axios.get(from+'/'+to+'/messages')
                .then((data) => {
                    $('.msg_history').empty();
                    for(message of data.data){
                        if (message.from == {!! auth()->user()->id !!}){
                            window.reciever_id = message.to;
                            $('.msg_history').append('<div class="outgoing_msg"><div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"></div> <div class="sent_msg"><p>'+message.body+'</p><span class="time_date">'+message.created_at+'</span></div></div>');
                        }else{
                            console.log(false)
                            $('.msg_history').append('<div class="incoming_msg"><div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div> <div class="received_msg"> <div class="received_withd_msg"> <p>'+message.body+'</p> <span class="time_date">'+message.created_at+'</span></div>  </div> </div> </div>');
                        }

                    }
                    $('.reciever_process').empty();
                    $('.reciever_process').append('<input type="hidden" id="to" value="'+reciever_id+'">');
                    
                })
        }

        function sendMessage()
        {
            let message = {
                name: 'owner',
                mobile: 0,
                email: 'owneremail',
                body: $('#body').val(),
                to: $("#to").val(),
            }

            axios.post('../sendmessage', message)
            .then((data) => {
                $('.msg_history').append('<div class="outgoing_msg"><div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"></div> <div class="sent_msg"><p>'+data.data.body+'</p><span class="time_date">'+data.data.created_at+'</span></div></div>');
            })

        }
    </script>
@endsection