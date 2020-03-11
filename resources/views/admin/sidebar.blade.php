<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="nav-link pl-1 pr-1 leading-none ">
                <img src="{{ asset( auth()->user()->image) }}" alt="user-img"
                     class="avatar-xl rounded-circle mb-1">
                <span class="pulse bg-success" aria-hidden="true"></span>
            </div>
            <div class="user-info">
                <h6 class=" mb-1 text-dark">{{auth()->user()->user_name}}</h6>
                <span class="text-muted app-sidebar__user-name text-sm">{{ auth()->user()->email }} </span>
            </div>
        </div>
    </div>
    <ul class="side-menu">
        <li>
            <a class="side-menu__item" href="{{ route('admin.home.index') }}">
                <i class="side-menu__icon fa fa-area-chart"></i>
                <span class="side-menu__label">{{ trans('dashboard') }}</span>
            </a>
        </li>

        <li>
            <a class="side-menu__item" href="{{ route('admin.users.index') }}">
                <span><i class="side-menu__icon fa fa-user"></i>{{ trans('users') }}</span>
            </a>
        </li>
        <li>
            <a class="side-menu__item" href="{{ url(app()->getLocale().'/admin/calendar') }}">
                <span><i class="side-menu__icon fa fa-user"></i>{{ trans('calendar') }}</span>
            </a>
        </li>

        <li>
            <a class="side-menu__item" href="{{ route('admin.users.import.create') }}">
                <span><i class="side-menu__icon fa fa-user"></i>import</span>
            </a>
        </li>

        <li>
            <a class="side-menu__item" href="{{ route('admin.locations.index') }}">
                <span><i class="side-menu__icon fa fa-map-pin"></i>{{ trans('locations') }}</span>
            </a>
        </li>

        <li>
            <a class="side-menu__item" href="{{ route('admin.departments.index') }}">
                <span><i class="side-menu__icon fa fa-map-pin"></i>Departments</span>
            </a>
        </li>

        <li>
            <a class="side-menu__item" href="{{ route('admin.positions.index') }}">
                <span><i class="side-menu__icon fa fa-map-pin"></i>Positions</span>
            </a>
        </li>

{{--        <li>--}}
{{--            <a class="side-menu__item" href="{{ route('admin.user.vacations.index') }}">--}}
{{--                <span><i class="side-menu__icon fa fa-map-pin"></i>Vacations</span>--}}
{{--            </a>--}}
{{--        </li>--}}


    </ul>
</aside>
