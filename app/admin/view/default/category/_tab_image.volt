<div id="tab_image" class="tab-pane fade m-t-15 col-sm-6">
    <div class="form-group">
        <label class="col-sm-3">{{ t._('alt_image') }}</label>

        <div class="col-sm-9">
            {{ form.render('alt_image', {'class': 'input-sm form-control'}) }}
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3">{{ t._('image') }}</label>

        <div class="col-sm-9">
            <input type="file" name="image_file" value="" />
        </div>
    </div>
</div>
