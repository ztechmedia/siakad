<ul class="breadcrumb">
    <li>Website</li>
    <li class="active">Sejarah</li>
</ul>

<div class="content-frame">
    <div class="content-frame-top">
        <div class="page-title">
            <h2>Sejarah</h2>
        </div>
    </div>

    <div class="content-frame-body content-frame-body-left">
        <div class="row">
            <div class="col-md-12">
                <form id="validate" role="form" class="form-horizontal action-submit-update"
                    data-action="<?=base_url("admin/history/update")?>" >
                    <div class="form-group">
                        <label class="col-md-3 control-label">Sejarah</label>
                        <div class="col-md-6">
                            <textarea name="description" id="description" class="validate[required] form-control"><?=$history->description?></textarea>
                            <span class="help-block form-error" id="description-error"></span>
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