{% extends 'layout.volt' %}

{% block title %}{{ t._('category') }}{% endblock %}

{% block container %}
    <form action="" method="get" class="form-horizontal">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">
                    <span>{{ t._('category') }}</span>

                    <a href="{{ url({'for': 'category_add'}) }}" class="btn btn-default btn-primary pull-right btn-sm">
                        <i class="fa fa-plus"></i>
                        <span>{{ t._('add') }}</span>
                    </a>
                </h3>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>
                        <a href="{{ url({'for': 'dashboard'}) }}">{{ t._('dashboard') }}</a>
                    </li>
                    <li class="active">
                        <span>{{ t._('category') }}</span>
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="bg-color8">
                            <th class="col-sm-1"></th>
                            <th class="col-sm-1">{{ t._('id') }}</th>
                            <th class="col-sm-5">{{ t._('title') }}</th>
                            <th class="col-sm-2">{{ t._('type') }}</th>
                            <th class="col-sm-1">{{ t._('ordering') }}</th>
                            <th class="col-sm-1">{{ t._('status') }}</th>
                        </tr>
                        <tr class="tSearch">
                            <th class="col-sm-1"></th>
                            <th class="col-sm-1">
                                <input type="text" placeholder="" class="form-control input-sm" name="id" value="" />
                            </th>
                            <th class="col-sm-5">
                                <input type="text" placeholder="" class="form-control input-sm" name="title" value="" />
                            </th>
                            <th class="col-sm-2">
                                <select name="" class="form-control input-sm">
                                    <option value="">{{ t._('all') }}</option>
                                </select>
                            </th>
                            <th class="col-sm-1">
                                <input type="text" placeholder="" class="form-control input-sm" name="ordering" value="" />
                            </th>
                            <th class="col-sm-1">
                                <select name="" class="form-control input-sm">
                                    <option value="">{{ t._('all') }}</option>
                                    <option value="1">{{ t._('inactive') }}</option>
                                    <option value="2">{{ t._('active') }}</option>
                                </select>
                            </th>
                        </tr>
                    </thead>

                    <tbody data-table-content>
                        {% for category in categories.items %}
                            <tr>
                                <td>
                                    <label class="">
                                        <a href="{{ url({'for': 'category_edit', 'query': '?' ~ http_build_query({'category_id': category.category_id})}) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url({'for': 'category_delete', 'query': '?' ~ http_build_query({'category_id': category.category_id})}) }}" onclick="return confirm('Đồng ý xóa?');">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </label>
                                </td>
                                <td>{{ category.category_id }}</td>
                                <td>{{ category.name_vi }}</td>
                                <td>
                                    {% if TYPE[category.type] is defined %}
                                        {{ t._(TYPE[category.type]) }}
                                    {% endif %}
                                </td>
                                <td>{{ category.ordering }}</td>
                                <td>
                                    {% set class = 'btn btn-primary btn-danger btn-xs' %}
                                    {% if category.status == constant('\Thue\Data\Model\M_Category::STATUS_ACTIVE') %}
                                        {% set class = 'btn btn-primary btn-success btn-xs' %}
                                    {% endif %}

                                    <div class="{{ class }}">
                                        {% if STATUS[category.status] is defined %}
                                            {{ t._(STATUS[category.status]) }}
                                        {% endif %}
                                    </div>
                                </td>
                            <tr>
                        {% endfor %}
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-sm-12 text-left">
                        {{ pagination }}
                    </div>
                </div>
            </div>
        </div>
    </form>
{% endblock %}
