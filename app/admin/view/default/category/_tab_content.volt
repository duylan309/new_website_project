<div id="content" class="tab-pane fade m-t-15 col-sm-6">
    <div class="form-group">
        <label class="col-sm-3">{{ t._('description') }}</label>

        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#vn_md" data-toggle="tab">{{ t._('vi') }}</a>
                </li>
                <li>
                    <a href="#en_md" data-toggle="tab">{{ t._('en') }}</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="vn_md" class="tab-pane active">
                    <textarea class="form-control mceEditor" rows="3" cols="50" name="description_vi"></textarea>
                </div>

                <div id="en_md" class="tab-pane">
                    <textarea class="form-control mceEditor" rows="3" cols="50" name="description_en"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>