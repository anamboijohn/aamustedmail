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
                                                                src="../../../assets/images/user/user.png"
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
                                            <form class="theme-form" wire:submit.prevent="rejectMail"
                                                autocomplete="off">
                                                <div class="emailread-group">
                                                    <textarea wire:model.defer='body' class="form-control" rows="4" cols="50"
                                                        placeholder="Write the reason behind declining mail."></textarea>
                                                    <div class="action-wrapper">
                                                        <ul class="actions">
                                                            <li>
                                                                <button class="btn btn-secondary" type="submit"><i
                                                                        class="fa fa-paper-plane me-2"></i>send
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button class="btn btn-danger" type="reset">
                                                                    <i class="fa fa-times me-2"></i>cancel
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </form>
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
