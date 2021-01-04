<div class="form-group">
    <label class="col-md-3 control-label">NIP</label>
    <div class="col-md-6">
        <input name="nip" id="nip" type="text" class="validate[required,maxSize[15]] form-control" 
            value="<?=$teacher ? $teacher->nip : ""?>" />
        <span class="help-block form-error" id="nip-error"></span>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Name</label>
    <div class="col-md-6">
        <input name="name" id="name" type="text" class="validate[required,maxSize[30]] form-control" 
            value="<?=$teacher ? $teacher->name : ""?>" />
        <span class="help-block form-error" id="name-error"></span>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Jenis Kelamin</label>
    <div class="col-md-6">
        <select class="form-control" name="gender" id="gender">
        <?php 
            $genders = ["Laki - Laki", "Perempuan"];
            foreach ($genders as $gender) {
                $selected = $gender === $teacher->gender ? "selected" : null;
                echo "<option $selected value='$gender'>$gender</option>";
            }
        ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Alamat</label>
    <div class="col-md-6">
        <textarea name="address" id="address" class="validate[required] form-control"><?=$teacher ? $teacher->address : ""?></textarea>
        <span class="help-block form-error" id="address-error"></span>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Tempat Lahir</label>
    <div class="col-md-6">
        <input name="birth_place" id="birth_place" type="text" class="validate[required,maxSize[30]] form-control" 
            value="<?=$teacher ? $teacher->birth_place : ""?>" />
        <span class="help-block form-error" id="birth_place-error"></span>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Tanggal Lahir</label>
    <div class="col-md-6">
        <input readonly name="birth_date" id="birth_date" type="text" class="validate[required,maxSize[30]] form-control" 
            style="color: #000;cursor:pointer;"
            value="<?=$teacher ? revDate($teacher->birth_date) : '01-01-1999'?>" 
            data-date="01-01-1999" 
            data-date-format="dd-mm-yyyy" 
            data-date-viewmode="months"/>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">No. Telpon</label>
    <div class="col-md-6">
        <input name="phone" id="phone" type="text" class="validate[maxSize[14]] form-control mask_phone" 
            value="<?=$teacher ? $teacher->phone : ""?>" />
        <span class="help-block form-error" id="phone-error"></span>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Email</label>
    <div class="col-md-6">
        <input name="email" id="email" type="text" class="validate[required,custom[email]],maxSize[50]] form-control" 
            value="<?=$teacher ? $teacher->email : ""?>" />
        <span class="help-block form-error" id="email-error"></span>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Pendidikan</label>
    <div class="col-md-6">
        <select class="form-control" name="education" id="education">
        <?php 
            $educations = ["S1", "S2", "S3"];
            foreach ($educations as $edu) {
                $selected = $edu === $teacher->education ? "selected" : null;
                echo "<option $selected value='$edu'>$edu</option>";
            }
        ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Jurusan</label>
    <div class="col-md-6">
        <input name="major" id="major" type="text" class="validate[required,maxSize[50]] form-control" 
            value="<?=$teacher ? $teacher->major : ""?>" />
        <span class="help-block form-error" id="major-error"></span>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Status</label>
    <div class="col-md-6">
        <select class="form-control" name="status" id="status">
        <?php 
            $status = ["Lajang", "Menikah"];
            foreach ($status as $stat) {
                $selected = $stat === $teacher->status ? "selected" : null;
                echo "<option $selected value='$stat'>$stat</option>";
            }
        ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Status Kerja</label>
    <div class="col-md-6">
        <select class="form-control" name="work_status" id="work_status">
        <?php 
            $works = ["PNS", "Honorer"];
            foreach ($works as $work) {
                $selected = $work === $teacher->work_status ? "selected" : null;
                echo "<option $selected value='$work'>$work</option>";
            }
        ?>
        </select>
    </div>
</div>

<script>
    $("#birth_date").datepicker();
    $("input.mask_phone").mask("9999-9999-9999");
</script>