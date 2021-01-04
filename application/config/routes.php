<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'AppController';
$route['404_override'] = 'AppController/pageNotFound';
$route['translate_uri_dashes'] = false;

//web routes
$route['home'] = 'web/WebController/home';
$route['vimission'] = 'web/WebController/vimission';
$route['history'] = 'web/WebController/history';
$route['agenda'] = 'web/WebController/agenda';
$route['agenda/(:num)/read'] = 'web/WebController/readAgenda/$1';
$route['register'] = 'web/WebController/register';
$route['register/add'] = 'web/WebController/add';

//school management
$route['admin/vimission'] = 'master/SchoolController/vimission';
$route['admin/vimission/update'] = 'master/SchoolController/updateVimission';
$route['admin/agenda'] = 'master/SchoolController/agenda';
$route['admin/agenda-table'] = 'master/SchoolController/agendaTable';
$route['admin/agenda/create'] = 'master/SchoolController/create';
$route['admin/agenda/(:num)/edit'] = 'master/SchoolController/edit/$1';
$route['admin/agenda/(:num)/update'] = 'master/SchoolController/update/$1';
$route['admin/agenda/tinyupload'] = 'master/SchoolController/tinyUpload';
$route['admin/agenda/add'] = 'master/SchoolController/add';
$route['admin/agenda/(:num)/delete'] = 'master/SchoolController/delete/$1';
$route['admin/history'] = 'master/SchoolController/history';
$route['admin/history/update'] = 'master/SchoolController/historyUpdate';

//student-values
$route['admin/student-value'] = 'relation/SubjectValue/studentValue';

//admin routes
$route['admin'] = 'AppController';

/* home routes */
//@view
$route['admin/dashboard'] = "HomeController/dashboard";

/* auth routes */
//@view
$route['login'] = 'AuthController/login';
$route['forgot-password'] = 'AuthController/forgotPassword';
$route['reset-password/(:any)'] = 'AuthController/resetPassword/$1';
//@action
$route['auth/login'] = 'AuthController/authLogin';
$route['auth/send-link-forgot'] = 'AuthController/sendLinkForgot';
$route['auth/reset/(:any)'] = 'AuthController/reset/$1';
$route['logout'] = 'AppController/logout';

/* users routes */
//@view
$route['admin/users/(:num)'] = 'UsersController/users/$1';
$route['admin/users-table/(:num)'] = 'UsersController/usersTable/$1';
$route['admin/users/create/(:num)'] = 'UsersController/create/$1';
$route['admin/users/(:num)/edit'] = 'UsersController/edit/$1';
//@action
$route['admin/users/add'] = 'UsersController/add';
$route['admin/users/(:num)/update'] = 'UsersController/update/$1';
$route['admin/users/(:num)/delete'] = 'UsersController/delete/$1';

/* teachers routes */
//@view
$route['admin/teachers'] = 'master/TeacherController/teachers';
$route['admin/teachers-table'] = 'master/TeacherController/teachersTable';
$route['admin/teachers/create'] = 'master/TeacherController/create';
$route['admin/teachers/(:num)/edit'] = 'master/TeacherController/edit/$1';
//@action
$route['admin/teachers/add'] = 'master/TeacherController/add';
$route['admin/teachers/(:num)/update'] = 'master/TeacherController/update/$1';
$route['admin/teachers/(:num)/delete'] = 'master/TeacherController/delete/$1';

/* students routes */
//@view
$route['admin/students'] = 'master/StudentController/students';
$route['admin/students-table'] = 'master/StudentController/studentsTable';
$route['admin/students/create'] = 'master/StudentController/create';
$route['admin/students/(:num)/edit'] = 'master/StudentController/edit/$1';
//@action
$route['admin/students/add'] = 'master/StudentController/add';
$route['admin/students/(:num)/update'] = 'master/StudentController/update/$1';
$route['admin/students/(:num)/delete'] = 'master/StudentController/delete/$1';

/* classes routes */
//@view
$route['admin/class'] = 'master/ClassesController/classes';
$route['admin/class-table'] = 'master/ClassesController/classesTable';
$route['admin/class/create'] = 'master/ClassesController/create';
$route['admin/class/(:num)/edit'] = 'master/ClassesController/edit/$1';
//@action
$route['admin/class/add'] = 'master/ClassesController/add';
$route['admin/class/(:num)/update'] = 'master/ClassesController/update/$1';
$route['admin/class/(:num)/delete'] = 'master/ClassesController/delete/$1';

/* semesters routes */
//@view
$route['admin/semesters'] = 'master/SemesterController/semesters';
$route['admin/semesters-table'] = 'master/SemesterController/semestersTable';
$route['admin/semesters/create'] = 'master/SemesterController/create';
$route['admin/semesters/(:num)/edit'] = 'master/SemesterController/edit/$1';
//@action
$route['admin/semesters/add'] = 'master/SemesterController/add';
$route['admin/semesters/(:num)/update'] = 'master/SemesterController/update/$1';
$route['admin/semesters/(:num)/delete'] = 'master/SemesterController/delete/$1';

/* subjects routes */
//@view
$route['admin/subjects'] = 'master/SubjectController/subjects';
$route['admin/subjects-table'] = 'master/SubjectController/subjectsTable';
$route['admin/subjects/create'] = 'master/SubjectController/create';
$route['admin/subjects/(:num)/edit'] = 'master/SubjectController/edit/$1';
//@action
$route['admin/subjects/add'] = 'master/SubjectController/add';
$route['admin/subjects/(:num)/update'] = 'master/SubjectController/update/$1';
$route['admin/subjects/(:num)/delete'] = 'master/SubjectController/delete/$1';

/* roles routes */
//@view
$route['admin/roles'] = 'RolesController/roles';
$route['admin/roles-table'] = 'RolesController/rolesTable';
$route['admin/roles/(:num)/edit'] = 'RolesController/edit/$1';
//@action
$route['admin/roles/(:num)/update'] = 'RolesController/update/$1';

/* subclass routes */
//@view
$route['admin/subclass/(:num)'] = 'relation/SubjectClass/subclass/$1';
$route['admin/subclass/(:num)/(:num)/edit'] = 'relation/SubjectClass/edit/$1/$2';
$route['admin/subclass/(:num)/(:num)/(:num)/check'] = 'relation/SubjectClass/checkClassSubjects/$1/$2/$3';
$route['admin/subclass/(:num)/(:num)/sublist'] = 'relation/SubjectClass/subclassList/$1/$2';
//@action
$route['admin/subclass/add'] = 'relation/SubjectClass/addSubclass';
$route['admin/subclass/(:num)/delete'] = 'relation/SubjectClass/delete/$1';

/* subteachers routes */
//@view
$route['admin/subteachers/(:num)'] = 'relation/SubjectTeacher/subteachers/$1';
$route['admin/subteachers/(:num)/(:num)/edit'] = 'relation/SubjectTeacher/edit/$1/$2';
$route['admin/subteachers/(:num)/(:num)/(:num)/(:num)/check'] = 'relation/SubjectTeacher/checkClassSubjects/$1/$2/$3/$4';
$route['admin/subteachers/(:num)/(:num)/sublist'] = 'relation/SubjectTeacher/subclassTeacers/$1/$2';
//@action
$route['admin/subteachers/add'] = 'relation/SubjectTeacher/add/$1';

/* values routes */
//@view
$route['admin/values'] = 'relation/SubjectValue/values';
$route['admin/values/class-values/(:num)'] = 'relation/SubjectValue/classValues/$1';
$route['admin/values/class-values/(:num)/(:num)/list'] = 'relation/SubjectValue/classValuesList/$1/$2';
$route['admin/values/class-values/(:num)/(:num)/(:num)/list-values'] = 'relation/SubjectValue/studentListValues/$1/$2/$3';
//@action
$route['admin/values/student-search'] = 'relation/SubjectValue/studentSearch';
$route['admin/values/(:num)/classlist'] = 'relation/SubjectValue/studentClasslist/$1';
$route['admin/values/(:num)/(:num)/setvalues'] = 'relation/SubjectValue/setValues/$1/$2';
$route['admin/values/(:num)/(:num)/(:num)/subclass'] = 'relation/SubjectValue/subclass/$1/$2/$3';
$route['admin/values/(:num)/add'] = 'relation/SubjectValue/add/$1';
$route['admin/values/(:num)/update'] = 'relation/SubjectValue/update/$1';
$route['admin/values/delete'] = 'relation/SubjectValue/delete';

/* values routes */
//@view
$route['admin/schedule/(:num)'] = 'master/ScheduleController/schedule/$1';
$route['admin/schedule/(:num)/(:num)/edit'] = 'master/ScheduleController/editSchedule/$1/$2';
$route['admin/schedule/(:num)/(:num)/(:num)/sm-subclass'] = 'master/ScheduleController/smSubclass/$1/$2/$3';
$route['admin/schedule/add'] = 'master/ScheduleController/add';
$route['admin/schedule/(:num)/(:num)/list'] = 'master/ScheduleController/scheduleList/$1/$2';
$route['admin/schedule/(:num)/delete'] = 'master/ScheduleController/delete/$1';
