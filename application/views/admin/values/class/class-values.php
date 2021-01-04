<ul class="breadcrumb">
    <li>Nilai</li>
	<li class="active">Nilai Siswa</li>
</ul>

<div class="content-frame">
    <div class="content-frame-top">
        <div class="page-title">
            <h2>
                Nilai Siswa
            </h2>
        </div>
    </div>

    <div class="content-frame-right" style="height: 100vh;">
        <div class="form-group">
            <label>Tahun:</label>
            <select class="form-control" name="year" id="year">
                <?php 
                    for ($i=2008;$i<=2099;$i++) {
                        $selected = $i == $year ? "selected" : null;
                        echo "<option $selected value='$i'>$i</option>";
                    }
                ?>
            </select>
        </div>       
    </div>

    <div class="content-frame-body content-frame-body-left">
        <div class="row">
            <div class="col-md-12">
            <?php foreach ($classes as $class) { ?>
                <a style="margin-bottom: 5px" href="#" 
                    class="list-group-item link-to" 
                    data-to="<?=base_url("admin/values/class-values/$class->id/$year/list")?>">                                 
                    <span class="contacts-title">Kelas <?=$class->classname?></span>
                </a>
            <?php } ?>
            </div>
        </div>
    </div>
</div>

<script>
    const BASE_URL = "<?=base_url()?>";
    
    $("#year").on("change", function() {
        let year = $(this).val();
        loadContent(`${BASE_URL}admin/values/class-values/${year}`, ".content");
    });
</script>