<ul class="breadcrumb">
    <li>Manajemen KBM</li>
	<li class="link-to" data-to="<?=base_url("admin/schedule/$year")?>">Jadwal</li>
	<li class="active">Kelas <?=$class->classname?> (<?=$year?>)</li>
</ul>

<div class="content-frame">
    <div class="content-frame-top">
        <div class="page-title">
            <h2><span class="fa fa-mail-reply link-to" data-to="<?=base_url("admin/schedule/$year")?>"></span> Manajage Jadwal Kelas <?=$class->classname. " ($year)"?></h2>
        </div>
    </div>

    <?php if($this->auth->role == "admin") { ?>
    <div class="content-frame-right" style="height: 100vh;padding:0px;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">Form Jadwal Pelajaran</h3>
                </div>
                <form id="validate" role="form" class="form-horizontal action-submit-create"
                    data-action="<?=base_url("admin/schedule/add")?>">
                    <div class="panel-body" <?= $this->auth->role == "student" ? "style='padding:0px'" : ''; ?>>
                        
                        <div class="form-group">
                            <div class="col-md-12">
                                <select class="validate[required] form-control nested-select"
                                    data-target="#subclass_id" 
                                    data-empty="- Pilih Mata Pelajaran -"
                                    data-url="<?=base_url()?>admin/schedule/<?=$class->id?>/[id]/<?=$year?>/sm-subclass">
                                    <option value="">- Pilih Semester -</option>
                                    <?php foreach ($semesters as $semester) {
                                        echo "<option value=" . $semester->id . " >$semester->semester_name</option>";
                                    }?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <select class="validate[required] form-control" name="subclass_id" id="subclass_id">
                                   <option value="">- Pilih Mata Pelajaran -</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <select class="validate[required] form-control" name="day" id="day">
                                   <?php
                                    $days = [
                                        "1" => "Senin",
                                        "2" => "Selasa",
                                        "3" => "Rabu",
                                        "4" => "Kamis",
                                        "5" => "Jumat",
                                        "6" => "Sabtu",
                                    ];

                                    foreach ($days as $key => $value) {
                                        echo "<option value='$key'>$value</option>";
                                    }
                                   ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Waktu mulai</label>
                                <select class="validate[required] form-control" name="start_time" id="end_time">
                                   <?php 
                                        for($i=7;$i<=16;$i++) {
                                            $hour = $i;
                                            if($i < 10) {
                                                $hour = "0".$i;
                                            }
                                            $time1 = $hour.":00";
                                            $time2 = $hour.":30";
                                            echo "<option value='$time1'>$time1</option>";
                                            echo "<option value='$time2'>$time2</option>";
                                        }
                                   ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Waktu selesai</label>
                                <select class="validate[required] form-control" name="end_time" id="end_time">
                                   <?php 
                                        for($i=7;$i<=16;$i++) {
                                            $hour = $i;
                                            if($i < 10) {
                                                $hour = "0".$i;
                                            }
                                            $time1 = $hour.":00";
                                            $time2 = $hour.":30";
                                            echo "<option value='$time1'>$time1</option>";
                                            echo "<option value='$time2'>$time2</option>";
                                        }
                                   ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="btn-group pull-right">
                            <button class="btn btn-default save" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <?php } ?>

    <div class="content-frame-body content-frame-body-left" <?=$this->auth->role == "teacher" || $this->auth->role == "student" ? "style='width:100%'" : null?>>
        <div class="row">
            <div class="col-md-12">
                <div class="schedule-list"></div>
            </div>
        </div>
    </div>
</div>

<script>
    const BASE_URL = "<?=base_url()?>";
    formSelect();
    const url = "<?=base_url("admin/schedule/$class->id/$year/list")?>";        
    loadContent(url, ".schedule-list");
    formValidation(".action-submit-create", url, ".schedule-list");

    function deleteSchedule(id, name) {
        swal(
            {
                title: "Hapus",
                text: `Anda yakin ingin menghapus mata pelajaran ${name}`,
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ya, Hapus!",
                closeOnConfirm: false,
            },
            function () {
                const url = `${BASE_URL}admin/schedule/${id}/delete`;
                reqJson(url, "GET", {}, (err, response) => {
                    if (response) {
                        loadContent("<?=base_url("admin/schedule/$class->id/$year/list")?>", '.schedule-list');
                        swal("Sukses", response.message, "success");
                    } else {
                        console.log("Error: ", err);
                    }
                });
            }
        );
    }
</script>

<style>
    #year {
        color: #000;
    }
</style>