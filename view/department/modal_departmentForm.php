<form id="form_submitDepartment" method="post">
    <div id="modal_departmentForm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	    <div class="modal-dialog modal-md" style="margin-top:70px;">
            <div class="panel panel-success ">

                <div class="panel-heading">
                    <button type="button" class="close m-t-5" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="panel-title"><center id="modal_departmentTitle">ADD NEW DEPARTMENT</center></h3>
                </div>
                


                <div class="panel-body">
                    <!-- HIDDEN DATA-->
                    <input type="hidden" name="department_id" id="department_id">
                    <input type="hidden" name="department_nameDup" id="department_nameDup">

                    <div class="col-md-12">
                    	<label class="text-header">Department Name</label>
                    	<input type="text" class="form-control uppercase" name="department_name" id="department_name" required>
                    </div>
                    <div class="col-md-12" id="department_headLabel">
                        <label class="text-header">Department Head</label>
                        <select class="form-control" name="department_head" id="department_head">
                            <option readonly></option>
                        </select>
                    </div>
                        
                </div>

            	<div class="modal-footer">
                    <button type="submit" name="btn_submitDepartment" id="btn_submitDepartment" class="btn btn-success" >Submit</button>
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>

            </div>
	    </div>
	</div>
</form>

<script>
    $(document).ready(function(){
        $(".chosen-select").chosen({ width:"95%" });
        // $("select").chosen({width: "inherit"});
    });
</script>
                