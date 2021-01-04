<ul class="breadcrumb">
    <li>Master</li>
    <li class="active">Kelas</li>
</ul>

<div class="page-title">
    <h2>Kelas</h2>
</div>

<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="btnContainer">
                        <button class="btn btn-default link-to" data-to="<?=base_url("admin/class/create")?>">
                            Tambah Kelas
                        </button>
                    </div>
                    <table class="table table-bordered" id="data">
                        <thead>
                            <th width="7%">No</th>
                            <th>Nama Kelas</th>
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
                [1, 'desc']
            ],
            "ajax": {
                "url": "<?=base_url("admin/class-table")?>",
                "type": "POST"
            },
            columns: [
                {
                    data: "no",
                },
                {
                    data: "classname",
                },
                {
                    data: 'actions'
                }
            ]
        });
    });
</script>