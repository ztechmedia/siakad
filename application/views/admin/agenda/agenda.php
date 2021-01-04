<ul class="breadcrumb">
    <li>Manajemen Website</li>
    <li class="active">Agenda Sekolah</li>
</ul>

<div class="page-title">
    <h2><span class="fa fa-users"></span> Agenda Sekolah</h2>
</div>

<div class="page-content-wrap" style="height: 100vh">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">Daftar Agenda Sekolah</h3>
                </div>

                <div class="panel-body">
                    <div class="btnContainer">
                        <button class="btn btn-default btn-rounded link-to" data-to="<?=base_url("admin/agenda/create")?>">
                            <i class="fa fa-user"></i> Tambah Agenda Sekolah
                        </button>
                    </div>
                    <table class="table table-bordered" id="data">
                        <thead>
                            <th width="10%">No</th>
                            <th>Judul Agenda</th>
                            <th>Tanggal Kegiatan</th>
                            <th width="10%">Tindakan</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
    .btnContainer {
        margin-bottom: 10px;
    }
</style>

<script>
    $(document).ready(() => {
        $('#data').DataTable({
            "processing": false,
            "serverSide": true,
            "order": [
                [2, 'desc']
            ],
            "ajax": {
                "url": "<?=base_url("admin/agenda-table")?>",
                "type": "POST"
            },
            columns: [
                {
                    data: "no",
                },
                {
                    data: "title",
                },
                {
                    data: "date",
                },
                {
                    data: 'actions'
                }
            ]
        });
    });
</script>