<script type="text/javascript" src="<?=base_url("assets/custom/tinymce/tinymce.min.js")?>"></script>

<div class="form-group">
	<label class="col-md-3 control-label">Judul</label>
	<div class="col-md-6">
		<input name="title" id="title" type="text" class="validate[required] form-control"
			value="<?=$agenda ? $agenda->title : ''?>" />
		<span class="help-block form-error" id="nis-error"></span>
	</div>
</div>

<div class="form-group">
	<label class="col-md-3 control-label">Tanggal Kegiatan</label>
	<div class="col-md-6">
		<input readonly name="date" id="date" type="text" class="validate[required,maxSize[30]] form-control"
			style="color: #000;cursor:pointer;" value="<?=$agenda ? revDate($agenda->date) : date('d-m-Y')?>"
			data-date="<?=date('d-m-Y')?>" data-date-format="dd-mm-yyyy" data-date-viewmode="months" />
	</div>
</div>

<div class="form-group">
	<label class="col-md-3 control-label">Deskripsi</label>
	<div class="col-md-8">
		<textarea height="500px" name="description" id="description"><?=$agenda ? $agenda->description : ""?></textarea>
		<span class="help-block form-error" id="activity-error"></span>
	</div>
</div>

<script type="text/javascript">
	tinymce.init({
		selector: "#description",
		plugins: [
			'advlist autolink lists link image charmap print preview anchor',
			'searchreplace visualblocks code fullscreen',
			'insertdatetime media table paste imagetools wordcount'
		],
		toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image',
		automatic_uploads: true,
		image_advtab: true,
		images_upload_url: "<?= base_url("admin/agenda/tinyupload") ?>",
		file_picker_types: 'image',
		paste_data_images: true,
		relative_urls: false,
		remove_script_host: false,
		file_picker_callback: function (cb, value, meta) {
			let input = document.createElement('input');
			input.setAttribute('type', 'file');
			input.setAttribute('accept', 'image/*');
			input.onchange = function () {
				let file = this.files[0];
				let reader = new FileReader();
				reader.readAsDataURL(file);
				reader.onload = function () {
					var id = 'post-image-' + (new Date()).getTime();
					var blobCache = tinymce.activeEditor.editorUpload.blobCache;
					var blobInfo = blobCache.create(id, file, reader.result);
					blobCache.add(blobInfo);
					cb(blobInfo.blobUri(), {
						title: file.name
					});
				};
			};
			input.click();
		}
	});
	$("#date").datepicker();
</script>

<style>
	#description {
		height: 500px;
	}
</style>