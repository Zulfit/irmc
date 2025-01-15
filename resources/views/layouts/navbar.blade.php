<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
        <a class="nav-link " href="/dashboard">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Staff</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                <a href="{{route('staff.index')}}">
                    <i class="bi bi-circle"></i><span>Staff List</span>
                </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Academicians</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
            <a href="{{route('academicians.index')}}">
                <i class="bi bi-circle"></i><span>Academicians List</span>
            </a>
            </li>
        </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Project</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
            <a href="{{route('projects.index')}}">
                <i class="bi bi-circle"></i><span>Project List</span>
            </a>
            </li>
            <li>
            <a href="{{route('projects.create')}}">
                <i class="bi bi-circle"></i><span>Project Create</span>
            </a>
            </li>
        </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Milestone</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
            <a href="{{route('milestones.index')}}">
                <i class="bi bi-circle"></i><span>Milestone List</span>
            </a>
            </li>
            {{-- <li>
            <a href="{{route('milestones.create')}}">
                <i class="bi bi-circle"></i><span>Milestone Create</span>
            </a>
            </li> --}}
        </ul>
        </li><!-- End Tables Nav -->

        {{-- <li class="nav-heading">Pages</li> --}}

        {{-- <li class="nav-item">
        <a class="nav-link collapsed" href={{'profile'}}>
            <i class="bi bi-person"></i>
            <span>Profile</span>
        </a>
        </li><!-- End Profile Page Nav --> --}}

        <li class="nav-item">
        {{-- <a class="nav-link collapsed" href={{'register'}}>
            <i class="bi bi-card-list"></i>
            <span>Register</span>
        </a>
        </li><!-- End Register Page Nav --> --}}

        {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="{{'login'}}">
            <i class="bi bi-box-arrow-in-right"></i>
            <span>Login</span>
        </a>
        </li><!-- End Login Page Nav --> --}}

    </ul>

    </aside><!-- End Sidebar-->