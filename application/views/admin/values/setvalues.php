<div class="page-title">
	<h2><span 
		style="cursor: pointer"
		class="fa fa-mail-reply link-to-unsave" 
		onclick="showright()"
		data-target=".student-area" 
		data-to="<?= base_url("admin/values/$student->id/classlist") ?>"></span></h2>
</div>

<div class="row" style="margin-bottom: 10px">
	<div class="page-content-wrap">
		<div class="panel panel-default">
			<table class="table">
				<thead>
					<tr>
						<th>Detail Siswa</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Nama</td>
						<td><?=$student->name?></td>
					</tr>
					<tr>
						<td>NIS</td>
						<td><?=$student->nis?></td>
					</tr>
					<tr>
						<td>Nilai Kelas</td>
						<td>Kelas <?=$student->classname?></td>
					</tr>
					<tr>
						<td>Tahun Pelajaran</td>
						<td>
							<select style="color: #000; 
								<?=$this->auth->role == "student" ? 'display:none;' : null?>" 
								onchange="getSubclass()" class="form-control" name="year" id="year">
								<?php 
									for ($i=2008;$i<=2099;$i++) {
										$selected = $i == $year ? "selected" : null;
										echo "<option $selected value='$i'>$i</option>";
									}
								?>
							</select>
							<?= $this->auth->role == 'student' ? $year : null ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="row">
	<div class="page-content-wrap">
		<div class="panel panel-default">
			<div class="subclassList"></div>
		</div>
	</div>
</div>

<script>
	const BASE_URL = '<?=base_url()?>';
	let classId = '<?=$classId?>';
	let studentId = '<?=$student->id?>';

    function getSubclass() {
		const year = $("#year").val();
		const url = `${BASE_URL}admin/values/${classId}/${year}/${studentId}/subclass`;
		loadContent(url, ".subclassList");
	}

	getSubclass();
</script>