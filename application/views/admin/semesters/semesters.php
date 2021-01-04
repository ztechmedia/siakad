<ul class="breadcrumb">
    <li>Master</li>
    <li class="active">Semester</li>
</ul>

<div class="page-title">
    <h2>Semester</h2>
</div>

<div class="page-content-wrap" style="height: 100vh">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="btnContainer">
                        <button class="btn btn-default link-to" data-to="<?=base_url("admin/semesters/create")?>">
                           Tambah Semester
                        </button>
                    </div>
                    <table class="table table-bordered" id="data">
                        <thead>
                            <th width="7%">No</th>
                            <th>Nama Semester</th>
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
                "url": "<?=base_url("admin/semesters-table")?>",
                "type": "POST"
            },
            columns: [
                {
                    data: "no",
                },
                {
                    data: "semester_name",
                },
                {
                    data: 'actions'
                }
            ]
        });
    });
</script>