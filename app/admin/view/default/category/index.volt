{% extends 'layout.volt' %}

{% block title %}Danh mục{% endblock %}

{% block container %}
    <form action="" method="get" class="form-horizontal">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">
                    <span>Danh Mục</span>
                    <a href="#" class="btn btn-default btn-primary pull-right btn-sm">
                        <i class="fa fa-plus"></i> <span>Thêm mới</span>
                    </a>
                </h3>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>
                        <a href="{{ url({'for': 'dashboard'}) }}">Dashboard</a>
                    </li>
                    <li class="active">
                        <span>Danh Mục</span>
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
                            <th class="col-sm-1">ID</th>
                            <th class="col-sm-5">Tiêu Đề</th>
                            <th class="col-sm-2">Loại</th>
                            <th class="col-sm-1">Thứ Tự</th>
                            <th class="col-sm-1">Trạng Thái</th>
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
                                <select name=""  class="fform-control input-sm">
                                    <option value="-1">Tất cả</option>
                                    <option value="0">Trang đơn</option>
                                    <option value="1">Danh mục</option>
                                </select>
                            </th>
                            <th class="col-sm-1"></th>
                            <th class="col-sm-1"></th>
                        </tr>
                    </thead>

                    <tbody data-table-content>
                        <tr>
                            <td>
                                <label class="">
                                    <a href="#"> <i class="fa fa-edit"></i>&nbsp;</a>
                                    <a href="#" class="funDelete"> <i class="fa fa-trash-o"></i>&nbsp;</a>
                                </label>
                            </td>
                            <td>1</td>
                            <td>Giới thiệu</td>
                            <td>Trang đơn</td>
                            <td>1</td>
                            <td>
                                <div class="btn btn-primary btn-success btn-xs">Hiển thị</div>
                            </td>
                        <tr>
                        <tr>
                            <td>
                                <label class="">
                                    <a href="#"> <i class="fa fa-edit"></i>&nbsp;</a>
                                    <a href="#"> <i class="fa fa-trash-o"></i>&nbsp;</a>
                                </label>
                            </td>
                            <td>2</td>
                            <td>Liên hệ</td>
                            <td>Trang đơn</td>
                            <td>2</td>
                            <td>
                                <div class="btn btn-primary btn-danger btn-xs">Ẩn</div>
                            </td>
                        <tr>
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
