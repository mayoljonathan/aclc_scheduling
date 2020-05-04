<form id="form_submitFaculty" method="post">
    <div id="modal_facultyForm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	    <div class="modal-dialog modal-md" style="margin-top:70px;">
            <div class="panel panel-success ">

                <div class="panel-heading">
                    <button type="button" class="close m-t-5" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="panel-title"><center id="modal_facultyTitle">ADD NEW INSTRUCTOR</center></h3>
                </div>


                <div class="panel-body">
                    <!-- hidden -->
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="faculty_idDup" id="faculty_idDup">
                    <input type="hidden" name="firstnameDup" id="firstnameDup">
                    <input type="hidden" name="miDup" id="miDup">
                    <input type="hidden" name="lastnameDup" id="lastnameDup">

                    <div class="col-md-12">
                        <label class="text-header">Faculty ID:</label>
                        <input type="text" class="form-control uppercase" data-mask="99-99999" name="faculty_id" id="faculty_id" required>                
                    </div>
                    <div class="col-md-5">
                    	<label class="text-header">First name:</label>
                    	<input type="text" class="form-control ucwords" name="firstname" id="firstname" required>
                    </div>
                    <div class="col-md-2">
                    	<label class="text-header">Mi:</label>
                    	<input type="text" class="form-control letter-only" maxlength="1" name="mi" id="mi">
                    </div>
                    <div class="col-md-5">
                    	<label class="text-header">Last name:</label>
                    	<input type="text" class="form-control ucwords" name="lastname" id="lastname" required>
                    </div>

                    <div class="col-md-5">
                    	<label class="text-header">Gender</label>
                    	<div class="radio radio-info radio-inline" style="margin-top:5px;">
					        <input type="radio" id="gender_male" value="MALE" name="gender" id="gender" checked>
					        <label for="gender_male"> Male </label>&nbsp;&nbsp;&nbsp;
					    
					        <input type="radio" id="gender_female" value="FEMALE" name="gender" id="gender">
					        <label for="gender_female"> Female </label>
				    	</div>
                    </div>
                 	<div class="col-md-12">
                    	<label class="text-header">Address:</label>
                        <input type="text" class="form-control ucwords" name="address" id="address" required>
                    </div>
                    <div class="col-md-8">
                    	<label class="text-header">Email Address:</label>
                    	<input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="col-md-4">
                    	<label class="text-header">Mobile Number:</label>
                    	<input type="text" class="form-control" data-mask="9999-999-9999" name="mobile" id="mobile">
                    </div>
                    <div class="col-md-8">
                    	<label class="text-header">Department:</label>
                    	<select class="form-control" name="department_id" id="department_id" required>
                        <?php 
                            $getDepartment = $dbConn->query("
                                SELECT * FROM tbl_department 
                                WHERE department_status='1' 
                                ORDER BY department_name ASC");
                            while($row = $getDepartment->fetch(PDO::FETCH_ASSOC)) { 
                                extract($row);
                        ?>
                            <option value="<?php echo $department_id; ?>"><?php echo strtoupper($department_name); ?></option>
                        <?php 
                            } 
                        ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                    	<label class="text-header">Instructor Type</label><br>
                    	<div class="radio radio-info radio-inline" >
					        <input type="radio" id="type_full" value="FULL TIME" name="faculty_type" id="faculty_type" checked>
					        <label for="type_full"> FULL TIME </label>&nbsp;&nbsp;
					    
					        <input type="radio" id="type_part" value="PART TIME" name="faculty_type" id="faculty_type">
					        <label for="type_part"> PART TIME </label>
				    	</div>
                    </div>
                    

                        
                </div>

            	<div class="modal-footer">
                    <button type="submit" id="btn_submitFaculty" class="btn btn-success" >Submit</button>
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>

            </div>
	    </div>
	</div>
</form>

