<form id="save-values" 
    data-action="<?=$action?>"
    data-url="
        <?=
        $action == "add" 
            ? base_url("admin/values/$studentId/add")
            : base_url("admin/values/$studentId/update")
        ?>">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Semester</th>
                <th>Mata Pelajaran</th>
                <th width="12%">Nilai Tugas</th>
                <th width="12%">Nilai UTS</th>
                <th width="12%">Nilai UAS</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($sublist as $key => $sub) { ?>
                <tr>
                    <td rowspan="<?=count($sub) + 1?>">
                        <p style="
                            font-weight: bold;
                            font-size: 14px;
                        "><?=$key?></p>
                    </td>
                </tr>
                <?php foreach($sub as $list) { ?>
                    <input style="display: none" name="subclass_id[]" value="<?=$list['id']?>">
                    <?php if($this->auth->role == "student") { ?>
                        <tr>
                            <td>
                                <?=$list['subject_name']?>
                            </td>
                            <td>
                                <?=$list['task']?>
                            </td>
                            <td>
                                <?=$list['midtest']?>
                            </td>
                            <td>
                                <?=$list['endtest']?>
                            </td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td>
                                <?=$list['subject_name']?>
                            </td>
                            <td>
                                <input <?=$list["status"] ? 'readonly' : null ?> value="<?=$list['task']?>" type="number" class="form-control" name="task[<?=$list['id']?>][]">
                            </td>
                            <td>
                                <input <?=$list["status"] ? 'readonly' : null ?> value="<?=$list['midtest']?>" type="number" class="form-control" name="midtest[<?=$list['id']?>][]">
                            </td>
                            <td>
                                <input <?=$list["status"] ? 'readonly' : null ?> value="<?=$list['endtest']?>" type="number" class="form-control" name="endtest[<?=$list['id']?>][]">
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>

    <div class="btn-container">
        <?php if($this->auth->role == "admin" || $this->auth->role == "teacher") {?>
            <button type="submit" id="save" class="btn btn-default"><?=$action == "add" ? "Simpan" : "Update" ?></button>
        <?php } ?>
        <?php if($action == "update" && $this->auth->role == "admin") {?>
            <button type="button" id="delete" class="btn btn-danger">Reset</button>
        <?php } ?>
    </div>
</form>

<style>
	.btn-container {
		padding: 20px;
	}
</style>

<script>
    let BASE_URL = '<?=base_url()?>';
    let studentId = '<?=$studentId?>';
    let action = '<?=$action?>';

    $("#save-values").on("submit", function(e) {
		e.preventDefault();

		$("#save").html("Loading...");
		const el = $(this);
		const action = el.data("action");
		const url = el.data("url");
		const data = new FormData(this);
		const responseBtn = action == "add" ? "Simpan" : "Update";
		reqFormData(url, "POST", data, (err, response) => {
			if(response) {
				swal("Sukses", response.message, "success");
				getSubclass();
				$("#save").html(responseBtn);
			} else {
				console.log("Error: ", err);
			}
		});
    });
    
    $("#delete").on("click", function() {
        let data  = {
            studentId: studentId,
            subclassId: <?=json_encode($subclassId)?>
        }
        const url = `${BASE_URL}admin/values/delete`;

        swal(
		{
			title: "Hapus",
			text: "Apakah anda yakin ingin mereset nilai ?",
			type: "warning",
			showCancelButton: true,
			confirmButtonClass: "btn-danger",
			confirmButtonText: "Ya, Hapus!",
			closeOnConfirm: false,
		},
		function () {
                reqJson(url, "POST", data, (err, response) => {
                    if(response) {
                        swal("Sukses", response.message, "success");
                        getSubclass();
                        $("#year").removeAttr("disabled");
                    } else {
                        console.log("Error: ", err);
                    }
                });
            }
        );
    });
</script>