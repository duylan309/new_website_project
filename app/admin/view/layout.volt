<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		{% include 'default/element/header.volt' %}
	</head>
	<body>
		<div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					<a href="{{ url({'for': 'dashboard'}) }}" class="navbar-brand">
						<i class="fa fa-fw fa-dashboard"></i>
                        <span>Administrator</span>
					</a>
				</div>

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
                                <a href="#">
                                    <i class="fa fa-fw fa-power-off"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav menu-left-admin">
                        {% include 'default/element/main_menu.volt' %}
                    </ul>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    {% block container %} {% endblock %}
                </div>
            </div>
        </div>
    </body>
</html>
