@auth()
    @if(auth()->user()->isAdmin())

    <a id="show-sidebar" class="btn btn-sm btn-dark">
        <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <a href="/dashboard">Dashboard</a>
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="sidebar-header">
                <div class="user-info">
          <span class="user-name">
            <strong>{{Auth::user()->name}}</strong>
          </span>
                    <span class="user-role">{{Auth::user()->role->role}}</span>
                    <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
                </div>
            </div>

            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu">
                        <span>General</span>
                    </li>
                    <li class="sidebar-dropdown active">
                        <a href="#">
                            <i class="fa fa-chart-line"></i>
                            <span>Tables</span>
                            <span class="badge badge-pill badge-warning">Manage</span>
                        </a>
                        <div class="sidebar-submenu" style="display:block;">
                            <ul>
                                <li>
                                    <a href="/authors">Authors</a>
                                </li>
                                <li>
                                    <a href="/books">Books
                                        <span class="badge badge-pill badge-success"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/genres">Genres</a>
                                </li>
                                <li>
                                    <a href="/roles">Roles</a>
                                </li>
                                <li>
                                    <a href="/users">Users</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-tachometer-alt"></i>
                            <span>Create New</span>
                            <span class="badge badge-pill badge-danger">Actions</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="/authors/create">Author</a>
                                </li>
                                <li>
                                    <a href="/books/create">Book</a>
                                </li>
                                <li>
                                    <a href="/genre/create">Genre</a>
                                </li>
                                <li>
                                    <a href="/roles/create">Role</a>
                                </li>
                                <li>
                                    <a href="/users/create">User</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="header-menu">
                        <span>Extra</span>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
        <div class="sidebar-footer">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fa fa-power-off"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </nav>


        @endif
    @endauth