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

                {% if session.has('USER') %}
                    {% include 'default/element/user_menu.volt' %}

                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        {% include 'default/element/main_menu.volt' %}
                    </div>
                {% endif %}
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    {% block container %} {% endblock %}
                </div>
            </div>
        </div>
    </body>
</html>
