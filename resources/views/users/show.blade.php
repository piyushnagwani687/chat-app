<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<style>
body,html{
  height: 100%;
  margin: 0;
  background: #7F7FD5;
background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
  background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
}
.chat{
  margin-top: auto;
  margin-bottom: auto;
  }
  .card{
      height: 550px;
      border-radius: 15px !important;
      background-color: rgba(0,0,0,0.4) !important;
  }
  .contacts_body{
      padding:  0.75rem 0 !important;
      overflow-y: auto;
      white-space: nowrap;
  }
  .msg_card_body{
      overflow-y: auto;
  }
  .card-header{
      border-radius: 15px 15px 0 0 !important;
      border-bottom: 0 !important;
  }
  .card-footer{
  border-radius: 0 0 15px 15px !important;
      border-top: 0 !important;
  }
  .container{
      align-content: center;
  }
  .search{
      border-radius: 15px 0 0 15px !important;
      background-color: rgba(0,0,0,0.3) !important;
      border:0 !important;
      color:white !important;
  }
  .search:focus{
      box-shadow:none !important;
    outline:0px !important;
  }
  .type_msg{
      background-color: rgba(0,0,0,0.3) !important;
      border:0 !important;
      color:white !important;
      height: 60px !important;
      overflow-y: auto;
  }
      .type_msg:focus{
      box-shadow:none !important;
    outline:0px !important;
  }
  .attach_btn{
  border-radius: 15px 0 0 15px !important;
  background-color: rgba(0,0,0,0.3) !important;
      border:0 !important;
      color: white !important;
      cursor: pointer;
  }
  .send_btn{
  border-radius: 0 15px 15px 0 !important;
  background-color: rgba(0,0,0,0.3) !important;
      border:0 !important;
      color: white !important;
      cursor: pointer;
  }
  .search_btn{
      border-radius: 0 15px 15px 0 !important;
      background-color: rgba(0,0,0,0.3) !important;
      border:0 !important;
      color: white !important;
      cursor: pointer;
  }
  .contacts{
      list-style: none;
      padding: 0;
  }
  .contacts li{
      width: 100% !important;
      padding: 5px 10px;
      margin-bottom: 15px !important;
  }
  .active{
      background-color: rgba(0,0,0,0.3);
  }
  .user_img{
      height: 70px;
      width: 70px;
      border:1.5px solid #f5f6fa;

  }
  .user_img_msg{
      height: 40px;
      width: 40px;
      border:1.5px solid #f5f6fa;

  }
  .img_cont{
      position: relative;
      height: 70px;
      width: 70px;
  }
  .img_cont_msg{
      height: 40px;
      width: 40px;
  }
  .online_icon{
  position: absolute;
  height: 15px;
  width:15px;
  background-color: #4cd137;
  border-radius: 50%;
  bottom: 0.2em;
  right: 0.4em;
  border:1.5px solid white;
  }
  .offline{
  background-color: #c23616 !important;
  }
  .user_info{
  margin-top: auto;
  margin-bottom: auto;
  margin-left: 15px;
  }
  .user_info span{
  font-size: 20px;
  color: white;
  }
  .user_info p{
  font-size: 10px;
  color: rgba(255,255,255,0.6);
  }
    .msg_cotainer{
  margin-top: auto;
  margin-bottom: auto;
  margin-left: 10px;
  border-radius: 25px;
  background-color: #82ccdd;
  padding: 10px;
  position: relative;
  }
  .msg_cotainer_send{
  margin-top: auto;
  margin-bottom: auto;
  margin-right: 10px;
  border-radius: 25px;
  background-color: #78e08f;
  padding: 10px;
  position: relative;
  }
  .msg_time{
  position: absolute;
  left: 0;
  bottom: -15px;
  color: rgba(255,255,255,0.5);
  font-size: 10px;
  }
  .msg_time_send{
  position: absolute;
  right:0;
  bottom: -15px;
  color: rgba(255,255,255,0.5);
  font-size: 10px;
  }
  .msg_head{
  position: relative;
  }
  #action_menu_btn{
  position: absolute;
  right: 10px;
  top: 10px;
  color: white;
  cursor: pointer;
  font-size: 20px;
  }
  .action_menu{
  z-index: 1;
  position: absolute;
  padding: 15px 0;
  background-color: rgba(0,0,0,0.5);
  color: white;
  border-radius: 15px;
  top: 30px;
  right: 15px;
  display: none;
  }
  .action_menu ul{
  list-style: none;
  padding: 0;
  margin: 0;
  }
  .action_menu ul li{
  width: 100%;
  padding: 10px 15px;
  margin-bottom: 5px;
  }
  .action_menu ul li i{
  padding-right: 10px;

  }
  .action_menu ul li:hover{
  cursor: pointer;
  background-color: rgba(0,0,0,0.2);
  }
  @media(max-width: 576px){
  .contacts_card{
  margin-bottom: 15px !important;
  }
  }
  /* width */
  ::-webkit-scrollbar {
    width: 10px;
  }

  /* Track */
  ::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey;
    border-radius: 10px;
  }

  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: #7F7FD5;
    border-radius: 10px;
  }

  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
    background: #5454b6;
  }
</style>

@vite('resources/js/app.js')

</head>
<body>
<div class="container-fluid h-50">
<div class="row justify-content-center h-100">

  <div class="col-md-8 col-xl-6 chat">
    <div class="card">
      <div class="card-header msg_head">
        <div class="d-flex bd-highlight">
          <div class="img_cont">
            <img src="https://therichpost.com/wp-content/uploads/2020/06/avatar2.png" class="rounded-circle user_img">
            <span class="online_icon"></span>
          </div>
          <div class="user_info">
            <span>{{$user->name}}</span>
          </div>
        </div>

      </div>
        <div class="card-body msg_card_body" id="chat-body">
            @foreach ($messages as $message)
                @if ($message->sender_id != auth()->user()->id)
                    <div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                            <img src="https://therichpost.com/wp-content/uploads/2020/06/avatar2.png" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                            {{$message->message}}
                            {{-- <span class="msg_time">{{$message->created_at->diffForHumans()}}</span> --}}
                        </div>
                    </div>
                @else
                    <div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send">
                            {{$message->message}}
                            {{-- <span class="msg_time_send">{{$message->created_at->diffForHumans()}}</span> --}}
                        </div>
                        <div class="img_cont_msg">
                            <img src="https://therichpost.com/wp-content/uploads/2020/06/avatar2.png" class="rounded-circle user_img_msg">
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
      <div class="card-footer">
        <form>
            @csrf
            <div class="input-group">
                <textarea id="message-input" name="message" class="form-control type_msg" placeholder="Type your message..."></textarea>
                <div class="input-group-append">
                    <span class="input-group-text send_btn"><button type="button" id="send-button"><i class="fas fa-location-arrow"></i></button></span>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const senderId = {{ auth()->id() }};
        const receiverId = {{ $user->id }};

        let chatId = [senderId, receiverId];
        let chatIds = Math.min(...chatId) + '.' + Math.max(...chatId)

        const chatBody = $('#chat-body');
        const messageInput = $('#message-input');
        const sendButton = $('#send-button');



        Echo.private(`chat.${chatIds}`)
        .listen('SendMessage', (e) => {
            appendMessage(e.message)
            console.log('Message received on receiver channel:', e);
        })
        .error((error) => {
            console.log('Channel error:', error);
        });


        sendButton.on('click', function () {
            const message = messageInput.val().trim();
            if (!message) return;

            $.ajax({
                url: "{{ route('users.storeMessage', $user->id) }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                data: { message: message },
                success: function (response) {
                    messageInput.val(''); // Clear input
                    appendMessage(response.message)
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                },
            });
        });

        function appendMessage(message) {
            let receiver = `<div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                            <img src="https://therichpost.com/wp-content/uploads/2020/06/avatar2.png" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                            ${message.message}
                        </div>
                    </div>`;

            let sender = `<div class="d-flex justify-content-end mb-4">
                <div class="msg_cotainer_send">
                    ${message.message}
                </div>
                <div class="img_cont_msg">
                    <img src="https://therichpost.com/wp-content/uploads/2020/06/avatar2.png" class="rounded-circle user_img_msg">
                </div>
            </div>`;

            $('#chat-body').append(
                message.sender_id != parseInt(senderId) ? receiver : sender

            );
        }

    });
</script>
</body>
</html>

