{% extends 'simple.volt' %}

{% block container %}
    <div class="login-section">
        <div class="container">
            <center>
                <form class="form-horizontal post-form">
                    <div class="logo form-group ">
                        <img class="text-center" src="{{ config.asset.url ~ 'img/logo.png' }}" >
                    </div>

                    <div class="form-group">
                        <input type="text" name="username" value="" class="form-control" placeholder="Tên đăng nhập"  />
                    </div>
                    <div class="form-group">
                        <input type="text" name="password" value="" class="form-control" placeholder="Mật khẩu"  />
                    </div>
                    <div class="form-group">
                        <button type="submit" name="" value="login" class="btn bg-color3 btn-block">Đăng Nhập</button>
                    </div>
                </form>
            </center>
        </div>
    </div>
{% endblock %}
