<ul class="breadcrumb">
    <li>Website</li>
    <li class="active">Visi & Misi</li>
</ul>

<div class="content-frame">
    <div class="content-frame-top">
        <div class="page-title">
            <h2>Visi & Misi</h2>
        </div>
    </div>

    <div class="content-frame-body content-frame-body-left">
        <div class="row">
            <div class="col-md-12">
                <form id="validate" role="form" class="form-horizontal action-submit-update"
                    data-action="<?=base_url("admin/vimission/update")?>" >
                    <div class="form-group">
                            <label class="col-md-3 control-label">Visi</label>
                            <div class="col-md-6">
                                <textarea rows="10" name="vision" id="vision" class="validate[required] form-control"><?=$vimission->vision?></textarea>
                                <span class="help-block form-error" id="vision-error"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Misi</label>
                            <div class="col-md-6">
                                <textarea rows="10" name="mission" id="mission" class="validate[required] form-control"><?=$vimission->mission?></textarea>
                                <span class="help-block form-error" id="mission-error"></span>
                            </div>
                        </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <button class="btn btn-default save" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    formValidation(".action-submit-update");
</script>