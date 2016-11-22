<div id="seo" class="tab-pane fade m-t-15 col-sm-6">
    <div class="form-group">
        <label class="col-sm-3">{{ t._('title') }}</label>

        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#vn_m_title" data-toggle="tab">{{ t._('vi') }}</a>
                </li>
                <li>
                    <a href="#en_m_title" data-toggle="tab">{{ t._('en') }}</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="vn_m_title" class="tab-pane active">
                    <input class="form-control" type="text" name="_title_vn" value="" />
                </div>
                <div id="en_m_title" class="tab-pane">
                    <input class="form-control" type="text" name="_title_en" value="" />
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3">{{ t._('keyword') }}</label>

        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#vn_k" data-toggle="tab">{{ t._('vi') }}</a>
                </li>
                <li>
                    <a href="#en_k" data-toggle="tab">{{ t._('en') }}</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="vn_k" class="tab-pane active">
                    <textarea class="form-control" rows="3" cols="50" name="meta_keyword_vn"></textarea>
                </div>
                <div id="en_k" class="tab-pane">
                    <textarea class="form-control" rows="3" cols="50" name="meta_keyword_en"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3">{{ t._('description') }}</label>

        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#vn_md" data-toggle="tab">{{ t._('vi') }}</a></li>
                <li><a href="#en_md" data-toggle="tab">{{ t._('en') }}</a></li>
            </ul>

            <div class="tab-content">
                <div id="vn_md" class="tab-pane active">
                    <textarea class="form-control" rows="3" cols="50" name="meta_description_vn"></textarea>
                </div>
                <div id="en_md" class="tab-pane">
                    <textarea class="form-control" rows="3" cols="50" name="meta_description_en"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>