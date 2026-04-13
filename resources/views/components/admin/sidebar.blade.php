<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo" /> <span
                    class="logo-name">Clinic Nepal </span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main Menu</li>
            <li class="dropdown {{Route::is('dashboard')? 'active': ''}}">
                <a href="/dashboard" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>


            <li class="{{Route::is('doctor.*')? 'active': ''}}">
                <a href="{{route('doctor.index')}}" class="nav-link "><i data-feather="user"></i><span>Specialities</span></a>
            </li>
            <li class="{{Route::is('patient.*')?'active':''}}">
                <a href="{{route('patient.index')}}" class="nav-link"><i data-feather="users"></i><span>Patients</span></a>
            </li>
            @can('view appointment')
            <li class="{{Route::is('appointment.*')? 'active': ''}}">
                <a href="{{route('appointment.index')}}" class="nav-link"><i data-feather="calendar"></i><span>Appontments</span></a>
            </li>
            @endcan

            @can('view schedule')

            <li>
                <a href="{{route('schedule.index')}}" class="nav-link {{Route::is('schedule.*')? 'active': ''}}"><i data-feather="clock"></i><span>Schedules</span></a>
            </li>
            @endcan


            <li>
                <a href="{{route('users.index')}}" class="nav-link {{Route::is('users.*')? 'active': ''}}"><i data-feather="users"></i><span>Users</span></a>
            </li>
            <li>
                <a href="#" class="nav-link"><i data-feather="coffee"></i><span>Medicine</span></a>
            </li>
            <li>
                <a href="#" class="nav-link"><i data-feather="bar-chart-2"></i><span>Analytics</span></a>
            </li>
            <li>
                <a href="#" class="nav-link"><i data-feather="file-text"></i><span>Invoices</span></a>
            </li>
            <li>
                <a href="#" class="nav-link"><i data-feather="package"></i><span>Inventory</span></a>
            </li>
            <li>
                <a href="#" class="nav-link"><i data-feather="settings"></i><span>Settings</span></a>
            </li>
            {{-- @can('view role') --}}

            <li>
                <a href="{{route('roles.index')}}" class="nav-link"><i data-feather="settings"></i><span>Roles</span></a>
            </li>
            {{-- @endcan --}}

            {{-- @can('view permission') --}}

            <li>
                <a href="{{route('permissions.index')}}" class="nav-link"><i data-feather="settings"></i><span>Permission</span></a>
            </li>
            {{-- @endcan --}}

            <li>
                <a href="{{route('profile.edit')}}" class="nav-link {{Route::is('profile*')? 'active': ''}}"><i data-feather="user"></i><span>Profile Management</span></a>
            </li>







            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="command"></i><span>Apps</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="chat.html">Chat</a></li>
                    <li><a class="nav-link" href="portfolio.html">Portfolio</a></li>
                    <li><a class="nav-link" href="blog.html">Blog</a></li>
                    <li><a class="nav-link" href="calendar.html">Calendar</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="mail"></i><span>Email</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="email-inbox.html">Inbox</a></li>
                    <li><a class="nav-link" href="email-compose.html">Compose</a></li>
                    <li><a class="nav-link" href="email-read.html">read</a></li>
                </ul>
            </li>


            <li class="menu-header">UI Elements</li>




        </ul>
    </aside>
</div>
