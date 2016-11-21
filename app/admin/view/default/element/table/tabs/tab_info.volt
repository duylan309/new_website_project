<div id="info" class="tab-pane fade in active col-sm-6">
    <div class="form-group">
        <label class="col-sm-3">{{ t._('title') }}</label>
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#vn" data-toggle="tab">{{ t._('vi') }}</a></li>
                <li><a href="#en" data-toggle="tab">{{ t._('en') }}</a></li>
            </ul>
            <div class="tab-content">
                <div id="vn" class="tab-pane active">
                    <input class="input form-control" name="name_vi" type="text" size="50" value="" />
                </div>
                <div id="en" class="tab-pane">
                    <input class="input form-control" name="name_en" type="text" size="50" value="" />
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3">{{ t._('url') }}</label>
        <div class="col-sm-9">
            <input data-validate class="form-control" type="text" id="titleUrl" name="slug" size="50" value="" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3">{{ t._('ordering') }}</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" size="4" name="ordering" value=""/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3">{{ t._('status') }}</label>
        <div class="col-sm-9">
            <select name="" class="form-control input-sm">
                <option value="1">{{ t._('inactive') }}</option>
                <option value="2">{{ t._('active') }}</option>
            </select>
        </div>
    </div>
</div>