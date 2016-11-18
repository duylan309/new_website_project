{% extends 'simple.volt' %}

{% block container %}
    <div class="login-section">
        <div class="container">
            <center data-errror404>
                <h1 class="text-white">404</h1>
                <h2 class="text-white">Nội dung đã xóa hoặc không tồn tại</h2>

                <a href="{{ url({'for': 'dashboard'}) }}" class="btn bg-color6">
                    <i class="fa fa-caret-left"></i>
                    <span>Quay lại trang chủ</span>
                </a>
            </center>
        </div>
    </div>
{% endblock %}
