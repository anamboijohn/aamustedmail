<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <div class="chat-left-aside">
        <div class="media">
            <img class="rounded-circle user-image"
                src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{ auth()->user()->name }}"
                alt="">
            <div class="media-body">
                <div class="about">
                    <div class="name f-w-600">{{ auth()->user()->name }}</div>
                    <div class="status">{{ auth()->user()->email }}</div>
                </div>
            </div>
        </div>
        <div class="people-list" id="people-list">
            <div class="search">
                <form class="theme-form">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="search"><i class="fa fa-search"></i>
                    </div>
                </form>
            </div>
            <ul class="list custom-scrollbar">

                @if (count($conversations) > 0)
                    @foreach ($conversations as $conversation)
                        <li class="clearfix" type="button" wire:key='{{ $conversation->id }}'
                            wire:click="$emit('chatUserSelected', {{ $conversation }},{{ $this->getChatUserInstance($conversation, $name = 'id') }})">
                            <div class="media"><img class="rounded-circle user-image"
                                    src="https://ui-avatars.com/api/?name={{ $this->getChatUserInstance($conversation, $name = 'name') }}"
                                    alt="">
                                <div class="status-circle away"></div>
                                <div class="media-body">
                                    <div class="about">
                                        <div class="name">
                                            {{ $this->getChatUserInstance($conversation, $name = 'name') }}

                                            @php
                                                if (count($conversation->messages->where('read', 0)->where('receiver_id', Auth()->user()->id))) {
                                                    echo ' <span class="badge rounded-pill badge-danger">  ' . count($conversation->messages->where('read', 0)->where('receiver_id', Auth()->user()->id)) . '</span> ';
                                                }
                                                
                                            @endphp
                                        </div>
                                        <div class="status digits">Last Seen
                                            {{ $conversation->messages->last()?->created_at->shortAbsoluteDiffForHumans() }}
                                        </div>
                                        <div class="status text-truncate">{{ $conversation->messages->last()->body }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @else
                    No conversations
                @endif

            </ul>
        </div>
    </div>

</div>
