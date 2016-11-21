{% set user_session = session.get('USER_ADMIN') %}

<ul class="nav navbar-right top-nav">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-user"></i>
            {{ user_session['name'] }}
            <b class="caret"></b>
        </a>

        <ul class="dropdown-menu">
            <li>
                <a href="#">
                    <i class="fa fa-fw fa-gear"></i>
                    {{ t._('account') }}
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="{{ url({'for': 'auth_logout'}) }}">
                    <i class="fa fa-fw fa-power-off"></i>
                    {{ t._('logout') }}
                </a>
            </li>
        </ul>
    </li>
</ul>
