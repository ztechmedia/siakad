<div class="form-group">
    <label class="col-md-3 control-label">Nama Mata Pelajaran</label>
    <div class="col-md-6">
        <input name="subject_name" id="subject_name" type="text" class="validate[required,maxSize[50]] form-control" 
            value="<?=$subject ? $subject->subject_name : ""?>" />
        <span class="help-block form-error" id="subject_name-error"></span>
    </div>
</div>
