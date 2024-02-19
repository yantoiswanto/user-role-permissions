@php
    $usr = Auth::guard('web')->user();
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/assets/dist/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">CMS</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info text-white">{{ $usr->name }}
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-header">MASTER</li>
                @if (
                    $usr->can('user.create') ||
                        $usr->can('user.view') ||
                        $usr->can('user.edit') ||
                        $usr->can('user.delete') ||
                        $usr->can('role.create') ||
                        $usr->can('role.view') ||
                        $usr->can('role.edit') ||
                        $usr->can('role.delete'))
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ Route::is('roles.create') ||
                            Route::is('roles.index') ||
                            Route::is('roles.edit') ||
                            Route::is('roles.show') ||
                            Route::is('users.create') ||
                            Route::is('users.index') ||
                            Route::is('users.edit') ||
                            Route::is('users.show')
                                ? 'active'
                                : '' }}">
                            <i class="nav-icon fas fa-user-lock"></i>
                            <p>
                                User Management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if ($usr->can('user.create') || $usr->can('user.view') || $usr->can('user.edit') || $usr->can('user.delete'))
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}"
                                        class="nav-link {{ Route::is('users.create') || Route::is('users.index') || Route::is('users.edit') || Route::is('users.show') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Users</p>
                                    </a>
                                </li>
                            @endif
                            @if ($usr->can('role.create') || $usr->can('role.view') || $usr->can('role.edit') || $usr->can('role.delete'))
                                <li class="nav-item">
                                    <a href="#"
                                        class="nav-link {{ Route::is('roles.create') || Route::is('roles.index') || Route::is('roles.edit') || Route::is('roles.show') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Roles & Permissions
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @if ($usr->can('role.view'))
                                            <li class="nav-item">
                                                <a href="{{ route('roles.index') }}"
                                                    class="nav-link {{ Route::is('roles.index') || Route::is('roles.edit') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>All Roles</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($usr->can('role.create'))
                                            <li class="nav-item">
                                                <a href="{{ route('roles.create') }}"
                                                    class="nav-link {{ Route::is('roles.create') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Create Role</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
