<?php require_once '../../library/config.php'; ?>

<div class="row border-bottom white-bg dashboard-header">
    <h2>Instructor Masterlist
        <div>
            <button id="btn_addFaculty" class="btn btn-success pull-right">Add New Instructor</button>
        </div>
    </h2>
   
</div>

<div class="page-wrapper">
	<div id="faculty_tabular"></div>
    <?php require '../../view/faculty/modal_facultyForm.php'; ?>
</div>
