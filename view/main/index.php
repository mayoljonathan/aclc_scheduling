<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ACLC Scheduling System</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Chosen select -->
    <link href="assets/css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="assets/css/plugins/select2/select2.min.css" rel="stylesheet">
    
    <!-- Toastr style -->
    <link href="assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="assets/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="assets/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

    <!-- Input Mask -->
    <link href="assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

    <!-- ICHECK -->
    <link href="assets/css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    
    <!-- custom style css -->
    <link href="assets/css/custom_style.css" rel="stylesheet">
    <link href="assets/font-awesome/css/icon.css" rel="stylesheet" >

    <!-- SCRIPTS -->
    <!-- Mainly scripts -->
    <script src="assets/js/jquery-2.1.1.js"></script>

    <!-- GLOBAL JS -->
    <!-- transform uppercase/lowercase -->
    <script src="js/global/transformUL.js"></script>
    <script src="js/global/loader.js"></script>
    <script src="js/global/toStandardTime.js"></script>
    <script src="login/logout.js"></script>
    <script src="js/route/route.js"></script>

       
    <!-- Input Mask-->
    <script src="assets/js/plugins/jasny/jasny-bootstrap.min.js"></script>

    <!-- Chosen Select2-->
    <script src="assets/js/plugins/chosen/chosen.jquery.js"></script>
    <script src="assets/js/plugins/select2/select2.full.min.js"></script>
   
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/js/plugins/jeditable/jquery.jeditable.js"></script>


    <!-- Flot -->
    <script src="assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="assets/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="assets/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="assets/js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="assets/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="assets/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="assets/js/inspinia.js"></script>
    <script src="assets/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="assets/js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="assets/js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="assets/js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="assets/js/plugins/toastr/toastr.min.js"></script>

    <!-- iCheck -->
    <script src="assets/js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
    </script>

    <!-- Data Tables -->
    <script src="assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="assets/js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="assets/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

    <!-- CUSTOM js -->
    <!-- welcome js -->
    <script src="templates/welcome.js"></script>

    <!-- subject js -->
    <script src="js/subject/subject_view.js"></script>
    <script src="js/subject/showProspectus.js"></script>
    <script src="js/subject/submitSubject.js"></script>
    <script src="js/subject/updateStatus.js"></script>

    <!-- schedule js -->
    <script src="js/schedule/schedule_view.js"></script>
    <script src="js/schedule/updateStatus.js"></script>
    <script src="js/schedule/showRoomSchedule.js"></script>

    <script src="js/schedule/addBlock/showProspectus.js"></script>
    <script src="js/schedule/addBlock/schedCourse_view.js"></script>
    <script src="js/schedule/addBlock/alphabet.js"></script>
    <script src="js/schedule/addBlock/addBlock.js"></script>
    <script src="js/schedule/addBlock/blockSched_view.js"></script>
    <script src="js/schedule/addBlock/setDays.js"></script>

    <!-- course js -->
    <script src="js/course/course_view.js"></script>
    <script src="js/course/submitCourse.js"></script>
    <script src="js/course/updateStatus.js"></script>

    <!-- department js -->
    <script src="js/department/department_view.js"></script>
    <script src="js/department/submitDepartment.js"></script>
    <script src="js/department/updateStatus.js"></script>

    <!-- faculty js -->
    <script src="js/faculty/faculty_view.js"></script>
    <script src="js/faculty/submitFaculty.js"></script>
    <script src="js/faculty/updateStatus.js"></script>

    <script src="js/faculty/facultyLoad/facultyLoad_view.js"></script>

    <!-- room js -->
    <script src="js/room/room_view.js"></script>
    <script src="js/room/submitRoom.js"></script>
    <script src="js/room/updateStatus.js"></script>

    <!-- user js -->
    <script src="js/user/user_view.js"></script>
    <script src="js/user/submitUser.js"></script>
    <script src="js/user/updateStatus.js"></script>

    <!-- settings js -->
    <script src="js/settings/schoolyear_view.js"></script>
    <script src="js/settings/submitSy.js"></script>
    <script src="js/settings/updateStatus.js"></script>


</head>

<body>
    <div id="wrapper">
        <?php require 'templates/loader.php'; ?>

        <!-- SIDEBAR -->
        <?php require 'templates/sidebar.php'; ?>
        
        <div id="page-wrapper" class="gray-bg">

            <!-- HEADER -->
            <?php require 'templates/header.php'; ?>
            <!-- FOOTER -->
            <?php 
                // require 'templates/footer.php'; 
            ?>
            <!-- CONTENT -->
            <?php $session_user_type = $_SESSION['user']['user_type']; ?>


            <div id="home"></div>
            <?php if($session_user_type == 'REGISTRAR' || $session_user_type == 'ADMIN' || $session_user_type == 'SECRETARY'){ ?>
            <div id="subject"></div>
            <?php } ?>
            <?php if($session_user_type == 'SECRETARY' || $session_user_type == 'ADMIN'){ ?>
            <div id="schedule"></div>
            <?php } ?>
            <?php if($session_user_type == 'REGISTRAR' || $session_user_type == 'ADMIN'){ ?>
            <div id="course"></div>
            <?php } ?>
            <?php if($session_user_type == 'HR' || $session_user_type == 'ADMIN' || $session_user_type == 'SECRETARY'){ ?>
            <div id="department"></div>
            <div id="faculty"></div>
            <?php } ?>
            <?php if($session_user_type == 'ADMIN' || $session_user_type == 'SECRETARY'){ ?>
            <div id="room"></div>
            <div id="user"></div>
            <div id="report"></div>
            <div id="settings"></div>
            <?php } ?>
            
        </div>
    </div>

    
</body>
</html>
