<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <div class="email-wrap">
        <div class="row">
            <div class="col-xl-3 col-md-6 xl-30">
                <div class="email-sidebar"><a class="btn btn-primary email-aside-toggle" href="javascript:void(0)">email
                        filter</a>
                    <div class="email-left-aside open">
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
                            <div class="email-body">
                                <div class="email-compose">
                                    <div class="email-top compose-border">
                                        <div class="compose-header">
                                            <h4 class="mb-0">New Maill</h4>

                                        </div>
                                    </div>
                                    <div class="email-wrapper">
                                        <form class="theme-form" wire:submit.prevent="composeMail" autocomplete="off">
                                            <div class="form-group">
                                                <label class="col-form-label pt-0" for="receiver_id">To</label>
                                                <select wire:model.defer="state.receiver_id"
                                                    class="form-select @error('receiver_id') is-invalid @enderror btn-pill"
                                                    id="receiver_id">
                                                    <option disabled selected>---Select Department---</option>
                                                    @forelse ($departments as $department)
                                                        <option value="{{ $department->id }}">{{ $department->name }}
                                                        </option>
                                                    @empty
                                                        Nothing to select
                                                    @endforelse

                                                </select>
                                                @error('receiver_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="subject">Subject</label>
                                                <input wire:model.defer="state.subject"
                                                    class="form-control @error('subject') is-invalid @enderror btn-pill"
                                                    id="subject" type="text">
                                                @error('subject')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="message">
                                                    Message</label>
                                                <textarea wire:model.defer="state.body" class="form-control @error('body') is-invalid @enderror btn-pill" id="message"
                                                    rows="3"></textarea>
                                                @error('body')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="mb-3 row">
                                                    <label> Upload File</label>
                                                    <div class="col-sm-12">
                                                        <input wire:model="file"
                                                            class="form-control @error('file') is-invalid @enderror"
                                                            type="file">
                                                        @error('file')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
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
