<?php require_once '../../library/config.php'; ?>

<div class="row border-bottom white-bg dashboard-header">
    <h2>Course Masterlist
        <div>
            <button id="btn_addCourse" class="btn btn-success pull-right">Add New Course</button>
        </div>
    </h2>
    
</div>

<div class="page-wrapper">
	<div id="course_tabular"></div>
    <?php require '../../view/course/modal_courseForm.php'; ?>
</div>
