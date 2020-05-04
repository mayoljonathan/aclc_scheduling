<?php require_once '../../library/config.php'; ?>

<div class="row border-bottom white-bg dashboard-header">
    <h2>Department Masterlist
        <div>
            <button id="btn_addDepartment" class="btn btn-success pull-right">Add New Department</button>
        </div>
    </h2>
    
</div>

<div class="page-wrapper">
	<div id="department_tabular"></div>
    <?php require '../../view/department/modal_departmentForm.php'; ?>
</div>
