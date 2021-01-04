<ul class="breadcrumb">
    <li>Master</li>
    <li><a class="link-to" data-to="<?=base_url("admin/agenda")?>">Agenda Sekolah</a></li>
    <li class="active">Edit Data</li>
</ul>

<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left link-to" data-to="<?=base_url("admin/agenda")?>"></span> Update Agenda Sekolah</h2>
</div>

<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">Form Agenda Sekolah</h3>
                </div>
                <form id="validate" role="form" class="form-horizontal action-submit-update"
                    data-action="<?=base_url("admin/agenda/$agenda->id/update")?>" 
                    data-redirect="<?=base_url("admin/agenda")?>"
                    data-target=".content">
                    <div class="panel-body">
                        <?php $data['agenda'] = $agenda; $this->load->view('admin/agenda/form', $data)?>
                    </div>
                    <?php if($this->auth->role == "admin") {?>
                    <div class="panel-footer">
                        <div class="btn-group pull-right">
                            <button class="btn btn-primary save" type="submit">Update</button>
                        </div>
                    </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
    formSelect();
    formValidation(".action-submit-update");
</script>