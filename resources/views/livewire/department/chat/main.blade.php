<div>
    {{-- Stop trying to control. --}}


    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Chat App</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item">Department </li>
                    <li class="breadcrumb-item">Chat</li>
                    <li class="breadcrumb-item active">Chat App</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <!-- Bookmark Start-->
                <div class="bookmark">
                    <ul>
                        <li>
                            <a href="{{ route('department.add-conversation') }}"
                                class="btn btn-pill btn-primary btn-air-primary" type="button">
                                <i class="fas fa-plus">

                                </i>
                            </a>

                        </li>
                    </ul>
                </div>
                <!-- Bookmark Ends-->
            </div>
        </div>
    </div>
    <!-- Container-Row starts-->
    <div class="row">
        <div class="col call-chat-sidebar">
            <div class="card">
                <div class="card-body chat-body">
                    <div class="chat-box">
                        <!-- Chat left side Start-->
                        @livewire('department.chat.chatlist')
                        <!-- Chat left side Ends-->
                    </div>
                </div>
            </div>
        </div>
        <div class="col call-chat-body">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row chat-box">
                        <!-- Chat right side start-->
                        <div class="col chat-right-aside">
                            <!-- chat start-->
                            <div class="chat">

                                @livewire('department.chat.chatbox')
                                <!-- end chat-history-->
                                @livewire('department.chat.send-message')
                                <!-- end chat-message-->
                                <!-- chat end-->
                                <!-- Chat right side ends-->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-Row Ends-->


    <script>
        window.addEventListener('chatSelected', event => {

            if (window.innerWidth < 768) {

                $('.chat_list_container').hide();
                $('.chat_box_container').show();

            }

            $('.chatbox_body').scrollTop($('.chatbox_body')[0].scrollHeight);
            let height = $('.chatbox_body')[0].scrollHeight;
            //alert(height);
            window.livewire.emit('updateHeight', {

                height: height,


            });
        });


        $(window).resize(function() {

            if (window.innerWidth > 768) {
                $('.chat_list_container').show();
                $('.chat_box_container').show();

            }

        });


        $(document).on('click', '.return', function() {

            $('.chat_list_container').show();
            $('.chat_box_container').hide();


        });
    </script>

    <script>
        // //let el= $('#chatBody');
        // let el = document.querySelector('#chatBody');
        // window.addEventListener('scroll', (event) => {
        //     // handle the scroll event 
        //     alert('aasd');

        // });
        $(document).on('scroll', '#chatBody', function() {
            alert('aasd');

            var top = $('.chatbox_body').scrollTop();
            if (top == 0) {

                window.livewire.emit('loadmore');
            }


        });
    </script>

</div>
