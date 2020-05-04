<?php require_once '../../library/config.php'; ?>
	<br>

	<?php 
		$getCoursesByDegree = $dbConn->query("SELECT * FROM tbl_course WHERE course_type='DEGREE' ORDER BY course_abbr ASC");
	?>
	<?php 
		$getCoursesByAssociate = $dbConn->query("SELECT * FROM tbl_course WHERE course_type='ASSOCIATE' ORDER BY course_abbr ASC");
	?>
	
	<div class="tabs-container">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab1"> DEGREE</a></li>
            <li class=""><a data-toggle="tab" href="#tab2">ASSOCIATE</a></li>
        </ul>

        <div class="tab-content">
        	<!-- DEGREE TAB -->
            <div id="tab1" class="tab-pane active">
                <div class="panel-body animated fadeIn">

                	<div class="row dashboard-header">
                    <?php 
                    	while($row = $getCoursesByDegree->fetch(PDO::FETCH_ASSOC)) { 
						extract($row);
                    ?>
	                    <a href="#subject" id="showProspectus" data-course="<?php echo $course_abbr;?>">
							<div class="col-lg-4">
							    <div class="widget style1 lazur-bg">
							        <div class="row">

							            <div class="col-xs-4">
							                <h1><?php echo strtoupper($course_abbr); ?></h1>
							            </div>

							            <div class="col-xs-8 text-right">
						            	<?php 
						            		$getTotal = $dbConn->query("SELECT * FROM tbl_subject WHERE course_abbr='".$course_abbr."' ");
											while($gtsid = $getTotal->fetch(PDO::FETCH_ASSOC)) {
												extract($gtsid);
												$total = $lec+$lab;
												if($subject_status==1){
													$total_subject++;
													$total_unit += $total;
												}
											}
						            	?>
						                	<span> Total Subjects </span>
							                <h3 class="font-bold"><?php echo $total_subject; ?></h3>
							                <span> Total Units </span>
							                <h3 class="font-bold"><?php echo ($total_unit!= 0) ? $total_unit : 0 ; ?></h3>
							            </div>

							        </div>
							    </div>
							</div>
						</a>
					<?php 
						$total_subject = 0;
						$total_unit = 0;
					} 
					?>
                	</div>

            	</div>
        	</div>
        	<!-- ASSOCIATE TAB -->
            <div id="tab2" class="tab-pane">
                <div class="panel-body animated fadeIn">
                    
                	<div class="row dashboard-header">
                    <?php 
                    	while($row = $getCoursesByAssociate->fetch(PDO::FETCH_ASSOC)) { 
						extract($row);
                    ?>
	                    <a href="#subject" id="showProspectus" data-course="<?php echo $course_abbr;?>">
							<div class="col-lg-4">
							    <div class="widget style1 lazur-bg">
							        <div class="row">
							        
							            <div class="col-xs-4">
							                <h1><?php echo strtoupper($course_abbr); ?></h1>
							            </div>
							            <div class="col-xs-8 text-right">
						                <?php 
						            		$getTotal = $dbConn->query("SELECT * FROM tbl_subject WHERE course_abbr='".$course_abbr."' ");
											while($gtsid = $getTotal->fetch(PDO::FETCH_ASSOC)) {
												extract($gtsid);
												$total = $lec+$lab;
												if($subject_status==1){
													$total_subject++;
													$total_unit += $total;
												}
											}
						            	?>
							                <span> Total Subjects </span>
							                <h3 class="font-bold"><?php echo $total_subject; ?></h3>
							                <span> Total Units </span>
							                <h3 class="font-bold"><?php echo ($total_unit!= 0) ? $total_unit : 0 ; ?></h3>
							            </div>

							        </div>
							    </div>
							</div>
						</a>
					<?php 
						$total_subject = 0;
						$total_unit = 0;
					} 
					?>
                	</div>

                </div>
            </div>
        </div>


    </div>


