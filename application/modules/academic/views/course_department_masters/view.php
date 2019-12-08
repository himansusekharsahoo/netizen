<div class="col-sm-12">
    <div class = 'form-group row'>
        <label for = 'name' class = 'col-sm-2 col-form-label'>Name</label>
        <div class = 'col-sm-3'>
            <?= (isset($data["name"])) ? $data["name"] : "" ?>
        </div>
    </div>
    <div class = 'form-group row'>
        <label for = 'code' class = 'col-sm-2 col-form-label'>Code</label>
        <div class = 'col-sm-3'>
            <?= (isset($data["code"])) ? $data["code"] : "" ?>
        </div>
    </div>
    <div class = 'form-group row'>
        <label for = 'course_category_id' class = 'col-sm-2 col-form-label'>Course category id</label>
        <div class = 'col-sm-3'>
            <?= (isset($data["course_category_id"])) ? $data["course_category_id"] : "" ?>
        </div>
    </div>

    <div class = 'form-group row'>
        <div class = 'col-sm-1'>
            <a class="text-right btn btn-default" href="<?= APP_BASE ?>academic/course_department_masters/index">
                <span class="glyphicon glyphicon-th-list"></span> Cancel
            </a>
        </div>
    </div>

</div>