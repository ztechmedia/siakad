<div style="background: #fff">
    <table class="table">
        <thead>
            <tr>
                <th>Semester</th>
                <th>Senin</th>
                <th>Selasa</th>
                <th>Rabu</th>
                <th>Kamis</th>
                <th>Jumat</th>
                <th>Sabtu</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($schedules as $key => $schedule) { ?>
                <tr>
                    <td>
                        <p style="
                            font-weight: bold;
                            font-size: 14px;
                        "><?=$key?></p>
                    </td>
            
                    <td>
                        <?php if(array_key_exists("Senin", $schedule)) { foreach ($schedule["Senin"] as $sch) { ?>
                            <p>
                                <?=$sch['subject_name']." (".$sch['start_time']." - ".$sch['end_time'].")"?>
                                <?php if($this->auth->role == "admin") { ?>
                                <a style="color:red" 
                                    onclick="deleteSchedule('<?=$sch['schedule_id']?>', '<?=$sch['subject_name']?>')">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                                <?php } ?>
                            </p>
                        <?php } } else { echo ""; } ?>
                    </td>

                    <td>
                        <?php if(array_key_exists("Selasa", $schedule)) { foreach ($schedule["Selasa"] as $sch) { ?>
                            <p>
                                <?=$sch['subject_name']." (".$sch['start_time']." - ".$sch['end_time'].")"?>
                                <?php if($this->auth->role == "admin") { ?>
                                <a style="color:red" 
                                    onclick="deleteSchedule('<?=$sch['schedule_id']?>', '<?=$sch['subject_name']?>')">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                                <?php } ?>
                            </p>
                        <?php } } else { echo ""; } ?>
                        
                    </td>

                    <td>
                        <?php if(array_key_exists("Rabu", $schedule)) { foreach ($schedule["Rabu"] as $sch) { ?>
                            <p>
                                <?=$sch['subject_name']." (".$sch['start_time']." - ".$sch['end_time'].")"?>
                                <?php if($this->auth->role == "admin") { ?>
                                <a style="color:red" 
                                    onclick="deleteSchedule('<?=$sch['schedule_id']?>', '<?=$sch['subject_name']?>')">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                                <?php } ?>
                            </p>
                        <?php } } else { echo ""; } ?>
                    </td>

                    <td>
                        <?php if(array_key_exists("Kamis", $schedule)) { foreach ($schedule["Kamis"] as $sch) { ?>
                            <p>
                                <?=$sch['subject_name']." (".$sch['start_time']." - ".$sch['end_time'].")"?>
                                <?php if($this->auth->role == "admin") { ?>
                                <a style="color:red" 
                                    onclick="deleteSchedule('<?=$sch['schedule_id']?>', '<?=$sch['subject_name']?>')">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                                <?php } ?>
                            </p>
                        <?php } } else { echo ""; } ?>
                    </td>

                    <td>
                        <?php if(array_key_exists("Jumat", $schedule)) { foreach ($schedule["Jumat"] as $sch) { ?>
                            <p>
                                <?=$sch['subject_name']." (".$sch['start_time']." - ".$sch['end_time'].")"?>
                                <?php if($this->auth->role == "admin") { ?>
                                <a style="color:red" 
                                    onclick="deleteSchedule('<?=$sch['schedule_id']?>', '<?=$sch['subject_name']?>')">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                                <?php } ?>
                            </p>
                        <?php } } else { echo ""; } ?>
                    </td>

                    <td>
                        <?php if(array_key_exists("Sabtu", $schedule)) { foreach ($schedule["Sabtu"] as $sch) { ?>
                            <p>
                                <?=$sch['subject_name']." (".$sch['start_time']." - ".$sch['end_time'].")"?>
                                <?php if($this->auth->role == "admin") { ?>
                                <a style="color:red" 
                                    onclick="deleteSchedule('<?=$sch['schedule_id']?>', '<?=$sch['subject_name']?>')">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                                <?php } ?>
                            </p>
                        <?php } } else { echo ""; } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>