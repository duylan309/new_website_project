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

                    <a class="btn btn-default btn-sm" href="#">
                      <i class="fa fa-ban"></i> <span>{{ t._('cancel') }}</span>
                    </a>

                    <button class="btn btn-default btn-primary btn-success btn-sm" type="submit" value="save">
                      <i class="fa fa-save"></i> <span>{{ t._('save') }}</span>
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

    <form class="form-horizontal" action="" method="post" id="submitForm" enctype="multipart/form-data">

        <div class="form-dashborad p-10">
            {% include 'default/element/table/header/header_basic.volt' %}

            <div class="tab-content m-t-30">
                {% include 'default/element/table/tabs/tab_info.volt' %}
                {% include 'default/element/table/tabs/tab_image.volt' %}
                {% include 'default/element/table/tabs/tab_meta.volt' %}
            </div>

        </div>
    </form>
{% endblock %}

