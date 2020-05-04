<?php require_once '../../library/config.php'; ?>

<div class="row border-bottom white-bg dashboard-header">
    <h2>Room Masterlist
        <div>
            <button id="btn_addRoom" class="btn btn-success pull-right">Add New Room</button>
        </div>
    </h2>
    
</div>

<div class="page-wrapper">
	<div id="room_tabular"></div>
    <?php require '../../view/room/modal_roomForm.php'; ?>
</div>
