<?php require_once '../../library/config.php'; ?>

<script>
    $(document).ready(function(){
        $(".chosen-select").chosen({ width:"95%" });
        // $("select").chosen({width: "inherit"});
    });
</script>

<div class="row border-bottom white-bg dashboard-header">
    <h2>Subject Masterlist
        <div>
            <button id="btn_addSubject" class="btn btn-success pull-right">Add New Subject</button>
        </div>
    </h2>
    
    <div class="radio radio-info radio-inline">
        <input type="radio" id="subjectTabular_view" name="subject_style" value="tabular" checked>
        <label for="subjectTabular_view"> Tabular View </label> &nbsp;&nbsp;
    
        <input type="radio" id="subjectProspectus_view" name="subject_style" value="prospectus">
        <label for="subjectProspectus_view"> Prospectus View </label>
    </div>

    
</div>

<div class="page-wrapper">
	<div id="subject_tabular"></div>
	<div id="subject_prospectus"></div>
    <div id="prospectus"></div>
    <?php require '../../view/subject/modal_subjectForm.php'; ?>
</div>
