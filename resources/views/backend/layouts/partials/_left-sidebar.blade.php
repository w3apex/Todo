@php
    $usr = Auth::user();
@endphp
<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li class="menu-title">Navigation</li>
                @if($usr->can('dashboard.view'))
                    <li>
                        <a href="#sidebarDashboards" data-toggle="collapse">
                            <i data-feather="airplay"></i>
                            <span> Dashboards </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarDashboards">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{route('dashboard.view')}}">Dashboard</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                <li>
                    <a href="#sidebarPeople" data-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> People</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarPeople">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('users.index')}}">User</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarPeople" data-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> Role & Permissions</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarPeople">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('roles.index')}}">Role</a>
                            </li>
                            <li>
                                <a href="{{route('permissions.index')}}">Permissions</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
</div>