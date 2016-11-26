<div id="tab_info" class="tab-pane fade in active col-sm-6">
    <div class="form-group">
        <label class="col-sm-3">{{ t._('title') }}</label>

        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab_name_vi" data-toggle="tab">{{ t._('vi') }}</a>
                </li>
                <li>
                    <a href="#tab_name_en" data-toggle="tab">{{ t._('en') }}</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="tab_name_vi" class="tab-pane active">
                    {{ form.render('name_vi', {'class': 'input form-control'}) }}
                    {% include 'default/element/form_message' with {'form': form, 'element': 'name_vi'} %}
                </div>
                <div id="tab_name_en" class="tab-pane">
                    {{ form.render('name_en', {'class': 'input form-control'}) }}
                    {% include 'default/element/form_message' with {'form': form, 'element': 'name_en'} %}
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3">{{ t._('slug') }}</label>

        <div class="col-sm-9">
            {{ form.render('slug', {'class': 'input form-control'}) }}
            {% include 'default/element/form_message' with {'form': form, 'element': 'slug'} %}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3">{{ t._('parent_category') }}</label>

        <div class="col-sm-9">
            {{ form.render('parent_id', {'class': 'input-sm form-control'}) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3">{{ t._('type') }}</label>

        <div class="col-sm-9">
            {{ form.render('type', {'class': 'input-sm form-control'}) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3">{{ t._('ordering') }}</label>

        <div class="col-sm-9">
            {{ form.render('ordering', {'class': 'input-sm form-control'}) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3">{{ t._('status') }}</label>

        <div class="col-sm-9">
            {{ form.render('status', {'class': 'input-sm form-control'}) }}
        </div>
    </div>
</div>
