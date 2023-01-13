<div class="page-main-header">
    <div class="main-header-right row m-0">
        <div class="main-header-left">
            <div class="logo-wrapper">
                <a href="{{ route('staff.dashboard') }}" class="text-strong">
                    <b>SENDY</b>
                </a>
            </div>
            <div class="toggle-sidebar">
                <i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle">
                </i>
            </div>
        </div>
        <div class="left-menu-header col">
            <ul>
                <li>
                    <form class="form-inline search-form">
                        <div class="search-bg"><i class="fa fa-search"></i>
                            <input class="form-control-plaintext" placeholder="Search here.....">
                        </div>
                    </form><span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span>
                </li>
            </ul>
        </div>
        <div class="nav-right col pull-right right-menu p-0">
            <ul class="nav-menus">
                <li>
                    <a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                            data-feather="maximize"></i>
                    </a>
                </li>

                <li>
                    <div class="mode"><i class="fa fa-moon-o"></i></div>
                </li>

                @livewire('staff.auth.logout')
            </ul>
        </div>
        <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
    </div>
</div>
