<div>
    {{-- In work, do what you enjoy. --}}
    @if ($selectedConversation)
        <form wire:submit.prevent='sendMessage' action="">

            <div class="chat-message clearfix">
                <div class="row">
                    <div class="col-xl-12 d-flex">
                        {{-- <div class="smiley-box bg-primary">
                            <div class="picker"><img src="{{ asset('assets/images/smiley.png') }}" alt=""></div>
                        </div> --}}
                        <div class="input-group text-box">
                            <input wire:model='body' class="form-control input-txt-bx" id="message-to-send" type="text"
                                name="message-to-send" placeholder="Type a message......">
                            <button class="btn btn-primary input-group-text" type="submit">SEND</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    @endif

</div>
