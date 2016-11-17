<ul class="nav navbar-right top-nav">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-user"></i>
            Admin
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
                <a href="{{ url({'for': 'auth_login'}) }}">
                    <i class="fa fa-fw fa-power-off"></i>
                    Logout
                </a>
            </li>
        </ul>
    </li>
</ul>
