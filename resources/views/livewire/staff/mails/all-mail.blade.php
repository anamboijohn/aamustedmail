<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <div class="email-wrap">
        <div class="row">

            <div class="col-xl-3 col-md-6 xl-30">
                <div class="email-sidebar"><a class="btn btn-primary email-aside-toggle" href="javascript:void(0)">email
                        filter</a>
                    <div class="email-left-aside">
                        <div class="card">
                            <div class="card-body">

                                @livewire('staff.mails.mail-sidebar')

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-9 col-md-12 xl-70">
                <div class="email-right-aside">
                    <div class="card email-body">
                        <div class="email-profile">
                            <div>
                                <div class="pe-0 b-r-light"></div>

                                <div class="email-top">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="media">
                                                <label class="email-chek d-block" for="chk-ani">
                                                    <input wire:model="selectPageRows" class="checkbox_animated"
                                                        id="chk-ani" type="checkbox" checked="">
                                                </label>
                                                <div class="media-body">
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle"
                                                            id="dropdownMenuButton" type="button"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">Action</button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item"
                                                                wire:click.prevent="deleteSelectedRows"
                                                                type="button">Delete</a>
                                                            <a class="dropdown-item" wire:click.prevent="markAllAsRead"
                                                                type="button">Mark
                                                                as Read</a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="inbox">
                                    @forelse ($mails as $mail)
                                        <div class="media">
                                            <div class="media-size-email">
                                                <label class="d-block mb-0" for="chk-ani">
                                                    <input class="checkbox_animated" wire:model="selectedRows"
                                                        type="checkbox" value="{{ $mail->id }}" name="todo2"
                                                        id="{{ $mail->id }}">
                                                </label>
                                                <img class="me-3 rounded-circle"
                                                    src="https://ui-avatars.com/api/?name={{ $mail->sender->name }}"
                                                    alt="">
                                            </div>
                                            <div class="media-body d-flex">
                                                <h6>{{ $mail->subject }} </h6>
                                                <p>{{ $mail->body }}</p>
                                                <span>{{ $mail->created_at->shortAbsoluteDiffForHumans() }}</span>

                                                <div class="ml-10">
                                                    <a href="{{ route('staff.mail-read', $mail) }}">
                                                        <i class="fas fa-eye text-secondary mr-2"></i>
                                                    </a>
                                                    @if ($mail->sender_id == auth()->id())
                                                        <a href="{{ route('staff.mail-edit', $mail) }}">
                                                            <i class="fas fa-edit mr-2"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('staff.reject-mail', $mail) }}">
                                                            <i class="fas fa-reply text-warning mr-2"></i>
                                                        </a>
                                                    @endif
                                                    <a href=""
                                                        wire:click.prevent="confirmMailRemoval({{ $mail->id }})">
                                                        <i class="fas fa-trash text-danger"></i>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                    @empty
                                        <div class="alert alert-primary dark justify-content-center" role="alert">
                                            <p>No mails found!</p>
                                        </div>
                                    @endforelse

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-inputs.confirmation-alert />

</div>
