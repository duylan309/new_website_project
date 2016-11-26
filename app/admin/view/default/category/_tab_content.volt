<div id="tab_content" class="tab-pane fade m-t-15 col-sm-12">
    <div class="form-group">
        <label class="col-sm-2">{{ t._('description') }}</label>

        <div class="col-sm-10">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab_description_vi" data-toggle="tab">{{ t._('vi') }}</a>
                </li>
                <li>
                    <a href="#tab_description_en" data-toggle="tab">{{ t._('en') }}</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="tab_description_vi" class="tab-pane active">
                    {{ form.render('description_vi', {'class': 'input form-control'}) }}
                </div>
                <div id="tab_description_en" class="tab-pane">
                    {{ form.render('description_en', {'class': 'input form-control'}) }}
                </div>
            </div>
        </div>
    </div>
</div>