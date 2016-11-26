{% extends 'layout.volt' %}

{% block title %}{{ t._('dashboard') }}{% endblock %}

{% block container %}
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header row">
                <div class="col-sm-6">
                    <h3 class="no-margin">{{ t._('dashboard') }}</h3>
                </div>
            </div>

            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i>
                    <span>{{ t._('dashboard') }}</span>
                </li>
            </ol>
        </div>
    </div>
{% endblock %}
