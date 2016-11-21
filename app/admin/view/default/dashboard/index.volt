{% extends 'layout.volt' %}

{% block title %}{{ t._('dashboard') }}{% endblock %}

{% block container %}
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
                <span>{{ t._('dashboard') }}</span>
            </h3>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i>
                    <span>{{ t._('dashboard') }}</span>
                </li>
            </ol>
        </div>
    </div>
{% endblock %}
