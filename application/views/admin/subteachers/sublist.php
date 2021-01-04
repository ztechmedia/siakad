<div class="panel panel-default">
	<div class="panel-body" style="padding:0px">
		<table class="table table-striped">
            <thead>
                <tr>
                    <th>Semester</th>
                    <th>Mata Pelajaran</th>
                    <th>Nama Guru</th>
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
                    
                        <?php foreach($sub as $list) { ?>
                            <tr>
                                <td><?=$list['subject_name']?></td>
                                <?php if(!empty($list['teacher_name'])) { ?>
                                    <td>
                                        <?=$list['teacher_name']?>
                                        <button 
                                            onclick="setSubject('<?=$list['subject_name']?>', '<?=$key?>', 
                                                '<?=$list['semester_id']?>','<?=$list['subject_id']?>', '<?=$list['subclass_id']?>')" 
                                            class="btn btn-xs btn-warning">
                                            Ganti Guru
                                        </button>
                                    </td>
                                </tr>
                                <?php } else { ?>
                                    <td>
                                        <button 
                                            onclick="setSubject('<?=$list['subject_name']?>', '<?=$key?>', 
                                                '<?=$list['semester_id']?>', '<?=$list['subject_id']?>', '<?=$list['subclass_id']?>')" 
                                            class="btn btn-xs btn-info">
                                            Pilih Guru
                                        </button>
                                    </td>
                                <?php } ?>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
	</div>
</div>