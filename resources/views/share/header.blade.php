<div class="topbar d-flex align-items-center">
    @php
        $check = Auth::guard('customer')->user();
    @endphp
    <nav class="navbar navbar-expand">
        <div class="topbar-logo-header">
            <div class="">
                <img src="/assets_rocker/images/logo-icon.png" class="logo-icon" alt="logo icon">
            </div>
            <div class="">
                <h4 class="logo-text">Travel</h4>
            </div>
        </div>
        <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
        <div class="search-bar flex-grow-1">
            <div class="position-relative search-bar-box">
                <input type="text" class="form-control search-control" placeholder="Type to search..."> <span
                    class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
                <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
            </div>
        </div>

        <div class="user-box dropdown">
            @if(Auth::guard('admin')->check())
            @php
                $admin = Auth::guard('admin')->user();
            @endphp
            <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="/assets_rocker/images/banner/admin_avatar.jpg" class="user-img" alt="user avatar">
                <div class="user-info ps-3">
                    <p class="user-name mb-0">{{ $admin->hoTen }}</p>
                    <p class="designattion mb-0">{{ $admin->email }}</p>
                </div>
            </a>
            @endif
            <ul class="dropdown-menu dropdown-menu-end">
                {{-- <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
                </li>
                <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
                </li>
                <li><a class="dropdown-item" href="javascript:;"><i
                            class='bx bx-home-circle'></i><span>Dashboard</span></a>
                </li>
                <li><a class="dropdown-item" href="javascript:;"><i
                            class='bx bx-dollar-circle'></i><span>Earnings</span></a>
                </li>
                <li><a class="dropdown-item" href="javascript:;"><i
                            class='bx bx-download'></i><span>Downloads</span></a>
                </li> --}}
                <li>
                    <div class="dropdown-divider mb-0"></div>
                </li>
                <li><a class="dropdown-item" href="/tai-khoan/logout"><i
                            class='bx bx-log-out-circle'></i><span>Logout</span></a>
                </li>
            </ul>
        </div>
    </nav>
</div>
