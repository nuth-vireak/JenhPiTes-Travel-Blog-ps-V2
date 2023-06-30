<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

<nav class="sb-topnav navbar navbar-expand d-flex justify-content-between">

    <!-- Navbar Brand-->
    <div class="navbar-brand ps-3">
        <div style="width: 35px; height: 34px;"></div>
    </div>

    <a class="navbar-brand me-3" href=" {{ url('/') }} ">
        <i class="fab fa-atlassian fa-fw fa-xl text-primary"></i>
    </a>

    <div class="d-flex justify-content-end">

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-2 me-lg-2">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                   aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider"/>
                    </li>
                    <li><a class="dropdown-item" href=" {{ route('logout') }} " onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </li>
        </ul>

        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-3 me-lg-3" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i>
        </button>

    </div>
</nav>
