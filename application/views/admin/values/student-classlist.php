<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body list-group">
                    <a class="list-group-item"><span class="fa fa-angle-right"></span> Nama :
                        <span class="pull-right"><?=$student->name?></span>
                    </a>

                    <a class="list-group-item"><span class="fa fa-angle-right"></span> Kelas :
                        <span class="pull-right"><?=$student->classname?></span>
                    </a>

                    <a class="list-group-item"><span class="fa fa-angle-right"></span> Nis :
                        <span class="pull-right"><?=$student->nis?></span>
                    </a>
                    
                    <a class="list-group-item"><span class="fa fa-angle-right"></span> Tempat, Tangal Lahir :
                        <span class="pull-right"><?=$student->birth_place.", ".revDate($student->birth_date)?></span>
                    </a>

                    <a class="list-group-item"><span class="fa fa-angle-right"></span> Jenis Kelamin :
                        <span class="pull-right"><?=$student->gender?></span>
                    </a>

                    <a class="list-group-item"><span class="fa fa-angle-right"></span> Alamat :
                        <span class="pull-right"><?=$student->address?></span>
                    </a>

                    <a class="list-group-item"><span class="fa fa-angle-right"></span> No. HP :
                        <span class="pull-right"><?=$student->phone?></span>
                    </a>

				</div>
			</div>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
            <?php foreach ($classes as $class) { ?>
                <a 
                    onclick="hideright()"
                    style="margin-bottom: 5px;font-weight:bold" href="#" 
                    class="list-group-item link-to-unsave" 
                    data-to="<?=base_url("admin/values/$student->id/$class->id/setvalues")?>"
                    data-target=".student-area">                                 
                        <span class="contacts-title">Kelas <?=$class->classname?></span>                                                                                                  
                </a>
            <?php } ?>
        </div>
	</div>

</div>