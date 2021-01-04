<div class="form-group">
    <label class="col-md-3 control-label">Nama Kelas</label>
    <div class="col-md-6">
        <input name="classname" id="classname" type="text" class="validate[required,maxSize[30]] form-control" value="<?=$class ? $class->classname : ""?>" />
        <span class="help-block form-error" id="classname-error"></span>
    </div>
</div>
