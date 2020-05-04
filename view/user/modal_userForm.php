<form id="form_submitUser" method="post">
    <div id="modal_userForm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	    <div class="modal-dialog modal-md" style="margin-top:70px;">
            <div class="panel panel-success ">

                <div class="panel-heading">
                    <button type="button" class="close m-t-5" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="panel-title"><center id="modal_userTitle">ADD NEW USER</center></h3>
                </div>


                <div class="panel-body">
                    <!-- hidden -->
                    <input type="hidden" name="user_id" id="user_id">
                    <input type="hidden" name="emp_idDup" id="emp_idDup">
                    <input type="hidden" name="usernameDup" id="usernameDup">
                    <input type="hidden" name="firstnameDup" id="firstnameDup">
                    <input type="hidden" name="miDup" id="miDup">
                    <input type="hidden" name="lastnameDup" id="lastnameDup">

                    <div class="col-md-12">
                        <label class="text-header">Employee ID:</label>
                        <input type="text" class="form-control uppercase" data-mask="99-99999" name="emp_id" id="emp_id" required>                
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
                    <div class="col-md-6">
                        <label class="text-header">Username:</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="col-md-6">
                        <label class="text-header">Password:</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>

                    <div class="col-md-5">
                    	<label class="text-header">User Type:</label>
                    	<select class="form-control" name="user_type" id="modal-user_type" required>
                            <option value="ADMIN">ADMIN</option>
                            <option value="SECRETARY">SECRETARY</option>
                            <option value="REGISTRAR">REGISTRAR</option>
                            <option value="HR">HR</option>
                        </select>
                    </div>
                    
                </div>

            	<div class="modal-footer">
                    <button type="submit" id="btn_submitUser" class="btn btn-success" >Submit</button>
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>

            </div>
	    </div>
	</div>
</form>

