<div class="wrapper">
	<div class="row">
		<form method="post" id="form_classSchedule">
			<div class="col-md-2">
				<label class="text-header">Class Type:</label>
            	<select name="class_type" id="class_type" class="form-control">
            		<option value="ALL">ALL</option>
            		<option value="BLOCK">BLOCK</option>
            		<option value="IRREGULAR">IRREGULAR</option>
            	</select>
			</div>
			<div class="col-md-3">
				<label class="text-header">Course:</label>
            	<select name="course_abbr" id="course_abbr" class="form-control chosen-select">
        			<optgroup label="GENERAL">
            		<option value="ALL">All Courses</option>
        			<optgroup label="DEGREE">
            		<?php 
            			$getDegreeCourses = $dbConn->query("SELECT * FROM tbl_course WHERE course_status='1' AND course_type='DEGREE' ");
            			while ($row = $getDegreeCourses->fetch(PDO::FETCH_ASSOC)) { 
            				extract($row);
            			?>

            			<option value="<?php echo $course_abbr; ?>"><?php echo strtoupper($course_abbr); ?></option>
            		<?php
            			}
            		?>
            		<optgroup label="ASSOCIATE">
            		<?php 
            			$getAssocCourses = $dbConn->query("SELECT * FROM tbl_course WHERE course_status='1' AND course_type='ASSOCIATE' ");
            			while ($row = $getAssocCourses->fetch(PDO::FETCH_ASSOC)) { 
            				extract($row);
            			?>

            			<option value="<?php echo $course_abbr; ?>"><?php echo strtoupper($course_abbr); ?></option>
            		<?php
            			}
            		?>
            	</select>
			</div>
			<div class="col-md-2">
				<button type="submit" class="btn btn-success" style="margin-top:29px;width:100%">SEARCH</button>
			</div>
		</form>
	</div>

	<div class="row" style="margin-top:10px;">
		<div id="classSchedResult"></div>
	</div>
</div>


	

<script>
    $(document).ready(function(){

    	$('#form_classSchedule').on('submit',function(){
			var formData = $(this).serialize();

			$.post('services/report/searchClassSched.php',formData,function(data){
				$('#classSchedResult').hide().fadeIn('slow').html(data);
			},'html');

			return false;
		});

        $(".chosen-select").chosen({ width:"95%" });

    });
</script>