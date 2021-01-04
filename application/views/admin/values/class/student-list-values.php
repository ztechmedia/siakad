<table class="tbl">
    <tr>
        <td class="td">Nama</td>
        <td class="td">:</td>
        <td class="td"><?=$student->name?></td>
    </tr>

    <tr>
        <td class="td">TTL</td>
        <td class="td">:</td>
        <td class="td"><?=$student->birth_place.", ".revDate($student->birth_date)?></td>
    </tr>

    <tr>
        <td class="td">Jenis Kelamin</td>
        <td class="td">:</td>
        <td class="td"><?=$student->gender?></td>
    </tr>

    <tr>
        <td class="td">Alamat</td>
        <td class="td">:</td>
        <td class="td"><?=$student->address?></td>
    </tr>
</table>

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
            <?php } ?>
        <?php } ?>
    </tbody>
</table>

<style>
    .tbl {
        margin: 10px;
        font-size: 12px;
    }

    .td {
        padding: 5px;
    }
</style>