{% extends 'layout.volt' %}

{% block title %}{{ t._('category') }}{% endblock %}

{% block container %}
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
                <span>{{ t._('add-object', {'object': 'danh mục'}) }}</span>
            </h3>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>
                    <a href="{{ url({'for': 'dashboard'}) }}">{{ t._('dashboard') }}</a>
                </li>
                <li>
                    <a href="{{ url({'for': 'category_index'}) }}">{{ t._('category') }}</a>
                </li>
                <li class="active">
                    <span>{{ t._('add') }}</span>
                </li>
            </ol>
        </div>
    </div>
{% endblock %}
