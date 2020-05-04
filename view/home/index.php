<?php require '../../library/config.php'; ?>
<?php 
    $sy_code = $_SESSION['user']['sy_code'];
    // $user_type = $_SESSION['user']['user_type'];
?>

<div class="row border-bottom white-bg dashboard-header">
    <h1>Home</h1>
</div>

<div class="col-lg-12">
    <div class="wrapper wrapper-content">
        <!-- 
            $csvData = file_get_contents($fileName);
            $lines = explode(PHP_EOL, $csvData);
            $array = array();
            foreach ($lines as $line) {
                $array[] = str_getcsv($line);
            }
            print_r($array);
         -->
        <h2>Class Schedules</h2>
        <!-- ALL -->
        <div class="col-lg-4">
            <div class="widget style1 lazur-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-star fa-4x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> All Classes in this Semester </span>
                        <?php
                            $sql = $dbConn->query("SELECT COUNT(schedule_id) AS classCount FROM tbl_schedule WHERE schoolyear_code='".$sy_code."'");
                            $row = $sql->fetch(PDO::FETCH_ASSOC);
                            if($sql->rowCount() > 0){
                                extract($row);
                            }
                        ?>
                        <h2 class="font-bold"><?php echo $classCount; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- ACTIVE CLASSES -->
        <div class="col-lg-4">
            <div class="widget style1 lazur-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-check-square-o fa-4x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> Active Classes in this Semester </span>
                        <?php
                            $sql = $dbConn->query("SELECT COUNT(schedule_id) AS classCount FROM tbl_schedule WHERE schoolyear_code='".$sy_code."' AND schedule_status='1' ");
                            $row = $sql->fetch(PDO::FETCH_ASSOC);
                            if($sql->rowCount() > 0){
                                extract($row);
                            }
                        ?>
                        <h2 class="font-bold"><?php echo $classCount; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- DISSOLVED CLASSES -->
        <div class="col-lg-4">
            <div class="widget style1 yellow-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-warning fa-4x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> Dissolved Classes in this Semester </span>
                        <?php
                            $sql = $dbConn->query("SELECT COUNT(schedule_id) AS classCount FROM tbl_schedule WHERE schoolyear_code='".$sy_code."' AND schedule_status='0' ");
                            $row = $sql->fetch(PDO::FETCH_ASSOC);
                            if($sql->rowCount() > 0){
                                extract($row);
                            }
                        ?>
                        <h2 class="font-bold"><?php echo $classCount; ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <h2>Instructor</h2>
        <div class="col-lg-4">
            <div class="widget style1 lazur-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-users fa-4x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> All Instructor </span>
                        <?php
                            $sql = $dbConn->query("SELECT COUNT(faculty_id) AS facultyCount FROM tbl_faculty");
                            $row = $sql->fetch(PDO::FETCH_ASSOC);
                            if($sql->rowCount() > 0){
                                extract($row);
                            }
                        ?>
                        <h2 class="font-bold"><?php echo $facultyCount; ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- ACTIVE FACULTY -->
        <div class="col-lg-4">
            <div class="widget style1 lazur-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-check-square-o fa-4x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> Active Instructor </span>
                        <?php
                            $sql = $dbConn->query("SELECT COUNT(faculty_id) AS facultyCount FROM tbl_faculty WHERE faculty_status='1' ");
                            $row = $sql->fetch(PDO::FETCH_ASSOC);
                            if($sql->rowCount() > 0){
                                extract($row);
                            }
                        ?>
                        <h2 class="font-bold"><?php echo $facultyCount; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- INACTIVE FACULTY -->
        <div class="col-lg-4">
            <div class="widget style1 yellow-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-warning fa-4x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> Inactive Instructor </span>
                        <?php
                            $sql = $dbConn->query("SELECT COUNT(faculty_id) AS facultyCount FROM tbl_faculty WHERE faculty_status='0' ");
                            $row = $sql->fetch(PDO::FETCH_ASSOC);
                            if($sql->rowCount() > 0){
                                extract($row);
                            }
                        ?>
                        <h2 class="font-bold"><?php echo $facultyCount; ?></h2>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</div>

