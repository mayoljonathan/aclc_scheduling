<form id="form_submitSubject" method="post">
    <div id="modal_subjectForm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	    <div class="modal-dialog modal-md" style="margin-top:70px;">
            <div class="panel panel-success ">

                <div class="panel-heading">
                    <button type="button" class="close m-t-5" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="panel-title"><center id="modal_subjectTitle">ADD NEW SUBJECT</center></h3>
                </div>
                
                <div class="panel-body">
                	<!-- HIDDEN -->
                	<input type="hidden" name="subject_id" id="subject_id">

                    <div class="col-md-3">
                    	<label class="text-header">Subject Code:</label>
                    	<input type="text" class="form-control uppercase" name="subject_code" id="subject_code" required>
                    </div>
                    <div class="col-md-9">
                    	<label class="text-header">Subject Title:</label>
                    	<input type="text" class="form-control ucwords" name="subject_title" id="subject_title" required>
                    </div>
                    <div class="col-md-4">
						<label class="text-header">Course :</label>
				    	<select class="chosen-select" name="course_abbr" id="course_abbr" required>
					        <option readonly></option>
					        <optgroup label="DEGREE">
					            <?php

					            $sql = $dbConn->query("SELECT * FROM tbl_course WHERE course_type='DEGREE' AND course_status='1' ");
					            while($row = $sql->fetch(PDO::FETCH_ASSOC)) { 
					            	extract($row);
					            ?>
						            <option id="<?php echo $course_id; ?>" ><?php echo strtoupper($course_abbr); ?></option>

					            <?php } ?>
				            </optgroup>

				            <optgroup label="ASSOCIATE">
					            <?php

					            $sql = $dbConn->query("SELECT * FROM tbl_course WHERE course_type='ASSOCIATE' AND course_status='1' ");
					            while($row = $sql->fetch(PDO::FETCH_ASSOC)) { 
					            	extract($row);
					            ?>
						            <option id="<?php echo $course_id; ?>" ><?php echo strtoupper($course_abbr); ?></option>

					            <?php } ?>
				            </optgroup>
				    	</select>
					</div>

                    <div class="col-md-3">
                    	<label class="text-header">Year Level:</label>
                    	<select class="form-control" id="year_level" name="year_level" disabled>
                    		<option value="1"></option>
                    	</select>
                    </div>

                    <div class="col-md-5">
                    	<label class="text-header">Semester</label>
                    	<div class="radio radio-info radio-inline" style="margin-top:5px;">
					        <input type="radio" id="semester_1" name="semester" value="1"checked>
					        <label for="semester_1"> 1st Sem </label>&nbsp;&nbsp;&nbsp;&nbsp;
					    
					        <input type="radio" id="semester_2" name="semester" value="2">
					        <label for="semester_2"> 2nd Sem </label>
				    	</div>
                    </div>
                 	<div class="col-md-12">
                    	<!-- blank div -->
                    </div>
                    <!-- UNITS -->
                    <div class="col-md-2">
                    	<label class="text-header">Lec Units:</label>
                    	<input type="text" data-mask="99" class="form-control" name="units_lec" id="units_lec" required>
                    </div>
                    <div class="col-md-2">
                    	<label class="text-header">Lab Units:</label>
                    	<input type="text" data-mask="99" class="form-control" name="units_lab" id="units_lab" required>
                    </div>
                    <div class="col-md-2">
                    	<label class="text-header">Total Units:</label>
                    	<input type="number" readonly class="form-control" name="total_units" id="total_units">
                    </div>
                    
                    <div class="col-md-6"><br>
						<label class="text-header">Pre-requisites :</label>
				    	<select class="chosen-select" multiple name="pre_requisite[]" id="pre_requisite">
				    		<option disabled readonly>Choose course first</option>
				    	</select>
					</div>

                        
                </div>

            	<div class="modal-footer">
                    <button type="submit" id="btn_submitSubject" class="btn btn-success" >Submit</button>
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>

            </div>
	    </div>
	</div>
</form>

<script>
	$('#course_abbr').on('change',function(){
		var course_id = ($(this).find('option:selected').attr('id'));
		var year_level = ($('#year_level').find('option:selected').attr('value'));
		if($('#semester_1').prop('checked')){
			var semester = 1;
		}else{
			var semester = 2;
		}

		$.post("services/subject/getYearLevelByCourse.php",{course_id:course_id},function(data){
			if(data.response="success"){
				$('#year_level').prop('disabled', false);
				$('#year_level').empty();
		        for(var i=1; i <= data[0].course_noYears ;i++){
		            $('#year_level').append($('<option>', {
		                value: i,
		                text: i
		            }));
		        }
		        getPreRequisiteList(course_id,year_level,semester);
			}else{
				alert('Error');
			}
			
		},"json");
		e.preventDefault();
	});

	$('#year_level').on('change',function(){
		var course_id = ($('#course_abbr').find('option:selected').attr('id'));
		var year_level = ($(this).find('option:selected').attr('value'));
		
		if($('#semester_1').prop('checked')){
			var semester = 1;
		}else{
			var semester = 2;
		}

		getPreRequisiteList(course_id,year_level,semester);
	});

	$('#semester_1,#semester_2').on('click',function(){
		var course_id = ($('#course_abbr').find('option:selected').attr('id'));
		var year_level = ($('#year_level').find('option:selected').attr('value'));

		if($('#semester_1').prop('checked')){
			var semester = 1;
		}else{
			var semester = 2;
		}

		getPreRequisiteList(course_id,year_level,semester);
	});

	// units
	$('#units_lec').on('keyup',function(){
		var units_lec = $(this).val();
		var units_lab = $('#units_lab').val();

		var total = (+units_lec) + (+units_lab);

		$('#total_units').val(total);
	});

	$('#units_lab').on('keyup',function(){
		var units_lab = $(this).val();
		var units_lec = $('#units_lec').val();

		var total = (+units_lec) + (+units_lab);

		$('#total_units').val(total);
	});


	function getPreRequisiteList(course_id,year_level,semester){
		$('#pre_requisite').empty();
		$.post("services/subject/getPreRequisiteList.php",{course_id:course_id,year_level:year_level,semester:semester},function(data){
			if(data[0]["response"]=="success"){
		        for(var i=1; i <= data.length-1 ;i++){
		        	var subject_code = data[i]['subject_code'];
		        	var subject_title = data[i]['subject_title'];
		        	$("#pre_requisite").append('<option id='+subject_code+' value='+subject_code+'>'+subject_title+'</option>');
		        	$("#pre_requisite").trigger("chosen:updated");
		        }
			}else if(data[0]["response"]=="empty"){
				$("#pre_requisite").append('<option disabled readonly>Empty subjects in this course</option>');
	        	$("#pre_requisite").trigger("chosen:updated");
			}else{
				alert('Error');
			}
			
		},"json");

		return this;
	}

</script>