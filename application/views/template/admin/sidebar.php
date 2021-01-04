<li class="dashboard">
    <a class="side-menu" data-url="<?=base_url("admin/dashboard")?>" data-menu=".dashboard"><span
            class="fa fa-dashboard"></span> <span class="xn-text">Dashboard</span></a>
</li>

<?php if($this->auth->role == 'admin') {?>
<li class="xn-openable users">
    <a><span class="fa fa-user"></span> <span class="xn-text">Akun</span></a>
    <ul>
        <li class="admin"><a class="side-submenu" data-url="<?=base_url("admin/users/1")?>" data-menu=".users"
                data-submenu=".admin"><span class="fa fa-crosshairs"></span> Admin</a></li>

        <li class="teacher"><a class="side-submenu" data-url="<?=base_url("admin/users/2")?>" data-menu=".users"
                data-submenu=".teacher"><span class="fa fa-crosshairs"></span> Guru</a></li>

        <li class="student"><a class="side-submenu" data-url="<?=base_url("admin/users/3")?>" data-menu=".users"
                data-submenu=".student"><span class="fa fa-crosshairs"></span> Siswa</a></li>
    </ul>
</li>
<?php } ?>

<?php if ($this->auth->role == 'admin' || $this->auth->role == 'teacher') { ?>
<li class="xn-openable master">
    <a><span class="glyphicon glyphicon-hdd"></span> <span class="xn-text">Master</span></a>
    <ul>
        <?php if($this->auth->role == 'admin') {?>
                <li class="classes"><a class="side-submenu" data-url="<?=base_url("admin/class")?>" data-menu=".master"
                        data-submenu=".classes"><span class="fa fa-crosshairs"></span> Kelas</a></li>
                <li class="semesters"><a class="side-submenu" data-url="<?=base_url("admin/semesters")?>" data-menu=".master"
                        data-submenu=".semesters"><span class="fa fa-crosshairs"></span> Semester</a></li>
                <li class="subjects"><a class="side-submenu" data-url="<?=base_url("admin/subjects")?>" data-menu=".master"
                        data-submenu=".subjects"><span class="fa fa-crosshairs"></span> Mata Pelajaran</a></li>
                <li class="teachers"><a class="side-submenu" data-url="<?=base_url("admin/teachers")?>" data-menu=".master"
                        data-submenu=".teachers"><span class="fa fa-crosshairs"></span> Guru</a></li>
        <?php } ?>
       
        <li class="students"><a class="side-submenu" data-url="<?=base_url("admin/students")?>" data-menu=".master"
                data-submenu=".students"><span class="fa fa-crosshairs"></span> Siswa</a></li>
       
    </ul>
</li>
<?php } ?>

<?php if($this->auth->role == "admin") { ?>
<li class="xn-openable relation">
    <a><span class="fa fa-code-fork"></span> <span class="xn-text">Manajemen KBM</span></a>
    <ul>
        <li class="subclass"><a class="side-submenu" data-url="<?=base_url("admin/subclass/$currentYear")?>" data-menu=".relation"
                data-submenu=".subclass"><span class="fa fa-crosshairs"></span> Mata Pelajaran</a></li>

        <li class="subteachers"><a class="side-submenu" data-url="<?=base_url("admin/subteachers/$currentYear")?>" data-menu=".relation"
                data-submenu=".subteachers"><span class="fa fa-crosshairs"></span> Pengajar</a></li>

        <li class="schedule"><a class="side-submenu" data-url="<?=base_url("admin/schedule/$currentYear")?>" data-menu=".relation"
                data-submenu=".schedule"><span class="fa fa-crosshairs"></span> Jadwal</a></li>
    </ul>
</li>
<?php } ?>

<?php if($this->auth->role == "student" || $this->auth->role == 'teacher') {?>
<li class="schedule">
    <a class="side-menu" data-url="<?=base_url("admin/schedule/$currentYear")?>" data-menu=".schedule"><span
            class="fa fa-calendar"></span> <span class="xn-text">Jadwal Pelajaran</span></a>
</li>
<?php } ?>

<?php if ($this->auth->role == 'admin' || $this->auth->role == 'teacher') { ?>
<li class="xn-openable values">
    <a><span class="glyphicon glyphicon-book"></span> <span class="xn-text">Nilai</span></a>
    <ul>
        <li class="value""><a class="side-submenu" data-url="<?=base_url("admin/values")?>" data-menu=".values"
                data-submenu=".value""><span class="fa fa-crosshairs"></span> Input Nilai</a></li>
        <li class="class-value""><a class="side-submenu" data-url="<?=base_url("admin/values/class-values/$currentYear")?>" data-menu=".values"
                data-submenu=".class-value""><span class="fa fa-crosshairs"></span> Nilai Siswa</a></li>
    </ul>
</li>
<?php } ?>

<?php if($this->auth->role == 'student') { ?>
<li class="student-value">
    <a class="side-menu" data-url="<?=base_url("admin/student-value")?>" data-menu=".student-value"><span
        class="fa fa-book"></span> <span class="xn-text">Nilai Saya</span></a>
</li>   
<?php } ?>

<?php if($this->auth->role == "admin") { ?>
<li class="xn-openable manage_school">
    <a><span class="fa fa-globe"></span> <span class="xn-text">Website</span></a>
    <ul>
        <li class="history"><a class="side-submenu" data-url="<?=base_url("admin/history")?>" data-menu=".manage_school"
                data-submenu=".history"><span class="fa fa-crosshairs"></span> Sejarah</a></li>
        <li class="vimission"><a class="side-submenu" data-url="<?=base_url("admin/vimission")?>" data-menu=".manage_school"
                data-submenu=".vimission"><span class="fa fa-crosshairs"></span> Visi & Misi</a></li>
    </ul>
</li>
<?php } ?>