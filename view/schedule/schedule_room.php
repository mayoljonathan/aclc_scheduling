<?php require_once '../../library/config.php'; ?>
<?php 
	$sy_code = $_SESSION['user']['sy_code'];
?>
	<br>
	<?php 
		$getRoomsByTypeReg = $dbConn->query("SELECT * FROM tbl_room WHERE room_type='REGULAR' ");
	?>
	<?php 
		$getRoomsByTypeLab = $dbConn->query("SELECT * FROM tbl_room WHERE room_type='LABORATORY' ");
	?>

	<!-- GET ALL FLOOR_LEVEL IN DATABASE -->
	<?php 
		$getFloorLevel = $dbConn->query("SELECT DISTINCT floor_level FROM tbl_room");
	?>
	
	<div class="tabs-container">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab1"> REGULAR ROOMS</a></li>
            <li class=""><a data-toggle="tab" href="#tab2">LABORATORY ROOMS</a></li>
        </ul>

        <div class="tab-content">
        	<!-- REGULAR TAB -->
            <div id="tab1" class="tab-pane active">
                <div class="panel-body animated fadeIn">

                	<div class="row dashboard-header">
                    <?php 
                    	while($row = $getRoomsByTypeReg->fetch(PDO::FETCH_ASSOC)) { 
						extract($row);
                    ?>
	                    <a href="#schedule_list" id="showRoomSchedule" data-room="<?php echo $room_id;?>">
							<div class="col-lg-3">
							    <div class="widget style1 lazur-bg">
							        <div class="row">

							            <div class="col-xs-4">
							                <h1><?php echo strtoupper($room_name); ?></h1>
							            </div>

							            <div class="col-xs-8 text-right">
						            	<?php 
						            		$getTotalSubjectScheduled = $dbConn->query("SELECT COUNT(schedule_id) AS 'total_subjectScheduled' FROM tbl_schedule WHERE lec_room='".$room_name."' AND schoolyear_code='".$sy_code."' ");
											while($gtss = $getTotalSubjectScheduled->fetch(PDO::FETCH_ASSOC)) {
						            	?>
							                <span> Total Classes </span>
							                <h3 class="font-bold"><?php echo $gtss['total_subjectScheduled']; ?></h3>
						                <?php } ?>
							            </div>

							        </div>
							    </div>
							</div>
						</a>
					<?php } ?>
                	</div>

            	</div>
        	</div>
        	<!-- LABORATORY TAB -->
            <div id="tab2" class="tab-pane">
                <div class="panel-body animated fadeIn">
                    
                	<div class="row dashboard-header">
                    <?php 
                    	while($row = $getRoomsByTypeLab->fetch(PDO::FETCH_ASSOC)) { 
						extract($row);
                    ?>
	                    <a href="#schedule_list" id="showRoomSchedule" data-room="<?php echo $room_id;?>">
							<div class="col-lg-3">
							    <div class="widget style1 lazur-bg">
							        <div class="row">
							        
							            <div class="col-xs-4">
							                <h1><?php echo strtoupper($room_name); ?></h1>
							            </div>
							            <div class="col-xs-8 text-right">
						                <?php 
						            		$getTotalSubjectScheduled = $dbConn->query("SELECT COUNT(schedule_id) AS 'total_subjectScheduled' FROM tbl_schedule WHERE lab_room='".$room_name."' AND schoolyear_code='".$sy_code."'");
											while($gtss = $getTotalSubjectScheduled->fetch(PDO::FETCH_ASSOC)) {
						            	?>
							                <span> Total Classes </span>
							                <h3 class="font-bold"><?php echo $gtss['total_subjectScheduled']; ?></h3>
						                <?php } ?>
							            </div>

							        </div>
							    </div>
							</div>
						</a>
					<?php } ?>
                	</div>

                </div>
            </div>
        </div>


    </div>


