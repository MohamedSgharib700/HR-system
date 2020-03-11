<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="nav-link pl-1 pr-1 leading-none ">
                <img src="{{ asset( auth()->user()->image) }}" alt="user-img" class="avatar-xl rounded-circle mb-1">
                <span class="pulse bg-success" aria-hidden="true"></span>
            </div>
            <div class="user-info">
                <h6 class=" mb-1 text-dark">{{auth()->user()->name}}</h6>
                <span class="text-muted app-sidebar__user-name text-sm">{{ auth()->user()->email }} </span>
            </div>
        </div>
    </div>
    <ul class="side-menu">
        <li>
            <a class="side-menu__item" href="/normal">
                <i class="side-menu__icon fa fa-area-chart"></i>
                <span class="side-menu__label">My dashboard</span>
            </a>
        </li>


    </ul>
</aside>
