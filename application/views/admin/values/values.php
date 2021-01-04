<ul class="breadcrumb">
    <li>Nilai</li>
    <li class="active">Input Nilai</li>
</ul>

<div class="content-frame">
    <div class="content-frame-top">
        <div class="page-title">
            <h2>
                Input Nilai
            </h2>
        </div>
    </div>

    <div class="content-frame-right" style="height: 100vh; overflow: auto; overflowY: scroll;">
        <div class="form-group">
            <input onchange="searchStudent($(this).val())" type="text" class="form-control" placeholder="Cari siswa..."/>
        </div>

        <div class="student-list">
            <div class="panel panel-default">
				<div class="panel-body list-group custom-scroll-sm">
                    <a class="list-group-item">
                        <span class="fa fa-angle-right"></span> 
                        <strong> Nama Siswa </strong>
                    </a>
				</div>
			</div>
        </div>
    </div>

    <div class="content-frame-body content-frame-body-left">
        <div class="row">
            <div class="col-md-12">
               <div class="student-area"></div>
            </div>
        </div>
    </div>
</div>

<style>
    .student-list {
        margin-top: 10px;
    }
</style>

<script>
    const BASE_URL = '<?=base_url()?>';

    let currentStudent = localStorage.getItem("student-classlist-url");
    if(currentStudent && currentStudent.length > 0) {
        setTimeout(() => {
            loadContent(currentStudent, ".student-area");
        }, 500)
    }

    function searchStudent(student) {
        const url = `${BASE_URL}admin/values/student-search`;
        const data = {
            student: student
        }

        reqJson(url, "POST", data, (err, response) => {
            if(response) {
                $(".student-list").html(response.responseText);
            } else {
                console.log("Error: ", err);
            }
        });
    }

    function setStudent(studentId) {
        const url = `${BASE_URL}admin/values/${studentId}/classlist`;
        loadContent(url, ".student-area");
        localStorage.setItem("student-classlist-url", url);
    }

    function hideright() {
        $(".content-frame-right").hide();
        $(".content-frame-body-left").attr("style", "width: 100%");
    }

    function showright() {
        $(".content-frame-right").show();
        $(".content-frame-body-left").attr("style", "width: auto");
    }
</script>