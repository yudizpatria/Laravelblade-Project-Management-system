<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Zabta</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">zt</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main Menu</li>

            {{--  Directure  sidebar --}}
            @role('directure')
            <li class="{{ Request::is('directure/dashboard') ? 'active' : ''}}"><a class="nav-link"
                    href="{{route('directure.dashboard')}}"><i class="far fa-square"></i> <span>Dashboard</span></a>
            </li>
            <li class="{{ Request::is('directure/data_project*') ? 'active' : ''}}"><a class="nav-link"
                    href=" {{ route('data_project.index')}} "><i class="far fa-square"></i> <span>Data
                        Project</span></a></li>
            <li class="{{ Request::is('directure/data_task*') ? 'active' : ''}}"> <a class="nav-link"
                    href=" {{route('data_task.index')}} "><i class="far fa-square"></i> <span>Data Task</span></a></li>
            <li class="{{ Request::is('directure/data_employee*') ? 'active' : ''}}"><a class="nav-link"
                    href="{{ route('data_employee.index') }}"><i class="far fa-square"></i> <span>Data
                        Employee</span></a></li>
            <li class="{{ Request::is('directure/data_client*') ? 'active' : ''}}"><a class="nav-link"
                    href="{{ route('data_client.index') }}"><i class="far fa-square"></i> <span>Data Client</span></a>
            </li>

            {{-- Employee Sidebar --}}
            @elserole('employee')
            <li class="{{ Request::is('employee/dashboard') ? 'active' : ''}}"><a class="nav-link"
                    href="{{route('employee.dashboard')}}"><i class="far fa-square"></i> <span>Dashboard</span></a>
            </li>
            <li class="{{ Request::is('employee/project*') ? 'active' : ''}}"><a class="nav-link"
                    href=" {{ route('project.index')}} "><i class="far fa-square"></i> <span>
                        Project</span></a></li>
            <li class="{{ Request::is('employee/task*') ? 'active' : ''}}"> <a class="nav-link"
                    href=" {{route('task.index')}} "><i class="far fa-square"></i> <span>Task</span></a></li>

            {{-- Client Sidebar --}}
            @elserole('client')
            <li class="{{ Request::is('client/dashboard') ? 'active' : ''}}"><a class="nav-link"
                    href="{{route('client.dashboard')}}"><i class="far fa-square"></i> <span>Dashboard</span></a>
            </li>
            <li class="{{ Request::is('client/project_list*') ? 'active' : ''}}"><a class="nav-link"
                    href="{{route('project_list.index')}}"><i class="far fa-square"></i> <span>Project list</span></a>
            </li>
            @endrole
        </ul>

    </aside>
</div>
