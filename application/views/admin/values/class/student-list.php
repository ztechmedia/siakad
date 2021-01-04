<ul class="breadcrumb">
    <li>Nilai</li>
	<li class="link-to" data-to="<?=base_url("admin/values/class-values/$year")?>">Nilai Siswa</li>
	<li class="active">Kelas</li>
</ul>

<div class="content-frame">
    <div class="content-frame-top">
        <div class="page-title">
            <h2>
                Nilai Siswa Kelas <?=$class->classname." $year"?>
            </h2>
        </div>
    </div>

    <div class="content-frame-right" style="height: 100vh;padding:0px">
       <div class="row">
           <div class="col-md-12">
            <div class="panel panel-default">
                    <div style="padding:10px">
                        <h4>Daftar Siswa</h4>
                    </div>
                    <div class="panel-body list-group custom-scroll-sm">
                        <?php $no = 1; foreach ($students as $student) { ?>
                            <span class="list-group-item link-to-unsave" 
                                data-target=".value-area"
                                data-to="<?=base_url("admin/values/class-values/$student->class_id/$year/$student->student_id/list-values")?>" 
                                style="font-size:14px; cursor:pointer;">
                                <?=$no++. '. ' . $student->name?>
                            </span>
                        <?php } ?>
                    </div>
                </div>
           </div>
       </div>      
    </div>

    <div class="content-frame-body content-frame-body-left">
        <div class="row">
            <div class="col-md-12">
                <div class="value-area"></div>
            </div>
        </div>
    </div>
</div>

<style>
    .custom-scroll-sm {
        height: auto;
        overflow: auto;
        overflowY: scroll;
    }

    .value-area {
        background: #fff;
        border-radius: 5px;
    }
</style>

<script>
    let BASE_URL = '<?=base_url()?>';

    let classId = '<?=$class->id?>';
    let year = '<?=$year?>';

</script>