<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand me-3" href=" {{ url('/') }} ">
            <i class="fab fa-atlassian fa-fw fa-xl text-primary"></i>
        </a>

        <a href="{{ url('admin/dashboard') }}" target="_blank">
{{--            <button type="button" class="btn btn-outline-danger text-danger px-3" href="{{ url('admin/dashboard') }}">--}}
{{--                DASHBOARD--}}
{{--            </button>--}}
            <button
                class="bg-primary text-white one rounded-md py-2.5 px-[10px]"
                id="headlessui-tabs-tab-:rv:" role="tab" aria-selected="false"
                tabindex="-1" data-headlessui-state="" type="button">
                ផ្ទាំងគ្រប់គ្រងផុស
            </button>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('ចូលគណនី') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('បង្កើតគណនី') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark font-semibold text-uppercase" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{  Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('ចេញពីគណនី') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
