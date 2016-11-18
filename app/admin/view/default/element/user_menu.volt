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
                <a href="#" target="_blank">
                    <i class="fa fa-fw fa-gear"></i>
                    View website
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="{{ url({'for': 'auth_logout'}) }}">
                    <i class="fa fa-fw fa-power-off"></i>
                    Logout
                </a>
            </li>
        </ul>
    </li>
</ul>
