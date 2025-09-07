<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">{{ @config('app.name') }}</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('executive.dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span>
                </a>
            </li>

            <li
                class="nav-item dropdown {{ Request::routeIs('admin.departments.*') || Request::routeIs('admin.executive_members.*') || Request::routeIs('admin.interns.*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa-solid fa-user-graduate"></i>
                    <span>Internship</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::routeIs('admin.departments.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.departments.index') }}">All Departments</a>
                    </li>
                    <li class="{{ Request::routeIs('admin.executive_members.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.executive_members.index') }}">All Members</a>
                    </li>
                    <li class="{{ Request::routeIs('admin.interns.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.interns.index') }}">All Interns</a>
                    </li>
                    <li class="{{ Request::routeIs('certificates.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.certificates.index') }}">Certificates</a>
                    </li>

                </ul>
            </li>


            <li class="nav-item dropdown  {{ Request::routeIs('blog.*') ? 'active' : '' }}">

                <a href="#" class="nav-link has-dropdown "><i class="fa-solid fa-blog"></i><span>Blogs</span></a>
                <ul class="dropdown-menu ">
                    <li class = "{{ Request::routeIs('blog.create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('blog.create') }}">Add Blog</a>
                    </li>
                    <li class="{{ Request::routeIs('blog.list') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('blog.list') }}">Blog List</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::routeIs('settings.*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fa-solid fa-gear"></i> <span>Settings</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::routeIs('settings.basic') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('settings.basic') }}">Basic Settings</a>
                    </li>
                    <li class="{{ Request::routeIs('settings.banner') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('settings.banner') }}">Banner Settings</a>
                    </li>
                    <li class="{{ Request::routeIs('contact/message') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('settings.contactShow') }}">Contact Message</a>
                    </li>
                </ul>
            </li>
            {{-- @role('admin') --}}
            <li class="nav-item dropdown {{ Request::routeIs('about.*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fa-solid fa-circle-info"></i> <span>About</span>
                </a>
                <ul class="dropdown-menu">

                    <li class="{{ Request::routeIs('about.edit') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('about.edit') }}">Edit About</a>
                    </li>
                </ul>
            </li>
            {{-- @endrole --}}
            <li class="nav-item dropdown {{ Request::routeIs('directors.*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fa-solid fa-user-tie"></i> <span>Directors</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::routeIs('directors.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.directors.index') }}">Director List</a>
                    </li>
                </ul>
            </li>

        </ul>
        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fa-solid fa-right-from-bracket"></i> Sign Out
                </button>
            </form>
        </div>
    </aside>
</div>
