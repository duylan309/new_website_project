<ul class="nav navbar-nav side-nav menu-left-admin">
    <li class="">
        <a href="{{ url({'for': 'dashboard'}) }}">{{ t._('dashboard') }}</a>
    </li>
    <li class="">
        <a href="{{ url({'for': 'category_index'}) }}">{{ t._('category') }}</a>
    </li>
    <li class="">
        <a href="#">{{ t._('static_page') }}</a>
    </li>
    <li class="">
        <a href="#">{{ t._('candidate') }}</a>
    </li>
    <li class="">
        <a href="#">{{ t._('employer') }}</a>
    </li>
    <li class="">
        <a href="#">Trang Thương Hiệu</a>
    </li>
    <li class="">
        <a href="#">{{ t._('job') }}</a>
    </li>
    <li class="">
        <a href="#">{{ t._('cv') }}</a>
    </li>
    <li class="">
        <a href="#">{{ t._('message') }}</a>
    </li>
    <li class="">
        <a href="#">Quản Lý Gia Hạn</a>
    </li>
    <li class="">
        <a href="#">Đơn Hàng</a>
    </li>
    <li class="">
        <a href="#">{{ t._('advertising') }}</a>
    </li>
    <li class="">
        <a href="#">{{ t._('promotion') }}</a>
    </li>
    <li class="">
        <a href="#">{{ t._('contact') }}</a>
    </li>
    <li class="">
        <a data-toggle="collapse" href="#" data-target="#menu_config">
            <i class="fa fa-fw fa-cog"></i> Cài đặt <i class="fa fa-fw fa-caret-down"> </i>
        </a>
        <ul id="menu_config" class="collapse">
            <li class="">
                <a href="#">Quản Trị Viên</a>
            </li>
            <li class="">
                <a href="#">Cài Đặt Chung</a>
            </li>
        </ul>
    </li>
</ul>

