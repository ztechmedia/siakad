<ul class="breadcrumb">
    <li>Master</li>
    <li class="active">Guru</li>
</ul>

<div class="page-title">
    <h2>Guru</h2>
</div>

<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="btnContainer">
                        <button class="btn btn-default link-to" data-to="<?=base_url("admin/teachers/create")?>">
                            Tambah Guru
                        </button>
                    </div>
                    <table class="table table-bordered" id="data">
                        <thead>
                            <th width="7%">No</th>
                            <th width="8%">NIP</th>
                            <th>Nama</th>
                            <th>TTL</th>
                            <th width="10%">Jenis Kelamin</th>
                            <th>Status</th>
                            <th width="10%">Status Kerja</th>
                            <th>Pendidikan</th>
                            <th width="11%">Tindakan</th>
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
                "url": "<?=base_url("admin/teachers-table")?>",
                "type": "POST"
            },
            columns: [
                {
                    data: "no",
                },
                {
                    data: "nip",
                },
                {
                    data: "name",
                },
                {
                    data: "ttl",
                },
                {
                    data: "gender",
                },
                {
                    data: "status",
                },
                {
                    data: "work_status",
                },
                {
                    data: "edumajor",
                },
                {
                    data: 'actions'
                }
            ]
        });
    });
</script>