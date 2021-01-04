<div class="form-group">
    <label class="col-md-3 control-label">NIS</label>
    <div class="col-md-6">
        <input name="nis" id="nis" type="text" class="validate[required,maxSize[15]] form-control" 
            value="<?=$student ? $student->nis : ""?>" />
        <span class="help-block form-error" id="nis-error"></span>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Name</label>
    <div class="col-md-6">
        <input name="name" id="name" type="text" class="validate[required,maxSize[30]] form-control" 
            value="<?=$student ? $student->name : ""?>" />
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
                $selected = $gender === $student->gender ? "selected" : null;
                echo "<option $selected value='$gender'>$gender</option>";
            }
        ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Alamat</label>
    <div class="col-md-6">
        <textarea name="address" id="address" class="validate[required] form-control"><?=$student ? $student->address : ""?></textarea>
        <span class="help-block form-error" id="address-error"></span>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Tempat Lahir</label>
    <div class="col-md-6">
        <input name="birth_place" id="birth_place" type="text" class="validate[required,maxSize[30]] form-control" 
            value="<?=$student ? $student->birth_place : ""?>" />
        <span class="help-block form-error" id="birth_place-error"></span>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Tanggal Lahir</label>
    <div class="col-md-6">
        <input readonly name="birth_date" id="birth_date" type="text" class="validate[required,maxSize[30]] form-control" 
            style="color: #000;cursor:pointer;"
            value="<?=$student ? revDate($student->birth_date) : '01-01-1999'?>" 
            data-date="01-01-1999" 
            data-date-format="dd-mm-yyyy" 
            data-date-viewmode="months"/>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">No. Telpon</label>
    <div class="col-md-6">
        <input name="phone" id="phone" type="text" class="validate[maxSize[14]] form-control mask_phone" 
            value="<?=$student ? $student->phone : ""?>" />
        <span class="help-block form-error" id="phone-error"></span>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Email</label>
    <div class="col-md-6">
        <input name="email" id="email" type="text" class="validate[required,custom[email]],maxSize[50]] form-control" 
            value="<?=$student ? $student->email : ""?>" />
        <span class="help-block form-error" id="email-error"></span>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Jurusan</label>
    <div class="col-md-6">
        <input name="major" id="major" type="text" class="validate[maxSize[30]] form-control" 
            value="<?=$student ? $student->major : ""?>" />
        <span class="help-block form-error" id="major-error"></span>
    </div>
</div>


<div class="form-group">
    <label class="col-md-3 control-label">Kelas</label>
    <div class="col-md-6">
        <select class="form-control" name="class_id" id="class_id">
        <?php 
            foreach ($classes as $class) {
                $selected = $class->id === $student->class_id ? "selected" : null;
                echo "<option $selected value='$class->id'>$class->classname</option>";
            }
        ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Semester</label>
    <div class="col-md-6">
        <select class="form-control" name="semester_id" id="semester_id">
        <?php 
            foreach ($semesters as $semester) {
                $selected = $semester->id === $student->semester_id ? "selected" : null;
                echo "<option $selected value='$semester->id'>$semester->semester_name</option>";
            }
        ?>
        </select>
    </div>
</div>

<script>
    $("#birth_date").datepicker();
    $("input.mask_phone").mask("9999-9999-9999");

    let role = '<?=$this->auth->role?>';
   
    if(role != "admin") {
        $(".form-control").attr("disabled", "disabled");
        $(".form-control").attr("style", "color:#000");
    }
</script>