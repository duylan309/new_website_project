{% extends 'layout.volt' %}

{% block title %}{{ t._('category') }}{% endblock %}

{% block container %}
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header row">
                <div class="col-sm-6">
                    <h3 class="no-margin">{{ t._('add-object', {'object': 'danh mục'}) }}</h3>
                </div>

                <div class="col-sm-6 text-right">
                    <a href="" class="btn btn-default btn-sm">
                        <i class="fa fa-ban"></i>
                        <span>{{ t._('cancel') }}</span>
                    </a>

                    <button type="submit" class="btn btn-default btn-primary btn-success btn-sm" value="{{ t._('save') }}">
                        <i class="fa fa-save"></i>
                        <span>{{ t._('save') }}</span>
                    </button>
                </div>
            </div>

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

    <form action="" method="post" id="submitForm" class="form-horizontal" enctype="multipart/form-data">
        {{ flashSession.output() }}

        <div class="form-dashborad p-10">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#info" data-toggle="tab">{{ t._('info') }}</a>
                </li>
                <li>
                    <a href="#image" data-toggle="tab">{{ t._('image') }}</a>
                </li>
                <li>
                    <a href="#content" data-toggle="tab">{{ t._('content') }}</a>
                </li>
                <li>
                    <a href="#seo" data-toggle="tab">{{ t._('seo')}}</a>
                </li>
            </ul>

            <div class="tab-content m-t-30">
                {% include 'default/category/_tab_info.volt' %}
                {% include 'default/category/_tab_image.volt' %}
                {% include 'default/category/_tab_content.volt' %}
                {% include 'default/category/_tab_meta.volt' %}
            </div>
        </div>
    </form>
{% endblock %}
