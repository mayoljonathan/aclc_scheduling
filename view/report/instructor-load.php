<div class="wrapper">
    <div class="row">
        <form method="post" id="form_instructorLoad">
            
            <div class="col-md-4">
                <label class="text-header">Name:</label>
                <select name="faculty_id" id="faculty_id" class="form-control chosen-select">
                    <optgroup label="FULL TIME">
                    <option disabled selected></option>
                    <?php 
                        $getFullTime = $dbConn->query("SELECT * FROM tbl_faculty WHERE faculty_status='1' AND faculty_type='FULL TIME' ORDER BY lastname");
                        while ($row = $getFullTime->fetch(PDO::FETCH_ASSOC)) { 
                            extract($row);
                            if($mi!=""){$mi = $mi.".";}
                            $name = $lastname.", ".$firstname." ".$mi;
                        ?>

                        <option value="<?php echo $faculty_id; ?>"><?php echo ucwords($name); ?></option>
                    <?php
                        }
                    ?>
                    <optgroup label="PART TIME">
                    <?php 
                        $getPartTime = $dbConn->query("SELECT * FROM tbl_faculty WHERE faculty_status='1' AND faculty_type='PART TIME' ORDER BY lastname");
                        while ($row = $getPartTime->fetch(PDO::FETCH_ASSOC)) { 
                            extract($row);
                            if($mi!=""){$mi = $mi.".";}
                            $name = $lastname.", ".$firstname." ".$mi;
                        ?>

                        <option value="<?php echo $faculty_id; ?>"><?php echo ucwords($name); ?></option>
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
        <div id="instructorLoadResult"></div>
    </div>
</div>


    

<script>
    $(document).ready(function(){

        $('#form_instructorLoad').on('submit',function(){
            var formData = $(this).serialize();

            $.post('services/report/searchInstructorLoad.php',formData,function(data){
                $('#instructorLoadResult').hide().fadeIn('slow').html(data);
            },'html');

            return false;
        });

        $(".chosen-select").chosen({ width:"95%" });
    });
</script>