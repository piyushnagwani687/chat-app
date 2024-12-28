<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

            <!-- Font Awesome JS -->
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <style>
        .contacts_body{
            padding:  0.75rem 0 !important;
            overflow-y: auto;
            white-space: nowrap;
        }

        body,html{
        height: 100%;
        margin: 0;
        background: #7F7FD5;
        background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
        background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
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
        .card{
            height: 550px;
            border-radius: 15px !important;
            background-color: rgba(0,0,0,0.4) !important;
        }
        @media(max-width: 576px){
        .contacts_card{
        margin-bottom: 15px !important;
        }
        }

        .user_img{
          height: 70px;
          width: 70px;
          border:1.5px solid #f5f6fa;

        }
    </style>
</head>
<body>
    <div class="container-fluid h-50">
        <div class="row justify-content-center h-100">
            <div class="col-md-4 col-xl-3 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">

                <div class="card-body contacts_body">
                    <ul class="contacts">
                        @foreach ($users as $user)
                            <li>
                                <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img src="https://therichpost.com/wp-content/uploads/2020/06/avatar2.png" class="rounded-circle user_img">
                                    <span class="online_icon"></span>
                                </div>
                                <div class="user_info">
                                    <p class="mt-4 ml-2 text-grey"><a href="{{route('users.show', $user->id)}}">{{$user->name}}</a></p>
                                </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</body>
