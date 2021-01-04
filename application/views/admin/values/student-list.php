<?php if(count($students) > 0) { foreach ($students as $student) { ?>
    <div class="panel panel-default" onclick="setStudent('<?=$student->id?>')">
        <div class="panel-body list-group custom-scroll-sm">
            <a class="list-group-item">
                <span class="fa fa-angle-right"></span>
                <strong> <?=$student->name?> </strong>
            </a>
        </div>
    </div>
<?php } } else { ?>
    <strong>Siswa tidak ditemukan !!</strong>
<?php } ?>