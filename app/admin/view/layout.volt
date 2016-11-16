<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        {% include 'default/element/header.volt' %}
	</head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <i class="fa fa-fw fa-dashboard"></i>
                        Dashboard
                    </a>
                </div>

                <ul class="nav navbar-right top-nav">
                </ul>

                <div class="collapse navbar-collapse navbar-ex1-collapse">
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    {% block container %}{% endblock %}
                </div>
            </div>
        </div>
    </body>
</html>

