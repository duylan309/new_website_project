<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
	<body>
		<div id="wrapper">
			<!-- Navigation -->
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<!-- TOP LEFT -->
				<div class="navbar-header">
					<a class="navbar-brand" href="#"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
				</div>
				
				<!-- Top Right Items -->
				<ul class="nav navbar-right top-nav">
				
				</ul>
				<!-- MAIN MENU -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
				
				</div>
				<!-- /.navbar-collapse -->
			</nav>
			<!-- MAIN CONTAINER -->
			<div id="page-wrapper">
				<div class="container-fluid">
					{% block container %}
					{% endblock %}
				</div>
			</div>
		</div>
		
	</body>
</html>

