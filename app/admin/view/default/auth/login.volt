{% extends 'simple.volt' %}

{% block container %}
    <div class="login-section">
        <div class="container">
            <center>
                <div class="logo form-group">
                    <img class="text-center" src="{{ config.asset.url ~ 'img/logo.png?' ~ config.asset.version }}" >
                </div>

                <form action method="post" class="form-horizontal post-form">
                    {{ flashSession.output() }}

                    <div class="form-group">
                        {{ form.render('email', {'class': 'form-control', 'placeholder': t._('email')}) }}
                        {% include 'default/element/form_message' with {'form': form, 'element': 'email'} %}
                    </div>
                    <div class="form-group">
                        {{ form.render('password', {'class': 'form-control', 'placeholder': t._('password')}) }}
                        {% include 'default/element/form_message' with {'form': form, 'element': 'password'} %}
                    </div>
                    <div class="form-group">
                        <button type="submit" name="" value="login" class="btn bg-color3 btn-block">
                            {{ t._('login') }}
                        </button>
                    </div>
                </form>
            </center>
        </div>
    </div>
{% endblock %}
