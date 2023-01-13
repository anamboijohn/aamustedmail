<div>
    {{-- Stop trying to control. --}}

    @if ($selectedConversation)
        <!-- chat-header start-->
        <div class="media chat-header clearfix"><img class="rounded-circle"
                src="https://ui-avatars.com/api/?name={{ $receiverInstance->name }}" alt="">
            <div class="media-body">
                <div class="about">
                    <div class="name">{{ $receiverInstance->name }}</div>
                    <div class="status digits">Joined:
                        {{ $receiverInstance->created_at->shortAbsoluteDiffForHumans() }}</div>
                </div>
            </div>
            <ul class="list-inline float-start float-sm-end chat-menu-icons">

                <li class="list-inline-item toogle-bar">
                    <a href="javascript:void(0)">
                        <i data-feather="menu"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- chat-header end-->

        <div class="chat-history chat-msg-box custom-scrollbar">
            <ul class="chatbox_body">
                @foreach ($messages as $message)
                    <li class="clearfix">
                        <div class="message {{ auth()->id() == $message->sender_id ? 'other-message pull-right bg-success' : 'my-message' }}"
                            style="width:80%;max-width:80%;max-width:max-content">
                            <img class="rounded-circle {{ auth()->id() == $message->sender_id ? 'float-end' : 'float-start' }} chat-user-img img-30"
                                src="https://ui-avatars.com/api/?name={{ $message->user->name }}" alt="">
                            <div class="message-data {{ auth()->id() == $message->sender_id ? 'text-end' : '' }}">
                                <span class="message-data-time text-white">
                                    {{ $message->created_at->format('m: i a') }}</span>
                            </div>
                            {{ $message->body }}

                            <div class="message-data text-end">
                                @php
                                    
                                    if ($message->user->id === auth()->id()) {
                                        if ($message->read == 0) {
                                            echo '<i class="fa-sharp fa-solid fa-check status_tick"></i> ';
                                        } else {
                                            echo '<i class="fa-sharp fa-solid fa-check-double text-warning"></i> ';
                                        }
                                    }
                                    
                                @endphp
                            </div>

                        </div>
                    </li>
                @endforeach
            </ul>

            <script>
                $(".chatbox_body").on('scroll', function() {
                    // alert('aahsd');
                    var top = $('.chatbox_body').scrollTop();
                    //   alert('aasd');
                    if (top == 0) {

                        window.livewire.emit('loadmore');
                    }

                });
            </script>


            <script>
                window.addEventListener('updatedHeight', event => {

                    let old = event.detail.height;
                    let newHeight = $('.chatbox_body')[0].scrollHeight;

                    let height = $('.chatbox_body').scrollTop(newHeight - old);


                    window.livewire.emit('updateHeight', {
                        height: height,
                    });


                });
            </script>

        </div>
    @else
        <div class="alert alert-primary text-center" role="alert">
            <p>No Conversasion Selected!</p>
        </div>

    @endif

    <script>
        window.addEventListener('rowChatToBottom', event => {

            $('.chatbox_body').scrollTop($('.chatbox_body')[0].scrollHeight);

        });
    </script>


    <script>
        $(document).on('click', '.return', function() {


            window.livewire.emit('resetComponent');

        });
    </script>


    <script>
        window.addEventListener('markMessageAsRead', event => {
            var value = document.querySelectorAll('.status_tick');

            value.array.forEach(element, index => {


                element.classList.remove('fa-sharp fa-solid fa-check');
                element.classList.add('fa-sharp fa-solid fa-check-double', 'text-primary');
            });

        });
    </script>

</div>
