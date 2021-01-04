<div class="form-group">
    <label class="col-md-3 control-label">Nama Semester</label>
    <div class="col-md-6">
        <input name="semester_name" id="semester_name" type="text" class="validate[required,maxSize[15]] form-control" value="<?=$semester ? $semester->semester_name : ""?>" />
        <span class="help-block form-error" id="semester_name-error"></span>
    </div>
</div>
