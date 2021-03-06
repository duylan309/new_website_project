<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>{% block title %}Administrator{% endblock %}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        {% include 'default/element/asset.volt' %}
    </head>
    <body>
        <div id="wrapper">
            <nav data-menu-top class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <div class="logo-sm form-group">
                        <a href="{{ url({'for': 'dashboard'}) }}" class="navbar-brand">
                            <img class="text-center" src="{{ config.asset.url ~ 'img/logo.png?' ~ config.asset.version }}" >
                        </a>
                    </div>
                </div>

                {% if session.has('USER_ADMIN') %}
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

        {% block bottom_script %}{% endblock %}
    </body>
</html>
