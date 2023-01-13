<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a>
        <img class="img-90 rounded-circle" src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
            alt="">
        <div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="user-profile.html">
            <h6 class="mt-3 f-14 f-w-600">{{ auth()->user()->name }}</h6>
        </a>
        <p class="mb-0 font-roboto">{{ auth()->user()->email }}</p>
        <ul>
            <li><span><span class="counter">19.8</span>k</span>
                <p>Messages</p>
            </li>
            <li><span><span class="counter">10.8</span>k</span>
                <p>Mails</p>
            </li>
            <li><span><span class="counter">95.2</span>k</span>
                <p>Conversations </p>
            </li>
        </ul>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end">
                            <span>Back</span>
                            <i class="fa fa-angle-right ps-2" aria-hidden="true">
                            </i>
                        </div>
                    </li>

                    <li class="sidebar-main-title">
                        <div>
                            <h6>ACTIVITY </h6>
                        </div>
                    </li>

                    <li>
                        <a class="nav-link menu-title link-nav {{ request()->segment(2) == 'chat' ? 'active' : '' }}"
                            href="{{ route('staff.chat') }}">
                            <i data-feather="message-circle"></i>
                            <span>Staff Chat</span>
                        </a>
                    </li>

                    <li>
                        <a class="nav-link menu-title link-nav {{ request()->segment(2) == 'mail' ? 'active' : '' }}"
                            href="{{ route('staff.mail-inbox') }}">
                            <i data-feather="mail"></i>
                            <span>Document Mailing</span>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
