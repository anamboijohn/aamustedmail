<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

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
                            <div class="email-right-aside">
                                <div class="email-body">
                                    <div class="email-content">
                                        <div class="email-top">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="media">
                                                        @if (!empty($mails->sender->profile_photo_path))
                                                            <img class="me-3 rounded-circle"
                                                                src="https://ui-avatars.com/api/?name={{ $mails->sender->name }}"
                                                                alt="">
                                                        @else
                                                            <img class="me-3 rounded-circle"
                                                                src="https://ui-avatars.com/api/?name={{ $mails->sender->name }}"
                                                                alt="">
                                                        @endif

                                                        <div class="media-body">
                                                            <h6 class="d-block">{{ $mails->sender->name }} </h6>
                                                            <p>{{ $mails->subject }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="email-wrapper">
                                            <div class="emailread-group">
                                                <div class="read-group">

                                                    <p class="m-t-10">{{ $mails->body }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="emailread-group">
                                                <h6 class="text-muted mb-0"><i class="icofont icofont-clip"></i>
                                                    ATTACHMENTS</h6>

                                                    @if ($mails->file != '')
                                                <a wire:click.prevent="download()"
                                                    class="text-muted text-end right-download font-primary f-w-600"
                                                    type="button"><i class="fa fa-long-arrow-down me-2"></i>Download
                                                </a>
                                                @else

                                                @endif
                                                <div class="clearfix"></div>
                                                <div class="attachment">
                                                    <ul>

                                                        @if (pathinfo($mails->file, PATHINFO_EXTENSION) == ['doc', 'docx'])
                                                            <li><img class="img-fluid"
                                                                    src="{{ asset('assets\images\icons/word.png') }}"
                                                                    alt="">
                                                            </li>
                                                        @else
                                                            <li><img class="img-fluid"
                                                                    src="{{ asset('assets\images\icons/pdf.png') }}"
                                                                    alt="">
                                                            </li>
                                                        @endif

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="emailread-group">
                                                <div class="action-wrapper">
                                                    <ul class="actions">
                                                        <li>
                                                           
                                                                     @if ($mails->read == 1)
                                                               
                                                            @else
                                                                <a class="btn btn-primary" href=""
                                                                wire:click.prevent="markAsRead({{ $mails->id }})"><i
                                                                    class="fa fa-reply me-2"></i>Mark Seen</a>
                                                            @endif
                                                        </li>
                                                        <li>
                                                            @if ($mails->sender_id == auth()->id())
                                                                <a class="btn btn-warning"
                                                                    href="{{ route('staff.mail-edit', $mails) }}">
                                                                    <i class="fa fa-edit me-2"></i>Edit</a>
                                                                </a>
                                                            @else
                                                                <a class="btn btn-warning"
                                                                    href="{{ route('staff.reject-mail', $mails) }}">
                                                                    <i class="fa fa-reply-all me-2"></i>Reject</a>
                                                                </a>
                                                            @endif
                                                        </li>
                                                        <li>
                                                            <a class="btn btn-danger" href=""
                                                                wire:click.prevent="confirmMailRemoval({{ $mails->id }})">
                                                                <i class="fa fa-trash me-2"></i>Delete
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
