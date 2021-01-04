<ul class="breadcrumb">
    <li>Manajemen KBM</li>
	<li class="link-to" data-to="<?=base_url("admin/subteachers")?>">Pengajar</li>
	<li class="active">Kelas <?=$class->classname?> (<?=$year?>)</li>
</ul>

<div class="content-frame">
    <div class="content-frame-top">
        <div class="page-title">
            <h2><span class="fa fa-mail-reply link-to" data-to="<?=base_url("admin/subteachers/$year")?>"></span> Manajage Pengajar Kelas <?=$class->classname. " ($year)"?></h2>
        </div>
    </div>

    <div class="content-frame-right" style="height: 100vh;padding:0px;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body list-group custom-scroll-sm">
                    <a class="list-group-item">
                        <div id="subject-name">Mata Pelajaran: ...</div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div style="padding:10px">
                    <h4>Pengajar</h4>
                </div>
				<div class="panel-body list-group list-group-contacts custom-scroll">
                    <?php
                        if(count($teachers) > 0 ) { foreach ($teachers as $teacher) { ?>
                         <a onclick="setTeacher('<?=$teacher->id?>')" class="list-group-item subject-<?=$teacher->id?>" style="
                                display: flex;
                                flex-direction: row;
                                justify-content: flex-start;
                                align-items: center">
                            <div class="list-group-status status-online subject-status-<?=$teacher->id?>"></div>
                            <span class="contacts-title"><?=$teacher->name?></span>
                        </a>
                    <?php } } else { ?>
                        <a class="list-group-item" style="
                                display: flex;
                                flex-direction: row;
                                justify-content: flex-start;
                                align-items: center">
                            <div class="list-group-status status-online"></div>
                            <span class="contacts-title">Belum ada data guru</span>
                        </a>
                    <?php } ?>
				</div>
			</div>
        </div>
    </div>

    <div class="content-frame-body content-frame-body-left">
        <div class="row">
            <div class="col-md-12">
                <div class="sublist"></div>
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

    .disableSub {
        color: #ccc !important;
        pointer-events: none;
        cursor: default;
        text-decoration: none;
    }
</style>

<script>
    let BASE_URL = '<?=base_url()?>';
    let classId = '<?=$class->id?>';
    let year = '<?=$year?>';
    let subjectName = null;
    let semester = null;
    let smId = null;
    let subject = null;
    let subclass = null;

    loadContent(`${BASE_URL}admin/subteachers/${classId}/${year}/sublist`, '.sublist');
    
    function setSubject(subjectName, semester, smId, subject, subclass) {
        this.subjectName = subjectName;
        this.semester = semester;
        this.smId = smId;
        this.subject = subject;
        this.subclass = subclass;

        $(".disableSub").removeClass("disableSub");
        $(".status-offline").addClass("status-online");
        $(".status-offline").removeClass("status-offline");
        $("#subject-name").html(`Mata Pelajaran: <b>${subjectName}</b>`);
        $("#semester-name").html(semester);
        reqJson(`${BASE_URL}admin/subteachers/${classId}/${smId}/${subject}/${year}/check`, 
                    "POST", {}, (err, response) => {
            if(response) {
                $(`.subject-${response.teacherId}`).addClass("disableSub");
                $(`.subject-status-${response.teacherId}`).removeClass("status-online");
                $(`.subject-status-${response.teacherId}`).addClass("status-offline");
            } else {
                console.log("Error: ", err);
            }
        });
    }

    function setTeacher(teacherId) {
        if(this.subclass == null) {
            swal("Oopps..!", "Mata pelajaran belum dipilih", "warning");
            return;
        }
        console.log(this.subclass);
        const data = {
            subclass_id: this.subclass,
            teacher_id: teacherId
        }

        reqJson(`${BASE_URL}admin/subteachers/add`, "POST", data, (err, response) => {
            if(response) {
                swal("Sukses", response.message, "success");
                setSubject(
                    this.subjectName,
                    this.semester,
                    this.smId,
                    this.subject);
                loadContent(`${BASE_URL}admin/subteachers/${classId}/${year}/sublist`, '.sublist');
            } else {
                console.log("Error: ", err);
            }
        });
    }
</script>