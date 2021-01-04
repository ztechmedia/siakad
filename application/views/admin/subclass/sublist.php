<div class="panel panel-default">
	<div class="panel-body" style="padding:0px">
		<table class="table table-striped">
            <thead>
                <tr>
                    <th>Semester</th>
                    <th>Mata Pelajaran</th>
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
                        <tr>
                            <td>
                                <?=$list['subject_name']?>
                                <a style="color:red" 
                                    onclick="deleteSubject(
                                                '<?=$list['subject_id']?>',
                                                '<?=$list['subject_name']?>',
                                                '<?=$list['semester_name']?>',
                                                '<?=$list['semester_id']?>'
                                            )">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
	</div>
</div>