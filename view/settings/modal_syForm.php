<form id="form_submitSy" method="post">
    <div id="modal_syForm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	    <div class="modal-dialog modal-md" style="margin-top:70px;">
            <div class="panel panel-success ">

                <div class="panel-heading">
                    <button type="button" class="close m-t-5" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="panel-title"><center id="modal_syTitle"></center></h3>
                </div>
                
                <div class="panel-body">
                	<!-- hidden -->
                	<input type="hidden" name="schoolyear_id" id="schoolyear_id">
                    <div class="col-md-12">
                    	<label class="text-header">SchoolYear Code:</label>
                    	<input type="text" class="form-control uppercase" data-mask="99999" name="schoolyear_code" id="schoolyear_code" required>
                    </div>
                </div>

            	<div class="modal-footer">
                    <button type="submit" name="btn_submitRoom" id="btn_submitRoom" class="btn btn-success" >Submit</button>
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>

            </div>
	    </div>
    </div>
</form>