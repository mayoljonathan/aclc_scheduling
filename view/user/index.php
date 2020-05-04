<?php require_once '../../library/config.php'; ?>

<div class="row border-bottom white-bg dashboard-header">
    <h2>List of Users
        <div>
            <button id="btn_addUser" class="btn btn-success pull-right">Add New User</button>
        </div>
    </h2>
    
</div>

<div class="page-wrapper">
	<div id="user_tabular"></div>
    <?php require '../../view/user/modal_userForm.php'; ?>
</div>
