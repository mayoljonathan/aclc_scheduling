<?php require_once '../../../library/config.php'; ?>
	<br>
	<?php 
		$getCoursesByDegree = $dbConn->query("SELECT * FROM tbl_course WHERE course_type='DEGREE' AND course_status='1' ORDER BY course_abbr ASC");
	?>
	<?php 
		$getCoursesByAssociate = $dbConn->query("SELECT * FROM tbl_course WHERE course_type='ASSOCIATE' AND course_status='1' ORDER BY course_abbr ASC");
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
	                    <a href="#add_block" id="showProspectus" data-course="<?php echo $course_abbr;?>">
							<div class="col-lg-3">
							    <div class="widget style1 lazur-bg">
							        <div class="row">

							            <div class="col-xs-8">
							                <h1><?php echo strtoupper($course_abbr); ?></h1>
							            </div>

							            <div class="col-xs-12 text-right">
						                	<!-- <span>Block Sections </span> -->
							                <h2 class="font-bold"><?php // echo 5; ?></h2>
							            </div>

							        </div>
							    </div>
							</div>
						</a>
					<?php 
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
	                    <a href="#add_block" id="showProspectus" data-course="<?php echo $course_abbr;?>">
							<div class="col-lg-3">
							    <div class="widget style1 lazur-bg">
							        <div class="row">
							        
							            <div class="col-xs-8">
							                <h1><?php echo strtoupper($course_abbr); ?></h1>
							            </div>
							            <div class="col-xs-12 text-right">
							                <!-- <span>Block Sections </span> -->
							                <h2 class="font-bold"><?php // echo 5; ?></h3>
							            </div>

							        </div>
							    </div>
							</div>
						</a>
					<?php 
						} 
					?>
                	</div>

                </div>
            </div>
        </div>


    </div>


