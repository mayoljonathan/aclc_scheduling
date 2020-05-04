<form id="form_submitCourse" method="post">
    <div id="modal_courseForm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	    <div class="modal-dialog modal-md" style="margin-top:70px;">
            <div class="panel panel-success ">

                <div class="panel-heading">
                    <button type="button" class="close m-t-5" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="panel-title"><center id="modal_courseTitle">ADD NEW COURSE</center></h3>
                </div>
                
                <div class="panel-body">
                    <!-- HIDDEN DATA-->
                    <input type="hidden" name="course_id" id="course_id">
                    <input type="hidden" name="course_nameDup" id="course_nameDup">
                    <input type="hidden" name="course_abbrDup" id="course_abbrDup">

                    <div class="col-md-12">
                    	<label class="text-header">Course name:</label>
                    	<input type="text" class="form-control uppercase" name="course_name" id="course_name" required>
                    </div>
                    <div class="col-md-4">
                        <label class="text-header">Course Abbreviation:</label>
                        <input type="text" class="form-control uppercase" name="course_abbr" id="course_abbr" required>
                    </div>
                    <div class="col-md-4">
                        <label class="text-header">Course Type</label>
                        <div class="radio radio-info radio-inline" style="margin-top:-5px;">
                            <input type="radio" id="course_degree" name="course_type" value="DEGREE" checked required>
                            <label for="course_degree"> DEGREE </label>&nbsp;&nbsp;
                        
                            <input type="radio" id="course_associate" name="course_type" value="ASSOCIATE" required>
                            <label for="course_associate"> ASSOCIATE </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="text-header">Completion Years:</label>
                        <select class="form-control" name="course_noYears" id="course_noYears" required>
                            <option value="4">4</option>
                            <option value="4">5</option>
                        </select>
                    </div>
                        
                </div>

            	<div class="modal-footer">
                    <button type="submit" id="btn_submitCourse" class="btn btn-success" >Submit</button>
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>

            </div>
	    </div>
    </div>
</form>

<script>
    $('#course_name').on('keyup',function(){
        var string =  $('#course_name').val().toLowerCase();
        if(string==""){
            $('#course_abbr').val("");
        }

        string = string.replace("of ","");
        string = string.replace("in ","");
        string = string.replace("and ","");
        
        string = string.match(/\b(\w)/g);
        var abbr = string.join('');
        $('#course_abbr').val(abbr);

    });
    
    $('#course_degree').on('click',function(){
        $('#course_noYears').empty();
        for(var i=4; i < 6 ;i++){
            $('#course_noYears').append($('<option>', {
                value: i,
                text: i
            }));
        }
    });
    $('#course_associate').on('click',function(){
        $('#course_noYears').empty();
        $('#course_noYears').append($('<option>', {
            value: 2,
            text: 2
        }));
    });
</script>