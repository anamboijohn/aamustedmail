<div>
    {{-- The whole world belongs to you. --}}
    <div class="email-app-sidebar">
        <div class="media">
            <div class="media-size-email">
                @if (!empty(auth()->user()->profile_photo_path))
                    <img class="me-3 rounded-circle" src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                        alt="">
                @else
                    <img class="me-3 rounded-circle" src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                        alt="">
                @endif
            </div>
            <div class="media-body">
                <h6 class="f-w-600">{{ auth()->user()->name }}</h6>
                <p>{{ auth()->user()->email }}</p>
            </div>
        </div>
        <ul class="nav main-menu" role="tablist">
            <li class="nav-item">
                <a class="btn-primary btn-block btn-mail w-100" href="{{ route('staff.compose-mail') }}">
                    <i class="fas fa-envelope me-2"></i> NEW MAIL
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('staff.mail-inbox') }}">
                    <span class="title">
                        <i class="fas fa-inbox"></i> Inbox
                    </span>
                    <span class="badge pull-right">({{ $inbox }})</span>
                </a>
            </li>
            <li>
                <a href="{{ route('staff.mail-all') }}">
                    <span class="title">
                        <i class="fas fa-folder"></i> All
                        mail
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('staff.mail-sent') }}">
                    <span class="title">
                        <i class="fa-solid fa-envelope-circle-check"></i>
                        Sent</span>
                    <span class="badge pull-right">({{ $sent }})</span>
                </a>
            </li>

            <li>
                <a href="{{ route('staff.declined-mail') }}">
                    <span class="title">
                        <i class="fas fa-trash"></i>
                        Declined Mails
                    </span>
                    <span class="badge pull-right">({{ $declined }})</span>
                </a>
            </li>

        </ul>
    </div>

</div>
